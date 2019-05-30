@extends('frontend.layouts.master')
@section('title', 'Order payment')

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
    margin-left: 20px;
}
.payment-method__tab1 {
    float: left;
    width: 25%;
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
    width: 25%;
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

.ElementsApp{
	font-size: 18px !important;
}

.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;

</style>
@endsection

@section('content')
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<div class="form-box-item not-padded">
					<h4>Order Summary</h4>
					<hr class="line-separator">
					<!-- CART OVERVIEW ITEM -->
					<div class="item-preview" style="height:75px">
								
							<figure class="product-preview-image small liquid" style="width:75px">
								<img src="{{ asset('gigimages/'.session::get('image_path'))}}" alt="">
							</figure>
								
								<p class="text-header small">I will {{session::get('gig_title')}}</p>
							
							</div>

					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Subtotal </span></p>
						<p id="price_summary" class="price"><span>$</span>{{Session::get('subtotal')}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Quantity </span></p>
						<p id="price_summary" class="price">{{Session::get('item_quantity')}}</p>
					</div>

					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Service Fee: </span></p>
						<p class="price"><span>$</span>2</p>
					</div>
					<hr class="line-separator">
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Total: </span></p>
						<p id="total_price" class="price"><span>$</span>{{Session::get('total')}}</p>
					</div>

					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Delivery Time: </span></p>
						<p id="total_price" class="price">{{Session::get('delivery_time')}} day</p>
					</div>
				</div>
			</div>
			<!-- /SIDEBAR -->
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
			  <input type="hidden" name="cmd" value="_xclick">
			  <input type="hidden" name="business" value="neyamul@buyer.com">
			  <input type="hidden" name="item_name" value="{{Session::get('package_name')}}">
			  <input type="hidden" name="item_number" value="{{Session::get('gig_order_id')}}">
			  <input type="hidden" name="quantity" value="{{Session::get('item_quantity')}}">
			  <input type="hidden" name="amount" value="{{Session::get('subtotal')}}">
			  <input type="hidden" name="tax" value="2">
			  <input type="hidden" name="currency_code" value="USD">
			  <input type="hidden" name="return" value="{{url('order/payment/success')}}">
			  <input type="hidden" name="cancel_return" value="{{url('order/payment/cancel')}}">
			  <input type="image" style="display: none" id="submit_btn" name="submit"
			    value="Place Order">
			</form>	
			<!-- CONTENT -->
			<div class="content left">
				
				<div class="payment1">
					<!-- TAB HEADER -->
					<div class="payment2">
						<!-- TAB ITEM -->
						<div class="payment33">
							<h4>Select Payment Method</h4>
						</div>

						<div class="payment-method__tabs is-hidden-phone">

				
							<button name="payment_key"onclick="paymentbtn('masterCard')"  value="buy_now::credit" aria-selected="false" class="payment-method__tab " data-google-analytics-payment-method="credit">
								<div class="payment-method__tab-inner">
								<div class="payment-method__title">
								   <img alt="Visa" title="Visa" width="48px" height="25px" src="{{ asset('image/cc.svg')}}">
										  <img alt="MasterCard" title="MasterCard" width="48px" height="25px" src="{{ asset('image/cc1.svg')}}">
								</div>
							  </div>
							</button>

							<button name="payment_key" onclick="paymentbtn('paypal')"  value="buy_now::credit" aria-selected="false" class="payment-method__tab " data-google-analytics-payment-method="credit">
								<div class="payment-method__tab-inner">
								<div class="payment-method__title">
								  <img alt="PayPal" width="95px" height="25px" src="{{ asset('image/paypal.svg')}}">
								</div>
							  </div>
							</button>

							<button name="payment_key"  value="buy_now::paypal" aria-selected="false" class="payment-method__tab " data-google-analytics-payment-method="paypal">
								<div class="payment-method__tab-inner">
								<div class="payment-method__title">
								  <img alt="PayPal" width="95px" height="25px" src="{{ asset('image/skrill.svg')}}">
								</div>
							  </div>
							</button>

							<button name="payment_key" onclick="paymentbtn('hotlancer')" value="buy_now::paypal" aria-selected="false">
								<div class="payment-method__tab-inner">
								<div class="payment-method__title 1">
									<h4 class="t-heading -size-xs h-m0">HOTlancer Credit</h4>
									<p class="t-body -size-m h-m0">Balance: $0</p>
								</div>
							  </div>
							</button>
						</div>
					</div>
					<!-- /TAB HEADER -->
					<div class="clearfix"></div><br>
					<!-- TAB CONTENT -->
					<div id="masterCard" class="form-box-item not-padded">


					<script src="https://js.stripe.com/v3/"></script>
					<form action="{{url('order/placeorder/stripe_payment/')}}" method="post" id="payment-form">
						{{csrf_field()}}
						<input type="hidden" name="payment_method" value="card">
					  <div class="form-row">
					    <label for="card-element">
					      Credit or debit card
					    </label>
					    <div id="card-element">
					      <!-- A Stripe Element will be inserted here. -->
					    </div>

					    <!-- Used to display Element errors. -->
					    <div id="card-errors" role="alert"></div>
					  </div>

					  <div class="e-fieldset__footer">
						  <div class="secure_checkout_banner">
							<span class="secure-checkout-banner1">
							  <i class="icon-lock"></i>
							  Secure checkout
							</span>

						  </div>
						  <div class="secure-checkout-button__container">
							<button class="button mid primary">Make payment</span></button>
						  </div>
						</div>
					</form>

					<script>	
// Create a Stripe client.
var stripe = Stripe('pk_test_msylOZgGqmapcVEusThwodv000ByQ2tetz');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
	
					</div>
					
					<div id="paypal" style="display: none;" class="form-box-item not-padded">
						
						<div class="media h-mt2">
							<div class="media__item -align-center">
							  <p class="t-body h-m0">PayPal accepts</p>
							</div>
							<div class="media__body">
								<ul id="paypal" class="financial-institutes">
									<li class="financial-institutes__logo">
									  <img alt="Visa" title="Visa" width="48px" height="30px" src="{{asset('image/')}}/cc1.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="MasterCard" title="MasterCard" width="48px" height="30px" src="{{asset('image/')}}/cc.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="American Express" title="American Express" width="48px" height="30px" src="{{asset('image/')}}/3.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="Discover" title="Discover" width="48px" height="30px" src="{{asset('image/')}}/4.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="China UnionPay" title="China UnionPay" width="48px" height="30px" src="{{asset('image/')}}/5.svg">
									</li>
								</ul>
							</div>
						  </div>
						
						<div class="e-fieldset__footer">
						  <div class="secure_checkout_banner">
							<span class="secure-checkout-banner1">
							  <i class="icon-lock"></i>
							  Secure checkout
							</span>

						  </div>
						  <div class="secure-checkout-button__container">

							<label for="submit_btn" class="button mid primary">Checkout with PayPal</label></a>
						  </div>
						</div>
					</div>
					
					<div id="hotlancer" style="display: none;" class="form-box-item not-padded">
						<p class="t-body">Add credit during checkout using PayPal or Skrill.</p>
						<div class="input-container">
							<!-- CHECKBOX -->
							<input type="checkbox" id="same_add" name="same_add" checked="">
							<label for="same_add" class="label-check b-label">
								<span class="checkbox primary"><span></span></span>
								Use $0.73 from my earnings for this purchase
							</label>
							<!-- /CHECKBOX -->
						</div>
						<div class="cart-total small">
							<p class="price"><span>$</span>112</p>
							<p class="text-header subtotal">Cart Subtotal</p>
						</div>
						<!-- /CART TOTAL -->

						<!-- CART TOTAL -->
						<div class="cart-total small">
							<p class="price"><span>$</span>5</p>
							<p class="text-header subtotal">Shipping</p>
						</div>
						<!-- /CART TOTAL -->

						<!-- CART TOTAL -->
						<div class="cart-total small">
							<p class="price"><span>$</span>117</p>
							<p class="text-header subtotal">Cart Total</p>
						</div>
						<!-- /CART TOTAL -->
						<div class="e-fieldset__footer">
						  <div class="secure_checkout_banner">
							<span class="secure-checkout-banner1">
							  <i class="icon-lock"></i>
							  Secure checkout
							</span>
					
						  </div>


						  <div class="secure-checkout-button__container">
						
							<button form="checkout-form" class="button mid"><span>Add Credit and Checkout</span></button>
						  </div>
						</div>
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
<!-- Side Menu -->
<script src="{{ asset('allscript')}}/js/side-menu.js"></script>

<script type="text/javascript">	

	function paymentbtn(payment){
		if(payment == 'masterCard'){
			document.getElementById("masterCard").style.display = "block"; 
			document.getElementById("paypal").style.display = "none";
			document.getElementById("hotlancer").style.display = "none";
		}
		if(payment == 'paypal'){
			document.getElementById("paypal").style.display = "block"; 
			document.getElementById("masterCard").style.display = "none";
			document.getElementById("hotlancer").style.display = "none";
		}
		if(payment == 'hotlancer'){
			document.getElementById("hotlancer").style.display = "block";
			document.getElementById("paypal").style.display = "none"; 
			document.getElementById("masterCard").style.display = "none";
			
		}
	}
</script>
@endsection