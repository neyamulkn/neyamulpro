<?php

namespace App\Http\Controllers;

use App\User;
use App\job_order;
use App\earning;
use App\JobFeedback;
use Illuminate\Http\Request;
use DB;
use Toastr;
use Auth;
use Session;
use Redirect;
class JobOrderController extends Controller
{
    
    public function job_manage_order($status='active'){
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $output = '';
    
        $get_order= DB::table('job_orders')
        ->leftJoin('jobs', 'job_orders.job_id', 'jobs.job_id')
        ->leftJoin('job_proposals', 'job_orders.proposal_id', 'job_proposals.proposal_id')
        ->select('job_orders.*', 'jobs.job_title', 'jobs.job_title_slug', 'jobs.price_type', 'job_proposals.work_duration');

        if($status != 'all'){
            $get_order = $get_order->where('job_orders.status' , '=', $status);
        }
        if($user_role == env('FRELANCER')){ //check seller
            $get_order = $get_order->where('job_orders.freelancer_id', $user_id);
        }
        if($user_role == env('BUYER')){ // check buyer 
            $get_order = $get_order->where('job_orders.buyer_id', $user_id);
        }

        $get_order = $get_order->paginate(10);


        if(!isset($_GET['ajaxRequest'])){
            return view('backend.workplace.orders')->with(compact('get_order'));
        }else{
            echo view('backend.workplace.orderStatus')->with(compact('get_order'));
        }
       
        
    }

    public function order_details($order_id){

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $get_order_details = DB::table('job_orders')
        ->join('jobs', 'job_orders.job_id', 'jobs.job_id')
        ->join('job_proposals', 'job_orders.proposal_id', 'job_proposals.proposal_id')
        ->select('job_orders.*','userinfos.user_image', 'jobs.job_title', 'jobs.job_title_slug', 'jobs.price_type', 'job_proposals.work_duration', 'users.username')
        ->where('order_id', $order_id)
        ->where(function($query) use ($user_id) {
            $query->where('job_orders.buyer_id', $user_id)
            ->orWhere('job_orders.freelancer_id', $user_id);
        });

        if($user_role == env('FRELANCER')){ //check frelancer show buyer username
            $get_order_details =  $get_order_details->join('users', 'job_orders.buyer_id', '=', 'users.id');
            $get_order_details =  $get_order_details->leftJoin('userinfos', 'users.id', '=', 'userinfos.user_id');
        }

        if($user_role == env('BUYER')){ // check buyer 
            $get_order_details =  $get_order_details->leftJoin('users', 'job_orders.freelancer_id', '=', 'users.id');
            $get_order_details =  $get_order_details->leftJoin('userinfos', 'users.id', '=', 'userinfos.user_id');
        }

        $get_order_details = $get_order_details->limit(1)->first();
        if($get_order_details){
            if($user_role == env('BUYER')){ // check buyer 
                return view('backend.workplace.buyer-order-details')->with(compact('get_order_details'));
            }
            if($user_role == env('FRELANCER')){
                return view('backend.workplace.frelancer-order-details')->with(compact('get_order_details'));
            }  
        }else{
            Toastr::error('Sorry permission restricted.');
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
            'order_id' => $request->order_id,
            'user_id' => $user_id,
            'work_file' => $new_image_name,
            'msg' => $request->msg
        ];
        $order_deliver = DB::table('job_order_deliver')->insert($data);
        return back();
    }
// Order extra time or cancel order
    public function order_timeExtra_cancel(Request $request){
        $type = $request->order_review_time;
        $time = \Carbon\Carbon::now();
        $data =  DB::table('job_orders')->where('order_id', $request->order_id);
            if($type == 'extra_time'){
                Toastr::success('Extra time started.');
                $data = $data->update(['created_at' => $time]);
            }else{
                Toastr::info('Your Order Cancel.!');
                $data = $data->update(['status' => 'cancel']);
            }   
        return back();
    }

