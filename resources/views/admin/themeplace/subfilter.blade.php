@extends('admin.layouts.master')
@section('title', 'Sub filter insert')

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Add sub filter</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Sub filter</button>
            </div>
            <!-- /HEADLINE -->
            <table id="myTable" class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Sub Filter Name</th>
			        <th>Filter Name</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php $serial = 1; ?>
			    	@foreach($get_data as $show_filter)
				      <tr id="item{{$show_filter->id}}">
				      	<td>{{ $serial++ }}</td>
				        <td>{{$show_filter->sub_filtername}}</td>
				        <td>{{$show_filter->filter_name}}</td>
				      
				        <td>
				        	<button type="button" onclick="edit('{{$show_filter->id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button> 
							<button type="button" onclick="deleteItem('{{ $show_filter->id }}' )" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
					<h4 class="modal-title">Theme sub filter</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			<form action="{{route('insert_theme_subfilter')}}" data-parsley-validate method="post" id="profile_info">
				 {{ csrf_field() }}
	        <div class="modal-body form-box-item">

				
				<div class="input-container">
					<div class="input-container">
						<label class="rl-label">Sub Filter Name</label>
						<input required="" name="sub_filter_name" value="" type="text" id="" placeholder="Enter sub filter name here...">
					</div>
	        	</div>

	        	<div class="input-container">
					<label for="Category" class="rl-label required">Filter type</label>
					<label for="Category" class="select-block">
						<select required name="filter_id" id="Category">
							<option value="">Select Category</option>
							<?php
								$get_category = DB::table('theme_filters')->get();
								
							 ?>
							@foreach($get_category as $category)
								<option value="{{$category->filter_id}}">{{$category->filter_name}}</option>
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

	<!-- edit modal --->  
	<div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog">
	    	<form action="{{ route('insert_theme_subfilter') }}" data-parsley-validate method="post" id="profile_info">
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
@endsection

@section('js')
	<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	
<script type="text/javascript">
	
	function edit(id){
        var  link = '<?php echo URL::to("admin/themeplace/subfilter/edit/");?>/'+id;
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
       
        var  link = '<?php echo URL::to("admin/themeplace/subfilter/delete");?>/'+id;
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