@extends('backend.layouts.master')

@section('title', 'Manage orders')

@section('css')
  <link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">

<style type="text/css">

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
      
      .cart .cart-header > * {
    text-align: inherit !important;
    padding-left: 20px;
   
    }

  .cart-item{
    padding: 20px !important;
  }
  .cart .cart-header-product, .cart .cart-item-product {
    width: 535px !important;
}

      
.form-box-item {
    padding: 3px 1px 30px !important;
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
  background-color:#F0CB03 !important;
  cursor:pointer;
} /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { 
  background-color:#F0CB03 !important;
  cursor:pointer;
} 
.rating_text{float: left; width: 65%; text-align: left !important;}
.rating_star{
  float: right;
  width: 30%;
}

/* Form Progress */
.vprogress {

  text-align: center;
}
.vprogress .bar {
  display: block;
 
}
.progress_right{float: left; width:200px}
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

<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <div class="order12lt">
    <div class="order121">
      <div class="order122">

        <h1 class="ordertitle"><span class="sl-icon icon-star"></span> Order #{{$get_order_details->gigOrderId}} <a class="gig-view33" href="{{url('marketplace/'.$get_order_details->gig_url)}}">view gig</a></h1>
        <br>
        <ul class="order-header-info cf">
          <li class="order-header-info">Seller: <a href="{{route('profile_view', $get_order_details->username)}}">{{$get_order_details->username}}</a> 
            (<a href="#" class="buyer-history">view history</a>) 
            <time datetime="2018-12-17"><em>{{\Carbon\Carbon::parse($get_order_details->created_at)->format('M d, Y')}}</em></time></li>
        </ul>
      </div>
      <div class="order123">
        <span class="order-price">${{$get_order_details->subtotal}}</span>
      </div>
    </div>
    <div class="order-gig-detail">
      <div class="cart" style="width: initial;">
          <!-- CART HEADER -->
          <div class="cart-header" style="padding: 5px;    height: 80px;">
            
            <span style="font-size: 20px;width: 100%;">Public Feedback</span><br/>
            <span style="margin-top: -5px;">Share your exprience with the community, to help them make better decisions.</span>
          
          </div>
          <!-- /CART HEADER -->
          <form action="{{route('gig_feadback', $get_order_details->gigOrderId)}}" method="post">
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
                    @for($i=5; $i>=1; $i--)
                    <input type="radio"   @if($i==$get_order_details->com_seller) checked @endif id="com_seller{{$i}}" name="com_seller" value="{{$i}}" />
                    <label class = "full"  @if($i<=$get_order_details->com_seller) style="background-color: #FEC42D !important;"  @endif title="Star {{$i}}"  for="com_seller{{$i}}"></label>

                    @endfor
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
                    @for($i=5; $i>=1; $i--)
                    <input type="radio" id="service_describe{{$i}}" @if($i==$get_order_details->service_describe) checked @endif name="service_describe" value="{{$i}}" />
                    <label class = "full" title="Star {{$i}}" @if($i<=$get_order_details->service_describe) style="background-color: #FEC42D !important;"  @endif   for="service_describe{{$i}}"></label>

                    @endfor
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
                    @for($i=5; $i>=1; $i--)
                    <input type="radio"  @if($i==$get_order_details->buy_again_recommend) checked @endif id="buy_again_recommend{{$i}}" name="buy_again_recommend" value="{{$i}}" />
                    <label class = "full" title="Star {{$i}}" @if($i<=$get_order_details->buy_again_recommend) style="background-color: #FEC42D !important;"  @endif  for="buy_again_recommend{{$i}}"></label>

                    @endfor
                </fieldset>
              </div>
              <!-- /CART ITEM PRODUCT -->
            </div>
            <!-- /CART ITEM -->

            <div style="padding: 15px;overflow: hidden;">
              <h4>what was like working with this seller</h4>
              <textarea name="feadback_msg" required="" minlength="6" maxlength="5000" style="width: 100% !important;margin:0px;border:1px solid #ccc; " id="textarea" placeholder="Enter feadback ...">{{ $get_order_details->feadback_msg }}</textarea>
            </div>
            <div style=" width: 100%; padding-top: 5px;">

              <div style="float: left;"><a href="{{route('gig_order_details', $get_order_details->gigOrderId)}}">Back to Order</a></div>
              <div style="float: right;">
              <a href="{{route('gig_order_details', $get_order_details->gigOrderId)}}" style="float: left; margin: 8px ;">Skip</a>  
              <button type="submit" class="btn btn-success btn-sm"> Send Feedback</button>
              </div>
              
            </div>
          </form>
        </div>
      
  

    </div>
  </div>
  <div class="order12rt" style="overflow: hidden;">
    <div class="order-notes-wrapper note-order-page">
      <div class="form-box-item not-padded">
         
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
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">@if($get_order_details->status == 'active') &#9675;@else &#x2713; @endif</span>
                <span class="title progress_right ">Order in progress </span>
              </div>
              <span class="bar done" class="progress_right"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">@if($get_order_details->status == 'delivered') &#9675; @elseif($get_order_details->status == 'completed') &#x2713; @else 4 @endif</span>
                <span class="title progress_right" >Review the delivery</span>
              </div>
              <span class="bar done"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">@if($get_order_details->status == 'completed')&#x2713; @else 5 @endif</span>
                <span class="title progress_right">Order complete</span>
              </div>
              @if($get_order_details->status == 'completed')
              <span class="bar done"></span>
              <div class="circle">
                <span class="label" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">@if($get_order_details->status == 'completed') &#9675; @else 6 @endif</span>
                <a href="{{route('gig_feadback', $get_order_details->gigOrderId) }}" class="title progress_right">Give Feadback</a>
              </div>
              @endif
          </div>
        </div>
    </div>

    
  </div>
  
  <div class="clearfix"></div>      

  <!-- FORM BOX ITEMS -->
  <!-- /FORM BOX ITEMS -->
</div>
<!-- DASHBOARD CONTENT -->

@endsection

@section('js')
<script type="text/javascript">
  $("label").click(function(){
  $(this).parent().find("label").css({"background-color": "#D8D8D8"});
  $(this).css({"background-color": "#F0CB03"});
  $(this).nextAll().css({"background-color": "#F0CB03"});
});
</script>
@endsection


