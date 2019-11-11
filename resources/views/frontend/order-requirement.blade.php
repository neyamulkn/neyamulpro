@extends('frontend.layouts.master')
@section('title', 'Order requirement')

@section('css')
<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">
<style>
.button.big.primary.wcart.v3 {
    text-align: right;
    padding-left: 0;
    color: #000;
}
button{
	float: right !important;
	margin: 5px;
}
.cart .cart-item{
	padding: 10px 20px !important;
}
textarea, span{
	text-align: left !important;
	margin: 5px 0px;
}
img.input-container2 {
    float: right;
    margin-top: -35px;
    padding-right: 16px;
}
.input-containervv {
    width: 45%;
    float: left;
    margin-right: 4px;
}
.input-containervvs {
    width: 45%;
    float: left;
}
span.t-body.-size-l.h-m0.h-pull-left {
    font-size: 36px;
    float: left;
    font-weight: bold;
}
.e-fieldset__footer {
    background-color: #fafafa;
    border-top: 1px solid #e0e0e0;
    padding: 16px;
    text-align: right;
    overflow: auto;
}
.secure_checkout_banner {
    float: left;
}
.secure-checkout-button__container {
    float: right;
    padding-left: 10px;
}
.button.mid.primary {
    padding: 0 25px;
}
p.t-body {
    margin-bottom: 10px;
}
.media__item.-align-center {
    float: left;
    margin-right: 20px;
}
li.financial-institutes__logo {
    float: left;
    position: relative;
	padding-right: 7px;
}
.media.h-mt2 {
    overflow: auto;
    margin-bottom: 20px;
}
.button.mid {
    padding: 0 10px;
}
.secure_checkout_banner {
    margin-top: 10px;
}
.payment33 {
    padding: 22px 24px 26px;
    background-color: #fff;
    border: 1px solid #ebebeb;
    position: relative;
}


</style>
@endsection

@section('content')
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			@if(Session::get('msg'))
			<div class="alert alert-success alert-dismissible">
				<strong>Success</strong> {{Session::get('msg')}}
				{{Session::forget('msg')}}
			   <a href="#" class="close" data-dismiss="alert" style="float: right;" aria-label="close">&times;</a>
			</div>
			@endif
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<div class="form-box-item not-padded">
					<h4>Order Summary</h4>
					<hr class="line-separator">
					<!-- CART OVERVIEW ITEM -->
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Oder Id: </span></p>
						<p id="price_summary" class="price">{{$get_order_info->order_id}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Oder date:</span></p>
						<p id="price_summary" class="price">{{ \Carbon\Carbon::parse($get_order_info->created_at)->format('M d, Y')}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Subtotal: </span></p>
						<p id="price_summary" class="price">{{$get_order_info->subtotal}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Quantity: </span></p>
						<p class="price">&#215; {{$get_order_info->quantity}}</p>
					</div>
					<hr class="line-separator">
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Total: </span></p>
						<p id="total_price" class="price"><span>$</span>{{$get_order_info->total}}</p>
					</div>
				</div>
				
			</div>
			<!-- /SIDEBAR -->
				
			<!-- CONTENT -->
			<div class="content left">
				<!-- CART -->
				<div class="cart">
					<!-- CART HEADER -->
					<div class="cart-header">
						<div class="cart-header-product">
							<p class="text-header small">Submit Requirements to start order </p>
						</div>
					</div>
					
					<form action="{{url('/order/requirements/'.$get_order_info->order_id)}}" method="post">
						
						<div class="cart-item">
							<span>{{$get_order_info->requirement}} </span>
							{{csrf_field()}}
							<input type="hidden" name="order_id[]" value="{{$get_order_info->order_id}}">
							<input type="hidden" name="gig_id[]" value="{{$get_order_info->gig_id}}">
							<textarea name="requirement_ans[]" maxlength="5000" style="border:1px solid #ccc; " id="textarea" placeholder="Enter requirement ..."></textarea>
							<p> 0/2500 </p>
							
							<label for="attach_file" style="font-size: 15px; float: right;" class="icon-energy attach-msg">
                                Attace File<input type="file" id="attach_file" name="attach_file[]" style="display: none;">
                            </label>
							<div style="float: right; width: 100%;">
								<button class="button small primary"> Start Order </button>  
								<button style="color: #000" class="button small"> Remind Me Later</button>
							</div>
						</div>

					</form>
				</div>
			</div>
			<!-- CONTENT -->
		</div>
	</div>
<!-- /SECTION -->
@endsection

@section('js')

<!-- Tweet -->
<script src="{{ asset('allscript')}}/js/post-tab.js"></script>

<script src="{{asset('/allscript')}}/js/bootstrap.min.js"></script>

@endsection