    // order delivered 
    public function order_deliver(Request $request){
        $freelancer_id = Auth::user()->id;

        $check_identity = DB::table('job_orders')
            ->where('order_id', $request->order_id)
            ->where('freelancer_id', $freelancer_id)->first();

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
                'order_id' => $request->order_id,
                'user_id' => $freelancer_id,
                'work_file' => $new_image_name,
                'msg' => $request->msg
            ];
            $order_deliver = DB::table('job_order_deliver')->insert($data);
            DB::table('job_orders')
                ->where('order_id', $request->order_id)
                ->where('freelancer_id', $freelancer_id)
                ->update(['status' => 'delivered']);
            if($order_deliver){
                Toastr::success('Your order successfully delivered.');
                return back();
            }else{
                Toastr::success('Your order not delivered.');
                return back();
            }
        }else{
            Toastr::error('Your order not delivered.');
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
            'order_id' => $request->order_id,
            'user_id' => $user_id,
            'msg' => $request->revision_msg,
            'status' => 'revision'
        ];
        DB::table('job_order_deliver')->insert($data);
        Toastr::success('Your order revision send successfully.');
        return back();
    }

    // order completed 
    public function order_completed(Request $request, $order_id){
        $buyer_id = Auth::user()->id;

        $get_order_info = job_order::where('order_id', $order_id)->where('buyer_id', $buyer_id)->first();
        if($get_order_info){
            $price = $get_order_info->proposal_budget;
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
                'seller_id' => $get_order_info->freelancer_id,
                'buyer_id' => $get_order_info->buyer_id,
                'item_id' => $get_order_info->job_id,
                'order_id' => $get_order_info->order_id,
                'platform' => 'workplace',
                'price' => $price,
                'earning' => $earning,
                'type' => $type,
                'ref_username' => $get_order_info->ref_user,
                'ref_earning' => $ref_earning,
                'status' => 'income',
                
            ];
            $success = earning::create($data);

            if($success){ 
                //order status completed
                $get_order_info->update(['status' => 'completed']);
                //increment freelancer wallet
                User::find($get_order_info->freelancer_id)->increment('wallet', $earning);
               
                // if refferel user exist
                if($get_order_info->ref_user){
                    ref_count::create([
                        'ref_username' => $get_order_info->ref_user,
                        'total_view' => 0,
                        'total_item' => 1,
                        'ref_earning' => $ref_earning,
                    ]);
                }
            Toastr::success('Your order successfully completed.');
            return Redirect::route('job_feadback', $order_id);
             
            }
        }    
        Toastr::error('Sorry your order not completed');
        return back(); 
        
    }

    public function job_feadback($order_id)
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $username = Auth::user()->username;
        $get_order_details = DB::table('job_orders')
            ->join('jobs', 'job_orders.job_id', 'jobs.job_id')
            ->leftJoin('job_feedbacks', 'job_orders.order_id', 'job_feedbacks.order_id');
            
            if($user_role == env('FRELANCER')){ //check seller
                $get_order_details =  $get_order_details->join('users', 'job_orders.buyer_id', '=', 'users.id');
                $get_order_details =  $get_order_details->where('job_orders.freelancer_id', $user_id);
            }
            if($user_role == env('BUYER')){ // check buyer 
                $get_order_details =  $get_order_details->join('users', 'job_orders.freelancer_id', '=', 'users.id');
                $get_order_details =  $get_order_details->where('job_orders.buyer_id', $user_id);
            }

            $get_order_details =  $get_order_details->join('userinfos', 'users.id', '=', 'userinfos.user_id')
                ->where('job_orders.order_id', $order_id)
                ->where('job_orders.status', 'completed')
                ->select('job_orders.order_id as jobOrderId', 'job_orders.proposal_budget', 'job_orders.status', 'job_feedbacks.*', 'users.username', 'userinfos.user_image', 'jobs.job_title', 'jobs.job_title_slug', 'jobs.price_type')->first();
    // dd($get_order_details);
            if($get_order_details){
                return view('backend.workplace.feadback')->with(compact('get_order_details'));
             
            }else{
                Toastr::error('Sorry order not found.');
                return back();
            }
            
        
        
    }
    public function insert_feadback(Request $request, $order_id){

        $user_id = Auth::user()->id;
        $get_order = DB::table('job_orders')
            ->where('order_id', $order_id)
            ->where(function($query) use ($user_id){
                $query->where('buyer_id',  $user_id)
                ->orWhere('freelancer_id',  $user_id);
            })->where('job_orders.status', 'completed')->first();
        
        if($get_order){
            $data = [
                'order_id' => $get_order->order_id,
                'job_id' => $get_order->job_id,
                'freelancer_id' =>  $get_order->freelancer_id,
                'buyer_id' =>  $get_order->buyer_id,
            ];

            if(Auth::user()->role_id == env('FRELANCER')){
                $data = array_merge($data, ['ratting_buyer' => $request->ratting, 'feedback_buyer' => $request->feedback_msg ]);
            }

            if(Auth::user()->role_id == env('BUYER')){
               $data = array_merge($data, ['ratting_freelancer' => $request->ratting, 'feedback_freelancer' => $request->feedback_msg]);
            }

            $success = JobFeedback::updateOrCreate(['order_id' => $order_id, 'job_id' => $get_order->job_id], $data); 

            if($success){
                Toastr::success('Thanks for give your feadback.');
                return redirect::route('job_order_details', $order_id);
            }else{
                return back();
            }
        }else{
            return back();
        }
    }
}
