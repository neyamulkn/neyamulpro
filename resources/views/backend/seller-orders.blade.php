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

.a{
  width: 68%;
    background-color: #ff0018;
    color: #fff;
    -ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    text-align: center;
    position: absolute;
    top: 8px;
    right: -27px;
}

</style>
@endsection

@section('content')
	<?php $status = Request::route('status') ?>
       <div class="dashboard-content">
            <div class="post-tab xmtab" style="display: block;">
			
            <?php 
            	 $seller_id = Auth::user()->id;
            	$priority = $new = $active = $late = $delivered = $completed = $cancel = $started= 0;
            	$get_status = DB::table('gig_orders')->where('gig_orders.seller_id' , '=', $seller_id)->get();
            	foreach($get_status as $order_status){
      
            		if($order_status->status == 'priority'){ $priority +=1 ; }
            		if($order_status->status == 'active'){ $active +=1 ; }
            		if($order_status->status == 'new'){ $new +=1 ; }
            		if($order_status->status == 'delivered'){ $delivered +=1 ; }
            		if($order_status->status == 'completed'){ $completed +=1 ; }
            		if($order_status->status == 'cancel'){ $cancel +=1 ; }
            		if($order_status->status == 'started'){ $started +=1 ; }
            		if($order_status->status == 'late'){ $late +=1 ; }
            		
            	}

            	$all = $priority+$active+ $late +$delivered+ $new+ $completed+ $cancel +$started;

            	?>
            	<div class="tab-header primary">
		
					<!-- TAB ITEM -->
					<div class="tab-item selected" onclick="get_order('priority')">
						<p class="text-header" >PRIORITY ({{$priority}})</p>
					</div>
					
					<div class="tab-item"  onclick="get_order('new')">
						<p class="text-header">NEW ({{$new}})</p>
					</div>
					<div class="tab-item"  onclick="get_order('active')">
						<p class="text-header">ACTIVE ({{$active}})</p>
					</div>
					
					<div class="tab-item"  onclick="get_order('late')">
						<p class="text-header">LATE ({{$late}})</p>
					</div>
					
					<div class="tab-item"  onclick="get_order('delivered')">
						<p class="text-header">DELIVERED ({{$delivered}})</p>
					</div>
					<div class="tab-item"  onclick="get_order('completed')">
						<p class="text-header">COMPLETED ({{$completed}})</p>
					</div>
					<div class="tab-item"  onclick="get_order('cancel')">
						<p class="text-header">CANCELLED ({{$cancel}})</p>
					</div>
					<div class="tab-item"  onclick="get_order('started')">
						<p class="text-header">STARRED ({{$started}})</p>
					</div>
					<!-- /TAB ITEM -->
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
<!-- Post Tab -->
<script src="{{asset('/allscript')}}/js/post-tab.js"></script>
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

	get_order('{{Request::route('status')}}');
    function get_order(status){

    	document.getElementById('open').style.display = 'block';
    	history.pushState('state/', '/buyer_order/', status);
        var  link = '<?php echo URL::to("dashboard/manage/get_seller_orders/");?>/'+status;
       
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

</script>






@endsection