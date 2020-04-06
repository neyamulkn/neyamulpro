@extends('frontend.layouts.master')
@section('title', 'Hotlancer')

@section('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/tooltipster.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/index.css') }}">

@endsection

@section('content')
	<div class="banner-wrap" style="background: url({{ asset('allscript')}}/images/bg.jpg) no-repeat center;background-position: 50%;background-size: cover!important;background-repeat: no-repeat;">
		<section class="banner v2">
			<h2>Hire freelancers </h2>
			<h1>The Biggest <span>Marketplace</span></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
			<a class="btn btn-primary" href="#"> Get Started </a>

			<!-- SEARCH WIDGET -->
			<form action="#" class="search-widget-form" id="searchForm">
			<div class="search-widget">
				<div class="col-md-10 col-xs-9">
					<input type="text" id="searchKey" required name="item" placeholder="Search goods or services here...">
					<label for="platform" class="select-block">
						<select required="" onchange="changePath(this.value)" name="platform" id="platform">
							<option value="">Select Platform</option>
							<option value="themeplace">Themeplace</option>
							<option value="marketplace">Marketplace</option>
							<option value="workplace">Workplace</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<div class="col-md-2 col-xs-3">
					<button class="button medium dark">Search Now!</button>
				</div>
			</div>
		</form>
			<!-- /SEARCH WIDGET -->
		</section>
	</div>
	<!-- /BANNER -->

	<!-- SERVICES -->
	<div id="services-wrap">
		<section id="services" class="services v2">
			<div style="overflow:hidden">
				<div class="client-logo-row">
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/wordpress.png" alt="wordpress"></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/shopify.svg" alt="shopify"></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/laravel.png" alt="laravel"></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/codeigniter.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/angular.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/php.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/druplicon.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/joomla.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/paypal.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/css3.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/html5.png" alt=""></a>
				  
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/seo.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/bitcoin.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/pin.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/Illustrator.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/photoshop.svg" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/writing.png" alt="writing"></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/ve.png" alt="Video Editing"></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/dataentry.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/learn.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/android-studio.png" alt=""></a>
				  <a href="#" class="client-logo floating"><img src="{{ asset('allscript')}}/images/code.png" alt=""></a>
				</div>
			</div>
	
			<h3 class="mb-sm-30">Find your freelancer or agency</h3>
			<div class="row4 service-item column">
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc01.svg">
					<p>Graphics & Design</p>
				</a>
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc02.svg">
					<p>Digital Marketing</p>
				</a>
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc03.svg">
					<p>Writing & Translation</p>
				</a>
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc04.svg">
					<p>Video & AnimationVideo</p>
				</a>
			</div>
			<div class="row4 service-item column">
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc05.svg">
					<p>Music & Audio</p>
				</a>
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc06.svg">
					<p>Programming & Tech</p>
				</a>
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc07.svg">
					<p>Business</p>
				</a>
				<a href="#" class="row44">
					<img  src="{{ asset('allscript')}}/images/cc08.svg">
					<p>Lifestyle & Gaming</p>
				</a>
			</div>
			<div class="clearfix"></div>
			<div class="fadeInUp">
				<h2>The tightest vetting in the industry.&nbsp;</h2>
				<p>Don't waste time with under-qualified candidates. We know your bar is high - so is ours.</p>
			</div>		
			<div class="chief_row row">
				<div class="flex-col-3">
					<img src="{{ asset('allscript')}}/images/ab1.webp" alt="">
					<h2>Professional Review</h2>
					<p>We only work with&nbsp;dedicated, Professional Freelancers.</p>
				</div>
				<div class="flex-col-3">
					<img src="{{ asset('allscript')}}/images/ab2.webp" alt="">
					<h2>Technical Assessment</h2>
					<p>Every candidate is tested for senior-level proficiency.</p>
				</div>
				<div class="flex-col-3">
					<img src="{{ asset('allscript')}}/images/ab3.webp" alt="">
					<h2>Character Assessment</h2>
					<p>Executive reviews for soft skills and communication.</p>
				</div>
				<div class="flex-col-3">
					<img src="{{ asset('allscript')}}/images/ab4.webp" alt="">
					<h2>Full Reference Checks</h2>
					<p>A thorough process with relevant, validated sources.</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row plit_columns">
	            <div class="col-sm-6 plit_img">
	                <img src="{{ asset('allscript')}}/images/text-area.svg" alt="">
	            </div>
	            <div class="col-sm-6 plit_content">
	                <h2>Hire Freelancers for Monthly or Fixed Bid Projects</h2>
	                <p>HOTLancer connects entrepreneurs and business owners to a world of talent. Whether you need a team of web developers to design your online business or you simply have a research project due on Monday, our top rated experts have the necessary skills and experience to help you get ahead.</p>
	            </div> 
	        </div>
			<div class="row plit_columns">
	            <div class="col-sm-6 pull-right plit_img">
	                <img src="{{ asset('allscript')}}/images/text-area-2.svg" alt="">
	            </div> 
	            <div class="col-sm-6 pull-right plit_content plit_content_2">
	                <h2>Experts on Stand By, Ready to Perform for Your Business</h2>
	                <p>We understand the importance of maintaining a high-quality online reputation. Our community leverages transparency and a credible review system to ensure the highest level of service. We also perform skills testing. This includes cognitive, integrity and creativity testing to match your requirements with the right freelancers.</p>
	            </div>
	        </div>
			<div class="row plit_columns">
	            <div class="col-sm-6 plit_img">
	                <img src="{{ asset('allscript')}}/images/user_companies.webp" alt="">
	            </div>
	            <div class="col-sm-6 plit_content">
	                <h2>Manage Projects, Companies, and Payments with Privacy</h2>
	                <p>HOTLancer Manage all your projects, payments and admin tasks in one place. goLance streamlines your business by giving you the same login for unlimited companies and projects.</p>
	            </div> 
	        </div>
			<div class="clearfix"></div>
			<div class="fadeInUp">
                <h2>Make Money Earning To SmartPhone<br/>Without Investment</h2>
                <p>Watch the success stories of other hiring managers and see how well Work works. Watch the success stories of other hiring</p>
            </div>
			<div class="video_area">
               <img src="{{ asset('allscript')}}/images/your-self.png" alt="">
                <a class="youbideo" href="https://vimeo.com/161058202"><img  src="{{ asset('allscript')}}/images/play.png"></a>
            </div>
			<div class="clearfix"></div>
		</section>
	</div>
	<!-- /SERVICES -->

	<!-- PROMO -->
	<div class="promo-banner dark left">
		<span class="icon-wallet"></span>
		<h5>Make money instantly!</h5>
		<h1>Start <span>HOTLancing</span></h1>
		<a href="#" class="button medium primary">Open Your Shop!</a>
	</div>
	<!-- /PROMO -->

	<!-- PROMO -->
	<div class="promo-banner secondary right">
		<span class="icon-tag"></span>
		<h5>Find anything you want</h5>
		<h1>Start Buying</h1>
		<a href="#" class="button medium dark">Register Now!</a>
	</div>
	<!-- /PROMO -->

	<div class="clearfix"></div>
	<div class="fadeInUp">
		<h2>THE Work TEAM</h2>
		<p>We are a small group of inverntors, Development and designers from the differrent parts of the world on a mission. Development and</p>
	</div>
	<div class="chief_row row">
		<div class="col-md-3 col-sm-6 wow fadeIn"> 
		   <div class="seth_robbins">
			   <img src="{{ asset('allscript')}}/images/chief-4.jpg" alt="">
			   <div class="content_area">
				   <a href="#">Seth Robbins</a>
					<h6>Chief @ Pathology Department</h6>
			   </div> 
				<ul class="social_icon">
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
				</ul>
		   </div> 
		</div>  
		<div class="col-md-3 col-sm-6 wow fadeIn"> 
		   <div class="seth_robbins">
			   <img src="{{ asset('allscript')}}/images/chief-4.jpg" alt="">
			   <div class="content_area">
				   <a href="#">Seth Robbins</a>
					<h6>Chief @ Pathology Department</h6>
			   </div> 
				<ul class="social_icon">
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
				</ul>
		   </div> 
		</div>  
		<div class="col-md-3 col-sm-6 wow fadeIn"> 
		   <div class="seth_robbins">
			   <img src="{{ asset('allscript')}}/images/chief-4.jpg" alt="">
			   <div class="content_area">
				   <a href="#">Seth Robbins</a>
					<h6>Chief @ Pathology Department</h6>
			   </div> 
				<ul class="social_icon">
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
				</ul>
		   </div> 
		</div> 
		<div class="col-md-3 col-sm-6 wow fadeIn"> 
		   <div class="seth_robbins">
			   <img src="{{ asset('allscript')}}/images/chief-4.jpg" alt="">
			   <div class="content_area">
				   <a href="#">Seth Robbins</a>
					<h6>Chief @ Pathology Department</h6>
			   </div> 
				<ul class="social_icon">
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
				</ul>
		   </div> 
		</div>
	</div>

	<div class="clearfix"></div>

	<div id="services-wrap">
		<section id="services" class="services-v2">
			<!-- SERVICE LIST -->
			<div class="service-list small column3-wrap">
				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-present"></span>
					</div>
					<h3>Buy &amp; Sell Easily</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-lock"></span>
					</div>
					<h3>Secure Transaction</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-like"></span>
					</div>
					<h3>Products Control</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-diamond"></span>
					</div>
					<h3>Quality Platform</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-earphones-alt"></span>
					</div>
					<h3>Assistance 24/7</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-bubble"></span>
					</div>
					<h3>Support Forums</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->
			</div>
			<!-- /SERVICE LIST -->
			<div class="clearfix"></div>
		</section>
	</div>

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
	<!-- Tooltipster -->
