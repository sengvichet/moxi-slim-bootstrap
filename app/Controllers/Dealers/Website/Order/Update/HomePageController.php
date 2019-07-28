<?php
/**
 * This file contains portal's update HomePageController.
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
namespace App\Controllers\Dealers\Website\Order\Update;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\Update\UpdateOrderController;
use App\Models\Dealers\Costs\CostsTypesModel;

/**
 * This controller contains actions for the update Home Page page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class HomePageController extends UpdateOrderController
{
    private $slug = 'update-home-page';
    /**
     * Renders the index page.
     *
     * @return string
     */
    public function index()
    {
        $config = $this->getService('config')->get();
        $data = $this->getIndexData();
        if (empty($data['order'])) {
            return $this->goWebsite();
        }

        $data['action'] = [
            'form' => $config['routes']['order-' . $this->slug]
        ];
        $data['messages'] = $this->getService('flash')->getMessages();
        $data['summary'] = (empty($data['messages']['input'][0]))
            ? $this->getSummary($data['costs'], $data['order'])
            : $this->getSummary($data['costs'], $data['order'], $data['messages']['input'][0]);

        return $this->render('Dealers/website/order/update/home-page.twig', $data);
    }

    /**
     * Stores products number data
     *
     * @return void
     */
    public function store()
    {
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->goBack($this->slug);
        }

        $data = $request->getParams();
        if (empty($data['order_id'])) {
            return $this->goWebsite();
        }
        $data['user_id'] = $this->getService('session')->user['id'];

        $errors = $this->getService('config')->get()['errors'];
        $sections = $this->getSections($data);
        $missedSections = $this->validateData($data, $sections);
        if ($missedSections) {
            $this->displayFormInput($data);
            $this->getService('flash')->addMessage(
                'message',
                ['status' => 'error',
                'text'    => str_replace(
                    ':sections',
                    str_replace('_', ' ', implode(', ', $missedSections)),
                    $errors['order_website']['required']
                )]
            );
            return $this->goBack($this->slug);
        }

        $statuses = [];
        foreach ($sections['alter_sections'] as $section) {
            $statuses[] = $this->storeCosts($data, $section);
        }
        $status = array_sum($statuses);

        $statuses = [$status];
        foreach ($sections['sections'] as $section) {
            $statuses[] = $this->storeCosts($data, $section);
        }
        $status = array_product($statuses);

        if (!$status) {
            $this->displayFormInput($data);
            $this->getService('flash')->addMessage(
                'message',
                ['status' => 'error', 'text' => $errors['not_saved']]
            );
            return $this->goBack($this->slug);
        }

        return $this->handleNextAction($data['action'], 'website-package', 'website-pages');
    }

    /**
     * Validates form data
     *
     * @param array $data     form data
     * @param array $sections sections to validate
     *
     * @return array missed sections
     */
    private function validateData(array $data, array $sections)
    {
        if (!$data) {
            return $sections;
        }

        $errors = [];
        foreach ($sections['sections'] as $section) {
            if (empty($data[$section])) {
                $errors[] = $section;
            }
        }
        $empty = 0;
        foreach ($sections['alter_sections'] as $section) {
            if (empty($data[$section])) {
                $empty++;
            }
        }
        if ($empty === count($sections['alter_sections'])) {
            $errors[] = 'banner';
        }
        return $errors;
    }

    /**
     * Returns form sections
     *
     * @param array $data form data
     *
     * @return array
     */
    private function getSections(array $data)
    {
        $sections = $alterSections = [];
        $costsTypesModel = new CostsTypesModel($this->getService('db'));
        $costsTypes = $costsTypesModel->getCostsTypes(['group' => 'home_page']);
        if (!$costsTypes) {
            return $sections;
        }

        foreach ($costsTypes as $type) {
            if ($type->subgroup == 'banner') {
                $alterSections[] = $type->name;
            } else {
                $sections[] = $type->name;
            }
        }

        return ['sections' => $sections, 'alter_sections' => $alterSections];
    }
}
