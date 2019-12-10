  @extends('admin.layouts.master')

@section('title', 'Add payment methods')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
		<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/bootstrap-datepicker3.standalone.min.css">

@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
        	
            <div class="headline statement primary">
                <h4>Sales Statement </h4>
				<button form="statement_filter_form" class="button dark-light">Search</button>
				<form id="statement_filter_form" name="statement_filter_form" class="statement-form">
					<!-- DATEPICKER -->
					<div class="datepicker-wrap">
						<input type="text" id="date_from" name="date_from" class="datepicker" value="02/22/2016">
						<span class="icon-calendar"></span>
					</div>
					<!-- /DATEPICKER -->
					<label>to:</label>
					<!-- DATEPICKER -->
					<div class="datepicker-wrap">
						<input type="text" id="date_to" name="date_to" class="datepicker" value="02/22/2017">
						<span class="icon-calendar"></span>
					</div>
					<!-- /DATEPICKER -->
					<label for="ss_filter" class="select-block">
						<select name="ss_filter" id="ss_filter">
							<option value="all">All Withdraw</option>
							<option value="pending">Pending</option>
							<option value="received">Received</option>
							<option value="completed">Completed</option>
							
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</form>
            </div>

            <div class="form-box-item">
			
            	<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Invoice ID</th>
			        <th>Date</th>
			        <th>User Name</th>
			        <th>Method</th>
			        <th>Account ID</th>
			        <th>Withdraw Amount</th>
			        <th>Wallet Amount</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			    	@foreach($withdrawals as $withdrawal)
				      <tr id="item{{$withdrawal->id}}">
				      	<td>{{$withdrawal->invoice_id}}</td>
				        <td>{{Carbon\Carbon::parse($withdrawal->created_at)->format('M d, Y')}}</td>
				        <td>{{$withdrawal->payment_type}}</td>
				        <td>{{$withdrawal->username}}</td>
				        <td>{{$withdrawal->account_no}}</td>
				        <td>${{$withdrawal->amount}}</td>
				        <td>${{$withdrawal->wallet}}</td>
				        <td>{{$withdrawal->status}}</td>
				        <td>
				        	<label for="period6" class="select-block">
								<select onchange="action(this.value, '{{$withdrawal->id}}')" name="period6" id="ss_filter">
									<option value="">select</option>
									<option value="received">Received</option>
									<option value="completed">Completed</option>
									
								</select>
							</label>
						</td>
				      </tr>
			      	@endforeach
			      
			    </tbody>
			  </table>
        	</div>

        </div>
        <!-- DASHBOARD CONTENT -->
    <!-- completed Modal -->
	<div class="modal fade" id="completed" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog">
	    	<form action="{{route('admin.withdrawalAction')}}" data-parsley-validate method="post" id="profile_info">
				{{ csrf_field() }}
		      <!-- Modal content-->
			    <div class="modal-content">
			        <div class="modal-header">
			          
			          <h4 class="modal-title">Update Payment Method</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <div class="modal-body form-box-item">
			        	<div class="form-group">
						    <label for="email">Transection ID:</label>
						  
						    <input type="text" name="transection_id" class="form-control" id="Enter Transection ID">
						    <input type="hidden" name="id" id="id" value="">
						    <input type="hidden" name="status" id="status" value="">
						</div>
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
<!-- Bootstrap Datepicker -->
<script src="{{asset('/allscript')}}/js/vendor/bootstrap-datepicker.min.js"></script>

<!-- Dashboard Statement -->
<script src="{{asset('/allscript')}}/js/dashboard-statement.js"></script>
<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	

<script type="text/javascript">
	
	function action(status, id){
	  	if(status == 'completed'){
	  		document.getElementById('id').value = id;
	  		document.getElementById('status').value = status;
			$("#completed").modal('show');
    	}

	    else if(status == 'received') {
	    	alert(status);
	    	if (confirm("Are you sure received it.?")) {
	       
	            var  link = '{{route("admin.withdrawalAction")}}';
	            $.ajax({
		            url:link,
		            method:"post",
		            data:{id:id, status:status, "_token": "{{ csrf_token() }}" },
		            success:function(data){
		                if(data){
		                    toastr.success(data);
		                }
		            }
		        
		        });
	    	}
	    	return false;
	  	} 
	}


</script>
@endsection
