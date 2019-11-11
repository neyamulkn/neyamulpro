@extends('frontend.layouts.master')

@if($get_order->status == 'delivered')
  @section('title', 'Order Review')
@endif

@if($get_order->status == 'completed')
  @section('title', 'Order completed')
@endif

@section('css')
<link rel="stylesheet" href="{{asset('/allscript')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">
    <script src="{{asset('/allscript')}}/js/countDown.min.js"></script>
    <link href="{{asset('/allscript')}}/css/countDown.css" media="all" rel="stylesheet" />
<style type="text/css">

 
.counterWrap {
  padding: 30px;
  width: 100%;
}

.counter, .labelsq {
  display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    justify-content: space-between;
}

.counter ul {
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flex;
  display: -o-flex;
  display: flex;
  justify-content: space-between;
  width: 100%;
  flex: 0 0 141px;
  max-width: 141px;
}

.counter > ul:after {
  content: ":";
    color: #2b373a9c;
    font-family: "GeometriaMedium";
    font-size: 60px;
    line-height: 75px;
    text-align: center;
    display: block;
    font-weight: bold;
    margin-left: 8px;
}
.counter > ul:last-of-type:after {
  content: "";
  margin: 0;
  padding: 0;
  width: 0;
}
.counter li {
    border: 1px solid #2b373a9c;
    margin-right: 8px;
    min-width: 70px;
    height: 90px;
    text-align: center;
    font-size: 75px;
    line-height: 1.2;
    font-family: "FiraSans";
    border-radius: 4px;
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.2) inset;
  color: #2b373a9c;
}
.counter li:last-child {
  margin: 0;
}

.labelsq ul {
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding: 0;
  margin: 0;
}

.labelsq li {
  flex: 0 0 141px;
    max-width: 141px;
    text-align: center;
    font-family: "GeometriaMedium";
    font-size: 20px;
    line-height: 25px;
    color: #2b373a;
    font-weight: bold;
}

@media only screen and (max-width: 767px) {
  .counterWrap {
    width: 100%;
    max-width: 500px;
  }

  .counter ul {
    flex: 0 0 101px;
    max-width: 101px;
  }
  .counter ul li {
    width: 50px;
    min-width: 50px;
    height: 70px;
    font-size: 60px;
    line-height: 1.2;
  }

  .counter > ul:after {
    content: ":";
    font-size: 50px;
    line-height: 55px;
    padding-left: 8px;
  }

  .labelsq li {
    flex: 0 0 101px;
    max-width: 101px;
  }
}
@media only screen and (max-width: 575px) {
  .counterWrap {
    width: 100%;
    max-width: 400px;
  }

  .counter ul {
    flex: 0 0 81px;
    max-width: 81px;
  }
  .counter ul li {
    width: 40px;
    min-width: 40px;
    height: 60px;
    font-size: 50px;
    line-height: 1.2;
  }

  .counter > ul:after {
    content: ":";
    font-size: 44px;
    line-height: 50px;
    padding-left: 8px;
  }

  .labelsq li {
    flex: 0 0 81px;
    max-width: 81px;
    font-size: 18px;
  }
}
@media only screen and (max-width: 480px) {
  .counterWrap {
    width: 100%;
    max-width: 290px;
    padding: 30px 5px;
  }

  .counter ul {
    flex: 0 0 64px;
    max-width: 64px;
  }
  .counter ul li {
    width: 31px;
    min-width: 31px;
    height: 50px;
    font-size: 42px;
    line-height: 1.2;
  }

  .counter > ul:after {
    content: ":";
    font-size: 30px;
    line-height: 50px;
    padding-left: 2px;
  }

  .labelsq li {
    flex: 0 0 64px;
    max-width: 64px;
    font-size: 14px;
  }


}

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
         display:flex;padding:10px;background: #fff;border-bottom: 1px solid #ccc;font-size: 12px;font-weight: bold;
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
    <div class="order_sign2"><i class="fa fa-map-marker" aria-hidden="true"></i></div> 
    <div style="float: left;">Order in progress<br/> expected delivery {{ \Carbon\Carbon::parse($get_order->created_at)->format('M d, Y')}}</div>
  </div>
</div>
@endif

