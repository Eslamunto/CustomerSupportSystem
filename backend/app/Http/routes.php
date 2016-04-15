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
        Route::get('show/agent/{id}',[
            'as'=>'showAgent',
            'uses'=>'AgentController@show'
        ]);

        Route::get('create/agent',[
            'as'=>'getCreateAgent',
            'uses'=>'AgentController@getCreate'
        ]);
        Route::post('create/agent',[
            'as'=>'createAgent',
            'uses'=>'AgentController@postCreate'
        ]);
        Route::delete('delete/agent/{id}', [
            'as'=>'deleteAgent',
            'uses'=>'AgentController@destroy'
        ]);
        Route::put('edit/agent/{id}', [
            'as'=> 'agentUpdate',
            'uses'=> 'AgentController@update'
        ]);

        //Admin supervisor's resources
        Route::get('index/supervisor',[
            'as'=>'indexSupervisors',
            'uses'=>'SupervisorController@index'
        ]);
        Route::get('show/supervisor/{id}',[
            'as'=>'showSupervisor',
            'uses'=>'SupervisorController@show'
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
            'uses'=>'SupervisorController@destroy'
        ]);
        Route::put('edit/supervisor/{id}', [
            'as'=> 'updateSupervisor',
            'uses'=> 'SupervisorController@update'
        ]);

        //Teams
        Route::get('department/{departmentId}/teams', [
            'as' => 'departmentTeams',
            'uses'=> 'TeamController@departmentTeam'
        ]);

        //depatment
        Route::resource('department', 'DepartmentController');



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

 });

Route::get('/test', function(){
	return view('layouts.master');
	// return view('supervisor.supervisorFeed');
});

Route::resource('department', 'DepartmentController');


