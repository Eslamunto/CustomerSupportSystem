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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function postCreate(Request $request){

        $validator =  $this->validate($request, [
            'customerName' => 'required|max:255',
            'customerPhone' => 'required_without_all:twitterUsername,facebookUsernameg|numeric|min:8',
            'twitterUsername' => 'required_without_all:facebookUsername,customerPhone|unique:customer',
            'facebookUsername' => 'required_without_all:twitterUsername,customerPhone|unique:customer',
        ]);

        if (empty(Input::get('customerName')) ||
            ( empty(Input::get('customerPhone')) && empty(Input::get('twitterUsername')) && empty(Input::get('facebookUsername')) ) ) {

            Session::flash('message', 'Error creating customer');

        } else {


            $customer = new Customer;
            $customer->name = Input::get('customerName');
            $customer->phone = Input::get('customerPhone');
            $customer->twitterUsername = Input::get('twitterUsername');
            $customer->facebookUsername = Input::get('facebookUsername');
            $customer->save();

            Session::flash('message', 'Customer ' . $customer->name . ' has been added Successfully!');
            if (Auth::user()->role == 0) {
                return redirect()->route('createCustomerAdmin');
            } elseif (Auth::user()->role == 1) {
                return redirect()->route('createCustomerSupervisor');
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('createCustomerAgent');
            }
        }
    }


    public function postUpdate(Request $request, $id)
    {
        $validator =  $this->validate($request, [
            'customerName' => 'max:255',
            'customerPhone' => 'numeric|min:8',
            'twitterUsername' => 'unique:customer',
            'facebookUsername' => 'unique:customer',
        ]);

//        if (empty(Input::get('customerName')) ||
//            ( empty(Input::get('customerPhone')) && empty(Input::get('twitterUsername')) && empty(Input::get('facebookUsername')) ) ) {
//
//            Session::flash('message', 'Error creating customer');
//            if( empty(Input::get('customerName'))) {
//                Session::flash('message', 'Customer  has been updated Successfully !');
//
//            }
//        } else {

            $customer = Customer::find($id);

            if($request->customerName != '')
                $customer->name = $request->customerName;
            if($request->customerPhone !='')
                $customer->phone = $request->customerPhone;
            if($request->customerTwitter !='')
                $customer->twitterUsername = $request->twitterUsername;
            if($request->customerFacebook !='')
                $customer->facebookUsername = $request->facebookUsername;

            $customer->update();
            Session::flash('message', 'Customer '.$customer->name .' inforamtion has been updated Successfully !');
            return redirect()->route('createCustomerAdmin');

//        }
    }
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();

        Session::flash('message', 'Customer '.$customer->name .' has been updated deleted successfully !');
        if(Auth::user()->role == 0){
            return redirect()->route('createCustomerAdmin');
        }elseif(Auth::user()->role == 1){
            return redirect()->route('createCustomerSupervisor');
        }elseif(Auth::user()->role == 2){
            return redirect()->route('createCustomerAgent');
        }
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
