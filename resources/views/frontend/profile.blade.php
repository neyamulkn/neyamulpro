@extends('frontend.layouts.master')
@section('title', 'profile')

@section('css')
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
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
					<button onclick="following('{!! $userinfo->id !!}')"  class="button mid dark spaced">Add to <span class="primary">Followers</span></button>
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
					<a  class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{asset('image/'. $userinfo->userinfo->user_image)}}" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header">{{ $userinfo->username}}</p>
					<p class="text-oneline">{{ $userinfo->user_title }}</p>
					<!-- SHARE LINKS -->
					<ul class="share-links">
						<li><a href="#" class="fb"></a></li>
						<li><a href="#" class="twt"></a></li>
						<li><a href="#" class="db"></a></li>
					</ul>
					<a href="{{route('inbox', $userinfo->username )}}" class="button mid dark-light">Send a Private Message</a>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- DROPDOWN -->
				<ul class="dropdown hover-effect">
					<li class="dropdown-item active">
						<a href="{{route('profile_view', Request::route('username'))}}">About {{Request::route('username')}}</a>
					</li>
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'workplace'])}}">Workplace</a>
					</li>
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'marketplace'])}}">Marketplace</a>
					</li>
					<li class="dropdown-item">
						<a href="{{route('userProtfolio', [Request::route('username'), 'themeplace'])}}">Themeplace</a>
					</li>
					
				</ul>
				
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content right">
				<div class="about1">
					<div class="about2">
						<p class="text-header">{{ $userinfo->userinfo->user_title}}</p><br/>
						<hr class="line-separator">
						<p class="aboutp">{{ $userinfo->userinfo->user_description}}</p>
					</div>
					<div class="about3">
						<div class="badges-showcase-item column">
							<p class="text-header">${{ $userinfo->hourly_rate}} Hourly rate</p><br/>
							<hr class="line-separator">
							<br/>
							<figure class="badge big liquid">
								<img src="{{asset('/allscript')}}/images/badges/community/bronze_b.png" alt="">
							</figure>
						</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
				
				<div class="row"> 
					<div class="exeheader">Experience level</div>
					<hr>
					<div class="col-md-4 text-center">
					  <div class="icon-box i-large ib-black <?php if($userinfo->userinfo->skill_level == 'Entry') {echo 'active';} ?> ">
						
						<div class="ib-info">
						  <p class="text-header">Entry level</p>
						  <p>Starting to build experience in my field of work
						  </p>
						</div>
					  </div>
					</div>
					
					<!-- Icon -->
					<div class="col-md-4 text-center">
					  <div class="icon-box i-large ib-black <?php if($userinfo->userinfo->skill_level == 'Intermediate') {echo 'active';} ?>">
						
						<div class="ib-info">
						  <p class="text-header">Intermediate Level</p>
						  <p> A few years of professional experience in my field.</p>

						</div>
					  </div>
					</div>
					
					<!-- Icon -->
					<div class="col-md-4 text-center">
					  <div class="icon-box i-large ib-black <?php if($userinfo->userinfo->skill_level == 'Expert') {echo 'active';} ?> ">
						
						<div class="ib-info">
						  <p class="text-header">Expert Level</p>
						  <p>Many years of professional experience doing complex projects.</p>
						</div>
					  </div>
					</div>
				</div>
				<div class="clearfix"></div>
				
				<div class="aboutbb">
					<div class="aboutbb2">
						<h3 class="resume-category-title clearfix">EDUCATION <span class="icon-plus"></span></h3>
						<div class="resume-post">
							<div class="resume-post-body">
								<div class="resume-post-date">2006 - 2007</div>
								<p class="resume-post-title">Viena Programming School</p>
								<p class="resume-post-subtitle">PHP Computer School</p>
								<div class="resume-post-cont">
									<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										laudantium, totam rem aperiam, eaque ipsa quae.</p>
								</div>
							</div>
						</div>
						<div class="resume-post">
							<div class="resume-post-body">
								<div class="resume-post-date">2006 - 2007</div>
								<p class="resume-post-title">Viena Programming School</p>
								<p class="resume-post-subtitle">PHP Computer School</p>
								<div class="resume-post-cont">
									<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										laudantium, totam rem aperiam, eaque ipsa quae.</p>
								</div>
							</div>
						</div>
						<h3 class="resume-category-title clearfix">PROFESSIONAL EXPERIENCE <span class="icon-plus"></span></h3>
						<div class="resume-post">
							<div class="resume-post-body">
								<div class="resume-post-date">2006 - 2007</div>
								<p class="resume-post-title">Viena Programming School</p>
								<p class="resume-post-subtitle">PHP Computer School</p>
								<div class="resume-post-cont">
									<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										laudantium, totam rem aperiam, eaque ipsa quae.</p>
								</div>
							</div>
						</div>
						<div class="resume-post">
							<div class="resume-post-body">
								<div class="resume-post-date">2006 - 2007</div>
								<p class="resume-post-title">Viena Programming School</p>
								<p class="resume-post-subtitle">PHP Computer School</p>
								<div class="resume-post-cont">
									<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										laudantium, totam rem aperiam, eaque ipsa quae.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="aboutbb3">
						<h4>Author Skill</h4><br/>
						<hr class="line-separator">
						<br/>
						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">FIREWORKS</p>
								<p class="text-header">86%</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg1 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="188" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">ILLUSTRATOR</p>
								<p class="text-header">1200/2000</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg2 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="131" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">PHOTOSHOP</p>
								<p class="text-header">1.250.500</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg3 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="208" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->
						<h4>LANGUAGE SKILLS</h4><br/>
						<hr class="line-separator">
						<br/>
						<div class="aboutll"><img class="aboutlll" src="{{asset('/allscript')}}/images/en.png" alt=""><p class="aboutl">ENGLISH</p></div><br/>
						<div class="aboutll"><img class="aboutlll" src="{{asset('/allscript')}}/images/gr.png" alt=""><p class="aboutl">GERMAN</p></div><br/>
						<div class="aboutll"><img class="aboutlll" src="{{asset('/allscript')}}/images/fr.png" alt=""><p class="aboutl">FRENCH</p></div>
						
					</div>
				</div>
				
				<div class="aboutinfo">
					<div class="aboutinfo1">
					<iframe width="410" height="272" src="https://www.youtube.com/embed/tqKpk1wABuI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
					<div class="aboutinfo2">
						<img class="aboutinfoimg" src="{{asset('/allscript')}}/images/9.jpg" alt="">
					</div>
				</div>
				
				<div class="brand-list ul-li">
					<div class="abbrand">
						<a href="#!">
							<img src="{{asset('/allscript')}}/images/brand1.png" alt="Brand Image">
						</a>
					</div>
					<div class="abbrand">
						<a href="#!">
							<img src="{{asset('/allscript')}}/images/brand1.png" alt="Brand Image">
						</a>
					</div>
					<div class="abbrand">
						<a href="#!">
							<img src="{{asset('/allscript')}}/images/brand1.png" alt="Brand Image">
						</a>
					</div>
					<div class="abbrand">
						<a href="#!">
							<img src="{{asset('/allscript')}}/images/brand1.png" alt="Brand Image">
						</a>
					</div>
					<div class="abbrand">
						<a href="#!">
							<img src="{{asset('/allscript')}}/images/brand1.png" alt="Brand Image">
						</a>
					</div>
				</div>
				<!-- /HEADLINE -->
			</div>
			<!-- CONTENT -->

			<div class="clearfix"></div>
		</div>
	</div>
@endsection

@section('js')
<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>
<script src="{{asset('/allscript')}}/js/vendor/jquery.chart.min.js"></script>
<!-- bxSlider -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.bxslider.min.js"></script>

<!-- Dashboard Header -->
<script src="{{asset('/allscript')}}/js/dashboard-header.js"></script>
<!-- Dashboard Statistics -->
<script src="{{asset('/allscript')}}/js/dashboard-statistics.js"></script>

<script>
	function following(following_id){
		
		$.ajax({
			method:'post',
			url:'{{route("following.store")}}',
			data:{
				following_id:following_id,
				_token:"{!!  csrf_token()  !!}"
			},
			success:function(data){
				toastr.success(data);
			}
		});

	}
</script>
@endsection