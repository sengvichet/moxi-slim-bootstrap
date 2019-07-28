<?php
/**
 * This file contains a class for sending email notifications on order events.
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
use App\Models\Dealers\Company\CompanyModel;
use App\Models\Dealers\Costs\CostsTypesModel;
use App\Models\Dealers\Order\OrderCostsModel;

/**
 *  This class contains methods for sending email notifications on order events.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class OrderEmail
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
        $this->config    = $config['email']['order'];
    }

    /**
     * Sends email notification on order event
     *
     * @param string $type    'create'|'update'
     * @param int    $userId  user ID
     * @param int    $orderId order ID
     *
     * @return array statuses
     */
    public function sendEmailNotification(string $type, int $userId, int $orderId)
    {
        $statuses  = [];
        $receivers = $this->config[$type]['email'];

        $content   = $this->prepareContent($userId, $orderId);
        $emailData = $this->prepareEmailData($type, $content);

        foreach ($receivers as $email) {
            $emailData['emails'] = [$email => ''];
            $status = $this->mailer->sendEmail($emailData);
            $this->mailer->refresh();
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
     * Prepares order data for email
     *
     * @param int $userId  user ID
     * @param int $orderId order ID
     *
     * @return array prepared data
     */
    private function prepareContent(int $userId, int $orderId)
    {
        $preparedData = [];
        $this->prepareDealerData($preparedData, $userId);
        $this->prepareCompanyData($preparedData, $userId);
        $this->prepareOrderData($preparedData, $orderId);
        return $preparedData;
    }

    /**
     * Prepares dealer's data
     *
     * @param array $preparedData email content
     * @param int   $userId       user ID
     *
     * @return void
     */
    private function prepareDealerData(array &$preparedData, int $userId)
    {
        $userModel = new UserModel($this->dbService);
        $dealer = $userModel->getUser(['id' => $userId]);

        $userFields = ['first_name', 'last_name', 'email'];
        foreach ($userFields as $field) {
            $preparedData['dealer.' . $field] = $dealer->{$field};
        }
    }

    /**
     * Prepares company's data
     *
     * @param array $preparedData email content
     * @param int   $userId       user ID
     *
     * @return void
     */
    private function prepareCompanyData(array &$preparedData, int $userId)
    {
        $companyModel = new CompanyModel($this->dbService);
        $company = $companyModel->getCompany(['user_id' => $userId]);
        $preparedData['company.business_name'] = $company->business_name;
    }

    /**
     * Prepares order data
     *
     * @param array $preparedData email content
     * @param int   $orderId      order ID
     *
     * @return void
     */
    private function prepareOrderData(array &$preparedData, int $orderId)
    {
        $costsTypesModel = new CostsTypesModel($this->dbService);
        $types = $costsTypesModel->getCostsTypes();
        if (!$types || $types->isEmpty()) {
            return;
        }

        $preparedData['totals.cost'] = $preparedData['totals.setup'] = 0;

        foreach ($types as $type) {
            $preparedData['costs.' . $type->name . '.title'] = $type->title;
            if ($type->name === 'website_page' || $type->name === 'extra_website_page') {
                $preparedData['costs.' . $type->name . '.option.title'] = [];
                $preparedData['costs.' . $type->name . '.option.cost']  = [];
                $preparedData['costs.' . $type->name . '.option.setup'] = [];
            } else {
                $preparedData['costs.' . $type->name . '.option.title'] = '';
                $preparedData['costs.' . $type->name . '.option.cost']  = 0;
                $preparedData['costs.' . $type->name . '.option.setup'] = 0;
            }
        }

        $orderCostsModel = new OrderCostsModel($this->dbService);
        $costs = $orderCostsModel->getOrderTypesCostsData($orderId);

        foreach ($costs as $cost) {
            $field = 'costs.' . $cost->name;
            if (array_key_exists($field . '.title', $preparedData)) {
                if ($cost->name === 'website_page'
                    || $cost->name === 'extra_website_page'
                ) {
                    $preparedData[$field . '.option.title'][] = $cost->title;
                    $preparedData[$field . '.option.cost'][]  = $cost->cost;
                    $preparedData[$field . '.option.setup'][] = $cost->setup;
                } else {
                    $preparedData[$field . '.option.title'] = $cost->title;
                    $preparedData[$field . '.option.cost']  = $cost->cost;
                    $preparedData[$field . '.option.setup'] = $cost->setup;
                }
                $preparedData['totals.cost']  += $cost->cost;
                $preparedData['totals.setup'] += $cost->setup;
            }
        }
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
            'text'        => '',
            'subject'     => $this->config[$type]['subject'],
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

        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                $template = str_replace('{{ ' . $key .  ' }}', $value, $template);
            }
        }

        $rows = '';
        foreach ($data['costs.website_page.option.title'] as $key => $title) {
            $rows .= '<tr><td>';
            $rows .= str_replace('{id}', $key + 1, $data['costs.website_page.title']);
            $rows .= '</td><td>' . $title . '</td>';
            $rows .= '<td>$' . $data['costs.website_page.option.cost'][$key] . '</td>';
            $rows .= '<td>$' . $data['costs.website_page.option.setup'][$key] . '</td>';
        }
        $template = str_replace('<!-- {{ website_pages }} -->', $rows, $template);

        $rows = '';
        foreach ($data['costs.extra_website_page.option.title'] as $key => $title) {
            $rows .= '<tr><td>';
            $rows .= str_replace('{id}', $key + 1, $data['costs.extra_website_page.title']);
            $rows .= '</td><td>' . $title . '</td>';
            $rows .= '<td>$' . $data['costs.extra_website_page.option.cost'][$key] . '</td>';
            $rows .= '<td>$' . $data['costs.extra_website_page.option.setup'][$key] . '</td>';
        }
        $template = str_replace('<!-- {{ extra_website_pages }} -->', $rows, $template);

        return $template;
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
}
