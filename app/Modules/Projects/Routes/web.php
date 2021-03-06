<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group([
    'prefix' => 'projects',
    'as' => 'projects.'
], function () {

    Route::get('/', [
        'as' => 'index',
        'uses' => 'ProjectsController@index'
    ]);

    Route::get('/{project_slug}', [
        'as' => 'view',
        'uses' => 'ProjectsController@view'
    ]);
});
