@extends('admin.layouts.master')
@section('title', 'wokplace Filter')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/allscript')}}/datatables/css/dataTables.bootstrap4.css">

@endsection

@section('content')
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
    	<p>{{Session::get('msg')}}</p>
        <!-- HEADLINE -->
        <div class="headline buttons primary">
            <h4>Filter List</h4>
			<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Filter</button>
        </div>
        <!-- /HEADLINE -->
        <table id="myTable" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Filter Name</th>
			        <th>Category name</th>
			        <th>Filter Type</th>
			        <th>Filter message</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php $serial = 1; ?>
			    	@foreach($get_filter_data as $show_filter)
				      <tr id="item{{$show_filter->filter_id}}">
				      	<td>{{ $serial++ }}</td>
				        <td>{{$show_filter->filter_name}}</td>
				        <td>
				        	<?php
				        	$get_subcategory = DB::table('workplace_subcategory')
					        ->whereIn('id', explode(',', $show_filter->subcategory_id))->get(); 
				        	?>
				        	@foreach($get_subcategory as $subcategory)
				        		{{$subcategory->subcategory_name}}<br/>
				        	@endforeach
				        </td>
				        <td>{{$show_filter->type }}</td>
				        <td>{{$show_filter->filter_msg  }}</td>
				        <td>
				        	<button title="Edit" type="button" onclick="edit('{{$show_filter->filter_id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
							<button title="Delete" type="button" onclick="deleteItem('{{ $show_filter->filter_id }}' )" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> </button>
						</td>
				      </tr>
			      	@endforeach
			    </tbody>
			</table>
    </div>
    <!-- DASHBOARD CONTENT -->
  
 	<!-- add modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Filter</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

				<form action="{{url('admin/workplace/filter')}}" data-parsley-validate method="post" id="">
					{{ csrf_field() }}
			        <div class="modal-body form-box-item">
						<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Filter Name</label>
								<input name="filter_name" value="" type="text" id="" placeholder="Enter filter name...">
							</div>
			        	</div>

			        	<div class="input-container">
							<label for="Category" class="rl-label required">Sub Category </label>
							<label for="Category" class="select-block">
								<select name="subcategory_id[]" id="Category" multiple="multiple" style="width:100%" class="select2">
									<option value="">Select Category</option>
									<?php
										$get_category = DB::table('workplace_subcategory')->get();
										
									 ?>
									@foreach($get_category as $category)
										<option value="{{$category->id}}">{{$category->subcategory_name}}</option>
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
							<label for="Category" class="rl-label required">Filter type </label>
							<div class="col-md-4">
			                    <input type="radio" id="Radio" name="type" value="radio">
								<label for="Radio">
			                        <span class="checkbox primary primary"></span>
			                       	Radio
			                    </label>
			                    <input type="radio" id="Select" name="type" value="select">
								<label for="Select">
			                        <span class="checkbox primary primary"></span>
			                       	Select
			                    </label>
			                    <input type="radio" id="Dropdown" name="type" value="dropdown">
			                    <label for="Dropdown">
			                        <span class="checkbox primary primary"></span>
			                       	Dropdown
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
				          <button type="submit" class="btn btn-sm btn-success">Insert</button>
				        </div>
			      	</div>
		      	</form>
		    </div>
		</div>
	</div>
	<!-- End add model---->

	    <!-- update Modal -->
  <div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
	    <form action="{{url('admin/workplace/filter')}}" data-parsley-validate method="post" id="profile_info">
			{{ csrf_field() }}
		      <!-- Modal content-->
		     <div class="modal-content">
		        <div class="modal-header">
		          <h4 class="modal-title">Update sub category</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body form-box-item">
					<div id="edit_form"></div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          <button type="submit" class="btn btn-sm btn-success">Update</button>
		        </div>
		    </div>
	    </form>
    </div>
  </div>  
@endsection

@section('js')

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	
<script type="text/javascript">
		
	function edit(id){
		  	
	        var  link = '{{ URL::to("admin/workplace/filter/edit") }}/'+id;
	        $.ajax({
	            url:link,
	            method:"get",
	            
	            success:function(data){
	                if(data){
	                     $("#edit_form").html(data);
	                }
	            }
	        });
	    }

	function deleteItem(id) {
    	if (confirm("Are you sure delete it.?")) {
       
            var  link = '<?php echo URL::to("admin/workplace/filter/delete");?>/'+id;
            $.ajax({
            url:link,
            method:"get",
            
            success:function(data){
                if(data){
                    
                     $("#item"+id).hide();
                    toastr.error(data);
	                }
	            }
	        
	        });
	    }
	    return false;        
  	} 
	</script>

		<!-- This is data table -->
    <script src="{{asset('/allscript')}}/datatables/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection