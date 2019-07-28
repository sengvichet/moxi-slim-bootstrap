<?php
/**
 * This file contains a class for sending email notifications on GMB events.
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

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Collection;
use Classes\Email;
use Monolog\Logger;
use App\Models\Dealers\User\UserModel;
use App\Models\Common\Gmb\GmbLocationModel;
use App\Models\Common\Gmb\GmbEmailNotificationModel;

/**
 *  This class contains methods for sending email notifications on GMB events.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class GmbEmail
{
    /**
     * DB service
     *
     * @var Manager
     */
    private $dbService;
    /**
     * Mailer service
     *
     * @var Email
     */
    private $mailer;
    /**
     * Logger service
     *
     * @var Logger
     */
    private $logger;
    /**
     * Config settings
     *
     * @var array
     */
    private $config;

    /**
     * Initialises services
     *
     * @param Manager $dbService service settings
     * @param Email   $mailer    mailer service
     * @param Logger  $logger    logger service
     * @param array   $config    config settings
     */
    public function __construct(Manager $dbService, Email $mailer, Logger $logger, array $config)
    {
        $this->dbService = $dbService;
        $this->mailer    = $mailer;
        $this->logger    = $logger;
        $this->config    = $config['email']['gmb_update'];
    }

    /**
     * Sends email notification on GMB event
     *
     * @param string $type     new GMB instance type
     * @param array  $instance new GMB instance data
     *
     * @return array statuses
     */
    public function sendEmailNotification(string $type, array $instance)
    {
        $statuses  = [];
        $receivers = $this->config[$type]['email'];

        $content   = $this->prepareContent($instance);
        $emailData = $this->prepareEmailData($type, $content);

        foreach ($receivers as $email) {
            $emailData['emails'] = [$email => ''];
            $status = $this->mailer->sendEmail($emailData);
            $this->mailer->refresh();

            $logData = [
                'instance_type' => $type,
                'instance_id'   => $content['instance'][$type . '_id'],
                'email'         => $email,
                'is_sent'       => $status,
                'timestamp'     => gmdate('Y-m-d H:i:s'),
            ];
            $this->logEmail($logData);
            $statuses[] = $status;
        }

        return $statuses;
    }

    /**
     * Returns array of admins' emails and names
     *
     * @return array [[email => name], [email => name], ...]
     */
    private function prepareAdminsEmails()
    {
        $emails = [];
        $admins = $this->getAdmins();
        if (!$admins) {
            return $emails;
        }

        foreach ($admins as $admin) {
            $emails[$admin->email] = $admin->first_name . ' ' . $admin->last_name;
        }
        return $emails;
    }

    /**
     * Returns necessary data for email content
     *
     * @param array $instance new GMB instance
     *
     * @return array [location => object, instance => array]
     */
    private function prepareContent(array $instance)
    {
        $locationId = $instance['location_id'];
        $data['location'] = $this->getLocation($locationId);
        $data['instance'] = $instance;
        return $data;
    }

    /**
     * Returns array with ready data for sending an email
     *
     * @param string $type    content type post|reply|location
     * @param array  $content content data for email body
     *
     * @return array prepared data
     */
    public function prepareEmailData(string $type, array $content)
    {
        $data = [
            'html'        => $this->prepareEmailHtml($type, $content),
            'text'        => $this->prepareEmailText($type, $content),
            'subject'     => $this->config[$type],
            'attachments' => []
        ];

        return $data;
    }

    /**
     * Prepares email HTML content
     *
     * @param string $type content type
     * @param array  $data content data
     *
     * @return string
     */
    private function prepareEmailHtml(string $type, array $data)
    {
        $filename = $this->config[$type]['template'];
        $template = file_get_contents($filename);

        foreach ($data as $key => $values) {
            foreach ($values as $field => $value) {
                $template = str_replace(
                    '{{ ' . $key . '.' . $field . ' }}',
                    $value,
                    $template
                );
            }
        }

        return $template;
    }

    /**
     * Prepares email plain text content
     *
     * @param string $type content type
     * @param array  $data content data
     *
     * @return string
     */
    private function prepareEmailText(string $type, array $data)
    {
        $message = $this->config[$type]['message'];

        foreach ($data as $key => $values) {
            foreach ($values as $field => $value) {
                $message = str_replace(
                    ':' . $key . '_' . $field,
                    $value,
                    $message
                );
            }
        }

        return $message;
    }

    /**
     * Registers email status in the DB
     *
     * @param array $data email log data
     *
     * @return bool
     */
    private function logEmail(array $data)
    {
        $emailModel = new GmbEmailNotificationModel($this->dbService, $this->logger);
        $status = $emailModel->insertEmailNotification($data);
        return $status;
    }

    /**
     * Returns admins data
     *
     * @return Collection|bool
     */
    private function getAdmins()
    {
        return (new UserModel($this->dbService))->getAdmins();
    }

    /**
     * Returns location's data by id
     *
     * @param string $locationId GMB location ID
     *
     * @return \Illuminate\Support\Collection
     */
    private function getLocation(string $locationId)
    {
        $locationModel = new GmbLocationModel($this->dbService, $this->logger);
        $location = $locationModel->getLocation($locationId);
        return $location;
    }
}