<script src="{{ asset('allscript/js/vendor/jquery.tooltipster.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/owl.carousel.min.js') }}"></script>
<!-- Tweet -->
<script src="{{ asset('allscript/js/vendor/twitter/jquery.tweet.min.js') }}"></script>
<!-- xmAlerts -->
<script src="{{ asset('allscript/js/vendor/jquery.xmalert.min.js') }}"></script>

<!-- Home -->
<script src="{{ asset('allscript/js/home.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript/js/tooltip.js') }}"></script>
<!-- Home Alerts -->
<script src="{{ asset('allscript/js/home-alerts.js') }}"></script>

<script src="{{ asset('allscript/js/typeahead.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#searchKey').typeahead({

            source: function (query, result) {
                $.ajax({
                    url: '{{ route("search_keyword") }}',
					data: 'q=' + query,            
                    dataType: "json",
                    type: "get",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });

    function changePath(platform){
    	if(platform == 'themeplace'){
    		$('#searchForm').attr('action', '{{route("theme_search")}}');
    	}else if(platform == 'marketplace'){
    		$('#searchForm').attr('action', '{{route("marketplace_search")}}');
    	}else if(platform == 'workplace'){
    		$('#searchForm').attr('action', '{{route("job_search")}}');
    	}else{
    		$('#searchForm').attr('action', '#');
    	
    	}
    }
</script>
@endsection

