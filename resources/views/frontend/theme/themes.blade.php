@extends('frontend.layouts.master')
@section('title', 'Hotlancer')

@section('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/tooltipster.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/index.css') }}">
	<style type="text/css">
		
.magnifier {
    color: hsl(0, 0%, 100%);
    background: hsl(0, 0%, 20%);
    border: 1px solid hsl(0, 0%, 0%);
    box-sizing: content-box;
    box-sizing: initial;
    position: absolute;
    z-index: 9100;
    padding: 0px 10px 7px;
    text-align: left;
  /*  display: none;*/
}

a:hover + .magnifier{
	display: block;
}
.magnifier .size-limiter {
    margin-top: 10px;
    background: #565656;
    overflow: hidden;
}
.size-limiter{    width: 100%;
    height: 250px;}
.magnifier strong {
    padding-top: 7px;
    font: 16px/20px 'Helvetica Neue', Helvetica, Arial, sans-serif;
    color: hsl(0, 0%, 100%);
    font-weight: bold;
    display: block;
}
.magnifier .info, .footer {
    color: #686868;
    font-size: 11px;
    line-height: 18px;
    overflow: hidden;
    width: 100%;
}
.magnifier .author-category {
    float: left;
	color: #ccc;
}
.magnifier .price {
    float: right;
    margin-left: 20px;
    font: 40px/25px 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: bold;
    color: hsl(0, 0%, 100%);
}
.magnifier .footer {
    display: -ms-flexbox;
    display: flex;
    color: hsl(0, 0%, 70%);
}
.magnifier .info, .footer {
    color: #686868;
    font-size: 11px;
    line-height: 18px;
    overflow: hidden;
    width: 100%;
}
.magnifier .category {
    width: 50%;
	color: #ccc;
    font-size: 10px;
}
.magnifier .gst-notice {
    width: 50%;
    text-align: right;
}

a.hideDisplay{
  position: relative; /* This makes everything work.*/
  /* Allows you to layer overlapping elements. */
  z-index: 20; 
  color: #000;
  text-decoration: none
}
  
a.hideDisplay:hover{
  /* Allows you to layer overlapping elements. */
  z-index: 30; 
}

a.hideDisplay span.showDisplayOnHover{
  display: none
}

/* This will only display itself when the
 * user hovers the mouse over the anchor. */
a.hideDisplay:hover span.showDisplayOnHover{ 
  display: block;
  position: absolute;
  font-size: 18px;
  
  /* This sets the height of a line of text in the box. */
  line-height: 25px;
  
  /* These position the box where it needs to go. */
  top: -50px; 
  right: -12px; 
  
  /* These adjust the size of the box when it appears. */
  width: auto;
  padding: 10px;
 
  
  /* text color */
  color: #000000;
  text-align: left;
}

span.showBodyOfDisplayOnHover {
  font-size: 16px; 
  font-weight: normal;
  color: #444;
  line-height: 18px; 
}

body { 
  /* Background image */
  background: url("images/background.png") repeat-x fixed; 
  color: #330000; /* color of text */
  background-color: #efefff; 
  font-family: Arial, Verdana, sans-serif; 
}

h1 { 
  color: #000000; 
  font-family: Georgia, "Times New Roman", serif; 
  text-align: center;
}

/* All of the elements that start with # are used 
 * to control the appearance of sections surrounded 
 * by <div> tags with the specified id. */
#wrapper {  
  min-width: 700px;
  text-align: center;
  
  /* The next two commands center the 
   *wrapper in the middle of the browser window. */
  margin-left: auto;
  margin-right: auto;
  
  /* This sets the wrapper to use 80% of the browser window. */
  width: 80%; 
}

#header {
  color: #000000;
  text-align: center;
  margin: 0;
  
  /* The header will have 20 pixels of blank space below it. */
  padding-bottom: 20px; 
} 

#guide {
  width: 730px;
  font-size: 14px;
  color: #000;
  text-shadow: 1px 1px 1px #fff;
  background: url(images/header-tile.png) repeat-x;
  letter-spacing: 1px;
  padding: 6px;
  border: 1px #cdcdcd solid;
  
  /* The next four commands make rounded corners for our 
   * header surrounded by <div> tags with the id "guide." */
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  -khtml-border-radius: 10px;
  
  border: 1px solid #aaa;
  margin-left: auto;
  margin-right: auto;
}

#content {
  padding-top: 10px;
  padding-bottom: 30px;
  padding-left: 20px;
  padding-right: 20px;
  color: #000000;
}

#footer { 
  color: #000000; 
  font-size: .60em; 
  font-style: italic; 
  text-align: center;
  padding-top: 20px;
  padding-bottom: 20px;
}

