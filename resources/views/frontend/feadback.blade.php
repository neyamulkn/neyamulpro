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


fieldset, label { margin: 0; padding: 0; }

.rating { 
  border: none;
  float: left;
  margin:0px 0px 0px 28px;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin-top: 2px;
  padding:0px 5px 0px 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
	color: #fff; 
	float: right;
	margin:4px 1px 0px 0px;
	background-color:#D8D8D8;
	border-radius:15px;
  height:25px;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { 
	background-color:#7ED321 !important;
  cursor:pointer;
} /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { 
	background-color:#7ED321 !important;
  cursor:pointer;
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



.payment-method__tab-inner{
	float: left;
}

.cart .cart-header > * {
    text-align: inherit !important;
    padding-left: 20px;
    margin: 10px 0px;

    }

  .cart-item{
  	padding: 20px !important;
  }
.rating_text{float: left; width: 65%; text-align: left !important;}
.rating_star{
	float: right;
	width: 30%;
}
</style>
@endsection

@section('content')
	<!-- SECTION -->
<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<div class="form-box-item not-padded">
					<div class="item-preview" style="height:110px">
								
						<figure class="product-preview-image" style="width:65%">
							<img src="{{asset('gigimages/'.$get_order->image_path)}}" alt="gigimages">
						</figure>
							
					</div>
					<p>{{$get_order->gig_title}}</p>
					<hr class="line-separator">
					<!-- CART OVERVIEW ITEM -->
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Seller</span></p>
						<p class="price">{{$get_order->username}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Date: </span></p>
						<p class="price">{{ \Carbon\Carbon::parse($get_order->created_at)->format('M d, Y')}}</p>
					</div>
					<div class="cart-overview-item">
						<p class="text-header small"><span class="primary">Amount: </span></p>
						<p class="price">${{$get_order->subtotal}}</p>
					</div>
				</div>
				
			</div>
			<!-- /SIDEBAR -->
				
			<!-- CONTENT -->
			<div class="content left">
				<!-- CART -->
				<div class="cart">
					<!-- CART HEADER -->
					<div class="cart-header" style="padding: 5px;    height: 80px;">
						
						<span style="font-size: 20px;width: 100%;">Publice Feedback</span><br/>
						<span style="margin-top: -5px;">Share your exprience with the community, to help them make better decisions.</span>
					
					</div>
					<!-- /CART HEADER -->
				<form action="{{url('order/feadback/'.$get_order->order_id)}}" method="post">
					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
							{{csrf_field()}}

							<div class="rating_text">
								<h4>Communication with seller</h4>
								<p>How response was the seller during the process</p>
							</div>

							<div class="rating_star">
								<fieldset class="rating">
								<input type="radio" id="com_seller5" name="com_seller" value="5" />
								<label class = "full" for="com_seller5"></label>
								
								<input type="radio" id="com_seller4" name="com_seller" value="4" /><label class = "full" for="com_seller4"></label>
								
								<input type="radio" id="com_seller3" name="com_seller" value="3" /><label class = "full" for="com_seller3"></label>
								
								<input type="radio" id="com_seller2" name="com_seller" value="2" /><label class = "full" for="com_seller2"></label>
								
								<input type="radio" id="com_seller1" name="com_seller" value="1" /><label class = "full" for="com_seller1"></label>
								
							</fieldset>

						</div>
						<!-- /CART ITEM PRODUCT -->
					</div>
					<!-- /CART ITEM -->

					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
													
							<div class="rating_text">
								<h4>Service as Described</h4>
								<p>Did the result match the marketplace description?</p>
							</div>
							<div class="rating_star">
								<fieldset class="rating">
								<input type="radio" id="service_describe5" name="service_describe" value="5" /><label class = "full" for="service_describe5"></label>
								
								<input type="radio" id="service_describe4" name="service_describe" value="4" /><label class = "full" for="service_describe4"></label>
								
								<input type="radio" id="service_describe3" name="service_describe" value="3" /><label class = "full" for="service_describe3"></label>
								
								<input type="radio" id="service_describe2" name="service_describe" value="2" /><label class = "full" for="service_describe2"></label>
								
								<input type="radio" id="service_describe1" name="service_describe" value="1" /><label class = "full" for="service_describe1"></label>
								
							</fieldset>

						</div>
						<!-- /CART ITEM PRODUCT -->
					</div>
					<!-- /CART ITEM -->

					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
													
							<div class="rating_text">
								<h4>Buy Again or Recommend</h4>
								<p>Would you Recommend buying this item?</p>
							</div>
							<div class="rating_star">
								<fieldset class="rating">
								<input type="radio" id="field1_star5" name="buy_again_recommend" value="5" /><label class = "full" for="field1_star5"></label>
								
								<input type="radio" id="field1_star4" name="buy_again_recommend" value="4" /><label class = "full" for="field1_star4"></label>
								
								<input type="radio" id="field1_star3" name="buy_again_recommend" value="3" /><label class = "full" for="field1_star3"></label>
								
								<input type="radio" id="field1_star2" name="buy_again_recommend" value="2" /><label class = "full" for="field1_star2"></label>
								
								<input type="radio" id="field1_star1" name="buy_again_recommend" value="1" /><label class = "full" for="field1_star1"></label>
								
							</fieldset>

						</div>
						<!-- /CART ITEM PRODUCT -->
					</div>
					<!-- /CART ITEM -->

					<div>
						<h4 style="padding: 20px;">what was like working with this seller</h4>
						<textarea name="feadback_msg" maxlength="5000" style="border:1px solid #ccc; " id="textarea" placeholder="Enter feadback ..."></textarea>
					</div>
					<div style=" width: 100%; padding-top: 5px;">

						<div style="float: left;"><a href="#">Back to Order</a></div>
						<div style="float: right;">
						<a  style="float: left; margin: 8px ;">Skip</a>  
						<button type="submit" style="color: #000" class="button small"> Send Feedback</button>
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

<script type="text/javascript">
	$("label").click(function(){
  $(this).parent().find("label").css({"background-color": "#D8D8D8"});
  $(this).css({"background-color": "#7ED321"});
  $(this).nextAll().css({"background-color": "#7ED321"});
});
</script>

@endsection