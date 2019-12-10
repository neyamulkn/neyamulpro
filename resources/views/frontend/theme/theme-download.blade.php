@extends('frontend.layouts.master')
@section('title', 'Downloads Theme')

@section('css')
<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('allscript')}}/css/bootstrap.min.css">
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
.downloadtheme4{
    padding: 3px;
}

.input-container{
    clear: both;

}

.rating { 
  border: none;
  float: left;
  margin:0px 0px 0px 28px;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin-top: 2px;
  padding:0px 5px 0px 5px;
  font-size: 13px;
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
  height:23px;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { 
    background-color:#FEC42D !important;
  cursor:pointer;
} /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { 
    background-color:#FEC42D !important;
  cursor:pointer;
} 

</style>
@endsection

@section('content')

    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section">
            <!-- SIDEBAR -->
            
            <div class="sidebar right">
                
                <div class="sidebar-item">
                    <h4>Download Immediately</h4>
                    <hr class="line-separator">
                    <!
                    <hr class="line-separator">
                    <p class="license-text" style="display: block;">You should download your purchases immediately as items may be removed from time to time.</p>
                    <div class="clearfix"></div>
                </div>

                <div class="sidebar-item">
                    <h4>Download Managers</h4>
                    <hr class="line-separator">
                    <!
                    <hr class="line-separator">
                    <p class="license-text" style="display: block;">Envato recommends against the use of download managers to download your purchased files from Envato Market. Read more about this </p>
                    <div class="clearfix"></div>
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
                            <p class="text-header small">Product Details</p>
                            <span>{{Session::get('msg')}}</span>
                        </div>
                    </div>
                    <!-- /CART HEADER -->
                    
             @foreach($get_theme as $show_theme)
    
                    <!-- CART ITEM -->
                    <div class="cart-item">
                        <!-- CART ITEM PRODUCT -->
                        <div class="cart-item-product">
                            <!-- ITEM PREVIEW -->
                            <div class="item-preview">
                                <a href="{{route('theme_detail',$show_theme->theme_url)}}">
                                    <figure class="product-preview-image small liquid">
                                        <img src="{{ asset('theme/images/'.$show_theme->main_image)}}" alt="">
                                    </figure>
                                </a>
                                <a href="{{route('theme_detail',$show_theme->theme_url)}}"><p class="text-header small">{{$show_theme->theme_name}}</p></a>
                                <a href=""><p class="text-header small" style="color: #888;font-weight:400">Item by {{$show_theme->username}}</p></a>
                                
                                <p class="text-header small"><span class="primary">Regular Lichance: </span></p>
                            </div>
                            <!-- /ITEM PREVIEW -->
                        </div>
                        <!-- /CART ITEM PRODUCT -->

                        <!-- CART ITEM PRICE -->
                    
                        <div class="downloadtheme4">
                            <button onclick="download('{{$show_theme->main_file}}')" class="button mid tertiary half v2">Download  <i class="fa fa-download"></i></button>
                        </div>
                        
                        <!-- /CART ITEM PRICE -->
                        <!-- CART ITEM ACTIONS -->
                        <div class="downloadtheme4">
                            <button onclick="review('{{$show_theme->order_id}}')" class="button mid secondary wicon half  v2" data-toggle="modal" data-target="#myModal">Review</button>
                            <div class="rating_star">
                                <fieldset class="rating">
                                @if($show_theme->ratting_star)
                                    @for($i=5; $i>=1; $i--)
                                    <input type="radio"  id="review{{$i}}" name="rating" value="5" />
                                    <label  style=" @if($i<=$show_theme->ratting_star)background-color: #FEC42D !important; @endif" class = "full" for="review{{$i}}"></label>
                                    @endfor
                                @endif
                                </fieldset>
                            </div>
                        </div>
                    </div><br/><hr class="line-separator">
                   
            @endforeach
                
                </div>
                <!-- /CART -->
                
            </div>
            <!-- CONTENT -->
        </div>
    </div> 
    <span id="file" style="display: none;"></span>


    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Review this Item</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form action="{{route('theme.review')}}" method="post">
            {{csrf_field()}}
                <!-- INPUT CONTAINER -->
                <div class="input-container">
                    <p style="color: #000;" class="rl-label b-label required">Your rating:  
                        <div class="rating_star">
                            <fieldset class="rating">
                                @for($i=5; $i>=1; $i--)
                                <input type="radio" id="rating{{$i}}" name="rating" value="{{$i}}" /><label class = "full" for="rating{{$i}}"></label>
                                @endfor
                                
                            </fieldset>
                        </div>
                    </p>
                  
                    </div><br/>  <br/>

                    <div class="input-container">
                        <p style="color: #000;" class="rl-label b-label required">Main reason for your rating:</p>
                        <input type="hidden" name="order_id" id="order_id" value="">
                        <label for="ratting_reason" class="select-block">
                                <select name="ratting_reason" id="ratting_reason">
                                    <option value="0">Select from the authors you follow...</option>
                                    <option value="1">Vynil Brush</option>
                                    <option value="2">Jenny_Block</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                        </label>
                        
                    </div>  <br/>
                <!-- /INPUT CONTAINER -->

                <!-- INPUT CONTAINER -->

                <div class="input-container">
                    <label for="message" class="rl-label b-label required">Comments(min. 30 characters):</label>
                    <textarea name="ratting_comment"  maxlength="1200" required="required" class="ttinput-grouptddd" style="border: 1px solid rgb(204, 204, 204);" placeholder="Describe your delivery in details."></textarea>
                </div>
                <!-- INPUT CONTAINER --> 
           

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="submit" class="button mid dark">Send <span class="primary">Review</span></button>
        </div>
      </div>
       </form>
    </div>
  </div>
  
<!-- /SECTION -->
@endsection

@section('js')

<!-- Tweet -->
<script src="{{ asset('allscript')}}/js/post-tab.js"></script>

<script src="{{ asset('allscript')}}/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function download(file_name){
        var file = '<a href="<?php echo asset('theme/zipfile'); ?>/'+file_name+'" style="display: none;" download="hotlancer-'+file_name+'" id="myCheck"></a>';
        $('#file').html(file);
         document.getElementById("myCheck").click();
    }

    function review(order_id){

        document.getElementById('order_id').value = order_id;
    }


</script>
<script type="text/javascript">
    $("label").click(function(){
  $(this).parent().find("label").css({"background-color": "#D8D8D8"});
  $(this).css({"background-color": "#FEC42D"});
  $(this).nextAll().css({"background-color": "#FEC42D"});
});
</script>
@endsection