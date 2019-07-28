<?php
/**
 * This file contains portal's EmailOrderController.
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
namespace App\Controllers\Dealers\Website\Order;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\OrderController;
use App\Models\Dealers\Order\OrderCostsModel;
use App\Models\Dealers\Costs\CostsOptionsModel;

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class EmailOrderController extends OrderController
{
    /**
     * Sends email with order to Place1Seo
     *
     * @return string
     */
    public function email()
    {
        $request = $this->getRequest();

        if (!$request->isXhr()) {
            return $this->goBack();
        }
        
        if (!$request->isPost()) {
            return $this->getAjaxResponse('error');
        }

        $data = $request->getParams();
        $data['user_id'] = $this->getService('session')->user['id'];

        $config = $this->getService('config')->get()['email']['order_create'];

        $emailData = $this->prepareEmailData($data);
        $emailTemplate = $this->prepareEmailTemplate(
            $config['template'], $emailData
        );
        $status = $this->getService('email')->sendEmail(
            [
                'emails'  => [$config['email'] => ''],
                'subject' => $config['subject'],
                'html'    => $emailTemplate,
            ]
        );
        return ($status) ? $this->getAjaxResponse('success')
                         : $this->getAjaxResponse('error');
    }

    /**
     * Prepares order data for email
     *
     * @param array $data request data ['user_id' => '', 'order_id' => '']
     *
     * @return array prepared data ['email' => '', 'subject' => '', 'message' => '']
     */
    private function prepareEmailData(array $data)
    {
        $preparedData = ['permanent' => [], 'optional' => []];
        $company = $this->getCompanyData($data['user_id']);
        $this->prepareEmailOrderData($preparedData, $data);
        $this->prepareEmailContactData($preparedData);
        $this->prepareEmailCompanyData($preparedData, $company);
        $this->prepareEmailSocialMediaData($preparedData, $company);
        $this->prepareEmailAdwordsData($preparedData, $company);
        $this->prepareEmailOptionalData($preparedData, $company);

        return $preparedData;
    }

    private function prepareEmailTemplate(string $templatePath, array $data)
    {
        if (!$templatePath || !realpath($templatePath) || !$data) {
            return false;
        }
        $template = file_get_contents($templatePath);

        foreach ($data['optional'] as $key => $value) {
            if (!$value) {
                $this->removeTemplateSection($template, $key);
            }
        }

        foreach ($data['permanent'] as $key => $value) {
            $template = str_replace('{{ ' . $key . ' }}', $value, $template);
        }

        return $template;
    }

    private function prepareEmailOrderData(array &$preparedData, array $data)
    {
        $userGroups = $this->getUserGroups($data['user_id']);
        $costsTypes = $this->getCostsTypes($userGroups);        

        foreach ($costsTypes as $costsType) {
            $orderCostsModel = new OrderCostsModel($this->getService('db'));
            $orderTypeCosts = $orderCostsModel->getOrderTypeCosts(
                $data['order_id'], $costsType->id
            );
            
            $costsOptionsModel = new CostsOptionsModel($this->getService('db'));
            $option = $costsOptionsModel->getCostsOption(
                $costsType->id, $orderTypeCosts->costs_option_id
            );
            
            $preparedData['permanent']['order.' . $costsType->name] = $option->description;
        }
    }

    private function prepareEmailContactData(array &$preparedData)
    {
        $user = $this->getUser();
        $userFields = ['first_name', 'last_name', 'email'];
        foreach ($userFields as $field) {
            $preparedData['permanent']['contact.' . $field] = $user->{$field};
        }
    }

    private function prepareEmailCompanyData(array &$preparedData, $company)
    {
        $companyFields = ['business_name', 'street', 'city', 'state', 'zip', 'email_mail', 'phone', 'domain', 'email'];
        foreach ($companyFields as $field) {
            $preparedData['permanent']['company.' . $field] = $company->{$field};
        }
    }

    private function prepareEmailSocialMediaData(array &$preparedData, $company)
    {
        if (!property_exists($company, 'social_media')) {
            return;
        }

        $socialMediaFields = ['facebook', 'twitter'];
        foreach ($socialMediaFields as $field) {
            $preparedData['permanent']['social_media.' . $field . '.name']
                = (!empty($company->social_media[$field]['name']))
                    ? $company->social_media[$field]['name']
                    : '-';
        }
    }

    private function prepareEmailAdwordsData(array &$preparedData, $company)
    {
        $preparedData['permanent']['google_services.adwords_ppc_budget']
            = ($company->google_services->adwords_ppc_budget) ?: '';
    }

    private function prepareEmailOptionalData(array &$preparedData, $company)
    {
        $preparedData['optional'] = [
            'company.domain'                    => $company->domain,
            'company.email'                     => $company->email,
            'google_services.has_analytics'     => ($company->google_services->has_analytics === 1),
            'social_media'                      => !empty($company->social_media),
            'social_media.facebook.1'           => array_key_exists('facebook', $company->social_media),
            'social_media.facebook.0'           => !array_key_exists('facebook', $company->social_media),
            'social_media.twitter.1'            => array_key_exists('twitter', $company->social_media),
            'social_media.twitter.0'            => !array_key_exists('twitter', $company->social_media),
            'google_services.has_gmb.1'         => !empty($company->google_services->has_gmb),
            'google_services.has_gmb.0'         => empty($company->google_services->has_gmb),
            'adwords'                           => !empty($company->google_services->has_adwords_ppc),
            'google_services.has_adwords_ppc.1' => !empty($company->google_services->has_adwords_ppc),
            'google_services.has_adwords_ppc.0' => empty($company->google_services->has_adwords_ppc),
        ];
    }

    /**
     * Removes optional section from template
     *
     * @param string $template email template
     * @param string $key      section name
     *
     * @return void
     */
    private function removeTemplateSection(string &$template, string $key)
    {
        if (!$template || !$key) {
            return;
        }
        $start = strpos($template, '<!-- ' . $key . '-start -->');
        $end = strpos($template, '<!-- ' . $key . '-end -->');
        $length = $end - $start + strlen('<!-- ' . $key . '-end -->');
        if ($length) {
            $template = substr_replace($template, '', $start, $length);
        }
    }
}
