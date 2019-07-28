<?php
/**
 * This file contains portal's GmbReviewsReplyController.
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
use App\Models\Common\Gmb\GmbReviewModel;
use App\Models\Common\Gmb\DealersGmbAccountsModel;
use App\Models\Common\Gmb\GmbLocationModel;

/**
 * This controller contains actions for the Google My Business page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbReviewsReplyController extends DealersController
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
     * @param string $review GMB review's ID
     *
     * @return string
     */
    public function index($review)
    {
        $config = $this->getService('config')->get();
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');

        $menu = $this->getMenuItems();
        $route = $this->getCurrentRoute();

        $user = $this->getService('session')->user;
        $company = $this->getCompany($user['id']);

        $messages = $this->getService('flash')->getMessages();
        foreach ($messages as $key => $value) {
            if (!empty($value)) {
                $messages[$key] = $value[0];
            }
        }

        $data = compact('menu', 'route', 'user', 'company', 'messages');
        $data['review'] = $this->getReview($review);
        if ($data['review']) {
            $data['action'] = [
                'back' => $config['routes']['google-my-business-reviews']
                        . '?location=' . $data['review']->location_id,
                'save' => str_replace(
                    ':review',
                    $data['review']->review_id,
                    $config['routes']['google-my-business-reviews-reply-save']
                ),
                'edit' => str_replace(
                    ':review',
                    $data['review']->review_id,
                    $config['routes']['google-my-business-reviews-reply-edit']
                ),
                'delete' => str_replace(
                    ':review',
                    $data['review']->review_id,
                    $config['routes']['google-my-business-reviews-reply-delete']
                ),
            ];
        }
        return $this->render('Dealers/gmb/reviews/reply.twig', $data);
    }

    /**
     * Stores review reply
     *
     * @param string $review GMB review's ID
     *
     * @return string
     */
    public function store($review)
    {
        $request = $this->getRequest();
        $data = $request->getParams();

        $errors = $this->validateData($data);
        if (!empty($errors['count'])) {
            $this->displayFormInput($data);
            $this->displayFormErrors($errors);
            return $this->goBack($review);
        }

        $config = $this->getService('config')->get();
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');

        $reply = [];
        $status = $this->storeReply($review, $data['reply'], $reply);
        if (!$status) {
            $error = $config['errors']['not_saved'];
            $this->getService('flash')->addMessage('error', $error);
        }

        $reply['location_id'] = $this->getReview($review)->location_id;
        $reply['reply_id'] = $review;
        $this->getService('event')->emit(
            'gmb.reply',
            ['container' => $this->getContainer(), 'instance' => $reply]
        );
        return $this->goBack($review);
    }

    /**
     * Deletes review reply
     *
     * @param string $review GMB review's ID
     *
     * @return string
     */
    public function delete($review)
    {
        $config = $this->getService('config')->get();
        $this->dbService = $this->getService('db');
        $this->logger = $this->getService('logger');

        $reply = [];
        $status = $this->storeReply($review, null, $reply);
        if (!$status) {
            $error = $config['errors']['not_deleted'];
            $this->getService('flash')->addMessage('error', $error);
        }

        $reply['location_id'] = $this->getReview($review)->location_id;
        $reply['reply_id'] = $review;
        $this->getService('event')->emit(
            'gmb.reply',
            ['container' => $this->getContainer(), 'instance' => $reply]
        );

        return $this->goBack($review);
    }

    /**
     * Returns GMB review by ID
     *
     * @param string $id GMB review's ID
     *
     * @return object|bool
     */
    private function getReview(string $id)
    {
        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $review = $reviewModel->getReview($id);
        return $review;
    }

    /**
     * Updates reply in the DB
     *
     * @param string $review    GMB review ID
     * @param string $reply     reply
     * @param array  $replyData reply record
     *
     * @return bool
     */
    private function storeReply(string $review, string $reply = null, array &$replyData)
    {
        $replyData = [
            'review_id'              => $review,
            'reply_comment'          => $reply,
            'reply_update_timestamp' => gmdate('Y-m-d H:i:s'),
            'is_sync'                => 0,
        ];
        $reviewModel = new GmbReviewModel($this->dbService, $this->logger);
        $status = $reviewModel->updateReply($replyData);
        return $status;
    }

    /**
     * Redirects to the form page
     *
     * @param string $review GMB review ID
     *
     * @return static
     */
    private function goBack(string $review)
    {
        $config = $this->getService('config')->get();
        $redirectUrl = '/' . str_replace(
            ':review',
            $review,
            $config['routes']['google-my-business-reviews-reply']
        );
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

        $fieldsValidation = ['reply'  => ['empty']];

        $errors = ['count' => 0];

        foreach ($fieldsValidation as $field => $rules) {
            foreach ($rules as $rule) {
                $function = 'add' . str_replace('_', '', ucwords($rule, '_')) . 'Error';
                $errors['count'] += call_user_func_array(
                    [$formErrorsService, $function],
                    [$data, ['form' => 'reply', 'field' => $field], &$errors]
                );
            }
        }

        return $errors;
    }
}
