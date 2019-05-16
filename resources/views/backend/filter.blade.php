@extends('backend.layouts.master')


@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Gigs Sub Category</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Sub Category</button>
            </div>
            <!-- /HEADLINE -->
            <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Sub Category Name</th>
			        <th>Category Name</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>John</td>
			        <td>Doe</td>
			        <td>Doe</td>
			        <td>john@example.com</td>
			        <td>
			        	<button type="button" class="btn btn-info">Edit</button> |
						<button type="button" class="btn btn-danger">Delete</button>
					</td>
			      </tr>
			      
			    </tbody>
			  </table>
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

		<form action="{{url('dashbord/filter')}}" data-parsley-validate method="post" id="">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">

				
				<div class="input-container">
					<div class="input-container">
						<label class="rl-label">Filter Name</label>
						<input name="filter_name" value="" type="text" id="" placeholder="Enter category here...">
					</div>
	        	</div>

	        	<div class="input-container">
					<label for="Category" class="rl-label required">Category </label>
					<label for="Category" class="select-block">
						<select name="sub_category_id[]" id="Category" multiple="multiple" style="width:100%" class="select2">
							<option value="">Select Category</option>
							<?php
								$get_category = DB::table('gig_subcategories')->get();
								
							 ?>
							@foreach($get_category as $category)
								<option value="{{$category->id}}">{{$category-> 	subcategory_name}}</option>
							@endforeach
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>

				<div class="input-container">
					<label for="Category" class="rl-label required">Meta tag </label>
					<div class="col-md-4">
	                    <input type="checkbox" id="gig_metadata4" name="mete_tag" value="Yes">
	                    <label for="gig_metadata4">
	                        <span class="checkbox primary primary"></span>
	                       	Yes/No
	                    </label>
	                </div>
				</div>
				<div class="input-container">
					<div class="input-container">
						<label class="rl-label">Filter Message</label>
						<input name="filter_msg" type="text" id="" placeholder="Enter Filter Message.">
					</div>
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
@endsection