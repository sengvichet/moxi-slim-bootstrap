<?php
/**
 * This file contains a config server.
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
 *  Config class
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class Config
{
    /**
     * Config settings
     * @var array
     */
    private $settings;

    /**
     * Initialises settings
     *
     * @param array $settings service settings
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Returns settings
     *
     * @return array
     */
    public function get()
    {
        return $this->settings;
    }
}
