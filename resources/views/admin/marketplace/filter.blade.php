@extends('admin.layouts.master')


@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/login.css">
@endsection

@section('content')
        <!-- dashboard CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Marketplace Filter lists</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add Filter</button>
            </div>
            <!-- /HEADLINE -->
            <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Filter Name</th>
			        <th>Sub categoryname</th>
			        <th>Show in metatag</th>
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
				        		$j=1;
				        		$create_array = explode(',', $show_filter->sub_category_id); //convert array for check 
					            for($i=0; $i<count($create_array); $i++){
					    			$get_data = DB::table('gig_subcategories')->where('id', $create_array[$i])->first();
					    			if($get_data ){
					    			echo $j++.'. '.$get_data->subcategory_name.'<br/> ';
					    			}
						    	}
				        	?>
				        </td>
				        <td>{{ $show_filter->mete_tag }}</td>
				        <td>{{ $show_filter->filter_msg }}</td>
				        <td>
				        	<button title="Edit" type="button" onclick="edit('{{$show_filter->filter_id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
							<button title="Delete" type="button" onclick="deleteItem('{{ $show_filter->filter_id }}' )" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> </button>
						</td>
				      </tr>
			      	@endforeach
			      
			    </tbody>
			  </table>
        </div>
        <!-- dashboard CONTENT -->
      
 <!-- add modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Filter</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>
				<form action="{{url('admin/marketplace/filter')}}" data-parsley-validate method="post" id="">
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
			          <button type="submit" class="btn btn-sm btn-success">Insert</button>
			        </div>
		      	</div>
		      </form>
		    </div>
	    </div>
	</div>
	<!-- End add model---->

	<!-- edit modal --->  
<div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    	<form action="{{url('admin/marketplace/filter')}}" data-parsley-validate method="post" id="profile_info">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          
	          <h4 class="modal-title">Update Filter</h4>
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
            var  link = '<?php echo URL::to("admin/marketplace/filter/edit/");?>/'+id;
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
       
            var  link = '<?php echo URL::to("admin/marketplace/filter/delete");?>/'+id;
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