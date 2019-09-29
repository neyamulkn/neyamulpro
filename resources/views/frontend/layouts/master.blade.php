<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	@yield('metatag')
	@yield('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/custom.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/vendor/toastr.css') }}">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">

	<style>
		.main-menu.manu2.top-highlight {
		    min-height: 71px;
		    position: relative;
		}
		.main-menu.top-highlight .menu-item:hover > a {
		    color: #2b373a;
		    border-top-color: #ffffff;
		    background-color: #fff;
		}
		.main-menu.top-highlight .menu-item:hover {
		    background-color: #ffffff;
		}

		.manu-highlight > a {
		    color: #3a494d !important;
		    border-top-color: #ffffff;
		    background-color: #fff;
		}
		.manu-highlight {
		    background-color: #ffffff;
			color: #3a494d !important;
		}
		.menu-bar .search-form{
			top:15px !important;
		}

	#overlay {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background-color: rgba(0,0,0, .3);
		background-image: url("{{asset('image/loading.gif')}}");
		background-position: center;
	    background-repeat: no-repeat;
	}

	#uploading {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background-color: rgba(0,0,0, .3);
	background-image: url("{{asset('image/loading.gif')}}");
	background-position: center;
    background-repeat: no-repeat;
}

	}
	.button.secondary:hover {
	    background-color: #37c9ff;
	    color: black;
	}
	.button.primary:hover {
	    color: black;
	}

