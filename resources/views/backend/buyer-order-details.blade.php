@extends('backend.layouts.master')

@section('title', 'Manage orders')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
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
		    margin-left: 15px;
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
    	.user_image{
        text-align: left; padding: 10px; position: relative;
      }
    	#work_file, #order_id, #attach_file, #buyer_id{display: none;}

      .revision{
        position: absolute;right: 30px;top: 8px;width: 30%;border-left: 1px solid #ccc;height: 75%;padding: 10px;text-align: center;
      }
    	@media (min-width: 576px){
.modal-dialog {
    max-width: 735px;
    margin: 1.75rem auto;
}}
    </style>
@endsection

@section('content')
  <div class="deliver_header" style="{{ ($get_order_details->status == 'completed') ? 'background: #268220;color: #fff' : '' }}">
    
<!-- for buyer bar -->
@if(Auth::user()->role_id == env('BUYER'))
  @if($get_order_details->status == 'active')
    
      <div class="col-md-2 order_sign">
        <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
        <div style="float: left;">requirements <br/> Submitted</div>
      </div>
      <div class="col-md-5 order_progress ">
        <div class="order_sign2"><i class="fa fa-map-marker" aria-hidden="true"></i></div> 
        <div style="float: left;padding-top: 10px">Order in progress</div>
      </div>
   
    @endif

    @if($get_order_details->status == 'delivered')
    
      <div class="col-md-2 order_sign">
        <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
        <div style="float: left;">Requirements <br/> Submitted</div>
      </div>
      <div class="col-md-6 order_progress">
            <div style="font-size: 26px;">&#x2713; ORDER DELIVERED <em style="font-weight: bold;">PLEASE REVIEV</em ></div>  
      </div>
    
    @endif
@endif

    
<!-- for buyer & seller both bar -->
  @if($get_order_details->status == 'completed' OR $get_order_details->status == 'cancel')
    
      <div class="col-md-2 order_sign_review">
        <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
        <div style="float: left;">Requirements <br/> Submitted</div>
      </div>

      <div class="col-md-2 order_sign_review">
        <div class="order_sign2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></div> 
        <div style="float: left;">Delivery <br/> Submitted</div>
      </div>

      <div class="col-md-5 ">
            <div style="font-size: 26px;text-transform: uppercase;"> &#x2713; ORDER <em style="font-weight: bold;">{{$get_order_details->status}}</em ></div>  
      </div>
   
    @endif
