@extends('backend.layouts.master')

@section('title', 'All postings jobs ')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
@endsection

@section('content')
 
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
			<div class="headline simple primary">
				<h4>Buy Credits</h4>
				<a href="#" class="button mid-short secondary">Rehire a Freelancer</a>
				<a href="#" class="button primary">Post a Job</a>
			</div>
			<div class="form-box-items wrap-1-3 right">
				<div class="hotlancer-work">
					<h3 class="up-post-sub">Additional Details</h3>
					<div class="up-sub-mainup">
						
					</div>
				</div>
				
			</div>
            <div class="form-box-items wrap-3-1 left">
				<div class="hotlancer-work">
					<div class="hotla-work">
						<h3 class="up-post-sub">Additional Details</h3>
						<p style="color: green">{{Session::get('success')}}</p>
						@foreach($get_jobs as $show_job)
							<div class="hotl-work">
								<div class="workj1">
									<h4 class="text-header"><a href="{{route('job-details', $show_job->job_title_slug )}}">{{$show_job->job_title}}</a></h4>
									<div class="workj2">
									<span class="icon-like workj4"></span>
									<span class="icon-heart workj4"></span>
									</div>
								</div>
								<div class="hot-work">
									<p>@if($show_job->price_type=='monthly') Monthly Price @else Fixed Price @endif<p>
									<p>Invite-only - Created {{ \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()}}<p>
									
								</div>
								<div class="hot-work">
									<div class="p-0-right">
										<?php $get_proposal = DB::table('job_proposals')
														->where('job_id', $show_job->job_id)
														->count(); 
														?>
										<div class="counts-value">
											<a href="{{url('dashboard/workplace/proposals-list/'.$show_job->job_id)}}">
												<strong>{{$get_proposal}}</strong>
												<strong class="blueberry-text" data-ng-if="counts.newApplicants">(16 NEW)</strong>
											</a>
										</div>
										<p class="text-muted">Proposals</p>
									</div>
									<div class="p-0-right">
										<div class="counts-value">
											<a href="#">
												<strong>16</strong>
												<strong class="blueberry-text" data-ng-if="counts.newApplicants">(16 NEW)</strong>
											</a>
										</div>
										<p class="text-muted">Messages</p>
									</div>
									<div class="p-0-right">
										<div class="counts-value">
											<a href="#">
												<strong>16</strong>
												<strong class="blueberry-text" data-ng-if="counts.newApplicants">(16 NEW)</strong>
											</a>
										</div>
										<p class="text-muted">Hired</p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					
				</div>
				<div class="hotlancer-work">
					<h3 class="up-post-sub">Additional Details</h3>
					<div class="hotl-work">
						<div class="workj1">
							<h4 class="text-header"><a href="https://www.hotlancer.com/work1.html">Help me sell my spare WordPress WPEngine site installs</a></h4>
							<div class="workj2">
							<span class="icon-like workj4"></span>
							<span class="icon-heart workj4"></span>
							</div>
						</div>
						<div class="hot-work">
							<p>Saved 30 days ago<p>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection
@section('js')  

<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>

@endsection
