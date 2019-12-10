@extends('backend.layouts.master')

@section('title', 'Withdraw amount')

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

		<!-- FORM BOX ITEMS -->
		<div class="row">
			<!-- FORM BOX ITEM -->
			<div class="col-md-12 form-box-item">
				
				<form action="{{(Auth::user()->wallet>=50) ? route('withdraw_request') : ''}}" method="POST" id="withdraw-form" data-parsley-validate>
					@csrf
					<!-- INPUT CONTAINER -->
					<div class="input-container">
						<label for="amount" class="rl-label required">Amount to Withdraw </label>
						<input type="number" id="amount" required="" name="amount" min="0" step="any" placeholder="Enter the amount you want to withdraw...">
						<p>Minimum withraw $50 </p>
					</div>
					
					<!-- INPUT CONTAINER -->
					<div class="input-container">
						<label class="rl-label required">Choose your Withdrawal Method </label>
						<select name="payment_type" onchange="payInfo(this.value)" required="">
							<option value="">Select Withdrawal Method</option>
							@foreach($get_method as $show_method)
								<option value="{{$show_method->method_name}}">{{$show_method->method_name}}</option>
							@endforeach
						</select>
					</div>
					
					<!-- INPUT CONTAINER -->
					<span id="show_method"></span><br/>
					<!-- /INPUT CONTAINER -->
					<button {{ (Auth::user()->wallet<50) ? "disabled style=cursor:not-allowed !important" : '' }} class="button big dark">Request <span class="primary">Withdrawal</span></button>
				</form>
			</div>
			
			<div class="col-md-12 form-box-item">
			
				<h4>Withdrawal History</h4>
				
				<!-- TRANSACTION HISTORY -->
				<table class="table">
					<thead>
				      <tr>
				        <th>Invoice</th>
				        <th>Date</th>
				        <th>Payment Type</th>
				        <th>Account No</th>
				        <th>Amount</th>
				        <th>Status</th>
				      </tr>
				    </thead>
					<!-- TRANSACTION HISTORY ITEM -->
					@foreach($withdrawals as $withdrawal)
					<tr>
						<td>
							<p>{{$withdrawal->invoice_id}}</p>
						</td>
						<td>
							<p>{{Carbon\Carbon::parse($withdrawal->created_at)->format('M d, Y')}}</p>
						</td>
						<td>
							<p>{{$withdrawal->payment_type}}</p>
						</td>
						<td>
							<p>{{$withdrawal->account_no}}</p>
						</td>
						<td>
							<p class="text-header">${{$withdrawal->amount}}</p>
						</td>
						<td>
							<p class="text-header">{{$withdrawal->status}}</p>
						</td>
					</tr>
					@endforeach
					<!-- /TRANSACTION HISTORY ITEM -->
				</table>
				<!-- /TRANSACTION HISTORY -->
			
			<!-- /FORM BOX ITEM -->
			</div>
		</div>
		<!-- /FORM BOX ITEMS -->
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