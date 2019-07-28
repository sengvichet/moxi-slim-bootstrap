<?php
/**
 * This file contains portal's WebsitePagesController.
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
use App\Models\Dealers\Order\OrderCostsModel;
use App\Models\Dealers\Order\OrderWebsitePagesModel;

/**
 * This controller contains actions for the Website Pages page.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class WebsitePagesController extends CreateOrderController
{
    private $slug = 'website-pages';
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
        $data['included_pages_number'] = $config['misc']['website_pages']['included_pages_number'];
        if (!empty($data['order']['order_costs_ids']['website_page'])) {
            $data['order']['website_pages'] = $this->getWebsitePages(
                $data['order']['order_costs_ids']['website_page']
            );
        }
        if (!empty($data['order']['order_costs_ids']['extra_website_page'])) {
            $data['order']['extra_website_pages'] = $this->getWebsitePages(
                $data['order']['order_costs_ids']['extra_website_page']
            );
        }
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
        $this->prepareData($data);
        $data['user_id'] = $this->getService('session')->user['id'];
        $errors = $this->getService('config')->get()['errors'];
        $missedSections = $this->validateData($data);
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

        $types = $this->getSections();
        foreach ($types as $type) {
            $ids = [];
            $status = $this->storeWebsitePagesCosts($data, $type, $ids);
            if (!$status) {
                $this->displayFormInput($data);
                $this->getService('flash')->addMessage(
                    'message',
                    ['status' => 'error', 'text' => $errors['not_saved']]
                );
                return $this->goBack($this->slug);
            }

            if (!$ids) {
                continue;
            }
            $status = $this->storeWebsitePagesTitles($data, $ids, $type);
            if (!$status) {
                $this->displayFormInput($data);
                $this->getService('flash')->addMessage(
                    'message',
                    ['status' => 'error', 'text' => $errors['not_saved']]
                );
                return $this->goBack($this->slug);
            }
        }

        return $this->handleNextAction($data['action'], 'home-page', 'special-features');
    }

    /**
     * Replaces old website pages costs DB records with new ones
     *
     * @param array  $data     form data
     * @param string $type     costs type
     * @param array  $costsIds costs ID's
     *
     * @return array|bool array of order costs ids
     */
    private function storeWebsitePagesCosts(array $data, string $type, array &$costsIds)
    {
        if (empty($data['order_id']) || !$type) {
            return false;
        }

        $dbService = $this->getService('db');

        $costsTypesModel = new CostsTypesModel($dbService);
        $costsType = $costsTypesModel->getCostsTypeByName($type);
        if (!$costsType) {
            return false;
        }

        $orderCostsModel = new OrderCostsModel($dbService);
        $orderCosts = $orderCostsModel->getOrderTypeCosts($data['order_id'], $costsType->id);
        foreach ($orderCosts as $orderCost) {
            $pagesModel = new OrderWebsitePagesModel($dbService);
            $pagesModel->deleteOrderWebsitePage($orderCost->id);
            $orderCostsModel = new OrderCostsModel($dbService);
            $orderCostsModel->deleteOrderCosts($orderCost->id);
        }

        $costs = ['order_id' => $data['order_id'], 'costs_type_id' => $costsType->id];

        $statuses = [];

        foreach ($data[$type] as $index => $value) {
            if ($value != 1) {
                $costs['costs_option_id'] = $value;
                $result = $orderCostsModel->insertOrderCosts($costs);
                if ($result) {
                    $costsIds[$index] = $result;
                    $statuses[] = true;
                } else {
                    $statuses[] = false;
                }
            } else {
                $statuses[] = true;
            }
        }

        $status = array_product($statuses);

        return $status;
    }

    /**
     * Inserts website pages titles into DB
     *
     * @param array  $data form data
     * @param array  $ids  order costs ids
     * @param string $type costs type
     *
     * @return bool
     */
    private function storeWebsitePagesTitles(array $data, array $ids, string $type)
    {
        if (empty($data[$type . '_title']) || !$ids || !$type) {
            return false;
        }

        $dbService = $this->getService('db');
        $status = true;

        foreach ($ids as $index => $id) {
            if ($data[$type . '_title'][$index]) {
                $pagesModel = new OrderWebsitePagesModel($dbService);
                $status = $pagesModel->insertOrderWebsitePages(
                    [
                    'order_costs_id' => $id,
                    'page_id'        => $index + 1,
                    'page_title'     => $data[$type . '_title'][$index]
                    ]
                );
            }
        }

        return $status;
    }

    private function getWebsitePages(array $orderCostsIds)
    {
        $pages = [];

        if (!$orderCostsIds) {
            return $pages;
        }

        $dbService = $this->getService('db');

        foreach ($orderCostsIds as $id) {
            $pagesModel = new OrderWebsitePagesModel($dbService);
            $page = $pagesModel->getOrderWebsitePage($id);
            if ($page) {
                $pages[$page->page_id] = $page->page_title;
            }
        }
        return $pages;
    }

    /**
     * Validates form data
     *
     * @param array $data     form data
     *
     * @return array missed sections
     */
    private function validateData(array $data)
    {
        $errors = [];

        if (empty($data['extra_website_page_title']) && !empty($data['extra_website_page'])) {
            $errors[] = 'extra website pages titles';
        }
        if (empty($data['extra_website_page']) && !empty($data['extra_website_page_title'])) {
            $errors[] = 'extra website pages types';
        }
        if (!empty($errors)) {
            return $errors;
        }

        if (!empty($data['website_page']) && !empty($data['website_page_title'])) {
            foreach ($data['website_page_title'] as $index => $title) {
                if (!empty($title)
                    && (empty($data['website_page'][$index])
                    || $data['website_page'][$index] == 1)
                ) {
                    $errors[] = 'website page #' . ($index + 1) . ' type';
                }
                if (empty($title)
                    && !empty($data['website_page'][$index])
                    && $data['website_page'][$index] != 1
                ) {
                    $errors[] = 'website page #' . ($index + 1) . ' title';
                }
                if ($index
                    && !empty($title)
                    && !empty($data['website_page'][$index])
                    && $data['website_page'][$index] != 1
                    && (empty($data['website_page_title'][$index - 1])
                    || empty($data['website_page'][$index - 1])
                    || $data['website_page'][$index - 1] == 1)
                ) {
                    $errors[] = 'website page #' . $index . ' title';
                    $errors[] = 'website page #' . $index . ' type';
                }
            }
        }

        if (!empty($data['extra_website_page_title'])) {
            foreach ($data['extra_website_page_title'] as $index => $title) {
                if (empty($title)) {
                    $errors[] = 'extra website page #' . ($index + 1) . ' title';
                }
                if (empty($data['extra_website_page'][$index])
                    || $data['extra_website_page'][$index] == 1
                ) {
                    $errors[] = 'extra website page #' . ($index + 1) . ' type';
                }
            }
        }

        return $errors;
    }

    /**
     * Returns form sections
     *
     * @return array
     */
    private function getSections()
    {
        $sections = [];
        $costsTypesModel = new CostsTypesModel($this->getService('db'));
        $costsTypes = $costsTypesModel->getCostsTypes(['group' => 'website_pages']);
        if (!$costsTypes) {
            return $sections;
        }

        foreach ($costsTypes as $type) {
            $sections[] = $type->name;
        }

        return $sections;
    }

    /**
     * Removes empty values from the form data
     *
     * @param array $data form data
     *
     * @return void
     */
    private function prepareData(array &$data)
    {
        $this->prepareWebsitePagesData($data);
        $this->prepareExtraWebsitePagesData($data);
    }

    /**
     * Removes empty values from the form data (included website pages)
     *
     * @param array $data form data
     *
     * @return void
     */
    private function prepareWebsitePagesData(array &$data)
    {
        if (empty($data['website_page']) || empty($data['website_page_title'])) {
            return;
        }
        $pagesNumber = $this->getService('config')->get()
            ['misc']['website_pages']['included_pages_number'];
        $preparedData = ['website_page_title' => [], 'website_page' => []];
        $index = 0;
        for ($i = 0; $i < $pagesNumber; $i++) {
            $title = $data['website_page_title'][$i];
            $type  = $data['website_page'][$i];
            if (!(empty($title) && (empty($type) || $type == 1))) {
                $preparedData['website_page_title'][$index] = $title;
                $preparedData['website_page'][$index] = $type;
                $index++;
            }
        }
        $data['website_page_title'] = $preparedData['website_page_title'];
        $data['website_page'] = $preparedData['website_page'];
    }

    /**
     * Removes empty values from the form data (extra website pages)
     *
     * @param array $data form data
     *
     * @return void
     */
    private function prepareExtraWebsitePagesData(array &$data)
    {
        if (empty($data['extra_website_page']) || empty($data['extra_website_page_title'])) {
            return;
        }

        if (empty($data['website_page']) || empty($data['website_page_title'])) {
            unset($data['extra_website_page']);
            unset($data['extra_website_page_title']);
            return;
        }

        $preparedData = ['extra_website_page_title' => [], 'extra_website_page' => []];
        $index = 0;
        foreach ($data['extra_website_page_title'] as $i => $title) {
            $type  = $data['extra_website_page'][$i];
            if (!(empty($title) && (empty($type) || $type == 1))) {
                $preparedData['extra_website_page_title'][$index] = $title;
                $preparedData['extra_website_page'][$index] = $type;
                $index++;
            }
        }
        $data['extra_website_page_title'] = $preparedData['extra_website_page_title'];
        $data['extra_website_page'] = $preparedData['extra_website_page'];
    }
}
