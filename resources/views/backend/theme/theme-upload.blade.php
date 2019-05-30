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
			<hr class="line-separator">
			<form id="upload_form">
				
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name">Name</label>
				  <div class="inputs">
					<input class="ttinput-groupg" type="text" id="name" name="name" value="" maxlength="100">
					<small class="ttinput-group">Maximum 100 characters. No HTML allowed. Follow our <a href="#">Item Title Naming Conventions</a>.</small>
				  </div>
				</div>
				<!-- /INPUT CONTAINER -->
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name">Key Features</label>
				  <div class="inputs">
					<input class="ttinput-groupg" type="text" id="name" name="name" value="" maxlength="100">
					<input class="ttinput-groupg" type="text" id="name" name="name" value="" maxlength="100">
					<input class="ttinput-groupg" type="text" id="name" name="name" value="" maxlength="100">
					<small class="ttinput-group">Highlight what makes your item unique or a key selling point. They appear on search result pages next to an image of your item. Max 45 characters per line. No HTML allowed. Do not repeat features or keyword spam. Key Feature guidelines</a>.</small>
				  </div>
				</div>
				<!-- /INPUT CONTAINER -->
				
				<!-- INPUT CONTAINER -->
				<div class="ttinput-grouptt">
				  <label class="ttinput-groupt" for="name">HTML Description</label>
					<div class="inputs">
						<div class="inputseditor">
							<form>
								<textarea class="ttinput-grouptddd" id="textarea" placeholder="Enter text ..."></textarea>
								<div id="toolbar" style="display: none;">
									<a class="bottomtt" data-wysihtml5-command="bold" title="CTRL+B"><img src="{{asset('/allscript')}}/e/1.png"></a>
									<a class="bottomtt" data-wysihtml5-command="italic" title="CTRL+I"><img src="{{asset('/allscript')}}/e/2.png"></a></a>
									<a class="bottomtt" data-wysihtml5-command="insertUnorderedList"><img src="{{asset('/allscript')}}/e/3.png"></a></a>
									<a class="bottomtt" data-wysihtml5-command="insertOrderedList"><img src="{{asset('/allscript')}}/e/4.png"></a></a>
									<a class="bottomtt" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"><img src="{{asset('/allscript')}}/e/5.png"></a></a>
								</div>
							</form>
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
							<a href="#" class="button dark-light">Upload File...</a>
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
							<a href="#" class="button dark-light">Upload File...</a>
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
							<a href="#" class="button dark-light">Upload File...</a>
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
					</div>
					<!-- UPLOAD FILE -->

					<!-- UPLOAD FILE -->
					<div class="upload-file multiupload">
						<div class="upload-file-actions">
							<a href="#" class="button dark-light">Upload File...</a>
							<p>Screenshot 02.jpeg</p>
						</div>
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="upload-pg4"></div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header">73%</p>
							<a href="#" class="button dark-light square">
								<img src="{{asset('/allscript')}}/images/dashboard/close-icon-small.png" alt="close-icon">
							</a>
						</div>
					</div>
					<!-- UPLOAD FILE -->

					<!-- UPLOAD FILE -->
					<div class="upload-file multiupload">
						<div class="upload-file-actions">
							<a href="#" class="button dark-light">Upload File...</a>
							<p>Screenshot 03.jpeg</p>
						</div>
						<div class="upload-file-progress">
							<!-- BADGE PROGRESS -->
							<div class="upload-bar">
								<div class="upload-pg5"></div>
							</div>
							<!-- /BADGE PROGRESS -->
							<p class="text-header">92%</p>
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
				<div class="input-container half">
					<label for="sv" class="rl-label required">Minimum Software Version</label>
					<label for="sv" class="select-block">
						<select name="sv" id="sv">
							<option value="0">Adobe Suite CS6</option>
							<option value="1">Adobe Suite CS7</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<!-- /INPUT CONTAINER -->

				<!-- INPUT CONTAINER -->
				<div class="input-container half">
					<label for="vr" class="rl-label required">Sub category</label>
					<label for="vr" class="select-block">
						
						<select name="sub_category" id="vr">
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
				</div>

				<!-- /INPUT CONTAINER -->
				
				@foreach($get_filters as $show_filter)

				@if($show_filter->type == 'radio' )
					
						<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt" for="name">{{ $show_filter->filter_name}}</label>
							 <div class="inputs">

								<label class="themeswwqq"><input class="themeswwqqrd" type="radio" value="Yes" name="radio"> Yes</label>
								<label class="themeswwqq"><input class="themeswwqqrd" type="radio" value="No"  name="radio"> No</label>
								<label class="themeswwqq"><input class="themeswwqqrd" type="radio" value="N/A" name="radio" > N/A</label>
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

							<select multiple="multiple" name="" id="hhhfgfd">
								@foreach($get_subfilters as $show_subfilter)
									<option value="{{$show_subfilter->id}}">{{$show_subfilter->sub_filtername}}</option>
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

									<select name="sv" id="sv">
										
										@foreach($get_subfilters as $show_subfilter)
											<option value="{{$show_subfilter->id}}">{{$show_subfilter->sub_filtername}}</option>
										@endforeach
										<option value="">N/A</option>
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
						<input class="ttinput-groupg" type="text" id="name" name="name" value="" maxlength="100">
						<small class="ttinput-group">Link to a live preview on your own hosting (i.e. https://my-site.com/demo/)</a></small>
					</div>
				</div>
				<!-- /INPUT CONTAINER -->
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
								  <input class="jspricld" type="number" autocomplete="off" min="1" step="1" maxlength="7" id="regular-price" name="price[regular]" value="">
								</div>
								<div class="licenslock"><br>+</div>
								<div class="licenmula-block">
								  <strong>Buyer fee</strong><br>
								  $12
								</div>
								<div class="licensula-block"><br>=</div>
								<div class="licenslocreen">
								  <strong>Purchase price<br></strong>
								  <span class="bodiznherit">
									$<span class="js-licensrice">12</span>
								  </span>
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
				
				<div class="clearfix"></div>
				
				<hr class="line-separator">
				<button class="button big dark">Submit Item <span class="primary">for Review</span></button>
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

			<form action="{{url('dashbord/create-gig-category')}}" data-parsley-validate method="post" id="profile_info">
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


<!-- jQuery -->
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

<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>

<!-- Dashboard UploadItem -->
<script src="{{asset('/allscript')}}/js/dashboard-uploaditem.js"></script>
@endsection