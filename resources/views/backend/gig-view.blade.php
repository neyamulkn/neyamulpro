@extends('backend.layouts.master')

@section('title', 'Manage gigs')
@section('css')

    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
@endsection
@section('content')

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <div class="post-tab xmtab" style="display: block;">
				<!-- TAB HEADER -->
				<div class="tab-header primary">
					<!-- TAB ITEM -->
					<div class="tab-item selected">
						<p class="text-header">ACTIVE (25)</p>
					</div>
					<div class="tab-item">
						<p class="text-header">PENDING APPROVAL</p>
					</div>
					<div class="tab-item">
						<p class="text-header">REQUIRES MODIFICATION</p>
					</div>
					<div class="tab-item">
						<p class="text-header">DRAFT</p>
					</div>
					<div class="tab-item">
						<p class="text-header">DENIED</p>
					</div>
					<div class="tab-item">
						<p class="text-header">PAUSED</p>
					</div>
					<!-- /TAB ITEM -->
				</div>
				<!-- /TAB HEADER -->

				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
					<div class="product-list list full v2">
						<table class="responsive-table-input-matrix">
							<thead>
							<tr class="header-filter">
                            <td colspan="12" class="js-filter-title">Active Gigs</td>
                            
							</tr>
							<tr>
								<th></th>
								<th>IMG</th>
								<th>GIG Title </th>
								<th>IMPRESSIONS</th>
								<th>CLICKS</th>
								<th>VIEWS</th>
								<th>ORDERS</th>
								<th>CANCELLATIONS</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>

							<tr class="tbgig">
								<td><input type="checkbox"></td>
								<td class="gig-pict-45">
									<span class="gig-pict-45">
										<a href="#"><img src="{{asset('/allscript')}}/images/items/westeroshtml_b06.jpg" alt="" ></a>
									</span>
								</td>
								<td class="title js-toggle-gig-stats ">
									<div class="ellipsis1">
										<a class="ellipsis" href="#">drive real traffic to your website for 1 month on google</a>
									</div>
								</td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-down red"></i></td>
								<td>
									<label for="sv" class="select-block v3">
										<select name="sv" id="sv">
											<option value="0"></option>
											<option value="1">Adobe Suite CS6</option>
											<option value="2">Adobe Suite CS7</option>
										</select>
										<!-- SVG ARROW -->
										<svg class="svg-arrow">
											<use xlink:href="#svg-arrow"></use>
										</svg>
										<!-- /SVG ARROW -->
									</label>
								</td>
							</tr>
							<tr class="tbgig">
								<td><input type="checkbox"></td>
								<td class="gig-pict-45">
									<span class="gig-pict-45">
										<a href="#"><img src="{{asset('/allscript')}}/images/items/westeroshtml_b06.jpg" alt="" ></a>
									</span>
								</td>
								<td class="title js-toggle-gig-stats ">
									<div class="ellipsis1">
										<a class="ellipsis" href="#">drive real traffic to your website for 1 month on google</a>
									</div>
								</td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-down red"></i></td>
								<td>
									<form>
										<label for="period1" class="select-block">
											<select name="period1" id="period1">
												<option value="0"></option>
												<option value="2">This Month</option>
												<option value="1">This Year</option>
											</select>
											<!-- SVG ARROW -->
											<svg class="svg-arrow">
												<use xlink:href="#svg-arrow"></use>
											</svg>
											<!-- /SVG ARROW -->
										</label>
									</form>
								</td>
							</tr>
							<tr class="tbgig">
								<td><input type="checkbox"></td>
								<td class="gig-pict-45">
									<span class="gig-pict-45">
										<a href="#"><img src="{{asset('/allscript')}}/images/items/westeroshtml_b06.jpg" alt="" ></a>
									</span>
								</td>
								<td class="title js-toggle-gig-stats ">
									<div class="ellipsis1">
										<a class="ellipsis" href="#">drive real traffic to your website for 1 month on google</a>
									</div>
								</td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-down red"></i></td>
								<td>
								</td>
							</tr>
							<tr class="tbgig">
								<td><input type="checkbox"></td>
								<td class="gig-pict-45">
									<span class="gig-pict-45">
										<a href="#"><img src="{{asset('/allscript')}}/images/items/westeroshtml_b06.jpg" alt="" ></a>
									</span>
								</td>
								<td class="title js-toggle-gig-stats ">
									<div class="ellipsis1">
										<a class="ellipsis" href="#">drive real traffic to your website for 1 month on google</a>
									</div>
								</td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-down red"></i></td>
								<td>
								</td>
							</tr>
							<tr class="tbgig">
								<td><input type="checkbox"></td>
								<td class="gig-pict-45">
									<span class="gig-pict-45">
										<a href="#"><img src="{{asset('/allscript')}}/images/items/westeroshtml_b06.jpg" alt="" ></a>
									</span>
								</td>
								<td class="title js-toggle-gig-stats ">
									<div class="ellipsis1">
										<a class="ellipsis" href="#">drive real traffic to your website for 1 month on google</a>
									</div>
								</td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-up green"></i></td>
								<td>17 <i class="fa fa-long-arrow-down red"></i></td>
								<td>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				<div class="void open" id="open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
					<div class="product-list list full v2">
								<!-- data show-->
						<div class="show_order"></div> 
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
        <!-- DASHBOARD CONTENT -->

@endsection


@section('js')

<!-- Tooltipster -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src="{{asset('/allscript')}}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Side Menu -->
<script src="{{asset('/allscript')}}/js/side-menu.js"></script>
<!-- Liquid -->
<script src="{{asset('/allscript')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{asset('/allscript')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{asset('/allscript')}}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src="{{asset('/allscript')}}/js/post-tab.js"></script>
<!-- XM Accordion -->
<script src="js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- Item V1 -->
<!-- Tooltip -->
<script src="{{asset('/allscript')}}/js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="{{asset('/allscript')}}/js/user-board.js"></script>
<!-- Footer -->
<script src="{{asset('/allscript')}}/js/footer.js"></script>

<!-- Dashboard Header -->
<script src="{{asset('/allscript')}}/js/dashboard-header.js"></script>

<script type="text/javascript">

	get_order('{{Request::route('status')}}');
    function get_order(status){

    	document.getElementById('open').style.display = 'block';
    	history.pushState('state/', '/buyer_order/', status);
        var  link = '<?php echo URL::to("dashbord/get_gigs_by_status/");?>/'+status;
       
        $.ajax({
            url:link,
            method:"get",
            data:{
                status:status
            },
            success:function(data){
                if(data){
                   
                    $('.show_order').html(data);
                   
              	}
           	}
        });
    }
    
</script>



@endsection
