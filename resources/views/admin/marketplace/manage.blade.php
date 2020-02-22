@extends('backend.layouts.master')

@section('title', 'Manage gigs')
@section('css')

  
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
@endsection
@section('content')

    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
    	<div class="headline buttons primary">
            <h4>Manage Gigs</h4>
			<a href="{{url('dashboard/create-gig')}}" class="button mid-short primary">Create new gig</a>
        </div>
        <div class="post-tab xmtab" style="display: block;">
			<!-- TAB HEADER -->

			<?php 
			$user_id = Auth::user()->id;
			$get_status = DB::table('gig_basics')
            ->select('gig_status as status')
            ->where('gig_user_id' , '=', $user_id)
            ->get();
        	$all = $active = $draft = $pending = $denied = $paused = 0;
        	foreach($get_status as $show_status){
  
        		if($show_status->status == 'active'){ $active +=1 ; }
        		if($show_status->status == 'pending'){ $pending +=1 ; }
        		if($show_status->status == 'draft'){ $draft +=1 ; }
        		if($show_status->status == 'denied'){ $denied +=1 ; }
        		if($show_status->status == 'paused'){ $paused +=1 ; }
        	}

        	$all = $active+$pending +$draft+ $denied+ $paused;

        	?>
			<div class="tab-header primary">
				<!-- TAB ITEM -->
				<div class="tab-item {{(Request::route('status') == 'active') ? 'selected': ''}}" onclick="get_gigs('active')">
					<p class="text-header">ACTIVE({{$active}}) </p>
				</div>
				<div class="tab-item {{(Request::route('status') == 'pending') ? 'selected': ''}}"  onclick="get_gigs('pending')">
					<p class="text-header">PENDING APPROVAL({{$pending}})</p>
				</div>
				<div class="tab-item {{(Request::route('status') == 'draft') ? 'selected': ''}}"  onclick="get_gigs('draft')">
					<p class="text-header">DRAFT({{$draft}})</p>
				</div>
				<div class="tab-item {{(Request::route('status') == 'denied') ? 'selected': ''}}"  onclick="get_gigs('denied')">
					<p class="text-header">DENIED({{$denied}})</p>
				</div>
				<div class="tab-item {{(Request::route('status') == 'paused') ? 'selected': ''}}"  onclick="get_gigs('paused')">
					<p class="text-header">PAUSED({{$paused}})</p>
				</div>
				<div class="tab-item {{(Request::route('status') == 'all') ? 'selected': ''}}"  onclick="get_gigs('all')">
					<p class="text-header">ALL({{$all}})</p>
				</div>
				<!-- /TAB ITEM -->
			</div>
			<!-- /TAB HEADER -->

			<div class="void open" id="open">
				<!-- COMMENTS -->
				<div class="comment-list"><br>
					<!-- COMMENT -->
				<div class="product-list list full v2">
					<div class="show_gigs">
					@if(count($get_gigs)>0)
						<table class="responsive-table-input-matrix">
		                    <thead>
		                    <tr>
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
		                    	@foreach($get_gigs as $show_gig)

		                            <tr class="tbgig" id="item{{$show_gig->gig_id}}">
		                                <td class="gig-pict-45">
		                                    <span class="gig-pict-45">
		                                        <a href="#"><img src="{{asset('gigimages/'.$show_gig->image_path)}}" alt="" ></a>
		                                    </span>
		                                </td>
		                                <td class="title js-toggle-gig-stats ">
		                                    <div class="ellipsis1">
		                                        <a class="ellipsis" target="_blank" href="{{url('marketplace/'.$show_gig->gig_url)}}">{{$show_gig->gig_title }}</a>
		                                    </div>
		                                </td>
		                                <td>{{$show_gig->gig_impress }} <i class="fa fa-long-arrow-up green"></i></td>
		                                <td>{{$show_gig->gig_click }} <i class="fa fa-long-arrow-up green"></i></td>
		                                <td>{{$show_gig->gig_view }} <i class="fa fa-long-arrow-up green"></i></td>
		                                <td>{{$show_gig->gig_impress }} <i class="fa fa-long-arrow-up green"></i></td>
		                                <td>{{$show_gig->gig_impress }} <i class="fa fa-long-arrow-down red"></i></td>
		                                <td>
		                                    <label for="sv" class="select-block v3">
		                                        <select onchange="action_type(this.value, '{{$show_gig->gig_id}}')" name="sv" id="sv">
		                                            <option value="0">select action</option>
		                                            @if(Auth::user()->role_id == env('ADMIN')){
						                            <option value="active">Approve</option>
						                            <option value="reject">Reject</option>
						                           	@else
		                                            <option value="delete">Delete</option>
		                                            @endif
		                                        </select>
		                                        <!-- SVG ARROW -->
		                                        <svg class="svg-arrow">
		                                            <use xlink:href="#svg-arrow"></use>
		                                        </svg>
		                                        <!-- /SVG ARROW -->
		                                    </label>
		                                </td>
		                            </tr>
		                    	@endforeach
		                    </tbody>
	                	</table>
	                		<div class="page primary paginations">
				                {{ $get_gigs->links()}}
				            </div>
	            		@else No gigs found @endif
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>			
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

<!-- Liquid -->
<script src="{{asset('/allscript')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{asset('/allscript')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{asset('/allscript')}}/js/image-slides.js"></script>
 
<!-- Tooltip -->
<script src="{{asset('/allscript')}}/js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="{{asset('/allscript')}}/js/user-board.js"></script>

<!-- Dashboard Header -->
<script src="{{asset('/allscript')}}/js/dashboard-header.js"></script>

<script type="text/javascript">

    function get_gigs(status){
    	document.getElementById('open').style.display = 'block';
    	
        var  link = '{{route("admin_manage_gigs")}}/'+status+'?type=status';
      
        $.ajax({
            url:link,
            method:"get",
            success:function(data){
                if(data){
                    $('.show_gigs').html(data);
              	}
           	}
        });
    }

function action_type(type, gig_id=null) {

	if(type == 'active' || type == 'reject'){
		if (confirm("Are you sure "+type+" it.?")) {
       
            var  link = '{{route("gigApproveOrReject")}}';
            $.ajax({
	            url:link,
	            method:"post",
	            data:{
	            	gig_id: gig_id,
	            	status: type,
	            	_token: '{{csrf_token()}}'
	            },
	            success:function(data){
	                if(data.status == 'success'){
	                    toastr.success(data.message);
	                }else{
	                	toastr.error(data.message);
	                }
	           }
	        });
	    }
	    return false;
	}

	if(type == 'delete'){
    	if (confirm("Are you sure delete it.?")) {
       
            var  link = '{{route("gig_delete")}}';
            $.ajax({
            url:link,
            method:"post",
            data:{
            	gig_id: gig_id,
            	_token: '{{csrf_token()}}'
            },
            success:function(data){
                if(data){
                    $("#item"+gig_id).hide();
                    toastr.error(data);
                }else{
                	toastr.error(data);
                }
	           }
	        
	        });
	    }
	    return false;
	}
}

$('.tab-item').on('click', function(){
    $('.tab-item').removeClass('selected');
    $(this).addClass('selected');
});

</script>

    
</script>



@endsection
