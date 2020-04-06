@extends('frontend.layouts.master')
@section('title', 'Order details')

@section('css')
<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">
<style>
.button.big.primary.wcart.v3 {
    text-align: center;
    padding-left: 0;
    color: #000;
}
.e-alert-box {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-flow: row nowrap;
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -webkit-align-items: baseline;
    -ms-flex-align: baseline;
    align-items: baseline;
    margin-bottom: 16px;
    padding: 16px;
    background-color: whitesmoke;
    border-left: 6px solid #00d7b3;
    border-radius: 4px;
    color: #454545;
    text-align: left;
}
.e-alert-box__icon {
    -webkit-flex: 0 0 30px;
    -ms-flex: 0 0 30px;
    flex: 0 0 20px;
    display: block;
    text-align: left;
    color: red;
    font-size: 14px;
}
.t-body a {
    color: #00d7b3;
}
.payment-method__tab-inner {
    text-align: center;
   
}
.payment-method__tab1 {
    float: left;
    width: 20%;
    border-top: 6px solid #00d7b3;
    border-bottom-color: transparent !important;
    background-color: white;
    padding-top: 1px;
    z-index: 1;
    text-align: center;
    padding-bottom: 20px;
}
.payment-method__title {
    margin: 20px;
}
.payment-method__tab {
    float: left;
    width: 20%;
    background-color: #eee;
    text-align: center;
    padding: 6px 12px;
    outline: 0;
    border-radius: 0;
    border: 0px solid #e1e8ed;
    border-left: 1px solid transparent;
    border-bottom-width: 1px;
}
.payment-method__tab:hover, .payment-method__tab:focus {
    background-color: white;
}
.payment-method__title.1 {
    margin-top: -5px;
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

.cart .cart-header-product, .cart .cart-item-product {
    width: 70% !important;
}

.cart .cart-item {
    padding: 25px 0px 0px !important;
    border-bottom: none !important;
 
}

.payment-method__tab-inner{
	float: left;
}

</style>
@endsection

@section('content')
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<form action="{{route('gigOrderPayment')}}" method="post">
				
			{{csrf_field()}}
					
			<div class="sidebar right">
				<div class="form-box-item not-padded">
					<h4>Order Summary</h4>
					<hr class="line-separator">
					<!-- CART OVERVIEW ITEM -->
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Subtotal </span></p>
						<p id="price_summary" class="price"><span>$</span>{{$package['price']}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Service Fee: </span></p>
						<p class="price"><span>$</span>2</p>
					</div>
					<hr class="line-separator">
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Total: </span></p>
						<p id="total_price" class="price"><span>$</span>{{$package['price']+2}}</p>
					</div>

					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Delivery Time: </span></p>
						<p id="total_price" class="price">{{$package['delivery_time']}} day</p>
					</div>
				</div>
				
				<button class="button big primary v3"> Secure checkout</button> 
				
			</div>
			<!-- /SIDEBAR -->
				
			<!-- CONTENT -->
			<div class="content left">
				<!-- CART -->
				<div class="cart">
					<!-- CART HEADER -->
					<div class="cart-header">
						<div class="cart-header-product">
							<p class="text-header small">Product Details</p>
						</div>
						<div class="cart-header-category">
							<p class="text-header small">Quantity</p>
						</div>
						<div class="cart-header-price">
							<p class="text-header small">Price</p>
						</div>

					</div>
					<!-- /CART HEADER -->

					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
						<div class="cart-item-product">
							<!-- ITEM PREVIEW -->
							<div class="item-preview">
								<a href="{{url('marketplace/'.$get_gigs->gig_url)}}">
									<figure class="product-preview-image small liquid">
										<img src="{{ asset('gigimages/'.$get_gigs->image_path)}}" alt="">
									</figure>
								</a>
								<a href="{{url('marketplace/'.$get_gigs->gig_url)}}">
								<p class="text-header small">I will {{$get_gigs->gig_title}}</p></a>
							
							</div>
							<!-- /ITEM PREVIEW -->
						</div>
						<!-- /CART ITEM PRODUCT -->

						<!-- quantity -->
						<div class="cart-item-category">
							Qty <select name="quantity" onchange="cngQuantity(this.value)" style="width: 60px; padding: 0px 15px 0 15px;">
								<?php for($i=1; $i<=20; $i++){
									echo '<option value="'.$i.'">'.$i.'</option>';
								}?>
							</select>
						</div>
						
						<!-- CART ITEM PRICE -->
						<div class="cart-item-price">
							<p id="price" class="price"><span>$</span>{{$package['price']}}</p>
						</div>
						<!-- /CART ITEM PRICE -->
						
					</div>
					<!-- /CART ITEM -->
					<div style="padding: 10px 25px;">
					
						<p style="font-weight: bold; color: #000;">{{$package['package_title']}}</p>
						<p style="color: #505050;">{{$package['package_dsc']}}</p><br/>

							@foreach($gig_features as $gig_feature)

								<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i> 
								{{ $gig_feature->feature_name}}<br/>

							@endforeach
					</div>
			</form>
				</div>
				<!-- /CART -->
				
				<div class="payment1">
					<!-- TAB HEADER -->
					<div class="payment2">
						
						<div class="payment-method__tabs is-hidden-phone">

								<div class="payment-method__tab-inner">
								<div class="payment-method__title">
								   <img alt="Visa" title="Visa" width="40px" height="20px" src="{{ asset('image/cc.svg')}}">
										  <img alt="MasterCard" title="MasterCard" width="40px" height="20px" src="{{ asset('image/cc1.svg')}}">
								</div>
							  </div>
							
								<div class="payment-method__tab-inner">
								<div class="payment-method__title">
								  <img alt="PayPal" width="65px" height="20px" src="{{ asset('image/paypal.svg')}}">
								</div>
							  </div>
							

							
								<div class="payment-method__tab-inner">
								<div class="payment-method__title">
								  <img alt="PayPal" width="60px" height="20px" src="{{ asset('image/skrill.svg')}}">
								</div>
							  </div>
							
								<div class="payment-method__tab-inner">
								<div class="payment-method__title 1">
									<h4 class="t-heading -size-xs h-m0">HOTlancer Credit</h4>
									
								</div>
							  </div>
						
						</div><br>
	<p style="width: 65%; float: left;margin-top: -10px; text-align: center;">Accepted Payment method SSL SECURED PAYMENT</p>
					</div>
					
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


<script>	
	function cngQuantity(qty){
		var price = <?php echo $package['price']; ?>;
		var subtotal = price*qty;
		var total_price = (price*qty)+2;
		document.getElementById("price_summary").innerHTML = '<span>$</span>'+subtotal;
		document.getElementById("total_price").innerHTML = '<span>$</span>'+total_price ;
	}
</script>

@endsection