</div>
<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <div class="order12lt">
		<div class="order121">
			<div class="order122">

				<h1 class="ordertitle"><span class="sl-icon icon-star"></span> Order #{{$get_order_details->order_id}} <a class="gig-view33" href="{{url('marketplace/'.$get_order_details->gig_url)}}">view gig</a></h1>
				<br>
				<ul class="order-header-info cf">
					<li class="order-header-info">Seller: <a href="{{url($get_order_details->username)}}">{{$get_order_details->username}}</a> 
						(<a href="#" class="buyer-history">view history</a>) 
						<time datetime="2018-12-17"><em>{{\Carbon\Carbon::parse($get_order_details->created_at)->format('M d, Y')}}</em></time></li>
				</ul>
			</div>
			<div class="order123">
				<span class="order-price">${{$get_order_details->subtotal}}</span>
			</div>
		</div>
		<div class="order-gig-detail">
			<table class="responsive-table-input-matrix v3">
				<thead>
					<tr>
						<th>Title </th>
            			<th>Project Type </th>
						<th>Quantity</th>
						<th>Duration</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
				<tr class="tbgig">
					<td class="title js-toggle-gig-stats ">
						<div class="ellipsis1">
							<a class="ellipsis" href="{{url('marketplace/'.$get_order_details->gig_url)}}">{{$get_order_details->gig_title}}</a><br/>
						
							<?php
								switch ($get_order_details->package_name) {
									case 'basic':
										$gig_features = DB::table('gig_features')
										->where('gig_id', $get_order_details->gig_id)
										->where('feature_basic', 'Yes')->get();
										break;
									case 'plus':
										$gig_features = DB::table('gig_features')
										->where('gig_id', $get_order_details->gig_id)
										->where('feature_plus', 'Yes')->get();
										break;
										
									case 'super':
										$gig_features = DB::table('gig_features')
										->where('gig_id', $get_order_details->gig_id)
										->where('feature_super', 'Yes')->get();
										break;
									case 'platinum':
										$gig_features = DB::table('gig_features')
										->where('gig_id', $get_order_details->gig_id)
										->where('feature_platinum', 'Yes')->get();
										break;
									default:
										echo '';
										break;
								}
							?>
							@foreach($gig_features as $gig_feature)
								<i style="color:#1fd0b6;font-size: 15px;">&#10003;</i> 
								{{ $gig_feature->feature_name}}<br/>
							@endforeach
						</div>
					</td>
					<td> {{$get_order_details->gig_payment_type}} price</td>
          <td>{{$get_order_details->quantity}}</td>
					<td>{{$get_order_details->delivery_time}} Days</td>
					<td>${{$get_order_details->subtotal}}</td>
				</tr>
				
				<tr>
					<td class="total" colspan="5">Total <em>${{$get_order_details->subtotal}}</em></td>
				</tr>
				</tbody>
			</table><br/>


    @if(($get_order_details->status == 'active') OR ($get_order_details->status == 'delivered'))
      <div class="counterWrap">
        
        <?php 
        
           $date = \Carbon\Carbon::parse($get_order_details->created_at)->format('m/d/Y');
          if($get_order_details->gig_payment_type == 'monthly'){
            $date = strtotime(date("m/d/Y", strtotime($date)) . " +1 month");
            $date = date("m/d/Y", $date);
            $date = $date." ".\Carbon\Carbon::parse($get_order_details->created_at)->format('H:i:s');
          }else{
            $date =  date('m/d/Y', strtotime($date. ' + '.$get_order_details->delivery_time.' days')); 
            $date = $date." ".\Carbon\Carbon::parse($get_order_details->created_at)->format('H:i:s');
          }
        ?>
        <div class="counter"></div>

		<div class="labelsq"><ul><li>days</li><li>hours</li><li>minutes</li><li>seconds</li></ul></div>
		<div style="display:none;" id="dataSet">
           <?php echo  $date;  ?>
        </div>
        @if($get_order_details->gig_payment_type != 'monthly')
        <form action="{{route('order_timeorcancel')}}" onsubmit="return confirm('Do you want submit this form.?')" method="POST">
          <input id="order_id" required="required" type="text" value="{{$get_order_details->order_id}}" name="order_id">
          {{csrf_field()}}
          <div id="expired_time" style="text-align: center;margin:20px 0px 0px;"></div>
         
        </form>
        @endif
      </div><hr/>
    @endif

			<div>
				<div style="margin-bottom: 10px; text-align:center;color: #7b7b7b;">
					<span class="step"><span class="sl-icon icon-docs"></span><br/>ORDER REQUIREMENTS</span><br/>
					<span>Your buyer has filled out the requirements <a style="color:#1DBF73;cursor: pointer;" data-toggle="collapse" data-target="#requirement">Show requirements &#709;</a></span>
				</div>
				
				<hr class="line-separator" style="margin-top: 0px;">
					
				<div class="cart-item-product" style=" font-size: 14px; margin-bottom: 10px">
					<span id="requirement" class="collapse">
						{{$get_order_details->requirement }}
						<p>{{$get_order_details->requirement_ans }}</p><hr/>
					</span>
				</div>
			</div>
			
			<div class="order_requirement">
					<span  class="step">&#129309; <br/> ORDER STARTED</span><br/>
					<span>The order countdown is now ticking.<br/> Don't waste your time reading this message. <a style="color:#1DBF73;cursor: pointer;">STARTED </a></span>
			</div>
			<hr/>

			<div class="order_requirement">
					<span class="step"><i class="fa fa-archive" aria-hidden="true"></i><br/>HERE'S YOUR DELIVERY!</span><br/>
					<span>This order will be marked as complete in {{$get_order_details->delivery_time}} days.</span>
		          <?php
		              $get_deliver_info = DB::table('order_delivers')
		                ->join('userinfos', 'order_delivers.user_id', '=', 'userinfos.user_id')
		                ->join('users', 'order_delivers.user_id', '=', 'users.id')
		                ->select('order_delivers.msg','order_delivers.work_file', 'order_delivers.status','users.username', 'userinfos.user_image')
		                ->where('order_delivers.deliver_order_id' , '=', $get_order_details->order_id)
		                ->orderBy('order_delivers.deliver_id', "ASC")->get();
		          ?>
		        @if($get_deliver_info)

		           @foreach($get_deliver_info  as $deliver_info)
		            <div class=" user_image">
		              <span class="">
		                <img src="{{asset('image/'.$deliver_info->user_image)}}" alt="gig_image" > 
		              </span> {{$deliver_info->username}} <br/>
		                <div style="margin-left: 30px;width: 60%;">{{$deliver_info->msg}}<br/> 
		                  @if($deliver_info->work_file != null)
		                   <span style="font-size: 12px;font-weight: bold;">DELIVERED FILES:</span><br/>
		                   <a href="{{url('deliver_file/'.$deliver_info->work_file)}}" download>{{$deliver_info->work_file}}</a>
		                   @endif

		                </div>
		               
		                @if($deliver_info->status == 'revision')
		                  <div class="revision">
		                    <i class="fa fa-refresh" aria-hidden="true"></i><br/>
		                  REVESION REQUESTED</div>
		                @endif
		            </div>
		            <hr/>

		            @endforeach
		          @endif
			</div>
   
        @if($get_order_details->status == 'delivered' AND Auth::user()->role_id == env('BUYER'))  
              <div class="user_image">
                <span class="outer-ring">
                    <img src="{{asset('image/'.$get_order_details->user_image)}}" alt="gig_image" > 
                  </span><strong>{{$get_order_details->username}} Send Your Delivery.</strong>
                  <div style="position: absolute;top: 38px;left: 58px;">
                    <p>Are you pleased withe the delivery and ready to approve it.?</p>
                  </div><br/><br/>
                  <span style="padding-left: 40px;">

                    <form action="{{url('/order/completed/'.$get_order_details->order_id)}}" onsubmit="return confirm('Do you really want to submit the form?');" method="post" >
                      <input type="hidden" name="type" value="marketplace">
                     {{csrf_field()}} 
                      <span class="btn btn-warning"  data-toggle="modal" data-target="#revision_delivery">Revision Order</span>
                      <button type="submit" name="order_completed" id="order_completed" class="btn btn-success">Order Completed</button>  
                    </form>
                  </span>
              </div>
        @endif
        
    @if($get_order_details->status != 'completed')
    	<span>Use Quick Response:</span>
          <form action="{{route('quick_response')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

              <input id="order_id" required="required" type="text" value="{{$get_order_details->order_id}}" name="order_id">
              
              <div style="position: relative;display: flex;">
                <textarea name="msg"  maxlength="1200" required="required" class="ttinput-grouptddd" style="border: 1px solid rgb(204, 204, 204);" placeholder="Describe your delivery in details."></textarea>
                <label style="position: absolute;bottom: -18px;right: 0; font-size: 16px; padding: 5px;" for="attach_file"><i class="fa fa-paperclip" aria-hidden="true"></i> Attach
                  <input id="attach_file" type="file" name="work_file">
                  <button type="submit" class="btn btn-success btn-sm" >Send</button>
                </label>
            </div>
        </form><br/>
			@else <h2 style="color: #000; text-align: center;">Your Order is completed.</h2> @endif

      @if(($get_order_details->status == 'active' OR $get_order_details->status == 'delivered') AND (Auth::user()->role_id == env('FRELANCER')) )
			<div class="order_requirement">
				<button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#work_deliver">Deliver Your Oder</button>
      </div>
      @endif

		</div>
	</div>
	<div class="order12rt">
		<div class="order-notes-wrapper note-order-page">
			<h3 class="note-wrapper">Private Note</h3>
			<p>Only visible to you</p>
			<div class="note-content">
				<button><span class="sl-icon icon-docs"></span> Add note</button>
			</div>
		</div>
  @if(($get_order_details->gig_payment_type == 'monthly') AND ($get_order_details->status == 'active') AND (Auth::user()->role_id == env('BUYER')))
    <div class="order-notes-wrapper note-order-page">
      <p>Are you want to hold your order.?</p>
      <a href="#" class="button mid dark spaced"><span class="primary">Hold Your Order!</span></a>
    </div>
  @endif
		
	</div>
	
	<div class="clearfix"></div>			

	<!-- FORM BOX ITEMS -->
	<!-- /FORM BOX ITEMS -->
