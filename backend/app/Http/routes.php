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
        //Admin home
        Route::get('/', function () {
            return view('admin.adminFeed');
        });

        //Admin agent's resources
        Route::get('index/agents',[
            'as'=>'indexAgents',
            'uses'=>'AgentController@index'
        ]);
        Route::get('create/agent',[
            'as'=>'getCreateAgent',
            'uses'=>'AgentController@getCreate'
        ]);
        Route::post('create/agent',[
            'as'=>'createAgent',
            'uses'=>'AgentController@postCreate'
        ]);
        Route::get('delete/agent/{id}', [
            'as'=>'deleteAgent',
            'use'=>'AgentController@destroy'
        ]);
        Route::put('edit/agent/{id}', [
            'as'=> 'agentUpdate',
            'uses'=> 'AgentController@update'
        ]);

        //Admin supervisor's resources
        Route::get('index/supervisor',[
            'as'=>'indexSupervisor',
            'uses'=>'SupervisorController@index'
        ]);
        Route::get('create/supervisor',[
            'as'=>'getCreateSupervisor',
            'uses'=>'SupervisorController@getCreate'
        ]);
        Route::post('create/supervisor',[
            'as'=>'createSupervisor',
            'uses'=>'SupervisorController@postCreate'
        ]);
        Route::delete('delete/supervisor/{id}', [
            'as'=>'deleteSupervisor',
            'use'=>'SupervisorController@destroy'
        ]);
        Route::put('edit/supervisor/{id}', [
            'as'=> 'supervisorUpdate',
            'uses'=> 'SupervisorController@update'
        ]);

        Route::resource('department', 'DepartmentController');

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

Route::get('/test', function(){
	return view('layouts.master');
	// return view('supervisor.supervisorFeed');
});


