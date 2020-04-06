@extends('backend.layouts.master')

@section('title', 'All proposals lists ')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	<style type="text/css">
		.active {
		    border-bottom: none !important;
		}
		.text-muted {
		    color: #fff !important;
		}

		.comment-list .comment-wrap {
		    padding: 10px 15px 0 70px;
		    border-bottom: 1px solid #e8e8e8;
		}
		.comment-list .comment-wrap .comment .text-header { margin: 0; }
	</style>
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <div class="hlot-manus">
				<div class="breadcrumhot">
					<a class="hotlmanuss" href="{{url('workplace/'.Request::route('slug'))}}" target="_blank">
						<span class="d-md-none">View Job</span> <span class="d-none d-md-inline">View Job Post</span>
					</a>
					<a class="hotlmanuss" href="#">
						<div> <span class="d-none d-md-block">Invite Freelancers</span></div>
					</a>
					<a class="hotlmanuss active" href="#">
						<span> Review<span class="d-none d-md-inline"> Proposals</span>
						<strong class="text-muted d-none d-sm-inline"> <span>({{$get_proposals->total()}}) </span></strong></span>
					</a>
					<a class="hotlmanuss" href="{{route('job_manage_order')}}">
						<div> <span> <span>Hire</span><strong class="text-muted d-none d-sm-inline"> (<span>0</span>) </strong></span></div>
					</a>
				</div>
			</div>
			<!-- POST TAB -->
				<div class="post-tab">
					<!-- TAB HEADER -->
					<div class="tab-header tertiary">
						<!-- TAB ITEM -->
						<div class="tab-item selected">
							<p class="text-header">Applicant List</p>
						</div>
						<!-- /TAB ITEM -->

					</div>
					<!-- /TAB HEADER -->

					<!-- TAB CONTENT -->
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							<!-- COMMENT -->
						@if(count($get_proposals)>0)
							@foreach($get_proposals as $show_proposal)
							<div class="comment-wrap">
								<!-- USER AVATAR -->
								<a href="user-profile.html">
									<figure class="user-avatar">
										<img src="{{asset('/image/'.$show_proposal->user_image)}}" alt="">
									</figure>
								</a>
								<!-- /USER AVATAR -->
								<div class="comment">
									<div class="hot-workl1">
										<div class="hot-work1">
											<a href="{{ route('profile_view', $show_proposal->user->username) }} " class="text-header">{{$show_proposal->user->name}}</a>
											
											<br>
											<b>{{$show_proposal->user->user_title}}</b>
										</div>
										<div class="hot-work2">
											<p class="timestamp1">${{$show_proposal->proposal_budget}}</p>
											<p class="timestamp1"> Total Works ({{count($show_proposal->user->jobOrder)}}) </p>
											<p class="timestamp1">{{ \Carbon\Carbon::parse($show_proposal->created_at)->diffForHumans()}}</p>
											<p class="timestamp1"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$show_proposal->user->country}}</p>
										</div>
										<div class="hot-work3">
											<p>{!! str_limit($show_proposal->proposal_dsc, 220) !!}</p>
										</div>
									</div>
									<div class="hot-workr1">
										
										<div class="hot-work2">
											<a href="{{route('inbox', $show_proposal->user->username)}}" class="timestamp2"><span class="sl-icon icon-like"></span> Send Message </a>
											<a href="{{route('applicant_hire', [$show_proposal->job_title_slug, $show_proposal->user->username])}}" class="timestamp2"><span class="sl-icon icon-like"></span> Hire Freelancer</a>
										</div>
									</div>
									
								</div>
							</div>
							@endforeach
							<div style="text-align: right;"> {{$get_proposals->links()}}</div>
						@else
							<h1 style="padding-top:10px;color: #ddd; font-weight: bold;">No candidates</h1>
						@endif
						</div>
						<!-- /COMMENTS -->
					</div>
					<!-- /TAB CONTENT -->

					<!-- TAB CONTENT -->
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
						</div>
						<!-- /COMMENTS -->
					</div>
					<!-- /TAB CONTENT -->

					
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							
						</div>
						<!-- /COMMENTS -->
					</div>
					<div class="tab-content void">
					</div>
					<!-- /TAB CONTENT -->
				</div>
				<!-- /POST TAB -->
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection
@section('js')  

<!-- Tooltipster -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src="{{asset('/allscript')}}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Tweet -->
<script src="{{asset('/allscript')}}/js/vendor/twitter/jquery.tweet.min.js"></script>

<!-- Liquid -->
<script src="{{asset('/allscript')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{asset('/allscript')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{asset('/allscript')}}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src="{{asset('/allscript')}}/js/post-tab.js"></script>

<!-- Item V1 -->

<script src="{{asset('/allscript')}}/js/item-v2.js"></script>
<!-- Tooltip -->
<script src="{{asset('/allscript')}}/js/tooltip.js"></script>

 @endsection