@extends('backend.layouts.master')


@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	
@endsection
@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- /HEADLINE -->
			<div class="worklaft1">
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Title</p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Description </p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Details </p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1 selected">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Expertise </p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Visibility </p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Budget </p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Review </p>
                    <span class="sl-icon icon-check"></span>
				</a>
            </div>
			
		<form  action="{{url('dashboard/workplace/job-post/insert/step_four')}}" method="post">
                {{csrf_field()}}
            <input type="hidden" name="post_id" value="{{Request::segment(4)}}">
                    
			<div class="workr81">
                <div class="workttsr">
					<div class="workttse22">
						<h2 class="workbottom">Description</h2>
						<span> Step 4 of 7 </span>
					</div>
					<div class="workttse222">
						@foreach($get_filters as $show_filter)
							<p class="workttsw"><b>{{$show_filter->filter_msg}}</b></p>
							<input type="hidden" name="filter_id[]" value="{{$show_filter->filter_id}}">
							<p class="workttsw"><b>{{$show_filter->filter_name}}</b></p>
							<div class="container">
							  <ul class="ks-cboxtags">
							  	<?php $get_subfilters = DB::table('workplace_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>
							  	@foreach($get_subfilters as $show_subfilter)
									<li><input type="checkbox" name="subfilter_id[{{$show_filter->filter_id}}]" id="{{$show_subfilter->id}}" value="{{$show_subfilter->id}}"><label for="{{$show_subfilter->id}}"> {{$show_subfilter->sub_filtername}} </label></li>
								@endforeach
							  </ul>

							</div>
						@endforeach
					</div>
				</div>	
				<div class="cattwork">
					<b class="cattworks">Additional Options (Optional)</b><br>
					
					<p>Add screening questions and/or require a cover letter</p>
					
				</div>
				
				<div class="downloadtheme5">
					<a href="{{url('dashboard/workplace/job-post/'.$get_job->job_id.'/step/3')}}" class="button mid tertiary half v3">Back</a><br>
					<button type="submit" class="button mid secondary wicon half  v3">Next</button><br>
				</div>
				<div class="clearfix"></div>
            </div>
			<!-- PACK BOXES -->
			<!-- /PACK BOXES -->
  		</form>
			<div class="clearfix"></div>	
			

			<!-- FORM BOX ITEMS -->
			<!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->
   @endsection