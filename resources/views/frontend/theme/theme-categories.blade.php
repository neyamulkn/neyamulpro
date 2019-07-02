@extends('frontend.layouts.master')

@section('title', 'theme' )

@section('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/gig/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/tooltipster.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/jquery.range.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">

@endsection
<style type="text/css">
	label:last-child {
    text-align: initial !important;
}
.prodlist-i-txt{height: 105px;
    overflow: hidden;}
</style>
@section('menu')
	@include('frontend.layouts.theme-menu')
@endsection

@section('content')

	<div class="banner-wrap">
		<section class="banner banner-v2">
			<h5>WordPress themes, web templates and more. Brought to you by the largest global community of creatives.</h5>
			<h1><span>44,454 WordPress Themes & Templates</span></h1>

			<form class="search-widget-form">
				<input type="text" name="category_name" placeholder="Search goods or services here...">
				<label for="categories" class="select-block">
					<select name="categories" id="categories">
						<option value="0">All Categories</option>
						<option value="1">PSD Templates</option>
						<option value="2">Hero Images</option>
						<option value="3">Shopify</option>
						<option value="4">Icon Packs</option>
						<option value="5">Graphics</option>
						<option value="6">Flyers</option>
						<option value="7">Backgrounds</option>
						<option value="8">Social Covers</option>
					</select>
					<!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</label>
				<button class="button medium tertiary">Search Now!</button>
			</form>
		</section>
	</div>
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- CONTENT -->
			<div class="content">
				<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>12.580 Products Found</h4>
					<form id="shop_filter_form" name="shop_filter_form">
						<label for="price_filter" class="select-block">
							<select name="price_filter" id="price_filter">
								<option value="0">Price (High to Low)</option>
								<option value="1">Price (Low to High)</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
						<label for="itemspp_filter" class="select-block">
							<select name="itemspp_filter" id="itemspp_filter">
								<option value="0">12 Items Per Page</option>
								<option value="1">6 Items Per Page</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</form>
					<div class="clearfix"></div>
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">

						@foreach($get_theme_info as $show_theme_info)
							<!-- THEME ITEM -->
							<div class="theme1">
								<div class="theme2">
									<a href="#" class="Template">
										<img class="themeimg" src="{{asset('theme/images').'/'.$show_theme_info->main_image }}" >
									</a>
									<div class="author-data v2">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="#">
												<figure class="user-avatar small">
													<img src="{{ asset('allscript')}}/images/avatars/avatar_01.jpg" alt="user-avatar">
												</figure>
											</a>
											<a class="user-rating v4" href="{{url('themeplace/item/'.$show_theme_info->theme_url.'/'.$show_theme_info->theme_id)}}">
												<p class="text-header tiny">{{$show_theme_info->name}}</p>
											</a>
										</div>
										<!-- /USER RATING -->

										<!-- METADATA -->
										<div class="metadata">
											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-bubble"></span>
												<p>12</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>210</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-heart"></span>
												<p>105</p>
											</div>
											<!-- /META ITEM -->
										</div>
										<!-- /METADATA -->
									</div>
								</div>
								<div class="theme3">
									<div class="themett">
										<a href="{{url('themeplace/item/'.$show_theme_info->theme_url.'/'.$show_theme_info->theme_id)}}">{{$show_theme_info->theme_name}}</a>
									</div>
									<a href="shop-gridview-v1.html">
										<p class="category tertiary v2">{{$show_theme_info->search_tag}}</p>
									</a>
									<p class="prodlist-i-txt">
										{{$show_theme_info->summary}}
									</p>
									<div class="bottomtheme">
										<p class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</p>
										<a href="{{url('item/'.$show_theme_info->demo_url.'/'.$show_theme_info->id)}}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">
										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')" class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i></span></a>
									</div>
								</div>
								<div class="theme4">
									<ul >
										<li class="prodlist-i-props"><b>Exterior</b> Silt Pocket</li>
										<li class="prodlist-i-props"><b>Material</b> PU</li>
										<li class="prodlist-i-props"><b>Occasion</b> Versatile</li>
										<li class="prodlist-i-props"><b>Shape</b> Casual Tote</li>
										<li class="prodlist-i-props"><b>Pattern Type</b> Solid</li>
										<li class="prodlist-i-props"><b>Style</b> American Style</li>
										<li class="prodlist-i-props"><b>Hardness</b> Soft</li>
										<li class="prodlist-i-props"><b>Decoration</b> None</li>
									</ul>
								</div>
							</div>
						@endforeach

					</div>
				</div>
				<!-- /PRODUCT SHOWCASE -->

				<div class="clearfix"></div>

				
			</div>
			<!-- CONTENT -->

			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect tertiary">
					<li class="dropdown-item">
						<a href="#">Digital Graphics</a>
					</li>
					<li class="dropdown-item active">
						<a href="#">Illustration</a>
					</li>
					<li class="dropdown-item">
						<a href="#">Web Design</a>
					</li>
					<li class="dropdown-item">
						<a href="#">Stock Photography</a>
					</li>
					<li class="dropdown-item">
						<a href="#">Code and Plugins</a>
					</li>
				</ul>
				<!-- /DROPDOWN -->

				<!-- SIDEBAR ITEM -->
				
				<div class="sidebar-item">
					<h4>Tags</h4>
					<hr class="line-separator">
					<form id="shop_search_form" name="shop_search_form">
					<input id="token" type="hidden" name="_token" value="{{csrf_token() }}" />
						<!-- CHECKBOX -->
					
						@foreach($theme_subchild_category as $show_theme_subchild_category)
							<input type="checkbox" id="{{$show_theme_subchild_category->id }}" value="{{$show_theme_subchild_category->id }}" class="common_selector metadata" name="filter1">
							<label for="{{$show_theme_subchild_category->id }}">
								<span class="checkbox tertiary"><span></span></span>
								{{$show_theme_subchild_category->subchild_category_name}}
								<span class="quantity">3</span>
							</label>
							@endforeach

						<!-- /CHECKBOX -->
					</form>
				</div>
				
				<!-- /SIDEBAR ITEM -->
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item">
					<h4>File Types</h4>
					<hr class="line-separator">

					@foreach($theme_filters as $theme_filter)
						<!-- CHECKBOX -->
						<input type="checkbox" id="ft1" name="ft1" form="shop_search_form">
						<label for="ft1">
							<span class="checkbox tertiary"><span></span></span>
						{{$theme_filter->filter_name}}
							<span class="quantity">72</span>
						</label>
					<!-- /CHECKBOX -->
					@endforeach
				
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item range-feature">
					<h4>Price Range</h4>
					<hr class="line-separator spaced">
					<input type="hidden" class="price-range-slider tertiary" value="500" form="shop_search_form">
					<button form="shop_search_form" class="button mid tertiary">Update your Search</button>
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->
		</div>
	</div>
	<!-- /SECTION -->
@endsection

@section('js')

	<!-- Tooltipster -->
<script src="{{ asset('allscript/js/vendor/jquery.tooltipster.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/jquery.range.min.js') }}"></script>
<!-- Tweet -->
<script src="{{ asset('allscript/js/vendor/twitter/jquery.tweet.min.js') }}"></script>
<!-- Side Menu -->
<script src="{{ asset('allscript/js/side-menu.js') }}"></script>


<script src="{{ asset('allscript/js/shop3.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript/js/tooltip.js') }}"></script>
<script type="text/javascript">
	
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
</script>

@endsection


