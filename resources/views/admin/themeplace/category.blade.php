@extends('admin.layouts.master')

@section('title', 'theme category')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <p>{{Session::get('msg')}}
            <div class="headline buttons primary">
                <h4>Theme Category</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Category</button>
            </div>
            <!-- /HEADLINE -->
            <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Category Name</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>John</td>
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
					<h4 class="modal-title">Add theme category</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			<form action="{{url('admin/theme/create_theme_category')}}" data-parsley-validate method="post" id="profile_info">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">

				
				<div class="input-container">
					<div class="input-container">
						<label class="rl-label">Category Name</label>
						<input name="category_name" value="" type="text" id="" placeholder="Enter category here...">
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
@endsection