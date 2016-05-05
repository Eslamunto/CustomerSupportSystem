<?php
/**
 * Created by PhpStorm.
 * User: eslam
 * Date: 04.05.16
 * Time: 14:16
 */

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Status;
use App\Ticket;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Anouar\Paypalpayment\Facades\PaypalPayment;

use Illuminate\Http\Request;

class PaypalController extends Controller
{


    private $_apiContext;

    private $ticket_id;


    function __construct()
    {

        $paypal_conf = Config::get('paypal');
        $this->_apiContext = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
//        $this->_apiContext = new ApiContext(new OAuthTokenCredential('AVC7QWUMwoK9ZTGKxSewFLD9rVHTtCckoB_Aba93AZQAn9dH-zsBAIwqz7BJ9p5p5bk3lfGv2_m9SO7g', 'EDgF8NON1l3RmJ5qqMumMPv7aylbxjZ7M0Te0TexJNlvsYwxoEN0HYohZY3y8QD2n_hRDDlRkV-CpfAP'));
        $this->_apiContext->setConfig($paypal_conf['settings']);

//        $this->_apiContext = PaypalPayment::apiContext(config('paypal_payment.Account.ClientId'),
//            config('paypal_payment.Account.ClientSecret'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTheData(Request $request, $id) {

        return view('payment.index', ['ticket_id1' => $id, ]);
    }

    public function pay(Request $request)
    {

        $this->ticket_id = Input::get('ticket_id');

        Session::put('ticket_id', $this->ticket_id);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = [];

        $item = new Item();
        $item->setName(Input::get('item_name'))
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice(Input::get('item_price'));

        $items[] = $item;


        $item_list = new ItemList();
        $item_list->setItems($items);

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal(Input::get('total'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription("Description for VIP ticket goes here");

        $redirect_url = new RedirectUrls();
        $redirect_url->setReturnUrl(URL::route('paymentStatus'))
            ->setCancelUrl(URL::route('paymentStatus'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_url)
            ->setTransactions(array($transaction));


        try{
            $payment->create($this->_apiContext);
        }
        catch (\PayPal\Exception\PPConnectionException $ex) {
            if(\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for invoncenience');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

//        add payment id to session
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        return Redirect::route('/')
            ->with('error', 'unknown error occured');

    }

    public function paymentStatus()
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');

        if(empty(Input::get('PayerID')) || empty(Input::get('token')))
        {
            return "This is a Failute Operation";
        }

        $payment = Payment::get($payment_id, $this->_apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));


        $result = $payment->execute($execution, $this->_apiContext);

        if($result->getState() == 'approved')
        {
            $ticket_id = Session::get('ticket_id');
//            dd($newVariable);
            $ticket = Ticket::find($ticket_id);
            $ticket_status= DB::table('status')->where('name', 'vip')->first();
            $ticket->statusId = $ticket_status->id;
            $ticket->save();
            return 'Your payment was successful, your ticket has been given a higher priority and our nerds are working hard to get it done ASAP!!!!';
        }

        else {
            return "operation zeft failed";
        }
    }
}