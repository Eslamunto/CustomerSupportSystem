<?php
/**
 * Created by PhpStorm.
 * User: eslam
 * Date: 05.05.16
 * Time: 03:32
 */

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\SocialProvider as SocialProvider;
use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;
use Illuminate\Support\Facades\Input;

class SendDMController extends Controller
{


    public function sendDM()
    {

//      TODO: Check if ticket exists in the ticket table
//      TODO: Check if username is actually true;
        $twitter_handle = Input::get('twitterHandle');
        $ticket_id = Input::get('ticketId');
//      TODO: REMOVE EL TOKENS b3d l evaluation 3lshan da l personal account bta3ak ya ahbal
        $consumer_key = '8AkSaPCvvwIBwShHxrIzFGaXK';
        $consumer_secret = 'A2qCDDaLtTLInJ290rJt28HiHCSVhXt12Kg6e8Wh0P1oJg00QX';
        $oauth_token = '482399703-1UchkCm0wEpRgUoN7aPq86IJZ7yBCfQY6XxUXHAt';
        $oauth_token_secret = 'jN7xDfoXx05xJiFxE2fNlaK9kdZFDRWr2L2pAqA4p3nLD';

        $connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

        $options = array("screen_name" => $twitter_handle, "text" => "http://localhost:8000/pay/" . $ticket_id);
        $connection->post('direct_messages/new', $options);
//      TODO: Render it as a message in the main view!
        return "Tweet was sent to the customer";
    }
}