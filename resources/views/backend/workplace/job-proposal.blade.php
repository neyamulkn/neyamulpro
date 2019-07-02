@extends('backend.layouts.master')

@section('title', 'Submit job proposal')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">

<style>
.up-items33 {
    float: left;
    /* position: static; */
    width: 30%;
    /* margin-left: 23px; */
}

#toolbar [data-wysihtml5-action] {
float: right;
}

#toolbar,
textarea {
width: 100%;
padding: 5px;
-webkit-box-sizing: border-box;
-ms-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

textarea {
height: 400px;
border: 1px #b2b2b2 solid;
font-family: Verdana;
font-size: 14px;
padding: 5px;
}

textarea:focus {
color: black;
border: 2px solid black;
padding: 5px;
}

.wysihtml5-command-active {
font-weight: bold;
}

[data-wysihtml5-dialog] {
	margin: -50px 0 0;
    padding: 5px;
    border: 1px solid #999999;
    position: relative;
    background-color: white;
}

a[data-wysihtml5-command-value="red"] {
color: red;
}

a[data-wysihtml5-command-value="green"] {
color: green;
}

a[data-wysihtml5-command-value="blue"] {
color: red;
}
  
  
.gig-edit-toolbar {
    height: 40px;
    border: 1px #ddd solid;
    padding-bottom: 46px !important;
}
.gig-edit-toolbar .toolbar-btn {
    float: left;
    position: relative;
    width: 40px;
    height: 40px;
    text-indent: -9999px;
    border-right: 1px #ddd solid;
    background: 0 0;
    cursor: pointer;
}
.gig-edit-toolbar .toolbar-btn:before {
    content: '';
    width: 40px;
    height: 40px;
    position: absolute;
    top: 0;
    left: 0;
    background: url({{asset('/allscript')}}/e/hlbg.png) 0 0 no-repeat;
}
.gig-edit-toolbar .toolbar-btn.bold:before {
    background-position: -1px 10px;
}
.gig-edit-toolbar .toolbar-btn.ul:before {
    background-position: -43px 10px;
}
.gig-edit-toolbar .toolbar-btn.ol:before {
    background-position: -84px 10px;
}
.gig-edit-toolbar .toolbar-btn.strong:before {
    background-position: -128px 10px;
}
.gig-edit-toolbar .toolbar-btn.italic:before {
    background-position: -169px 10px;
}
.gig-edit-toolbar .toolbar-btn.link:before {
    background-position: -341px 10px;
}
.gig-edit-toolbar .toolbar-btn.unlink:before {
    background-position: -384px 10px;
}
.gig-edit-toolbar .toolbar-btn.image:before {
    background-position: -213px 10px;
}
.gig-edit-toolbar .toolbar-btn.image:before {
    background-position: -213px 10px;
}
.gig-edit-toolbar .toolbar-btn.h1:before {
    background-position: -255px 10px;
}
.gig-edit-toolbar .toolbar-btn.h2:before {
    background-position: -300px 10px;
}
.gig-edit-toolbar .toolbar-btn.h3:before {
    background-position: -852px 10px;
}
.gig-edit-toolbar .toolbar-btn.code:before {
    background-position: -425px 10px;
}
.gig-edit-toolbar .toolbar-btn.view:before {
    background-position: -765px 10px;
}
.gig-edit-toolbar .toolbar-btn.undo:before {
    background-position: -639px 10px;
}
.gig-edit-toolbar .toolbar-btn.redo:before {
    background-position: -681px 10px;
}
.gig-edit-toolbar .toolbar-btn.left:before {
    background-position: -509px 10px;
}
.gig-edit-toolbar .toolbar-btn.center:before {
    background-position: -551px 10px;
}
.gig-edit-toolbar .toolbar-btn.right:before {
    background-position: -595px 10px;
}
.gig-edit-toolbar .toolbar-btn.underline:before {
    background-position: -723px 10px;
}
.gig-edit-toolbar .toolbar-btn.hr:before {
    background-position: -808px 10px;
}


.gig-edit-toolbar .toolbar-btn:hover, .gig-edit-toolbar .toolbar-btn.wysihtml5-command-active {
    background-color: #f4f4f4;
    box-shadow: 2px 2px 6px #ccc inset;
}
.gig-edit-editor-wrap.inside {
    height: 360px;
    box-shadow: inset 2px 2px 2px #e3e3e3;
}
.textarea-input-requirements {
    font-size: 12px;
    line-height: 120%;
    color: #999;
    padding-top: 5px;
}
code {
    background: #ddd;
    padding: 10px;
    white-space: pre;
    display: block;
    margin: 1em 0;
}
.cf {
    zoom: 1;
}
.rf {
    float: right;
}
.lf {
    float: left;
}

.ttinput-groupg {
    width: 77%;
    float: right;
}
</style>
@endsection

@section('content')
<?php $user_id = Auth::user()->id ; ?>
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <div class="hotlancer-work">
				<h3 class="up-post-sub">Job details</h3>
				<p style="color: green;padding-left: 10px;">{{Session::get('success')}}</p>
				<p style="color: red;padding-left: 10px;">{{Session::get('error')}}</p>
				<div class="up-sub-main">
					<div class="up-sub1">
						<b class="up-subb">{{$get_job->job_title}}</b>
						<div class="clearfix"></div>
						<div class="tag-list primary"><a href="{{url($get_job->username)}}" class="tag-list-item">{{$get_job->username}}</a>  Posted {{ \Carbon\Carbon::parse($get_job->created_at)->diffForHumans()}}</div>
						<P>{{$get_job->job_dsc}}</P>
						<a href="{{url('workplace/'.$get_job->job_title_slug)}}" target="_blank">View job posting</a>
					</div>
					<div class="up-sub2">
						<b class="up-subb"><i class="fa fa-check"></i> {{$get_job->experience}} Level</b>
						<b class="up-subb"><i class="fa fa-check"></i> Hours to be determined</b>
						<b class="up-subb"><i class="fa fa-check"></i>
							@if($get_job->project_time==1)
									Less than 1 month
								@endif
								@if($get_job->project_time==2)
									1 to 3 months
								@endif
								@if($get_job->project_time==3)
									3 to 6 months
								@endif
								@if($get_job->project_time==4)
									More than 6 months
								@endif</b>
					</div>
					
					<div class="clearfix"></div>
					<hr class="line-separator">
					<h4 class="up-cat1">Skills and expertise</h4>
					<div class="tag-list primary up-cat">
						<?php 

								$get_filters = DB::table('job_expertise')
			                        ->join('workplace_filters', 'job_expertise.filter_id', 'workplace_filters.filter_id')
			                        ->where('job_expertise.job_id', $get_job->job_id)->get();

							?>
								 @foreach($get_filters as $show_filter)

			                         <?php
									 $get_subfilters = DB::table('workplace_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>


								 @foreach($get_subfilters as $show_subfilter)
									<a href="#" class="tag-list-item">{{$show_subfilter->sub_filtername}}</a>
								@endforeach
							@endforeach
					</div>
				</div>
			</div>
		
			<!-- /SECTION -->
			<div class="hotlancer-work">
				<h3 class="up-post-sub">Additional Details</h3>
				<div class="clearfix"></div>
				<div class="up-sub-main2">
					<div class="up-sub3">
						<div class="up-item">
							<div class="up-items1">
								<b>Your project budget </b>
								<p>Total amount the client will see on your proposal</p>
							</div>
							<div class="up-items2">
								<div class="">
									<input name="proposal_budget" value="@if($exist_proposal) {{$exist_proposal->proposal_budget}} @endif" form="submit" class="updollar" placeholder="0.00">
									<img class="updollar1" src="{{asset('/allscript')}}/images/ddd.png" alt="avatar">
								</div>
							</div>
							<div class="up-items3">
								<p class="text-header">/@if($get_job->price_type=='monthly')monthly @else fixed @endif</p>
							</div>
						</div>
				<form action="{{url('workplace/insert-proposal')}}" id="submit" method="post">{{csrf_field()}}
				<input type="hidden" name="job_id" value="{{$get_job->job_id}}">
				<input type="hidden" name="buyer_id" value="{{$get_job->user_id}}">
				<!-- update for proposal -->
				<input type="hidden" name="proposal_id" value="@if($exist_proposal) {{$exist_proposal->proposal_id}} @endif">
				</form>
					@if($get_job->price_type=='fixed')
						<div class="up-item">
							<div class="up-items1">
								<b>Fixed - Project duration </b>
								<p>Total amount the client will see on your proposal</p>
							</div>
							<div class="up-items2">
								<div class="">
									<input form="submit" name="price_type" value="@if($exist_proposal) {{$exist_proposal->price_type}} @endif" class="updollar" placeholder="example, 10 day">
									
								</div>
							</div>
							<div class="up-items3">
								<p class="text-header">/day</p>
							</div>
						</div>
					@else

						<div class="up-item">
							<div class="up-items1">
								<b>Everyday work</b>
								<p>Select how much work everyday</p>
							</div>
							<div class="up-items33">
								<label for="sv" class="select-block">
								<select form="submit" name="price_type" id="sv">
									<?php for ($i=1; $i <= 12; $i++) {  ?>  
                                        <option value="{{$i}}" <?php echo ($exist_proposal) ? ($exist_proposal->price_type == $i) ? 'selected' : ' ' : '';  ?> >Everyday {{$i}} hours</option>
                                    <?php } ?>
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
							</div>
							<div class="up-items3">
								<p class="text-header">/daily</p>
							</div>
						</div>
					@endif
					</div>
					
					<div class="up-sub4">
						<img class="up-img" src="{{asset('/allscript')}}/images/dd.png" alt="avatar">
						<b class="up-subb v2">Includes Hotlancer <br/>Protection. Learn more</b>
					</div>
				</div>
			</div>

			<div class="hotlancer-work">
				<h3 class="up-post-sub">Additional Details</h3>
				<div class="up-sub-mainup">
					<label for="item_description" class="rl-label required">Project Cover Letter</label>

					<label class="rl-label required">Project files</label>
				</div>
			</div>

			<div class="hotlancer-work">
					<h3 class="up-post-sub">Additional Details</h3>
					<div class="up-sub-mainup">
						<label for="item_description" class="rl-label required">Project Cover Letter</label>

						<textarea form="submit" id="textarea" required="required" name="proposal_dsc" placeholder="Go on, start editing ..."><?php echo ($exist_proposal) ? $exist_proposal->proposal_dsc : ''; ?></textarea>
							<div id="toolbar" class="gig-edit-toolbar" style="display: block;">
								<a class="toolbar-btn bold" data-wysihtml5-command="bold" title="CTRL+B"></a>
								<a class="toolbar-btn ul" data-wysihtml5-command="insertUnorderedList" title="CTRL+I"></a>
								<a class="toolbar-btn ol" data-wysihtml5-command="insertOrderedList"></a>
								<a class="toolbar-btn strong" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></a>
								<a class="toolbar-btn italic" data-wysihtml5-command="italic" title="CTRL+I"></a>
								<a class="toolbar-btn left" data-wysihtml5-command="justifyLeft" title="Align left"></a>
								<a class="toolbar-btn center" data-wysihtml5-command="justifyCenter" title="Align Center"></a>
						        <a class="toolbar-btn right" data-wysihtml5-command="justifyRight" title="Align Right"></a>        
								<a class="toolbar-btn undo" data-wysihtml5-command="undo" title="Undo"></a>
								<a class="toolbar-btn redo" data-wysihtml5-command="redo" title="Redo"></a>
								
								<a class="toolbar-btn view" data-wysihtml5-action="change_view" title="Switch to html view"></a>
								
								<div data-wysihtml5-dialog="createLink" style="display: none;">
								  <label>
									Link:
									<input data-wysihtml5-dialog-field="href" value="http://">
								  </label>
								  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
								</div>
						    
								<div data-wysihtml5-dialog="insertImage" style="display: none;">
								  <label>
									Image:
									<input data-wysihtml5-dialog-field="src" value="http://">
								  </label>
								  <label>
									Align:
									<select data-wysihtml5-dialog-field="className">
									  <option value="">default</option>
									  <option value="wysiwyg-float-left">left</option>
									  <option value="wysiwyg-float-right">right</option>
									</select>
								  </label>
								  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
								</div>
							</div>
							<div class="textarea-input-requirements cf"><span class="char-counter rf ">1090/1200 Characters</span><span class="lf ">min. 120</span></div>

							
							<div id="log" style="display: none;"></div>
						<br/><br/>

						<label class="rl-label required">Project files</label>
						<div class="up-box up-drop">
						  <label class="rl-label required" style="padding-top:15px; cursor: pointer;" for="proposal_dsc"> upload project files </label>
						  <input type="file " form="submit" style="display: none;cursor: pointer; " id="proposal_dsc" name="proposal_file">
						</div>
						
						<div class="clearfix"></div>
						<hr class="line-separator">
						<button type="submit" form="submit" class="button big dark">Submit Item <span class="primary">for Review</span></button>
						
					</div>
				
			</div>

			<div class="clearfix"></div>			

			<!-- FORM BOX ITEMS -->
			<!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->

@endsection


@section('js')
 	<!-- /SVG MINUS -->
<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	


<script src="{{asset('/allscript')}}/js/advanced.js"></script>
<script src="{{asset('/allscript')}}/js/wysihtml.js"></script>

<script>
  var editor = new wysihtml5.Editor("textarea", {
    toolbar:        "toolbar",
    stylesheets:    "{{asset('/allscript')}}/e/1.css",
    parserRules:    wysihtml5ParserRules
  });
  
  var log = document.getElementById("log");
  
  editor
    .on("load", function() {
      log.innerHTML += "<div>load</div>";
    })
    .on("focus", function() {
      log.innerHTML += "<div>focus</div>";
    })
    .on("red", function() {
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