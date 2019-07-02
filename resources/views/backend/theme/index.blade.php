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
			<form method="get" action="{{url('dashboard/theme/upload/form/')}}" id="upload_form">
				
				<!-- INPUT CONTAINER -->
				<div class="input-container half">
					
					<label for="sv" class="select-block">
						<select name="theme_category" id="sv" required="">
							<option value="">Select Category</option>
							@foreach($get_categories as $get_category)
								
								<option value="{{$get_category->category_url}}">{{$get_category->category_name}}</option>
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