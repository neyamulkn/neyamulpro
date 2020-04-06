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
            <h4>User Lists</h4>
			
        </div>
        <div class="post-tab xmtab" style="display: block;">
			<!-- TAB HEADER -->

			<?php 
			$get_status = DB::table('users')
            ->select('status')->get();

        	$all = $active = $draft = $pending = $reject = $paused = $close = 0;
        	foreach($get_status as $show_status){
  
        		if($show_status->status == 'active'){ $active +=1 ; }
        		if($show_status->status == 'pending'){ $pending +=1 ; }
        		if($show_status->status == 'reject'){ $reject +=1 ; }
        		if($show_status->status == 'close'){ $close +=1 ; }
        		
        	}

        	$all = $active+$pending+$close+ $reject;

        	?>
			<div class="tab-header primary">
				<!-- TAB ITEM -->
				<div class="tab-item {{(Request::route('status') == 'active' || !Request::route('status') ) ? 'selected': ''}}" onclick="get_users('active')">
					<p class="text-header">ACTIVE({{$active}}) </p>
				</div>
				<div class="tab-item {{(Request::route('status') == 'pending') ? 'selected': ''}}"  onclick="get_users('pending')">
					<p class="text-header">PENDING APPROVAL({{$pending}})</p>
				</div>
				
				<div class="tab-item {{(Request::route('status') == 'reject') ? 'selected': ''}}"  onclick="get_users('reject')">
					<p class="text-header">REJECT({{$reject}})</p>
				</div>

				<div class="tab-item {{(Request::route('status') == 'close') ? 'selected': ''}}"  onclick="get_users('close')">
					<p class="text-header">Close({{$close}})</p>
				</div>
				
				<div class="tab-item {{(Request::route('status') == 'all') ? 'selected': ''}}"  onclick="get_users('all')">
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
					<div class="show_users">
					@if(count($get_users)>0)
						<table class="responsive-table-input-matrix">
		                    <thead>
		                    <tr>
		                        <th>IMG</th>
						        <th>NAME </th>
						        <th>DATE</th>
						        <th>EMAIL</th>
						        <th>PHONE</th>
						        <th>COUNTRY</th>
						        <th>GIGS</th>
						        <th>THEMES</th>
						        <th>JOBS</th>
						        <th>Action</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($get_users as $show_user)

		                            <tr class="tbgig" id="item{{$show_user->id}}">
		                                <td class="gig-pict-45">
		                                    <span class="gig-pict-45">
		                                        <a href="#"><img src="{{ asset('image/'.$show_user->userinfo->user_image )}}" alt="" ></a>
		                                    </span>
		                                </td>
		                                <td class="title js-toggle-gig-stats ">
		                                    <div class="ellipsis1">
		                                        <a class="ellipsis" target="_blank" href="{{route('profile_view', $show_user->username)}}">{{$show_user->name }}</a>
		                                    </div>
		                                </td>
		                                
		                                <td>{{ Carbon\Carbon::parse($show_user->created_at)->format('d M, Y') }}</td>
		                                <td>{{ $show_user->email }} </td>
						                <td>{{ $show_user->userinfo->user_phone }} </td>
						              	<td>{{$show_user->country }} </td>
		                                <td>{{ count($show_user->gigs) }}</td>
		                                <td>{{ count($show_user->themes) }}</td>
		                                <td>{{ count($show_user->jobs) }}</td>
		                                
		                                <td>
		                                    <label for="sv" class="select-block v3">
		                                        <select onchange="action_type(this.value, '{{$show_user->id}}')" name="sv" id="sv">
		                                            <option value="0">select action</option>
						                            <option value="active">Approve</option>
						                            <option value="reject">Reject</option>
		                                            <option value="delete">Delete</option>
		                                           
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
			                {{ $get_users->links()}}
			            </div>
	            		@else No user found @endif
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

    function get_users(status){
    	document.getElementById('open').style.display = 'block';
    	history.pushState({}, null, '{{route("manage_user")}}/'+status);
        var  link = '{{route("manage_user")}}/'+status+'?ajaxRequest=status';
      
        $.ajax({
            url:link,
            method:"get",
            success:function(data){
                if(data){
                    $('.show_users').html(data);
              	}
           	}
        });
    }

function action_type(type, id=null) {

	if(type == 'active' || type == 'reject'){
		if (confirm("Are you sure "+type+" it.?")) {
       
            var  link = '{{route("userApproveOrReject")}}';
            $.ajax({
	            url:link,
	            method:"post",
	            data:{
	            	id: id,
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
       
            var  link = '{{route("user_delete")}}';
            $.ajax({
            url:link,
            method:"post",
            data:{
            	id: id,
            	_token: '{{csrf_token()}}'
            },
            success:function(data){
                if(data){
                    $("#item"+id).hide();
                    toastr.success(data);
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
