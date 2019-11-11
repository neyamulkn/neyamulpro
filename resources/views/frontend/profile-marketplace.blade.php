@extends('frontend.layouts.master')
@section('title', 'profile')

@section('css')
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
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
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'workplace'])}}">Workplace</a>
					</li>
					<li class="dropdown-item active">
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
				@if(count($get_gigs)>0)
				<!-- PRODUCT SHOWCASE -->
			    <div class="product-showcase">
			        <!-- PRODUCT LIST -->
			        <div class="product-list grid column3-4-wrap">

			        @foreach($get_gigs as $show_gig)
			            <!-- PRODUCT ITEM -->
			            <div class="product-item column">
			                <!-- PRODUCT PREVIEW ACTIONS -->
			                <div class="product-preview-actions">
			                    <!-- PRODUCT PREVIEW IMAGE -->
			                    <figure class="product-preview-image">
			                        
			                        <img src="<?php echo asset('gigimages/'.$show_gig->image_path); ?>">
			                    </figure>
			                    <!-- /PRODUCT PREVIEW IMAGE -->

			                    <!-- PREVIEW ACTIONS -->
			                    <div class="preview-actions">
			                        <!-- PREVIEW ACTION -->
			                        <div class="preview-action">
			                            <a href="<?php echo url($show_gig->username.'/'.$show_gig->gig_url); ?>" target="_blank">
			                                <div class="circle tiny primary">
			                                    <span class="icon-tag"></span>
			                                </div>
			                            </a>
			                            <a href="<?php echo url('marketplace/'.$show_gig->gig_url); ?>" target="_blank">
			                                <p>Go to Item</p>
			                            </a>
			                        </div>
			                        <!-- /PREVIEW ACTION -->

			                        <!-- PREVIEW ACTION -->
			                        <div class="preview-action">
			                            <a href="#">
			                                <div class="circle tiny secondary">
			                                    <span class="icon-heart"></span>
			                                </div>
			                            </a>
			                            <a href="#">
			                                <p>Favourites +</p>
			                            </a>
			                        </div>
			                        <!-- /PREVIEW ACTION -->
			                    </div>
			                    <!-- /PREVIEW ACTIONS -->
			                </div>
			                <!-- /PRODUCT PREVIEW ACTIONS -->

			                <!-- PRODUCT INFO -->
			                <div class="product-info">
			                    <a href="<?php echo url('marketplace/'.$show_gig->gig_url); ?>">
			                        <p class="text-header">I will <?php echo $show_gig->gig_title; ?></p>
			                    </a>
			                   
			                    <a href="shop-gridview-v1.html">
			                        <p class="category primary">
			                            <?php 
			                            if($show_gig->gig_payment_type == "monthly"){
			                             echo '<span style="color:red">'.ucfirst($show_gig->gig_payment_type). '</span>';
			                            }else{
			                                echo ucfirst($show_gig->gig_payment_type). ' Price';
			                            }
			                            ?>
			                        </p>
			                    </a>
			                    <p class="price"><span>$</span><?php echo $show_gig->basic_p; ?> </p>
			                </div>
			                <!-- /PRODUCT INFO -->
			                <hr class="line-separator">

			                <!-- USER RATING -->
			                <div class="user-rating">
			                    <a href="<?php echo url($show_gig->username); ?>" target="_blank">
			                        <figure class="user-avatar small user_image">
			                            <img src="<?php echo asset('/image/'.$show_gig->user_image); ?>">
			                        </figure>
			                    </a>
			                    <a href="<?php echo url($show_gig->username); ?>" target="_blank">
			                        <p class="text-header tiny"><?php echo $show_gig->name; ?></p>
			                    </a>
			                    <ul class="rating tooltip" title="Author's Reputation">
			                        <li class="rating-item">
			                            <!-- SVG STAR -->
			                            <svg class="svg-star">
			                                <use xlink:href="#svg-star"></use>
			                            </svg>
			                            <!-- /SVG STAR -->
			                        </li>
			                        <li class="rating-item">
			                            <!-- SVG STAR -->
			                            <svg class="svg-star">
			                                <use xlink:href="#svg-star"></use>
			                            </svg>
			                            <!-- /SVG STAR -->
			                        </li>
			                        <li class="rating-item">
			                            <!-- SVG STAR -->
			                            <svg class="svg-star">
			                                <use xlink:href="#svg-star"></use>
			                            </svg>
			                            <!-- /SVG STAR -->
			                        </li>
			                        <li class="rating-item">
			                            <!-- SVG STAR -->
			                            <svg class="svg-star">
			                                <use xlink:href="#svg-star"></use>
			                            </svg>
			                            <!-- /SVG STAR -->
			                        </li>
			                        <li class="rating-item empty">
			                            <!-- SVG STAR -->
			                            <svg class="svg-star">
			                                <use xlink:href="#svg-star"></use>
			                            </svg>
			                            <!-- /SVG STAR -->
			                        </li>
			                    </ul>
			                </div>
			                <!-- /USER RATING -->
			            </div>
			            <!-- /PRODUCT ITEM -->
			        @endforeach
			        </div>
			       <!-- /gig LIST -->
			                
			    </div>
			    <!-- /gig SHOWCASE -->
			    <!-- PAGER -->
			    <div class="page primary paginations">
			       {{$get_gigs->links()}}
			    </div>
			    <!-- /PAGER -->
			@else <h2 style="text-transform: capitalize; color: #000;"> {{Request::route('username')}} Have No gigs. </h2> @endif
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

<!-- Dashboard Header -->
<script src="{{asset('/allscript')}}/js/dashboard-header.js"></script>
<!-- Dashboard Statistics -->
<script src="{{asset('/allscript')}}/js/dashboard-statistics.js"></script>
@endsection