<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/select2.min.css">
   
	@yield('css')

	<link rel="stylesheet" href="{{asset('/allscript')}}/css/style.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/custom.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/toastr.css">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>@yield('title')</title>

	<style type="text/css">
	.image_upload{
		position: absolute;left:0; border-radius: 50%; background:rgba(255,255,255,.7); text-align: center; padding-top:40%; width: 100%; height: 100%; display: none;transition: 2s;
	}

	.user_imagess:hover .image_upload{
		display: block;
		position: absolute;left:0;
		top: 0px;
		transition: 2s;
	}
	#overlay {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		/*background-color: rgba(0,0,0, .3);*/
		background-image: url("{{asset('image/loading.gif')}}");
		background-position: center;
	    background-repeat: no-repeat;
	}

	.uploading {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 1;
		text-align: center;
		padding:10%;
		background-color: rgba(154, 150, 150, 0.3);
		background-image: url("{{asset('image/spinner.gif')}}");
		background-position: center;
	    background-repeat: no-repeat;
	}

	</style>
</head>
<body>
<div id="overlay"></div>
	<!-- SIDE MENU -->
	<div id="dashboard-options-menu" class="side-menu dashboard left closed">
        <!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->
        
		<!-- SIDE MENU HEADER -->
		<div class="side-menu-header">
			<!-- USER QUICKVIEW -->
			<div class="user-quickview">
				<!-- USER AVATAR -->
				
				<div class="outer-ring" data-toggle="modal" data-target="#user_imageModal">
					<div class="inner-ring"></div>
					<?php $id = Auth::user()->id; 
						$user_image = DB::table('userinfos')->where('user_id', $id)->first();
					?>
					<figure class="user-avatar">
						<img  src="{{asset('image/'.$user_image->user_image)}}" alt="avatar">
					</figure>
					<input type="file" id="user_image" name="user_image" style="display: none;">
				</div>

				<!--user image Modal -->
				<div class="modal fade" id="user_imageModal" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Update image</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>	
						</div>
				        <form action="{{url('user/image/upload')}}" method="post" enctype="multipart/form-data" id="form1" runat="server">
				        <div class="modal-body">
				         
				         	{{csrf_field()}}
				         		<label for="user_imagess" class="user_imagess"  style="position: relative; margin: 0px auto; width: 200px;height: 200px; background: #ccc;border-radius: 50%;">
						        <input type='file' required="" name="user_image" style="display: none;" id="user_imagess" onchange="readURL(this);" />
						        <img id="blah" src="{{asset('image/'.$user_image->user_image)}}" alt="" style=" width: 200px; height: 200px;border-radius: 50%;" />

						        <span class="image_upload"><span style="font-size: 35px" class="sl-icon icon-camera"></span></span>
						        </label>
						   
				        </div>
				        <div class="modal-footer">
				          <button type="submit" class="btn btn-default" >Update</button>
				        </div>
				         </form>
				      </div>
				      
				    </div>
				  </div>
				
				<!-- /USER AVATAR -->

				<!-- USER INFORMATION -->
				<p class="user-name">{{Auth::user()->username}}</p>
				<p class="user-money">${{Auth::user()->wallet}}</p>
				<!-- /USER INFORMATION -->
			</div>
			<!-- /USER QUICKVIEW -->
		</div>
		<!-- /SIDE MENU HEADER -->
		<ul class="dropdown dark hover-effect interactive">
		
		<p class="side-menu-title">Your Account</p>
		<!-- /SIDE MENU TITLE -->
		<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{route('profile_setting')}}">
                    <span class="sl-icon icon-settings"></span>
                    Profile Settings
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{route('notifications')}}">
                    <span class="sl-icon icon-star"></span>
                    Notifications
                </a>
                <!-- PIN -->
                <span class="pin soft-edged big primary">49</span>
                <!-- /PIN -->
			</li>
			<li class="dropdown-item">
				<a href="{{route('inbox')}}">
                    <span class="sl-icon icon-envelope"></span>
                    Messenger
                </a>
                <!-- PIN -->
                <span class="pin soft-edged big secondary">!</span>
                <!-- /PIN -->
			</li>
			<li class="dropdown-item">
				<a href="{{url('dashboard/affiliate/program/')}}">
                    <span class="sl-icon icon-star"></span>
                    Affiliate program
                </a>
                
			</li>

			<li class="dropdown-item">
				<a href="{{url('dashboard/earnings/balance')}}">
                    <span class="sl-icon icon-star"></span>
                    Earnings Statement
                </a>
			</li>

			<p class="side-menu-title">Workplace Setting</p>

			<li class="dropdown-item interactive">
				<a href="#">
                    <span class="sl-icon icon-tag"></span>
                    Workplace
                    <!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</a>

				<!-- INNER DROPDOWN -->
				<ul class="inner-dropdown">
					
					<li class="inner-dropdown-item">
						<a href="{{url('dashboard/workplace/job-post')}}">Workplace add job</a>
						
					</li>
					
					<li class="inner-dropdown-item">
						<a href="{{url('dashboard/workplace/job-list')}}">Workplace job list</a>
					</li>
					<li class="inner-dropdown-item">
						<a href="{{route('job_manage_order')}}">Workplace Order History</a>
					</li>

				</ul>
				<!-- INNER DROPDOWN -->
			</li>

			<p class="side-menu-title">Seller Manage Items</p>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item interactive">
				<a href="#">
                    <span class="sl-icon icon-tag"></span>
                    Marketplace
                    <!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</a>

				<!-- INNER DROPDOWN -->
				<ul class="inner-dropdown">
					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="{{url('dashboard/manage-gigs/active')}}">Marketplace Items List</a>
						
					</li>
					<!-- /INNER DROPDOWN ITEM -->

					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="{{url('dashboard/create-gig')}}">Marketplace Add Item</a>
					</li>
					<li class="inner-dropdown-item">
						<a href="{{route('manage_gig_order', 'active')}}">Marketplace Order History</a>
					</li>
				
					<!-- /INNER DROPDOWN ITEM -->
				</ul>
				<!-- INNER DROPDOWN -->
				
			</li>

			<p class="side-menu-title">Themeplace</p>

			<li class="dropdown-item interactive">
				<a href="#">
                    <span class="sl-icon icon-tag"></span>
                   Themeplace
                    <!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</a>

				<!-- INNER DROPDOWN -->
				<ul class="inner-dropdown">
					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="{{route('manage_theme', 'active')}}">Themeplace Item List</a>
					</li>
					<!-- /INNER DROPDOWN ITEM -->

					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="{{route('upload_theme')}}">Themeplace Add Item</a>
					</li>
					<!-- /INNER DROPDOWN ITEM -->
				</ul>
				<!-- INNER DROPDOWN -->
				
                <!-- PIN -->
                <span class="pin soft-edged big secondary">!</span>
                <!-- /PIN -->
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->
<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Info &amp; Statistics</p>
		<!-- /SIDE MENU TITLE -->



         <!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Author Tools</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
            <!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="{{route('withdrawal')}}">
                    <span class="sl-icon icon-wallet"></span>
                    Withdrawals
                </a>
			</li>
		</ul><br/>
		<!-- /DROPDOWN -->
		<a href="{{route('switchUser')}}" class="button primary">Become a @if(Auth::user()->role_id == env('BUYER')) Seller @else Buyer @endif</a>

        <a  class="button medium secondary" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span class="sl-icon icon-logout"></span> {{ __('Logout') }}</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
	</div>
	<!-- /SIDE MENU -->

    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        <!-- DASHBOARD HEADER -->
        <div class="dashboard-header retracted">
            <!-- DB CLOSE BUTTON -->
            <a href="{{url('/')}}" class="db-close-button">
               <img src="{{asset('/allscript')}}/images/dashboard/back-icon.png" alt="back-icon">
            </a>
            <!-- DB CLOSE BUTTON -->

			<!-- DB OPTIONS BUTTON -->
            <div class="db-options-button">
               <img src="{{asset('/allscript')}}/images/dashboard/db-list-right.png" alt="db-list-right">
			   <img src="{{asset('/allscript')}}/images/dashboard/close-icon.png" alt="close-icon">
            </div>
            <!-- DB OPTIONS BUTTON -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item title">
                <!-- DB SIDE MENU HANDLER -->
                 <div class="db-side-menu-handler">
                    <img src="{{asset('/allscript')}}/images/dashboard/db-list-left.png" alt="db-list-left">
                </div>
                <!-- /DB SIDE MENU HANDLER -->
                <h6>Your Dashboard</h6>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

			<!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item form">
                <form class="dashboard-search">
                    <input type="text" name="search" id="search_dashboard" placeholder="Search on dashboard...">
                    <input type="image" src="{{asset('/allscript')}}/images/dashboard/search-icon.png" alt="search-icon">
                </form>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart1">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus primary">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>64.579</h6>
                    <p>New Original Visits</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart2">
                        <!-- SVG PLUS -->
                        <svg class="svg-minus tertiary">
                            <use xlink:href="#svg-minus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>20.8</h6>
                    <p>Less Sales Than Last Month</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart3">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus primary">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>322k</h6>
                    <p>Total Visits This Month</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

			<!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item back-button">
                <a href="{{url('/')}}" class="button mid dark-light">Back to Homepage</a>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
        </div>
        <!-- DASHBOARD HEADER -->
