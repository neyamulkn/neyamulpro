@extends('frontend.layouts.master')

@section('title')
{!! $get_theme_detail->theme_name .' – '. Request::segment(1) .' – '. 'HOTLancer' !!}
@endsection

@section('metatag')
    <meta name="description" content="Hire top‑quality freelancers for your next project from the largest and most trusted freelancer site. Learn how you can get even more done with increased productivity and find out why 90% of our customers rehire.">
    <meta name="image" content="https://hotlancer.com/allscript/images/hotlancer.jpg">
    <meta name="rating" content="5">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="HOTLancer - the largest freelancer Marketplace">
    <meta itemprop="description" content="Hire top‑quality freelancers for your next project from the largest and most trusted freelancer site. Learn how you can get even more done with increased productivity and find out why 90% of our customers rehire.">
    <meta itemprop="image" content="https://hotlancer.com/allscript/images/hotlancer.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="HOTLancer - the largest freelancer Marketplace">
    <meta name="twitter:description" content="Hire top‑quality freelancers for your next project from the largest and most trusted freelancer site. Learn how you can get even more done with increased productivity and find out why 90% of our customers rehire.">
    <meta name="twitter:site" content="https://hotlancer.com/">
    <meta name="twitter:creator" content="@HeRaKhan">
    <meta name="twitter:image:src" content="https://hotlancer.com/allscript/images/hotlancer.jpg">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="HOTLancer - the largest freelancer Marketplace">
    <meta name="og:description" content="Hire top‑quality freelancers for your next project from the largest and most trusted freelancer site. Learn how you can get even more done with increased productivity and find out why 90% of our customers rehire.">
    <meta name="og:image" content="https://hotlancer.com/allscript/images/hotlancer.jpg">
    <meta name="og:url" content="https://hotlancer.com/">
    <meta name="og:site_name" content="HOTLancer">
    <meta name="og:locale" content="en">
    <meta name="og:video" content="#">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="product">
@endsection
@section('css')
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{!! asset('allscript') !!}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{!! asset('allscript') !!}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{!! asset('allscript') !!}/e/1.css">
	<link rel="stylesheet" href="{!! asset('allscript') !!}/css/vendor/font-awesome.min.css">

<style>
.post .post-content {
    padding: 10px !important;
    overflow: hidden;
}
.sidebar-1 {
    width: 100%;
    background-color: white;
    padding: 20px;
}
h3.sidebar-2 {
    text-align: left;
}
.sidebar-item {
    padding: 10px 13px 52px;
}
.item-preview__actions {
    text-align: center;
	margin-top: 10px;
    margin-bottom: -10px;
}
.item-preview {
    min-height: 245px;
    padding: 12px;
    position: relative;
    text-align: center;
}
.item-preview__preview-buttons {
    padding-top: 12px;
    display: inline-block;
}
.item-preview__preview-buttons>a {
    margin: 0 10px 10px 0;
}
.btn, button, [role=button], [type=submit] {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background-color: gray;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    display: inline-block;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
    padding: 5px 20px;
    text-align: center;
    text-decoration: none;
}
.btn:hover, button:hover, [role=button]:hover, [type=submit]:hover, .btn:focus, button:focus, [role=button]:focus, [type=submit]:focus {
    background-color: #e61852;
    text-decoration: none;
    outline: none;
}
.btn--label:hover {
    background: gray;
    cursor: default;
}
.btn--group-item {
    border-radius: 0;
    padding: 5px 10px;
    margin-right: 1px;
}
.item-preview__preview-buttons--social .btn {
    line-height: 1.6;
}
.btn--group-item {
    border-radius: 0;
    padding: 5px 10px;
    margin-right: 1px;
}
span.icon-arrow-right.small {
    font-size: 10px !important;
    font-weight: bold;
}
.div-item {
    float: left;
    width: 289px;
    height: 60px;
    border-right: 1px solid #ebebeb;
    cursor: pointer;
}
.div-item {
    border: 6px solid #ffffff;
    background-color: #ffffff;
    overflow: hidden;
}
.div-item.selected {
    border-top: 6px solid #e61852;
    border-bottom-color: transparent !important;
    background-color: white;
    padding-top: 1px;
    z-index: 1;
}
.div-item.selected > a {
    color: #000;
}
.div-item > a {
    color: #b2b2b2;
}
.div-item > a {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    min-height: 40px;
}


