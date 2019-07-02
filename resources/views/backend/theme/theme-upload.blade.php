@extends('backend.layouts.master')
@section('title', 'theme upload')

@section('css')
<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">

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
    width: 77%;
    float: right;
}
</style>
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
			<span style="color: green; font-weight: bold;">{{Session::get('msg')}}</span>
			<hr class="line-separator">
			<form action="{{url('/dashboard/theme/upload')}}" method="post" data-parsley-validate  enctype="multipart/form-data">
				{{csrf_field()}}
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name">Name</label>
				  <div class="inputs">
					<input class="ttinput-groupg" required="required" type="text" id="name" name="theme_name" value="" maxlength="100">
					<small class="ttinput-group">Maximum 100 characters. No HTML allowed. Follow our <a href="#">Item Title Naming Conventions</a>.</small>
				  </div>
				</div>
				<!-- /INPUT CONTAINER -->
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name">Summary</label>
				  <div class="inputs">
					<textarea class="ttinput-groupg" required="required" type="text" id="name" name="summary" value="" maxlength="100"></textarea>
					
					<small class="ttinput-group">Highlight what makes your item unique or a key selling point. They appear on search result pages next to an image of your item. Max 45 characters per line. No HTML allowed. Do not repeat features or keyword spam. Key Feature guidelines</a>.</small>
				  </div>
				</div>
				<!-- /INPUT CONTAINER -->
				
				<!-- INPUT CONTAINER -->
				<div class="ttinput-grouptt">
				  <label class="ttinput-groupt" for="name"> Description</label>
					<div class="inputs">
						<div class="inputseditor">
							
							
							<textarea id="textarea" required="required" name="description" placeholder="Go on, start editing ..."></textarea>
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

				<!-- INPUT CONTAINER -->
				<div class="input-container">
					<label class="rl-label required">Upload Main File</label>
					<!-- UPLOAD FILE -->
					<div class="upload-file">
						<div class="upload-file-actions">
							<input type="file" required="required" style="display: none;" name="main_file" id="main_file" value="">
							<label for="main_file" class="button dark-light">Upload File...</label>
							<p>Pack of Cartoon Illustrations.zip</p>
						</div>
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="upload-pg1"></div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header">46%</p>
							<a href="#" class="button dark-light square">
								<img src="{{asset('/allscript')}}/images/dashboard/close-icon-small.png" alt="close-icon">
							</a>
						</div>
					</div>
					<!-- UPLOAD FILE -->
				</div>
				<!-- /INPUT CONTAINER -->

				<!-- INPUT CONTAINER -->
				<div class="input-container">
					<label class="rl-label required">Upload Main Image</label>
					<!-- UPLOAD FILE -->
					<div class="upload-file">
						<div class="upload-file-actions">
							<input type="file" required="required" style="display: none;" name="main_image" id="main_image" value="">
							<label for="main_image"  class="button dark-light">Upload File...</label>
							
							<p>Cartoon Illustrations.jpeg</p>
						</div>
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="upload-pg2"></div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header">100%</p>
							<a href="#" class="button dark-light square">
								<img src="{{asset('/allscript')}}/images/dashboard/close-icon-small.png" alt="close-icon">
							</a>
						</div>
					</div>
					<!-- UPLOAD FILE -->
				</div>
				<!-- /INPUT CONTAINER -->
				<div class="clearfix"></div>
				<!-- INPUT CONTAINER -->
				<div class="input-container">
					<label class="rl-label">Additional Screenshots </label>
					<!-- UPLOAD FILE -->
					<div class="upload-file">
						<div class="upload-file-actions">
							<input type="file" style="display: none;" multiple="multiple" name="additonal_image[]" id="additonal_image" value="">
							<label for="additonal_image" class="button dark-light">Upload File...</label>
							 {{ $errors->first('additonal_image') }}
							<p>Screenshot 01.jpeg</p>
						</div>
						
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="upload-pg3"></div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header">68%</p>
							<a href="#" class="button dark-light square">
								<img src="{{asset('/allscript')}}/images/dashboard/close-icon-small.png" alt="close-icon">
							</a>
						</div>
						<small class="ttinput-group" style="color:#999">max image size:2mb</small>
						
					</div>
					<!-- UPLOAD FILE -->

					
				</div>
				<!-- /INPUT CONTAINER -->

				<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt" for="name">Sub category </label>
							<div class="inputs">
								<label for="sv" class="select-block va">
									<select required="required" name="sub_category" id="vr">
										<option value="">Select sub category</option>
										@foreach($get_subcategory as $show_subcategory)
											<option value="{{$show_subcategory->subcategory_url}}">{{$show_subcategory->subcategory_name}}</option>
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
						<input type="hidden" name="category_id" value="{{$_GET['theme_category']}}">
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
						<input class="ttinput-groupg" type="text" id="name" name="demo_url" value="" maxlength="100">
						<small class="ttinput-group">Link to a live preview on your own hosting (i.e. https://my-site.com/demo/)</a></small>
					</div>
				</div>
			

				<div class="clearfix"></div>
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name"> Screenshort URL</label>
					<div class="inputs">
						<input class="ttinput-groupg" type="text" id="name" name="screenshort_url" value="" maxlength="100">
						<small class="ttinput-group">Link to a live Screenshort preview on your own hosting (i.e. https://my-site.com/Screenshort/)</a></small>
					</div>
				</div>
				<!-- /INPUT CONTAINER -->
				<div class="clearfix"></div>

				<div class="ttinput-group">
						  <label class="ttinput-groupt" for="name">Search Tags</label>
							<div class="inputs">
								<label class="select-block va">
									<select name="search_tag[]" required="required" id="gig_search_tag" multiple="multiple" style="width:100%" class="select2">
								<?php
									$key_keyword = DB::table('key_keyword')->get();
									
								 ?>
								@foreach($key_keyword as $keyword)
									<option value="{{$keyword->keyword_name}}">{{$keyword->keyword_name}}</option>
								@endforeach
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
								  <input class="jspricld" type="number" autocomplete="off" min="1" step="1" maxlength="7" id="regular-price" name="price_regular" value="">
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
								  <input class="jspricld" type="number" autocomplete="off" min="1" step="1" maxlength="7" id="regular-price" name="price_extented" value="">
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
				<button type="submit" style="width: 100% !important" class="button big dark">Submit Item <span class="primary">for Review</span></button>
			</form>
		</div>
		<!-- /FORM BOX ITEM -->
	</div>
	<!-- /FORM BOX ITEMS -->

	<!-- FORM BOX ITEMS -->
	<div class="form-box-items wrap-1-3 right">
		<!-- FORM BOX ITEM -->
		<div class="form-box-item full">
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
					<div class="pg1"></div>
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
					<div class="pg2"></div>
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


 <!-- location modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Location</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			<form action="{{url('dashboard/create-gig-category')}}" data-parsley-validate method="post" id="profile_info">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">

				
				<div class="input-container">
					<div class="input-container">
						<label class="rl-label">Category Name</label>
						<input name="gig_category" value="" type="text" id="" placeholder="Enter category here...">
					</div>
	        	</div>
	        	<div class="input-container">
					<label for="country2" class="rl-label required">Status</label>
					<label for="country2" class="select-block">
						<select name="status">
							<option value="1">Active</option>
							<option value="2">Unactive</option>
							
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>

	        <div class="modal-footer">
	          <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Cancal</button>
	          <button type="submit" class="btn btn-sm btn-success">Update</button>
	        </div>
	        </form>
	      </div>
	    </div>
	</div>
	<!-- End location model---->
@endsection

@section('js')

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


<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>

<!-- Dashboard UploadItem -->
<script src="{{asset('/allscript')}}/js/dashboard-uploaditem.js"></script>
@endsection