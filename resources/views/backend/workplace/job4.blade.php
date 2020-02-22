@extends('backend.layouts.master')
@section('title', $get_job->job_title)

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	<!-- tags -->
   	<link href="{{asset('tags')}}/typeahead.css"  rel="stylesheet" />
   	<link href="{{asset('tags')}}/bootstrap-tagsinput.css" rel="stylesheet">
	<!--end tags -->
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
            <input type="hidden" name="slug" value="{{$get_job->job_title_slug}}">
                    
			<div class="workr81">
                <div class="workttsr">
					<div class="workttse22">
						<h2 class="workbottom">Expertise</h2>
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
					<b class="cattworks">Search Tags</b><br>
					
					<div class="ttinput-group">
						<div class="inputs">
							<label class="select-block va">
							<input type="text" value="{{$get_job->search_tag }}" name="search_tag"  id="tags-input" data-role="tagsinput" />
							</label>
							<small>Does this layout stretch when resized horizontally (liquid)? Or does it stay the same (fixed)?</small>
						</div>
					</div>
				</div>
				
				<div class="downloadtheme5">
					<a href="{{url('dashboard/workplace/job-post/'.$get_job->job_title_slug.'/step/3')}}" class="button mid tertiary half v3">Back</a><br>
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

   @section('js')

	<!-- tags  -->
	<script src="{{asset('tags')}}/typeahead.js"></script>
	<script src="{{asset('tags')}}/bootstrap-tagsinput.js"></script>
	<script>

	    var countries = new Bloodhound({
	      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	      queryTokenizer: Bloodhound.tokenizers.whitespace,
	      prefetch: {
	        url: '{{ url("/tags/input/") }}',
	        filter: function(list) {
	          return $.map(list, function(name) {
	            return { name: name }; });
	        }
	      }
	    });
	    countries.initialize();

	    $('#tags-input').tagsinput({

	      typeaheadjs: {
	        name: 'countries',
	        displayKey: 'name',
	        valueKey: 'name',
	        source: countries.ttAdapter()
	      }
	    });
	</script>

	<!-- end tags
	 -->

   @endsection