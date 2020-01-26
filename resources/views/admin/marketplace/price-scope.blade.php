@extends('admin.layouts.master')
@section('title', 'Add gig price & scope')

@section('css')
<link rel="stylesheet" type="text/css"
        href="{{asset('/allscript')}}/datatables/css/dataTables.bootstrap4.css">

	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Add gig price & scope</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add gig price & scope</button>
            </div>
            <!-- /HEADLINE -->
            <table id="myTable" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Meta Data Name</th>
			        <th>Category Name</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			       <?php $serial = 0; ?>
			    	@foreach($get_data as $show_data)
				      <tr id="item{{$show_data->sub_filter_id}}">
				      	<td>{{ $serial += 1 }}</td>
				        <td>{{$show_data->sub_filter_name}}</td>
				        <td>{{$show_data->subcategory_name}}</td>
				        <td>
				        	<button onclick="edit('{{$show_data->sub_filter_id}}')" type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#edit" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button> |

							<button type="button" onclick="deleteItem('{{ $show_data->sub_filter_id }}' )" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
						</td>
				      </tr>
			      	@endforeach
			      
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
					<h4 class="modal-title">Gig Price Scope Name</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

				<form action="{{url('admin/marketplace/pricescope')}}" data-parsley-validate method="post" id="profile_info">
					 {{ csrf_field() }}
		        <div class="modal-body form-box-item">

					
					<div class="input-container">
						<div class="input-container">
							<label class="rl-label">Gig Price Scope Name</label>
							<input name="gig_pricescope" value="" type="text" id="" placeholder="Enter Meta Data Name here...">

							<input name="filter_type" value="price" type="hidden">

						</div>
		        	</div>

		        	<div class="input-container">
						<label for="Category" class="rl-label required">Category</label>
						<label for="Category" class="select-block">
							<select name="category_id" id="Category">
								<option value="">Select Category</option>
								<?php $get_category = DB::table('gig_subcategories')->where('status', 1)->get(); ?>

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


			        <div class="modal-footer">
			          <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Cancal</button>
			          <button type="submit" class="btn btn-sm btn-success">Insert</button>
			        </div>
		      	</div>
		      </form>
	    	</div>
	    </div>
	</div>
	<!-- End location model---->


	        <!-- update Modal -->
  <div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    	<form action="{{url('admin/marketplace/pricescope')}}" data-parsley-validate method="post" id="profile_info">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          
	          <h4 class="modal-title">Update gig price & scope</h4>
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
            var  link = '<?php echo URL::to("admin/marketplace/pricescope/edit");?>/'+id;
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
       
            var  link = '<?php echo URL::to("admin/marketplace/pricescope/delete");?>/'+id;
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