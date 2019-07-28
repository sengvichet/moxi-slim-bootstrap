<?php
/**
 * This file contains admin's SocialMediaController.
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
namespace App\Controllers\Admin;

use App\Kernel\Slim\App;
use App\Kernel\ControllerAbstract;
use App\Models\Dealers\User\UserModel;
use App\Models\Dealers\SocialMediaModel;
use App\Models\Common\DealerSocialMediaDataModel;
use Illuminate\Support\Collection;

/**
 * This controller contains actions for the Social Media page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class SocialMediaController extends ControllerAbstract
{
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $user = $this->getService('session')->user;
        $config = $this->getService('config')->get();
        $action = [
            'home' => $config['routes']['admin'],
            'save' => $config['routes']['admin-social-media'],
        ];
        $fields = $config['fields']['admin_social_media'];
        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }

        $dealers   = $this->getDealers();
        $platforms = $this->getSocialMedia();
        $data      = $this->getSocialMediaData();

        $data = compact('user', 'action', 'fields', 'messages', 'dealers', 'platforms', 'data');
        return $this->render('Admin/social_media/index.twig', $data);
    }

    /**
     * Stores dealer's social media data
     *
     * @return string
     */
    public function store()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->goBack();
        }

        $data = $request->getParams();

        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            $this->displayFormMessage('error');
            return $this->goBack();
        }
        $this->dbService = $this->getService('db');
        $this->logger    = $this->getService('logger');

        $status = $this->storeData($data);
        if ($status) {
            $this->displayFormMessage('success');
        } else {
            $this->displayFormInput($data);
            $this->displayFormMessage('error');
        }

        return $this->goBack();
    }

    /**
     * Returns all dealers
     *
     * @return Collection|bool
     */
    private function getDealers()
    {
        $userModel = new UserModel($this->dbService);
        $result = $userModel->getDealers();
        if (!$result) {
            return false;
        }

        $dealers = $this->prepareDealers($result);
        return $dealers;
    }

    /**
     * Prepares dealers array (key = dealer ID)
     *
     * @param Collection $rows DB rows
     *
     * @return array [[id => dealer], [id => dealer], ...]
     */
    private function prepareDealers(Collection $rows)
    {
        $dealers = [];
        foreach ($rows as $row) {
            $dealers[$row->id] = $row;
        }
        return $dealers;
    }

    /**
     * Returns social media with data
     *
     * @return Collection|bool
     */
    private function getSocialMedia()
    {
        $socialMediaModel = new SocialMediaModel($this->dbService);
        $result = $socialMediaModel->getSocialMedia(['has_data' => true]);
        if (!$result) {
            return false;
        }

        $media = $this->prepareSocialMedia($result);
        return $media;
    }

    /**
     * Prepares social media array (key = social media ID)
     *
     * @param Collection $rows DB rows
     *
     * @return array [[id => media], [id => media], ...]
     */
    private function prepareSocialMedia(Collection $rows)
    {
        $media = [];
        foreach ($rows as $row) {
            $media[$row->id] = $row;
        }
        return $media;
    }

    /**
     * Returns all social media data for all dealers
     *
     * @return Collection|bool
     */
    private function getSocialMediaData()
    {
        $dealerSocialMediaModel = new DealerSocialMediaDataModel(
            $this->dbService,
            $this->logger
        );
        $data = $dealerSocialMediaModel->getDealersSocialMediaData();
        return $data;
    }

    /**
     * Validates form data
     *
     * @param array $data form data
     *
     * @return array of errors
     */
    private function validateData(array $data)
    {
        $errors = ['count' => 0];
        $formErrorsService = $this->getService('formErrors');

        $fieldsValidation = [
            'dealer'      => ['empty'],
            'year'        => ['empty', 'integer', 'min_value', 'max_value'],
            'month'       => ['empty', 'integer', 'min_value', 'max_value'],
            'day'         => ['empty'],
            'platform'    => ['empty'],
            'posts'       => ['integer', 'min_value', 'max_value'],
            'engagements' => ['integer', 'min_value', 'max_value'],
            'impressions' => ['integer', 'min_value', 'max_value'],
        ];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data,
                    ['form' => 'admin_social_media', 'field' => $field],
                    &$errors]
                );
            }
        }
        return $errors;
    }

    /**
     * Stores dealer's social media data into DB
     *
     * @param array $data form data
     *
     * @return bool status
     */
    private function storeData(array $data)
    {
        $dealerSocialMediaModel = new DealerSocialMediaDataModel(
            $this->dbService,
            $this->logger
        );
        $date = $this->getDate((int) $data['year'], (int) $data['month']);
        $params = [
            'dealer_id'       => $data['dealer'],
            'date'            => $date,
            'day_of_week'     => $data['day'],
            'social_media_id' => $data['platform'],
        ];
        $row = $dealerSocialMediaModel->getDealerSocialMediaData($params);
        if ($row) {
            $updateData = [
                'id'          => $row->id,
                'posts'       => $data['posts'],
                'engagements' => $data['engagements'],
                'impressions' => (empty($data['impressions']))
                    ? null : $data['impressions'],
                'updated_at'  => gmdate('Y-m-d H:i:s'),
            ];
            $status = $dealerSocialMediaModel->updateDealerSocialMediaData($updateData);
            return $status;
        }
        $insertData = [
            'dealer_id'       => $data['dealer'],
            'date'            => $date,
            'day_of_week'     => $data['day'],
            'social_media_id' => $data['platform'],
            'posts'           => $data['posts'],
            'engagements'     => $data['engagements'],
            'impressions'     => (empty($data['impressions']))
                ? null : $data['impressions'],
            'updated_at'      => gmdate('Y-m-d H:i:s'),
        ];
        $status = $dealerSocialMediaModel->insertDealerSocialMediaData($insertData);
        return $status;
    }

    /**
     * Returns formated date Y-m-d
     *
     * @param  int    $year  year
     * @param  int    $month month
     *
     * @return string
     */
    private function getDate(int $year, int $month)
    {
        $date = new \DateTime();
        $date->setDate($year, $month, 1);
        $date = $date->format('Y-m-d');
        return $date;
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    private function goBack()
    {
        $config = $this->getService('config')->get();
        $redirectUrl = '/' . $config['routes']['admin-social-media'];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }

    /**
     * Displays general form message
     *
     * @param string $status form processing status
     *
     * @return void
     */
    private function displayFormMessage(string $status)
    {
        $config = $this->getService('config')->get();
        $this->getService('flash')->addMessage(
            'message',
            [[
                'status' => $status,
                'text' => $config['messages']['admin_social_media'][$status]
            ]]
        );
    }

    /**
     * Adds errors messages to the session.
     *
     * @param array $errors error messages
     *
     * @return void
     */
    private function displayFormErrors(array $errors)
    {
        $this->getService('flash')->addMessage('error', $errors);
    }

    /**
     * Adds old form data to the session.
     *
     * @param array $data old form input
     *
     * @return void
     */
    private function displayFormInput(array $data)
    {
        $this->getService('flash')->addMessage('input', $data);
    }
}
