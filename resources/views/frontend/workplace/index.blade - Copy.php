@extends('frontend.layouts.master')
@section('title', Request::segment(1). ' - HOTLancer')

@section('css')
	<link rel="stylesheet" href="{!! asset('allscript/css/vendor/simple-line-icons.css') !!}">
		<link rel="stylesheet" href="{{ asset('allscript/css/vendor/jquery.range.css') }}">
	<link rel="stylesheet" href="{!! asset('allscript/css')!!}/hl-work.css">

<style type="text/css">
	#loading
{
	text-align:center; 
	background: url('{{ asset("image/loading.gif")}}') no-repeat center; 
	height: 350px;
}
.pin-tag.primary a {
    color: #06b99b;
    font-size: 16px;
    font-family: roboto;
}
</style>

@endsection

@section('content')

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<div class="sidebar">
				<b>Sub category</b>
				<hr style="margin-top: 10px;" class="line-separator">
				<div class="sidebar-item">
				
				<ul class="dropdown hover-effect secondary">
				@if(isset($category))
					@foreach($category as $show_category)
						<li class="dropdown-item">
							<a href="{{url('workplace/'.$show_category->category_url)}}">{{$show_category->category_name}}</a>
						</li>	
					@endforeach 
				@endif
				@if(isset($get_subcategory))
					@foreach($get_subcategory as $show_category)
						<li class="dropdown-item">
							<a href="{{url('workplace/'.$show_category->category_url.'/'.$show_category->subcategory_url)}}">{{$show_category->subcategory_name}}</a>
						</li>	
					@endforeach 
				@endif
				</ul>
				<!-- /DROPDOWN -->
			</div>
				<!-- SIDEBAR ITEM -->
				

				<div class="sidebar-item">
					<b>Payment Type</b><br>
					<hr style="margin-top: 10px;" class="line-separator">
					
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
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item range-feature">
					<h4>Price Range</h4>
					<hr class="line-separator spaced">
					<input type="hidden" class="price-range-slider secondary" value="500" form="shop_search_form">
					<button form="shop_search_form" class="button mid secondary-dark">Update your Search</button>
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<!-- SIDEBAR ITEM -->
				<button form="shop_search_form" class="button mid secondary-dark">Create Your Project</button>
				<!-- /SIDEBAR ITEM -->
				
				@if(Auth::check())
					
				<?php $get_user_info = DB::table('userinfos')->where('user_id', Auth::user()->id)->first(); ?>

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio short author-badges-v1 column">
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{asset('image/'.'/'.$get_user_info->user_image) }}" width="70" height="70" alt="">
						</figure>
					</a>
					<p class="text-header">{{ Auth::user()->username }}</p>
					<p class="text-oneline">{{ $get_user_info->user_title }}</p>
				
					<div class="badges-showcase-item column">
						<p class="text-header badge-progress-title">Availability</p>
						<!-- BADGE PROGRESS -->
						<p class="tags primary">As Needed - Open to Offers 85%</p>
						<div class="badge-progress badge-progress23 xmlinefill" style="width: 150px; height: 18px; position: relative;">
							<canvas class="lineOutline" width="200" height="18" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas>
							<canvas class="lineBar" width="200" height="18" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas>
						</div>
						<!-- /BADGE PROGRESS -->
					</div><!-- /SIDEBAR ITEM -->
				</div>
				@endif
				<div class="sidebar-item product-info">
					<h4>Product Information</h4>
					<hr class="line-separator">
					<!-- INFORMATION LAYOUT -->
					<div class="information-layout">
						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Sales:</p>
							<p>22</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Upload Date:</p>
							<p>August 18th, 2015</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Files Included:</p>
							<p>PSD, AI<br>JPEG, PNG</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Requirements:</p>
							<p>CS6 or Lower</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Dimensions:</p>
							<p>4500x2800 Px</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="tags primary"><a href="#">photoshop</a>, <a href="#">flat</a>, <a href="#">icon</a>, <a href="#">devices</a>, <a href="#">mobile</a>, <a href="#">vector</a>, <a href="#">coffee</a>, <a href="#">scene</a>, <a href="#">hero</a>, <a href="#">image</a>, <a href="#">maker</a>, <a href="#">set</a>, <a href="#">tablet</a>, <a href="#">laptop</a>, <a href="#">mockup</a></p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
					</div>
					<!-- INFORMATION LAYOUT -->
				</div>
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content upwork">
				<div class="hotlancer-work">
					<div class="sidebar-item">
						<h4>Find Work</h4>
						<hr class="line-separator">
						<form class="search-form">
							<input type="text" class="rounded" name="search" id="search_topics" placeholder="Search For Jobs">
							<input style="top:23px;right:0px;" class="search-work" type="image" src="{!! asset('allscript')!!}/images/search-icon.png" alt="search-icon">
						</form>
					</div>
				</div>
				
				<br/>
				<div class="hotlancer-work">
				<div class="thread">
					<!-- THREAD TITLE -->
					<div class="thread-title">
						<p class="text-header">My Job Feed</p>
					</div>
					<!-- /THREAD TITLE -->

					<!-- COMMENTS -->
					<div class="comment-list">

						@foreach($get_jobs as $show_job)
							<!-- COMMENT -->
							<div class="comment-upwork">
								<div>
								<div class="workj1">
									<p class="pin-tag primary"><a href="{{ route('job-details' , $show_job->job_title_slug) }}">{!!$show_job->job_title!!}</a></p>
								</div>
									<br/>
									<p class="text-header"><b>{!!$show_job->price_type!!}</b> - {!!$show_job->experience!!} ($$$) - Est. Budget: ${!!$show_job->budget!!}, 10-30 hrs/week - {!! \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()!!}</p>
									<!-- /RECOMMENDATION -->
									<p>{!!$show_job->job_dsc!!}<a href="{{ route('job-details' , $show_job->job_title_slug) }}" class="pin-tag primary">more</a></p>
									<br/>
									<div class="tag-list primary">
										<?php 

											$get_filters = DB::table('job_expertise')
						                        ->join('workplace_filters', 'job_expertise.filter_id', 'workplace_filters.filter_id')
						                        ->where('job_expertise.job_id', $show_job->job_id)->get();

										?>
											 @foreach($get_filters as $show_filter)

						                         <?php
												 $get_subfilters = DB::table('workplace_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>


											 @foreach($get_subfilters as $show_subfilter)
												<a href="#" class="tag-list-item">{!!$show_subfilter->sub_filtername!!}</a>
											@endforeach
										@endforeach

									</div>
									<div class="meta-line">
									<a href="open-post.html">
										<p class="category primary">{!!$show_job->username!!}</p>
									</a>
									<!-- METADATA -->
									
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>05</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>68</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
									<p>{!! \Carbon\Carbon::parse($show_job->created_at)->format('M d, Y')!!}</p>


								</div>
								</div>
							</div>
						@endforeach
						
						<!-- /COMMENT -->

						<!-- LINE SEPARATOR -->
						<hr class="line-separator">
						<!-- /LINE SEPARATOR -->

						<!-- PAGER -->
						<div class="page primary paginations">
							<div class="pager-item"><p>1</p></div>
							<div class="pager-item active"><p>2</p></div>
							<div class="pager-item"><p>3</p></div>
							<div class="pager-item"><p>...</p></div>
							<div class="pager-item"><p>17</p></div>
						</div>
						<!-- /PAGER -->

						<div class="clearfix"></div>
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				</div>
			</div>
			<!-- /CONTENT -->
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
    	//$('.filter_data').html('<div id="loading" style="" ></div>');
    
        var payment = get_filter('payment');
        var category = "{{ Request::route('category') }}" ;
		var subcategory = "{{ Request::route('subcategory') }}";
      	//var  link = '<?php echo URL::to("/workplace/");?>/'+category+'/'+subcategory+'?page='+page;
		    history.pushState({id: 'workplace'}, category +' '+subcategory, link);
     
		//history.pushState({id: 'Marketplace'}, 'workplace', link);
    
 		$.ajax({
            url:link,
            method:"get",
            data:{
				category:category,
				subcategory:subcategory,
				payment:payment,
				//delivery:delivery,
				_token: '{{ csrf_token() }}'
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



});

</script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/jquery.range.min.js') }}"></script>
<!-- Side Menu -->
<script src="{!! asset('allscript')!!}/js/side-menu.js"></script>
<!-- User Quickview Dropdown -->

<!-- XM LineFill -->
<script src="{!! asset('allscript')!!}/js/vendor/jquery.xmlinefill.min.js"></script>

<script src="{!! asset('allscript')!!}/js/badges.js"></script>


<script src="{{ asset('allscript/js/shop.js') }}"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript/js/tooltip.js') }}"></script>

<script src="https://cdn.plyr.io/3.3.10/plyr.js"></script>

@endsection