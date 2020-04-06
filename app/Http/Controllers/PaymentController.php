<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Toastr;
use Auth;
use DB;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {
        return view('paywithpaypal');
    }
    public function PaymentPaypal(Request $request)
    {
    
        if($request->platform == 'marketplace'){
            Session::put('purchasePlatform', $request->platform);
            $item_title = Session::get('gig_title');
            $quantity = Session::get('item_quantity');
            $subtotal = Session::get('subtotal');
            $total_price = $quantity*$subtotal+2;

        }elseif($request->platform == 'themeplace'){
          
            $buyer_id = Auth::user()->id;
            //check direct buy or cart item
            if(Session::get('buy_theme_cart_id')){
                $get_themecart_info = DB::table('theme_add_to_cart')
                ->join('themes', 'theme_add_to_cart.theme_id', 'themes.theme_id')
                ->where('cart_id', Session::get('buy_theme_cart_id'))
                ->select('theme_add_to_cart.*', 'themes.theme_name')->first();
                $item_title = $get_themecart_info->theme_name;
                $quantity = 1;
                $subtotal = $get_themecart_info->price;
                $total_price = $quantity*$subtotal+2;
            }else{
                $session_id = 0;
                $session_id =  Session::get('session_id'); // for guest user add to cart
               
                //get all cart item 
                $get_themecart_info = DB::table('theme_add_to_cart')
                ->where('user_id', $buyer_id)
                ->orWhere('session_id', $session_id)
                ->get()->toArray();

                $quantity = count($get_themecart_info);
                $item_title = 'Theme payment total item:' .$quantity;                
                $subtotal = array_sum(array_column($get_themecart_info, 'price'));
                $total_price = $quantity*$subtotal+2;
            }

           

        }elseif($request->platform == 'workplace'){

        }else{
            return back();
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName($item_title) /** item name **/
            ->setCurrency('USD')
            ->setQuantity($quantity)
            ->setPrice($total_price); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total_price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your payment transaction successfully completed');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paymentStatus')) /** Specify return URL **/
            ->setCancelUrl(route('paymentStatus'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

    public function PaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        //Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {

            Toastr::error('Payment failed');
            if(Session::get('purchasePlatform') == 'marketplace'){
                return Redirect::route('gigOrderPayment');
            }
            elseif(Session::get('purchasePlatform') == 'themeplace'){
                return Redirect::route('theme_checkout');
            }
            elseif(Session::get('purchasePlatform') == 'workplace'){
                return Redirect::route('theme_checkout');
            }else{
                return redirect::route('home');
            }
           

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            // payment success 
            if(Session::get('purchasePlatform') == 'marketplace'){
                return Redirect::route('gigPaymentSuccess');
            }
            elseif(Session::get('purchasePlatform') == 'themeplace'){
                return Redirect::route('themePaymentSuccess');
            }
            elseif(Session::get('purchasePlatform') == 'workplace'){
                return Redirect::route('theme_checkout');
            }else{
                return redirect::route('home');
            }
        }

        Toastr::error('Payment failed');
        if(Session::get('purchasePlatform') == 'marketplace'){
            return Redirect::route('gigOrderPayment');
        }
        elseif(Session::get('purchasePlatform') == 'themeplace'){
            return Redirect::route('theme_checkout');
        }
        elseif(Session::get('purchasePlatform') == 'workplace'){
            return Redirect::route('theme_checkout');
        }else{
            return redirect::route('home');
        }

    }
   

}