</style>
</head>
<body>

	<!-- HEADER -->
	<div class="header-wrap">
		<header>
			<!-- LOGO -->
			<a href="{{ url('/') }}">
				<figure class="logo">
					<img src="{{ asset('allscript/images/logo.png') }}" alt="logo">
				</figure>
			</a>
			<!-- /LOGO -->

			<!-- MOBILE MENU HANDLER -->
			<div class="mobile-menu-handler left primary">
				<img src="{{ asset('allscript/images/pull-icon.png') }}" alt="pull-icon">
			</div>
			<!-- /MOBILE MENU HANDLER -->

			<!-- LOGO MOBILE -->
			<a href="{{ url('/') }}">
				<figure class="logo-mobile">
					<img src="{{ asset('allscript/images/logo_mobile.png') }}" alt="logo-mobile">
				</figure>
			</a>
			<!-- /LOGO MOBILE -->

			<!-- MOBILE ACCOUNT OPTIONS HANDLER -->
			<div class="mobile-account-options-handler right secondary">
				<img src="{{ asset('allscript/images/pull-icon.png') }}" alt="pull-icon">
			</div>
			<!-- /MOBILE ACCOUNT OPTIONS HANDLER -->
			<!-- USER BOARD -->
			<div class="user-board">


				<?php 
				$get_id = null;
				if(Auth::check()){ 
					$get_id = Auth::user()->id;
					$get_user_info = DB::table('userinfos')->where('user_id', $get_id)->first();

				?>
				<div class="user-quickview">
					<!-- USER AVATAR -->
					<a href="{{url('dashboard/profile/setting')}}">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<figure class="user-avatar">
							<img src="{{asset('image/'.'/'.$get_user_info->user_image) }}"  alt="image">
						</figure>
					</div>
					</a>
					<!-- /USER AVATAR -->

					<!-- USER INFORMATION -->
					<p class="user-name">{{ Auth::user()->name}}</p>
					<!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
					<p class="user-money">$745.00</p>
					<!-- /USER INFORMATION -->

					<!-- DROPDOWN -->
					<ul class="dropdown small hover-effect closed">
						<li class="dropdown-item">
							<div class="dropdown-triangle"></div>
							<a href="{{url('/'.Auth::user()->username)}}">Profile Page</a>
						</li>
						<li class="dropdown-item">
							<a href="{{url('dashboard/profile/setting')}}">Account Settings</a>
						</li>
						<li class="dropdown-item">
							<a href="{{route('theme_downloads', Auth::user()->username)}}">Downloads Theme</a>
						</li>
						<li class="dropdown-item">
							<a href="dashboard-statement.html">Sales Statement</a>
						</li>
						<li class="dropdown-item">
							<a href="dashboard-buycredits.html">Buy Credits</a>
						</li>
						<li class="dropdown-item">
							<a href="dashboard-withdrawals.html">Withdrawals</a>
						</li>
						<li class="dropdown-item">
							<a href="dashboard-uploaditem.html">Upload Item</a>
						</li>
						<li class="dropdown-item">
							<a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</li>
					</ul>
					<!-- /DROPDOWN -->
				</div>

				<div class="account-information">
					
					@if(Request::segment(1) == 'marketplace')
						@include('frontend/gig-add-to-cart')
					@endif

					@if(Request::segment(1) == 'themeplace')
						@include('frontend/theme/add-to-cart_head')
					@endif

					<div class="account-email-quickview">
						<span class="icon-envelope">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</span>
						<?php  // get notifications
							$get_notify = DB::table('notifications')
								->where('forUser', Auth::user()->id)
								->where('read', 0)
								->groupBY('type')
								->get();

							$count = 0; 
							foreach($get_notify as $show_notify){
								switch ($show_notify->type) {

									case 'order':
							            $get_notify_order = DB::table('gig_orders')
							            ->Join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
							            ->Join('users', 'gig_orders.buyer_id', '=', 'users.id')
							            ->select('gig_orders.*', 'gig_basics.gig_title', 'gig_basics.gig_url', 'users.id', 'users.username', 'users.name' )
							            ->where('gig_orders.seller_id' , '=', $show_notify->forUser)->get();

							           $count = count($get_notify_order);
							         break;
									
									case 'other':
										echo "other";
										break;
									}
							}
							
						?>
						<!-- PIN -->
						<span class="pin soft-edged secondary"><?php echo $count; ?></span>
						<!-- /PIN -->

						<!-- DROPDOWN NOTIFICATIONS -->
							<?php
								if($count>0){
									echo '<ul class="dropdown notifications closed">';
						        	foreach ($get_notify_order as $notify_order) {
						        	
										echo '
										<li class="dropdown-item">
											<a href="'.url('dashboard/'.Auth::user()->username.'/manage/order/'.$notify_order->order_id).'" class="link-to"></a>
											<figure class="user-avatar">
												<img src="'.asset('allscript/images/avatars/avatar_04.jpg').'" alt="">
											</figure>
											<p class=" tiny"><span><b>'.$notify_order->username.'</b> '.$notify_order->gig_title.'</span></p>
											
											<p class="timestamp">May 5th, 2014</p>
										</li>';
									}
									echo "</ul>";
								}
							?>
							
						</ul>
						<!-- /DROPDOWN NOTIFICATIONS -->
					</div>

					<div class="account-settings-quickview">
						<span class="icon-settings">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</span>

						<!-- PIN -->
						<span class="pin soft-edged primary">0</span>
						<!-- /PIN -->

						<!-- DROPDOWN NOTIFICATIONS -->
						<ul class="dropdown notifications no-hover closed">
							<!-- DROPDOWN ITEM -->
							<li class="dropdown-item">
								<div class="dropdown-triangle"></div>
								<a href="author-profile.html">
									<figure class="user-avatar">
										<img src="{{ asset('allscript')}}/images/avatars/avatar_02.jpg" alt="">
									</figure>
								</a>
								<p class="title">
									<a href="author-profile.html"><span>MeganV.</span></a> added 
									<a href="item-v1.html"><span>Pixel Diamond Gaming Shop</span></a> to favourites
								</p>
								<p class="timestamp">2 Hours ago</p>
								<span class="notification-type primary-new icon-heart"></span>
							</li>
							<!-- /DROPDOWN ITEM -->

							<!-- DROPDOWN ITEM -->
							<li class="dropdown-item">
								<a href="author-profile.html">
									<figure class="user-avatar">
										<img src="{{ asset('allscript')}}/images/avatars/avatar_03.jpg" alt="">
									</figure>
								</a>
								<p class="title">
									<a href="author-profile.html"><span>Thomas_Ket</span></a> wrote you an 
									<a href="author-reputation.html"><span>Author’s Reputation</span></a>
								</p>
								<p class="timestamp">17 Hours ago</p>
								<span class="notification-type icon-star"></span>
							</li>
							<!-- /DROPDOWN ITEM -->
						</ul>
						<!-- /DROPDOWN NOTIFICATIONS -->
					</div>
				</div>

			<?php } ?> 

				<!-- ACCOUNT ACTIONS -->
				<div class="account-actions no-space">
				<?php if(!Auth::check()){ ?>
					<a href="#" class="interesting-link">Our Blog</a>
					<a href="#" class="interesting-link">How It Works</a>
					<a href="{{ route('register') }}" class="button primary">Register</a>
					<a href="{{ route('login') }}" class="button secondary">Login</a>
				<?php } ?>
				</div>

				<!-- /ACCOUNT ACTIONS -->
			</div>
			<!-- /USER BOARD -->
		</header>
	</div>
	
	<!-- SIDE MENU -->
	<div id="mobile-menu" class="side-menu left closed">
		<!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->

		<!-- SIDE MENU HEADER -->
		<div class="side-menu-header">
			<figure class="logo small">
				<img src="{{ asset('allscript/images/logo.png') }}" alt="logo">
			</figure>
		</div>
		<!-- /SIDE MENU HEADER -->

		<?php 

			if(Request::segment(1) == 'themeplace'){
				$get_category = DB::table('theme_category')->orderBy('sorting', 'asc')->get();
				$placename_url = 'themeplace';
			}elseif(Request::segment(1) == 'marketplace'){
				$get_category = DB::table('gig_home_category')->orderBy('sorting', 'asc')->get();
				$placename_url = 'marketplace';
			}
			else{
				$get_category = DB::table('workplace_category')->orderBy('sorting', 'asc')->get();
				$placename_url = 'workplace';
			}
		?>
		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">{{ Request::segment(1) }}</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect interactive">
			


			<?php

					foreach ($get_category as $show_category) {
						$category_id = $show_category->id;
					
				?>

			<!-- MENU ITEM -->
				<li class="dropdown-item  interactive ">
					<a href="#">{{$show_category->category_name}}											<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</a>						
					<ul class="inner-dropdown">
						<?php

						if(Request::segment(1) == 'themeplace'){
							$sub_category = DB::table('theme_subcategory')->where('category_id', $category_id)->get();
						}elseif(Request::segment(1) == 'marketplace'){
							$sub_category = DB::table('gig_subcategories')->where('category_id', $category_id)->get();
						
						}
						else{
							$sub_category = DB::table('workplace_subcategory')->where('category_id', $category_id)->get();
							
						}
						
						
						?>
						@if($sub_category)
						@foreach ($sub_category as $show_subcategory)
							<li class="inner-dropdown-item">
								<a href="{{url($placename_url.'/'.$show_category->category_url.'/'.$show_subcategory->subcategory_url)}}"><?php echo $show_subcategory->subcategory_name; ?></a>
							</li>
						@endforeach
						@endif
					</ul>
				</li>
			<?php } ?>
						
		</ul>
		<!-- /DROPDOWN -->
	</div>
	<!-- /SIDE MENU -->

	<!-- SIDE MENU -->
	<div id="account-options-menu" class="side-menu right closed">
		<!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->

	@guest
		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Your Account</p>
		<!-- /SIDE MENU TITLE -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('workplace')}}">Workplace</a>
			</li>
			<!-- /DROPDOWN ITEM -->
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('marketplace')}}" class="interesting-link">Marketplace</a>
			</li>
			
			<li class="dropdown-item">
				<a href="{{url('themeplace')}}" class="interesting-link">Themeplace</a>
			</li>
			<!-- /DROPDOWN ITEM -->
			
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('register')}}">Register</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('login')}}">Login</a>
			</li>
			<!-- /DROPDOWN ITEM -->

		</ul>

	@else
		<!-- SIDE MENU HEADER -->
		<div class="side-menu-header">
			<!-- USER QUICKVIEW -->
			<div class="user-quickview">
				<!-- USER AVATAR -->
				<a href="author-profile.html">
				<div class="outer-ring">
					<div class="inner-ring"></div>
					<?php $get_user = DB::table('users')->leftJoin('userinfos', 'users.id', 'userinfos.user_id')->where('users.username', Auth::user()->username)->first(); ?>
					<figure class="user-avatar">
						<img src="{{ asset('image/'.$get_user->user_image) }}" alt="avatar">
					</figure>
				</div>
				</a>
				<!-- /USER AVATAR -->
				<!-- USER INFORMATION -->
				<p class="user-money">{{Auth::user()->name}}</p>
				<p class="user-name">$745.00</p>
				<!-- /USER INFORMATION -->
			</div>
			<!-- /USER QUICKVIEW -->
		</div>
		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('workplace')}}">Workplace</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('marketplace')}}">Marketplace</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{url('themeplace')}}">Themeplace</a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Dashboard</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<li class="dropdown-item">
				<a href="{{url('dashboard/profile/setting')}}">Dashboard</a>
			</li>
			<li class="dropdown-item">
				<a href="{{url('/'.Auth::user()->username)}}">Profile Page</a>
			</li>
			<li class="dropdown-item">
				<a href="{{url('dashboard/profile/setting')}}">Account Settings</a>
			</li>
			<li class="dropdown-item">
				<a href="{{url('themeplace/downloads')}}">Downloads Theme</a>
			</li>

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-statement.html">Sales Statement</a>
			</li>
			<!-- /DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{ route('logout') }}"
	                       onclick="event.preventDefault();
	                                     document.getElementById('logout-form').submit();">
	                        {{ __('Logout') }}
	            </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
			</li>
		</ul>
		<!-- /DROPDOWN -->

		

		@endguest
	</div>
	
	<!-- /SIDE MENU -->
	<div class="main-menu-wrap dark">
		<div class="menu-bar">
			<nav>
				<ul class="main-menu manu2 top-highlight">
						
					
					<!-- MENU ITEM -->
					<li class="menu-item {{(Request::segment(1) == 'marketplace') ? 'manu-highlight' : null }}" >
						<a href="{{url('marketplace')}}">Marketplace</a>
					</li>
					<!-- /MENU ITEM -->
					<!-- MENU ITEM -->
					<li class="menu-item {{(Request::segment(1) == 'workplace') ? 'manu-highlight' : null }}">
						<a class="manu3" href="{{url('/workplace')}}"> Workplace </a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item {{(Request::segment(1) == 'themeplace') ? 'manu-highlight' : null }}">
						<a href="{{url('themeplace')}}">Themeplace</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="services.html">SEO Room</a>
					</li>
					<!-- /MENU ITEM -->

					
				</ul>
			</nav>
			
			<form class="search-form">
				<input type="text" class="rounded" name="search" id="search_products" placeholder="Search products here...">
				<input type="image" src="{{asset('image/search-icon.png')}}" alt="search-icon">
			</form>
		</div>
	</div>

@include('frontend.layouts.menu')
@yield('content')

@include('frontend.layouts.footer')
<!-- jQuery -->
<script src="{{ asset('/allscript/js/vendor/jquery-3.1.0.min.js') }}"></script>
<script src="{{ asset('/allscript/js/vendor/toastr.js') }}"></script>

 {!! Toastr::message() !!}
 
@yield('js')
<!-- User Quickview Dropdown -->
<script src="{{ asset('/allscript/js/user-board.js') }}"></script>
<!-- Footer -->
<script src="{{ asset('/allscript/js/footer.js') }}"></script>

<script>
jQuery(document).ready(function() {
    jQuery('#overlay').fadeOut(1000);
});
</script>
</body>

</html>
