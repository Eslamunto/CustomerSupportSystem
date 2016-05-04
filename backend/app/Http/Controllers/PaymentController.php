<?php
/**
 * Created by PhpStorm.
 * User: eslam
 * Date: 23.04.16
 * Time: 18:21
 */

namespace App\Http\Controllers;
use Anouar\Paypalpayment\Facades\PaypalPayment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;


class PaymentController extends Controller
{

    private $_apiContext;


    function __construct()
    {
//        $this->middleware('csrf');
        $this->_apiContext = PaypalPayment::apiContext(config('paypal_payment.Account.ClientId'),
            config('paypal_payment.Account.ClientSecret'));
    }


    public function index() {
        return view('payment.index');
    }

    /*
    * Process payment using credit card
    */
    public function store(Request $request)
    {
        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
//        $addr= Paypalpayment::address();
//        $addr->setLine1("3909 Witmer Road");
//        $addr->setLine2("Niagara Falls");
//        $addr->setCity("Niagara Falls");
//        $addr->setState("NY");
//        $addr->setPostalCode("14305");
//        $addr->setCountryCode("US");
//        $addr->setPhone("716-298-1822");

        $addr= Paypalpayment::address();
        $addr->setLine1(Input::get('lineOne'));
        $addr->setLine2(Input::get('lineTwo'));
        $addr->setCity(Input::get('city'));
        $addr->setState(Input::get('state'));
        $addr->setPostalCode(Input::get('postalCode'));
        $addr->setCountryCode(Input::get('countryCode'));
        $addr->setPhone(Input::get('phone'));




        // ### CreditCard
//        $card = Paypalpayment::creditCard();
//        $card->setType("visa")
//            ->setNumber("4758411877817150")
//            ->setExpireMonth("05")
//            ->setExpireYear("2019")
//            ->setCvv2("456")
//            ->setFirstName("Joe")
//            ->setLastName("Shopper");

        $card = Paypalpayment::creditCard();
        $card->setType("visa")
            ->setNumber(Input::get('cardNumber'))
            ->setExpireMonth(Input::get('expMonth'))
            ->setExpireYear(Input::get('expYear'))
            ->setCvv2(Input::get('cvv'))
            ->setFirstName(Input::get('firstName'))
            ->setLastName(Input::get('lastName'));





        // ### FundingInstrument
        // A resource representing a Payer's funding instrument.
        // Use a Payer ID (A unique identifier of the payer generated
        // and provided by the facilitator. This is required when
        // creating or using a tokenized funding instrument)
        // and the `CreditCardDetails`
        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($fi));

        $item1 = Paypalpayment::item();
        $item1->setName('VIP Ticket')
            ->setDescription('Finding a way to get the ticket solved faster.')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setTax(0.3)
            ->setPrice(7.50);

        $item2 = Paypalpayment::item();
        $item2->setName('Rasha')
            ->setDescription('Rashwa Baseita')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setTax(0.2)
            ->setPrice(2);


        $itemList = Paypalpayment::itemList();
        $itemList->setItems(array($item1,$item2));


        $details = Paypalpayment::details();
        $details->setShipping("1.2")
            ->setTax("1.3")
            //total of items prices
            ->setSubtotal("17.5");

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
            // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
            ->setTotal("20")
            ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions(array($transaction));

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            return  "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }

        dd($payment);
    }
}