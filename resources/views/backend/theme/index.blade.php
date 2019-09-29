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
        <h4>Upload to hotlancer</h4>
    </div>
    <!-- /HEADLINE -->

	<!-- FORM BOX ITEMS -->
	<div class="form-box-items wrap-3-1 left">
		<!-- FORM BOX ITEM -->
		<div class="form-box-item full">
			<h4>Select a category for your upload:</h4>
			<hr class="line-separator">
			<form method="POST" action="{{url('dashboard/themeplace/upload/form/')}}" id="upload_form">
				
				@csrf()
				<div class="ttinput-group">
				  <label class="ttinput-groupt" for="name">Name</label>
				  <div class="inputs">
					<input class="ttinput-groupg" required="required" type="text" id="name" name="theme_name"  maxlength="100">
					<small class="ttinput-group">Maximum 100 characters. No HTML allowed. Follow our <a href="#">Item Title Naming Conventions</a>.</small>
				  </div>
				</div>

				<div class="ttinput-group">
						  <label class="ttinput-groupt" for="name">Category </label>
							<div class="inputs">
								<label for="sv" class="select-block va">
									<select required="required" name="category_id" id="vr">
										<option value="">Select category</option>
										@foreach($get_categories as $get_category)
											<option value="{{$get_category->id}}">{{$get_category->category_name}}</option>
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
						<button class="btn btn-primary">Next</button>
			</form>
		</div>
		<!-- /FORM BOX ITEM -->
	</div>
	<!-- /FORM BOX ITEMS -->
	<div class="clearfix"></div>


</div>
<!-- DASHBOARD CONTENT -->

@endsection

@section('js')

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	


<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>

<!-- Dashboard UploadItem -->
<script src="{{asset('/allscript')}}/js/dashboard-uploaditem.js"></script>
@endsection