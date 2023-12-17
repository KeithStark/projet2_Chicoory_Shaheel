<?php

class SessionManager
{
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setSessionData($key, $value)
    {
        self::startSession();
        $_SESSION[$key] = $value;
    }

    public static function getSessionData($key)
    {
        self::startSession();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function destroySession()
    {
        self::startSession();
        session_destroy();
    }
}
