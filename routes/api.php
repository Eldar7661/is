<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    'namespace' => 'App\Http\Controllers'
], function() {

    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('registration', 'AuthController@registration');
        Route::post('update',       'AuthController@update');
        Route::post('login',        'AuthController@login');
        Route::post('logout',       'AuthController@logout');
        Route::post('refresh',      'AuthController@refresh');
        Route::post('me',           'AuthController@me');
    });


    Route::group([
        'prefix' => 'article',
    ], function() {
        Route::post('all', 'ArticlesController@all');
        Route::post('find', 'ArticlesController@find');
    });

    Route::group([
        'middleware' => 'jwt.auth',
    ], function() {
        Route::post('article/my', 'ArticlesController@my');
        Route::post('article/create', 'ArticlesController@create');
        Route::post('article/edit', 'ArticlesController@edit');
        Route::post('article/delete', 'ArticlesController@delete');
    });
});
