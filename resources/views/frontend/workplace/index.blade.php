@extends('frontend.layouts.master')
@section('title', 'Hotlancer')

@section('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css')}}/hl-work.css">

@endsection

@section('content')

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<div class="sidebar">
				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect secondary">
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
					<li class="dropdown-item">
						<a href="#">Digital Graphics</a>
					</li>
					<li class="dropdown-item">
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
					<h4>Filter Products</h4>
					<hr class="line-separator">
					<form id="shop_search_form" name="shop_search_form">
						<!-- CHECKBOX -->
						<input type="checkbox" id="filter1" name="filter1" checked="">
						<label for="filter1">
							<span class="checkbox secondary"><span></span></span>
							Cartoon Characters
							<span class="quantity">350</span>
						</label>
						<!-- /CHECKBOX -->

						<!-- CHECKBOX -->
						<input type="checkbox" id="filter2" name="filter2" checked="">
						<label for="filter2">
							<span class="checkbox secondary"><span></span></span>
							Flat Vector
							<span class="quantity">68</span>
						</label>
						<!-- /CHECKBOX -->

						<!-- CHECKBOX -->
						<input type="checkbox" id="filter3" name="filter3" checked="">
						<label for="filter3">
							<span class="checkbox secondary"><span></span></span>
							People
							<span class="quantity">350</span>
						</label>
						<!-- /CHECKBOX -->

						<!-- CHECKBOX -->
						<input type="checkbox" id="filter4" name="filter4">
						<label for="filter4">
							<span class="checkbox secondary"><span></span></span>
							Animals
							<span class="quantity">68</span>
						</label>
						<!-- /CHECKBOX -->

						<!-- CHECKBOX -->
						<input type="checkbox" id="filter5" name="filter5">
						<label for="filter5">
							<span class="checkbox secondary"><span></span></span>
							Objects
							<span class="quantity">350</span>
						</label>
						<!-- /CHECKBOX -->

						<!-- CHECKBOX -->
						<input type="checkbox" id="filter6" name="filter6" checked="">
						<label for="filter6">
							<span class="checkbox secondary"><span></span></span>
							Backgrounds
							<span class="quantity">68</span>
						</label>
						<!-- /CHECKBOX -->
					</form>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item">
					<h4>File Types</h4>
					<hr class="line-separator">
					<!-- CHECKBOX -->
					<input type="checkbox" id="ft1" name="ft1" form="shop_search_form">
					<label for="ft1">
						<span class="checkbox secondary"><span></span></span>
						Photoshop PSD
						<span class="quantity">72</span>
					</label>
					<!-- /CHECKBOX -->

					<!-- CHECKBOX -->
					<input type="checkbox" id="ft2" name="ft2" form="shop_search_form" checked="">
					<label for="ft2">
						<span class="checkbox secondary"><span></span></span>
						Illustrator AI
						<span class="quantity">254</span>
					</label>
					<!-- /CHECKBOX -->

					<!-- CHECKBOX -->
					<input type="checkbox" id="ft3" name="ft3" form="shop_search_form" checked="">
					<label for="ft3">
						<span class="checkbox secondary"><span></span></span>
						EPS
						<span class="quantity">138</span>
					</label>
					<!-- /CHECKBOX -->

					<!-- CHECKBOX -->
					<input type="checkbox" id="ft4" name="ft4" form="shop_search_form" checked="">
					<label for="ft4">
						<span class="checkbox secondary"><span></span></span>
						SVG
						<span class="quantity">96</span>
					</label>
					<!-- /CHECKBOX -->

					<!-- CHECKBOX -->
					<input type="checkbox" id="ft5" name="ft5" form="shop_search_form">
					<label for="ft5">
						<span class="checkbox secondary"><span></span></span>
						InDesign INDD
						<span class="quantity">102</span>
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

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio short author-badges-v1 column">
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{ asset('allscript')}}/images/avatars/avatar_01.jpg" alt="">
						</figure>
					</a>
					<p class="text-header">Odin_Design</p>
					<p class="text-oneline">Lorem ipsum dolor sit amet, consectetur sicing elit.</p>
				
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
							<input class="search-work" type="image" src="{{ asset('allscript')}}/images/search-icon.png" alt="search-icon">
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
								<div class="">
								<div class="workj1">
									<h4 class="text-header"><a href="{{url('workplace/'.$show_job->job_title_slug )}}">{{$show_job->job_title}}</a></h4>
									<div class="workj2">
									<span class="icon-like workj4"></span>
									<span class="icon-heart workj4"></span>
									</div>
								</div>
									<br/>
									<p class="pin-tag primary"><b>{{$show_job->price_type}}</b> - {{$show_job->experience}} ($$$) - Est. Budget: ${{$show_job->budget}}, 10-30 hrs/week - {{ \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()}}</p>
									<!-- /RECOMMENDATION -->
									<p>{{$show_job->job_dsc}}<a href="{{url('workplace/'.$show_job->job_title_slug )}}" class="pin-tag primary">more</a></p>
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
												<a href="#" class="tag-list-item">{{$show_subfilter->sub_filtername}}</a>
											@endforeach
										@endforeach

									</div>
									<div class="meta-line">
									<a href="open-post.html">
										<p class="category primary">{{$show_job->username}}</p>
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
									<p>{{ \Carbon\Carbon::parse($show_job->created_at)->format('M d, Y')}}</p>
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

<!-- Side Menu -->
<script src="{{ asset('allscript')}}/js/side-menu.js"></script>
<!-- User Quickview Dropdown -->

<!-- XM LineFill -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>

<script src="{{ asset('allscript')}}/js/badges.js"></script>

<script src="https://cdn.plyr.io/3.3.10/plyr.js"></script>

@endsection