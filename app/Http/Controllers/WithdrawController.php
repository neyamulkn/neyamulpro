<?php

namespace App\Http\Controllers;

use App\Withdraw;
use Illuminate\Http\Request;
use App\PaymentMethod;
use App\Notification;
use App\User;
use Auth;
use DB;
use Toastr;
class WithdrawController extends Controller
{
    public function withdrawal(){
        $data = [];
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;
        $country = Auth::user()->country;
        $data['get_method'] = PaymentMethod::whereIn('country', [$country, 'Global'])->where('status', 1)->select('method_name')->get();

        $withdrawal = DB::table('withdraws');
        if($user_role != env('ADMIN')){  // query for view withdraw admin page
            $withdrawal =  $withdrawal->where('user_id', $user_id);
            $view = 'backend.withdrawals';
        }else{
            $view = 'admin.withdrawals';
        }
 
        $data['withdrawals'] = $withdrawal->join('users', 'withdraws.user_id', 'users.id')->select('withdraws.*', 'users.username', 'users.wallet')->orderBy('id', 'DESC')->get();

        return view($view)->with($data);
    }

    public function withdraw_request(Request $request){
        try{
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $wallet_amount = $user->wallet;

            if($request->amount > $wallet_amount){
               Toastr::error('Insufficient your wallet amount.');
            }elseif($request->amount < 50){
                Toastr::error('Minimum withdrawal amount $50');
            }else{
                $amount = $wallet_amount - $request->amount;
                $update = User::where('id', $user_id)->update(['wallet' => $amount]);
                if($update){
                    $request_data = $request->except(['password']);
                    $invoice_id = $this->createinvoice_id();
                    $data = array_merge($request_data, ['user_id' => $user_id, 'invoice_id' => $invoice_id]);
                    $insert = Withdraw::create($data);
                    if($insert){
                        Notification::create([
                            'platform' => 'all',
                            'type' => 'withdrawal',
                            'item_id' => $invoice_id,
                            'forUser' => 1, // admin user ID
                            'entityID' => $user_id,
                            'read' => 0
                        ]);
                    }
                    Toastr::success('Your withdrawal request successfully submited.');
                }
            }
            
        }catch(\Exception $e){
            Toastr::error($e->getMessage());
        }

        return back();
    }

    public function withdrawalAction(Request $request){
        $user_id = Auth::user()->id;
        $withdrawalInfo = Withdraw::find($request->id);

        if($request->status == 'received'){
           $update = Withdraw::where('id', $request->id)->update(['status' => $request->status]);
            if($update){
                DB::table('notifications')->insert([
                    'platform' => 'all',
                    'type' => 'withdrawal',
                    'item_id' => $withdrawalInfo->invoice_id,
                    'forUser' => $withdrawalInfo->user_id,
                    'entityID' => $user_id,
                    'read' => 0
                ]);
                echo "Withdrawal request received";
            }else{
                echo "Sorry withdrawal cann\'t received.";
            }
        }
        elseif($request->status == 'completed'){
            $update = Withdraw::where('id', $request->id)->update(['transaction_id' => $request->transection_id, 'status' => $request->status]);
            if($update){
                DB::table('notifications')->insert([
                    'platform' => 'all',
                    'type' => 'withdrawal',
                    'item_id' => $withdrawalInfo->invoice_id,
                    'forUser' => $withdrawalInfo->user_id,
                    'entityID' => $user_id,
                    'read' => 0
                ]);
               Toastr::success("Withdrawal request completed");
            }else{
                Toastr::error("Sorry withdrawal cann\'t completed.");
            }
            return back();
        }else{
            echo "Sorry your request faild try again";
        }
    }

    public function withdraw_detials($invoice_id){
        $withdrawal = Withdraw::where('invoice_id', $invoice_id)->first();
        return view('backend.withdraw_detials')->with(compact('withdrawal'));
    }


    public function createinvoice_id()
    {
        $invoice_id =strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -8));
      
      $check_invoice_id = Withdraw::select('invoice_id')->where('invoice_id', 'like', $invoice_id.'%')->get();

      if (count($check_invoice_id)>0){
        //find invoice_id until find not used.
        for ($i = 1; $i <= count($check_invoice_id); $i++) {
            $new_invoice_id = $invoice_id.'-'.$i;
            if (!$check_invoice_id->contains('invoice_id', $new_invoice_id)) {
              return $new_invoice_id;
            }
        }
      }else{ return $invoice_id; }   
    }













}
