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
					<input class="ttinput-groupg" readonly="" form="main_form" value="{{$get_theme->theme_name}}" required="required" type="text" id="name" name="theme_name"  maxlength="100">
					
				  </div>
				</div>

				<div class="row">
					
					<!-- UPLOAD FILE -->
					<div class="col-xs-6">
						<label class="rl-label required">Upload Main File</label>
						<div class="upload-file-actions">
							
								<p><span id="success">
									@if($get_theme->main_file != null)
									<a  title="Download file" href="{{asset('theme/zipfile/'.$get_theme->main_file)}}" download><i class="fa fa-paperclip" aria-hidden="true"></i> {{$get_theme->main_file}}</a>@else
	             					Main file cannot uploaded.
	             					@endif
	             				</span> 
								
						</div>
						
					</div>
					<!-- UPLOAD FILE -->
					<div class="col-xs-6">
						<label class="rl-label required"> Main Image</label>
						<!-- UPLOAD FILE -->
						<div class="upload-file">
							<div class="upload-file-actions">
						
								<p><span id="success-image">
									@if($get_theme->main_image != null)
		             					<a title="view image" href="{{ asset('theme/images/'.$get_theme->main_image)}}" download> <img src="{{ asset('theme/images/thumb/'.$get_theme->main_image)}}" width="90" height="50"> </a>
		             				@else
		             					Image not uploaded
		             				@endif
	             				</span>
							</div>
							
						</div>
						<!-- UPLOAD FILE -->
					</div>
				</div>
				
				<div class="clearfix"></div>
				 
			<form action="{{ route('insert_theme') }}" id="main_form" method="post" data-parsley-validate  enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="theme_id" value="{{$get_theme->theme_id}}">
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="summary">Summary:</label>
				  <div class="inputs">
					{!!$get_theme->summary!!}
				  </div>
				</div>
				<!-- /INPUT CONTAINER -->
				
				<!-- INPUT CONTAINER -->
				<div class="ttinput-grouptt">
				  <label class="ttinput-groupt" for="description"> Description:</label>
					<div class="inputs">
						<div >
							{!!$get_theme->description!!}
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
								<select  required="required" name="sub_category" id="vr">
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
						
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="ttinput-group" id="child_category">

					@if(count($get_childcategory)> 0)
					
		              	<label class="ttinput-groupt" for="name">Subchild category </label>
			            <div class="inputs">
			                <label for="sv" class="select-block va">
			                  	<select required="required" name="child_category">
			                  		@foreach($get_childcategory as $childcategory)
			                    	<option  value="{{$childcategory->id}}" {{( $childcategory->id == $get_theme->child_category)? 'selected' : '' }} >{{$childcategory->subchild_category_name}}</option>
			                    	@endforeach
			                	</select>
			                  <svg class="svg-arrow"><use xlink:href="#svg-arrow"></use> </svg>
			              </label>
			             
			            </div>
					@endif
					</div>
				<!-- /INPUT CONTAINER -->
				
				@foreach($get_filters as $show_filter)
					<?php $theme_features = DB::table('theme_features')->where('theme_id', $get_theme->theme_id)->where('feature_id', $show_filter->filter_id)->pluck('feature_name')->toArray();
						
					?>

					@if($show_filter->type == 'radio' )
					
						<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt" >{{ $show_filter->filter_name}}</label>

						  	<div class="inputs">
								<label class="themeswwqq"><input {{( in_array('Yes', $theme_features)) ? 'checked' : ''}} class="themeswwqqrd" type="radio" value="Yes" name="radio[{{ $show_filter->filter_id}}]"> Yes</label>
								<label class="themeswwqq"><input {{( in_array('No', $theme_features)) ? 'checked' : ''}} class="themeswwqqrd" type="radio" value="No"  name="radio[{{ $show_filter->filter_id}}]"> No</label>
								<label class="themeswwqq"><input {{(  in_array('N/A', $theme_features) ) ? 'checked' : ''}} class="themeswwqqrd" type="radio" value="N/A" name="radio[{{ $show_filter->filter_id}}]" > N/A</label>
							</div>
						</div>
						<div class="clearfix"></div>
					@endif

					

					@if($show_filter->type == 'select' )
						<!-- here make array for seperate select field -->
						<?php $filter_name = str_replace(' ', '_', $show_filter->filter_name); ?>
						<input type="hidden" name="selectbox[{{$show_filter->filter_id}}]" value="{{$filter_name}}">
						<div class="clearfix"></div>
						<div class="ttinput-group">
						  <label class="ttinput-groupt">{{ $show_filter->filter_name}}</label>
						  <div class="inputs">
						  	<?php $get_subfilters = DB::table('theme_subfilters')->where('filter_id', $show_filter->filter_id)->orderBy('theme_subfilters.id')->get();
							?>
							<!-- here filter name making field name -->
							<select multiple="multiple" name="{{$filter_name}}[]" id="hhhfgfd">
								@foreach($get_subfilters as $show_subfilter)
									<option {{(in_array($show_subfilter->id, $theme_features)) ? 'selected' : ''}} value="{{$show_subfilter->id}}">{{$show_subfilter->sub_filtername}}</option>
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
									<?php $get_subfilters = DB::table('theme_subfilters')->leftJoin('theme_features', 'theme_subfilters.id', 'theme_features.feature_name')->where('filter_id', $show_filter->filter_id)->orderBy('theme_subfilters.id')->get();
									?>

									<select name="dropdown[{{$show_filter->filter_id}}]" id="sv">
										
										@foreach($get_subfilters as $show_subfilter)
											<option {{( in_array($show_subfilter->id, $theme_features)) ? 'selected' : ''}} value="{{$show_subfilter->id}}">{{$show_subfilter->sub_filtername}}</option>
										@endforeach
										<option {{( in_array('N/A', $theme_features)) ? 'selected' : ''}} value="N/A">N/A</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
								
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
						
					</div>
				</div>
			

				<div class="clearfix"></div>
				<!-- INPUT CONTAINER -->
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name"> Screenshort URL</label>
					<div class="inputs">
						<input class="ttinput-groupg" value="{{$get_theme->screenshort_url}}" type="text" id="name" name="screenshort_url"  maxlength="100">
						
					</div>
				</div>
				<!-- /INPUT CONTAINER -->
				<div class="clearfix"></div>

				<div class="ttinput-group">
				  	<label class="ttinput-groupt" for="name">Search Tags</label>
					<div class="inputs">
						<label class="select-block va">
						<input type="text" readonly="" value="{{$get_theme->search_tag}}" style="border:none !important;" data-role="tagsinput" />
						</label>
						
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="box-stacked-radius-top">
					<h3 class="t-heading -size-s">Set Your Price <span>(US$)</span></h3>
					
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
			
		function remove_item(theme_id, type){
			if (confirm("Are you sure delete "+type+".?")) {
				var  link = '{{route("delete_folder_item")}}';
				$.ajax({
				    url:link,
				    method:"get",
				    data:{
				        theme_id:theme_id,
				        type:type,
				    },
				    success:function(data){
				        if(data){
				           	toastr.success(data);
				          	$('.progress-bar-'+type).text('100%');
				          	$('.progress-percent-'+type).text('100%');
				          	$('.progress-bar-'+type).css('width', '100%');
				          	if(type == 'image'){
				          		$('#success-image').html('Max file size 2gb');
				          		$('#closeBtn-image').html('');
				      		}else{
				      			$('#success').html('Max file size 2gb');
				      			$('#closeBtn').html('');
				      		}
				           
				      	}
				   	}
				});
			}
		}

		function getChild(subcategory_id, theme_id){
            var  link = '{{route("getChild")}}';
            $.ajax({
            url:link,
            method:"get",
            data:{
            	subcategory_id: subcategory_id,
            	theme_id: theme_id,
            },
            success:function(data){
	                
	                   $('#child_category').html(data);
	                
	           	}
	        });
	    }
	    
	</script>

	<script>
		function uploadselectFile(){
		   $("#main_fileSubmit").click();
		}

		$(document).ready(function(){

	    $('#fileUploadForm').ajaxForm({
	      beforeSend:function(){
	        $('.loader').css('display', 'inline-block');
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
		         $('.loader-image').css('display', 'inline-block');
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