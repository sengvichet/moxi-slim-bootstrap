<?php
/**
 * This file contains middleware for the dealers' portal.
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

$app->add(
    function ($request, $response, $next) use ($app) {
        $path = substr($request->getUri()->getPath(), 1);
        $session = $app->getContainer()['session'];
        $logger = $app->getContainer()['logger'];
        $user = !empty($session->user) ? $session->user : false;

        if (isGuestGuard($app, $path) && $user) {
            return redirect($app, $response, 'home');
        }

        if (isAuthGuard($app, $path, 'admin')) {
            if (!$user) {
                return redirect($app, $response, 'login');
            }
            if (!isAdmin($user)) {
                return redirect($app, $response, 'home');
            }
        }

        if (isAuthGuard($app, $path, 'dealer')) {
            if (!$user) {
                return redirect($app, $response, 'login');
            }
            if (!isDealer($user)) {
                return redirect($app, $response, 'home');
            }
        }

        $password = !empty($session->password) ? $session->password : false;

        if (isPasswordGuard($app, $path) && !$password) {
            return redirect($app, $response, 'password-reset');
        }

        $oauth = !empty($session->access_token) ? $session->access_token : false;

        if (isOauthGuard($app, $path) && !$oauth) {
            return redirect($app, $response, 'oauth');
        }
        $response = $next($request, $response);

        return $response;
    }
);

/**
 * Checks if page is available only for authenticated users
 *
 * @param \App\Kernel\App $app   app
 * @param string          $route page's route
 * @param string          $role  user's role
 *
 * @return boolean
 */
function isAuthGuard($app, string $route, string $role)
{
    if (!$app || !$route || !$role) {
        return false;
    }

    $config = $app->getContainer()['config']->get();
    if (empty($config['guards']['auth'][$role])) {
        return false;
    }

    $guards = $config['guards']['auth'][$role];
    return in_array($route, array_values($guards));
}

/**
 * Checks if page is available only for unauthenticated users
 *
 * @param \App\Kernel\App $app   app
 * @param string          $route page's route
 *
 * @return boolean
 */
function isGuestGuard($app, string $route)
{
    $guards = $app->getContainer()['config']->get()['guards'];
    return in_array($route, array_values($guards['guest']));
}

/**
 * Checks if page is available only for authenticated users
 *
 * @param \App\Kernel\App $app   app
 * @param string          $route page's route
 *
 * @return boolean
 */
function isPasswordGuard($app, string $route)
{
    $guards = $app->getContainer()['config']->get()['guards'];
    return in_array($route, array_values($guards['password']));
}

/**
 * Checks if page is available only for authenticated users
 *
 * @param \App\Kernel\App $app   app
 * @param string          $route page's route
 *
 * @return boolean
 */
function isOauthGuard($app, string $route)
{
    $guards = $app->getContainer()['config']->get()['guards'];
    return in_array($route, array_values($guards['oauth']));
}

/**
 * Checks if page is available only for authenticated users
 *
 * @param \App\Kernel\App $app      app
 * @param mixed           $response Response
 * @param string          $route    page's route
 *
 * @return boolean
 */
function redirect($app, $response, string $route)
{
    $config = $app->getContainer()['config']->get();
    $redirectUrl = $config['app']['url'] . '/' . $config['routes'][$route];
    return $response->withRedirect($redirectUrl, 301);
}

/**
 * Checks if user is admin.
 *
 * @param array $user user data
 *
 * @return boolean
 */
function isAdmin(array $user)
{
    return ($user['role'] === 'admin');
}

/**
 * Checks if user is dealer.
 *
 * @param array $user user data
 *
 * @return boolean
 */
function isDealer(array $user)
{
    return ($user['role'] === 'dealer');
}
