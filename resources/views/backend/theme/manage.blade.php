@extends('backend.layouts.master')
<?php $title = strtolower(Auth::user()->username) ; ?>
@section('title', 'Manage theme | Hotlancer')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/bootstrap-datepicker3.standalone.min.css">

	<style type="text/css">
		.text-header.big {
			    font-size: 25px !important;
			    text-align: center !important;
		}
		.sale-data-item{
			width: 20% !important;
		}
		.sale-data-item .sale-data-item-info .text-header {
		    margin-bottom: 20px !important;
		}
		.sale-data-item {
			  height: 100px !important;
		    text-align: center !important;
		    padding: 16px 0 0 25px !important;
		    
		}

		.sale-data-item .text-header.big, .sale-data-item .price.big {
		     float: none !important; 

		}
		.transaction-list-header-item, .transaction-list-item-item {
		    width: 30% !important;
		}
		.page {
		    float: right;
		    margin-top: 24px;
		    overflow: visible !important;
		}

				.page-link{
		 
		    background-color: #535d5f;
		    color: #fff;
		 
		}.pagination.active {
		    background-color: #00d7b3 !important;
		}
		.transaction-list-item, .transaction-list{
			padding: 3px 8px;
		}
	</style>
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
      
            
			<!-- SALE DATA -->
			<div class="sale-data">
				<!-- SALE DATA ITEM -->
				<div class="sale-data-item">
					<div class="sale-data-item-info">
						<p class="text-header">Net Income</p>
						
					</div>
					<p class="text-header big">8.530</p>
					
				</div>
				<!-- /SALE DATA ITEM-->

				<!-- SALE DATA ITEM -->
				<div class="sale-data-item">
					<div class="sale-data-item-info">
						<p class="text-header">Total Sales</p>
						
					</div>
					<p class="text-header big">234</p>
					
				</div>
				<!-- /SALE DATA ITEM-->

				<!-- SALE DATA ITEM -->
				<div class="sale-data-item">
					<div class="sale-data-item-info">
						<p class="text-header">User for purchas</p>
						
					</div>
					<p class="text-header big"><span>$</span>12.450</p>
					
				</div>
				<!-- /SALE DATA ITEM-->

				<!-- SALE DATA ITEM -->
				<div class="sale-data-item">
					<div class="sale-data-item-info">
						<p class="text-header">Pending Clearanc</p>
						
					</div>
					<p class="text-header big"><span>$</span>10.630</p>
					
				</div>
				<!-- /SALE DATA ITEM--><!-- SALE DATA ITEM -->
				<div class="sale-data-item">
					<div class="sale-data-item-info">
						<p class="text-header">Available for Withdrawal</p>
						
					</div>
					<p class="text-header big"><span>$</span>10.630</p>
					
				</div>
				<!-- /SALE DATA ITEM-->
			</div>
			<!-- /SALE DATA -->
      <!-- HEADLINE -->
            <div class="headline statement primary">
                <h4>Theme List</h4>
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
							<option value="0">All Purchases</option>
							<option value="marketplace">Marketplace</option>
							<option value="workplace">Workplace</option>
							<option value="themeplace">Themeplace</option>
							<option value="referrel">Referrel</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</form>
            </div>
            <!-- /HEADLINE -->
			<!-- TRANSACTION LIST -->
			<div class="transaction-list">
				<!-- TRANSACTION LIST HEADER -->
				<div class="transaction-list-header">
					<div class="transaction-list-header-price">
						<p class="text-header small">#Sl</p>
					</div>
					
					<div class="transaction-list-header-earnings">
						<p class="text-header small">Image</p>
					</div>
					<div class="transaction-list-header-item">
						<p class="text-header small">Item</p>
					</div>
					
					<div class="transaction-list-header-code">
						<p class="text-header small">Total Sell</p>
					</div>
					<div class="transaction-list-header-price">
						<p class="text-header small">Price</p>
					</div>
					<div class="transaction-list-header-earnings">
						<p class="text-header small">Earnings</p>
					</div>
					<div class="transaction-list-header-earnings">
						<p class="text-header small">Status</p>
					</div>
					<div class="transaction-list-header-earnings">
						<p class="text-header small">Action </p>
					</div>
					<div class="transaction-list-header-icon"></div>
				</div>
				<!-- /TRANSACTION LIST HEADER -->
				@if(count($get_theme_info)>0)
					<?php $i=1; ?>
					@foreach($get_theme_info as $view_theme)
					<div class="transaction-list-item" id="item{{$view_theme->theme_id}}">
						<div class="transaction-list-item-price">
							<p>{{$i++}}</p>
						</div>
						
						<div class="transaction-list-item-earnings">
							<span>
                                <img width="40px" height="40px" src="{{asset('theme/images/'.$view_theme->main_image)}}" alt="image" ></span>
						</div>
						<div class="transaction-list-item-item">
							<p class="category primary"><a href="{{route('theme_detail', $view_theme->theme_url)}}" target="_blank">{{$view_theme->theme_name}}</a></p>
						</div>
						<div class="transaction-list-item-detail">
							<p>{{$view_theme->total_sell}}</p>
						</div>
						<div class="transaction-list-item-code">
							<p><span class="light">${{$view_theme->price_regular}}</span></p>
						</div>
						<div class="transaction-list-item-price">
							<p>${{($view_theme->total_earn)? $view_theme->total_earn : 0}}</p>
						</div>
						
						<div class="transaction-list-item-price">
							<p>{{($view_theme->status == 1)? "Active" : "Deactive"}}</p>
						</div>

						<div class="transaction-list-item-earnings">
							<p class="text-header">
							<select onchange="action_type(this.value,'{{$view_theme->theme_url}}', '{{$view_theme->theme_id}}')">
								<option value="0">select</option>
								<option value="edit">Edit</option>
								<option value="delete">Delete</option>
							</select></p>
						</div>
						
					</div>
					@endforeach
					<!-- /TRANSACTION LIST ITEM -->
				@else
				<h3 style="text-align: center;padding: 10px;">There are no transactions to show here.. <h3>
				@endif
				<div class="page primary paginations">
                   {{$get_theme_info->links()}}
                </div>
			</div>
			<!-- /TRANSACTION LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->
@endsection

@section('js')
<!-- Bootstrap Datepicker -->
<script src="{{asset('/allscript')}}/js/vendor/bootstrap-datepicker.min.js"></script>

<!-- Dashboard Statement -->
<script src="{{asset('/allscript')}}/js/dashboard-statement.js"></script>

<script type="text/javascript">
	function action_type(type, theme_url=null, theme_id=null) {
	if(type == 'delete'){
    	if (confirm("Are you sure delete it.?")) {
       
            var  link = '{{route("delete_theme")}}';
            $.ajax({
            url:link,
            method:"post",
            data:{
            	theme_id: theme_id,
            	_token: '{{csrf_token()}}'
            },
            success:function(data){
                if(data){
                    $("#item"+theme_id).hide();
                    toastr.error(data);
                }else{
                	toastr.error(data);
                }
	           }
	        
	        });
	    }
	    return false;
	}
	if(type == 'edit'){
	
		window.location.replace('{{url("dashboard/themeplace/upload")}}/'+theme_url);
	}
   
        
} 
</script>
@endsection