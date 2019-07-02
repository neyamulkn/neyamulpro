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
				<a href="#" class="worklaft1 selected">
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
            <form  action="{{url('dashboard/workplace/job-post/insert/step_third')}}" method="post">
                {{csrf_field()}}
            <input type="hidden" name="post_id" value="{{Request::segment(4)}}">
                    
			<div class="workr81">
                <div class="workttsr">
					<div class="workttse22">
						<h2 class="workbottom">Details</h2>
						<span> Step 3 of 7 </span>
					</div>
					<div class="workttse222 v1">
						<p class="workttsw"><b>What type of project do you have?</b></p>
						<div class="container">
							<div class="form cf">
								<section class="payment-plan cf">
									<input type="radio"  @if($get_job) @if($get_job->project_type == 'One-time project') checked= "checked" @endif @endif  name="project_type" id="monthly" value="One-time Project" checked><label class="monthly-label four col" for="monthly"><span class="sl-icon icon-user-follow"></span><p class="hireup">One-time project</p></label>
									<input type="radio" name="project_type"  @if($get_job) @if($get_job->project_type == 'Ongoing Project') checked= "checked" @endif @endif id="yearly" value="Ongoing Project"><label class="yearly-label four col" for="yearly"><span class="sl-icon icon-menu"></span><p class="hireup">Ongoing Project</p></label>
									<input type="radio" @if($get_job) @if($get_job->project_type == 'I am not sure') checked= "checked" @endif @endif  name="project_type" id="yearly2" value=" I am not sure"><label class="yearly-label four col" for="yearly2"><span class="sl-icon icon-user"></span><p class="hireup">I am not sure</p></label>
								</section>
							</div>
						</div>
						
					</div>
				</div>
				<div class="cattwork">
					<b class="cattworks">Additional Options (Optional)</b><br>
					
					<p>Add screening questions and/or require a cover letter</p>
					
				</div>
				<div class="downloadtheme5">
					<a href="{{url('dashboard/workplace/job-post/'.$get_job->job_id.'/step/2')}}" class="button mid tertiary half v3">Back</a><br>
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
 	<!-- /SVG MINUS -->
<script src="{{asset('/allscript')}}/e/01.js"></script>
<script src="{{asset('/allscript')}}/e/02.js"></script>
<script>
  var editor = new wysihtml5.Editor("textarea", {
    toolbar:      "toolbar",
    stylesheets:  "e/1.css",
    parserRules:  wysihtml5ParserRules
  });
  
  var log = document.getElementById("log");
  
  editor
    .on("load", function() {
      log.innerHTML += "<div>load</div>";
    })
    .on("focus", function() {
      log.innerHTML += "<div>focus</div>";
    })
    .on("blur", function() {
      log.innerHTML += "<div>blur</div>";
    })
    .on("change", function() {
      log.innerHTML += "<div>change</div>";
    })
    .on("paste", function() {
      log.innerHTML += "<div>paste</div>";
    })
    .on("newword:composer", function() {
      log.innerHTML += "<div>newword:composer</div>";
    })
    .on("undo:composer", function() {
      log.innerHTML += "<div>undo:composer</div>";
    })
    .on("redo:composer", function() {
      log.innerHTML += "<div>redo:composer</div>";
    });
</script>
<script src="{{asset('/allscript')}}/js/uploadss.js"></script>
 @endsection

