@extends('admin.layouts.master')

@section('title', 'theme subchild category')


@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
        	
            <div class="headline buttons primary">
                <h4>Theme SubChild Category</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add SubChild Category</button>
            </div>
            <!-- /HEADLINE -->
            <table id="myTable" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Child Category</th>
			        <th>Sub Category</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php $i= 1; ?>
			    @foreach($subchild_categories as $subchild_category)
			      <tr id="item{{ $subchild_category->id }}">
			        <td>{{ $i++ }}</td>
			        <td>{{ $subchild_category->subchild_category_name }}</td>
			        <td>{{ $subchild_category->subcategory_name }}</td>
			        <td>@if($subchild_category->status == 1) Active @else Deactive @endif</td>
			        <td>
				        <button type="button" onclick="edit('{{$subchild_category->id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Edit</button> 
						<button type="button" onclick="deleteItem('{{ $subchild_category->id }}' )" class="btn btn-danger btn-sm" aria-hidden="true"> <i class="fa fa-trash"></i> Delete</button>
					</td>
			      </tr>
			    @endforeach
			    </tbody>
			  </table>
        </div>
        <!-- DASHBOARD CONTENT -->
      
 <!-- Add modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add sub child category</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

				<form action="{{route('theme_subchildcategory')}}" data-parsley-validate method="post" id="profile_info">
					 {{ csrf_field() }}
		        <div class="modal-body form-box-item">

					
					<div class="input-container">
						<div class="input-container">
							<label class="rl-label">Child Category Name</label>
							<input name="subchild_category_name" value="" type="text" id="" placeholder="Enter category here...">
						</div>
		        	</div>

		        	<div class="input-container">
						<label for="Category" class="rl-label required">Select Category</label>
						<label for="Category" class="select-block">
							<select name="subcategory_id" id="Category">
								<option value="">Select Category</option>
								<?php
									$get_category = DB::table('theme_subcategory')->get();
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

			        <div class="modal-footer">
			          <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Cancal</button>
			          <button type="submit" class="btn btn-sm btn-success">Insert</button>
			        </div>
			    </div>
		        </form>
		      
		    </div>
		</div>
	</div>
	<!-- End update model---->

	<!-- update Modal -->
	<div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog">
		    <form action="{{route('theme_subchildcategory')}}" data-parsley-validate method="post" id="profile_info">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          
		          <h4 class="modal-title">Update Subchild Category</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body form-box-item">
		     		
					{{ csrf_field() }}
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
            var  link = '{{ URL::to("admin/themeplace/subchildcategory/edit/") }}/'+id;
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
      
            var  link = '{{ URL::to("admin/themeplace/subchildcategory/delete") }}/'+id;
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
</script>
@endsection