@if($get_order->status == 'delivered')
<div class="review_header" >
  <div class="col-md-2 order_sign_review">
    <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
    <div style="float: left;">Requirements <br/> Submitted</div>
  </div>
  <div class="col-md-5 order_progress">
        <p style="color: #fff; font-size: 16px;">&#x2713; ORDER DELIVERED <em style="font-weight: bold;">PLEASE REVIEV</em ></p>  
  </div>
</div>
@endif

@if($get_order->status == 'completed')
<div class="review_header" >
  <div class="col-md-2 order_sign_review">
    <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
    <div style="float: left;">Requirements <br/> Submitted</div>
  </div>

  <div class="col-md-2 order_sign_review">
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
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"> <?php if($get_order->status == 'delivered' OR $get_order->status == 'completed'){echo '&#x2713;' ;}else{ echo '&#9675;';} ?></span>
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
              <p class="text-header small">Project type</p>
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
							<p>Subtotal</p><br/>
							<p>Service Fee</p>
						</div>
						<!-- /CART ITEM PRODUCT -->

						<!-- quantity -->
						<div class="cart-item-category">
							<p>{{$get_order->gig_payment_type}} </p>
							<hr class="line-separator">
						</div>
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
						<div class="cart-item-category">x</div>
            <div class="cart-item-category">x</div>
            <div class="cart-item-category">
							
							<p>${{$get_order->subtotal*$get_order->quantity}}</p>
							<p>$2</p>
							<hr class="line-separator">
							<p>Total: ${{$get_order->total}}</p>
						</div>
					</div>
				</div>
				<br/>
      <div class="counterWrap" style="background: #fff;">
          <div class="counter"></div>

        <?php 
          date_default_timezone_set("Asia/Dhaka");

          if($get_order->gig_payment_type == 'monthly'){
           $date = \Carbon\Carbon::parse($get_order->created_at)->format('m/d/Y');
            $date = strtotime(date("m/d/Y", strtotime($date)) . " +1 month");
            $date = date("m/d/Y",$date);
            $date = $date." ".\Carbon\Carbon::parse($get_order->created_at)->format('H:i:s');
          }else{
            $Date = \Carbon\Carbon::parse($get_order->created_at)->format('m/d/Y');
            $date =  date('m/d/Y', strtotime($Date. ' + '.$get_order->delivery_time.' days')); 
            $date = $date." ".\Carbon\Carbon::parse($get_order->created_at)->format('H:i:s');
          }

        ?>
         <!--  countdown box here -->
          <div class="labelsq"><ul><li>days</li><li>hours</li><li>minutes</li><li>seconds</li></ul></div>
          <div style="display:none;" id="dataSet">
             <?php echo  $date;  ?>
          </div>

          <!-- here show order time need or chancal button -->
          @if($get_order->gig_payment_type != 'monthly')
            <div id="expired_button" style="text-align: center;margin:20px 0px;"></div>
          @endif

        </div>
				<div class="cart">
          <div style="margin-bottom: 10px; text-align:center;color: #7b7b7b;">
            <span class="step"><span class="sl-icon icon-docs"></span><br/>ORDER REQUIREMENTS</span><br/>
            <span>Your buyer has filled out the requirements <a style="color:#1DBF73;cursor: pointer;" data-toggle="collapse" data-target="#requirements">Show requirements &#709;</a></span>
          </div>
          
          <hr class="line-separator" style="margin-top: 0px;">
            
          <div style="padding: 5px; font-size: 14px; margin-bottom: 10px">
            <span id="requirements" class="collapse">
              {{$get_order->requirement }}
              <p>{{$get_order->requirement_ans }}</p><hr/>
            </span>
          </div>  
                
          @if($get_order->status == 'delivered' OR $get_order->status == 'completed')
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
                       <a href="{{url('deliver_file/'.$deliver_info->work_file)}}" download>{{$deliver_info->work_file}}</a>
                       @endif
                    </div><hr/>
                  @endforeach

                </div>
              @endif
              @if($get_order->status == 'delivered')  
                  <div class="user_image">
                    <span class="outer-ring">
                        <img src="{{asset('image/'.$get_order->user_image)}}" alt="gig_image" > 
                      </span><strong>{{$get_order->username}} Send Your Delivery.</strong>
                      <div style="position: absolute;top: 38px;left: 58px;">
                        <p>Are you pleased withe the delivery and ready to approve it.?</p>
                      </div><br/><br/>
                      <span style="padding-left: 40px;">

                        <label style="width: 15%; margin-right: 15px;" for="order_completed" class="btn btn-success">Yes</label> 
                        <button style="width: 15%; margin-top: -20px;" class="btn btn-warning">No</button>
                      </span>
                  </div>
                <form action="{{url('/order/completed/'.$get_order->order_id)}}" method="post" style="display: none;">
                  <input type="hidden" name="type" value="marketplace">
                 {{csrf_field()}}  <button type="submit" id="order_completed" class="btn">Yes</button>  
                </form> 
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

