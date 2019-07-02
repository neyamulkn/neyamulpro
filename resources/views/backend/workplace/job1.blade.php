@extends('backend.layouts.master')

@section('title', 'Post a Job')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	
@endsection

@section('content')
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <!-- /HEADLINE -->
		<div class="worklaft1">
			<a href="#" class="worklaft1 selected">
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
			<a href="#" class="worklaft1">
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
       
		<div class="workr81">

		<form  action="{{url('dashboard/workplace/job-post/insert')}}" method="post">
        	{{csrf_field()}}
            <div class="workttsr">
				<div class="workttse22">
					<h2 class="workbottom">Get Started </h2>
					<span> Step 1 of 7 </span>
				</div>
				<div class="workttse222">
					<b class="workttsw">Enter the name of your job post</b>
					<!-- this for update -->
					<input type="hidden" name="post_id" value="{{Request::segment(4)}}">
					
					<textarea type="text" name="post_title" class="workttsweditor">@if($get_job) {{$get_job->job_title}} @endif</textarea>
					<b class="workttsw">Here are some good examples:</b>
					<br>
					<div class="hhbottomg">
						<p class="hhbottom"> Developer needed for creating a responsive WordPress Theme </p>
						<p class="hhbottom"> CAD designer to create a 3D model of a residential building </p>
						<p class="hhbottom"> Need a design for a new company logo </p>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="cattwork">
				<b class="cattworks">Job Category</b><br>
				<div class="input-container half v2">
					<label for="sv" class="select-block">
						<select name="category_id" id="category_id" required="">
							@if(!$get_job) <option value="">Select category</option> @endif
						@foreach($get_category as $show_category)
							<option  @if($get_job) @if($get_job->category_id == $show_category->id) selected  @endif @endif value="{{$show_category->id}}">{{$show_category->category_name}}</option>
							
						@endforeach
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<div class="input-container half v2">
					<label for="sv" class="select-block">
						<select name="subcategory" id="subcategory" required="">
							
							 @if($get_job)
							 	
							 	<option value="{{$get_job->subcategory_id}}">{{$get_job->subcategory_name}}</option>
							 @else
							 	<option value="">select category first</option>
							 @endif

						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				
			</div>
			<div class="downloadtheme5">
				<a href="#" class="button mid tertiary half v3">Exit</a><br>
				<button type="submit" class="button mid secondary wicon half  v3">Next</button><br>
			</div>
			<div class="clearfix"></div>
		</form>
        </div>
		<!-- PACK BOXES -->
		
    </div>
    <!-- DASHBOARD CONTENT -->
@endsection


@section('js')

<script type="text/javascript">
	

	$(document).ready(function(){
    $('#category_id').on('change',function(){
        var category_id = $(this).val();
       
        if(category_id){
            $.ajax({
                method:'get',
                url:'{{url("dashboard/workplace/get_subcategory")}}/'+category_id,
                success:function(data){
                	if(data){
                    	$('#subcategory').html(data);
                    }
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select category first</option>');

        }
    });

});
</script>

@endsection
