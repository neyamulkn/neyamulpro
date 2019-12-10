@extends('backend.layouts.master')
@section('title', 'theme upload')

@section('css')
<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">


	<style>
.select-block.va {
    width: 78%;
}
input[type="radio"], input[type="radio"] {
    display: -webkit-box !important;
	float: left;
    margin-right: 7px;
    margin-top: 5px;
}
label.select-block {
    float: left;
    width: 78% !important;
}
input[type="number"] {
    width: 185% !important;
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
    width: 79% !important;
    float: right;
}

.upload-file .button {
	height: 30px !important;
}
.upload-file .upload-file-progress .upload-bar{
	padding-top: 7px;
}
.upload-file .upload-file-actions p{
	width: 200px;
}

.form-box-items.wrap-1-3 {

    margin-left: 16px;
    float: left;
}
.form-box-items .form-box-item{
	width: 100% !important;
}

</style>

<!-- tags -->
   <link href="{{asset('tags')}}/typeahead.css"  rel="stylesheet" />
    <link href="{{asset('tags')}}/bootstrap-tagsinput.css" rel="stylesheet">
    <style>
 
    .twitter-typeahead { display:initial !important; }
    .bootstrap-tagsinput {line-height:40px;display:block !important;}
    .bootstrap-tagsinput .tag {background:#09F;padding:5px;border-radius:4px;}
    .tt-hint {top:2px !important;}
    .tt-input{vertical-align:baseline !important;}
    .typeahead { border: 1px solid #CCCCCC;border-radius: 4px;padding: 8px 12px;width: 300px;font-size:1.5em;}
    .tt-menu { width:300px; }
    span.twitter-typeahead .tt-suggestion {padding: 10px 20px;  border-bottom:#CCC 1px solid;cursor:pointer;}
    span.twitter-typeahead .tt-suggestion:last-child { border-bottom:0px; }
    .demo-label {font-size:1.5em;color: #686868;font-weight: 500;}
    .bgcolor {max-width: 440px;height: 200px;background-color: #c3e8cb;padding: 40px 70px;border-radius:4px;margin:20px 0px;}
    .tt-menu{width: 100%;}
    .ttinput-group{overflow: hidden;}
    </style>
<!--end tags -->


@endsection

@section('content')
       <!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary">
        <h4>Upload Item</h4>
    </div>
    <!-- /HEADLINE -->
	<!-- FORM BOX ITEMS -->
	<div class="form-box-items wrap-3-1 left">
		<!-- FORM BOX ITEM -->
		<div class="form-box-item full">

			<h4>Item Specifications</h4>
			<!-- INPUT CONTAINER -->

				<div class="ttinput-group">
				  <label style="float: left;" class="rl-label required" for="name">Name</label>
				  <div class="inputs">
					<input class="ttinput-groupg" form="main_form" value="{{$get_theme->theme_name}}" required="required" type="text" id="name" name="theme_name"  maxlength="100">
					<small class="ttinput-group">Maximum 100 characters. No HTML allowed. Follow our <a href="#">Item Title Naming Conventions</a>.</small>
				  </div>
				</div>

				<div class="input-container">
					<label class="rl-label required">Upload Main File</label>
					<!-- UPLOAD FILE -->
					<div class="upload-file">
						<div class="upload-file-actions">
							<form id="fileUploadForm" method="post" action="{{ route('file_upload') }}" enctype="multipart/form-data">
	                      		@csrf
								<input type="file" onchange="uploadselectFile()" required="required" style="display: none;" name="uploadFile" id="uploadFile">
								<label for="uploadFile" class="button dark-light">Upload File...</label>
								<p><span id="success">Max file size 2gb</span>  <span class="loader" style="display: none;">
									<img src="{{asset('image/loading.gif')}}" width="20" /></span></p>
								<input type="hidden" name="theme_url" value="{{Request::segment(4)}}">
								<input type="submit" style="display: none;" id="main_fileSubmit" />
							</form>
						</div>
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="progress">
			                      <div class="progress-bar progress-bar-file" role="progressbar" aria-valuenow=""
			                      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
			                        0%
			                      </div>
                   				</div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header progress-percent">0%</p>
							<span id="closeBtn"></span>
						</div>
					</div>
					<!-- UPLOAD FILE -->
				</div>
				<!-- /INPUT CONTAINER -->
				<div class="input-container">
					<label class="rl-label required">Upload Main Image</label>
					<!-- UPLOAD FILE -->
					<div class="upload-file">
						<div class="upload-file-actions">
						<form id="imageUploadForm" method="post" action="{{ route('image_upload') }}" enctype="multipart/form-data">
                      		@csrf
							<input type="file" onchange="uploadselectImage()" required="required" style="display: none;" name="uploadImage" id="uploadImage">
							<label for="uploadImage" class="button dark-light">Upload File...</label>
							<p ><span id="success-image">Max file size 2gb </span>
								<span style="display: none;" class="loader-image" ><img src="{{asset('image/loading.gif')}}" width="20" /></span></p>

							<input type="hidden" name="theme_url" value="{{Request::segment(4)}}">
							<input type="submit" style="display: none;" id="main_imageSubmit" />
						</form>
						</div>
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="progress">
			                      <div class="progress-bar progress-bar-image" role="progressbar" aria-valuenow=""
			                      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
			                        0%
			                      </div>
                   				</div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header progress-percent-image">0%</p>
							<span id="closeBtn-image"></span>
						</div>
					</div>
					<!-- UPLOAD FILE -->
				</div>
				<!-- /INPUT CONTAINER -->
				<div class="clearfix"></div>
				 
			<form action="{{ route('insert_theme') }}" id="main_form" method="post" data-parsley-validate  enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="theme_url" value="{{Request::segment(4)}}">
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="summary">Summary</label>
				  <div class="inputs">
					<textarea class="ttinput-groupg" required="required" type="text" id="summary" name="summary" maxlength="100">{{$get_theme->summary}}</textarea>
					
					<small class="ttinput-group">Highlight what makes your item unique or a key selling point. They appear on search result pages next to an image of your item. Max 45 characters per line. No HTML allowed. Do not repeat features or keyword spam. Key Feature guidelines</a>.</small>
				  </div>
				</div>
				<!-- /INPUT CONTAINER -->
				
				<!-- INPUT CONTAINER -->
				<div class="ttinput-grouptt">
				  <label class="ttinput-groupt" for="description"> Description</label>
					<div class="inputs">
						<div class="inputseditor  ttinput-groupg" >
							
							
							<textarea id="textarea" required="required" type="text" name="description" id="description" placeholder="Go on, start editing ...">{{$get_theme->description}}</textarea>
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
						</div>
					</div>
					
				</div>
				<!-- /INPUT CONTAINER -->

				<br/>

				<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt" for="name">Sub category </label>
							<div class="inputs">
								<label for="sv" class="select-block va">
									<select required="required" name="sub_category" id="vr">
										@foreach($get_subcategory as $show_subcategory)
											<option {{( $show_subcategory->id == $get_theme->sub_category)? 'selected' : '' }} value="{{$show_subcategory->id}}" >{{$show_subcategory->subcategory_name}}</option>
										@endforeach
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
								<small class="ttinput-group">Does this layout stretch when resized horizontally (liquid)? Or does it stay the same (fixed)?</small>
							</div>
						</div>
						<div class="clearfix"></div>
						
				<!-- /INPUT CONTAINER -->
				
				@foreach($get_filters as $show_filter)

				@if($show_filter->type == 'radio' )
					
						<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt" >{{ $show_filter->filter_name}}</label>
							 <div class="inputs">
							 	
								<label class="themeswwqq"><input class="themeswwqqrd" type="radio" value="Yes" name="radio[{{ $show_filter->filter_id}}]"> Yes</label>
								<label class="themeswwqq"><input class="themeswwqqrd" type="radio" value="No"  name="radio[{{ $show_filter->filter_id}}]"> No</label>
								<label class="themeswwqq"><input class="themeswwqqrd" type="radio" value="N/A" name="radio[{{ $show_filter->filter_id}}]" > N/A</label>
							</div>
						</div>
						<div class="clearfix"></div>

				@endif

				@if($show_filter->type == 'select' )
						<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt">{{ $show_filter->filter_name}}</label>
						  <div class="inputs">

							<?php $get_subfilters = DB::table('theme_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>
							
							<select multiple="multiple" name="select[{{$show_filter->filter_id}}]" id="hhhfgfd">
								@foreach($get_subfilters as $show_subfilter)
									<option value="{{$show_subfilter->sub_filtername}}">{{$show_subfilter->sub_filtername}}</option>
								@endforeach
							</select>
						  </div>
						</div>
						<div class="clearfix"></div>

					@endif

					@if($show_filter->type == 'dropdown' )
						<div class="clearfix"></div>
						<div class="ttinput-group">
						  	<label class="ttinput-groupt" for="name">{{ $show_filter->filter_name}}</label>
							<div class="inputs">
								<label for="sv" class="select-block">
									<?php $get_subfilters = DB::table('theme_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>
									
									<select name="dropdown[{{$show_filter->filter_id}}]" id="sv">
										
										@foreach($get_subfilters as $show_subfilter)
											<option value="{{$show_subfilter->sub_filtername}}">{{$show_subfilter->sub_filtername}}</option>
										@endforeach
										<option value="N/A">N/A</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
								<small class="ttinput-group">Does this layout stretch when resized horizontally (liquid)? Or does it stay the same (fixed)?</a></small>
							</div>
						</div>
						<div class="clearfix"></div>

					@endif
				@endforeach

				<div class="clearfix"></div>
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name">Demo URL</label>
					<div class="inputs">
						<input class="ttinput-groupg" value="{{$get_theme->demo_url}}" type="text" id="name" name="demo_url"  maxlength="100">
						<small class="ttinput-group">Link to a live preview on your own hosting (i.e. https://my-site.com/demo/)</a></small>
					</div>
				</div>
			

				<div class="clearfix"></div>
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name"> Screenshort URL</label>
					<div class="inputs">
						<input class="ttinput-groupg" value="{{$get_theme->screenshort_url}}" type="text" id="name" name="screenshort_url"  maxlength="100">
						<small class="ttinput-group">Link to a live Screenshort preview on your own hosting (i.e. https://my-site.com/Screenshort/)</a></small>
					</div>
				</div>
				<!-- /INPUT CONTAINER -->
				<div class="clearfix"></div>

				<div class="ttinput-group">
					  <label class="ttinput-groupt" for="name">Search Tags</label>
						<div class="inputs">
							<label class="select-block va">
							<input type="text" value="" style="border:none !important;" name="search_tag" value="" id="tags-input" data-role="tagsinput" />
							</label>
							<small class="ttinput-group">Does this layout stretch when resized horizontally (liquid)? Or does it stay the same (fixed)?</a></small>
						</div>
					</div>

				<div class="clearfix"></div>
				<div class="box-stacked-radius-top">
					<h3 class="t-heading -size-s">Set Your Price <span>(US$)</span></h3>
					<p class="t-body -size-m h-m0">
					  It's important that you set the price for your items independently and not discuss your pricing
					  decisions with other authors. The item price will <strong>include</strong> your author fee
					  and your initial term of item support (if you offer it).
					  See our <a href="#">Author Terms</a>
					  and <a href="#">Item Support</a>
					  breakdown if you want to know more.
					</p>
				</div>
				<div class="box35stacked ">
					<div class="licenseing">
						<label class="regular-price">Regular License</label>
						<div class="js-licefdnse">
							<div class="license-pricing__formula">
								<div class="licekk"><br>$</div>
								<div class="licensel">
								  Item price
								  <br>
								  <input value="{{ $get_theme->price_regular}}" class="jspricld" type="number" required="required" min="1" maxlength="7" id="price_regular"  name="price_regular" >
								</div>
								
								
							</div>
						</div>
						<div class="licendation">
						  Recommended<br>
						  purchase price<br>
						  $44 - $59
						</div>
					</div>
				</div>

				<div class="box35stacked ">
					<div class="licenseing">
						<label class="regular-price">Extended License</label>
						<div class="js-licefdnse">
							<div class="license-pricing__formula">
								<div class="licekk"><br>$</div>
								<div class="licensel">
								  Item price
								  <br>
								  <input value="{{ $get_theme->price_extented }}" class="jspricld" type="number" autocomplete="off"  min="1" step="1" maxlength="7" id="regular-price" name="price_extented">
								</div>
								
								
							</div>
						</div>
						<div class="licendation">
						  Recommended<br>
						  purchase price<br>
						  $2,200 - $2,950
						</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
				
				<hr class="line-separator">
				<button type="submit" onclick="form_sumbit()" style="width: 100% !important" id="form_sumbit_btn" style="height: 55px !important;" class="button big dark">Submit Item <span class="primary">for Review</span></button>
			</form>
		</div>
		<!-- /FORM BOX ITEM -->
	</div>
	<!-- /FORM BOX ITEMS -->


	<!-- FORM BOX ITEMS -->
	<div class="form-box-items wrap-1-3">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item v2">
					<h4>Upload Queue</h4>
					<hr class="line-separator">
					<!-- PG BAR LIST -->
					<div class="pg-bar-list">
						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Professional Business Card</p>
								<p class="text-header">86%</p>
								<p class="timestamp">4 days ago</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg1 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="188" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Professional Business Card</p>
								<p class="text-header">92%</p>
								<p class="timestamp">12 days ago</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg2 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="201" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->
					</div>
					<!-- /PG BAR LIST -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Upload Guidelines</h4>
					<hr class="line-separator">
					<!-- PLAIN TEXT BOX -->
					<div class="plain-text-box">
						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">File Upload:</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->

						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Photos and Images:</p>
							<p>Lorem ipsum dolor sit amet.<br>Consectetur adipisicing elit, sed do.</p>
							<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->

						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Guide with Links:</p>
							<p><a href="#" class="primary">Click here for the link.</a></p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->
					</div>
					<!-- /PLAIN TEXT BOX -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
	<!-- /FORM BOX ITEMS -->

	<div class="clearfix"></div>
</div>
<!-- DASHBOARD CONTENT -->


@endsection

@section('js')

<script type="text/javascript" src="{{asset('allscript/js/jquery.form.js')}}"></script>


<script type="text/javascript">
	
	function remove_item(file_item){

	//var  link = '{{route("delete_folder_item")}}/'+file_item;
alert(file_item);
	// $.ajax({
	//     url:link,
	//     method:"get",
	//     data:{
	//         file_item:file_item
	//     },
	//     success:function(data){
	//         if(data){
	           
	//           $('.progress-bar-'+type).text('0%');
	//           $('.progress-percent-'+type).text('0%');
	//           $('.progress-bar-'+type).css('width', '0%');
	           
	//       	}
	//    	}
	// });
}
</script>
<script>

function uploadselectFile(){
   $("#main_fileSubmit").click();
}

$(document).ready(function(){

    $('#fileUploadForm').ajaxForm({
      beforeSend:function(){
        $('.loader').css('display', 'block');
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar-file').text(percentComplete + '%');
        $('.progress-percent').text(percentComplete + '%');
        $('.progress-bar-file').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar-file').text('0%');
          $('.progress-percent').text('0%');
          $('.progress-bar-file').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar-file').text('Upload completed');
          $('.progress-bar-file').css('width', '100%');
          $('#closeBtn').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('.loader').css('display', 'none');
          $('#success').html(data.image);
        }
      }
    });
 });

function uploadselectImage(){
   $("#main_imageSubmit").click();
}

$(document).ready(function(){
    $('#imageUploadForm').ajaxForm({
      beforeSend:function(){
         $('.loader-image').css('display', 'block');
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar-image').text(percentComplete + '%');
        $('.progress-percent-image').text(percentComplete + '%');
        $('.progress-bar-image').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar-image').text('0%');
          $('.progress-percent-image').text('0%');
          $('.progress-bar-image').css('width', '0%');
          $('#success-image').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar-image').text('Upload completed');
          $('.progress-bar-image').css('width', '100%');
          $('#closeBtn-image').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('.loader-image').css('display', 'none');
          $('#success-image').html(data.image);
        }
      }
    });

});

</script>

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


<script type="text/javascript">
	function form_sumbit(){

	var theme_name = document.getElementById('name').value;
	var summary = document.getElementById('summary').value;
	var textarea = document.getElementById('textarea').value;
	var price_regular = document.getElementById('price_regular').value;
	var main_image = document.getElementById('main_image').value;
	var main_file = document.getElementById('main_file').value;

	if( theme_name != '' && textarea != '' && price_regular != '' && summary != '' && main_image != '' && main_file != '' ){
		document.getElementById('form_sumbit_btn').innerHTML = 'Uploading please wait...';

	}

	
}
</script>

<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>

<!-- Dashboard UploadItem -->
<script src="{{asset('/allscript')}}/js/dashboard-uploaditem.js"></script>
@endsection