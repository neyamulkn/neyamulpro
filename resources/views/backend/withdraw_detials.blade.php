@extends('backend.layouts.master')

@section('title', 'withdraw detials')

@section('css')
	<style type="text/css">
		textarea {

		     border: 1px solid #ccc !important; 
		}
	</style>
@endsection

@section('content')
	<!-- DASHBOARD CONTENT -->
	<div class="dashboard-content">
	    <!-- HEADLINE -->
	    <div class="headline simple primary">
	        <h4>Withdraw Earnings (${{Auth::user()->wallet}})</h4>

	    </div>
	    <!-- /HEADLINE -->

			<div class="form-box-item">
			
				<h4 style="margin-bottom: 0px;text-transform: capitalize;">{{$withdrawal->status}}</h4>
				@if(Auth::user()->role_id == env('ADMIN'))
					<p>{{$withdrawal->user->name}} requested for withdrawal ${{$withdrawal->amount}} </p><br/>
				@else
					@if($withdrawal->status == 'accepted')
						<p>Your withdrawal request has been received, and is being reviewed.</p>
					@endif
					@if($withdrawal->status == 'completed')
						<p>Your withdrawal request has been completed, after view days later you received your money.</p>
					@endif
				@endif
				<!-- TRANSACTION HISTORY -->
				<table class="table">
					
					<tr>
						<th>Invoice</th>
						<td>
							<p>{{$withdrawal->invoice_id}}</p>
						</td>
					</tr>
					<tr>
						<th>Date</th>
						<td>
							<p>{{Carbon\Carbon::parse($withdrawal->created_at)->format('M d, Y')}}</p>
						</td>
					</tr>
					<tr>
						<th>Payment Type</th>
						<td>
							<p>{{$withdrawal->payment_type}}</p>
						</td>
					</tr>
					<tr>
						<th>Account No</th>
						<td>
							<p>{{$withdrawal->account_no}}</p>
						</td>
					</tr>
					<tr>

						<th>Requested Amount</th>
						<td>
							<p class="text-header">${{$withdrawal->amount}}</p>
						</td>
					</tr>

				
					<!-- /TRANSACTION HISTORY ITEM -->
				</table>
				<!-- /TRANSACTION HISTORY -->
			
			<!-- /FORM BOX ITEM -->
			</div>
		
		
	</div>
	<!-- DASHBOARD CONTENT -->
@endsection

@section('js')
	<script type="text/javascript">
		function payInfo(name){
		
			if(name == 'Paypal'){
				document.getElementById("show_method").innerHTML = 
				'<div class="input-container"><label for="pp_ac" class="rl-label required">Your Paypal Account</label><input type="email" id="pp_ac" required  name="account_no" placeholder="Enter your paypal account"></div>';
			}else if(name == 'Bank'){
				document.getElementById("show_method").innerHTML = 
				'<div class="input-container"><label for="pp_ac" class="rl-label required">Your Bank Details</label><textarea type="text" required name="account_no" placeholder="Enter your Bank Details"></textarea></div>';
			}else if(name == 'Bkash'){
				document.getElementById("show_method").innerHTML = 
				'<div class="input-container"><label for="pp_ac" class="rl-label required">Your Personal Number</label><input type="text" required id="pp_ac" name="account_no" placeholder="Enter your bkash number"></div>';
			}else if(name == 'Payoneer'){
				document.getElementById("show_method").innerHTML = 
				'<div class="input-container"><label for="pp_ac" class="rl-label required">Your Payoneer Number</label><input type="text" id="pp_ac" required name="account_no" placeholder="Enter your payoneer number"></div>';
			}else if(name == 'Paytm'){
				document.getElementById("show_method").innerHTML = 
				'<div class="input-container"><label for="pp_ac" class="rl-label required">Your Paytm Number</label><input type="text" id="pp_ac" required name="account_no" placeholder="Enter Your Paytm Number"></div>';
			}else{
				document.getElementById("show_method").innerHTML = '';
			}
		}
	</script>
	<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>
@endsection