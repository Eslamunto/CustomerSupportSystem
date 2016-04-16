<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Abraham\TwitterOAuth\TwitterOAuth;

use App\SocialProvider as SocialProvider;

use Illuminate\Support\Collection;

class SocialProviderController extends Controller
{
	const CONSUMER_KEY = "9HkAuku5omdAmseF6Y028QgVu";
    const CONSUMER_SECRET = "TyhYZCgUOevxIBCUIyrQHezfCkv6zppG8SbCyTRIOqllhvCYlD";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function twitterAuthenticateAndAuthorize(Request $request) 
    {
    	$connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_SECRET);
        $request_token = $connection->oauth('oauth/request_token', 
        	array('oauth_callback' => Route('twitterCallback')));

        if ($connection->getLastHttpCode() == 200) {
        	$request->session()->put('oauth_token', $request_token['oauth_token']);
            $request->session()->put('oauth_token_secret', $request_token['oauth_token_secret']);

            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            var_dump($url);
            return redirect($url);
        } else {
        	var_dump($request_token);
            exit('Error getting request_token');
        }
    }

    public function twitterCallback(Request $request)
    {
    	if($request->has('oauth_verifier') && $request->session()->has('oauth_token') 
    		&& $request->session()->has('oauth_token_secret')) {

    		$connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_SECRET, 
    		$request->session()->get('oauth_token') , $request->session()->get('oauth_token_secret'));

    		$verified_access_token = $connection->oauth("oauth/access_token", 
    			array("oauth_verifier" => $request->query('oauth_verifier')));

    		//If we want to save the whole access token in the session
    		// $request->session()->put('access_token', $verified_access_token);

    		$verified_connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_SECRET, 
    			$verified_access_token['oauth_token'], $verified_access_token['oauth_token_secret']);

    		$twitter_account = $verified_connection->get("account/verify_credentials");
    		// dd($twitter_account);

    		$db_twitter_account = $this->findOrCreateAccount($twitter_account, $verified_access_token);

    		$request->session()->put('account_id', $db_twitter_account->account_id);
    		$request->session()->put('account_screen_name', $db_twitter_account->account_screen_name);
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
    			'consumer_key' => self::CONSUMER_KEY,
    			'consumer_secret' => self::CONSUMER_SECRET,
    		]);

    		return $new_account;
    	} else {
    		$account->first()->oauth_token = $verified_access_token['oauth_token'];
    		$account->first()->oauth_secret_token = $verified_access_token['oauth_token_secret'];
    		$account->first()->save();

    		return $account->first();
    	}
    }
}