/* This controls the appearance of the hyperlinks 
 * in the footer section of the div element. */
#footer a:link {
  color: #000000; 
}

/* This controls the appearance of the hyperlinks that have 
 * been visited in the footer section of the div element. */
#footer a:visited {
  color: #000000; 
}

</style>
@endsection


@section('content')
	<!-- BANNER -->
	<div class="banner-wrap">
		<section class="banner banner-v2 v3">
			<h3><span>46,129 WordPress Themes & Website Templates From $2</span></h3>
			<h5>WordPress themes, web templates and more. Brought to you by the largest global community of creatives.</h5>

			<form action="{{ route('theme_search') }}" class="search-widget-form">
				<input type="text" value="" required name="item" placeholder="Search goods or services here...">
				<label for="cat" class="select-block">
					<select name="cat" id="cat">
						<option value="">All Categories</option>
						@foreach($theme_category as $show_category)

							<option {{ (isset($_GET['cat']) && $_GET['cat'] == $show_category->category_url) ? 'selected' : ""}} value="{{$show_category->category_url}}">{{$show_category->category_name}}</option>
						@endforeach
					</select>
					<!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</label>
				<button class="button medium primary">Search Now!</button>
			</form>
		</section>
	</div>
	<!-- /BANNER -->

	<!-- SERVICES -->
	<div id="services-wrap">
		<section id="services" class="services v2">			
			<div class="hometheme">
				<h3>Top Sele Discover our Featured templates of the week</h3>
				<p>Every week we hand-pick some of the best new website themes from our collection. These beautiful templates are making our heads turn!</p>
			</div>
			<div class="hometheme" style="overflow: visible;">
				@foreach($top_seller as $show_seller)
				<a class="hideDisplay" href="{{url('themeplace/'.$show_seller->theme_url)}}">
						<img class="user-avatar medium" src="{{ asset('theme/images/'.$show_seller->main_image)}}" alt="">
					  <span class="showDisplayOnHover">
					    <div class="magnifier" style="width: 477px;overflow: hidden; position: absolute;z-index: 99999">
							<div class="size-limiter"><img alt="" src="{{ asset('theme/images/'.$show_seller->main_image)}}"></div><strong>  {{$show_seller->theme_name}}</strong>
							<div class="info">
								<div class="author-category">by <span class="author">{{$show_seller->username}}</span></div>
								<div class="price"><span class="cost"><sup>$</sup>{{$show_seller->price_regular}}</span></div>
							</div>
							<div class="footer"><span class="category">{{$show_seller->category_name}} / {{$show_seller->subcategory_name}}</span><span class="gst-notice">All prices are in USD</span></div>
						</div>
					  </span>
					</a>
				@endforeach
			</div>
			<a href="#" class="button big primary v2">View More Featured Items</a>
			
			
			<div class="hometheme">
				<h3>Check out our newest themes and templates</h3>
				<div class="heratheme">
					<button class="herath action" onclick="theme_by_category('all')">All categories</button>
					@foreach($theme_category as $show_category)
						<button class="herath" onclick="theme_by_category('{{$show_category->id}}')" >{{$show_category->category_name}}</button>
					@endforeach
				</div>
			</div>
			<div class="hometheme theme_show_category "  style="overflow: visible;">
				
				@foreach($get_theme_info as $show_theme_info)
					<a class="hideDisplay" href="{{url('themeplace/'.$show_theme_info->theme_url)}}">
						<img class="user-avatar medium" src="{{ asset('theme/images/'.$show_theme_info->main_image)}}" alt="">
					  <span class="showDisplayOnHover">
					    <div class="magnifier" style="width: 477px;overflow: hidden; position: absolute;z-index: 99999">
							<div class="size-limiter"><img alt="" src="{{ asset('theme/images/'.$show_theme_info->main_image)}}"></div><strong>  {{$show_theme_info->theme_name}}</strong>
							<div class="info">
								<div class="author-category">by <span class="author">{{$show_theme_info->username}}</span></div>
								<div class="price"><span class="cost"><sup>$</sup>{{$show_theme_info->price_regular}}</span></div>
							</div>
							<div class="footer"><span class="category">{{$show_theme_info->category_name}} / {{$show_theme_info->subcategory_name}}</span><span class="gst-notice">All prices are in USD</span></div>
						</div>
					  </span>
					</a>
				@endforeach
			</div>
			
			
			<div class="hometheme" style="z-index: -99;">
				<h3>The most recent releases from our community</h3>
				<p>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards.<br>From multipurpose themes to niche templates, you’ll always find something that catches your eye.</p>
			</div>
			
			<div class="hometheme">
				<a href="#" class="buttonv3">All New Items</a>
				<a href="#" class="buttonv3">Popular Files</a>
				<a href="#" class="buttonv3">Browse Categories</a>
			</div>
			
			<hr class="line-separator">
			
			<div class="hometheme">
				<h3>New Arrival Author</h3>
				<p>There are always new freebies ready for you to enjoy on Envato Market. Website templates here on ThemeForest, WordPress plugins, graphic assets of all sorts, thousands of background music tracks and more. Get them while you can!</p>
			</div>
			<div class="hometheme">


				@foreach($new_arrival_author as $show_arrival_author)
					<a href="{{url($show_arrival_author->username)}}" class="user-avatar-wrap v4">
						<figure class="user-avatar medium">
							<img src="{{ asset('image/').'/'.$show_arrival_author->user_image}}" alt="">
						</figure>
					</a>
				@endforeach
				

			</div>
			<div class="clearfix"></div>
			<hr class="line-separator">
			<div class="chief_row row">
				<div class="flex-col-3 v2">
					<img src="{{ asset('allscript')}}/images/support.png" alt="">
					<h2>All the themes you need.</h2>
					<p>Templates for the best CMS like WordPress and Joomla, e-commerce templates for WooCommerce, Shopify and more… A huge library with top-quality themes and templates.</p>
				</div>
				<div class="flex-col-3 v2">
					<img src="{{ asset('allscript')}}/images/everything.png" alt="">
					<h2>Know your template.</h2>
					<p>High-quality website templates are guaranteed on ThemeForest. You can check out reviews left by other users, and use collections to save and share your favourite themes.</p>
				</div>
				<div class="flex-col-3 v2">
					<img src="{{ asset('allscript')}}/images/discover.png" alt="">
					<h2>Everything you need in one place.</h2>
					<p>ThemeForest is part of Envato Market, the creative eco-system with over 35,000 designers creating every digital asset you’ll need for your projects.</p>
				</div>
			</div>
			
		</section>
	</div>
	<div class="themejojo">
		<div class="hometheme">
			<h3>Engage with our global community</h3>
			<p>Community is the heart of Envato! Jump on our busy online forums where experts share their knowledge and you can get help from fellow creatives,<br>discuss features and products, and make great connections. Even in real life :)</p>
		</div>					
		<a href="#" class="button big primary v2">View More Featured Items</a>
		<div class="community"><img src="{{ asset('allscript')}}/images/community.png" alt=""></div>
	</div>
	<!-- /SERVICES -->
	<!-- SUBSCRIBE BANNER -->
	<div id="subscribe-banner-wrap">
		<div id="subscribe-banner">
			<!-- SUBSCRIBE CONTENT -->
			<div class="subscribe-content">
				<!-- SUBSCRIBE HEADER -->
				<div class="subscribe-header">
					<figure>
						<img src="{{ asset('allscript')}}/images/news_icon.png" alt="subscribe-icon">
					</figure>
					<p class="subscribe-title">Subscribe to our Newsletter</p>
					<p>And receive the latest news and offers</p>
				</div>
				<!-- /SUBSCRIBE HEADER -->

				<!-- SUBSCRIBE FORM -->
				<form class="subscribe-form">
					<input type="text" name="subscribe_email" id="subscribe_email" placeholder="Enter your email here...">
					<button class="button medium dark">Subscribe!</button>
				</form>
				<!-- /SUBSCRIBE FORM -->
			</div>
			<!-- /SUBSCRIBE CONTENT -->
		</div>
	</div>
	<!-- /SUBSCRIBE BANNER -->

@endsection

@section('js')


<script type="text/javascript">

    function theme_by_category(category_id){

    	$('.theme_show_category').html('<img src="{{asset("image/loading1.gif")}}">');
        var  link = '<?php echo URL::to("themeplace/theme_show_category");?>';
     
        $.ajax({
            url:link,
            method:"POST",
            data:{
            category_id:category_id,
             _token: '{{csrf_token()}}'},
            success:function(data){
                if(data){
                    $('.theme_show_category').html(data);
                   
              	}
           	}
        });
    }    

</script>


<!-- jQuery -->
<script src="{{ asset('allscript')}}/js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript')}}/js/vendor/owl.carousel.min.js"></script>
<!-- Tweet -->
<script src="{{ asset('allscript')}}/js/vendor/twitter/jquery.tweet.min.js"></script>
<!-- xmAlerts -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmalert.min.js"></script>
<!-- Side Menu -->
<script src="{{ asset('allscript')}}/js/side-menu.js"></script>
<!-- Home -->
<script src="{{ asset('allscript')}}/js/home.js"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript')}}/js/tooltip.js"></script>

<!-- Home Alerts -->
<script src="{{ asset('allscript')}}/js/home-alerts.js"></script>
@endsection