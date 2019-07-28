<?php
/**
 * This file contains portal's SpecialFeaturesController.
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
namespace App\Controllers\Dealers\Website\Order\Create;

use App\Kernel\ControllerAbstract;
use App\Kernel\Slim\App;
use App\Controllers\Dealers\Website\Order\Create\CreateOrderController;
use App\Models\Dealers\Costs\CostsTypesModel;

/**
 * This controller contains actions for the Website Pages page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class SpecialFeaturesController extends CreateOrderController
{
    private $slug = 'special-features';
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
            return $this->goBack('start');
        }
        if ($this->hasCompletedOrder($data['user']->id)) {
            return $this->goWebsite();
        }

        $data['action'] = [
            'form' => $config['routes']['order-' . $this->slug]
        ];
        $data['messages'] = $this->getService('flash')->getMessages();
        $data['summary'] = (empty($data['messages']['input'][0]))
            ? $this->getSummary($data['costs'], $data['order'])
            : $this->getSummary($data['costs'], $data['order'], $data['messages']['input'][0]);

        return $this->render('Dealers/website/order/' . $this->slug . '.twig', $data);
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

        $data['user_id'] = $this->getService('session')->user['id'];

        $errors = $this->getService('config')->get()['errors'];
        $sections = $this->getSections($data);
        $missedSections = $this->validateData($data, $sections);
        if ($missedSections) {
            $this->displayFormInput($data);
            $this->getService('flash')->addMessage(
                'message',
                [
                    'status' => 'error',
                    'text'   => str_replace(
                        ':sections',
                        implode(', ', $missedSections),
                        $errors['order_website']['required']
                    )
                ]
            );
            return $this->goBack($this->slug);
        }

        $statuses = [];
        foreach ($sections as $section) {
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

        return $this->handleNextAction($data['action'], 'website-pages', 'estimated-cost');
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
        foreach ($sections as $section) {
            if (empty($data[$section])) {
                $errors[] = $section;
            }
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
        $sections = [];
        $costsTypesModel = new CostsTypesModel($this->getService('db'));
        $costsTypes = $costsTypesModel->getCostsTypes(['group' => 'special_features']);
        if (!$costsTypes) {
            return $sections;
        }

        foreach ($costsTypes as $type) {
            $sections[] = $type->name;
        }

        return $sections;
    }
}
