<?php
/**
 * This file contains a wrapper for $_SESSION to use it in classes.
 *
 * PHP version 7.1
 * 
 * @category Dealers
 * @package  Dealers
 * @author   Linblow <linblow@hotmail.fr>
 * @author   LAMPDev <author@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  GIT:
 * @link     http://php.net/manual/en/function.session-start.php
 */

namespace Classes;

/**
 *  Use the static method getInstance to get the object.
 * 
 * @category Dealers
 * @package  Dealers
 * @author   Linblow <linblow@hotmail.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://php.net/manual/en/function.session-start.php
 */
class Session
{
    const SESSION_STARTED = true;
    const SESSION_NOT_STARTED = false;

    /**
     * The state of the session
     */
    private $sessionState = self::SESSION_NOT_STARTED;

    /**
     * The only instance of the class
     */
    private static $instance;


    /**
     * Returns the instance of 'Session'.
     * The session is automatically initialized if it wasn't.
     *    
     * @return object
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        
        self::$instance->startSession();
        
        return self::$instance;
    }
    
    
    /**
     * (Re)starts the session.
     *
     * @return bool TRUE if the session has been initialized, else FALSE.
     */
    public function startSession()
    {
        if ($this->sessionState == self::SESSION_NOT_STARTED && session_status() == PHP_SESSION_NONE) {
            $this->sessionState = session_start();
        }
        
        return $this->sessionState;
    }
    
    /**
     * Stores datas in the session.
     * Example: $instance->foo = 'bar';
     *    
     * @param string $name Name of the data
     * @param mixed $value Your data
     * 
     * @return void
     */
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    
    
    /**
     * Gets datas from the session.
     * Example: echo $instance->foo;
     *    
     * @param string $name Name of the datas to get.
     *
     * @return mixed Datas stored in session.
     */
    public function __get( $name )
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }
    
    /**
     * Checks if the field exists in the session.
     * 
     * @param string $name the field name
     * 
     * @return bool TRUE if the field exists in the session, else FALSE.
     */
    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }
    
    /**
     * Removed the field from the session.
     * 
     * @param string $name the field name
     *
     * @return void
     */
    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }
    
    /**
     * Destroys the current session.
     *    
     * @return bool TRUE is session has been deleted, else FALSE.
     */
    public function destroy()
    {
        if ($this->sessionState == self::SESSION_STARTED) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);

            return !$this->sessionState;
        }
        
        return false;
    }
}
