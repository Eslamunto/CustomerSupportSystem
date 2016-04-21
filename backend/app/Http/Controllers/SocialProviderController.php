<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Abraham\TwitterOAuth\TwitterOAuth;

use App\SocialProvider as SocialProvider;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Validator as Validator;

use Illuminate\Support\Facades\Session as Session;

class SocialProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTwitterKeys()
    {
    	$twitter_account = SocialProvider::where('provider', 'twitter')->get();

    	//If the Keys do not exist in the database, get them from .env file
    	if($twitter_account->isEmpty()) {
    		$consumer_key = env('CONSUMER_KEY');
    		$consumer_secret = env('CONSUMER_SECRET');
    	} else {
    		$consumer_key = $twitter_account->first()->consumer_key;
    		$consumer_secret = $twitter_account->first()->consumer_secret;
    	}

    	$twitter_keys = array('CONSUMER_KEY' => $consumer_key, 'CONSUMER_SECRET' => $consumer_secret);

    	return $twitter_keys;
    }

    public function twitterAuthenticateAndAuthorize(Request $request) 
    {
    	$twitter_keys = $this->getTwitterKeys();

    	$connection = new TwitterOAuth($twitter_keys['CONSUMER_KEY'], $twitter_keys['CONSUMER_SECRET']);
  
        $request_token = $connection->oauth('oauth/request_token', 
        	array('oauth_callback' => Route('twitterCallback')));

        if ($connection->getLastHttpCode() == 200) {
        	$request->session()->put('oauth_token', $request_token['oauth_token']);
            $request->session()->put('oauth_token_secret', $request_token['oauth_token_secret']);

            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            // dd($url);
            return redirect($url);
        } else {
            exit('Error getting request_token');
        }
    }

    public function twitterCallback(Request $request)
    {
    	$twitter_keys = $this->getTwitterKeys();

    	if($request->has('oauth_verifier') && $request->session()->has('oauth_token') 
    		&& $request->session()->has('oauth_token_secret')) {

    		$connection = new TwitterOAuth($twitter_keys['CONSUMER_KEY'], $twitter_keys['CONSUMER_SECRET'], 
    		$request->session()->get('oauth_token') , $request->session()->get('oauth_token_secret'));

    		$verified_access_token = $connection->oauth("oauth/access_token", 
    			array("oauth_verifier" => $request->query('oauth_verifier')));

    		//If we want to save the whole access token in the session
    		// $request->session()->put('access_token', $verified_access_token);

    		$verified_connection = new TwitterOAuth($twitter_keys['CONSUMER_KEY'], $twitter_keys['CONSUMER_SECRET'], 
    			$verified_access_token['oauth_token'], $verified_access_token['oauth_token_secret']);

    		$twitter_account = $verified_connection->get("account/verify_credentials");
    		// dd($twitter_account);

    		$db_twitter_account = $this->findOrCreateAccount($twitter_account, $verified_access_token);

    		$request->session()->put('account_id', $db_twitter_account->account_id);
    		$request->session()->put('account_screen_name', $db_twitter_account->account_screen_name);
    		$request->session()->put('account_avatar', $db_twitter_account->account_avatar);
    		$request->session()->put('oauth_provider', $db_twitter_account->provider);
    		$request->session()->put('oauth_token', $db_twitter_account->oauth_token);
    		$request->session()->put('oauth_token_secret', $db_twitter_account->oauth_secret_token);
    		// dd($request->session());

    		return redirect()->route('index');

    	} else {
    		if(!$request->has('oauth_verifier') )
    			exit('Error OAuth Verifier is missing');
    		if(!$request->session()->has('oauth_token'))
    			exit('Error OAuth Token is missing');
    		if(!$request->session()->has('oauth_token_secret'))
    			exit('Error OAuth Secret Token is missing');
    	}
    }


    public function findOrCreateAccount($twitter_account, $verified_access_token)
    {
    	$account = SocialProvider::where('provider', 'twitter')->where('account_id', $twitter_account->id_str)->get();
    	// dd($account->first());

    	//If the account does not exist in the database
    	if($account->isEmpty()) {
    		$new_account = SocialProvider::create([
    			'provider' => 'twitter',
    			'oauth_token' => $verified_access_token['oauth_token'],
    			'oauth_secret_token' => $verified_access_token['oauth_token_secret'],
    			'account_id' => $twitter_account->id_str,
    			'account_name'=> $twitter_account->name,
    			'account_screen_name' => $twitter_account->screen_name,
    			'account_avatar' => $twitter_account->profile_image_url,
    			'consumer_key' => env('CONSUMER_KEY'),
    			'consumer_secret' => env('CONSUMER_SECRET'),
    		]);

    		return $new_account;
    	} else {
    		$account->first()->oauth_token = $verified_access_token['oauth_token'];
    		$account->first()->oauth_secret_token = $verified_access_token['oauth_token_secret'];
    		$account->first()->save();

    		return $account->first();
    	}
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'consumer_key' => 'required_without_all:secret_key,access_token,access_token_secret',
            'secret_key' => 'required_without_all:consumer_key,access_token,access_token_secret',
            'access_token' => 'required_without_all:consumer_key,secret_key,access_token_secret',
            'access_token_secret' => 'required_without_all:consumer_key,secret_key,access_token'
        ]);

        if ($validator->fails()) {
            return redirect()->route('adminSettings')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $twitter_account = SocialProvider::find($id);
            if($request->consumer_key != '')
                $twitter_account->consumer_key = $request->consumer_key;
            if($request->secret_key != '')
                $twitter_account->consumer_secret = $request->secret_key;
            if($request->access_token != '')
                $twitter_account->oauth_token = $request->access_token;
            if($request->access_token_secret != '')
                $twitter_account->oauth_secret_token = $request->access_token_secret;

            $twitter_account->save();

            Session::flash('message', 'Twitter Account is updated Successfully !');
            return redirect()->route('adminSettings');
        }
    }
}
