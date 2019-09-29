@extends('admin.layouts.master')
@section('title', 'Insert sub filter')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Gig Meta Data</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Sub Category</button>
            </div>
            <!-- /HEADLINE -->
            <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Sub filter name</th>
			        <th>Filter name</th>
			        <th>Show price table</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php $serial = 1; ?>
			    	@foreach($get_data as $show_filter)
				      <tr id="item{{$show_filter->sub_filter_id}}">
				      	<td>{{ $serial++ }}</td>
				        <td>{{$show_filter->sub_filter_name}}</td>
				        <td>{{$show_filter->filter_name}}</td>
				        <td>{{$show_filter->filter_type}}</td>
				        <td>
				        	<button type="button" onclick="edit('{{$show_filter->sub_filter_id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button> |
							<button type="button" onclick="deleteItem('{{ $show_filter->sub_filter_id }}' )" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
						</td>
				      </tr>
			      	@endforeach
			      
			    </tbody>
			  </table>
        </div>
        <!-- DASHBOARD CONTENT -->

  <!-- edit modal --->  
<div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    	<form action="{{url('admin/gig-metadata')}}" data-parsley-validate method="post" id="profile_info">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          
	          <h4 class="modal-title">Update sub filter</h4>
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

 <!-- add modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Gig Meta Data Name</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>
				<form action="{{url('admin/gig-metadata')}}" data-parsley-validate method="post" id="profile_info">
				 {{ csrf_field() }}
		        <div class="modal-body form-box-item">
					<div class="input-container">
						<div class="input-container">
							<label class="rl-label">Sub Filter Name</label>
							<input name="sub_filter_name" value="" type="text" id="" placeholder="Enter Meta Data Name here...">
						</div>
		        	</div>

		        	<div class="input-container">
						<label for="Category" class="rl-label required">Filter type</label>
						<label for="Category" class="select-block">
							<select name="filter_id" id="Category">
								<option value="">Select Category</option>
								<?php
									$get_filters = DB::table('filters')->get();
									
								 ?>
								@foreach($get_filters as $filter)
									<option value="{{$filter->filter_id}}">{{$filter->filter_name}}</option>
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
						<label for="Category" class="rl-label required">Show price table </label>
						<div class="col-md-4">
		                    <input type="checkbox" id="price" name="filter_type" value="Yes">
		                    <label for="price">
		                        <span class="checkbox primary primary"></span>
		                       	Yes/No
		                    </label>
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
	<!-- End location model---->
@endsection

@section('js')

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	

<script type="text/javascript">
	
	  function edit(id){
            var  link = '<?php echo URL::to("admin/marketplace/subfilter/edit/");?>/'+id;
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
       
            var  link = '<?php echo URL::to("admin/marketplace/subfilter/delete");?>/'+id;
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
@endsection