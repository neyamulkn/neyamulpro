@extends('backend.layouts.master')
<?php $title = strtolower(Auth::user()->username) ; ?>
@section('title', 'Hotlancer | '. $title. ' | earnings')

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
	</style>
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
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
            <div style="width: 100%;padding: 3px; font-weight: bold; text-align: right;"> Expected Earnings: $69</div>
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
						<p class="text-header">Withdrawn</p>
						
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

			<!-- TRANSACTION LIST -->
			<div class="transaction-list">
				<!-- TRANSACTION LIST HEADER -->
				<div class="transaction-list-header">
					<div class="transaction-list-header-date">
						<p class="text-header small">Date</p>
					</div>
					<div class="transaction-list-header-author">
						<p class="text-header small">Buyer</p>
					</div>
					<div class="transaction-list-header-item">
						<p class="text-header small">Item</p>
					</div>
					<div class="transaction-list-header-detail">
						<p class="text-header small">Detail</p>
					</div>
					<div class="transaction-list-header-code">
						<p class="text-header small">Type</p>
					</div>
					<div class="transaction-list-header-price">
						<p class="text-header small">Price</p>
					</div>
					<div class="transaction-list-header-earnings">
						<p class="text-header small">Earnings</p>
					</div>
					<div class="transaction-list-header-icon"></div>
				</div>
				<!-- /TRANSACTION LIST HEADER -->
				@if(count($get_earnings)>0)
					<!-- TRANSACTION LIST ITEM -->
					@foreach($get_earnings as $get_earning)
					<div class="transaction-list-item">
						<div class="transaction-list-item-date">
							<p>{{ \Carbon\Carbon::parse($get_earning->created_at)->format('M d, Y')}}</p>
						</div>
						<div class="transaction-list-item-author">
							<p class="text-header"><a href="#">{{$get_earning->username}}</a></p>
						</div>
						<div class="transaction-list-item-item">
							<p class="category primary"><a href="{{url('gig/'.$get_earning->username.'/'.$get_earning->gig_url)}}">{{$get_earning->gig_title}}</a></p>
						</div>
						<div class="transaction-list-item-detail">
							<p>Marketplace</p>
						</div>
						<div class="transaction-list-item-code">
							<p><span class="light">{{$get_earning->type}}</span></p>
						</div>
						<div class="transaction-list-item-price">
							<p>${{$get_earning->price}}</p>
						</div>
						
						<div class="transaction-list-item-earnings">
							<p class="text-header">${{$get_earning->earning}}</p>
						</div>
						
					</div>
					@endforeach
					<!-- /TRANSACTION LIST ITEM -->
				@else
				<h3 style="text-align: center;padding: 10px;">There are no transactions to show here.. <h3>
				@endif

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
@endsection