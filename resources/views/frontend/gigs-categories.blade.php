@extends('frontend.layouts.master')
<?php $subcategory = Request::route('subcategory') ?>
@section('title', $subcategory )

@section('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/simple-line-icons.css') }}">
	<!-- <link rel="stylesheet" href="{{ asset('allscript/css/bootstrap.min.css') }}"> -->
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/tooltipster.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/jquery.range.css') }}">
<style>
#loading
{
	text-align:center; 
	background: url('{{ asset("image/loading.gif")}}') no-repeat center; 
	height: 350px;
}

.user_image img{
	width: 26px;
	height: 26px;
}
</style>

@endsection

@section('content')
<div style="background:#fffdfd;padding:10px 30px;10px 30px "> 
	{{'Home / '.Request::route('category') .' / '. Request::route('subcategory')}}
</div>
	<div class="section-wrap">
		<div class="section">
			<!-- CONTENT -->
			<div class="content">
				<!-- HEADLINE -->
				<div class="headline primary">
					<h4>12.580 Products Found</h4>
					<form id="shop_filter_form" name="shop_filter_form">
						<span style="display: inline-block; float: left; padding: 8px">
							Sort by:
						</span>
						<label for="gig_asc" class="select-block">
							<select name="gig_sort" id="gig_asc">
								<option value="ASC">Price (Low to High)</option>
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
				
				<span class="filter_data"></span>

			</div>
			<!-- CONTENT -->

			<!-- SIDEBAR -->
			<div class="sidebar">
				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect">
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
				@foreach($get_filter_id as $get_filter)

				<?php $get_filter_info = DB::table('filters')->where('filter_id', $get_filter->filter_id)->first(); ?>
				<div class="sidebar-item">
					<h4>{{$get_filter_info->filter_name}}</h4>
					<hr class="line-separator">
					<form id="shop_search_form" name="shop_search_form">
					<input id="token" type="hidden" name="_token" value="{{csrf_token() }}" />
						<!-- CHECKBOX -->
					<?php $get_metadata = DB::table('gig_metadatas')
						->join('gig_metadata_filters', 'gig_metadatas.sub_filter_id', '=', 'gig_metadata_filters.metadata_id')
						->where('filter_id', $get_filter->filter_id)
						->where('filter_type', 'No')
						->select(
							'gig_metadatas.*',
							 DB::raw("count('gig_metadata_filters.metadata_id') AS total_gigs" ))
						->groupBy('gig_metadata_filters.metadata_id')
						->get(); ?>
						@foreach($get_metadata as $metadata)
							<input type="checkbox" id="{{$metadata->sub_filter_id }}" value="{{$metadata->sub_filter_id }}" class="common_selector metadata" name="filter1">
							<label for="{{$metadata->sub_filter_id }}">
								<span class="checkbox primary primary"><span></span></span>
								{{$metadata->sub_filter_name }}
								<span class="quantity">{{$metadata->total_gigs }}</span>
							</label>
							@endforeach

						<!-- /CHECKBOX -->
					</form>
				</div>
				@endforeach
				<!-- /SIDEBAR ITEM -->
				<div class="sidebar-item">
					<h4>Payment Type</h4>
					<hr class="line-separator">
					
							<input type="radio" id="all" class="common_selector" checked="" value="All" name="Payment">
							<label for="all">
								<span class="checkbox primary primary"><span></span></span>
								Payment Type All
								<span class="quantity">2</span>
							</label>

							<input type="radio" id="fixed" class="common_selector payment" value="fixed" name="Payment">
							<label for="fixed">
								<span class="checkbox primary primary"><span></span></span>
								Fixed Price
								<span class="quantity">2</span>
							</label>
							<input type="radio" id="monthly" class="common_selector payment" value="monthly" name="Payment">
							<label for="monthly">
								<span class="checkbox primary primary"><span></span></span>
								Monthly 
								<span class="quantity">2</span>
							</label>
							
						<!-- /CHECKBOX -->
					
				</div>

				<div class="sidebar-item">
					<h4>Delivery Time</h4>
					<hr class="line-separator">
					<form id="shop_search_form" name="shop_search_form">
							<input type="radio" id="delivery_1" value="fsdf" class="common_selector delivery" checked="" name="delivery">
							<label for="delivery_1">
								<span class="checkbox primary primary"><span></span></span>
								Up to 24 hours
								<span class="quantity">2</span>
							</label>

							<input type="radio" id="delivery_2" class="common_selector delivery" value="fsdf" name="delivery">
							<label for="delivery_2">
								<span class="checkbox primary primary"><span></span></span>
								Up to 24 hours
								<span class="quantity">2</span>
							</label>
							<input type="radio" id="delivery_3" class="common_selector delivery" value="fsdf" name="delivery">
							<label for="delivery_3">
								<span class="checkbox primary primary"><span></span></span>
								Up to 24 hours
								<span class="quantity">2</span>
							</label>
							
						<!-- /CHECKBOX -->
					</form>
				</div>
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item range-feature">
					<h4>Price Range</h4>
					<hr class="line-separator spaced">
					<input type="hidden" name="price_rang" class="price-range-slider" value="500" form="shop_search_form">
					<button form="shop_search_form" class="button mid primary">Update your Search</button>
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->
		</div>
	</div>
	<!-- /SECTION -->
@endsection

@section('js')


<script>


$(document).ready(function(){


$(document).on('click', '.pagination a', function(e){
	e.preventDefault();

	var page = $(this).attr('href').split('page=')[1];

	filter_data(page);
});


	filter_data();
  
	function filter_data(page)
    {
    	$('.filter_data').html('<div id="loading" style="" ></div>');
        var metadata = get_filter('metadata');
        var payment = get_filter('payment');
        //var delivery = get_filter('delivery');
		var gig_sort = ($( "#gig_asc option:selected" ).val());
		var category = "{{ Request::route('category') }}" ;
		var subcategory = "{{ Request::route('subcategory') }}";
        var link = "<?php echo '/categories/'.Request::route('category') .'/'. Request::route('subcategory'); ?>?page="+page;
 		$.ajax({
            url:link,
            method:"POST",
            data:{
				metadata:metadata,
				gig_sort:gig_sort,
				category:category,
				subcategory:subcategory,
				payment:payment,
				//delivery:delivery,
				_token: $('#token').val()
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


});

</script>



	<!-- Tooltipster -->
<script src="{{ asset('allscript/js/vendor/jquery.tooltipster.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/jquery.range.min.js') }}"></script>
<!-- Tweet -->
<script src="{{ asset('allscript/js/vendor/twitter/jquery.tweet.min.js') }}"></script>
<!-- Side Menu -->
<script src="{{ asset('allscript/js/side-menu.js') }}"></script>


<script src="{{ asset('allscript/js/shop.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript/js/tooltip.js') }}"></script>
<!-- Home Alerts -->
<script src="{{ asset('allscript/js/home-alerts.js') }}"></script>


@endsection
