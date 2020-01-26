@extends('frontend.layouts.master')
@section('title', Request::segment(1). ' - HOTLancer')

@section('css')
	<link rel="stylesheet" href="{!! asset('allscript/css/vendor/simple-line-icons.css') !!}">
	<link rel="stylesheet" href="{{asset('allscript/css/vendor/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('allscript/workplace/jobs.css')}}">

@endsection

@section('content')

	<!-- SECTION -->
	
	<!-- SECTION HEADLINE -->
	<div class="jp_top_header_img_wrapper">
        <div class="jp_slide_img_overlay"></div>
        <div class="jp_banner_heading_cont_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jp_job_heading_wrapper">
                            <div class="jp_job_heading">
                                <h1><span>3,000+</span> Browse Jobs</h1>
                                <p>Find Jobs, Employment &amp; Career Opportunities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="jp_header_form_wrapper">
                            <div class="col-lg-4">
                                <input type="text" placeholder="Keyword e.g. (Job Title, Description, Tags)">
                            </div>
                            <div class="col-lg-3">
                                <div class="jp_form_location_wrapper">
                                    <i class="fa fa-dot-circle-o first_icon"></i>
									<select>
										<option>Select Location</option>
										<option>Select Location</option>
										<option>Select Location</option>
										<option>Select Location</option>
										<option>Select Location</option>
									</select>
									<i class="fa fa-angle-down second_icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="jp_form_exper_wrapper">
                                    <i class="fa fa-dot-circle-o first_icon"></i>
									<select>
										<option>Experience</option>
										<option>Experience</option>
										<option>Experience</option>
										<option>Experience</option>
										<option>Experience</option>
									</select>
									<i class="fa fa-angle-down second_icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="jp_form_btn_wrapper">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-search"></i> Search</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_banner_main_jobs_wrapper">
                            <div class="jp_banner_main_jobs">
                                <ul>
                                    <li><i class="fa fa-tags"></i> Trending Keywords :</li>
                                    <li><a href="#">ui designer,</a></li>
                                    <li><a href="#">developer,</a></li>
                                    <li><a href="#">senior</a></li>
                                    <li><a href="#">it company,</a></li>
                                    <li><a href="#">design,</a></li>
                                    <li><a href="#">call center</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jp_banner_jobs_categories_wrapper">
            <div class="container">
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border jp_job_cate_left_border_bottom">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-code"></i>
                        <h3><a href="#">Developer</a></h3>
                        <p>(240 jobs)</p>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_bottom">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-laptop"></i>
                        <h3><a href="#">Technology</a></h3>
                        <p>(504 jobs)</p>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_bottom">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-bar-chart"></i>
                        <h3><a href="#">Accounting</a></h3>
                        <p>(2250 jobs)</p>
                    </div>
                </div> 
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_res">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-medkit"></i>
                        <h3><a href="#">Medical</a></h3>
                        <p>(202 jobs)</p>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-university"></i>
                        <h3><a href="#">Government</a></h3>
                        <p>(1457 jobs)</p>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-th-large"></i>
                        <h3><a href="#">All Jobs</a></h3>
                        <p>(2000+ jobs)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- /SECTION HEADLINE -->
	
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<div class="col-lgh">
				<h3>Find your freelancer or agency</h3>
				<div class="container1">
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up1.svg">
							<h5>Web, Mobile &amp; Software Dev</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up2.svg">
							<h5>Design & Creative</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up3.svg">
							<h5>Writing</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up4.svg">
							<h5>Sales & Marketing</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up5.svg">
							<h5>Admin Support</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up6.svg">
							<h5>Customer Service</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up7.svg">
							<h5>Data Science & Analytics</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up8.svg">
							<h5>Engineering & Architecture</h5>
						</div>
					</div>
				</div>
			</div>
			<p class="upcat">Don’t see what you’re looking for? <a href="#">See all categories</a></p>
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<div class="col-lg-12">
					<div class="jp_add_resume_wrapper">
						<div class="jp_add_resume_img_overlay"></div>
						<div class="jp_add_resume_cont">
							<img src="{{asset('allscript')}}/images/logo.png" alt="logo">
							<h4>Get Best Matched Jobs On your Email. Add Resume NOW!</h4>
							<ul>
								<li><a href="#"><i class="fa fa-plus-circle"></i> &nbsp;ADD RESUME</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sidebar">
					<ul class="dropdown hover-effect">
						<li class="dropdown-item">
							<a href="#">Design Inspires<span class="item-count">12</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Software<span class="item-count">27</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Interviews<span class="item-count">8</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Resources / Freebies<span class="item-count">15</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Technology<span class="item-count">19</span></a>
						</li>
					</ul>
				</div>
				
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content left">
				<div class="jp_hiring_slider_main_wrapper">
					<h3>TOP HIRING COMPANIES</h3>
					@foreach($top_hire_users as $show_users)
					
					<div class="col-lg-3">
						<div class="jp_hiring_content_main_wrapper">
							<div class="jp_hiring_content_wrapper">
								<img width="128" height="128" src="{{asset('/image/'.$show_users->user_image)}}" alt="hiring_img">
								<h4>{{$show_users->username}}</h4>
								<p>({{$show_users->country}})</p>
								<a href="#">4 Opening</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="col-lgh">
					<h2>Recent Jobs</h2>
					 @foreach($get_jobs as $show_job)
					   <div class="jp_job_post_main_wrapper_cont">
						<div class="jp_job_post_main_wrapper">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="jp_job_post_side_img">
										<img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
									</div>
									<div class="jp_job_post_right_cont">
										<h4><a  style="color: #00d7b3" href="{{ route('job-details' , $show_job->job_title_slug) }}">{!!$show_job->job_title!!}</a></h4>
										<p><a href="{{route('profile_view', $show_job->username)}}"> {!!$show_job->username!!} </a>&nbsp; <small style="color: #ccc;"> by {{ \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()}}</small></p>
										<ul>
											<li><i class="fa fa-cc-paypal"></i>&nbsp;  ${!!$show_job->budget!!}</li>
											<li><i class="fa fa-map-marker"></i>&nbsp;{!!$show_job->country!!}</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="jp_job_post_right_btn_wrapper">
										<ul>
											<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
											<li><a href="#">{!!$show_job->price_type!!}</a></li>
											<li><a href="{!! route('job_proposal', $show_job->job_title_slug) !!}">Apply</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="jp_job_post_keyword_wrapper">
							<ul>
								<li><i class="fa fa-tags"></i>Keywords :</li>
								<li><a href="#">ui designer,</a></li>
								<li><a href="#">developer,</a></li>
								<li><a href="#">senior</a></li>
								<li><a href="#">it company,</a></li>
								<li><a href="#">design,</a></li>
								<li><a href="#">call center</a></li>
							</ul>
						</div>
					   </div>
                    @endforeach
				</div>
			</div>
			<!-- CONTENT -->
		</div>
	</div>
	<div class="col-lghup">
		<h3>How it works</h3>
		<div class="container1">
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Post a job (it’s free)</h5>
					<p>Tell us about your project. Upwork connects you with top freelancers and agencies around the world, or near you.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Bids come to you</h5>
					<p>Get qualified proposals within 24 hours. Compare bids, reviews, and prior work. Interview favorites and hire the best fit.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Collaborate easily</h5>
					<p>Use Upwork to chat or video call, share files, and track project milestones from your desktop or mobile.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Payment simplified</h5>
					<p>Pay hourly or fixed-price and receive invoices through Upwork. Pay for work you authorize.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /SECTION -->
	<div class="promo-banner dark left">
		<span class="icon-wallet"></span>
		<h5>Make money instantly!</h5>
		<h1>Start <span>Selling</span></h1>
		<a href="#" class="button medium primary">Open Your Shop!</a>
	</div>
	<div class="promo-banner secondary right">
		<span class="icon-tag"></span>
		<h5>Find anything you want</h5>
		<h1>Start Buying</h1>
		<a href="#" class="button medium dark">Register Now!</a>
	</div>
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
	<div id="subscribe-banner-wrap">
		<div id="subscribe-banner">
			<!-- SUBSCRIBE CONTENT -->
			<div class="subscribe-content">
				<!-- SUBSCRIBE HEADER -->
				<div class="subscribe-header">
					<figure>
						<img src="{{asset('allscript')}}/images/news_icon.png" alt="subscribe-icon">
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
	<!-- /SECTION -->
@endsection

@section('js')


@endsection