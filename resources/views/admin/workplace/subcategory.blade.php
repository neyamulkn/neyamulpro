@extends('admin.layouts.master')
@section('title', 'workplace sub category')

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
                <h4>Workplace Sub Category</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Sub Category</button>
            </div>
            <!-- /HEADLINE -->
            <table id="myTable" class="table table-bordered table-striped">
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
			    	<?php $serial = 0; ?>
			    	@foreach($get_subcategory as $show_subcategory)
				      <tr id="item{{$show_subcategory->id}}">
				      	<td>{{ $serial += 1 }}</td>
				        <td>{{$show_subcategory->subcategory_name}}</td>
				        <td>{{$show_subcategory->category_name}}</td>
				        <td>@if($show_subcategory->status == 1) Active @else Deactive @endif</td>
				        <td>
				        	<button onclick="edit('{{$show_subcategory->id}}')" type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#edit" >Edit</button> 

							<button type="button" onclick="deleteItem('{{ $show_subcategory->id }}' )" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
						</td>
				      </tr>
			      	@endforeach
			    </tbody>
			  </table>
        </div>
        <!-- DASHBOARD CONTENT -->
      
    <!-- update Modal -->
  <div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
	    <form action="{{url('admin/workplace/subcategory')}}" data-parsley-validate method="post" id="profile_info">
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

 <!-- add modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add sub category</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			<form action="{{url('admin/workplace/subcategory')}}" data-parsley-validate method="post" id="profile_info">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">

				<div class="input-container">
					<div class="input-container">
						<label class="rl-label">Category Name</label>
						<input name="subcategory_name" value="" type="text" id="" placeholder="Enter category here...">

					</div>
	        	</div>

	        	<div class="input-container">
					<label for="Category" class="rl-label required">Category</label>
					<label for="Category" class="select-block">
						<select name="category_id" id="Category">
							<option value="">Select Category</option>
							<?php
								$get_category = DB::table('workplace_category')->get();
								
							 ?>
							@foreach($get_category as $category)
								<option value="{{$category->id}}">{{$category->category_name}}</option>
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
					<label for="status" class="rl-label required">Status</label>
					<label for="status" class="select-block">
						<select name="status" id="status">
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
			</div>
	        <div class="modal-footer">
	          <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Cancal</button>
	          <button type="submit" class="btn btn-sm btn-success">Insert</button>
	        </div>
	        </form>
	      </div>
	    </div>
	</div>
	<!-- End add model---->
 
  
@endsection

@section('js')

	<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	

	<script type="text/javascript">
		
		function edit(id){
		  	
	        var  link = '{{ URL::to("admin/workplace/subcategory/edit") }}/'+id;
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
       
            var  link = '<?php echo URL::to("admin/workplace/subcategory/delete");?>/'+id;
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