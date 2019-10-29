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
			    	@foreach($get_category as $category)
				      <tr>
				        <td>John <?php $id = '<script>alert("alsdf")</script>'; echo $id; ?></td>
				        <td>Doe</td>
				        <td>john@example.com</td>
				        <td>
				        	<button type="button" onclick="edit('{{$category->id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Edit</button> 
							<button type="button" onclick="deleteItem('{{ $category->id }}' )" class="btn btn-danger btn-sm" aria-hidden="true"> <i class="fa fa-trash"></i> Delete</button>
						</td>
				      </tr>
				    @endforeach
			      
			    </tbody>
			  </table>
		  	<div class="page primary paginations">
			  {{$get_category->links()}}
			</div>
        </div>
        <!-- DASHBOARD CONTENT -->
      
 <!-- add modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add theme category</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

				<form action="{{route('insert_theme_cat')}}" data-parsley-validate method="post" id="profile_info">
					 {{ csrf_field() }}
		        <div class="modal-body form-box-item">

					
					<div class="input-container">
						<div class="input-container">
							<label class="rl-label">Category Name</label>
							<input name="category_name" required="" value="" type="text" id="" placeholder="Enter category here...">
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
	    <form action="{{url('admin/marketplace/create-gig-category')}}" data-parsley-validate method="post" id="profile_info">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          
	          <h4 class="modal-title">Update category</h4>
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
            var  link = '<?php echo URL::to("/admin/marketplace/category/edit/");?>/'+id;
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
       
            var  link = '<?php echo URL::to("admin/marketplace/category/delete");?>/'+id;
            $.ajax({
            url:link,
            method:"get",
            
            success:function(data){
                if(data){
                    
                     $("#item"+id).hide();
                    toastr.info(data);
                }
            }
        
        });
    }
    return false;
        
  } 
</script>
@endsection