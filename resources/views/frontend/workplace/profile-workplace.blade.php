@extends('frontend.layouts.master')
@section('title', 'profile')

@section('css')
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{!! asset('allscript/css')!!}/hl-work.css">
	<link rel="stylesheet" href="{{asset('allscript/workplace/jobs.css')}}">
	<style type="text/css">
		
	.exeheader{
		background: #fff;
		border-top: 1px solid #ccc;
		margin: 0px auto;
		    margin-bottom: 0px;
		width: 97.5%;
		margin-bottom: -5px;
		padding: 10px;
		font-weight: bolder;
		box-shadow: 0 0 13px #ccc;
	}
	</style>
@endsection

@section('content')

	<!-- AUTHOR PROFILE BANNER -->
	<div class="author-profile-banner"></div>
	<!-- /AUTHOR PROFILE BANNER -->

	<!-- AUTHOR PROFILE META -->
	<div class="author-profile-meta-wrap">
		<div class="author-profile-meta">
			<!-- AUTHOR PROFILE INFO -->
			<div class="author-profile-info">
				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<p class="text-header">Member Since:</p>
					<p>{{ \Carbon\Carbon::parse($userinfo->created_at)->format('F d, Y')}}</p>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->

				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<p class="text-header">Total Sales:</p>
					<p>820</p>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->

				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<p class="text-header">Location:</p>
					<p>{{$userinfo->country}}</p>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->

				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<a href="#" class="button mid dark spaced">Add to <span class="primary">Followers</span></a>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->
			</div>
			<!-- /AUTHOR PROFILE INFO -->
		</div>
	</div>
	<!-- /AUTHOR PROFILE META -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section overflowable">
			<!-- SIDEBAR -->
			<div class="sidebar left author-profile">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio">
					<!-- USER AVATAR -->
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{asset('/allscript')}}/images/avatars/avatar_09.jpg" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header">{{ $userinfo->username}}</p>
					<p class="text-oneline">Super Samurai Developers<br>Los Angeles, Usa</p>
					<!-- SHARE LINKS -->
					<ul class="share-links">
						<li><a href="#" class="fb"></a></li>
						<li><a href="#" class="twt"></a></li>
						<li><a href="#" class="db"></a></li>
					</ul>
				
					<a href="#" class="button mid dark-light">Send a Private Message</a>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect">
					<li class="dropdown-item">
						<a href="{{route('profile_view', Request::route('username'))}}">About {{Request::route('username')}}</a>
					</li>
					<li class="dropdown-item active">
						<a href="{{route('userProtfolio', [Request::route('username'), 'workplace'])}}">Workplace</a>
					</li>
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'marketplace'])}}">Marketplace</a>
					</li>
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'themeplace'])}}">Themeplace</a>
					</li>
					
				</ul>
				<!-- /DROPDOWN -->

			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content right">
				@if(count($get_jobs)>0)
				<div class="col-lgh">
                    @foreach($get_jobs as $show_job)
					   <div class="jp_job_post_main_wrapper_cont">
						<div class="jp_job_post_main_wrapper">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="jp_job_post_side_img">
										<img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
									</div>
									<div class="jp_job_post_right_cont">
										<h4><a  style="color: #00d7b3" href="{{ route('job-details' , $show_job->job_title_slug) }}">{!! $show_job->job_title !!}</a></h4>
										<p><a href="{{url($show_job->username)}}"> {!! $show_job->username !!} </a>&nbsp; <small style="color: #ccc;"> by {!! \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()!!}</small></p>
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

                    <div class="page primary paginations"> {{$get_jobs->links()}} </div>
                </div>
                @else <h2 style="text-transform: capitalize; color: #000;"> {{Request::route('username')}} Have No Jobs </h2> @endif
			</div>
			<!-- CONTENT -->

			<div class="clearfix"></div>
		</div>
	</div>
@endsection

@section('js')
<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>
<script src="{{asset('/allscript')}}/js/vendor/jquery.chart.min.js"></script>
<!-- bxSlider -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.bxslider.min.js"></script>
<!-- Side Menu -->

<!-- Dashboard Header -->
<script src="{{asset('/allscript')}}/js/dashboard-header.js"></script>
<!-- Dashboard Statistics -->
<script src="{{asset('/allscript')}}/js/dashboard-statistics.js"></script>
@endsection