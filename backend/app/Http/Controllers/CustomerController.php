<?php
/**
 * Created by PhpStorm.
 * User: Eldesouky
 * Date: 4/3/16
 * Time: 7:40 PM
 */

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Session as Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{

    public function postCreate(){
            $customer = new Customer;
            $customer->name = Input::get('customerName');
            $customer->phone = Input::get('customerPhone');
            $customer->twitterUsername = Input::get('customerTwitter');
            $customer->facebookUsername = Input::get('customerFacebook');
            $customer->save();

        Session::flash('message', 'Customer ' . $customer->name . ' is Successfully Created!');
        return redirect()->route('createCustomer');

    }
}
