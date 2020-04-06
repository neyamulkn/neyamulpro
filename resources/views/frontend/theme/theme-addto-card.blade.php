@extends('frontend.layouts.master')
@section('title', 'Shopping cart details')

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
    width: 535px !important;
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
			<form action="{{url('themeplace/checkout')}}" method="post">
				
				{{csrf_field()}}
				
				<div class="sidebar right">
					<div class="form-box-item not-padded">
						<h4>Your Cart Total</h4>
						<hr class="line-separator">
						<!-- CART OVERVIEW ITEM -->
						<?php $cart_total = array_sum(array_column($get_themecart_info->toArray(), 'price')); ?>
						<div class="cart-overview-item">
							<p class="text-header small"><span class="primary">Total: </span></p>
							<p id="total_price" class="price"><span>$</span>
								{{  $cart_total }}
							</p>
						</div>

					</div>
					@if( $cart_total > 0)
					<button class="button big primary v3"> Secure checkout </button> 
					@endif
				</div>
			</form>
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
						
						<div class="cart-header-actions">
							<p class="text-header small">Lichance Name</p>
						</div>

						<div class="cart-header-price">
							<p class="text-header small">Price</p>
						</div>

						<div class="cart-item-actions">
							<p class="text-header small">Action</p>
						</div>
						
					</div>
					<!-- /CART HEADER -->
			@if(count($get_themecart_info)>0)
				@foreach($get_themecart_info as $show_cart)
		
				<?php
		            $get_theme = DB::table('themes')
		            	->join('users', 'themes.user_id', 'users.id')
		                ->where('theme_id', $show_cart->theme_id)->first();
				 ?>
				
					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
						<div class="cart-item-product">
							<!-- ITEM PREVIEW -->
							<div class="item-preview">
								<a href="{{route('theme_detail', [$get_theme->theme_url])}}">
									<figure class="product-preview-image small liquid">
										<img src="{{ asset('theme/images/thumb/'.$get_theme->main_image)}}" alt="">
									</figure>
								</a>
								<a href="{{route('theme_detail', [$get_theme->theme_url])}}"><p class="text-header small">{{$get_theme->theme_name}}</p></a>
								<a href=""><p class="text-header small" style="color: #888;font-weight:400">Item by {{$get_theme->username}}</p></a>
								
							</div>
							<!-- /ITEM PREVIEW -->
						</div>
						<!-- /CART ITEM PRODUCT -->

						<!-- CART ITEM PRICE -->
						<div class="cart-item-actions">
							<p >{{$show_cart->lichance_name}}</p>
						</div>

						<div class="cart-item-price">
							<p id="price" class="price"><span>$</span>{{$show_cart->price}}</p>
						</div>
						<!-- /CART ITEM PRICE -->
						<!-- CART ITEM ACTIONS -->
						<div class="cart-item-actions">
							<a href="{{route('themeCartDelete', $show_cart->cart_id)}}" onclick ="return confirm('Are you sure delete it.')" class="button dark-light rmv">
								<!-- SVG PLUS -->
								<svg class="svg-plus">
									<use xlink:href="#svg-plus"></use>	
								</svg>
								<!-- /SVG PLUS -->
							</a>
						</div>
					</div>
				
				@endforeach
			@else <h4 style="text-align: center;padding: 20px;">Your cart is empty</h4> @endif
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


@endsection