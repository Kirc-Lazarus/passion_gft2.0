<?php
class Session
{

    static $instance;
    static function getInstance()
    {
        if (!self::$instance) {

            self::$instance = new Session();
        }
        return self::$instance;
    }


    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) { // Par prudence je m'assure qu'une session est démarré
            session_start();
        }
    }
    public function setFlash($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public function hasFlashes()
    {
        return isset($_SESSION['flash']);
    }
    public function getFlashes()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    public function write($key, $value)
    {

        $_SESSION[$key] = $value;
    }

    public function read($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
}
