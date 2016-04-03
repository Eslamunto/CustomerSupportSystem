<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

//
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'as' => 'index',
        'uses'=> 'HomeController@index'
        ]);

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/', function () {
            return view('admin.adminFeed');
        });

        Route::get('/settings', [ 
            'as' => 'adminSettings',
            function(){
            return view('admin.adminSettings');
        }]);

        Route::post('/status', [
            'as' => 'newStatus', 
            'uses' => 'StatusController@store'
        ]);

        Route::put('/status/{id}', [
            'as' => 'updateStatus',
            'uses' => 'StatusController@update'
        ]);

        Route::delete('status/{id}', [
            'as' => 'deleteStatus',
            'uses' => 'StatusController@destroy'
        ]);

    });


    Route::group(['middleware' => 'supervisor', 'prefix' => 'supervisor'], function () {
        Route::get('/', function () {
            return view('supervisor.supervisorFeed');
        });

    });


    Route::group(['middleware' => 'agent', 'prefix' => 'agent'], function () {
        Route::get('/', function () {
            return view('agent.agentFeed');
        });

    });

    Route::get('/home', 'HomeController@index');
});


