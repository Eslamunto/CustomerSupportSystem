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
        Route::get('/customers',function(){
            return view('admin.adminCustomers');
        });
        Route::get('create/customer', function()
        {
            return View::make('admin.adminCustomers');
        });
        Route::post('create/customer',[
            'as'=>'createCustomer',
            'uses'=>'CustomerController@postCreate'
        ]);

    });



    Route::group(['middleware' => 'supervisor', 'prefix' => 'supervisor'], function () {
        Route::get('/', function () {
            return view('supervisor.supervisorFeed');
        });
        Route::get('/customers',function(){
            return view('supervisor.supervisorCustomers');
        });
        Route::get('create/customer', function()
        {
            return View::make('supervisor.supervisorCustomers');
        });
        Route::post('create/customer',[
            'as'=>'createCustomer',
            'uses'=>'CustomerController@postCreate'
        ]);
    });


    Route::group(['middleware' => 'agent', 'prefix' => 'agent'], function () {
        Route::get('/', function () {
            return view('agent.agentFeed');
        });
        Route::get('/customers',function(){
            return view('agent.agentCustomers');
        });
        Route::get('create/customer', function()
        {
            return View::make('agent.agentCustomers');
        });
        Route::post('create/customer',[
            'as'=>'createCustomer',
            'uses'=>'CustomerController@postCreate'
        ]);

    });

    Route::get('/home', 'HomeController@index');
});

Route::get('/test', function(){
	return view('layouts.master');
	// return view('supervisor.supervisorFeed');
});

Route::resource('department', 'DepartmentController');
