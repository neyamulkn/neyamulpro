@extends('admin.layouts.master')

@section('title', 'Manage Themes')
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
            	$active = $draft = $pending = $reject = 0;
            	foreach($get_status as $count_status){
      
            		if($count_status->status == 'active'){ $active +=1 ; }
            		if($count_status->status == 'draft'){ $draft +=1 ; }
            		if($count_status->status == 'pending'){ $pending +=1 ; }
            		if($count_status->status == 'reject'){ $reject +=1 ; }
            		
            	}

            	$all = $active+$draft +$pending+$reject;

            	?>
				<!-- TAB HEADER -->
				<div class="tab-header primary" >
					<!-- TAB ITEM -->
					<div class="tab-item {{(Request::route('status') == 'active') ? 'selected': ''}}" onclick="get_order('active')">
						<p class="text-header">ACTIVE</p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'draft')? 'selected': ''}}" onclick="get_order('draft')">
						<p class="text-header">DRAFT ({{$draft}})</p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'pending')? 'selected': ''}}" onclick="get_order('pending')">
						<p class="text-header" >PENDING ({{$pending}})</p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'reject')? 'selected': ''}}" onclick="get_order('reject')">
						<p class="text-header" >REJECT ({{$reject}})</p>
					</div>
					<div class="tab-item {{(Request::route('status') == 'all')? 'selected': ''}}">
						<p class="text-header" onclick="get_order('all')">All ({{$all}})</p>
					</div>
				</div>
				<div class="void open" id="open">
							<!-- COMMENTS -->
					<div class="comment-list"><br>
								<!-- COMMENT -->
						<div class="product-list list full v2">
										<!-- data show-->
							<div class="show_order">
								@if(count($get_theme_info)>0)
				               
				                <table class="responsive-table-input-matrix">
				                    <thead>
					                    
					                    <tr>
					                        <th>Image</th>
					                        <th>Item</th>
					                        <th>Total Sell</th>
					                        <th>Price</th>
					                        <th>Earnings</th>
					                        <th>Status</th>
					                        <th>Action</th>
					                    </tr>
				                    </thead>
					                <tbody>
				                		@foreach($get_theme_info as $view_theme)
				                            <tr id="item{{$view_theme->theme_id}}">
				                               
				                                <td class="gig-pict-45">
				                                    <span class="gig-pict-45">
				                                        <a href="#"><img src="{{asset('theme/images/'.$view_theme->main_image)}}" alt="" ></a>
				                                    </span>
				                                </td>
				                                <td class="title js-toggle-gig-stats ">
				                                    <div class="ellipsis1">
				                                        <a class="ellipsis" target="_blank" href="{{route('theme_detail', $view_theme->theme_url)}}">{{$view_theme->theme_name}}</a>
				                                    </div>
				                                </td>
				                                <td>{{$view_theme->total_sell}}</td>
				                                <td>${{$view_theme->price_regular}}</td>
				                                <td>${{($view_theme->total_earn)? $view_theme->total_earn : 0}}</td>
				                                <td>{{$view_theme->status}}</td>
				                                
				                                <td>
				                                    <label for="sv" class="select-block v3">
				                                        <select onchange="action_type(this.value,'{{$view_theme->theme_url}}', '{{$view_theme->theme_id}}')"  name="sv" id="sv">
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
				                  {{ $get_theme_info->links()}}
				             	</div>

					        	@else No  theme found @endif

							</div> 
						</div>
							<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				
			</div>

			<div class="clearfix"></div>			
        </div>

@endsection
@section('js')
<!-- Tooltipster -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src="{{asset('/allscript')}}/js/vendor/imgLiquid-min.js"></script>
<!-- Tweet -->
<script src="{{asset('/allscript')}}/js/vendor/twitter/jquery.tweet.min.js"></script>

<script src="{{asset('/allscript')}}/js/vendor/jquery.xmtab.min.js"></script>

<!-- Liquid -->
<script src="{{asset('/allscript')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{asset('/allscript')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{asset('/allscript')}}/js/image-slides.js"></script>

<!-- XM Accordion -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- Item V1 -->
<!-- Tooltip -->
<script src="{{asset('/allscript')}}/js/tooltip.js"></script>
<!-- User Quickview Dropdown -->
<script src="{{asset('/allscript')}}/js/user-board.js"></script>
<!-- Footer -->
<script src="{{asset('/allscript')}}/js/footer.js"></script>


<!-- XM Pie Chart -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>



<script type="text/javascript">

    function get_order(status){
    	document.getElementById('open').style.display = 'block';
    	history.pushState('manage/', '/manage/', status);
        var  link = '<?php echo URL::to("dashboard/themeplace/manage");?>/'+status+'?type=status'; //type send for direct link & ajax link itentify
       	
        $.ajax({
            url:link,
            method:"get",
            data:{
                status:status,bystatus:3
            },
            success:function(data){
                if(data){
                   
                    $('.show_order').html(data);
                   
              	}
           	}
        });
    }
    
</script>


<script type="text/javascript">
	function action_type(type, theme_url=null, theme_id=null) {

	if(type == 'active' || type == 'reject'){
		if (confirm("Are you sure "+type+" it.?")) {
       
            var  link = '{{route("approveOrReject")}}';
            $.ajax({
	            url:link,
	            method:"post",
	            data:{
	            	theme_id: theme_id,
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



$('.tab-item').on('click', function(){
    $('.tab-item').removeClass('selected');
    $(this).addClass('selected');
});
</script>






@endsection