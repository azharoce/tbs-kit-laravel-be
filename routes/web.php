<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

/*
 * 
 * UNAUTHENTICATED ROUTES
 * 
 */

// User functions
$router->post( '/login', 'AuthController@login');
$router->post( '/register', 'AuthController@register' );

/*
 * 
 * AUTHENTICATED ROUTES
 * 
 */
$router->group(
    [
        'middleware'    => 'auth',
    ], function( $router ) {
         // User Functions
        $router->get( '/logout', 'AuthController@logout' ); // WAS POST
        $router->post( '/logout', 'AuthController@logout' );
        $router->get( '/refresh', 'AuthController@refresh' ); // WAS POST
	    $router->post( '/refresh', 'AuthController@refresh' ); 
	    $router->post( '/me', 'AuthController@getEmail' ); 
});