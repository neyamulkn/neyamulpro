<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<title>@yield('title')</title>
	@yield('css')
	<link rel="stylesheet" href="{{ asset('allscript/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('allscript/css/custom.css') }}">
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


				<?php if(Auth::check()){ 
					$get_id = Auth::user()->id;
					$get_user_info = DB::table('userinfos')->where('user_id', $get_id)->first();

				?>
				<div class="user-quickview">
					<!-- USER AVATAR -->
					<a href="{{url('dashbord/profile/setting')}}">
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
							<a href="{{url('dashbord/profile/setting')}}">Account Settings</a>
						</li>
						<li class="dropdown-item">
							<a href="dashboard-purchases.html">Your Purchases</a>
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
					<?php $get_cart_info = DB::table('add_to_carts')->where('user_id', $get_id)->get();
						
					?>	
					<div class="account-cart-quickview">
						<span class="icon-present">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</span>

						<!-- PIN -->
						<span class="pin soft-edged secondary"><?php echo count($get_cart_info); ?></span>
						<!-- /PIN -->
					<?php if(count($get_cart_info)>0){ ?>
						<!-- DROPDOWN CART -->
						<ul class="dropdown cart closed">

								<!-- DROPDOWN ITEM -->
						@foreach($get_cart_info as $get_cart)
							
							<?php
					            $get_gigs = DB::table('gig_basics')
					                ->join('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
					                ->Join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
					                ->Join('users', 'gig_basics.gig_user_id', '=', 'users.id')
					                //->Join('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
					                ->select('gig_basics.gig_title', 'gig_prices.*', 'gig_images.image_path', 'users.username', 'users.name')
					                ->where([
					                    ['gig_basics.gig_id', '=', $get_cart->gig_id],
					                    ['users.id', '=', $get_cart->gig_user_id],
					                ])->first();

						               
						                if($get_cart->package_name == 'basic'){
						                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_basic', 'Yes')->get();
						                  
						                        $gig_title = $get_gigs->gig_title;
						                        $gig_images = $get_gigs->image_path;
						                        $package_title = $get_gigs->basic_title;
						                        $package_dsc = $get_gigs->basic_dsc;
						                        $delivery_time = $get_gigs->delivery_time_b;
						                        $price = $get_gigs->basic_p;
						                   
						                }

						                if($get_cart->package_name == 'plus'){
						                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_plus', 'Yes')->get();
						                  
						                        $gig_title = $get_gigs->gig_title;
						                        $gig_images = $get_gigs->image_path;
						                        $package_title = $get_gigs->plus_title;
						                        $package_dsc = $get_gigs->plus_dsc;
						                        $delivery_time = $get_gigs->delivery_time_p;
						                        $price = $get_gigs->plus_p;
						                    
						                }

						                if($get_cart->package_name == 'super'){
						                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_super', 'Yes')->get();
						                    
						                        
						                        $gig_title = $get_gigs->gig_title;
						                        $gig_images = $get_gigs->image_path;
						                        $package_title = $get_gigs->super_title;
						                        $package_dsc = $get_gigs->super_dsc;
						                        $delivery_time = $get_gigs->delivery_time_s;
						                        $price = $get_gigs->super_p;
						                    
						                }

						                if($get_cart->package_name == 'platinum'){
						                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_platinum', 'Yes')->get();
						                   
						                        
						                        $gig_title = $get_gigs->gig_title;
						                        $gig_images = $get_gigs->image_path;
						                        $package_title = $get_gigs->platinum_title;
						                        $package_dsc = $get_gigs->platinum_dsc;
						                        $delivery_time = $get_gigs->delivery_time_pm;
						                        $price = $get_gigs->platinum_p;
						                    
						                }


							 ?>
							<li class="dropdown-item">
								<a href="{{url('order/checkout/'.$get_cart->cart_id)}}" class="link-to"></a>
								<!-- SVG PLUS -->
								<svg class="svg-plus">
									<use xlink:href="#svg-plus"></use>
								</svg>
								<!-- /SVG PLUS -->
								<div class="dropdown-triangle"></div>
								<figure class="product-preview-image tiny">
									<img src="{{ asset('gigimages/'.$gig_images)}}" alt="">
								</figure>
								<p class="text-header tiny">{{$gig_title}}</p>
								
								<p class="price tiny"><span>$</span>{{$price}}</p>
								
							</li>

						@endforeach
							<!-- /DROPDOWN ITEM -->
						

							<!-- DROPDOWN ITEM -->
							<li class="dropdown-item">
								
							</li>
							<!-- /DROPDOWN ITEM -->
						</ul>
					<?php } ?>
						<!-- /DROPDOWN CART -->
					</div>

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
											<a href="'.url('dashbord/'.Auth::user()->username.'/manage/order/'.$notify_order->order_id).'" class="link-to"></a>
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
					<!-- <a href="" class="interesting-link header-link-login">Find Jobs</a>
					<a href="" class="interesting-link header-link-login">Find Gigs</a>
					<a href="" class="interesting-link header-link-login">Find Themes</a> -->
					<?php if(!Auth::check()){ ?>
					<a href="{{ route('register') }}" class="interesting-link header-link-login">Register</a>
					<a href="{{ route('login') }}" class="interesting-link header-link-login">Login</a>
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

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Main Links</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect interactive">
			
			<!-- MENU ITEM -->
							<li class="dropdown-item  interactive ">
					<a href="http://localhost/hotlancerd/item-filter/graphics-design">Graphics &amp; Design												<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
											</a>						
								<ul class="inner-dropdown">
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/logo-design">Logo Design</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/business-cards-stationery">Business Cards &amp; Stationery</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/illustration">Illustration</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/cartoons-caricatures">Cartoons &amp; Caricatures</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/flyers-brochures">Flyers &amp; Brochures</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/book-covers-packaging">Book Covers &amp; Packaging</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/web-mobile-design">Web &amp; Mobile Design</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/social-media-design">Social Media Design</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/banner-ads">Banner Ads</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/photoshop-editing">Photoshop Editing</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/3d-2d-models">3D &amp; 2D Models</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/t-shirts-merchandise">T-Shirts &amp; Merchandise</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/presentation-design">Presentation Design</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/infographics">infographics</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/vector-tracing">Vector Tracing</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/invitations">Invitations</a>
						</li>
											</ul>
								</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item  interactive ">
					<a href="http://localhost/hotlancerd/item-filter/digital-marketing">Digital Marketing												<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
											</a>						
								<ul class="inner-dropdown">
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/social-media-marketing">Social Media Marketing</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/seo">SEO</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/content-marketing">Content Marketing</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/video-marketing">Video Marketing</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/email-marketing">Email Marketing</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/search-display-marketing">Search &amp; Display Marketing</a>
						</li>
											</ul>
								</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item ">
					<a href="http://localhost/hotlancerd/item-filter/writing-translation">Writing &amp; Translation											</a>						
							</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item ">
					<a href="http://localhost/hotlancerd/item-filter/video-animation">Video &amp; Animation											</a>						
							</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item ">
					<a href="http://localhost/hotlancerd/item-filter/music-audio">Music &amp; Audio											</a>						
							</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item ">
					<a href="http://localhost/hotlancerd/item-filter/programming-tech">Programming &amp; Tech											</a>						
							</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item  interactive ">
					<a href="http://localhost/hotlancerd/item-filter/business">Business												<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
											</a>						
								<ul class="inner-dropdown">
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/career-advice">Career Advice</a>
						</li>
												<li class="inner-dropdown-item">
							<a href="http://localhost/hotlancerd/item-filter/flyer-distribution">Flyer Distribution</a>
						</li>
											</ul>
								</li>
				<!-- /MENU ITEM -->
							<li class="dropdown-item ">
					<a href="http://localhost/hotlancerd/item-filter/fun-lifestyle">Fun &amp; Lifestyle											</a>						
							</li>
				<!-- /MENU ITEM -->
						
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
				<a href="http://localhost/hotlancerd/item-filter/">Find Items</a>
			</li>
			<!-- /DROPDOWN ITEM -->
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="http://localhost/hotlancerd/find-job/" class="interesting-link">Find Job</a>
			</li>
			
			<li class="dropdown-item">
				<a href="http://localhost/hotlancerd/upload-job/" class="interesting-link">Post a Job</a>
			</li>
			<!-- /DROPDOWN ITEM -->
			
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="http://localhost/hotlancerd/register/">Register</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="http://localhost/hotlancerd/login/">Login</a>
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
					<figure class="user-avatar">
						<img src="{{ asset('allscript/images/avatars/avatar_01.jpg') }}" alt="avatar">
					</figure>
				</div>
				</a>
				<!-- /USER AVATAR -->

				<!-- USER INFORMATION -->
				<p class="user-name">Johnny Fisher</p>
				<p class="user-money">$745.00</p>
				<!-- /USER INFORMATION -->
			</div>
			<!-- /USER QUICKVIEW -->
		</div>
		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-notifications.html">Notifications</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-inbox.html">Messages</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="cart.html">Your Cart</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="favourites.html">Favourites</a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Dashboard</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="author-profile.html">Profile Page</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-settings.html">Account Settings</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-purchases.html">Your Purchases</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-statement.html">Sales Statement</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-buycredits.html">Buy Credits</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-withdrawals.html">Withdrawals</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-uploaditem.html">Upload Item</a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-manageitems.html">Manage Items</a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->

		<a href="#" class="button medium secondary">Logout</a>
		@endguest
	</div>
	<!-- /SIDE MENU -->
	<div class="main-menu-wrap dark">
		<div class="menu-bar">
			<nav>
				<ul class="main-menu manu2 top-highlight">
					<!-- MENU ITEM -->
					<li class="menu-item manu-highlight">
						<a class="manu3" href="index.html">Workplace </a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="how-to-shop.html">marketplace</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="products.html">Themeplace</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="services.html">SEO Room</a>
					</li>
					<!-- /MENU ITEM -->

					<!-- MENU ITEM -->
					<li class="menu-item">
						<a href="shop-gridview-v1.html">Learning</a>
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

<!-- MAIN MENU -->
	<div class="main-menu-wrap">
		<div class="menu-bar">
			<nav>
				<ul class="main-menu">
					<!-- MENU ITEM -->
				<?php
					$get_category = DB::table('gig_home_category')->orderBy('sorting', 'asc')->get();
					if($get_category){
					foreach ($get_category as $show_category) {
						$category_id = $show_category->id;
					
				?>
					<li class="menu-item category-sitebar">
						<a href="item-filter/graphics-design">{{$show_category->category_name}}
						</a>	

						<?php
						$sub_category = DB::table('gig_subcategories')->where('category_id', $category_id)->get();
						if($sub_category){
						?>
						<div class="content-dropdown home_manu">
						<!-- FEATURE LIST BLOCK -->
							<div class="feature-list-block">
								<!-- FEATURE LIST -->
								<ul class="feature-list">
									
								@foreach ($sub_category as $show_subcategory)
									<li class="feature-list-item">
										<a href="{{url('/categories/'.str_slug($show_category->category_name).'/'. str_slug($show_subcategory->subcategory_name))}}"><?php echo $show_subcategory->subcategory_name; ?></a>
									</li>
								@endforeach
								</ul>
							</div>
						</div>
						<?php } ?>
					</li>
				<?php }} ?>
				</ul>
			</nav>
		</div>
	</div>

@yield('content')

@include('frontend.layouts.footer')
<!-- jQuery -->
<script src="{{ asset('/allscript/js/vendor/jquery-3.1.0.min.js') }}"></script>
@yield('js')
<!-- User Quickview Dropdown -->
<script src="{{ asset('/allscript/js/user-board.js') }}"></script>
<!-- Footer -->
<script src="{{ asset('/allscript/js/footer.js') }}"></script>
</body>

</html>
