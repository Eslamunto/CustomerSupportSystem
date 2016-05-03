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
    //Home 
    Route::get('/', [
        'as' => 'index',
        'uses'=> 'HomeController@index'
    ]);

    //Logout
    Route::get('auth/logout', [
        'as' => 'logoutNew',
        'uses' => 'Auth\AuthController@getLogout'
    ]);

    //Twitter Authorization
    Route::get('/twitterAuth', [
        'as' => 'twitterAuthentication',
        'uses' => 'SocialProviderController@twitterAuthenticateAndAuthorize'
    ]);

    //Twitter CallBack
    Route::get('/callback', [
        'as' => 'twitterCallback', 
        'uses' => 'SocialProviderController@twitterCallback'
    ]);


    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        //Admin home
        Route::get('/', ["as" => "adminFeed", "uses" =>"FeedController@index"]);

        //Admin customers
        Route::get('/customers',function(){
            return view('admin.adminCustomers');
        });

        Route::get('create/customer', function()
        {
            return View::make('admin.adminCustomers');
        });

        Route::post('create/customer',[
            'as'=>'createCustomerAdmin',
            'uses'=>'CustomerController@postCreate'
        ]);

        Route::put('/customer/{id}', [
            'as' => 'updateCustomer',
            'uses' => 'CustomerController@postUpdate'
        ]);

        Route::delete('customer/{id}', [
            'as' => 'deleteCustomer',
            'uses' => 'CustomerController@destroy'
        ]);

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

        //Depatments
        Route::resource('department', 'DepartmentController');

        //Ticket Statuses
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

        //Settings
        Route::get('/settings', [ 
            'as' => 'adminSettings',
            'uses' => 'SettingsController@index'
        ]);
        
        //Twitter Acoount
        Route::put('/settings/twitter/{id}', [
            'as' => 'updateTwitterAccount',
            'uses' => 'SocialProviderController@update'
        ]);

        Route::post('/ticket/{id}', [
            'as' => 'assignTicket',
            'uses' => 'TicketController@assign'
        ]);
        Route::post('/claim/{id}', [
            'as' => 'claimTicketAdmin',
            'uses' => 'TicketController@claim'
        ]);
        Route::put('/ticketStatus/{id}', [
            'as' => 'setTicketStatusAdmin',
            'uses' => 'TicketController@setStatus'
        ]);
         Route::put('/ticketPriority/{id}', [
            'as' => 'setTicketPriorityAdmin',
            'uses' => 'TicketController@setPriority'
        ]);
        Route::post('/invite/{id}', [
            'as' => 'inviteTicketAdmin',
            'uses' => 'TicketController@inviteToTicket'
        ]);

    });


    Route::group(['middleware' => 'supervisor', 'prefix' => 'supervisor'], function () {

        //supervisor home
        Route::get('/', ["as" => "supervisorFeed", "uses" =>"FeedController@index"]);

       
        //Supervisor Tickets History
        Route::get('/team/agents/{id}', [
            'as' => 'supervisorTeamAgents',
            'uses' => 'SupervisorController@getTeamAgents'
        ]);

        //Supervisor customers
        Route::get('/customers', function(){
            return view('supervisor.supervisorCustomers');
        });

        Route::get('create/customer', function()
        {
            return View::make('supervisor.supervisorCustomers');
        });

        Route::post('create/customer',[
            'as'=>'createCustomerSupervisor',
            'uses'=>'CustomerController@postCreate'
        ]);
        Route::post('/ticket/{id}', [
            'as' => 'assignTicketSupervisor',
            'uses' => 'TicketController@assign'
        ]);
        Route::post('/claim/{id}', [
            'as' => 'claimTicketSupervisor',
            'uses' => 'TicketController@claim'
        ]);
        Route::put('/ticketStatus/{id}', [
            'as' => 'setTicketStatusSupervisor',
            'uses' => 'TicketController@setStatus'
        ]);
          Route::put('/ticketPriority/{id}', [
            'as' => 'setTicketPrioritySupervisor',
            'uses' => 'TicketController@setPriority'
        ]);
        Route::post('/esclateTicket/{id}', [
            'as' => 'esclateTicketSupervisor',
            'uses' => 'TicketController@esclateTicket'
        ]);
        Route::post('/invite/{id}', [
            'as' => 'inviteTicketSupervisor',
            'uses' => 'TicketController@inviteToTicket'
        ]);
    });


    Route::group(['middleware' => 'agent', 'prefix' => 'agent'], function () {
         //agent home
        Route::get('/', ["as" => "agentFeed", "uses" =>"FeedController@index"]);
        
        //Agent customers
        Route::get('/customers',function(){
            return view('agent.agentCustomers');
        });

        Route::get('create/customer', function()
        {
            return View::make('agent.agentCustomers');
        });

        Route::post('create/customer',[
            'as'=>'createCustomerAgent',
            'uses'=>'CustomerController@postCreate'
        ]);
        Route::post('/claim/{id}', [
            'as' => 'claimTicketAgent',
            'uses' => 'TicketController@claim'
        ]);
        Route::put('/ticketStatus/{id}', [
            'as' => 'setTicketStatusAgent',
            'uses' => 'TicketController@setStatus'
        ]);
        Route::put('/ticketPriority/{id}', [
            'as' => 'setTicketPriorityAgent',
            'uses' => 'TicketController@setPriority'
        ]);
        Route::post('/esclateTicket/{id}', [
            'as' => 'esclateTicketAgent',
            'uses' => 'TicketController@esclateTicket'
        ]);
        Route::post('/invite/{id}', [
            'as' => 'inviteTicketAgent',
            'uses' => 'TicketController@inviteToTicket'
        ]);
    });

 });

Route::get('/test', function(){
	return view('layouts.master');
});



