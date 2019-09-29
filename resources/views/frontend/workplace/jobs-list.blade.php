@extends('frontend.layouts.master')
@section('title', Request::segment(1). ' - HOTLancer')

@section('css')
	<link rel="stylesheet" href="{!! asset('allscript/css/vendor/simple-line-icons.css') !!}">
	<link rel="stylesheet" href="{{asset('allscript/css/vendor/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('allscript/css/vendor/jquery.range.css') }}">
<link rel="stylesheet" href="{!! asset('allscript/css')!!}/hl-work.css">
@endsection
<link rel="stylesheet" href="{{asset('allscript/workplace/jobs.css')}}">
<style type="text/css">
    .section{
    overflow: hidden;
    background: #fff;
    padding: 10px !important;
    margin-top: 10px !important;
}
</style>

@section('content')

	<!-- SECTION -->
	

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar right">
				
				<div class="sidebar-item">
                    <b>Category</b><br>
                    <hr style="margin-top: 10px;" class="line-separator">
                    
					<ul class="dropdown hover-effect">
						@if(isset($get_subcategory))
                            @foreach($get_subcategory as $show_subcategory)
                                <li class="dropdown-item">
                                    <a href="{{url('workplace/'.$show_subcategory->subcategory_url)}}">{{$show_subcategory->subcategory_name}}</a>
                                </li>   
                            @endforeach 
                        @endif
					</ul>
				</div>

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
                <div class="sidebar-item range-feature">
                    <h4>Price Range</h4>
                    <hr class="line-separator spaced">
                    <input type="hidden" class="price-range-slider secondary" value="500" form="shop_search_form">
                    <button form="shop_search_form" class="button mid secondary-dark">Update your Search</button>
                </div>
			
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content left">
				
				<div class="col-lgh">
					<h2>Recent Jobs</h2>
                    @foreach($get_jobs as $show_job)
					   <div class="jp_job_post_main_wrapper_cont">
						<div class="jp_job_post_main_wrapper">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="jp_job_post_side_img">
										<img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
									</div>
									<div class="jp_job_post_right_cont">
										<h4><a  style="color: #00d7b3" href="{{ route('job-details' , $show_job->job_title_slug) }}">{!!$show_job->job_title!!}</a></h4>
										<p><a href="{{url($show_job->username)}}"> {!!$show_job->username!!} </a>&nbsp; <small style="color: #ccc;"> by {!! \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()!!}</small></p>
										<ul>
											<li><i class="fa fa-cc-paypal"></i>&nbsp;  ${!!$show_job->budget!!}</li>
											<li><i class="fa fa-map-marker"></i>&nbsp;{!!$show_job->country!!}</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="jp_job_post_right_btn_wrapper">
										<ul>
											<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
											<li><a href="#">{!!$show_job->price_type!!}</a></li>
											<li><a href="{!! route('job_proposal', $show_job->job_title_slug) !!}">Apply</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="jp_job_post_keyword_wrapper">
							<ul>
								<li><i class="fa fa-tags"></i>Keywords :</li>
								<li><a href="#">ui designer,</a></li>
								<li><a href="#">developer,</a></li>
								<li><a href="#">senior</a></li>
								<li><a href="#">it company,</a></li>
								<li><a href="#">design,</a></li>
								<li><a href="#">call center</a></li>
							</ul>
						</div>
					   </div>
                    @endforeach

                    <div class="page primary paginations"> {{$get_jobs->links()}} </div>
                </div>
			</div>
			<!-- CONTENT -->
		</div>
	</div>


@endsection

@section('js')
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/jquery.range.min.js') }}"></script>
<!-- Side Menu -->
<script src="{!! asset('allscript')!!}/js/side-menu.js"></script>
<!-- User Quickview Dropdown -->

<!-- XM LineFill -->
<script src="{!! asset('allscript')!!}/js/vendor/jquery.xmlinefill.min.js"></script>

<script src="{{ asset('allscript/js/shop.js') }}"></script>

@endsection