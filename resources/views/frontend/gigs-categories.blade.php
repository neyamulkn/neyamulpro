@extends('frontend.layouts.master')
<?php $subcategory = Request::route('subcategory') ?>
@section('title', Request::segment(3) .' – '. Request::segment(2)  .' – '. Request::segment(1) . ' – HOTLancer' )

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

.search_bar{
	position: absolute;
    top: 60px;
    left: 0;
    margin: 0px auto;
    width: 85%;
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

@endsection


@section('content')
<div style="background:#fffdfd;padding:10px 30px;10px 30px "> 
	{{'Home / '.Request::route('category') .' / '. Request::route('subcategory')}}
</div>
	<div class="section-wrap">
		
		<div class="section">
			<div  style="width: 100%; margin-bottom: 15px; position: relative; padding: 10px 0 0px !important;">
				<form action=""  class="search-widget-form"  style="width: 100%;" >
					<input type="text" autocomplete="off" onkeyup="search_bar(this.value)" style="width: 85%;border-radius:0px !important;" value="{{(isset($_GET['item']) ? $_GET['item'] : '' )}}" name="item" id="item" placeholder="Search goods or services here...">
					
					<button class="button medium tertiary">Search Now!</button>
				</form>
				<div class="search_bar" id="search_bar" >
					<ul>
						<span id="show_suggest_key"></span>
					</ul>
				</div>
			</div>
			<!-- CONTENT -->
		
			<div class="content filter_data">
				<!-- HEADLINE -->
				<div class="headline primary">
					<h4> {{$get_gigs->total()}} Products Found</h4>
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
				@foreach($get_filters as $get_filter)


				<div class="sidebar-item">
					<h4>{{$get_filter->filter_name}}</h4>
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


	
  
	function filter_data(page)
    {
    	$('.filter_data').html('<div id="loading" style="" ></div>');
        var tags = get_filter('metadata');
        var payment = get_filter('payment');
        if(page == null){var page = 1;}
        //var delivery = get_filter('delivery');
		var gig_sort = ($( "#gig_asc option:selected" ).val());
		var category = "{{ Request::route('category') }}" ;
		var subcategory = "{{ Request::route('subcategory') }}";
		var src_item = "{{Request::input('item')}}";
       	var  link = '<?php echo URL::to("marketplace/");?>/'+category+'/'+subcategory+'?item='+src_item+'&tags='+tags+'&page='+page+'&payment='+payment;
		    history.pushState({id: 'Marketplace'}, category +' '+subcategory, link);

 		$.ajax({
            url:link,
            method:"get",
            data:{
				tags:tags,
				gig_sort:gig_sort,
				category:category,
				subcategory:subcategory,
				payment:payment,
				filter:'filter',
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

</script>



	<!-- Tooltipster -->
<script src="{{ asset('allscript/js/vendor/jquery.tooltipster.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/jquery.range.min.js') }}"></script>

<!-- Side Menu -->
<script src="{{ asset('allscript/js/side-menu.js') }}"></script>


<script src="{{ asset('allscript/js/shop.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript/js/tooltip.js') }}"></script>



@endsection
