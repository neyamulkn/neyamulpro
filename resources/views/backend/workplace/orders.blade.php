@extends('backend.layouts.master')

@section('title', 'Manage orders')
@section('css')


<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">

<style>

figure.user-avatar.small {
    margin: 13px 13px 13px 0;
    float: left;
}
.transaction-list-item-earnings {
    margin-top: 9px;
}

.transaction-list-header-item, .transaction-list-item-item {
    width: 25%;
}
.transaction-list-header {
    padding-left: 30px;
}
.transaction-list-item {
    padding-left: 30px;
}
.post-tab .tab-header .tab-item{
	width: 145px !important;
}
</style>
@endsection

@section('content')
	<?php $status = Request::route('status') ?>
       <div class="dashboard-content">
            <div class="post-tab xmtab" style="display: block;">

            	<?php 
            	$user_id = Auth::user()->id;
            	$active =  $delivered =  $completed = $cancel =  0;
            	$get_status = DB::table('job_orders')
            				->where(function($query) use ($user_id) {
					            $query->where('job_orders.buyer_id', $user_id)
					            ->orWhere('job_orders.freelancer_id', $user_id);
					        })->selectRaw('status, count(status) as totalStatus')
							->groupBy('status')->get();
            	foreach($get_status as $order_status){
      
            		if($order_status->status == 'active'){ $active = $order_status->totalStatus ; }
            		if($order_status->status == 'delivered'){ $delivered = $order_status->totalStatus ; }
            		if($order_status->status == 'completed'){ $completed = $order_status->totalStatus ; }
            		if($order_status->status == 'cancel'){ $cancel = $order_status->totalStatus ; }
            	
            	}

            	$all = $active +$delivered+ $completed+ $cancel;

            	?>
				<!-- TAB HEADER -->
				<div class="tab-header primary" >
					<!-- TAB ITEM -->
					<div class="tab-item {{(Request::route('status') == 'active' || !Request::route('status') ) ? 'selected': ''}}" onclick="get_order('active')">
						<p class="text-header">ACTIVE ({{$active}})</p>
					</div>
					
					
					<div class="tab-item {{(Request::route('status') == 'delivered' ) ? 'selected': ''}}" onclick="get_order('delivered')">
						<p class="text-header" >DELIVERED ({{$delivered}})</p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'completed'  ) ? 'selected': ''}}" onclick="get_order('completed')">
						<p class="text-header">COMPLETED ({{$completed}}) </p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'cancel' ) ? 'selected': ''}}" onclick="get_order('cancel')">
						<p class="text-header">CANCELED ({{$cancel}}) </p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'all' ) ? 'selected': ''}}">
						<p class="text-header" onclick="get_order('all')">All ({{$all}})</p>
					</div>
				</div>
					
				<div class="void open" id="open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
					<div class="product-list list full v2">
						  
			            <div class="show_order">
			                <table class="responsive-table-input-matrix">
			                    <thead>
			                    
			                    <tr>
			                        <th>Job Title </th>
			                        <th>Project Type</th>
			                        <th>Order date</th>
			                        <th>Total</th>
			                        <th>Status</th>
			                        
			                    </tr>
			                    </thead>
			                <tbody>
			              
			                @if(count($get_order) > 0)
			                	@foreach($get_order as $show_order)
			                   
			                    <tr class="tbgig">
			                        
			                        <td class="title js-toggle-gig-stats ">
			                            <div class="ellipsis1">
			                                <a class="ellipsis" target="_blank" href="{{ url('dashboard/workplace/order-details/'. $show_order->order_id) }}">{{ $show_order->job_title }}</a>
			                            </div>
			                        </td>
			                        <td>{{ $show_order->price_type }}</td>
			                        <td>{{ \Carbon\Carbon::parse($show_order->created_at)->format('d m , Y') }}</td>
			                        <td>{{ $show_order->proposal_budget }}</td>
			                        
			                        <td>
			                            <label for="sv" class="select-block v3">
			                                <span style="text-transform:uppercase;" class="alert alert-success">{{$show_order->status}}
			                            </label>
			                        </td>
			                    </tr>
			                   
				                @endforeach
				                @else
				                 <tr><td colspan="5">No orders found.!</td></tr>
				            	
				            	@endif
				                </tbody>
				                
				            </table>
				            <div class="page primary paginations">
				               {{ $get_order->links() }}
				            </div>
				            
							<!-- data show-->
						</div> 
					</div>
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				
			</div>

			<div class="clearfix"></div>			

			<!-- FORM BOX ITEMS -->
			<!-- /FORM BOX ITEMS -->
        </div>
@endsection
@section('js')

<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>



<script type="text/javascript">
	
    function get_order(status){
    	
    	window.history.pushState({}, "", status);
        var  link = '<?php echo route('job_manage_order');?>/'+status;
      	 window.history.pushState({}, "", link);
        $.ajax({
            url:link,
            method:"get",
            data:{ajaxRequest:'status'},
            success:function(data){
                if(data){
                   
                    $('.show_order').html(data);
                   
              	}
           	}
        });
    }

	$('.tab-item').on('click', function(){
	    $('.tab-item').removeClass('selected');
	    $(this).addClass('selected');
	});

</script>

@endsection