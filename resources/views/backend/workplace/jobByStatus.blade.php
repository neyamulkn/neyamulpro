
@foreach($get_jobs as $show_job)
	<div class="hotl-work" id="item{{$show_job->job_id}}">
		<div class="workj1">
			<h4 class="text-header" style="width: 100%;"><a href="{{route('job-details', $show_job->job_title_slug )}}">{{$show_job->job_title}}</a></h4>
			
		</div>
		<div class="hot-work">
			<p>@if($show_job->price_type=='monthly') Monthly Price @else Fixed Price @endif ${{$show_job->budget}}<p>
			<p>Invite-only - Created {{ \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()}}<p>
			
		</div>
		<div class="hot-work">
			<div class="p-0-right">
				
				<div class="counts-value">
					<a href="{{url('dashboard/workplace/proposals-list/'.$show_job->job_title_slug)}}">
						
						<strong class="blueberry-text" data-ng-if="counts.newApplicants">({{count($show_job->job_proposals)}})</strong>
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
					<a href="{{route('job_manage_order')}}">
						
						<strong class="blueberry-text" data-ng-if="counts.newApplicants">({{count($show_job->jobOrder)}})</strong>
					</a>
				</div>
				<p class="text-muted">Hired</p>
			</div>
			<div class="p-0-right" style="float: right;">
				<label for="sv" class="select-block v3">
                    <select onchange="action_type(this.value, '{{$show_job->job_title_slug}}', '{{$show_job->job_id}}')" name="sv" id="sv">
                        <option value="0">Action</option>
                        @if(Auth::user()->role_id == env('ADMIN'))
                        <option value="active">Approve</option>
                        <option value="reject">Reject</option>
                        @endif
                        <option value="edit">Edit</option>
                        @if($show_job->status == 'paused')
                        <option value="active">Active</option>
                        @endif
                        @if($show_job->status == 'active')
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
