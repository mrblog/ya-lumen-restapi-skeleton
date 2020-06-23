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

$router->get('/', function () use ($router) {
    $response = array(
        'version' => $router->app->version(),
        'success' => TRUE
    );
    return response()->json($response)->header('Content-Type', "application/json");
});

$router->get('/example', 'ExampleController@getExample');

$router->group(['prefix' => 'v1/'], function ($router) {
    $router->get('token/','TokenController@getToken');
    $router->get('courses/','CourseController@getAllCourses');
    $router->get('course/{courseId}','CourseController@getOneCourse');

});
