<?php

namespace App\Http\Controllers;

use App\SocialProvider;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Requests;

class FeedController extends Controller
{
    private $connection;

    /**
     * FeedController constructor.
     */
    public function __construct()
    {
        $this->middleware(['supervisor']);

    }

    /**
     * @return array|object|void
     */
    public function getTweets(){

        $twitter_keys = SocialProvider::findOrFail(1);
        $consumer_key = $twitter_keys->consumer_key;
        $consumer_secret = $twitter_keys->consumer_secret;
        $oauth_token = $twitter_keys->oauth_token;
        $oauth_secret_token =  $twitter_keys->oauth_secret_token;
        if(isset($oauth_token ) && isset( $oauth_secret_token)) {
            $connection = new TwitterOAuth($consumer_key, $consumer_secret,
                $oauth_token, $oauth_secret_token);
                $tweets = $connection->get("statuses/mentions_timeline");
                return $tweets;

        }
        return response("Error in getting tweets", 403);

    }

}