<script src="{{asset('/allscript')}}/js/bootstrap.min.js"></script>

<script>
;(function ($) {

  $.fn.countdown = function(options){
    //global variables 
    var vars = $.extend({}, $.fn.countdown.defaults, options),
        $counter = $(this),
        t = {day: 0, hour: 0, minute: 0, sec: 0},
        targetDate = new Date(vars.targetDate).getTime(),
        secondsLeft;

    //private methods
    methods = {
      setup: function () {
        
        $.each(t, function(time, value){
          var currentSection = '<ul id="'+time+'"><li>0</li><li>0</li></ul>';
          $counter.append(currentSection);
        });
        
        if (vars.labels) {
          //var labelHtml = '<div class="labels"><ul><li>Days</li><li>Hours</li><li>Minutes</li><li>Seconds</li></ul></div>';
                  var labelHtml = document.querySelector('.labelsq');
          $counter.append(labelHtml);
        }

      },

      updateTime: function(){
        var currentTime = new Date().getTime(),
            secondsLeft = (targetDate - currentTime) / 1000,
            secsIn = {day: 86400, hour: 3600, minute: 60};

        if (secondsLeft < 0) {secondsLeft = 0;}
        
        $.each(t, function(timePeriod, value){
          t[timePeriod] = parseInt( (secondsLeft / secsIn[timePeriod]), 10);
          if (timePeriod !== 'sec'){
           secondsLeft = secondsLeft % secsIn[timePeriod];
          } 
          else {
            t[timePeriod] = secondsLeft;
          }
        });
      },

      updateCounter: function() {
        $.each(t, function(period, value){
          var section = $counter.find('#'+period).children(),
              digit = splitDigits(value);
          
          section.eq(0).html(digit[0]);
          section.eq(1).html(digit[1]);
        });

        function splitDigits(number) {
          var digits = [];
          digits[0] = Math.floor(number / 10);
          digits[1] = Math.floor(number % 10);
          return digits; 
        }
      },

      tick: function () {
        if (secondsLeft < 1) {}
        else {
          methods.updateTime();
          methods.updateCounter();
          setTimeout(function() {methods.tick();}, 1000);
        } 
      },

      init: function () {
        methods.setup();
        methods.updateTime();
        methods.updateCounter();
        methods.tick();
      },
    };

    //initiate countdown
    methods.init();
  };

  $.fn.countdown.defaults = {
    targetDate: '',    //string: the date you want the counter to count down to.
    labels:     true              //boolean: toggles the {day / hour / minute / second} labels 
  };
}(jQuery));
// end of countdown plugin

$(function() {
  //дата берется из html
  var setData = document.querySelector('#dataSet').innerHTML;
  var newDate = new Date(setData);
  $('.counter').countdown({
        targetDate: newDate,
        labels: false
    });
});
</script>

<!-- //countedown expired button show -->
<script> 
    var deadline = new Date(" <?php echo  $date;  ?>").getTime(); 
    var x = setInterval(function() { 
    var now = new Date().getTime(); 
    var t = deadline - now; 
    var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
    var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
    var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
    var seconds = Math.floor((t % (1000 * 60)) / 1000); 

        if (t < 0) { 
            clearInterval(x); 
            document.getElementById("expired_button").innerHTML = '<span >Time Expired</span><br/><button class="btn btn-success btn-sm" style="" type="button">Extra Time</button> <button class="btn btn-success btn-sm" style="" type="button">Chancal Order</button>'; 
        } 
    }, 1000); 
</script> 
<!-- формат даты - номер месяца/число месяца/год  время  например: 5/10/2019 12:45:00 -->

@endsection