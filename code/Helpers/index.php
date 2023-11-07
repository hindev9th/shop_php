<?php
require 'config/Config.php';
require_once 'code/Entities/User.php';
/**
 * get base url in config
 * @return string
 */
if (!function_exists('getBaseUrl')) {
    function getBaseUrl(): string
    {
        return \config\Config::gI()->getBaseUrl();
    }
}

/**
 * redirect page
 * @param string $to
 * @return void
 */
if (!function_exists('redirect')) {
    function redirect(string $to)
    {
        echo "<script type='text/javascript'>
           window.location = '{$to}';
            </script>";
    }
}
/**
 * get data user login
 * @return mixed
 */
if (!function_exists('auth')) {
    function auth()
    {
        return $_SESSION['user'] ?? false;
    }
}

/**
 * set data user login
 *
 * @param \code\Models\User $user
 * @return \code\Models\User
 */
if (!function_exists('setAuth')) {
    function setAuth($user)
    {
        return $_SESSION['user'] = $user;
    }
}

/**
 * check login and redirect
 * @return void
 */
if (!function_exists('routeCheckAuth')) {
    function routeCheckAuth()
    {
        if (auth()) {
            redirect('/');
        }
    }
}
/**
 * check login admin and redirect
 * @return void
 */
if (!function_exists('routeCheckAuthAdmin')) {
    function routeCheckAuthAdmin()
    {
        if (auth()->getPermission() === 1) {
            redirect('/admin');
        }
    }
}
/**
 * check logout and redirect to login page
 * @return void
 */
if (!function_exists('routeCheckAuthOut')) {
    function routeCheckAuthOut()
    {
        if (!auth()) {
            redirect('/admin/login');
        }
    }
}

/**
 * remove session has key name is user
 * @return true
 */
if (!function_exists('logout')) {
    function logout(): bool
    {
        unset($_SESSION['user']);
        return true;
    }
}