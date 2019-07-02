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
				<a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Title</p>
                    <span class="sl-icon icon-check"></span>
				</a>
				<a href="#" class="worklaft1 selected">
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
                <div class="workttsr v2">
					<div class="workttse22">
						<h2 class="workbottom">Description</h2>
						<span> Step 2 of 7 </span>
					</div>
					<div class="workttse222">
						<p class="workttsw"><b>Description<br>
						A good description includes:</b></p>
						
						<ul class="hhbottomg">
							<li class="hhbottom"> What the deliverable is</li>
							<li class="hhbottom"> Type of freelancer you're looking for </li>
							<li class="hhbottom"> Anything unique about the project or team </li>
						</ul>
						<div class="clearfix"></div>
						 <form  action="{{url('dashboard/workplace/job-post/insert/step_second')}}" method="post">
        					{{csrf_field()}}
						<div class="dddddddtexy">
							<input type="hidden" name="post_id" value="{{Request::segment(4)}}">
					
							<textarea id="textarea" name="job_dsc" placeholder="{{asset('/allscript')}}/enter text ...">@if($get_job) {{$get_job->job_dsc}} @endif</textarea>
							  <div id="toolbar" style="display: none;">
								<a class="bottomtt" data-wysihtml5-command="bold" title="CTRL+B"><img src="{{asset('/allscript')}}/e/1.png"></a>
								<a class="bottomtt" data-wysihtml5-command="italic" title="CTRL+I"><img src="{{asset('/allscript')}}/e/2.png"></a></a>
								<a class="bottomtt" data-wysihtml5-command="insertUnorderedList"><img src="{{asset('/allscript')}}/e/3.png"></a></a>
								<a class="bottomtt" data-wysihtml5-command="insertOrderedList"><img src="{{asset('/allscript')}}/e/4.png"></a></a>
								<a class="bottomtt" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"><img src="{{asset('/allscript')}}/e/5.png"></a></a>
							  </div>
						<div id="log" style="display: none;"></div>
						<p class="testhhhh">0/5000 characters (minimum 50)</p>
						</div>
						<div class="clearfix"></div>
						<b> Additional project files </b>
						<div class="hhjjj" >
							<div class="messagefffffff"> drag or  upload project images </div>
						</div>
						<p> You may attach up to 5 files under <b>100 MB</b> each</p>
					</div>
				</div>				
				<div class="downloadtheme5">
					<a href="{{url('dashboard/workplace/job-post/'.$get_job->job_id)}}" class="button mid tertiary half v3">Back</a><br>
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
    stylesheets:  "{{asset('/allscript')}}/e/1.css",
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

 @endsection