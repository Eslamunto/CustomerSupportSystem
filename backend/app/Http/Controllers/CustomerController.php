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
use Illuminate\Support\Facades\Auth as Auth;

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
        if(Auth::user()->role == 0){
            return redirect()->route('createCustomerAdmin');
        }elseif(Auth::user()->role == 1){
            return redirect()->route('createCustomerSupervisor');
        }elseif(Auth::user()->role == 2){
            return redirect()->route('createCustomerAgent');
        }

    }
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();

        Session::flash('message', 'Customer is deleted successfully !');
        if(Auth::user()->role == 0){
            return redirect()->route('createCustomerAdmin');
        }elseif(Auth::user()->role == 1){
            return redirect()->route('createCustomerSupervisor');
        }elseif(Auth::user()->role == 2){
            return redirect()->route('createCustomerAgent');
        }
    }
}
