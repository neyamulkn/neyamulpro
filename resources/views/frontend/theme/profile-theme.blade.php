@extends('frontend.layouts.master')
@section('title', 'profile')

@section('css')
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
	<style type="text/css">
		
	.exeheader{
		background: #fff;
		border-top: 1px solid #ccc;
		margin: 0px auto;
		    margin-bottom: 0px;
		width: 97.5%;
		margin-bottom: -5px;
		padding: 10px;
		font-weight: bolder;
		box-shadow: 0 0 13px #ccc;
	}
	</style>
@endsection

@section('content')

	<!-- AUTHOR PROFILE BANNER -->
	<div class="author-profile-banner"></div>
	<!-- /AUTHOR PROFILE BANNER -->

	<!-- AUTHOR PROFILE META -->
	<div class="author-profile-meta-wrap">
		<div class="author-profile-meta">
			<!-- AUTHOR PROFILE INFO -->
			<div class="author-profile-info">
				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<p class="text-header">Member Since:</p>
					<p>{{ \Carbon\Carbon::parse($userinfo->created_at)->format('F d, Y')}}</p>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->

				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<p class="text-header">Total Sales:</p>
					<p>820</p>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->

				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<p class="text-header">Location:</p>
					<p>{{$userinfo->country}}</p>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->

				<!-- AUTHOR PROFILE INFO ITEM -->
				<div class="author-profile-info-item">
					<a href="#" class="button mid dark spaced">Add to <span class="primary">Followers</span></a>
				</div>
				<!-- /AUTHOR PROFILE INFO ITEM -->
			</div>
			<!-- /AUTHOR PROFILE INFO -->
		</div>
	</div>
	<!-- /AUTHOR PROFILE META -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section overflowable">
			<!-- SIDEBAR -->
			<div class="sidebar left author-profile">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio">
					<!-- USER AVATAR -->
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{asset('/allscript')}}/images/avatars/avatar_09.jpg" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header">{{ $userinfo->username}}</p>
					<p class="text-oneline">Super Samurai Developers<br>Los Angeles, Usa</p>
					<!-- SHARE LINKS -->
					<ul class="share-links">
						<li><a href="#" class="fb"></a></li>
						<li><a href="#" class="twt"></a></li>
						<li><a href="#" class="db"></a></li>
					</ul>
				
					<a href="#" class="button mid dark-light">Send a Private Message</a>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect">
					<li class="dropdown-item">
						<a href="{{route('profile_view', Request::route('username'))}}">About {{Request::route('username')}}</a>
					</li>
					<li class="dropdown-item ">
						<a href="{{route('userProtfolio', [Request::route('username'), 'workplace'])}}">Workplace</a>
					</li>
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'marketplace'])}}">Marketplace</a>
					</li>
					<li class="dropdown-item active">
						<a href="{{route('userProtfolio', [Request::route('username'), 'themeplace'])}}">Themeplace</a>
					</li>
				
				
				</ul>
				<!-- /DROPDOWN -->

			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content right">
				@if(count($get_theme_info)>0)
				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">

						@foreach($get_theme_info as $show_theme_info)
							<!-- THEME ITEM -->
							<div class="theme1">
								<div class="theme2">
									<a href="{{route('theme_detail', $show_theme_info->theme_url)}}" class="Template">
										<img class="themeimg" src="{{asset('theme/images/thumb').'/'.$show_theme_info->main_image }}" >
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
												<p>{{count($show_theme_info->comments)}}</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>{{$show_theme_info->view_counts}}</p>
											</div>
											<!-- /META ITEM -->

										</div>
										<!-- /METADATA -->
									</div>
								</div>
								<div class="theme3">
									<div class="themett">
										<a href="{{route('theme_detail', $show_theme_info->theme_url)}}">{{$show_theme_info->theme_name}}</a>
									</div>
									<a href="shop-gridview-v1.html">
										<p class="category tertiary v2">{{$show_theme_info->category_name}} / {{$show_theme_info->subcategory_name}}</p>
									</a>
									<p class="prodlist-i-txt">
										{{$show_theme_info->summary}}
									</p>
									<div class="bottomtheme">
										<p class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</p>
										<a href="{{route('theme_detail', $show_theme_info->theme_url)}}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">
										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')" class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i>
										</a>
									</div>
								</div>
								<div class="theme4">
									<ul >
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
				
                @else <h2 style="text-transform: capitalize; color: #000;"> {{Request::route('username')}} Have No Themes </h2> @endif
			</div>
			<!-- CONTENT -->

			<div class="clearfix"></div>
		</div>
	</div>
@endsection

@section('js')
<script type="text/javascript">
	function add_to_cart(theme_id){
		var price = $('#price').val();
		$.ajax({
			method:'post',
			url:'{{  URL::to("/themeplace/cart/") }}',
			data:{
				theme_id:theme_id,
				price:price,
				_token:"{{  csrf_token()  }}"
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