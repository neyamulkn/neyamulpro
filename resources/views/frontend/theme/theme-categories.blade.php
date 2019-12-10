@extends('frontend.layouts.master')

@section('title', (isset($_GET['item'])) ? $_GET['item'] : Request::segment(3) .' – '. Request::segment(2)  .' – '. Request::segment(1) . ' – HOTLancer' )

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

#loading
{
	text-align:center; 
	background: url('{{ asset("image/loading.gif")}}') no-repeat center; 
	height: 350px;
}



</style>


@section('content')

	<div style="position: relative; width: 100%;" >
		@if(Request::segment(2)== 'search')
			<form action="{{ route('theme_search') }}" style="width: 86%;" class="search-widget-form" >
				<input type="text" style="width: 64%;" value="{{$_GET['item']}}" required="" onkeyup="search_bar(this.value)" autocomplete="off" class="item" id="item" name="item" placeholder="Search goods or services here...">
				<label for="cat" class="select-block">
					<select name="cat" id="cat">
						<option  value="">All Categories</option>
						@foreach($theme_category as $show_category)

							<option selected="{{(isset($_GET['cat']) && $_GET['cat'] == $show_category->category_url)? 'selected' : ''}}" value="{{$show_category->category_url}}">{{$show_category->category_name}}</option>
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

			@else
			<form action=""  class="search-widget-form"  style="width: 86%;" >
				<input type="text" autocomplete="off" onkeyup="search_bar(this.value)" style="width: 85%;" value="{{(isset($_GET['item']) ? $_GET['item'] : '' )}}" name="item" id="item" placeholder="Search goods or services here...">
				
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
	<div class="section-wrap">
		<div class="section">
			<!-- CONTENT -->
			<div class="content filter_data">
				<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>{{$get_theme_info->total()}} Products Found</h4>
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
									<a href="{{ route('theme_detail', $show_theme_info->theme_url) }}" class="Template">
										<img class="themeimg" src="{{asset('theme/images').'/'.$show_theme_info->main_image }}" >
									</a>
									<div class="author-data v2">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<figure class="user-avatar small">
													<img src="<?php echo asset('/image/'.$show_theme_info->user_image); ?>" alt="user-avatar">
												</figure>
											</a>
											<a class="user-rating v4" href="{{ route('profile_view', [$show_theme_info->username]) }}">
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
										<a href="{{ route('theme_detail',$show_theme_info->theme_url) }}">{{$show_theme_info->theme_name}}</a>
									</div>
									<a>
										<p class="category tertiary v2">{{$show_theme_info->category_name}} / {{$show_theme_info->subcategory_name}}</p>
									</a>
									<p class="prodlist-i-txt">
										{{$show_theme_info->summary}}
									</p>
									<div class="bottomtheme">
										<p class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</p>
										<a href="{{ route('theme_detail',$show_theme_info->theme_url) }}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">
										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')" class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i>
										</a>
									</div>
								</div>
								<div class="theme4">
									<ul >
										<li class="prodlist-i-props"><b>Update</b> {!! Carbon\Carbon::parse($show_theme_info->updated_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Sale </b><?php echo DB::table('theme_orders')->where('theme_id',  $show_theme_info->theme_id)->count(); ?></li>
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
					@foreach($get_theme_info as $show_theme_info)
					<li class="dropdown-item">
						<a href="#">Digital Graphics sdf</a>
					</li>
					@endforeach
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
							<input type="checkbox" id="tag{{$show_theme_subchild_category->id }}" value="{{$show_theme_subchild_category->id }}" class="common_selector platform" name="filter1">
							<label for="tag{{$show_theme_subchild_category->id }}">
								<span class="checkbox primary "><span></span></span>
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
					
						<input type="checkbox" id="{{$theme_filter->filter_id }}" value="{{$theme_filter->filter_id }}" class="common_selector filter_type" name="filter1">
							<label for="{{$theme_filter->filter_id }}">
								<span class="checkbox primary primary"><span></span></span>
								{{$theme_filter->filter_name }}
								<span class="quantity">3</span>
							</label>
					<!-- /CHECKBOX -->
					@endforeach
				
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item range-feature">
					<h4>Price Range</h4>
					<hr class="line-separator spaced">
					<input type="hidden" id="price-range"  class="price-range-slider tertiary" value="1000" form="shop_search_form">
					<a form="shop_search_form" id="price_btn" class="button mid tertiary common_selector">Update your Search</a>
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


<script src="{{ asset('allscript/js/shop3.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript/js/tooltip.js') }}"></script>
<script type="text/javascript">

 
$(document).ready(function(){


	$(document).on('click', '.pagination a', function(e){
	e.preventDefault();

		var page = $(this).attr('href').split('page=')[1];

		filter_data(page);
	});


	function filter_data(page)
    {
    	$('.filter_data').html('<div id="loading" style="" ></div>');
        var tags = get_filter('platform');
        var filter_type = get_filter('filter_type');
        var price = document.getElementById('price-range').value;
        if(page == null){var page = 1;}
        //var delivery = get_filter('delivery');
		// var gig_sort = ($( "#gig_asc option:selected" ).val());
		var category = "{{ Request::route('category') }}" ;
		var subcategory = "{{ Request::route('subcategory') }}";
		var src_item = "{{Request::input('item')}}";
       	var  link = '<?php echo URL::to("themeplace/category");?>/'+category+'/'+subcategory+'?item='+src_item+'&tags='+tags+'&filter_type='+filter_type+'&page='+page+'&price='+price;
		    history.pushState({id: 'Marketplace'}, category +' '+subcategory, link);

 		$.ajax({
            url:link,
            method:"get",
            data:{
				tags:tags,
				category:category,
				subcategory:subcategory,
				filter:'filter',
				price:price,
				//delivery:delivery,
				
			},
            success:function(data){
            	if(data){
                	$('.filter_data').html(data);
               }else{
               		$('.filter_data').html('Not Found');
               }
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
    $('.common_selector').click(function(){
		filter_data();
    });

    $('#gig_asc').on('change', function(){
		filter_data();
 	});

 	$('.common_selector').click(function(){
		filter_data();
    });


});



function search_bar(src_key){
		if(src_key != ''){
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
		}else{
			document.getElementById('search_bar').style.display = 'none';
		}
	}

	function search_field(src){
	 	document.getElementById('item').value = src;
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
				toastr.success(data);
			}
		});
		
	}
</script>

@endsection


