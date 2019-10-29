<?php

namespace App\Http\Controllers;

use App\job_order;
use App\earning;
use Illuminate\Http\Request;
use DB;
use Toastr;
use Auth;
use Session;
use Redirect;
class JobOrderController extends Controller
{
    
    public function job_manage_order(){
        return view('backend.workplace.orders');
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
            $get_order_details = $get_order_details->limit(1)->first();
            return view('backend.workplace.frelancer-order-details')->with(compact('get_order_details'));
            exit();
        }
        if($user_role == env('BUYER')){ // check buyer 
            $get_order_details =  $get_order_details->leftJoin('users', 'job_orders.freelancer_id', '=', 'users.id');
            $get_order_details =  $get_order_details->leftJoin('userinfos', 'users.id', '=', 'userinfos.user_id');
            $get_order_details = $get_order_details->limit(1)->first();
            return view('backend.workplace.buyer-order-details')->with(compact('get_order_details'));
            exit();
        }
        Toastr::error('Sorry permission restricted.');
        return back();
    }



    public function get_orders_by_status($status='active')
    {
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

        $get_order = $get_order->paginate(1);
   
        if(count($get_order) > 0){
                $output .= '
                <table class="responsive-table-input-matrix">
                    <thead>
                    <tr class="header-filter">
                    <td colspan="12" class="js-filter-title">'.$status.' jobs</td>
                    
                    </tr>
                    <tr>
                        <th></th>
                        <th>Job Title </th>
                        <th>Project Type</th>
                        <th>Order date</th>
                        <th>Total</th>
                        <th>Status</th>
                        
                    </tr>
                    </thead>
                <tbody>';
                foreach($get_order as $show_order){
                   $output .='
                
                    <tr class="tbgig">
                        <td><input type="checkbox"></td>
                        
                        <td class="title js-toggle-gig-stats ">
                            <div class="ellipsis1">
                                <a class="ellipsis" target="_blank" href="'.url('dashboard/workplace/order-details/'.$show_order->order_id).'">'.$show_order->job_title.'</a>
                            </div>
                        </td>
                        <td>'.$show_order->price_type.'</td>
                        <td>'.\Carbon\Carbon::parse($show_order->created_at)->format('M d, Y').'</td>
                        <td>'.$show_order->proposal_budget.'</td>
                        
                        <td>
                            <label for="sv" class="select-block v3">
                                <span style="text-transform:uppercase;" class="alert alert-success">'.$show_order->status.'
                            </label>
                        </td>
                    </tr>';
                }
                $output .='</tbody>
                </tbody>
            </table>
            <div class="page primary paginations">
               '.$get_order->links().'
            </div>';
                echo $output;
        }else{

            echo 'No '.$status.' orders to show.';
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
                Toastr::success('Your order not successfully delivered.');
                return back();
            }
        }else{
            Toastr::error('Your order not successfully delivered.');
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
                'freelancer_id' => $get_order_info->freelancer_id,
                'buyer_id' => $get_order_info->buyer_id,
                'item_id' => $get_order_info->job_id,
                'price' => $price,
                'earning' => $earning,
                'type' => $type,
                'ref_username' => $get_order_info->ref_user,
                'ref_earning' => $ref_earning,
                'status' => 'active',
                'platform' => 'workplace'
                
            ];
            $success = earning::create($data);

            if($success){ 
                 $order_deliver = DB::table('job_orders')
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

                return Redirect::route('job_feadback', $order_id);
                exit();
            }
        }    
        Toastr::error('Sorry your order not completed');
        return back(); 
        
    }

    public function feadback($order_id)
    {
        $buyer_id = Auth::user()->id;
        $get_order = DB::table('job_orders')
            ->join('gig_basics', 'job_orders.gig_id', 'gig_basics.gig_id')
            ->join('users', 'job_orders.freelancer_id', '=', 'users.id')
            ->Join('gig_images', 'job_orders.gig_id', '=', 'gig_images.gig_id')
            ->where('job_orders.order_id', $order_id)
            ->where('job_orders.buyer_id',  $buyer_id)
            ->where('job_orders.status',  'completed')
             ->select('job_orders.*', 'users.username', 'gig_basics.gig_title', 'gig_images.image_path') 
            ->first();
            if($get_order){
                return view('frontend.feadback')->with(compact('get_order'));
            }else{
                return back();
            }
        
    }
    public function insert_feadback(Request $request, $order_id){
        $buyer_id = Auth::user()->id;
        $get_order = DB::table('job_orders')
            ->where('order_id', $order_id)
            ->where('buyer_id',  $buyer_id)->first();
        
        if($get_order){
            $data = [
                'gig_id' => $get_order->gig_id,
                'freelancer_id' =>  $get_order->freelancer_id,
                'buyer_id' =>  $get_order->buyer_id,
                'com_seller' => $request->com_seller,
                'service_describe' => $request->service_describe,
                'buy_again_recommend' => $request->buy_again_recommend,
                'feadback_msg' => $request->feadback_msg
            ];

            $insert_feadback = DB::table('feedback')->insert($data);  

            if($insert_feadback){
                return redirect('/order/completed/'.$order_id);
            }else{
                return back();
            }
        }
    }
}
