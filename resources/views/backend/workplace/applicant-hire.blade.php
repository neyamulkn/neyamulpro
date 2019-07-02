@extends('backend.layouts.master')

@section('title', 'All proposals lists ')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	<style type="text/css">
		.active {
		    border-bottom: none !important;
		}
		.text-muted {
		    color: #fff !important;
		}
	</style>
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
			<div class="headline simple primary">
				<h4>Buy Credits</h4>
			</div>
			<div class="form-box-items wrap-1-3 right">
				<div class="hotlancer-work">
					<h3 class="up-post-sub">Additional Details right</h3>
					<div class="up-sub-mainup">
						
					</div>
				</div>
				
			</div>
            <div class="form-box-items wrap-3-1 left">
				<div class="hotlancer-work">
					<div class="hotla-work">
						<h3 class="up-post-sub v2"><img class="user-avatar123" src="images/avatars/avatar_06.jpg" alt="">	<span class="usernamehot">Viral Gajjar</span></h3>						
						<div class="up-sub-mainup">
							<b>Total Amount</b><br>
							<a class="hot-workoklike" href="#" target="_blank" rel="noopener">Developer needed for creating a responsive WordPress Theme</a> (#216594719)
							<div class="">
								<p class="control-xx">Contract Title</p>
								<div class="width-lg">
									<input type="text" name="fname" value="Developer needed for creating a responsive WordPress Theme">
								</div>
							</div>
						
						</div>
					</div>
				</div>
				<div class="hotlancer-work">
					<h3 class="up-post-sub">Additional Details right</h3>
					<div class="up-sub-mainup">
							<b>Related Job Listing</b><br>
							<b class="prhot">$500.00 <a class="hot2work" href="#">Edit</a></b>
							<div>
								<div class="radioprhot">
								<div class="boxed">
								  <input type="radio" id="android" name="skills" value="Android Development">
								  <label for="android">Deposit $500.00 for the whole project</label>

								  <input type="radio" id="ios" name="skills" value="iOS Development">
								  <label for="ios">Deposit a lesser amount to cover the first milestone</label>
								</div>
							</div>
							</div>
							<div class="">
								<p class="control-xx">Contract Title</p>
								<div class="width-lg">
									<div class="prihotlancer1">
										<b>Description *</b>
										<input  type="text" name="fname" value="">
									</div>
									<div class="prihotlancer2">
										<b>Due Date UTC</b>
										<input type="text" name="fname" value="">
									</div>
									<div class="prihotlancer3">
										<b class="hotlancerxx">Deposit Amount *</b>
										<input type="text" name="fname" value="">
									</div>
								</div>
							</div>
						
						</div>
				</div>
			</div>
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection
