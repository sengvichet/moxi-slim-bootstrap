<?php
/**
 * This file contains portal's OrderController.
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

use App\Kernel\Slim\App;
use App\Controllers\Dealers\DealersController;
use App\Models\Dealers\Costs\CostsTypesModel;
use App\Models\Dealers\User\UsersGroupsModel;
use App\Models\Dealers\Company\CompanySocialMediaModel;
use App\Models\Dealers\Company\CompanyGoogleServicesModel;
use App\Models\Dealers\SocialMediaModel;

/**
 * This controller contains actions for the Website - Place an Order page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class OrderController extends DealersController
{
    /**
     * Returns user groups.
     *
     * @param int $userId user's id
     *
     * @return array groups ids
     */
    protected function getUserGroups(int $userId)
    {
        $usersGroupsModel = new UsersGroupsModel($this->getService('db'));
        $groups = $usersGroupsModel->getUserGroups($userId)->toArray();
        return $groups;
    }

    /**
     * Returns costs types.
     *
     * @param string $group costs types' group
     *
     * @return array costs types
     */
    protected function getCostsTypes(string $group = null)
    {
        $params = empty($group) ? [] : compact('group');
        $typesModel = new CostsTypesModel($this->getService('db'));
        $types = $typesModel->getCostsTypes($params);
        return $types;
    }

    /**
     * Returns all data related to user's company.
     *
     * @param int $userId authorized user ID
     *
     * @return mixed company data
     */
    protected function getCompanyData(int $userId)
    {
        $company = $this->getCompany($userId);
        $this->getCompanySocialMedia($company);
        $this->getCompanyGoogleServices($company);
        return $company;
    }

    /**
     * Adds social media data to company
     *
     * @param mixed $company company data
     *
     * @return void
     */
    protected function getCompanySocialMedia(&$company)
    {
        if (!$company) {
            return false;
        }
        $companySocialMediaModel = new CompanySocialMediaModel($this->getService('db'));
        $companySocialMedia = $companySocialMediaModel->getCompanySocialMedia($company->id);

        $socialMediaModel = new SocialMediaModel($this->getService('db'));
        $socialMedia = $socialMediaModel->getSocialMedia();

        $formMedia = ['facebook' => 0, 'twitter' => 0];

        foreach ($formMedia as $name => $id) {
            foreach ($socialMedia as $media) {
                if ($media->name === $name) {
                    $formMedia[$name] = $media->id;
                    break;
                }
            }
        }

        foreach ($formMedia as $name => $id) {
            foreach ($companySocialMedia as $media) {
                if ($media->social_media_id !== $id) {
                    continue;
                }
                $company->social_media[$name] = [];
                if ($media->name) {
                    $company->social_media[$name]['name'] = $media->name;
                }
            }
        }
    }

    /**
     * Adds Google services data to company
     *
     * @param mixed $company company data
     *
     * @return void
     */
    protected function getCompanyGoogleServices(&$company)
    {
        if (!$company) {
            return false;
        }
        $companyGoogleServicesModel = new CompanyGoogleServicesModel($this->getService('db'));
        $companyGoogleServices = $companyGoogleServicesModel->getCompanyGoogleServices($company->id);
        if ($companyGoogleServices) {
            $company->google_services = $companyGoogleServices;
        }
    }

    /**
     * Redirects user to the form page.
     *
     * @return Response
     */
    protected function goBack(string $page)
    {
        $redirectUrl = '/' . $this->getService('config')->get()['routes']['order-' . $page];
        return $this->getResponse()->withRedirect($redirectUrl, 301);
    }
}
