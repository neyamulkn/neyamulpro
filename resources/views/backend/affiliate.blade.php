@extends('backend.layouts.master')

@section('title', 'Manage orders')

<style type="text/css">
	.ref_head{
		width: 25% !important;
	}
</style>

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
        	<!-- HEADLINE -->
            <div class="headline buttons two primary">
                <h4>Generate a Affiliate Marketting </h4>
				<a href="#new-message-popup" class="button mid-short secondary open-new-message">Affiliate Code</a>
				
            </div>
            <!-- /HEADLINE -->

			<!-- dashboard-affiliate-program -->
			<div class="form-box-item padded">
				<h4>Generate a  Affiliate Code</h4>
				<hr class="line-separator">
				<!-- INPUT CONTAINER -->
				<div class="input-container">
					<label for="company_name3" class="rl-label">Your username *</label>
					<input type="text" form="profile-info-form" id="company_name3" name="company_name3" value="HOTLancer"">
				</div>
				
				<div class="input-container half">
					<label for="state_city3" class="rl-label required">Select Type</label>
					<label for="state_city3" class="select-block">
						<select form="profile-info-form" name="state_city3" id="state_city3">
							<option value="0">GIGs</option>
							<option value="1">Theme</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<!-- /INPUT CONTAINER -->

				<!-- INPUT CONTAINER -->
				<div class="input-container half">
					<label for="state_city3" class="rl-label required">Select Type</label>
					<label for="state_city3" class="select-block">
						<select form="profile-info-form" name="state_city3" id="state_city3">
							<option value="0">Recent</option>
							<option value="1">Random</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<br/>
				<!-- /INPUT CONTAINER -->
				<div class="input-container half">
					<label for="state_city3" class="rl-label required">Select Width ROW</label>
					<label for="state_city3" class="select-block">
						<select form="profile-info-form" name="state_city3" id="state_city3">
							<option value="1">Row 1</option>
							<option value="2">Row 2</option>
							<option value="3">Row 3</option>
							<option value="4">Row 4</option>
							<option value="5">Row 5</option>
							<option value="6">Row 6</option>
							<option value="7">Row 7</option>
							<option value="8">Row 8</option>
							<option value="9">Row 9</option>
							<option value="10">Row 10</option>
							<option value="11">Row 11</option>
							<option value="12">Row 12</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<!-- /INPUT CONTAINER -->

				<!-- INPUT CONTAINER -->
				<div class="input-container half">
					<label for="state_city3" class="rl-label required">Select Height ROW</label>
					<label for="state_city3" class="select-block">
						<select form="profile-info-form" name="state_city3" id="state_city3">
							<option value="1">Row 1</option>
							<option value="2">Row 2</option>
							<option value="3">Row 3</option>
							<option value="4">Row 4</option>
							<option value="5">Row 5</option>
							<option value="6">Row 6</option>
							<option value="7">Row 7</option>
							<option value="8">Row 8</option>
							<option value="9">Row 9</option>
							<option value="10">Row 10</option>
							<option value="11">Row 11</option>
							<option value="12">Row 12</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</div>
				<div class="input-container">
					<label for="notes3" class="rl-label">Aditional Notes</label>
					<textarea form="profile-info-form" id="notes3" name="notes3" placeholder="code Enter aditional notes here..."></textarea>
				</div>
				<!-- /INPUT CONTAINER -->
			</div>
			<!-- /dashboard-affiliate-program -->

			<div class="clearfix"></div>			
			<div class="transaction-list">
				<!-- TRANSACTION LIST HEADER -->
				<div class="transaction-list-header">
					<div class="transaction-list-header-date ref_head">
						<p class="text-header small">Month</p>
					</div>
					<div class="transaction-list-header-author ref_head">
						<p class="text-header small">Total View</p>
					</div>
					<div class="transaction-list-header-item ref_head">
						<p class="text-header small">Sale Item</p>
					</div>
					<div class="transaction-list-header-detail ref_head">
						<p class="text-header small">Earning</p>
					</div>
				</div>
				<!-- /TRANSACTION LIST HEADER -->

				<!-- TRANSACTION LIST ITEM -->
				<div class="transaction-list-item">
					<div class="transaction-list-item-date ref_head">
						<p>May</p>
					</div>
					<div class="transaction-list-item-author ref_head">
						<p class="text-header">5</p>
					</div>
					<div class="transaction-list-item-item ref_head">
						<p class="category ">50</p>
					</div>
					<div class="transaction-list-item-detail ref_head">
						<p class="category ">$45</p>
					</div>
					
					
				</div>
				<!-- /TRANSACTION LIST ITEM -->
				</div>
				<!-- /TRANSACTION LIST ITEM -->

			
			</div>
			
        </div>
        <!-- DASHBOARD CONTENT -->

  
 @endsection