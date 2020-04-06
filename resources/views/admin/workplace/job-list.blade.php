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
				<h4>Job Lists</h4>
				<a href="#" class="button mid-short secondary">Rehire a Freelancer</a>
				<a href="{{route('job_post')}}" class="button primary">Post a Job</a>
			</div>
			<div><p style="color: green">{{Session::get('success')}}</p> </div>
			<div class="post-tab xmtab" style="display: block;">
				<?php $all = $active = $draft = $pending = $reject = $paused = $paused = 0;
					$jobs = DB::table('jobs')->selectRaw('status, count(status) as totalStatus')
							->groupBy('status')->get();
	        		
	        		foreach ($jobs as $show_status) {
	        			if($show_status->status == 'active'){ $active = $show_status->totalStatus ; }
	        			if($show_status->status == 'draft'){ $draft = $show_status->totalStatus ; }
		        		if($show_status->status == 'pending'){ $pending = $show_status->totalStatus ; }
		        		if($show_status->status == 'reject'){ $reject = $show_status->totalStatus ; }
		        		if($show_status->status == 'paused'){ $paused = $show_status->totalStatus ; }
	        			
	        		}
	        		$all = $active+$draft+$pending+$paused+ $reject;
				?>
				<div class="tab-header primary">
					<!-- TAB ITEM -->
					<div class="tab-item {{(Request::route('status') == 'active' || !Request::route('status') ) ? 'selected': ''}}" onclick="get_jobs('active')">
						<p class="text-header">ACTIVE({{$active}}) </p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'draft') ? 'selected': ''}}"  onclick="get_jobs('draft')">
						<p class="text-header">DRAFT({{$draft}})</p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'pending') ? 'selected': ''}}"  onclick="get_jobs('pending')">
						<p class="text-header">PENDING APPROVAL({{$pending}})</p>
					</div>
					
					<div class="tab-item {{(Request::route('status') == 'reject') ? 'selected': ''}}"  onclick="get_jobs('reject')">
						<p class="text-header">REJECT({{$reject}})</p>
					</div>

					<div class="tab-item {{(Request::route('status') == 'paused') ? 'selected': ''}}"  onclick="get_jobs('paused')">
						<p class="text-header">PAUSED({{$paused}})</p>
					</div>
					
					<div class="tab-item {{(Request::route('status') == 'all') ? 'selected': ''}}"  onclick="get_jobs('all')">
						<p class="text-header">ALL({{$all}})</p>
					</div>
					<!-- /TAB ITEM -->
				</div>
				<!-- /TAB HEADER -->
 
	            <div class="form-box-items">
					<div class="hotlancer-work">
						<div class="hotla-work" id="show_jobs">
							@if(count($get_jobs)>0)
							@foreach($get_jobs as $show_job)
								<div class="hotl-work" id="item{{$show_job->job_id}}">
									<div class="workj1">
										<h4 class="text-header" style="width: 100%;"><a href="{{route('job-details', $show_job->job_title_slug )}}">{{$show_job->job_title}}</a></h4>
										
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
													<strong class="blueberry-text" data-ng-if="counts.newApplicants">(1 NEW)</strong>
												</a>
											</div>
											<p class="text-muted">Proposals</p>
										</div>
										<div class="p-0-right">
											<div class="counts-value">
												<a href="#">
													<strong>1</strong>
													<strong class="blueberry-text" data-ng-if="counts.newApplicants">(1 NEW)</strong>
												</a>
											</div>
											<p class="text-muted">Messages</p>
										</div>
										<div class="p-0-right">
											<div class="counts-value">
												<a href="#">
													<strong>0</strong>
													<strong class="blueberry-text" data-ng-if="counts.newApplicants">(0 NEW)</strong>
												</a>
											</div>
											<p class="text-muted">Hired</p>
										</div>
										<div class="p-0-right" style="float: right;">
											<label for="sv" class="select-block v3">
		                                        <select onchange="action_type(this.value, '{{$show_job->job_title_slug}}', '{{$show_job->job_id}}')" name="sv" id="sv">
		                                            <option value="0">Action</option>
						                            <option value="active">Approve</option>
						                            <option value="reject">Reject</option>
						                            <option value="edit">Edit</option>
						                            @if($show_job->status == 'paused')
							                        <option value="active">Active</option>
							                        @else
							                        <option value="paused">Paused</option>
							                        @endif
		                                            <option value="delete">Delete</option>
		                                           
		                                        </select>
		                                        <!-- SVG ARROW -->
		                                        <svg class="svg-arrow">
		                                            <use xlink:href="#svg-arrow"></use>
		                                        </svg>
		                                        <!-- /SVG ARROW -->
		                                    </label>
											
										</div>
									</div>

								</div>
							@endforeach
							@else <h3>No job found.</h3> @endif
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection
@section('js')  
<script type="text/javascript">

    function get_jobs(status){
    	history.pushState({}, null, '{{route("job_list")}}/'+status);
        var  link = '{{route("job_list")}}/'+status+'?ajaxRequest=status';

        $.ajax({
            url:link,
            method:"get",
            success:function(data){
                if(data){

                    $('#show_jobs').html(data);
              	}
           	}
        });
    }

	function action_type(type, job_url=null, job_id=null) {
		if(type == 'delete' || type == 'paused'  || type == 'active'){
	    	if (confirm("Are you sure "+type+" it.?")) {
		       
	            var  link = '{{route("job_status")}}';
	            $.ajax({
	            url:link,
	            method:"get",
	            data:{
	            	job_id: job_id,status:type
	            },
	            success:function(data){
	                if(data){
	                    $("#item"+job_id).hide();
	                    toastr.success(data);
	                }else{
	                	toastr.error('Sorry something is wrong');
	                }
		           }
		        
		        });
		    }
		    return false;
		}
		
		else if(type == 'edit'){
			var url = '{{route("job_post", ":job_url")}}';
			window.location.replace(url.replace(':job_url', job_url));
		}else{
			return false;
		}
	}

	$('.tab-item').on('click', function(){
	    $('.tab-item').removeClass('selected');
	    $(this).addClass('selected');
	});

</script>
<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>

@endsection