</div>
<!-- DASHBOARD CONTENT -->
 <!-- Modal  deliver order-->
<div id="work_deliver" class="modal fade " role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{url('dashboard/order/deliver/'.$get_order_details->order_id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-header">
          
          <h4 class="modal-title">Deliver Complated work</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
          <label style="border:1px solid #ccc; font-size: 16px; padding: 5px; width: 30%;" for="work_file"><i class="fa fa-paperclip" aria-hidden="true"></i> Upload work
          	<input id="work_file" required="required" type="file" name="work_file">
          	<input id="buyer_id" required="required" value="{{$get_order_details->buyer_id}}" type="text" name="buyer_id">
          	<input id="order_id" required="required" type="text" value="{{$get_order_details->order_id}}" name="order_id">
          </label>
          <p>Max size 1GB</p>
          <span>Use Quick Response:</span>
          <textarea name="msg"  maxlength="1200" required="required" class="ttinput-grouptddd" style="border: 1px solid rgb(204, 204, 204);" placeholder="Describe your delivery in details."></textarea>
          <p>0/2500</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm" >Deliver Work</button>
        </div>
	    </form>
    </div>

  </div>
</div>

<!-- Revision order modal -->

<div id="revision_delivery" class="modal fade " role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{route('revision_delivery',$get_order_details->order_id)}}" method="post" >
        {{csrf_field()}}
        <div class="modal-header">
          
          <h4 class="modal-title">Revision delivery work</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         
            <input id="buyer_id" required="required" value="{{$get_order_details->buyer_id}}" type="text" name="buyer_id">
            <input id="order_id" required="required" type="text" value="{{$get_order_details->order_id}}" name="order_id">
            <textarea name="revision_msg"  maxlength="1200" required="required" class="ttinput-grouptddd" style="border: 1px solid rgb(204, 204, 204);" placeholder="Describe your revision delivery in details."></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" value="order_revision" name="order_revision" class="btn btn-success btn-sm" >Send</button>
        </div>
      </form>
    </div>

  </div>
</div>

@endsection

@section('js')
	<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
 @if(($get_order_details->status == 'active') OR ($get_order_details->status == 'delivered'))
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
            document.getElementById("expired_time").innerHTML = '<span >Time Expired</span><br/><button class="btn btn-success btn-sm" value="extra_time" name="order_review_time" type="submit">Extra Time</button> <button class="btn btn-success btn-sm" value="cancel" name="order_review_time" type="submit">Chancal Order</button>'; 
        } 
    }, 1000); 
</script> 
@endif
@endsection


