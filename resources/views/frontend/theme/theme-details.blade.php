@extends('frontend.layouts.master')

@section('title')
{{$get_theme_detail->theme_name}}
@endsection
@section('css')
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
					<p class="price large"><span>$</span><b id="cng_price">{{$get_theme_detail->price_regular}} </b></p>
					<hr class="line-separator">
					
				<form action="{{url('themeplace/buy')}}" method="post" id="aux_form">
					{{csrf_field()}}
					
					<input type="hidden" name="theme_id" value="{{$get_theme_detail->theme_id}}">
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
					<p class="license-text" data-license="extended-license" style="display: none;">Lorem ipsum dolor sit amet, sectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore.</p>
					<button type="submit" class="button mid dark spaced"><span class="tertiary"><span class="icon-credit-card"></span> Buy Now</span></button>
				</form>
					<input type="hidden" name="price" value="{{$get_theme_detail->price_regular}}" id="price">
					<button onclick="add_to_cart('{{$get_theme_detail->theme_id}}')" class="button mid tertiary half">Add to Cart </button>
					<button class="button mid secondary wicon half"><span class="icon-heart"></span>652</button>
					<div class="clearfix"></div>
				</div>

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio short author-badges-v1 column">
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{asset('image').'/'.$get_theme_detail->user_image }}" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header">{{$get_theme_detail->username}}</p>
					
					<p class="text-oneline">{{$get_theme_detail->user_title}}</p>

					<!-- BADGE LIST -->
					<div class="badge-list">
						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/gold_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{ asset('allscript')}}/images/badges/flags/flag_usa_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/support_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small pinned liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/member_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/hunter_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small pinned liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/appreciationist_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/rainbow_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small pinned liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/friendly_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{ asset('allscript')}}/images/badges/community/gold_s.png" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->
					</div>	
					<!-- /BADGE LIST -->
					<div class="clearfix"></div>
					<a href="{{url($get_theme_detail->username)}}" class="button mid dark spaced">Go to <span class="tertiary">Profile Page</span></a>
					<a href="#" class="button mid dark-light">Send a Private Message</a>
				</div>
				<!-- /SIDEBAR ITEM -->
				<div class="sidebar-item void buttons">
					<a href="#" class="button big dark purchase">
						<span >{{$total_sale->total_sale}} </span>
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
							<p class="text-header">Upload Date:</p>
							<p>{{ \Carbon\Carbon::parse($get_theme_detail->created_at)->format('M d, Y')}}</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Upload Date:</p>
							<p>{{ \Carbon\Carbon::parse($get_theme_detail->updated_at)->format('M d, Y')}}</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
						<!-- /Radio ITEM -->
						@foreach($get_theme_features as $get_theme_feature)
							@if($get_theme_feature->feature_type=='radio')
								<?php $get_feature_name = DB::table('theme_filters')->where('filter_id', $get_theme_feature->feature_id)->first();?>
								<div class="information-layout-item">
									<p class="text-header">{{$get_feature_name->filter_name}}:</p>
									<p>{{$get_theme_feature->feature_name}}</p>
								</div>
							@endif
						@endforeach

						<!-- /select ITEM -->
						@foreach($get_theme_features as $get_theme_feature)
							@if($get_theme_feature->feature_type=='select')
								<?php $get_feature_name = DB::table('theme_filters')->where('filter_id', $get_theme_feature->feature_id)->first();?>
								<div class="information-layout-item">
									<p class="text-header">{{$get_feature_name->filter_name}}:</p>
									<p>{{$get_theme_feature->feature_name}}</p>
								</div>
							@endif
						@endforeach

						<!-- /dropdown ITEM -->
						@foreach($get_theme_features as $get_theme_feature)
							@if($get_theme_feature->feature_type=='dropdown')
								<?php $get_feature_name = DB::table('theme_filters')->where('filter_id', $get_theme_feature->feature_id)->first();?>
								<div class="information-layout-item">
									<p class="text-header">{{$get_feature_name->filter_name}}:</p>
									<p>{{$get_theme_feature->feature_name}}</p>
								</div>
							@endif
						@endforeach

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="tags tertiary" style="border:none;">
								<?php $tag_array = explode(',', $get_theme_detail->search_tag); ?>
								@foreach($tag_array as $tag)
									<a href="{{url('tags/'.$tag)}}">{{$tag}}</a>,
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
					<p><a href="/">Marketplace</a> <span class="icon-arrow-right small"></span> <a href="/">Files</a> <span class="icon-arrow-right small"></span> <a href="/">WordPress</a> <span class="icon-arrow-right small"></span> <a href="/">Blog / Magazine</a> <span class="icon-arrow-right small"></span> <a href="/">News / Editorial</a></p><br/>
					<h3 class="sidebar-2">{{$get_theme_detail->theme_name}}</h3>
					
					
				</div>
				<!-- POST -->
				<article class="post">
					<!-- POST IMAGE SLIDES -->
					<div class="post-image">
						<figure class="product-preview-image large liquid">
							<img src="{{ asset('theme/images/'.$get_theme_detail->main_image)}}" alt="">
						</figure>
						<!-- SLIDE CONTROLS -->
						<div class="slide-control-wrap">
							<div class="slide-control rounded left">
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</div>

							<div class="slide-control rounded right">
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</div>
						</div>
						
					</div>
					<div class="post-image-slides">
						<!-- IMAGE SLIDES WRAP -->
						<div class="image-slides-wrap full">
							<!-- IMAGE SLIDES -->
							<div class="image-slides" data-slide-visible-full="8" 
													  data-slide-visible-small="2"
													  data-slide-count="9">
								<!-- IMAGE SLIDE -->
								<div class="image-slide selected">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{ asset('theme/images/'.$get_theme_detail->main_image)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
								@foreach($theme_additiona_images as $theme_additiona_image)
									<!-- IMAGE SLIDE -->
									<div class="image-slide">
										<div class="overlay"></div>
										<figure class="product-preview-image thumbnail liquid">
											<img src="{{ asset('theme/images/'.$theme_additiona_image->theme_additiona_img)}}" alt="">
										</figure>
									</div>
									<!-- /IMAGE SLIDE -->
								@endforeach
								
							</div>
							<!-- IMAGE SLIDES -->
						</div>
						<!-- IMAGE SLIDES WRAP -->
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

								<span class="feedback">&#9733; {{$total_ratting / $total_review}} </span> ({{$total_review}})

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
									{{$get_theme_detail->description}}
								</p>
								</div>
								<!-- /POST PARAGRAPH -->
							
								<hr class="line-separator">
								<!-- /POST PARAGRAPH -->
								<div class="share-links-wrap">
									<p class="text-header small">Share this:</p>
									<!-- SHARE LINKS -->
									<ul class="share-links hoverable">
										<li><a href="#" class="fb"></a></li>
										<li><a href="#" class="twt"></a></li>
										<li><a href="#" class="db"></a></li>
										<li><a href="#" class="rss"></a></li>
										<li><a href="#" class="gplus"></a></li>
									</ul>
									<!-- /SHARE LINKS -->
								</div>
							</div>
					
							<!-- /COMMENT REPLY -->
						</div>
						<!-- /COMMENTS -->
					</div>
					<!-- /TAB CONTENT -->

					<!-- TAB CONTENT -->
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							@foreach($get_theme_reviews as $get_theme_review)
							<!-- COMMENT -->
							<div class="comment-wrap" style="padding: 10px 0px 10px !important;">
								
								<div class="comment" style="margin-bottom: 0px;">
									<p class="text-header">{{$get_theme_review->username}}</p>
									<!-- PIN -->
									<span class="pin greyed">Purchased</span>
									<!-- /PIN -->
									<p class="timestamp"><span class="feedback">&#9733; {{$get_theme_review->ratting_star}} </span> For {{$get_theme_review->ratting_reason}}</p>
									<a href="#" class="report">{{Carbon\Carbon::parse($get_theme_review->created_at)->format('d M, Y')}}</a>
									<p>{{$get_theme_review->ratting_comment}}</p>
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
						<div class="comment-list">
							<!-- COMMENT -->
							<div class="comment-list">
							<!-- COMMENT -->
							<div class="comment-wrap">
								<!-- USER AVATAR -->
								<a href="user-profile.html">
									<figure class="user-avatar medium">
										<img src="{{ asset('allscript')}}/images/avatars/avatar_06.jpg" alt="">
									</figure>
								</a>
								<!-- /USER AVATAR -->
								<div class="comment">
									<p class="text-header">View as Customer</p>
									<!-- PIN -->
									<span class="pin greyed">Purchased</span>
									<!-- /PIN -->
									<p class="timestamp">5 Hours Ago</p>
									<a href="#" class="report">Report</a>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								</div>
							</div>
							<!-- /COMMENT -->

							<!-- LINE SEPARATOR -->
							<hr class="line-separator">
							<!-- /LINE SEPARATOR -->

							<!-- COMMENT -->
							<div class="comment-wrap">
								<!-- USER AVATAR -->
								<a href="user-profile.html">
									<figure class="user-avatar medium">
										<img src="{{ asset('allscript')}}/images/avatars/avatar_11.jpg" alt="">
									</figure>
								</a>
								<!-- /USER AVATAR -->
								<div class="comment">
									<p class="text-header">View as Author (Reply Option)</p>
									<p class="timestamp">8 Hours Ago</p>
									<a href="#" class="report">Report</a>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								</div>
							</div>
							<!-- /COMMENT -->

							<!-- COMMENT REPLY -->
							<div class="comment-wrap comment-reply">
								<!-- USER AVATAR -->
								<a href="user-profile.html">
									<figure class="user-avatar medium">
										<img src="{{ asset('allscript')}}/images/avatars/avatar_09.jpg" alt="">
									</figure>
								</a>
								<!-- /USER AVATAR -->

								<!-- COMMENT REPLY FORM -->
								<form class="comment-reply-form">
									<textarea name="treply1" placeholder="Write your comment here..."></textarea>
									<!-- CHECKBOX -->
									<input type="checkbox" id="notif1" name="notif1" checked="">
									<label for="notif1">
										<span class="checkbox tertiary"><span></span></span>
										Receive email notifications
									</label>
									<!-- /CHECKBOX -->
									<button class="button tertiary">Post Comment</button>
								</form>
								<!-- /COMMENT REPLY FORM -->
							</div>
							<!-- /COMMENT REPLY -->

							<!-- LINE SEPARATOR -->
							<hr class="line-separator">
							<!-- /LINE SEPARATOR -->

							<!-- PAGER -->
							<div class="pager tertiary">
								<div class="pager-item"><p>1</p></div>
								<div class="pager-item active"><p>2</p></div>
								<div class="pager-item"><p>3</p></div>
								<div class="pager-item"><p>...</p></div>
								<div class="pager-item"><p>17</p></div>
							</div>
							<!-- /PAGER -->

							<div class="clearfix"></div>

							<!-- LINE SEPARATOR -->
							<hr class="line-separator">
							<!-- /LINE SEPARATOR -->

							<h3>Leave a Comment</h3>

							<!-- COMMENT REPLY -->
							<div class="comment-wrap comment-reply">
								<!-- USER AVATAR -->
								<a href="user-profile.html">
									<figure class="user-avatar medium">
										<img src="{{ asset('allscript')}}/images/avatars/avatar_09.jpg" alt="">
									</figure>
								</a>
								<!-- /USER AVATAR -->

								<!-- COMMENT REPLY FORM -->
								<form class="comment-reply-form">
									<textarea name="treply1" placeholder="Write your comment here..."></textarea>
									<button class="button tertiary">Post Comment</button>
								</form>
								<!-- /COMMENT REPLY FORM -->
							</div>
							<!-- /COMMENT REPLY -->
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
										<img src="{{asset('theme/images/'.$another_theme->main_image)}}" alt="theme-image">
									</figure>
									<!-- /PRODUCT PREVIEW IMAGE -->

									<!-- PREVIEW ACTIONS -->
									<div class="preview-actions">
										<!-- PREVIEW ACTION -->
										<div class="preview-action">
											<a href="{{url('themeplace/item/'.$another_theme->theme_url)}}">
												<div class="circle tiny tertiary">
													<span class="icon-tag"></span>
												</div>
											</a>
											<a href="{{url('themeplace/item/'.$another_theme->theme_url)}}">
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
										<p class="wrap-text">{{$another_theme->theme_name}}</p>
									</a>
								
									<p class="price"><span>$</span>{{$another_theme->price_regular}}</p>
								</div>
								<!-- /PRODUCT INFO -->
								<hr class="line-separator">

								<!-- USER RATING -->
								<div class="user-rating">
									<a href="author-profile.html">
										<figure class="user-avatar small">
											<img src="{{asset('image').'/'.$another_theme->user_image }}" alt="user-avatar">
										</figure>
									</a>
									<a href="author-profile.html">
										<p class="text-header tiny">{{$another_theme->username}}</p>
									</a>

									<?php
										$theme_reviews = DB::table('theme_reviews')->where('theme_id',  $another_theme->theme_id)
						                ->select(DB::raw('count(*) as count_reviews'), DB::raw('sum(ratting_star) as sum_star'))
						                ->first();
									 ?>

									@if($theme_reviews->count_reviews>0)
										<ul class="rating tooltip tooltipstered">
											 @for($i=1; $i<=5; $i++)
											<li class="rating-item {{ ($i<=$theme_reviews->sum_star / $theme_reviews->count_reviews) ? ' ' : 'empty' }}">
												
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
<script src="{{ asset('allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src="{{ asset('allscript')}}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Tweet -->
<script src="{{ asset('allscript')}}/js/vendor/twitter/jquery.tweet.min.js"></script>
<!-- Side Menu -->
<script src="{{ asset('allscript')}}/js/side-menu.js"></script>
<!-- Liquid -->
<script src="{{ asset('allscript')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{ asset('allscript')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{ asset('allscript')}}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src="{{ asset('allscript')}}/js/post-tab.js"></script>
<!-- XM Accordion -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- Item V1 -->

<script src="{{ asset('allscript')}}/js/item-v2.js"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript')}}/js/tooltip.js"></script>

<script>
	
	
	function add_to_cart(theme_id){
		var price = $('#price').val();

		$.ajax({
			method:'post',
			url:'{{ URL::to("/themeplace/cart/") }}',
			data:{
				theme_id:theme_id,
				price:price,
				_token:"{{ csrf_token() }}"
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
					changePrice('{{$get_theme_detail->price_regular}}');
				} else {
					changePrice('{{$get_theme_detail->price_extented}}');
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


@endsection

