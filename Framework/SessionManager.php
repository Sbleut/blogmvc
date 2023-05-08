<?php

class SessionManager
{
    /**
     * Start session.
     *
     * @return void
     */
    public function __construct() {
        session_start();
    }

    /**
     * Set session value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get session value.
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Checking if user is authenticated in the session.
     *
     * @return void
     */
    public function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    /**
     * Delete session value.
     *
     * @param string $key
     *
     * @return void
     */
    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Destroy session.
     *
     * @return void
     */
    public static function destroy()
    {
        session_destroy();
    }
}
