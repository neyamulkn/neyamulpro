  @extends('admin.layouts.master')

@section('title', 'Add payment methods')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>Payment methods</h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Add payment methods</button>
            </div>
            <!-- /HEADLINE -->
            <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Serial</th>
			        <th>Name</th>
			        <th>Public key</th>
			        <th>Secret key</th>
			        <th>Method mode</th>
			        <th>Method for</th>
			        <th>Country</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php $serial = 1; ?>
			    	@foreach($get_method as $show_method)
				      <tr id="item{{$show_method->id}}">
				      	<td>{{ $serial++ }}</td>
				        <td>{{$show_method->method_name}}</td>
				        <td>{{$show_method->public_key}}</td>
				        <td>{{$show_method->secret_key}}</td>
				        <td>{{($show_method->method_mode == 1? 'Live' : 'Test')}}</td>
				        <td>{{$show_method->method_for}}</td>
				        <td>{{$show_method->country}}</td>
				        <td>@if($show_method->status == 1) Active @else Deactive @endif</td>
				        <td>
				        	<button type="button" onclick="edit('{{$show_method->id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info">Edit</button> |
							<button type="button" onclick="deleteItem('{{ $show_method->id }}' )" class="btn btn-danger">Delete</button>
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
	    	<form action="{{route('paymentMethodUpdate')}}" data-parsley-validate method="post" id="profile_info">
				{{ csrf_field() }}
		      <!-- Modal content-->
			    <div class="modal-content">
			        <div class="modal-header">
			          
			          <h4 class="modal-title">Update Payment Method</h4>
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

 <!-- location modal --->  
	<div id="add" class="modal fade modal-md" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Payment Method</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			
		        <div class="modal-body form-box-item">
					<form action="{{route('paymentMethodStore')}}" data-parsley-validate method="post" id="profile_info">
						 {{ csrf_field() }}
						
						<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Payment Method Name</label>
								<input name="method_name" value="" type="text" id="" placeholder="Enter Method Name" required="">
							</div>
			        	</div>
			        	<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Public key</label>
								<input name="public_key" value="" type="text" id="" placeholder="Enter public key...">
							</div>
			        	</div>
										
			        	<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Secret key</label>
								<input name="secret_key" value="" type="text" id="" placeholder="Enter secret key...">
							</div>
			        	</div>
						<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Method mode</label>
								<select name="method_mode">
									<option value="1">Test</option>
									<option value="2">Live</option>
								</select>
							</div>
			        	</div>
						<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Method for</label>
								<select name="method_for">
									<option value="purchess">Purchess</option>
									<option value="Payment">Payment</option>
									<option value="Both">Both</option>
								</select>
							</div>
			        	</div>

			        	<div class="input-container">
							<div class="input-container">
								<label class="rl-label">Country Name</label>
								<select name="country">
									<option value="country">Global</option>
									@foreach($country as $show_country)
										<option value="{{$show_country->country}}">{{$show_country->country}}</option>
									@endforeach
								</select>
							</div>
			        	</div>

			        	<div class="input-container">
							<label for="Status" class="rl-label required">Status</label>
							<label for="Status" class="select-block">
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
		        	</form>
		      	</div>
		    </div>
		</div>
	</div>
	<!-- End location model---->
@endsection

@section('js')

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	

<script type="text/javascript">
	
	  function edit(id){
            var  link = '{{route("paymentMethodEdit", ":id")}}';
            var link = link.replace(':id', id);
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
       
            var  link = '{{route("paymentMethodDelete", ":id")}}';
            var link = link.replace(':id', id);
            $.ajax({
            url:link,
            method:"get",
            
            success:function(data){
                if(data){
                    
                    $("#item"+id).hide();
                    toastr.success(data);
                }
            }
        
        });
    }
    return false;
        
  } 
</script>
@endsection
