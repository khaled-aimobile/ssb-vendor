<?php
 
$router->get('/', function () use ($router) {
    return $router->app->version();
});

Route::group([
    'prefix' => 'api/v1','middleware' => 'jwt:api'
], function ($router) {
    
    Route::get('/test', function () {
        return 'Vendors Module Authentication Success.';
    });
});