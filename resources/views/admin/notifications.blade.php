
@extends('admin.layouts.master')

@section('title', 'All Notifications')

@section('content')
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <!-- HEADLINE -->
        <div class="headline buttons primary">
            <h4>Your Notifications</h4>
			<a href="#" class="button mid-short primary">Mark all as Read</a>
        </div>
        <!-- /HEADLINE -->

		<!-- PROFILE NOTIFICATIONS -->
		<div class="profile-notifications">
			<!-- PROFILE NOTIFICATION -->
			<div class="profile-notification">
				<!-- NOTIFICATION CLOSE -->
				<div class="notification-close"></div>
				<!-- NOTIFICATION CLOSE -->
				<div class="profile-notification-date">
					<p>2 Hours ago</p>
				</div>
				<div class="profile-notification-body">
					<figure class="user-avatar">
						<img src="{{asset('allscript')}}/images/avatars/avatar_02.jpg" alt="user-avatar">
					</figure>
					<p><span>MeganV.</span> added <span>Pixel Diamond Gaming Shop</span> to favourites</p>
				</div>
				<div class="profile-notification-type">
					<span class="type-icon icon-heart primary"></span>
				</div>
			</div>
			<!-- PROFILE NOTIFICATION -->

			<!-- PROFILE NOTIFICATION -->
			<div class="profile-notification">
				<!-- NOTIFICATION CLOSE -->
				<div class="notification-close"></div>
				<!-- NOTIFICATION CLOSE -->
				<div class="profile-notification-date">
					<p>17 Hours ago</p>
				</div>
				<div class="profile-notification-body">
					<figure class="user-avatar">
						<img src="{{asset('allscript')}}/images/avatars/avatar_03.jpg" alt="user-avatar">
					</figure>
					<p><span>Thomas_Ket</span> wrote you an <span>Author's Reputation</span></p>
				</div>
				<div class="profile-notification-type">
					<span class="type-icon icon-star primary"></span>
				</div>
			</div>
			<!-- PROFILE NOTIFICATION -->

			<!-- PROFILE NOTIFICATION -->
			<div class="profile-notification">
				<!-- NOTIFICATION CLOSE -->
				<div class="notification-close"></div>
				<!-- NOTIFICATION CLOSE -->
				<div class="profile-notification-date">
					<p>8 Days ago</p>
				</div>
				<div class="profile-notification-body">
					<figure class="user-avatar">
						<img src="{{asset('allscript')}}/images/avatars/avatar_04.jpg" alt="user-avatar">
					</figure>
					<p><span>Red Thunder Graphics</span> commented on <span>3D Layers - Web Mockup</span></p>
				</div>
				<div class="profile-notification-type">
					<span class="type-icon icon-bubble primary"></span>
				</div>
			</div>
			<!-- PROFILE NOTIFICATION -->

			<!-- PROFILE NOTIFICATION -->
			<div class="profile-notification">
				<!-- NOTIFICATION CLOSE -->
				<div class="notification-close"></div>
				<!-- NOTIFICATION CLOSE -->
				<div class="profile-notification-date">
					<p>1 Week ago</p>
				</div>
				<div class="profile-notification-body">
					<figure class="user-avatar">
						<img src="{{asset('allscript')}}/images/avatars/avatar_15.jpg" alt="user-avatar">
					</figure>
					<p><span>Amy Glush</span> purchased <span>Miniverse - Hero Image Composer</span></p>
				</div>
				<div class="profile-notification-type">
					<span class="type-icon icon-tag"></span>
				</div>
			</div>
			<!-- PROFILE NOTIFICATION -->

			<!-- PROFILE NOTIFICATION -->
			<div class="profile-notification">
				<!-- NOTIFICATION CLOSE -->
				<div class="notification-close"></div>
				<!-- NOTIFICATION CLOSE -->
				<div class="profile-notification-date">
					<p>1 Week ago</p>
				</div>
				<div class="profile-notification-body">
					<figure class="user-avatar">
						<img src="{{asset('allscript')}}/images/avatars/avatar_15.jpg" alt="user-avatar">
					</figure>
					<p><span>Amy Glush</span> commented on <span>Miniverse - Hero Image Composer</span></p>
				</div>
				<div class="profile-notification-type">
					<span class="type-icon icon-bubble"></span>
				</div>
			</div>
			<!-- PROFILE NOTIFICATION -->

			<!-- PROFILE NOTIFICATION -->
			<div class="profile-notification">
				<!-- NOTIFICATION CLOSE -->
				<div class="notification-close"></div>
				<!-- NOTIFICATION CLOSE -->
				<div class="profile-notification-date">
					<p>4 Months ago</p>
				</div>
				<div class="profile-notification-body">
					<figure class="user-avatar">
						<img src="{{asset('allscript')}}/images/avatars/avatar_10.jpg" alt="user-avatar">
					</figure>
					<p><span>Haunted Mouse</span> wrote you an <span>Author’s Reputation</span></p>
				</div>
				<div class="profile-notification-type">
					<span class="type-icon icon-star primary"></span>
				</div>
			</div>
			<!-- PROFILE NOTIFICATION -->
		</div>
		<!-- /PROFILE NOTIFICATIONS -->

		<!-- PAGER -->
		<div class="pager-wrap">
			<div class="pager primary">
				<div class="pager-item"><p>1</p></div>
				<div class="pager-item active"><p>2</p></div>
				<div class="pager-item"><p>3</p></div>
				<div class="pager-item"><p>...</p></div>
				<div class="pager-item"><p>17</p></div>
			</div>
		</div>
		<!-- /PAGER -->
    </div>
    <!-- DASHBOARD CONTENT -->
@endsection