.feedback{
	color: #FFC100;font-size: 15px;font-weight: bold;
}

.price{
	font-size: 15px;
}

.product-list .product-item .product-info {
    overflow: hidden;
    margin-bottom: 8px;
    min-height: auto !important;
}

.user img{
	width: 50px;
	height:50px;
}


.share-links.v3 button{
  color: #000;
  padding: 10px !important;
    padding-bottom: 7px !important;
    margin-left: 0px !important;
}
.comment-list .line-separator{
	margin-top: 3px !important;
}

</style>
@endsection
@section('menu')
	@include('frontend.layouts.theme-menu')
@endsection
@section('content')

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item">
					<p class="price large"><span>$</span><b id="cng_price">{!! $get_theme_detail->price_regular !!} </b></p>
					<hr class="line-separator">

				<form action="{!! route('theme_checkout') !!}" method="post" id="aux_form">
					{!! csrf_field() !!}

					<input type="hidden" name="theme_id" value="{!! $get_theme_detail->theme_id !!}">
					<!-- CHECKBOX -->
					<input type="radio" id="regular-license" value="price_regular" name="regular_license" form="aux_form" checked="">
					<label class="b-label linked-check" for="regular-license">
						<span class="checkbox tertiary"><span></span></span>
						Regular License
					</label>
					<!-- /CHECKBOX -->
					<p class="license-text" data-license="regular-license" style="display: block;">Lorem ipsum dolor sit amet, sectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore.</p>

					<!-- CHECKBOX -->
					<input type="radio" id="extended-license" value="price_extented" name="extended_license" form="aux_form">
					<label class="b-label linked-check" for="extended-license">
						<span class="checkbox tertiary"><span></span></span>
						Extended License
					</label>
					<!-- /CHECKBOX -->

					<input type="hidden" name="price" value="{!! $get_theme_detail->price_regular !!}" id="price">
					<p class="license-text" data-license="extended-license" style="display: none;">Lorem ipsum dolor sit amet, sectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore.</p>
					<button type="submit" name="purchase" value="purchase" class="button mid dark spaced"><span class="tertiary"><span class="icon-credit-card"></span> Buy Now</span></button>
				</form>

					<button onclick="add_to_cart('{!! $get_theme_detail->theme_id !!}')" class="button mid tertiary half">Add to Cart </button>
					<button class="button mid secondary wicon half"><span class="icon-heart"></span>652</button>
					<div class="clearfix"></div>
				</div>

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio short author-badges-v1 column">
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium user">
							<img src="{!! asset('image').'/'.$get_theme_detail->user_image  !!}" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header">{!! $get_theme_detail->username !!}</p>

					<p class="text-oneline">{!! $get_theme_detail->user_title !!}</p>

					<!-- BADGE LIST -->
					<div class="badge-list">
						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/gold_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/flags/flag_usa_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/support_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small pinned liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/member_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/hunter_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small pinned liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/appreciationist_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/rainbow_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small pinned liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/friendly_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{!!  asset('allscript') !!}/images/badges/community/gold_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->
					</div>
					<!-- /BADGE LIST -->
					<div class="clearfix"></div>
					<a href="{!! url($get_theme_detail->username) !!}" class="button mid dark spaced">Go to <span class="tertiary">Profile Page</span></a>
					<a href="#" class="button mid dark-light">Send a Private Message</a>
				</div>
				<!-- /SIDEBAR ITEM -->
				<div class="sidebar-item void buttons">
					<a href="#" class="button big dark purchase">
						<span >{!! $total_sale->total_sale !!} </span>
						<span class="tertiary"> Sales</span>
					</a>
					<a href="#" class="button big tertiary wcart">
						<span class="icon-present"></span>
						100 Comments
					</a>
					<a href="#" class="button big secondary wfav">
						<span class="icon-heart"></span>
						<span class="fav-count">652</span>
						Add to Favourites
					</a>
				</div>
				<div class="sidebar-item author-reputation short">
					<!-- PIE CHART -->
					<div class="pie-chart pie-chart2 xmpiechart" style="width: 44px; height: 44px; position: relative;">
						<span class="icon-like"></span>
					<canvas width="44" height="44" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="chartLine" width="44" height="44" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
					<!-- /PIE CHART -->
					<p class="text-header percent">76<span>%</span></p>
					<div class="percent-meta">
						<p class="text-header percent-info">Recommended</p>
						<!-- RATING -->
						<ul class="rating">
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
							<li class="rating-item">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
						</ul>
						<!-- /RATING -->
						<br/>
					</div>
				</div>
				<div class="sidebar-item author-reputation short">
					<!-- PIE CHART -->
					<div class="pie-chart pie-chart1 xmpiechart" style="width: 44px; height: 44px; position: relative;">
						<span class="icon-dislike"></span>
					<canvas width="44" height="44" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="chartLine" width="44" height="44" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
					<!-- /PIE CHART -->
					<p class="text-header percent">24<span>%</span></p>
					<div class="percent-meta">
						<p class="text-header percent-info">Recommended</p>
						<!-- RATING -->
						<ul class="rating">
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
							<li class="rating-item empty">
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
							<li class="rating-item empty">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
						</ul>
						<!-- /RATING -->
					</div>
				</div>
				<div class="sidebar-item author-reputation short">
					<!-- PIE CHART -->
					<div class="pie-chart pie-chart3 xmpiechart" style="width: 44px; height: 44px; position: relative;">
						<span class="icon-star"></span>
					<canvas width="44" height="44" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="chartLine" width="44" height="44" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
					<!-- /PIE CHART -->
					<p class="text-header percent">100<span>%</span></p>
					<div class="percent-meta">
						<p class="text-header percent-info">Recommended</p>
						<!-- RATING -->
						<ul class="rating">
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
							<li class="rating-item">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
						</ul>
						<!-- /RATING -->
					</div>
				</div>
				<div class="sidebar-item product-info">
					<h4>Theme Information</h4>
					<hr class="line-separator">
					<!-- INFORMATION LAYOUT -->
					<div class="information-layout">

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Create Date:</p>
							<p>{!!  \Carbon\Carbon::parse($get_theme_detail->created_at)->format('M d, Y') !!}</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Upload Date:</p>
							<p>{!!  \Carbon\Carbon::parse($get_theme_detail->updated_at)->format('M d, Y') !!}</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
						<!-- /Radio ITEM -->
						@foreach($get_theme_features as $get_theme_feature)
							@if($get_theme_feature->feature_type=='radio')
								<?php $get_feature_name = DB::table('theme_filters')->where('filter_id', $get_theme_feature->feature_id)->first();?>
								<div class="information-layout-item">
									<p class="text-header">{!! $get_feature_name->filter_name !!}:</p>
									<p>{!! $get_theme_feature->feature_name !!}</p>
								</div>
							@endif

							@if($get_theme_feature->feature_type=='select')
								<?php $get_feature_name = DB::table('theme_filters')->where('filter_id', $get_theme_feature->feature_id)->first();?>
								<div class="information-layout-item">
									<p class="text-header">{!! $get_feature_name->filter_name !!}:</p>
									<p>{!! $get_theme_feature->feature_name !!}</p>
								</div>
							@endif

							@if($get_theme_feature->feature_type=='dropdown')
								<?php $get_feature_name = DB::table('theme_filters')->where('filter_id', $get_theme_feature->feature_id)->first();?>
								<div class="information-layout-item">
									<p class="text-header">{!! $get_feature_name->filter_name !!}:</p>
									<p>{!! $get_theme_feature->feature_name !!}</p>
								</div>
							@endif
						@endforeach

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="tags tertiary" style="border:none;">
								<?php $tag_array = explode(',', $get_theme_detail->search_tag); ?>
								@foreach($tag_array as $tag)
									<a href="{!! url('tags/'.$tag) !!}">{!! $tag !!}</a>,
								@endforeach
							</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
					</div>
					<!-- INFORMATION LAYOUT -->
				</div>


			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content left">
				<div class="sidebar-1">
					<h3 class="sidebar-2">{!! $get_theme_detail->theme_name !!}</h3>
					<br><p><a href="{{url('/themeplace')}}">themeplace</a> <span class="icon-arrow-right small"></span> <a href="{{url('/themeplace')}}">{{$get_theme_detail->category_name}}</a> <span class="icon-arrow-right small"></span> <a href="/"> {{$get_theme_detail->subcategory_name}}</a></p>
				</div>

				<!-- POST -->
				<article class="post">
					<!-- POST IMAGE SLIDES -->
					<div class="post-image">
						<figure class="product-preview-image large liquid">
							<img src="{!!  asset('theme/images/'.$get_theme_detail->main_image) !!}" alt="">
						</figure>
						<!-- SLIDE CONTROLS -->


					</div>

					<hr class="line-separator">

					<div class="item-preview__actions">

						<div class="item-preview__preview-buttons--social" data-view="socialButtons">
							<div class="btn-group">
								<div id="fullscreen" class="item-preview__preview-buttons">
									<a data-view="crossDomainGoogleAnalyticsLink" href="#" role="button" class="btn-icon live-preview" target="_blank" rel="noopener nofollow">Live Preview <span class="icon-link"></span></a>

									<a data-view="crossDomainGoogleAnalyticsLink" href="#" role="button" class="btn-icon live-preview" target="_blank" rel="noopener nofollow">Screenshort <span class="icon-link"></span></a>
								</div>

							</div>
					  </div>

					</div>
				</article>
				<!-- /POST -->
				<div class="clearfix"></div>
				<!-- POST TAB -->
				<div class="post-tab">
					<!-- TAB HEADER -->
					<div class="tab-header tertiary">
						<!-- TAB ITEM -->
						<div class="tab-item selected">
							<p class="text-header">Item Details</p>
						</div>
						<!-- /TAB ITEM -->
						<?php
							$total_ratting= $total_review = 0;
							foreach($get_theme_reviews as $get_theme_review){
								$total_ratting += $get_theme_review->ratting_star;
								$total_review += 1;
							}

						?>
						<!-- TAB ITEM -->
						<div class="tab-item">
							<p class="text-header">Reviews

								<span class="feedback">&#9733; @if($total_review>0) {{ round($total_ratting / $total_review, 1) }} @endif </span> ({!! $total_review !!})

							</p>
						</div>
						<!-- /TAB ITEM -->

						<!-- TAB ITEM -->
						<div class="tab-item">
							<p class="text-header">Comments</p>
						</div>


						<!-- /TAB ITEM -->
					</div>
					<!-- /TAB HEADER -->

					<!-- TAB CONTENT -->
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							<!-- COMMENT -->
							<div class="post-content">
								<!-- POST PARAGRAPH -->
								<div class="post-paragraph">
									<p>
									{!! $get_theme_detail->description !!}
								</p>
								</div>
								<!-- /POST PARAGRAPH -->

								<hr class="line-separator">
								<!-- /POST PARAGRAPH -->
								<!-- SHARE -->
								<div class="share-links-wrap">
									<p class="text-header small">Social Share:</p>
									<!-- SHARE LINKS -->
									<ul class="share-links hoverable">
										<li><a href="http://www.facebook.com/sharer.php?u={!! url('themeplace/'.$get_theme_detail->theme_url) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com/share?url={!! url('themeplace/'.$get_theme_detail->theme_url) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif&amp;text={!! $get_theme_detail->theme_name !!}&amp;hashtags=HOTLancer" target="_blank"><i class="fa fa-twitter"></i></a></li>

										<li><a href="http://reddit.com/submit?url={!! url('themeplace/'.$get_theme_detail->theme_url) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif&amp;title={!! $get_theme_detail->theme_name !!}" target="_blank"><i class="fa fa-reddit"></i></a></li>
										<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={!! url('themeplace/'.$get_theme_detail->theme_url) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									</ul>
									<!-- /SHARE LINKS -->
								</div>
								<!-- /SHARE -->
								<!-- Affiliate SHARE -->
								<div class="share-links-wrap">
									<p class="text-header small">Affiliate Link:</p>
									<!-- Affiliate SHARE LINKS -->
									<ul class="share-links v3">
										<input type="text" value="{{ url('themeplace/'.$get_theme_detail->theme_url) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif" id="myInput">
										<button onclick="myFunction()"><i class="fa fa-copy"></i></button>
									</ul>
									<!-- /Affiliate SHARE LINKS -->
								</div>
								<!-- /Affiliate SHARE -->
							</div>

							<!-- /COMMENT REPLY -->
						</div>
						<!-- /COMMENTS -->
					</div>
					<!-- /TAB CONTENT -->

					<!-- TAB CONTENT -->
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list" >
							@foreach($get_theme_reviews as $get_theme_review)
							<!-- COMMENT -->
							<div class="comment-wrap" style="padding: 10px 0px 10px !important;">

								<div class="comment" style="margin-bottom: 0px;">
									<p class="text-header">{!! $get_theme_review->username !!}</p>
									<!-- PIN -->
									<span class="pin greyed">Purchased</span>
									<!-- /PIN -->
									<p class="timestamp"><span class="feedback">&#9733; {!! $get_theme_review->ratting_star !!} </span> For {!! $get_theme_review->ratting_reason !!}</p>
									<a href="#" class="report">{!! Carbon\Carbon::parse($get_theme_review->created_at)->format('d M, Y') !!}</a>
									<p>{!! $get_theme_review->ratting_comment !!}</p>
								</div>
							</div>
							<!-- /COMMENT -->
							<hr class="line-separator" style="margin-top: 0px;">
						@endforeach

						</div>
						<!-- /COMMENTS -->
					</div>
					<!-- /TAB CONTENT -->


					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list" >

							@foreach($get_theme_comment as $show_comment)
								<div class="comment-wrap">
									<!-- USER AVATAR -->
									<a href="user-profile.html">
										<figure class="user-avatar medium user">
											<img src="{!! asset('image').'/'.$show_comment->user_image  !!}" alt="">
										</figure>
									</a>
									<!-- /USER AVATAR -->
									<div class="comment">
										<p class="text-header">{{$show_comment->username}}</p>
										<!-- PIN -->
										<span class="pin greyed">Purchased</span>
										<!-- /PIN -->
										<p class="timestamp">{!! \Carbon\Carbon::parse($show_comment->created_at)->format('M d, Y') !!}</p>
										<a style="cursor: pointer;" onclick="reply_field('{{$show_comment->com_id}}')" class="report">Reply</a>
										<p>{{$show_comment->comment}}</p>
									</div>

									<div class="comment-wrap comment-reply">
									
									<?php
										$get_reply_comment = DB::table('comment_replies')
							                ->join('users', 'comment_replies.user_id', 'users.id')
							                ->leftJoin('userinfos', 'comment_replies.user_id', 'userinfos.user_id')
							                ->where('comment_replies.com_id', $show_comment->com_id)
							                ->select('comment_replies.*', 'users.username','userinfos.user_image')->get();
									?>
									@if($get_reply_comment)
										@foreach($get_reply_comment as $show_reply)
											<div class="comment">
												<!-- USER AVATAR -->
												<a href="user-profile.html">
													<figure class="user-avatar medium user">
														<img src="{!! asset('image').'/'.$show_reply->user_image  !!}" alt="">
													</figure>
												</a>
												<div style="margin-left: 60px;">
													<!-- /USER AVATAR -->
													<p class="text-header">{{($show_reply->user_id == $get_theme_detail->user_id) ? 'AUTHOR' : 'PURCHASED'}}</p>
													<!-- PIN -->
													<span class="pin greyed">Purchased</span>
													
													<a class="report">{{ \Carbon\Carbon::parse($show_reply->created_at)->format('M d, Y') }}</a>
													<p>{{$show_reply->reply_msg}}</p>
												</div>
											</div>
										@endforeach
									@endif
										<!-- COMMENT REPLY FORM -->
										<form method="post" action="{{route('comment_reply',$show_comment->com_id)}}" id="reply_form{{$show_comment->com_id}}" class="comment-reply-form">
											
										</form>
										<!-- /COMMENT REPLY FORM -->
									</div>
									<!-- /COMMENT REPLY -->

								</div>
								<hr class="line-separator">
							@endforeach
								<div id="show_comment"></div>
								
								@if(count($get_theme_comment)>4)
								<hr class="line-separator">
								<!-- PAGER -->
								<div class="pager tertiary" style="text-align: center;">
                                    <a href="{{url()->current()}}/comments" style="background: #559de7;display: block;padding: 10px;color:#fff;" class="secondary wfav">See all comments</a>
								</div>
								<!-- /PAGER -->
								@endif
								<div class="clearfix"></div>

								<h3>Leave a Comment</h3>

								<!-- COMMENT REPLY -->
								<div class="comment-wrap comment-reply">
									<!-- USER AVATAR -->
									<a href="user-profile.html">
										<figure class="user-avatar medium user">
											<img src="{!!  asset('allscript') !!}/images/avatars/avatar_09.jpg" alt="">
										</figure>
									</a>
									<!-- /USER AVATAR -->

									<!-- COMMENT REPLY FORM -->
									<form action="{{route('comment_insert')}}" id="comment" class="comment-reply-form" method="get">
										<input type="hidden" value="{{$get_theme_detail->theme_id}}" name="theme_id">
										<textarea id="comment" style="height: 100px" name="comment" placeholder="Write your comment here..."></textarea>
										<button type="submit"  class="button tertiary">Post Comment</button>
									</form>
									<!-- /COMMENT REPLY FORM -->
								</div>
								<!-- /COMMENT REPLY -->
						</div>
						<!-- /COMMENTS -->
					</div>

				</div>
				<!-- /POST TAB -->
				<br/>
				<?php
					$get_another_theme = DB::table('themes')
					->join('users', 'themes.user_id', 'users.id')
					->leftJoin('userinfos', 'themes.user_id', 'userinfos.user_id')
					->select('themes.theme_name', 'themes.theme_id', 'themes.main_image', 'themes.theme_url', 'themes.theme_name', 'themes.search_tag','themes.price_regular', 'users.username', 'userinfos.user_image')
					->where('themes.user_id', $get_theme_detail->user_id)->limit(6)->get();
				?>
				@if(count($get_another_theme)>0)
					<div class="headline tertiary">
						<h4>Related Courses</h4>
					</div>
					<div class="product-list grid column4-wrap">

							@foreach( $get_another_theme as $another_theme)
							<div class="product-item column">
								<!-- PRODUCT PREVIEW ACTIONS -->
								<div class="product-preview-actions">
									<!-- PRODUCT PREVIEW IMAGE -->
									<figure class="product-preview-image">
										<img src="{!! asset('theme/images/'.$another_theme->main_image) !!}" alt="theme-image">
									</figure>
									<!-- /PRODUCT PREVIEW IMAGE -->

									<!-- PREVIEW ACTIONS -->
									<div class="preview-actions">
										<!-- PREVIEW ACTION -->
										<div class="preview-action">
											<a href="{!! url('themeplace/item/'.$another_theme->theme_url) !!}">
												<div class="circle tiny tertiary">
													<span class="icon-tag"></span>
												</div>
											</a>
											<a href="{!! url('themeplace/item/'.$another_theme->theme_url) !!}">
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
									<a href="item-v1.html">
										<p class="wrap-text">{!! $another_theme->theme_name !!}</p>
									</a>

									<p class="price"><span>$</span>{!! $another_theme->price_regular !!}</p>
								</div>
								<!-- /PRODUCT INFO -->
								<hr class="line-separator">

								<!-- USER RATING -->
								<div class="user-rating">
									<a href="author-profile.html">
										<figure class="user-avatar small">
											<img src="{!! asset('image').'/'.$another_theme->user_image  !!}" alt="user-avatar">
										</figure>
									</a>
									<a href="author-profile.html">
										<p class="text-header tiny">{!! $another_theme->username !!}</p>
									</a>

									<?php
										$theme_reviews = DB::table('theme_reviews')->where('theme_id',  $another_theme->theme_id)
						                ->select(DB::raw('count(*) as count_reviews'), DB::raw('sum(ratting_star) as sum_star'))
						                ->first();
									 ?>

									@if($theme_reviews->count_reviews>0)
										<ul class="rating tooltip tooltipstered">
											 @for($i=1; $i<=5; $i++)
											<li class="rating-item {!!  ($i<=$theme_reviews->sum_star / $theme_reviews->count_reviews) ? ' ' : 'empty'  !!}">

												<svg class="svg-star">
													<use xlink:href="#svg-star"></use>
												</svg>

											</li>
											@endfor
										</ul>
									@endif

								</div>

								<!-- /USER RATING -->
							</div>
							@endforeach

					</div>
				@endif
			</div>
			<!-- CONTENT -->


		</div>
	</div>
	<!-- /SECTION -->

@endsection

@section('js')


<!-- Tooltipster -->
<script src="{!!  asset('allscript') !!}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src="{!!  asset('allscript') !!}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{!!  asset('allscript') !!}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Tweet -->
<script src="{!!  asset('allscript') !!}/js/vendor/twitter/jquery.tweet.min.js"></script>

<!-- Liquid -->
<script src="{!!  asset('allscript') !!}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{!!  asset('allscript') !!}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{!!  asset('allscript') !!}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src="{!!  asset('allscript') !!}/js/post-tab.js"></script>
<!-- XM Accordion -->
<script src="{!!  asset('allscript') !!}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
<script src="{!!  asset('allscript') !!}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- Item V1 -->

<script src="{!!  asset('allscript') !!}/js/item-v2.js"></script>
<!-- Tooltip -->
<script src="{!!  asset('allscript') !!}/js/tooltip.js"></script>

<script>


	function add_to_cart(theme_id){
		var price = $('#price').val();

		$.ajax({
			method:'post',
			url:'{!!  URL::to("/themeplace/cart/")  !!}',
			data:{
				theme_id:theme_id,
				price:price,
				_token:"{!!  csrf_token()  !!}"
			},
			success:function(data){
				alert(data);
			}
		});

	}


//change regular & extented price
	(function($) {
	var $checkbox = $('.linked-check');

	$checkbox.on( 'click', deselectLinked );

	function deselectLinked() {
		var $this = $(this),
			selectedCheckboxID = $this.prop('for'),
			selectedCheckboxStatus = $("#"+selectedCheckboxID).prop('checked');
			showDescription(selectedCheckboxID);

			$checkbox.each(function() {
				var $this = $(this),
					checkboxID = $this.prop('for'),
					checkboxStatus = $("#"+checkboxID).prop('checked');

				if( checkboxID != selectedCheckboxID ) {
					deselect($("#"+checkboxID))
					hideDescription(checkboxID);
					changePrice('{!! $get_theme_detail->price_regular !!}');
				} else {
					changePrice('{!! $get_theme_detail->price_extented !!}');
				}
			});
	}

	function deselect(checkbox) {
		checkbox.prop('checked', false);
	}

	function showDescription(container) {
		$(".license-text[data-license='"+container+"']").slideDown();
	}

	function hideDescription(container) {
		$(".license-text[data-license='"+container+"']").slideUp();
	}

	function changePrice(price) {
		$('#cng_price').html(price);
		$('#price').val(price);
	}
})(jQuery);


</script>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

/// comment
 $(function(){
        $("#comment").submit(function(event){
            event.preventDefault();
           
            $.ajax({
                    url:'{{route("comment_insert")}}',
                    type:'GET',
                    data:$(this).serialize(),
                    success:function(result){
                        $("#show_comment").prepend(result);

                    }

            });
        });
    });


 function reply_field(id){
 	document.getElementById('reply_form'+id).innerHTML = '@csrf <textarea name="reply_msg" required placeholder="Write your comment here..."></textarea><button style="float: right;">Reply</button>';
 }






</script>









@endsection

