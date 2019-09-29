@extends('frontend.layouts.master')

@section('title', (isset($_GET['keyword'])) ? $_GET['keyword'] : $get_subcategory_id->subcategory_name .' – '. $get_category_id->category_name  .' – '. Request::segment(1) . ' – HOTLancer' )

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
 .search-widget-form {
    width: 91%;
    margin: 15px auto 0;
}

.search_bar{
	position: absolute;
    top: 46px;
    left: 95px;
    margin: 0px auto;
    width: 72%;
    border:1px solid #ccc;
    border-top: none;
    background: #fafafa;
    z-index: 999;
    display: none;

}
.search_bar li{
	padding: 10px;	
	display: block;
}
.search_bar li a{
	display: block;
}
.search_bar li:hover{
	
	background-color: #fff;
}


</style>
@section('menu')
	@include('frontend.layouts.theme-menu')
@endsection

@section('content')

	<div style="position: relative; width: 100%;" onmousedown="search_bar_hide()">
		@if(isset($_GET['keyword']))
			<form action="{{ route('theme_search') }}" style="width: 86%;" class="search-widget-form" >
				<input type="text" style="width: 64%;" value="{{$_GET['keyword']}}" required="" onkeyup="search_bar(this.value)" name="keyword" placeholder="Search goods or services here...">
				<label for="cat" class="select-block">
					<select name="cat" id="cat">
						<option value="">All Categories</option>
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
				<button class="button medium primary">Search Now!</button>
			</form>

			@else
			<form action=""  class="search-widget-form"  style="width: 86%;" >
				<input type="text"  onmousedown="search_bar(this.value)" onkeyup="search_bar(this.value)" style="width: 85%;" value="{{(isset($_GET['item']) ? $_GET['item'] : '' )}}" name="item" placeholder="Search goods or services here...">
				
				<button class="button medium tertiary">Search Now!</button>
			</form>
			@endif

		<div class="search_bar" id="search_bar" >
			<ul>
				<span id="show_suggest_key"></span>
			</ul>
		</div>
	</div>
	<!-- SECTION -->
	<div class="section-wrap" onmousedown="search_bar_hide()">
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
											<a class="user-rating v4" href="{{url('themeplace/'.$show_theme_info->theme_url)}}">
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
										<a href="{{url('themeplace/'.$show_theme_info->theme_url)}}">{{$show_theme_info->theme_name}}</a>
									</div>
									<a href="shop-gridview-v1.html">
										<p class="category tertiary v2">{{$show_theme_info->category_name}} / {{$show_theme_info->subcategory_name}}</p>
									</a>
									<p class="prodlist-i-txt">
										{{$show_theme_info->summary}}
									</p>
									<div class="bottomtheme">
										<p class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</p>
										<a href="{{url('themeplace/'.$show_theme_info->theme_url)}}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">
										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')" class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i></span></a>
									</div>
								</div>
								<div class="theme4">
									<ul >
										<li class="prodlist-i-props"><b>Update</b> {!! Carbon\Carbon::parse($show_theme_info->updated_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Sale </b> count</li>
										<li class="prodlist-i-props"><b>Review</b> count</li>
										<li class="prodlist-i-props"><b>Comment</b> count</li>
										<li class="prodlist-i-props"><b>Favourite </b> count</li>
										<li class="prodlist-i-props"><b>Author </b> count</li>
									
										<li class="prodlist-i-props"><b>Ex. License</b> None</li>
									</ul>
								</div>
							</div>
						@endforeach

					</div>
					<div class="page primary paginations">
	                   {{$get_theme_info->links()}}
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

	function search_bar(src_key){
		
				// var search = $(this).val();
				// var action = $('#action').val();
				
				$.ajax({
					method:'post',
					url:'{{ route('suggest_keyword') }}',
					data:{src_key:src_key, _token: '{{csrf_token()}}'},
					datatype: "text",
					success:function(data){
						if(data !=null){
							
							document.getElementById('search_bar').style.display = 'block';
							document.getElementById('show_suggest_key').innerHTML = data;
						}else{
							
							document.getElementById('search_bar').style.display = 'none';
							
						}
					}
				});
			
		
	}

function search_bar_hide(){
	document.getElementById('search_bar').style.display = 'none';
}


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


