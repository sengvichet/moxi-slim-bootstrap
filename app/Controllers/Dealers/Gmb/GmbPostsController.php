<?php
/**
 * This file contains portal's GmbPostController.
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
namespace App\Controllers\Dealers\Gmb;

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Common\Gmb\GmbPostModel;
use App\Models\Common\Gmb\GmbPostEventModel;
use App\Models\Common\Gmb\GmbPostOfferModel;
use App\Models\Common\Gmb\GmbPostProductModel;
use App\Models\Common\Gmb\GmbPostMediaModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbPostsController extends DealersController
{
    /**
     * DB service
     *
     * @var \Illuminate\Database\Capsule\Manager
     */
    private $dbService;
    /**
     * Log service
     *
     * @var \Monolog\Logger
     */
    private $logger;

    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $request = $this->getRequest();
        $params = $request->getParams();
        $config = $this->getService('config')->get();
        if (empty($params['location'])) {
            $redirectUrl = '/' . $config['routes']['google-my-business'];
            return $this->getResponse()->withRedirect($redirectUrl, 301);
        }

        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');

        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $fields = $config['fields']['post'];

        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }
        $action = [
            'back' => $config['routes']['google-my-business']
                . '?location=' . $params['location'],
            'save' => $config['routes']['google-my-business-posts'],
        ];
        $location = $params['location'];

        $data = compact('menu', 'route', 'user', 'company', 'messages', 'fields', 'errors', 'action', 'location');
        return $this->render('Dealers/gmb/posts/create.twig', $data);
    }

    /**
     * Stores review reply
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();
        $data = $request->getParams();

        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            return $this->goBack($data['location_id']);
        }

        $config = $this->getService('config')->get();
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');

        $post = [];
        $status = $this->storePost($data, $post);
        if (!$status) {
            $error = $config['errors']['not_saved'];
            $this->getService('flash')->addMessage(
                'message',
                [['status' => 'error', 'text' => $error]]
            );
        }
        if ($data['topic_type'] !== 'standard') {
            call_user_func_array([$this, 'store' . lcfirst($data['topic_type'])], [$data, $post]);
        }

        $this->getService('flash')->addMessage(
            'message',
            [['status' => 'success', 'text' => $config['messages']['dealer_post']['success']]]
        );
        $this->getService('event')->emit(
            'gmb.post',
            ['container' => $this->getContainer(), 'instance' => $post]
        );

        $files = $request->getUploadedFiles();
        $this->handleFileRequest($files, $post);

        return $this->goBack($data['location_id']);
    }

    /**
     * Stores post event
     *
     * @param array $data form data
     * @param array $post post data
     *
     * @return void
     */
    private function storeEvent(array $data, array $post)
    {
        $insertData = [
            'post_id'    => $post['post_id'],
            'title'      => $data['event_title'],
            'start_time' => $this->getEventStartTime($data),
            'end_time'   => $this->getEventEndTime($data),
        ];
        $postEventModel = new GmbPostEventModel($this->dbService, $this->logger);
        $status = $postEventModel->insertPostEvent($insertData);
    }

    /**
     * Stores post offer
     *
     * @param array $data form data
     * @param array $post post data
     *
     * @return void
     */
    private function storeOffer(array $data, array $post)
    {
        $this->storeEvent($data, $post);
        $insertData = [
            'post_id'            => $post['post_id'],
            'coupon_code'        => empty($data['offer_coupon_code'])
                ? null : $data['offer_coupon_code'],
            'redeem_online_url'  => empty($data['offer_redeem_online_url'])
                ? null : $data['offer_redeem_online_url'],
            'terms_conditions'   => empty($data['offer_terms_conditions'])
                ? null : $data['offer_terms_conditions'],
        ];
        $postOfferModel = new GmbPostOfferModel($this->dbService, $this->logger);
        $postOfferModel->insertPostOffer($insertData);
    }

    /**
     * Stores post product
     *
     * @param array $data form data
     * @param array $post post data
     *
     * @return void
     */
    private function storeProduct(array $data, array $post)
    {
        $insertData = [
            'post_id'              => $post['post_id'],
            'product_name'         => $data['product_name'],
            'lower_price_currency' => $this->getPriceCurrency('minimum', $data),
            'lower_price_units'    => $this->getPriceUnits('minimum', $data),
            'lower_price_nanos'    => $this->getPriceNanos('minimum', $data),
            'upper_price_currency' => $this->getPriceCurrency('maximum', $data),
            'upper_price_units'    => $this->getPriceUnits('maximum', $data),
            'upper_price_nanos'    => $this->getPriceNanos('maximum', $data),
        ];
        $postProductModel = new GmbPostProductModel($this->dbService, $this->logger);
        $status = $postProductModel->insertPostProduct($insertData);
    }

    /**
     * Determins price currency
     *
     * @param string $price 'minimum'|'maximum'
     * @param array  $data  form data
     *
     * @return string|null
     */
    private function getPriceCurrency(string $price, array $data)
    {
        return (empty($data['product_price'])
             && empty($data['product_' . $price . '_price']))
            ? null : 'USD';
    }

    /**
     * Determins price units
     *
     * @param string $price 'minimum'|'maximum'
     * @param array  $data  form data
     *
     * @return int|null
     */
    private function getPriceUnits(string $price, array $data)
    {
        if (!empty($data['product_price'])) {
            $components = explode('.', $data['product_price']);
            $units = (empty($components[0])) ? 0 : $components[0];
            return $units;
        }

        if (!empty($data['product_' . $price . '_price'])) {
            $components = explode('.', $data['product_' . $price . '_price']);
            $units = (empty($components[0])) ? 0 : $components[0];
            return $units;
        }

        return null;
    }

    /**
     * Determins price nanos
     *
     * @param string $price 'minimum'|'maximum'
     * @param array  $data  form data
     *
     * @return int|null
     */
    private function getPriceNanos(string $price, array $data)
    {
        if (!empty($data['product_price'])) {
            $components = explode('.', $data['product_price']);
            $units = (empty($components[1])) ? 0 : $components[1];
            return $units;
        }

        if (!empty($data['product_' . $price . '_price'])) {
            $components = explode('.', $data['product_' . $price . '_price']);
            $units = (empty($components[1])) ? 0 : $components[1];
            return $units;
        }

        return null;
    }

    private function getEventStartTime(array $data)
    {
        $time = $data['event_start_date'] . ' ';
        $time .= (empty($data['event_start_time']))
            ? '00:00:00' : $data['event_start_time'];
        return $time;
    }

    private function getEventEndTime(array $data)
    {
        $time = $data['event_end_date'] . ' ';
        $time .= (empty($data['event_end_time']))
            ? '23:59:59' : $data['event_end_time'];
        return $time;
    }

    /**
     * Validates, uploads and stores post media in the DB
     *
     * @param array $files form files
     * @param array $post  post data
     *
     * @return bool
     */
    private function handleFileRequest(array $files, array $post)
    {
        if (empty($files['media'])) {
            return false;
        }

        $media = $files['media'];
        $errors = $this->validateMedia($media);
        if (!empty($errors['count'])) {
            $this->displayFormErrors($errors);
            return false;
        }

        $file = [];
        $this->uploadMedia($media, $post, $file, $errors);
        if (!empty($errors['count'])) {
            $this->displayFormErrors($errors);
            return false;
        }
        $status = $this->storeMedia($file, $post);
        if (!$status) {
            $config = $this->getService('config')->get();
            $error = $config['errors']['not_saved'];
            $this->getService('flash')->addMessage(
                'message',
                [['status' => 'error', 'text' => $error]]
            );
            return false;
        }

        return true;
    }

    /**
     * Stores post in the DB
     *
     * @param array $data post data
     * @param array $post post DB record
     *
     * @return bool
     */
    private function storePost(array $data, array &$post)
    {
        $postModel = new GmbPostModel($this->dbService, $this->logger);
        $post = [
            'post_id'       => $this->generatePostId(),
            'language_code' => 'en',
            'summary'       => $data['summary'],
            'topic_type'    => $data['topic_type'],
            'search_url'    => null,
            'cta_type'      => $data['cta_type'],
            'cta_url'       => $data['cta_url'],
            'state'         => 'local_post_state_unspecified',
            'create_time'   => gmdate('Y-m-d H:i:s'),
            'update_time'   => null,
            'location_id'   => $data['location_id'],
            'is_sync'       => 0,
        ];
        $status = $postModel->insertPost($post);
        return $status;
    }

    /**
     * Redirects to the form page
     *
     * @param string|null $locationId GMB location ID
     *
     * @return static
     */
    private function goBack(string $locationId = null)
    {
        $config = $this->getService('config')->get();
        $redirectUrl = '/' . $config['routes']['google-my-business-posts']
            . ((empty($locationId)) ? '' : '?location=' . $locationId);
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Validates form data
     *
     * @param array $data form data
     *
     * @return array errors
     */
    private function validateData(array $data)
    {
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'summary'    => ['empty', 'max_length'],
            'topic_type' => ['empty'],
        ];
        if (!empty($data['cta_type']) && $data['cta_type'] !== 'action_type_unspecified') {
            $fieldsValidation['cta_url'] = ['empty', 'max_length', 'url'];
        }
        if (!empty($data['topic_type'])) {
            switch ($data['topic_type']) {
                case 'offer':
                    $fieldsValidation['offer_coupon_code']       = ['max_length'];
                    $fieldsValidation['offer_redeem_online_url'] = ['max_length', 'url'];
                case 'event':
                    $fieldsValidation['event_title']      = ['empty', 'max_length'];
                    $fieldsValidation['event_start_date'] = ['empty'];
                    $fieldsValidation['event_end_date']   = ['empty'];
                    break;
                case 'product':
                    $fieldsValidation['product_name'] = ['empty', 'max_length'];
                    break;
            }
        }

        $errors = ['count' => 0];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data, ['form' => 'post', 'field' => $field], &$errors]
                );
            }
        }

        return $errors;
    }

    /**
     * Validates uploaded file.
     *
     * @param mixed $media uploaded media
     *
     * @return array array with errors
     */
    private function validateMedia($media)
    {
        $formErrors = [
            'count' => 0,
            'media' => []
        ];
        $settings = $this->getService('config')->get();
        $errors = $settings['errors']['post']['media'];
        $field  = $settings['fields']['post']['media'];
        $error = $media->getError();
        switch ($error) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $formErrors['media'][] = str_replace(
                    ':size',
                    $this->formatFileSize($field['max_size']),
                    $errors['max_size']
                );
                $formErrors['count']++;
                break;
            case UPLOAD_ERR_EXTENSION:
                $formErrors['media'][] = str_replace(
                    ':format',
                    $this->formatFileSize($field['format']),
                    $errors['format']
                );
                $formErrors['count']++;
                break;
            default:
                $formErrors['media'][] = $errors['upload'];
                $formErrors['count']++;
                break;
        }
        if ($media->getSize() > $field['max_size']) {
            $formErrors['media'][] = str_replace(
                ':size',
                $this->formatFileSize($field['max_size']),
                $errors['max_size']
            );
            $formErrors['count']++;
        }
        if (!in_array($media->getClientMediaType(), $field['types'])) {
            $formErrors['media'][] = str_replace(
                ':format',
                $field['format'],
                $errors['format']
            );
            $formErrors['count']++;
        }
        return $formErrors;
    }

    /**
     * Uploads media.
     *
     * @param mixed $media      media file to upload
     * @param array $post       post data
     * @param array $file       file data
     * @param array $formErrors errors messages
     *
     * @return bool
     */
    private function uploadMedia($media, array $post, array &$file, array &$formErrors)
    {
        if (!$media || !$post || is_null($file) || is_null($formErrors)) {
            return false;
        }

        $directory = $this->getPostMediaDirectory($post);
        $filename = $this->getService('upload')->moveUploadedFile($media, $directory, true);
        if ($filename) {
            $file = [
                'filename' => $filename,
                'size'     => $media->getSize(),
                'type'     => $media->getClientMediaType(),
            ];
        } else {
            $errors = $this->getService('config')->get()['errors']['post']['media'];
            $formErrors['media'][] = $errors['filename'];
            $formErrors['count']++;
        }
        return true;
    }

    /**
     * Stores media into DB.
     *
     * @param array $file media data
     * @param array $post post data
     *
     * @return bool
     */
    private function storeMedia(array &$file, array $post)
    {
        if (is_null($file) || !$post) {
            return false;
        }

        $file['id'] = $this->generatePostMediaId();
        $insertData = [
            'media_id'     => $file['id'],
            'post_id'      => $post['post_id'],
            'media_format' => $this->getMediaFormat($file['type']),
            'source_url'   => $this->getMediaSourceUrl($file, $post),
            'create_time'  => gmdate('Y-m-d H:i:s'),
        ];

        $postMediaModel = new GmbPostMediaModel($this->dbService, $this->logger);
        $status = $postMediaModel->insertPostMedia($insertData);
        return $status;
    }

    /**
     * Returns path to directory with post's media
     *
     * @param array $post post data
     *
     * @return string|bool
     */
    private function getPostMediaDirectory(array $post)
    {
        if (!$post) {
            return false;
        }

        $config = $this->getService('config')->get();
        return $config['paths']['post_media']['storage']
              . $post['location_id'] . DIRECTORY_SEPARATOR
              . $post['post_id'] . DIRECTORY_SEPARATOR;
    }

    /**
     * Returns URL path to directory with post's media
     *
     * @param array $file file data
     * @param array $post post data
     *
     * @return string|bool
     */
    private function getMediaSourceUrl(array $file, array $post)
    {
        if (!$file || !$post) {
            return false;
        }

        $config = $this->getService('config')->get();
        return $config['app']['url'] . $config['paths']['post_media']['relative']
              . $post['location_id'] . '/' . $post['post_id'] . '/'
              . $file['filename'];
    }

    /**
     * Returns media format photo|video|media_format_unspecified
     *
     * @param string $mimeType file mime type
     *
     * @return string
     */
    private function getMediaFormat(string $mimeType)
    {
        $format = 'media_format_unspecified';

        $components = explode('/', $mimeType);
        if (empty($components[0])) {
            return $format;
        }

        if ($components[0] === 'image') {
            $format = 'photo';
        } elseif ($components[0] === 'video') {
            $format = 'video';
        }

        return $format;
    }

    /**
     * Generates random post ID
     *
     * @return string
     */
    private function generatePostId()
    {
        return 'new-post-' . uniqid();
    }

    /**
     * Generates random post media ID
     *
     * @return string
     */
    private function generatePostMediaId()
    {
        return 'new-post-media-' . uniqid();
    }
}
