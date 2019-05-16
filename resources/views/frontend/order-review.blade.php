@extends('frontend.layouts.master')

@section('title', 'Order Review')

@section('css')
<link rel="stylesheet" href="{{asset('/allscript')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">
<style>
.button.big.primary.wcart.v3 {
    text-align: center;
    padding-left: 0;
    color: #000;
}
.form-box-item {
    padding: 3px 1px 30px !important;
  }

.progress_right{float: left; width:200px}
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
    padding: 10px 0px 0px !important;
    border-bottom: none !important;
 
}

.payment-method__tab-inner{
	float: left;
}
.cart-item-category{
	width: 110px !important;
	padding-top: 0px !important;
}
.cart-item a{
	color: #108a14;
}

#summary p{
	color: #000 !important;
	font-weight: bold !important;
}

/* Form Progress */
.vprogress {
  width: 1000px;
  margin: 20px auto;
  text-align: center;
}
.vprogress .bar {
  display: block;
 
}
.vprogress .circle{
  display: block;
  margin-bottom: 0px;
   background: #fff;
  width: 40px; height: 40px;
  border-radius: 40px;
  border: 1px solid #d5d5da;
}
.vprogress .bar {
  position: relative;
  width: 6px;
  height: 20px;
  top: 0px;
  margin-left: 17px;
  margin-right: -5px;
  border-left: none;
  border-right: none;
  border-radius: 0;
}
.vprogress .circle .label {
  display: inline-block;
  width: 32px;
  height: 32px;
  background: #0fa70f;
  line-height: 32px;
  border-radius: 32px;
  margin-top: 3px;
  color: #ffffff;
  font-size: 17px;
}
.vprogress .circle .title {
  color: #525254;
  font-size: 14px;
  line-height: 22px;
  margin-left: 45px;
  position: relative;
  top: -28px;
  text-align: left;
}
 
