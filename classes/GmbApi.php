<?php
/**
 * This file contains a class for working with GMB API.
 *
 * PHP version 7.1
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  GIT:
 * @link     http://lamp-dev.com
 */
namespace Classes;

/**
 *  File upload class
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbApi
{
    /**
     * Config settings
     *
     * @var array
     */
    private $settings;
    /**
     * Session service
     *
     * @var Classes\Session
     */
    private $session;
    /**
     * Response object
     *
     * @var Slim\Http\Response
     */
    private $response;
    /**
     * Logger service
     *
     * @var Monolog\Logger
     */
    private $logger;
    /**
     * Google Client
     *
     * @var \Google_Client
     */
    private $client;
    /**
     * Google My Business Client
     *
     * @var \Google_Service_MyBusiness
     */
    private $gmbClient;

    /**
     * Initialises settings
     *
     * @param array               $settings service settings
     * @param \Classes\Session    $session  session service
     * @param \Slim\Http\Response $response response
     * @param \Monolog\Logger     $logger   logger service
     */
    public function __construct(array $settings, \Classes\Session $session, \Slim\Http\Response $response, \Monolog\Logger $logger)
    {
        $this->settings = $settings;
        $this->session  = $session;
        $this->response = $response;
        $this->logger   = $logger;
        $this->initializeClient();
    }

    /**
     * Initializes Google and GMB clients.
     *
     * @return void
     */
    private function initializeClient()
    {
        $this->client = new \Google_Client();
        $this->client->setAuthConfig($this->settings['client_secrets_file']);
        $this->client->setAccessType('offline');
        $this->client->setIncludeGrantedScopes(true);
        $this->client->addScope($this->settings['scopes']);
        $this->client->setRedirectUri($this->settings['auth_redirect_url']);
    }

    /**
     * Checks if there is a valid access token to use in requests
     *
     * @return boolean
     */
    public function hasAccessToken()
    {
        if (empty($this->session->access_token)) {
            return false;
        }

        $this->client->setAccessToken($this->session->access_token);
        if ($this->client->isAccessTokenExpired()) {
            unset($this->session->access_token);
            return false;
        }

        return true;
    }

    /**
     * Redirects to auth url to obtain auth code.
     *
     * @return string|bool
     */
    public function authorize()
    {
        try {
            $url = $this->client->createAuthUrl();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        return $this->response->withRedirect($url, 301);
    }

    /**
     * Exchanges auth code toaccess token and sets it to session.
     *
     * @param string $code auth code
     *
     * @return bool
     */
    public function setAccessToken(string $code)
    {
        if (!$code) {
            return false;
        }

        try {
            $this->client->authenticate($code);
            $this->session->access_token = $this->client->getAccessToken();
        } catch (\Exception $e) {
            $this->logger->addError(__CLASS__, [$e]);
            return false;
        }

        if (!empty($this->session->redirect_url)) {
            $url = $this->session->redirect_url;
            unset($this->session->redirect_url);
        } elseif ($this->session->user['role'] === 'admin') {
            $url = $this->settings['gmb_admin_redirect_url'];
        } else {
            $url = $this->settings['gmb_redirect_url'];
        }
        return $this->response->withRedirect($url, 301);
    }

    /**
     * Returns service categories
     *
     * @return array
     */
    public function getServiceCategories()
    {
        $categories = [];
        $params = [
            'regionCode'   => 'US',
            'languageCode' => 'en-US',
        ];
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->categories->listCategories($params);
        if (!empty($response->categories)) {
            $categories = $response->categories;
        }
        return $categories;
    }

    /**
     * Returns GMB accounts
     *
     * @return array
     */
    public function getAccounts()
    {
        $accounts = [];
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts->listAccounts();
        if (!empty($response->accounts)) {
            $accounts = $response->accounts;
        }
        return $accounts;
    }

    /**
     * Returns GMB locations
     *
     * @param string $account GMB account ID
     *
     * @return array
     */
    public function getAccountLocations(string $account)
    {
        $locations = [];
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations->listAccountsLocations($account);
        if (!empty($response->locations)) {
            $locations = $response->locations;
        }
        return $locations;
    }

    public function getLocation(string $account, string $location)
    {
        $name = 'accounts/' . $account . '/locations/' . $location;
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations->get($name);
        return $response;
    }

    /**
     * Returns location's insights.
     *
     * @param string $account   GMB account ID
     * @param string $location  GMB location ID
     * @param mixed  $startTime start time to get insights
     *
     * @return array
     */
    public function getLocationInsights(string $account, string $location, $startTime)
    {
        $insights = [];
        if (!$account || !$location || !$startTime) {
            return $insights;
        }

        $timeRange = new \Google_Service_MyBusiness_TimeRange;
        $timeRange->setStartTime((new \DateTime($startTime))->format('Y-m-d\TH:i:s\Z'));
        $timeRange->setEndTime((new \DateTime())->format('Y-m-d\TH:i:s\Z'));

        $basicRequest = new \Google_Service_MyBusiness_BasicMetricsRequest;
        $basicRequest->setMetricRequests(['metric' => 'ALL', 'options' => ['AGGREGATED_DAILY']]);
        $basicRequest->setTimeRange($timeRange);

        $request = new \Google_Service_MyBusiness_ReportLocationInsightsRequest;
        $request->locationNames = [$account . '/locations/' . $location];
        $request->setBasicRequest($basicRequest);

        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations->reportInsights($account, $request);

        if (!empty($response->locationMetrics[0]->metricValues)) {
            $insights = $response->locationMetrics[0]->metricValues;
        }

        return $insights;
    }

    /**
     * Returns location's reviews
     *
     * @param string $account  GMB account ID
     * @param string $location GMB location ID
     *
     * @return array
     */
    public function getLocationReviews(string $account, string $location)
    {
        $reviews = [];
        if (!$account || !$location) {
            return $reviews;
        }

        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations_reviews
            ->listAccountsLocationsReviews($account . '/locations/' . $location);
        if ($response->reviews) {
            $reviews = $response->reviews;
        }
        return $reviews;
    }

    /**
     * Returns location's posts
     *
     * @param string $account  GMB account ID
     * @param string $location GMB location ID
     *
     * @return array
     */
    public function getLocationPosts(string $account, string $location)
    {
        $posts = [];
        if (!$account || !$location) {
            return $posts;
        }
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations_localPosts
            ->listAccountsLocationsLocalPosts($account . '/locations/' . $location);
        if ($response->localPosts) {
            $posts = $response->localPosts;
        }
        return $posts;
    }

    /**
     * Sends reply to review
     *
     * @param string $account GMB account ID
     * @param object $review  review data
     *
     * @return object updated reply
     */
    public function postReviewReply(string $account, $review)
    {
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $reply = new \Google_Service_MyBusiness_ReviewReply;
        $reply->setComment($review->reply_comment);
        $name = 'accounts/' . $account . '/locations/' . $review->location_id
              . '/reviews/' . $review->review_id;
        $response = $this->gmbClient->accounts_locations_reviews
            ->updateReply($name, $reply);
        return $response;
    }

    /**
     * Deletes reply to review
     *
     * @param string $account GMB account ID
     * @param object $review  review data
     *
     * @return object updated reply
     */
    public function deleteReviewReply(string $account, $review)
    {
        $name = 'accounts/' . $account . '/locations/' . $review->location_id
              . '/reviews/' . $review->review_id;
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations_reviews
            ->deleteReply($name);
        return ($response instanceof \Google_Service_MyBusiness_MybusinessEmpty);
    }

    /**
     * Creates post
     *
     * @param string      $account  GMB account ID
     * @param string      $location GMB location ID
     * @param object      $post     post data
     * @param object|null $media    post media
     * @param object|null $special  post special data
     *
     * @return \Google_Service_MyBusiness_LocalPost
     */
    public function createPost(string $account, string $location, $post, $media = null, $special = null)
    {
        $name = 'accounts/' . $account . '/locations/' . $location;
        $postObject = $this->createPostObject($post, $media, $special);
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);
        $response = $this->gmbClient->accounts_locations_localPosts
            ->create($name, $postObject);
        return $response;
    }

    /**
     * Returns organisation ID.
     *
     * @return string GMB organisation ID
     */
    public function getOrganizationId()
    {
        return $this->settings['organization_id'];
    }

    /**
     * Updates GMB location's information
     *
     * @param array $data location's data to update
     *
     * @return bool
     */
    public function updateLocationInformation(array $data)
    {
        if (!$data || empty($data['location'])) {
            return false;
        }
        $this->gmbClient = new \Google_Service_MyBusiness($this->client);

        $locationName   = 'accounts/' . $data['location']->account_id
                        . '/locations/' . $data['location']->location_id;
        $locationObject = $this->createLocationObject($data);
        $optParams      = $this->getOptParams($data);
        if (!$locationObject || !$optParams) {
            return false;
        }
        $this->logger->addDebug(
            __CLASS__ . ' ' . __FUNCTION__ . ' ' . __LINE__,
            [$locationName, $locationObject, $optParams]
        );

        $response = $this->gmbClient->accounts_locations->patch(
            $locationName,
            $locationObject,
            $optParams
        );
        $this->logger->addDebug(
            __CLASS__ . ' ' . __FUNCTION__ . ' ' . __LINE__,
            [$response]
        );
        return (bool)$response;
    }

    /**
     * Creates optional parameters array
     *
     * @param array $data location's data
     *
     * @return array|bool
     */
    private function getOptParams(array $data)
    {
        $fields = [];
        if (!empty($data['company'])) {
            $fields = ['location_name', 'primary_phone', 'additional_phones',
                       /*'address',*/ 'website_url', 'open_info'];
        }
        if (!empty($data['company_categories'])) {
            $fields[] = 'primary_category';
            if (count($data['company_categories'])) {
                $fields[] = 'additional_categories';
            }
        }
        if (!empty($data['company_hours'])) {
            $fields[] = 'regular_hours';
        }
        if (!empty($data['company_information'])) {
            $fields[] = 'profile';
        }
        if (!$fields) {
            return false;
        }

        $optParams = [
            'updateMask'   => implode(',', $fields),
            'validateOnly' => $this->settings['gmb_test_mode'],
        ];
        return $optParams;
    }

    /**
     * Creates a GMB location object from given data
     *
     * @param array $data location's data
     *
     * @return \Google_Service_MyBusiness_Location|bool
     */
    private function createLocationObject(array $data)
    {
        $empty = true;
        $locationObject = new \Google_Service_MyBusiness_Location;
        if (!empty($data['company'])) {
            $locationObject->setLocationName($data['company']->business_name);
            $locationObject->setPrimaryPhone($data['company']->phone);
            $locationObject->setAdditionalPhones($this->createAdditionalPhones($data));
            // $locationObject->setAddress($this->createAddress($data));
            $locationObject->setWebsiteUrl($data['company']->website);

            if (!empty($data['company']->opening_date)
                && $data['company']->opening_date !== '0000-00-00'
            ) {
                $openInfoObject = $this->createOpenInfo($data['company']->opening_date);
                $locationObject->setOpenInfo($openInfoObject);
            }

            $empty = false;
        }
        if (!empty($data['company_categories'])) {
            $category = array_shift($data['company_categories']);
            $primaryCategory = $this->createCategory($category);
            $locationObject->setPrimaryCategory($primaryCategory);

            if (!empty($data['company_categories'])) {
                foreach ($data['company_categories'] as $category) {
                    $additionalCategories[] = $this->createCategory($category);
                }
                $locationObject->setAdditionalCategories($additionalCategories);
            }
            $empty = false;
        }
        if (!empty($data['company_hours'])) {
            $regularHours = $this->createRegularHours($data);
            if ($regularHours) {
                $locationObject->setRegularHours($regularHours);
                $empty = false;
            }
        }

        if (!empty($data['company_information']->business_description)) {
            $profile = [
                'description' => $data['company_information']->business_description
            ];
            $locationObject->profile = $profile;
        }
        return ($empty) ? false : $locationObject;
    }

    /**
     * Creates primary or additional service category object
     *
     * @param Collection $category service category data
     *
     * @return \Google_Service_MyBusiness_Category
     */
    private function createCategory($category)
    {
        $primaryCategory = new \Google_Service_MyBusiness_Category;
        $primaryCategory->setCategoryId($category->name);
        $primaryCategory->setDisplayName($category->title);
        return $primaryCategory;
    }

    /**
     * Create additional phones array
     *
     * @param array $data company's data
     *
     * @return array of phone numbers
     */
    private function createAdditionalPhones(array $data)
    {
        $additionalPhones = [];
        foreach ($data['company_contacts'] as $contact) {
            $additionalPhones[] = $contact->mobile_number;
        }

        return $additionalPhones;
    }

    /**
     * Creates an address object
     *
     * @param array $data company's data
     *
     * @return \Google_Service_MyBusiness_PostalAddress
     */
    private function createAddress(array $data)
    {
        $addressObject = new \Google_Service_MyBusiness_PostalAddress;
        $addressObject->setRevision(0);
        $addressObject->setRegionCode('US');
        $addressObject->setPostalCode($data['company']->zip);
        $addressObject->setAdministrativeArea($data['company']->state);
        $addressObject->setLocality($data['company']->city);
        $addressObject->setAddressLines(
            [$data['company']->street, $data['company']->address_line_2]
        );
        return $addressObject;
    }

    /**
     * Creates regular hours object
     *
     * @param array $data company's data
     *
     * @return \Google_Service_MyBusiness_BusinessHours|bool
     */
    private function createRegularHours(array $data)
    {
        $regularHoursObject = new \Google_Service_MyBusiness_BusinessHours;
        $periods = [];
        foreach ($data['company_hours'] as $hours) {
            if ($hours->day === 'holiday') {
                continue;
            }
            $period = new \Google_Service_MyBusiness_TimePeriod;
            $period->setOpenDay(strtoupper($hours->day));
            $period->setOpenTime(substr($hours->start, 0, 5));
            $period->setCloseDay(strtoupper($hours->day));
            $period->setCloseTime(substr($hours->end, 0, 5));
            $periods[] = $period;
        }
        if (!$periods) {
            return false;
        }

        $regularHoursObject->setPeriods($periods);
        return $regularHoursObject;
    }

    /**
     * Creates special hours object
     *
     * @param array $data company's data
     *
     * @return \Google_Service_MyBusiness_BusinessHours
     */
    private function createSpecialHours(array $data)
    {
        $specialHoursObject = new \Google_Service_MyBusiness_SpecialHours;
        $periods = [];
        foreach ($data['company_hours'] as $hours) {
            if ($hours->day !== 'holiday') {
                continue;
            }
            $period = new \Google_Service_MyBusiness_SpecialHourPeriod;
            $startDateType = new \Google_Service_MyBusiness_Date;
            $startDateType->setDay();
            $period->setStartDateType(strtoupper($hours->day));
            $period->setOpenTime(substr($hours->start, 0, 5));
            $period->setCloseDay(strtoupper($hours->day));
            $period->setCloseTime(substr($hours->end, 0, 5));
            $periods[] = $period;
        }
        $specialHoursObject->setSpecialHourPeriods($periods);
        return $specialHoursObject;
    }

    /**
     * Creates openinfo object
     *
     * @param string $openingDate company's opening date
     *
     * @return \Google_Service_MyBusiness_OpenInfo
     */
    private function createOpenInfo(string $openingDate)
    {
        $openInfo = new \Google_Service_MyBusiness_OpenInfo;
        $this->logger->addDebug(__CLASS__ . __FUNCTION__ . __LINE__, compact('openingDate'));
        $openingDate = $this->datetimeToDate($openingDate);
        $this->logger->addDebug(__CLASS__ . __FUNCTION__ . __LINE__, compact('openingDate'));
        $openInfo->setOpeningDate($openingDate);
        return $openInfo;
    }

    /**
     * Transforms datetime string to google date format
     *
     * @param string $datetime string
     *
     * @return \Google_Service_MyBusiness_Date
     */
    private function datetimeToDate(string $datetime)
    {
        $endDateTime = new \DateTime();
        $endDateTime->setTimestamp(strtotime($datetime));
        $endDate        = new \Google_Service_MyBusiness_Date;
        $endDate->day   = $endDateTime->format('d');
        $endDate->month = $endDateTime->format('m');
        $endDate->year  = $endDateTime->format('Y');
        return $endDate;
    }

    /**
     * Creates GMB post object
     *
     * @param object      $post    post data
     * @param Collection  $media   post media
     * @param object|null $special post special data
     *
     * @return \Google_Service_MyBusiness_LocalPost
     */
    private function createPostObject($post, $media = null, $special = null)
    {
        $postObject = new \Google_Service_MyBusiness_LocalPost;

        $postObject->languageCode = $post->language_code;
        $postObject->summary      = $post->summary;
        $postObject->topicType    = $post->topic_type;

        if (!empty($post->cta_url)) {
            $callToAction = new \Google_Service_MyBusiness_CallToAction;
            $callToAction->actionType = $post->cta_type;
            $callToAction->url        = $post->cta_url;
            $postObject->setCallToAction($callToAction);
        }

        if ($media) {
            $postMedia = [];
            foreach ($media as $item) {
                $postMedia[] = $this->createMediaObject($item);
            }
            $postObject->setMedia($postMedia);
        }

        if (!empty($special)) {
            if ($post->topic_type === 'event' && !empty($special['event'])) {
                $postEvent = $this->createEventObject($special['event']);
                $postObject->setEvent($postEvent);
            } elseif ($post->topic_type === 'offer'
                && !empty($special['event']) && !empty($special['offer'])
            ) {
                $postEvent = $this->createEventObject($special['event']);
                $postObject->setEvent($postEvent);
                $postObject->offer = $this->createOfferObject($special['offer']);
            } elseif ($post->topic_type === 'product' && !empty($special['product'])) {
                $postObject->product = $this->createProductObject($special['product']);
            }
        }

        return $postObject;
    }

    /**
     * Creates GMB post event object
     *
     * @param object $event post event data
     *
     * @return \Google_Service_MyBusiness_LocalPostEvent
     */
    private function createEventObject($event)
    {
        $endDate   = $this->datetimeToDate($event->end_time);
        $endTime   = $this->datetimeToTime($event->end_time);
        $startDate = $this->datetimeToDate($event->start_time);
        $startTime = $this->datetimeToTime($event->start_time);

        $schedule = new \Google_Service_MyBusiness_TimeInterval;
        $schedule->setEndDate($endDate);
        $schedule->setEndTime($endTime);
        $schedule->setStartDate($startDate);
        $schedule->setStartTime($startTime);

        $postEvent = new \Google_Service_MyBusiness_LocalPostEvent;
        $postEvent->setSchedule($schedule);
        $postEvent->title = $event->title;
        return $postEvent;
    }

    /**
     * Creates GMB post offer object
     *
     * @param object $offer post offer data
     *
     * @return \stdClass
     */
    private function createOfferObject($offer)
    {
        $postOffer = new \stdClass;
        if (!empty($offer->coupon_code)) {
            $postOffer->couponCode = $offer->coupon_code;
        }
        if (!empty($offer->redeem_online_url)) {
            $postOffer->redeemOnlineUrl = $offer->redeem_online_url;
        }
        if (!empty($offer->terms_conditions)) {
            $postOffer->termsConditions = $offer->terms_conditions;
        }
        return $postOffer;
    }

    /**
     * Creates GMB post product object
     *
     * @param object $product post product data
     *
     * @return \stdClass
     */
    private function createProductObject($product)
    {
        $postProduct = new \stdClass;
        $postProduct->productName = $product->product_name;
        if (!empty($product->lower_price_currency)) {
            $lowerPrice               = new \Google_Service_MyBusiness_Money;
            $lowerPrice->currencyCode = $product->lower_price_currency;
            $lowerPrice->units        = $product->lower_price_units;
            $lowerPrice->nanos        = $product->lower_price_nanos;
            $postProduct->lowerPrice  = $lowerPrice;
        }
        if (!empty($product->upper_price_currency)) {
            $upperPrice               = new \Google_Service_MyBusiness_Money;
            $upperPrice->currencyCode = $product->upper_price_currency;
            $upperPrice->units        = $product->upper_price_units;
            $upperPrice->nanos        = $product->upper_price_nanos;
            $postProduct->upperPrice  = $upperPrice;
        }
        return $postProduct;
    }

    /**
     * Creates GMB post media object
     *
     * @param object $media post media data
     *
     * @return \Google_Service_MyBusiness_MediaItem
     */
    private function createMediaObject($media)
    {
        $mediaItem = new \Google_Service_MyBusiness_MediaItem;
        $mediaItem->setMediaFormat($media->media_format);
        $mediaItem->setSourceUrl($media->source_url);
        return $mediaItem;
    }

    /**
     * Transforms datetime string to google time format
     *
     * @param string $datetime string
     *
     * @return \Google_Service_MyBusiness_TimeOfDay
     */
    private function datetimeToTime(string $datetime)
    {
        $endDateTime = new \DateTime();
        $endDateTime->setTimestamp(strtotime($datetime));
        $endTime          = new \Google_Service_MyBusiness_TimeOfDay;
        $endTime->hours   = $endDateTime->format('H');
        $endTime->minutes = $endDateTime->format('i');
        $endTime->seconds = $endDateTime->format('s');
        $endTime->nanos   = 0;
        return $endTime;
    }
}
