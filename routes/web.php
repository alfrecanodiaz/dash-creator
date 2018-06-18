<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Laravel\Lumen\Routing\Router;
/** @var Router $router */
//return $router->app->version();

/*
 * Api Routes
 */
$router->group(['prefix' => '/api'/*, 'middleware' => 'auth'*/], function (Router $router)
{
    /*
     * Auth Routes
     */
    $router->group(['prefix' => '/auth'/*, 'middleware' => 'auth'*/], function (Router $router)
    {
        $router->post('login', 'LoginController@login');
        $router->post('logout', 'LoginController@logout');
        $router->post('register', 'LoginController@register');
    });
});