/* Done / Active */
.vprogress .bar.done,
.vprogress .circle.done {
  background: #0fa70f;
}
.vprogress .bar.failed,
.vprogress .circle.failed {
  background: red;
}
.vprogress .bar.active {
  background: linear-gradient(to right, #EEE 40%, #FFF 60%);
}
.vprogress .circle.done .label {
  color: #FFF;
  background: #8bc435;
  box-shadow: inset 0 0 2px rgba(0,0,0,.2);
}
.vprogress .circle.done .title {
  color: #444;
}
.vprogress .circle.active .label {
  color: #FFF;
  background: #0c95be;
  box-shadow: inset 0 0 2px rgba(0,0,0,.2);
}
.vprogress .circle.active .title {
  color: #0c95be;
}

.user_image{
  text-align: left; padding: 10px; position: relative;
}
.step{
        color:#00668c; font-size: 16px;
      }

.deliver_header{
         display:flex;padding:10px;background: #fff;border-bottom: 1px solid #ccc;
      }
      .order_sign , .order_progress{
        font-size: 11px; 
        text-transform: uppercase;
        font-weight: bold;
        margin-left: 30px;
      }.order_sign2{
        width: 25px;
        font-size: 20px;
        float: left;
      }
      .order_sign{
        color: #11c149;
      }
      .order_progress{
        color: #cc8808; 
      }
.order_requirement{margin-bottom: 10px; text-align:center;color: #7b7b7b;}

.review_header{display:flex;padding:10px;background: #268220; border-bottom: 1px solid #ccc;}
.order_sign_review{
  color: #fff;
  font-size: 11px; 
  text-transform: uppercase;
  font-weight: bold;
  margin-left: 30px;
  }
</style>
@endsection

@section('content')

@if($get_order->status == 'active')
<div class="deliver_header">
  <div class="col-md-2 order_sign">
    <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
    <div style="float: left;">requirements <br/> Submitted</div>
  </div>
  <div class="col-md-5 order_progress ">
    <div class="order_sign2"><i class="fa fa-map-marker" aria-hidden="true"></i></i></div> 
    <div style="float: left;">order in progress<br/> expected delivery {{ \Carbon\Carbon::parse($get_order->created_at)->format('M d, Y')}}</div>
  </div>
</div>
@endif

@if($get_order->status == 'delivered')
<div class="review_header" >
  <div class="col-md-2 order_sign_review"">
    <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
    <div style="float: left;">requirements <br/> Submitted</div>
  </div>
  <div class="col-md-5 order_progress">
        <p style="color: #fff; font-size: 16px;">&#x2713; ORDER DELIVERED <em style="font-weight: bold;">PLEASE REVIEV</em ></p>  
  </div>
</div>
@endif

@if($get_order->status == 'completed')
<div class="review_header" >
  <div class="col-md-2 order_sign_review"">
    <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
    <div style="float: left;">Requirements <br/> Submitted</div>
  </div>

  <div class="col-md-2 order_sign_review"">
    <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
    <div style="float: left;">Delivery <br/> Submitted</div>
  </div>

  <div class="col-md-5 order_progress">
        <p style="color: #fff; font-size: 16px;"> &#x2713; ORDER <em style="font-weight: bold;">COMPLETED</em ></p>  
  </div>
</div>
@endif

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
      <!-- SIDEBAR -->
			<div class="sidebar right">
				<div class="row form-box-item not-padded">
					<div class="col-md-10">
            <div class="vprogress">
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">&#x2713;</span>
                <span class="title progress_right">Placed Order</span>
              </div>
              <span class="bar done"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">&#x2713;</span>
                <span class="title progress_right" >Provide requirements</span>
              </div>
              <span class="bar done"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"> <?php echo ($get_order->status == 'delivered' ? '&#x2713;' : '&#9675;'); ?></span>
                <span class="title progress_right ">Order in progress </span>
              </div>
              <span class="bar done" class="progress_right"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"><?php echo ($get_order->status == 'delivered' ? '&#9675;' : '&#x2713;'); ?></span>
                <span class="title progress_right" >Review the delivery</span>
              </div>
              <span class="bar done"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"><?php echo ($get_order->status == 'completed' ? '&#x2713;' : '5'); ?></span>
                <span class="title progress_right">Order complete</span>
              </div>
            </div>
          </div>
				</div>
			</div>
			<!-- /SIDEBAR -->
				
			<!-- CONTENT -->
			<div class="content left">
				<div class="cart">
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
						<div class="cart-item-product" style="width: 770px !important; margin-bottom: 10px">
							<!-- ITEM PREVIEW -->
							<div class="item-preview">
								<a href="{{url($get_order->username.'/'.$get_order->gig_url)}}">
									<figure class="product-preview-image small liquid">
										<img src="{{ asset('gigimages/'.$get_order->image_path)}}" alt="">
									</figure>
								</a>
								<a href="{{url($get_order->username.'/'.$get_order->gig_url)}}"><p class="text-header small">I will {{$get_order->gig_title}}</p></a>
								<p>
									Seller: <a href="{{url('/'.$get_order->username)}}"> {{$get_order->username}}</a> | 
									Order: <a href="{{url('/dashbord/'. Auth::user()->username .'/manage/orders/'.$get_order->order_id)}}">#{{$get_order->order_id}} </a> | 
									{{ \Carbon\Carbon::parse($get_order->created_at)->format('M d, Y')}}
								</p>
							</div>
							<!-- /ITEM PREVIEW -->
						</div>
						
						<!-- CART ITEM PRICE -->
						<div class="cart-item-price">
							<p id="price" class="price"><span>${{$get_order->total}}</span></p>
						</div>
						<!-- /CART ITEM PRICE -->
						
					</div>
				</div>


				<div class="cart" id="summary">
					<!-- CART HEADER -->
					<div class="cart-header">
						<div class="cart-header-product">
							<p class="text-header small">Package name</p>
						</div>
						<div class="cart-header-category">
							<p class="text-header small">Quantity</p>
						</div>
						<div class="cart-header-price">
							<p class="text-header small">Duratation</p>
						</div>

						<div class="cart-item-actions">
							<p class="text-header small">Amont</p>
						</div>
						
					</div>
					<!-- /CART HEADER -->

					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
						<div class="cart-item-product">
							
							<p>{{$get_order->package_name}} </p>
							<hr class="line-separator">
							<p>Subtotal</p>
							<p>Service Fee</p>
						</div>
						<!-- /CART ITEM PRODUCT -->

						<!-- quantity -->
						<div class="cart-item-category">
							<p>{{$get_order->quantity}} </p>
							<hr class="line-separator">
						</div>
						
						<!-- CART ITEM PRICE -->
						<div class="cart-item-category">
							<p>{{$get_order->delivery_time}} day</p>
							<hr class="line-separator">
						</div>
						<!-- /CART ITEM PRICE -->
						<!-- CART ITEM ACTIONS -->
						<div class="cart-item-category">
							<p>${{$get_order->subtotal}} </p>
							
							<hr class="line-separator">
							<p>${{$get_order->subtotal*$get_order->quantity}}</p>
							<p>$2</p>
							<hr class="line-separator">
							<p>Total: ${{$get_order->total}}</p>
						</div>
					</div>
				</div>
				<br/>

				<div class="cart">
          <div style="margin-bottom: 10px; text-align:center;color: #7b7b7b;">
            <span class="step"><span class="sl-icon icon-docs"></span><br/>ORDER REQUIREMENTS</span><br/>
            <span>Your buyer has filled out the requirements <a style="color:#1DBF73;cursor: pointer;" data-toggle="collapse" data-target="#demo">Show requirements &#709;</a></span>
          </div>
          
          <hr class="line-separator" style="margin-top: 0px;">
            
          <div style="padding: 5px; font-size: 14px; margin-bottom: 10px">
            <span id="demo" class="collapse">
              {{$get_order->requirement }}
              <p>{{$get_order->requirement_ans }}</p><hr/>
            </span>
          </div>
          
    @if($get_order->status == 'delivered')
       <?php
            $get_deliver_info = DB::table('order_delivers')
             ->join('userinfos', 'order_delivers.user_id', '=', 'userinfos.user_id')
             ->join('users', 'order_delivers.user_id', '=', 'users.id')
             ->select('order_delivers.msg','order_delivers.work_file','users.username', 'userinfos.user_image')
            ->where('order_delivers.deliver_order_id' , '=', $get_order->order_id)->get();
        ?>
        
          <div class="order_requirement">
            <span class="step"><i class="fa fa-archive" aria-hidden="true"></i><br/>HERE'S YOUR DELIVERY!</span><br/>
            <span>This order will be marked as complete in {{$get_order->delivery_time}} days.</span>
            @foreach($get_deliver_info  as $deliver_info)
              <div class="user_image">
              <span class="outer-ring">
                <img src="{{asset('image/'.$deliver_info->user_image)}}" alt="gig_image" > 
              </span>{{$deliver_info->username}} <br/>
                <span style="position: absolute;top: 38px;left: 58px;">{{$deliver_info->msg}}</span><br/> 
                @if($deliver_info->work_file != null)
                 <span style="font-size: 15px">DELIVERED FILES:</span><br/>
                 <a href="{{$deliver_info->work_file}}" download>{{$deliver_info->work_file}}</a>
                 @endif
              </div><hr/>
            @endforeach

          </div>

        
          <div class="user_image">
            <span class="outer-ring">
                <img src="{{asset('image/'.$get_order->user_image)}}" alt="gig_image" > 
              </span><strong>{{$get_order->username}} Send Your Delivery.</strong>
              <div style="position: absolute;top: 38px;left: 58px;">
                <p>Are you pleased withe the delivery and ready to approve it.?</p>
              </div><br/><br/>
              <span style="padding-left: 40px;"> <button type="button" class="btn">Yes</button> <button type="button" class="btn">No</button></span>
          </div>
        @endif
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
<script src="{{asset('/allscript')}}/js/bootstrap.min.js"></script>

@endsection