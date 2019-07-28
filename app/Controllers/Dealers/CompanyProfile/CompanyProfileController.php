<?php
/**
 * This file contains portal's CompanyProfileController.
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
namespace App\Controllers\Dealers\CompanyProfile;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Company\CompanyContactModel;
use App\Models\Dealers\Company\CompanyHoursModel;
use App\Models\Dealers\Company\CompanyPaymentMethodModel;
use App\Models\Dealers\Company\CompanyInformationModel;
use App\Models\Dealers\Company\CompanySocialMediaModel;
use App\Models\Dealers\Company\CompanyPhotosModel;
use App\Models\Dealers\Company\CompaniesCategoriesModel;
use App\Models\Dealers\Company\CompaniesKeywordsModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyWebsiteInformationModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyEmailInformationModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyNewslettersInformationModel;
use App\Models\Dealers\Company\WebsiteInformation\CompanyWebsiteLiveInformationModel;
use App\Models\Dealers\PaymentMethodModel;
use App\Models\Dealers\SocialMediaModel;
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbServiceCategoryModel;

/**
 * This controller contains actions for the Company Profile page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class CompanyProfileController extends DealersController
{
    /**
     * DB service
     *
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $dbService;
    /**
     * Logger service
     *
     * @var \Monolog\Logger
     */
    protected $logger;
    /**
     * GMB API service
     *
     * @var \Classes\GmbApi
     */
    protected $gmbService;
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $menu = $this->getMenuItems();
        $tabs = $this->getTabs();
        $route = $this->getRequest()->getUri()->getPath();
        $config = $this->getService('config')->get();
        $routes = $config['routes'];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }
        $fields = $config['fields'];

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);
        $page = $this->getPage($route);
        $icon = false;
        $gmb = $this->hasGmbAccount($user['id']);
        $data = compact(
            'menu',
            'tabs',
            'route',
            'user',
            'messages',
            'fields',
            'page',
            'icon',
            'gmb'
        );
        $data['contact_information'] = [
            'action' => $routes['contact-information'],
            'data'   => $this->getContactInformation($company),
        ];
        $data['website_information'] = [
            'action' => $routes['website-information'],
            'data'   => $this->getWebsiteInformation($company),
        ];
        $data['essential_information'] = [
            'action'          => $routes['essential-information'],
            'all_hours_label' => $config['misc']['essential_information']['24_hours_label'],
            'hours'           => $this->getHoursList(),
            'days'            => $this->getDaysList(),
            'payment_methods' => $this->getPaymentMethods(),
            'data'            => $this->getEssentialInformation($company),
        ];
        $data['social_media'] = [
            'action'       => $routes['social-media'],
            'social_media' => $this->getSocialMedia(),
            'data'         => $this->getSocialMediaInformation($company),
        ];
        $data['company_photos'] = [
            'action' => $routes['company-photos'],
            'data'   => $this->getCompanyPhotos($company),
        ];
        return $this->render('Dealers/company-profile/index.twig', $data);
    }

    /**
     * Returns tabs for topbar.
     *
     * @return array
     */
    public function getTabs()
    {
        return $this->getService('config')->get()['tabs']['company-profile'];
    }

    /**
     * Adds tab data to the session.
     *
     * @param string $tab tab name
     *
     * @return void
     */
    public function displayTab(string $tab)
    {
        $tabs = $this->getTabs();
        if (!empty($tabs[$tab])) {
            $this->getService('flash')->addMessage('tab', $tabs[$tab]);
        }
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    protected function goBack()
    {
        $redirectUrl = '/' . $this->getService('config')->get()['routes']['company-profile'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Fetches company and contacts information from DB
     *
     * @param object $company company basic information
     *
     * @return array
     */
    private function getContactInformation($company)
    {
        $information = ['company' => [], 'contacts' => [], 'categories' => []];
        if (!$company) {
            return $information;
        }

        $dbService = $this->getService('db');
        $companyContactModel = new CompanyContactModel($dbService);
        $contacts['primary'] = $companyContactModel->getCompanyContacts(
            ['company_id' => $company->id, 'is_primary' => 1]
        );
        $companyContactModel = new CompanyContactModel($dbService);
        $contacts['additional'] = $companyContactModel->getCompanyContacts(
            ['company_id' => $company->id, 'is_primary' => 0]
        );
        $companiesCategoriesModel = new CompaniesCategoriesModel(
            $dbService,
            $this->getService('logger')
        );
        $categories = [];
        $companyCategories = $companiesCategoriesModel->getCompanyCategories($company->id);
        if ($companyCategories) {
            foreach ($companyCategories as $category) {
                $categoryModel = new GmbServiceCategoryModel($dbService, $this->logger);
                $categories[] = $categoryModel->getCategory(
                    ['id' => $category->category_id]
                );
            }
        }
        $information = compact('company', 'contacts', 'categories');
        return $information;
    }

    /**
     * Fetches website information from DB
     *
     * @param object $company company basic information
     *
     * @return array
     */
    public function getWebsiteInformation($company)
    {
        $information = [
            'website_information'      => [],
            'email_information'        => [],
            'newsletters'              => [],
            'website_live_information' => [],
        ];
        if (!$company) {
            return $information;
        }

        $dbService = $this->getService('db');
        $logger    = $this->getService('logger');

        $websiteInformationModel = new CompanyWebsiteInformationModel(
            $dbService,
            $logger
        );
        $information['website_information'] = $websiteInformationModel
            ->getCompanyWebsiteInformation($company->id);

        $emailInformationModel = new CompanyEmailInformationModel(
            $dbService,
            $logger
        );
        $information['email_information'] = $emailInformationModel
            ->getCompanyEmailInformation($company->id);

        $newslettersModel = new CompanyNewslettersInformationModel(
            $dbService,
            $logger
        );
        $information['newsletters'] = $newslettersModel
            ->getCompanyNewslettersInformation($company->id);

        $websiteLiveModel = new CompanyWebsiteLiveInformationModel(
            $dbService,
            $logger
        );
        $information['website_live_information'] = $websiteLiveModel
            ->getCompanyWebsiteLiveInformation($company->id);

        return $information;
    }

    /**
     * Fetches company hours and payment methods information from DB
     *
     * @param object $company company basic information
     *
     * @return array
     */
    public function getEssentialInformation($company)
    {
        $information = ['hours' => [], 'payment_methods' => [], 'information' => []];
        if (!$company) {
            return $information;
        }

        $dbService = $this->getService('db');
        $companyHoursModel = new CompanyHoursModel($dbService);
        $hours = $companyHoursModel->getCompanyHours($company->id);
        foreach ($hours as $hour) {
            $information['hours'][$hour->day][] = [
                'start' => $hour->start,
                'end'   => $hour->end,
            ];
        }

        $companyPaymentMethodsModel = new CompanyPaymentMethodModel($dbService);
        $methods = $companyPaymentMethodsModel->getCompanyPaymentMethods($company->id);
        foreach ($methods as $method) {
            $information['payment_methods'][] = $method->payment_method_id;
        }

        $companyInformationModel = new CompanyInformationModel($dbService);
        $information['information'] = $companyInformationModel
            ->getCompanyInformation($company->id);

        $companiesKeywordsModel = new CompaniesKeywordsModel(
            $dbService,
            $this->getService('logger')
        );
        $information['keywords'] = $companiesKeywordsModel
            ->getCompanyKeywords($company->id);

        return $information;
    }

    /**
     * Fetches company social media information from DB
     *
     * @param object $company company basic information
     *
     * @return array
     */
    public function getSocialMediaInformation($company)
    {
        $information = ['social_media' => []];
        if (!$company) {
            return $information;
        }

        $companySocialMediaModel = new CompanySocialMediaModel($this->getService('db'));
        $media = $companySocialMediaModel->getCompanySocialMedia($company->id);
        foreach ($media as $row) {
            $information['social_media'][$row->social_media_id] = [
                'url'      => $row->url,
                'username' => $row->username,
                'password' => $row->password,
            ];
        }

        return $information;
    }

    /**
     * Fetches company social media information from DB
     *
     * @param object $company company basic information
     *
     * @return array
     */
    private function getCompanyPhotos($company)
    {
        $photos = [];
        if (!$company) {
            return $photos;
        }

        $companyPhotosModel = new CompanyPhotosModel($this->getService('db'));
        $photos = $companyPhotosModel->getCompanyPhotos($company->id);

        return $photos;
    }

    /**
     * Returns hours list.
     *
     * @return array hours
     */
    public function getHoursList()
    {
        $index = 1;
        $label = $this->getService('config')->get()
            ['misc']['essential_information']['24_hours_label'];
        $hours = [$index => $label];
        foreach (['am', 'pm'] as $time) {
            $hours[++$index] = '12:00 ' . $time;
            $hours[++$index] = '12:30 ' . $time;
            for ($i = 1; $i < 12; $i++) {
                $hours[++$index] = $i . ':' . '00 ' . $time;
                $hours[++$index] = $i . ':' . '30 ' . $time;
            }
        }
        return $hours;
    }

    /**
     * Returns weekdays.
     *
     * @return array weekdays
     */
    public function getDaysList()
    {
        return ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    }

    /**
     * Returns payment methods.
     *
     * @return array payment methods
     */
    public function getPaymentMethods()
    {
        $paymentMethodModel = new PaymentMethodModel($this->getService('db'));
        $paymentMethods = $paymentMethodModel->getPaymentMethods();

        return $paymentMethods;
    }

    /**
     * Returns social media list
     *
     * @return array social media
     */
    public function getSocialMedia()
    {
        $socialMediaModel = new SocialMediaModel($this->getService('db'));
        $socialMedia = $socialMediaModel->getSocialMedia();

        return $socialMedia;
    }

    /**
     * Creates company row in DB.
     *
     * @param int $userId user ID
     *
     * @return int | bool
     */
    protected function storeUserCompany(int $userId)
    {
        $companyModel = new CompanyModel($this->getService('db'));
        $companyId = $companyModel->insertCompany(['user_id' => $userId]);
        return $companyId;
    }

    /**
     * Returns dealer's GMB location data
     *
     * @param int $userId dealer's ID
     *
     * @return \Illuminate\Database\Eloquent\Collection|bool
     */
    protected function getGmbLocations(int $userId)
    {
        if (!$userId) {
            return false;
        }
        if (!$this->dbService) {
            $this->dbService = $this->getService('db');
        }
        if (!$this->logger) {
            $this->logger = $this->getService('logger');
        }

        $dealerModel = new DealersGmbAccountsModel($this->dbService, $this->logger);
        $accountId = $dealerModel->getAccountId($userId);
        if (!$accountId) {
            return false;
        }

        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $locations = $locationModel->getAccountLocations($accountId);

        return $locations;
    }

    /**
     * Checks if dealer has a GMB account
     *
     * @param int $userId dealer's ID
     *
     * @return boolean
     */
    public function hasGmbAccount(int $userId)
    {
        if (!$this->dbService) {
            $this->dbService = $this->getService('db');
        }
        if (!$this->logger) {
            $this->logger = $this->getService('logger');
        }
        $dealerModel = new DealersGmbAccountsModel($this->dbService, $this->logger);
        $accountId = $dealerModel->getAccountId($userId);
        return (bool) $accountId;
    }
}
