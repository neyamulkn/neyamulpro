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
.author-mobile{
	display: none;
}

@media screen and (max-width: 900px)  {
	.author-mobile{
		display: block !important;
	}
	a.user-rating.v1{padding-left: 0px !important;}

}


.prodlist-i-txt{height: 105px;
    overflow: hidden;}
 .search-widget-form {
    width: 86%;
    margin: 15px auto 0;
    overflow: initial !important;
}

.search_bar{
	position: absolute;
    top: 50px;
    left: 15px;
    margin: 0px auto;
    border:1px solid #ccc;
    border-top: none;
    background: #fafafa;
    z-index: 999;
    display: none;
}
.search_bar li{

	display: block;
}
.search_bar li a{
	display: block;padding: 10px;	
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

	
	
	<form action="{{ route('theme_search') }}"  class="search-widget-form" >
		<div class="row">
			<div class="col-xs-10 col-md-11" style="position: relative;">
					
				<input type="text" value="{{$_GET['item']}}" required="" onkeyup="search_bar(this.value)" autocomplete="off" class="item" id="item" name="item" placeholder="Search goods or services here...">
				<label for="cat" class="select-block">
					<select name="cat" id="cat">
						<option  value="">All Categories</option>
						@foreach($all_category as $show_category)

							<option {{(isset($_GET['cat']) && $_GET['cat'] == $show_category->category_url)? 'selected' : ''}} value="{{$show_category->category_url}}">{{$show_category->category_name}}</option>
						@endforeach
					</select>
					<!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</label>
				<div class="search_bar" id="search_bar" >
					<ul>
						<span id="show_suggest_key"></span>
					</ul>
				</div>
			</div>
			<div class="col-xs-2 col-md-1">
				<button class="button medium tertiary">Search</button>
			</div>
		</div>
	</form>
			
	</div>
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">

			<!-- SIDEBAR -->
			<div class="sidebar left">
				@if($theme_category)
				<ul class="dropdown hover-effect tertiary">
					<li class="dropdown-item @if(!Request::get('cat')) active @endif">
						<a href="{{ route('theme_search') .(isset($_GET['item']) ? '?item='.$_GET['item'] : '') }}">All Categories</a>
					</li>
					@foreach($theme_category as $category)
					<li class="dropdown-item {{($category->category_url == Request::get('cat')) ? 'active' : ''}}">
						<a href="{{ route('theme_search') .(isset($_GET['item']) ? '?item='.$_GET['item'] : ''). '&cat='.$category->category_url }}">{{$category->category_name}}</a>
					</li>
					@endforeach
				</ul>
				@endif
				<!-- SIDEBAR ITEM -->
				@if($theme_subchild_category)
				<div class="sidebar-item">
					<h4>Tags</h4>
					<hr class="line-separator">
					<form id="shop_search_form" name="shop_search_form">
					<input id="token" type="hidden" name="_token" value="{{csrf_token() }}" />
						<!-- CHECKBOX -->
					
						@foreach($theme_subchild_category as $subchild_category)
							<input type="checkbox" @if (in_array(109 , explode(',', Request::get('tags')) )) checked @endif id="tag{{$subchild_category->id }}" value="{{$subchild_category->id }}" class="common_selector platform" name="filter1">
							<label for="tag{{$subchild_category->id }}">
								<span class="checkbox primary "><span></span></span>
								{{$subchild_category->subchild_category_name}}
								<span class="quantity">{{$subchild_category->totalTheme}}</span>
							</label>
						@endforeach

						<!-- /CHECKBOX -->
					</form>
				</div>
				@endif
				
				<!-- /SIDEBAR ITEM -->
				<!-- SIDEBAR ITEM -->
				@if($get_filters)
				@foreach($get_filters as $get_filter)


				<div class="sidebar-item">
					<h4>{{$get_filter->filter_name}}</h4>
					<hr class="line-separator">
					<form id="shop_search_form" name="shop_search_form">
					<input id="token" type="hidden" name="_token" value="{{csrf_token() }}" />
						<!-- CHECKBOX -->
					<?php $theme_subfilters = DB::table('theme_subfilters')
						->join('theme_features', 'theme_subfilters.id', '=', 'theme_features.feature_name')
						->where('theme_features.feature_id', $get_filter->filter_id)
						->select(
							'theme_subfilters.*',
							 DB::raw("count('theme_features.feature_name') AS totalTheme" ))
						->groupBy('theme_features.feature_name')
						->get(); ?>
						@foreach($theme_subfilters as $theme_subfilter)
							<input type="checkbox" id="{{$theme_subfilter->id }}" value="{{$theme_subfilter->id }}" class="common_selector theme_subfilter" name="filter1">
							<label for="{{$theme_subfilter->id }}">
								<span class="checkbox primary primary"><span></span></span>
								{{$theme_subfilter->sub_filtername }}
								<span class="quantity">{{$theme_subfilter->totalTheme }}</span>
							</label>
							@endforeach

						<!-- /CHECKBOX -->
					</form>
				</div>
				@endforeach
				@endif
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item range-feature">
					<h4>Price Range</h4>
					<hr class="line-separator spaced">
					<input type="hidden" id="price-range"  class="price-range-slider tertiary" value="@if(Request::get('price')) {{Request::get('price')}} @else 700 @endif" form="shop_search_form">
					<a form="shop_search_form" id="price_btn" class="button mid tertiary common_selector">Search</a>
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->
			<!-- CONTENT -->
			<div class="content filter_data right">
				<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>{{$get_theme_info->total()}} Products Found</h4>
					<form id="shop_filter_form" name="shop_filter_form">
						<label for="price_sort" class="select-block">
							<select name="price_sort"  id="price_sort">
								<option value="ASC" >Price (Low to High)</option>
								<option value="DESC">Price (High to Low)</option>
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
					<div class="product-list grid ">

						@foreach($get_theme_info as $show_theme_info)
							<!-- THEME ITEM -->
							<div class="theme1">
								<div class="theme2">
									<a href="{{ route('theme_detail', $show_theme_info->theme_url) }}" class="Template">
										<img class="themeimg" src="{{asset('theme/images/thumb').'/'.$show_theme_info->main_image }}" >
									</a>
									<div class="author-data v2">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<figure class="user-avatar small">
													<img src="<?php echo asset('image/'.$show_theme_info->user_image); ?>" alt="user-avatar">
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
												<p>{{count($show_theme_info->comments)}}</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>{{$show_theme_info->view_counts}}</p>
											</div>
											<!-- /META ITEM -->
											<?php $ratting = array_sum(array_column($show_theme_info->theme_review->toArray(), 'ratting_star')) / (count($show_theme_info->theme_review)>0 ? count($show_theme_info->theme_review) : 1) ?>
											<ul class="rating ">
											 @for($i=1; $i<=5; $i++)
												<li class="rating-item @if($i <= $ratting) @else empty @endif">
													<svg class="svg-star">
														<use xlink:href="#svg-star"></use>
													</svg>

												</li>
												@endfor
												<li><span>$</span>{{$show_theme_info->price_regular}}</li>
											</ul>

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
										
										<a href="{{ route('theme_detail',$show_theme_info->theme_url) }}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">

										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')"  class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i>
										</a>
									</div>
									<div class="author-data v2 author-mobile">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<figure class="user-avatar small">
													<img src="<?php echo asset('image/'.$show_theme_info->user_image); ?>" alt="user-avatar">
												</figure>
											</a>
											<a class="user-rating v4" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<p class="text-header tiny">{{$show_theme_info->name}}</p>
											</a>
											<span style="float: right;" class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</span>
										</div>
										<!-- /USER RATING -->

										<!-- METADATA -->
										<div class="metadata">
											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-bubble"></span>
												<p>{{count($show_theme_info->comments)}}</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>{{$show_theme_info->view_counts}}</p>
											</div>
											<!-- /META ITEM -->
											<ul class="rating ">
											 @for($i=1; $i<=5; $i++)
												<li class="rating-item @if($i <= $ratting) @else empty @endif">
													<svg class="svg-star">
														<use xlink:href="#svg-star"></use>
													</svg>

												</li>
											@endfor
											</ul>

										</div>
										<!-- /METADATA -->
									</div>
								</div>
								<div class="theme4">
									<ul>
										<li class="prodlist-i-props"><b>Created</b> {!! Carbon\Carbon::parse($show_theme_info->created_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Update</b> {!! Carbon\Carbon::parse($show_theme_info->updated_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Sale </b>{{count($show_theme_info->orders)}}</li>
										<li class="prodlist-i-props"><b>Review</b> {{count($show_theme_info->theme_review)}}</li>
										<li class="prodlist-i-props"><b>Author </b> {{$show_theme_info->username}}</li>
									
										<li class="prodlist-i-props"><b>Ex. License</b> ${{$show_theme_info->price_extented}}</li>
										<li class="prodlist-i-props"><b>View</b> {{$show_theme_info->view_counts}}</li>
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
				
				<div class="clearfix"></div></div>
			<!-- CONTENT -->

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


	function filter_data(page=null)
    {
    	
    	$('.filter_data').html('<div id="loading" style="" ></div>');
        var tags = get_filter('platform');
        var filter_type = get_filter('theme_subfilter');
        var price = document.getElementById('price-range').value;
      	var cat = "{{  Request::input('cat')  }}";
        if(page == null){var page = 1;}
        //var delivery = get_filter('delivery');
		var price_sort = $( "#price_sort option:selected" ).val();
		
		var src_item = "{{Request::input('item')}}";
       	var  link = '<?php echo URL::to("themeplace/search");?>'+'?item='+src_item+'&cat='+cat+'&tags='+tags+'&filter_type='+filter_type+'&page='+page+'&price='+price;
		    history.pushState(null, null, link);

 		$.ajax({
            url:link,
            method:"get",
            data:{
				tags:tags,
				cat:cat,
				filter_type:filter_type,
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

    $('#price_sort').on('change', function(){
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

	$( document.body ).click(function() {
		if($('#search_bar').css('display') == 'block'){
		    document.getElementById('search_bar').style.display = 'none';
		}
	});


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
				if(data.status == 'success'){
					toastr.success(data.msg);
				}else{
					toastr.error(data.msg);
				}
			}
		});
		
	}
</script>

@endsection


