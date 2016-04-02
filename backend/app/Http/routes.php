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
Route::get('/', function () {
    return view('welcome')->with(array('role'=>'guest'));
});
//
Route::group(['middleware' => 'auth'], function () {


    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', function () {
            return view('welcome')->with(array('role'=>'admin'));
        });

    });



    Route::group(['middleware' => 'supervisor'], function () {
        Route::get('/supervisor', function () {
            return view('welcome')->with(array('role'=>'supervisor'));
        });

    });


    Route::group(['middleware' => 'agent'], function () {
        Route::get('/agent', function () {
            return view('welcome')->with(array('role'=>'agent'));
        });

    });

    Route::get('/home', 'HomeController@index');
});
