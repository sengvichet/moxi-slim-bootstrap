<?php
/**
 * This file contains a class to add form errors.
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

/**
 * This class is a wrapper of PHPMailer class.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class FormErrors
{
    /**
     * Config settings array
     */
    protected $settings;
    /**
     * Errors messages array
     */
    protected $errors;
    /**
     * Fields array
     */
    protected $fields;

    /**
     * Initializes FormErrors.
     *
     * @param array $settings errors config settings
     *
     * @return void
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;

        $this->errors = $this->settings['errors'];
        $this->fields = $this->settings['fields'];
    }

    /**
     * Adds error message for required field.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', 'field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addEmptyError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (empty($data[$field]) && !empty($this->errors[$form][$field]['empty'])) {
            $formErrors[$field][] = $this->errors[$form][$field]['empty'];
            return true;
        }

        return false;
    }

    /**
     * Adds error message for field with max_length attribute.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addMaxLengthError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (!empty($data[$field])
            && strlen($data[$field]) > $this->fields[$form][$field]['max_length']
        ) {
            $formErrors[$field][] = str_replace(
                ':length',
                $this->fields[$form][$field]['max_length'],
                $this->errors[$form][$field]['max_length']
            );
            return true;
        }

        return false;
    }

    /**
     * Adds error message for array of fields with max_length attribute.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addArrayMaxLengthError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (!empty($data[$field])) {
            foreach ($data[$field] as $value) {
                if (strlen($value) > $this->fields[$form][$field]['array_max_length']) {
                    $formErrors[$field][] = str_replace(
                        ':length',
                        $this->fields[$form][$field]['array_max_length'],
                        $this->errors[$form][$field]['array_max_length']
                    );
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Adds error message for field with url type.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addUrlError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (!empty($data[$field])
            && !filter_var($data[$field], FILTER_VALIDATE_URL)
        ) {
            $formErrors[$field][] = $this->errors[$form][$field]['url'];
            return true;
        }

        return false;
    }

    /**
     * Adds error message for field with domain value.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addDomainError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (!empty($data[$field])
            && !filter_var($data[$field], FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)
        ) {
            $formErrors[$field][] = $this->errors[$form][$field]['domain'];
            return true;
        }

        return false;
    }

    /**
     * Adds error message for field with email type.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addEmailError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (!empty($data[$field])
            && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)
        ) {
            $formErrors[$field][] = $this->errors[$form][$field]['email'];
            return true;
        }

        return false;
    }

    /**
     * Adds error message for boolean field.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', 'field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addBooleanError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (array_key_exists($field, $data)
            && !($data[$field] === 0
            || $data[$field] === '0'
            || $data[$field] === false
            || $data[$field] === 1
            || $data[$field] === '1'
            || $data[$field] === true)
            && (!empty($this->errors[$form][$field]['boolean']))
        ) {
            $formErrors[$field][] = $this->errors[$form][$field]['boolean'];
            return true;
        }

        return false;
    }

    /**
     * Adds error message for integer field.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', 'field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addIntegerError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (array_key_exists($field, $data)
            && filter_var($data[$field], FILTER_VALIDATE_INT) === false
            && !empty($this->errors[$form][$field]['integer'])
        ) {
            $formErrors[$field][] = $this->errors[$form][$field]['integer'];
            return true;
        }

        return false;
    }

    /**
     * Adds error message for field with min value attribute.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', 'field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addMinValueError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (array_key_exists($field, $data)
            && $data[$field] < $this->fields[$form][$field]['min_value']
            && !empty($this->errors[$form][$field]['min_value'])
        ) {
            $formErrors[$field][] = str_replace(
                ':min_value',
                $this->fields[$form][$field]['min_value'],
                $this->errors[$form][$field]['min_value']
            );
            return true;
        }

        return false;
    }

    /**
     * Adds error message for field with max value attribute.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', 'field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addMaxValueError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (array_key_exists($field, $data)
            && $data[$field] > $this->fields[$form][$field]['max_value']
            && !empty($this->errors[$form][$field]['max_value'])
        ) {
            $formErrors[$field][] = str_replace(
                ':max_value',
                $this->fields[$form][$field]['max_value'],
                $this->errors[$form][$field]['max_value']
            );
            return true;
        }

        return false;
    }

    /**
     * Adds error message for field with date type.
     *
     * @param array $data       form data
     * @param array $formField  ['form' => '', field' => '']
     * @param array $formErrors error messages array
     *
     * @return void
     */
    public function addDateError(array $data, array $formField, array &$formErrors)
    {
        if (!$data || empty($formField['form']) || empty($formField['field'])) {
            return false;
        }

        $form = $formField['form'];
        $field = $formField['field'];

        if (!empty($data[$field])) {
            $dateComponents = explode('-', $data[$field]);
            $year  = (empty($dateComponents[0])) ? 0 : ((int) $dateComponents[0]);
            $month = (empty($dateComponents[1])) ? 0 : ((int) $dateComponents[1]);
            $day   = (empty($dateComponents[2])) ? 0 : ((int) $dateComponents[2]);

            if (!checkdate($month, $day, $year)) {
                $formErrors[$field][] = $this->errors[$form][$field]['date'];
                return true;
            }
        }

        return false;
    }
}
