<?php

namespace App\Http\Controllers;

use App\gig_order;
use App\add_to_cart;
use App\order_requirement_ans;
use Illuminate\Http\Request;
use App\earning;
use App\Notification;
use App\ref_count;
use DB;
use Auth;
use Session;
use Toastr;
class GigOrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order_checkout($cart_id)
    {
        $user_id = Auth::user()->id;
        $get_cart_info = DB::table('add_to_carts')->where('cart_id',  $cart_id)->where('user_id', $user_id)->first();

        if($get_cart_info){
            $get_gigs = DB::table('gig_basics')
                ->join('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->Join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->Join('users', 'gig_basics.gig_user_id', '=', 'users.id')
                //->Join('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->select('gig_basics.gig_id', 'gig_basics.gig_title', 'gig_basics.gig_url', 'gig_prices.*', 'gig_images.image_path', 'users.id', 'users.username', 'users.name')
               
                ->where([
                    ['gig_basics.gig_id', '=', $get_cart_info->gig_id],
                    ['users.id', '=', $get_cart_info->gig_user_id],
                ])->first();

                
                Session::put('gig_id', $get_gigs->gig_id);
                Session::put('gig_title', $get_gigs->gig_title);
                Session::put('image_path', $get_gigs->image_path);
          
                if($get_cart_info->package_name == 'basic'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_basic', 'Yes')->get();
                    $package = [
                        
                    
                        'package_title' => $get_gigs->basic_title,
                        'package_dsc' => $get_gigs->basic_dsc,
                        'delivery_time' => $get_gigs->delivery_time_b,
                        'price' => $get_gigs->basic_p ,
                       
                    ];
                    Session::put('subtotal', $get_gigs->basic_p);
                    Session::put('delivery_time', $get_gigs->delivery_time_b);
                }

                if($get_cart_info->package_name == 'plus'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_plus', 'Yes')->get();
                    $package = [
                        
                        'package_title' => $get_gigs->plus_title,
                        'package_dsc' => $get_gigs->plus_dsc,
                        'delivery_time' => $get_gigs->delivery_time_p,
                        'price' => $get_gigs->plus_p,
                       
                    ];
                   
                    Session::put('subtotal', $get_gigs->plus_p);
                    Session::put('delivery_time', $get_gigs->delivery_time_p);
                }

                if($get_cart_info->package_name == 'super'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_super', 'Yes')->get();
                    $package = [
                        
                        
                        'package_title' => $get_gigs->super_title,
                        'package_dsc' => $get_gigs->super_dsc,
                        'delivery_time' => $get_gigs->delivery_time_s,
                        'price' => $get_gigs->super_p,
                        
                    ];
                   
                    Session::put('subtotal', $get_gigs->super_p);
                    Session::put('delivery_time', $get_gigs->delivery_time_s);
                }

                if($get_cart_info->package_name == 'platinum'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_platinum', 'Yes')->get();
                    $package = [
                        
                        
                        'package_title' => $get_gigs->platinum_title,
                        'package_dsc' => $get_gigs->platinum_dsc,
                        'delivery_time' => $get_gigs->delivery_time_pm,
                        'price' => $get_gigs->platinum_p,
                       
                    ];
                   
                    Session::put('subtotal', $get_gigs->platinum_p);
                    Session::put('delivery_time', $get_gigs->delivery_time_pm);
                }

                $data = [
                    'get_gigs' => $get_gigs,
                    'package' => $package,
                    'gig_features' =>  $gig_features,
                    'get_cart' =>  $get_cart_info
                ];

                return view('frontend.order-checkout')->with($data);
            }else{
                return redirect('/');
            }
       
    }

  
    public function add_to_cart(Request $request)
    {
        $user_id = Auth::user()->id;
        $get_cart_info = DB::table('add_to_carts')->where('gig_id',  $request->gig_id)->where('user_id', $user_id)->first(); // check have already add to cart

        if(!$get_cart_info){
            
            $data = [
                'gig_id' => $request->gig_id,
                'gig_user_id' => $request->gig_user_id,
                'package_name' => $request->package,
                'user_id' => $user_id
            ];

            $insert_id = add_to_cart::insertGetId($data);
     
            if($insert_id){
                $link =  asset('/order/checkout/').'/'.$insert_id;
                return redirect($link);
            }else{
                return back();
            }
        }else{
            add_to_cart::where('cart_id', $get_cart_info->cart_id)->update(['package_name' => $request->package,]);
            $link =  asset('/order/checkout/').'/'.$get_cart_info->cart_id;
            return redirect($link);
        }
    }


    public function delete_cart($cart_id)
    {
        $user_id = Auth::user()->id;
        $delete_cart = DB::table('add_to_carts')->where('cart_id',  $cart_id)->where('user_id', $user_id)->delete();
        
        if($delete_cart){
            return redirect('/');
        }else{
            return back();
        }
    }

 
    public function stripe_payment(Request $request)
    {

        $user_id = Auth::user()->id;
        $username = Auth::user()->username;

        $gig_order_id = session::get('gig_order_id');
        $delivery_time = session::get('delivery_time');
        $quantity = session::get('item_quantity');
        $subtotal = session::get('subtotal');
        $total = $quantity*$subtotal+2;
        

        \Stripe\Stripe::setApiKey("sk_test_USX32J7O4Oxh4gsTMwlAY5zr00t9yNdFxr");
        if(isset($request->stripeToken)){
        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request->stripeToken;

        $charge = \Stripe\Charge::create([
            'amount' => $total,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
            'statement_descriptor' => 'Custom descriptor',
        ]);

        if(Session::has('refferel_user_name')){
            if(Session::get('refferel_user_name') != $username){
             $ref_user = Session::get('refferel_user_name');
            }
        }else{ $ref_user = null; }

        
        $data = [
            'order_id' => $gig_order_id,
            'gig_id' => session::get('gig_id'),
            'ref_user' => $ref_user,
            'package_name' => session::get('package_name'),
            'quantity' => $quantity,
            'subtotal' => $subtotal,
            'total' => $total,
            'seller_id' =>  session::get('seller_id'),
            'payment_method' => 'card',
            'transection_id' =>  $token,
            'buyer_id' =>  $user_id,
            'delivery_time' => $delivery_time,
            'status' => 'active',
        ];

        $insert = gig_order::create($data);

            if($insert){
                Notification::create([
                    'platform' => 'marketplace',
                    'type' => 'order',
                    'item_id' => $order_id,
                    'forUser' => session::get('seller_id'),
                    'entityID' => $user_id,
                    'read' => 0
                ]);

                DB::table('add_to_carts')->where('gig_id', session::get('gig_id'))->where('user_id', $user_id)->delete();
               
                return redirect(asset('/order/requirements/'.$gig_order_id))->with('msg', 'Thank you for your purchase');;
            }else{
                return redirect(asset('/order/add_card/'));
            }
        }else{
            return redirect(asset('/order/add_card/fsdfs'));
        }
    
    }

    public function placeorder_payment(Request $request)
    {   
        $buyer_id = Auth::user()->id;
        $quantity = $request->quantity;
        $subtotal = session::get('subtotal');
        $total = $quantity*$subtotal+2;
        $random =strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -8)); 
        $order_id = $random.$buyer_id; 
        Session::put('gig_order_id', $order_id);
        Session::put('package_name', $request->package_name);
        Session::put('seller_id', $request->seller_id);
        Session::put('item_quantity', $request->quantity);
        Session::put('total', $total);


        // $get_gigs = DB::table('gig_basics')
        //         ->join('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
        //         ->Join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
        //         ->select('gig_basics.gig_id', 'gig_basics.gig_title', 'gig_prices.*', 'gig_images.image_path')
        //         ->where([
        //             ['gig_basics.gig_id', '=', $request->gig_id],
        //             ['gig_basics.gig_user_id', '=', $request->seller_id],
        //         ])->first();

        //         if($request->package_name == 'basic'){
        //             $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_basic', 'Yes')->get();
        //             $package = [
                        
        //                 'package_title' => $get_gigs->basic_title,
        //                 'package_dsc' => $get_gigs->basic_dsc,
        //                 'delivery_time' => $get_gigs->delivery_time_b,
        //                 'price' => $get_gigs->basic_p ,
        //             ];
        //         }

        //         if($request->package_name == 'plus'){
        //             $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_plus', 'Yes')->get();
        //             $package = [
                        
        //                 'package_title' => $get_gigs->plus_title,
        //                 'package_dsc' => $get_gigs->plus_dsc,
        //                 'delivery_time' => $get_gigs->delivery_time_p,
        //                 'price' => $get_gigs->plus_p,
        //             ];
        //         }

        //         if($request->package_name == 'super'){
        //             $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_super', 'Yes')->get();
        //             $package = [
                        
                        
        //                 'package_title' => $get_gigs->super_title,
        //                 'package_dsc' => $get_gigs->super_dsc,
        //                 'delivery_time' => $get_gigs->delivery_time_s,
        //                 'price' => $get_gigs->super_p,
        //             ];
        //         }

        //         if($request->package_name == 'platinum'){
        //             $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_platinum', 'Yes')->get();
        //             $package = [
                        
                        
        //                 'package_title' => $get_gigs->platinum_title,
        //                 'package_dsc' => $get_gigs->platinum_dsc,
        //                 'delivery_time' => $get_gigs->delivery_time_pm,
        //                 'price' => $get_gigs->platinum_p,
        //             ];
        //         }

            return view('frontend.order-payment');
        
    }

    
    public function payment_success()
    {
        $user_id = Auth::user()->id;
        $username = Auth::user()->username;
        
        if(Session::has('refferel_user_name')){
            if(Session::get('refferel_user_name') != $username){
             $ref_user = Session::get('refferel_user_name');
            }
        }else{ $ref_user = null; }

        if(isset($_GET['tx'])){
            $gig_order_id = session::get('gig_order_id');
            $delivery_time = session::get('delivery_time');
            $quantity = session::get('item_quantity');
            $subtotal = session::get('subtotal');
            $total = $quantity*$subtotal+2;
            date_default_timezone_set('GMT');
            $data = [
                'order_id' => $gig_order_id,
                'gig_id' => session::get('gig_id'),
                'ref_user' => $ref_user,
                'package_name' => session::get('package_name'),
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'total' => $total,
                'seller_id' =>  session::get('seller_id'),
                'payment_method' => 'paypal',
                'transection_id' => $_GET['tx'],
                'buyer_id' =>  $user_id,
                'delivery_time' => $delivery_time,
                'status' => 'active',
            ];

            $insert = gig_order::create($data);

                if($insert){
                    DB::table('add_to_carts')->where('gig_id', session::get('gig_id'))->where('user_id', $user_id)->delete();
                   
                    return redirect(asset('/order/requirements/'.$gig_order_id))->with('msg', 'Thank you for your purchase');;
                }else{
                    return redirect(asset('/order/add_card/'));
                }
        }else{
            return redirect(asset('/order/add_card/'));
        }
      
    }

    public function payment_cancel(){
         return redirect(url('/'));
    }


    public function order_requirements($order_id)
    {
        $buyer_id = Auth::user()->id;
        $get_order_info = DB::table('gig_orders')
        ->join('gig_requirements', 'gig_orders.gig_id', '=', 'gig_requirements.gig_id')
        ->where('gig_orders.buyer_id', '=', $buyer_id)
        ->where('gig_orders.order_id',  $order_id)->first();
        if($get_order_info){
            return view('frontend.order-requirement')->with(compact('get_order_info'))->with('msg', 'Thank you for your purchase');
        }else{
            return redirect('/hotlancer/error');
        }
    } 

    public function insert_order_requirements(Request $request)
    {
       $buyer_id = Auth::user()->id;
        for($i=0; $i<=count($request->order_id); $i++){
            $insert = order_requirement_ans::create([
                'order_id' => $request->order_id[$i], 
                'gig_id' => $request->gig_id[$i], 
                'buyer_id' => $buyer_id, 
                'requirement_ans' => $request->requirement_ans[$i], 
                'attach_file' => $request->attach_file[$i]
            ]);
            
            if($insert){
                return redirect('/order/started/'.$request->order_id[0]);
            }else{
                return back();
            }
        }
    }
    public function order_started($order_id)
    {
        $buyer_id = Auth::user()->id;
        $get_order = DB::table('gig_orders')
            ->join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
            ->leftJoin('gig_requirements', 'gig_orders.gig_id', '=', 'gig_requirements.gig_id')
            ->leftJoin('order_requirement_ans', 'gig_orders.order_id', '=', 'order_requirement_ans.order_id')
            ->Join('gig_images', 'gig_orders.gig_id', '=', 'gig_images.gig_id')
            ->Join('users', 'gig_orders.seller_id', '=', 'users.id')
            ->select('gig_orders.*','order_requirement_ans.requirement_ans', 'gig_requirements.requirement', 'gig_basics.gig_id', 'gig_basics.gig_title', 'gig_basics.gig_url', 'gig_images.image_path', 'gig_basics.gig_payment_type', 'users.id', 'users.username', 'users.name')
            ->where('gig_orders.buyer_id', '=', $buyer_id)
            ->where('gig_orders.order_id', '=', $order_id)->first();
           Session::put('msg', 'Order started');
        if( $get_order){
            return view('frontend.order-completed')->with(compact('get_order'));
        }else{
             return redirect('/hotlancer/error');
        }
    }    
    // order review in home page   
    public function order_review($order_id)
    {
        $get_order = DB::table('gig_orders')
            ->join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
            ->leftJoin('gig_requirements', 'gig_orders.gig_id', '=', 'gig_requirements.gig_id')
            ->leftJoin('order_requirement_ans', 'gig_orders.order_id', '=', 'order_requirement_ans.order_id')
            ->join('userinfos', 'gig_orders.seller_id', '=', 'userinfos.user_id')
            ->Join('gig_images', 'gig_orders.gig_id', '=', 'gig_images.gig_id')
            ->Join('users', 'gig_orders.seller_id', '=', 'users.id')
            ->select('gig_orders.*','order_requirement_ans.requirement_ans', 
                'order_requirement_ans.attach_file',
                'gig_requirements.requirement', 'gig_basics.gig_id', 'gig_basics.gig_title','gig_basics.gig_payment_type', 'gig_basics.gig_url', 'gig_images.image_path', 'users.id', 'users.username', 'users.name', 'userinfos.user_image')
            ->where('gig_orders.order_id', '=', $order_id)->first();
            if($get_order){
                return view('frontend.order-review')->with(compact('get_order'));
            }else{
                return back();
            }

    }

    public function manage_seller_order(){
        $seller_id = Auth::user()->id;
        $get_order = DB::table('gig_orders')
            ->where('gig_orders.seller_id' , '=', $seller_id)->get();
            return view('backend.seller-orders')->with(compact('get_order'));

     }

    public function get_seller_orders_by_status($status='active')
    {
        $seller_id = Auth::user()->id;

            $get_order = DB::table('gig_orders')
            ->Join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
            ->Join('users', 'gig_orders.buyer_id', '=', 'users.id')
            ->select('gig_orders.*', 'gig_basics.gig_title', 'gig_basics.gig_url', 'users.id', 'users.username', 'users.name' )
            ->where( 'gig_orders.status' , '=', $status)
            ->where('gig_orders.seller_id' , '=', $seller_id)
            ->orderBy('gig_orders.id', 'desc')->get();
        
          
          if(count($get_order) > 0){
                $output = '
                <table class="responsive-table-input-matrix">
                    <thead>
                    <tr class="header-filter">
                    <td colspan="12" class="js-filter-title">'.$status.' gigs</td>
                    
                    </tr>
                    <tr>
                        
                        <th>IMG</th>
                        <th>GIG Title </th>
                        <th>Order date</th>
                        <th>Due on</th>
                        <th>Total</th>
                        <th>Status</th>
                        
                    </tr>
                    </thead>
                <tbody>';
                foreach($get_order as $show_order){

                        $buyer_info = DB::table('users')
                        ->join('userinfos', 'users.id', '=', 'userinfos.user_id')
                        ->where('users.id', $show_order->buyer_id)->first(); 

                        $refferel = ($show_order->ref_user) ? '<div class="a">refferel</div>': null ;
                        
                           $output .='
                        
                            <tr class="tbgig">
                               
                                <td class="gig-pict-45">
                                    <span class="gig-pict-45">
                                        <span class="outer-ring">
                                        <img src="'.asset('image/').'/'.$buyer_info->user_image.'" alt="gig_image" >
                                        </span>
                                        
                                    </span>
                                    ' .$buyer_info->username. '
                               
                                </td>
                                <td class="title js-toggle-gig-stats ">
                                    <div class="ellipsis1">
                                        <a class="ellipsis" href="'.route('gig_order_details',$show_order->order_id).'">'.$show_order->gig_title.'</a>
                                    </div>
                                </td>
                                <td>'.\Carbon\Carbon::parse($show_order->created_at)->format('M d, Y').'</td>
                                <td>'.\Carbon\Carbon::parse($show_order->created_at)->format('M d, Y').'</td>
                                <td>$'.$show_order->subtotal.'</td>
                                
                                <td>
                                    <label for="sv" class="select-block v3">
                                        <span style="text-transform:uppercase;" class="alert alert-defualt">'.$show_order->status.'
                                    </label>
                                    '.$refferel.'
                                </td>
                            </tr> 
                        ';
                 }
                 $output .='</tbody>
                </tbody>
            </table>';
                echo $output;
        }else{

            echo 'No '.$status.' orders to show.';
        }
    }
    // order details buyer and freelancer both
    public function gig_order_details($gig_order)
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $username = Auth::user()->username;
        $get_order_details = DB::table('gig_orders')
            ->join('gig_basics', 'gig_orders.gig_id', 'gig_basics.gig_id')
            ->leftJoin('gig_requirements', 'gig_orders.gig_id', '=', 'gig_requirements.gig_id')
            ->leftJoin('order_requirement_ans', 'gig_orders.order_id', '=', 'order_requirement_ans.order_id');
             
            
            if($user_role == env('FRELANCER')){ //check seller
                $get_order_details =  $get_order_details->join('users', 'gig_orders.buyer_id', '=', 'users.id');
                $get_order_details =  $get_order_details->where('gig_orders.seller_id', $user_id);
            }
            if($user_role == env('BUYER')){ // check buyer 
                $get_order_details =  $get_order_details->join('users', 'gig_orders.seller_id', '=', 'users.id');
                $get_order_details =  $get_order_details->where('gig_orders.buyer_id', $user_id);
            }

            $get_order_details =  $get_order_details->join('userinfos', 'users.id', '=', 'userinfos.user_id')->select('gig_orders.*', 'users.username', 'userinfos.user_image', 'gig_basics.gig_title', 'gig_basics.gig_url', 'gig_basics.gig_payment_type', 'order_requirement_ans.requirement_ans', 'gig_requirements.requirement')->where('gig_orders.order_id', $gig_order)->first();

            if($get_order_details){
                if($user_role == env('BUYER')){ // check buyer or freelancer
                    return view('backend.buyer-order-details')->with(compact('get_order_details'));
                }else{
                    return view('backend.order-details')->with(compact('get_order_details'));
                }
               
            }else{
                Toastr::error('Sorry order not found.');
                return back();
            }
       
    }
    // messaging about order delivery
    public function quick_response(Request $request){
        $user_id = Auth::user()->id;
        $new_image_name = null ;
        if ($request->hasFile('work_file')) {   
            $this->validate($request, [
                'work_file' => 'max:2048'
            ]);

            $image = $request->file('work_file');
            $new_image_name = rand() .'.'. $image->getClientOriginalExtension();

            $image->move(public_path('deliver_file'), $new_image_name);
        }
        $data = [
            'deliver_order_id' => $request->order_id,
            'user_id' => $user_id,
            'work_file' => $new_image_name,
            'msg' => $request->msg
        ];
        $order_deliver = DB::table('order_delivers')->insert($data);
        return back();
    }

    // Order extra time or cancel order
    public function order_timeExtra_cancel(Request $request){
        $type = $request->order_review_time;
        $time = \Carbon\Carbon::now();
        $data =  DB::table('gig_orders')->where('order_id', $request->order_id);
            if($type == 'extra_time'){
                Toastr::success('Extra time started.');
                $data = $data->update(['created_at' => $time]);
            }else{
                Toastr::success('Your Order Cancel.!');
                $data = $data->update(['status' => 'cancel']);
            }   
        return back();
    }

    // order delivered 
    public function order_deliver(Request $request){
        $seller_id = Auth::user()->id;

        $check_identity = DB::table('gig_orders')
            ->where('order_id', $request->order_id)
            ->where('seller_id', $seller_id)->first();

        $new_image_name = null ;
        if ($request->hasFile('work_file')) {   
            $this->validate($request, [
                'work_file' => 'max:2048'
            ]);

            $image = $request->file('work_file');
            $new_image_name = rand() .'.'. $image->getClientOriginalExtension();

            $image->move(public_path('deliver_file'), $new_image_name);
        }

        if($check_identity){     
            $data = [
                'deliver_order_id' => $request->order_id,
                'user_id' => $seller_id,
                'work_file' => $new_image_name,
                'msg' => $request->msg
            ];
            $order_deliver = DB::table('order_delivers')->insert($data);
            DB::table('gig_orders')
                ->where('order_id', $request->order_id)
                ->where('seller_id', $seller_id)
                ->update(['status' => 'delivered']);
            if($order_deliver){
                Toastr::success('Your order successfully delivered.');
                return back();
            }else{
                Toastr::success('Your order not successfully delivered.');
                return back();
            }
        }else{
            Toastr::success('Your order not successfully delivered.');
            return back();
        }
    }

    // order revision delivery
    public function revision_delivery(Request $request){
        $user_id = Auth::user()->id;
        $request->validate([
            'revision_msg' => 'required|max:255',
        ]);
        $data = [
            'deliver_order_id' => $request->order_id,
            'user_id' => $user_id,
            'msg' => $request->revision_msg,
            'status' => 'revision'
        ];
        DB::table('order_delivers')->insert($data);
        Toastr::success('Your order revision send successfully.');
        return back();
    }

    // order completed 
    public function order_completed(Request $request, $order_id){
        $buyer_id = Auth::user()->id;

        $get_order_info = gig_order::where('order_id', $order_id)->where('buyer_id', $buyer_id)->first();
        if($get_order_info){
            $price = $get_order_info->quantity*$get_order_info->subtotal;
            $earning = $price;
            $type = 'direct';
            $ref_earning = 0;
            // if refferel exist 
            if($get_order_info->ref_user){
                $ref_earning = ($price*5)/100;
                $type = 'refferel';
                $earning = $price-$ref_earning;
            }

            $data = [
                'seller_id' => $get_order_info->seller_id,
                'buyer_id' => $get_order_info->buyer_id,
                'item_id' => $get_order_info->gig_id,
                'price' => $price,
                'earning' => $earning,
                'type' => $type,
                'ref_username' => $get_order_info->ref_user,
                'ref_earning' => $ref_earning,
                'status' => 'completed',
                'platform' => 'marketplace'
                
            ];
            $success = earning::create($data);

            if($success){ 
                 $order_deliver = DB::table('gig_orders')
                ->where('order_id', $order_id)
                ->where('buyer_id', $buyer_id)
                ->update(['status' => 'completed']);
                // if refferel user exist
                if($get_order_info->ref_user){
                    ref_count::create([
                        'ref_username' => $get_order_info->ref_user,
                        'total_view' => 0,
                        'total_item' => 1,
                        'ref_earning' => $ref_earning,
                    ]);
                }

                return redirect('/order/feadback/'.$order_id);
                exit();
            }
        }
        Toastr::error('Sorry your order not completed.');
        return back();
            
    }

    // buyer order manage 
    public function manage_buyer_order(){
        $buyer_id = Auth::user()->id;

        $get_order = DB::table('gig_orders')
            ->where('gig_orders.buyer_id' , '=', $buyer_id)->get();
            return view('backend.buyer-orders')->with(compact('get_order'));
    }

    // get buyer order by status
    public function get_orders_by_status($status='active')
    {
        $buyer_id = Auth::user()->id;
            $get_order = DB::table('gig_orders')
            ->Join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
            ->Join('users', 'gig_orders.seller_id', '=', 'users.id')
            ->select('gig_orders.*', 'gig_basics.gig_title', 'gig_basics.gig_url', 'users.id', 'users.username', 'users.name' );
            if($status != 'all'){
                $get_order = $get_order->where('gig_orders.status' , '=', $status);
            }
            $get_order = $get_order->where('gig_orders.buyer_id' , '=', $buyer_id)->get();
        

          
          if(count($get_order) > 0){
                $output = '
                <table class="responsive-table-input-matrix">
                    <thead>
                    <tr class="header-filter">
                    <td colspan="12" class="js-filter-title">'.$status.' gigs</td>
                    
                    </tr>
                    <tr>
                        <th></th>
                        <th>IMG</th>
                        <th>GIG Title </th>
                        <th>Order date</th>
                        <th>Due on</th>
                        <th>Total</th>
                        <th>Status</th>
                        
                    </tr>
                    </thead>
                <tbody>';
                foreach($get_order as $show_order){

                            $gig_img = DB::table('gig_images')->where('gig_id', $show_order->gig_id)->first(); 
                          
                           $output .='
                        
                            <tr class="tbgig">
                                <td><input type="checkbox"></td>
                                <td class="gig-pict-45">
                                    <span class="gig-pict-45">
                                        <img src="'.asset('gigimages/').'/'.$gig_img->image_path.'" alt="gig_image" >
                                    </span>
                                </td>
                                <td class="title js-toggle-gig-stats ">
                                    <div class="ellipsis1">
                                        <a class="ellipsis" target="_blank" href="'.route('gig_order_details',$show_order->order_id).'">'.$show_order->gig_title.'</a>
                                    </div>
                                </td>
                                <td>'.\Carbon\Carbon::parse($show_order->created_at)->format('M d, Y').'</td>
                                <td>'.\Carbon\Carbon::parse($show_order->created_at)->format('M d, Y').'</td>
                                <td>'.$show_order->total.'</td>
                                
                                <td>
                                    <label for="sv" class="select-block v3">
                                        <span style="text-transform:uppercase;" class="alert alert-success">'.$show_order->status.'
                                    </label>
                                </td>
                            </tr> 
                        ';
                 }
                 $output .='</tbody>
                </tbody>
            </table>';
                echo $output;
        }else{

            echo 'No '.$status.' orders to show.';
        }
    }

    public function buyer_order_details()
    {
        return view('backend.order-details');
    }

    public function stripe()
    {
        return view('backend/stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
       \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        \Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }

    public function feadback($order_id)
    {
        $buyer_id = Auth::user()->id;
        $get_order = DB::table('gig_orders')
            ->join('gig_basics', 'gig_orders.gig_id', 'gig_basics.gig_id')
            ->join('users', 'gig_orders.seller_id', '=', 'users.id')
            ->Join('gig_images', 'gig_orders.gig_id', '=', 'gig_images.gig_id')
            ->where('gig_orders.order_id', $order_id)
            ->where('gig_orders.buyer_id',  $buyer_id)
            ->where('gig_orders.status',  'completed')
             ->select('gig_orders.*', 'users.username', 'gig_basics.gig_title', 'gig_images.image_path') 
            ->first();
            if($get_order){
                return view('frontend.feadback')->with(compact('get_order'));
            }else{
                return back();
            }
        
    }
    public function insert_feadback(Request $request, $order_id){
        $buyer_id = Auth::user()->id;
        $get_order = DB::table('gig_orders')
            ->where('order_id', $order_id)
            ->where('buyer_id',  $buyer_id)->first();
        
        if($get_order){
            $data = [
                'gig_id' => $get_order->gig_id,
                'seller_id' =>  $get_order->seller_id,
                'buyer_id' =>  $get_order->buyer_id,
                'com_seller' => $request->com_seller,
                'service_describe' => $request->service_describe,
                'buy_again_recommend' => $request->buy_again_recommend,
                'feadback_msg' => $request->feadback_msg
            ];

            $insert_feadback = DB::table('feedback')->insert($data);  

            if($insert_feadback){
                return redirect::route('/order/completed/'.$order_id);
            }else{
                return back();
            }
        }
    }
}
