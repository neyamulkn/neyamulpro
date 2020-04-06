@extends('backend.layouts.master')

@section('title', 'Manage affiliate')

<style type="text/css">
	.ref_head{
		width: 25% !important;
	}

	#copy-link{ position: absolute;top: -5px;right: 0;cursor: pointer;}
</style>

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
        	<!-- HEADLINE -->
            <div class="headline buttons two primary">
                <h4>Generate a Affiliate Marketting </h4>
				<button form="profile-info-form"  data-toggle="modal" data-target="#add" class="button mid-short primary">Affiliate Code</button>
				
            </div>
            <!-- /HEADLINE -->

			
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


			@foreach($get_ref_info as $show_ref_info)
					
				<div class="transaction-list-item">
					<div class="transaction-list-item-date ref_head">
						<p>{{ \Carbon\Carbon::parse($show_ref_info->created_at)->diffForHumans()}}</p>
					</div>
					<div class="transaction-list-item-author ref_head">
						<p class="text-header">{{$show_ref_info->total_view}}</p>
					</div>
					<div class="transaction-list-item-item ref_head">
						<p class="category ">{{$show_ref_info->total_item}}</p>
					</div>
					<div class="transaction-list-item-detail ref_head">
						<p class="category ">${{$show_ref_info->ref_earning}}</p>
					</div>
				</div>
			@endforeach
				<!-- /TRANSACTION LIST ITEM -->

			</div>
				<!-- /TRANSACTION LIST ITEM -->
		</div>
			

 <!-- affiliate modal --->  
	<div id="add" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Generate affiliate code</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
				</div>

			
	        <div class="modal-body form-box-item">
	        	<form action="{{route('affiliate_code')}}" id="generate_code" method="post" >
				 {{ csrf_field() }}
				<!-- dashboard-affiliate-program -->
				
					<!-- INPUT CONTAINER -->
					<div class="input-container">
						<label for="username" class="rl-label">Your username *</label>
						<input type="text" id="username" name="username" value="{{Auth::user()->username}}">
					</div>
					
					<div class="input-container half">
						<label for="platform_type" class="rl-label required">Select Type</label>
						<label for="platform_type" class="select-block">
							<select required="required" name="platform_type" id="platform_type">
								<option value="">Select Type</option>
								<option value="workplace">Workplace</option>
								<option value="themeplace">Themeplace</option>
								<option value="marketplace">Marketplace</option>
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
						<label for="popup" class="rl-label required">Window onclick popup</label>
						<label for="popup" class="select-block">
							<select  name="popup" id="popup">
								<option value="on">ON</option>
								<option value="off">OFF</option>
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
						<label for="total_product" class="rl-label required">Select total product</label>
						<label for="total_product" class="select-block">
							<select name="total_product" id="total_product" required="required">
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
						<label for="column" class="rl-label required">Select Column</label>
						<label for="column" class="select-block">
							<select name="column" id="column" required="required">
								<option value="1">Column 1</option>
								<option value="2">Column 2</option>
								<option value="3">Column 3</option>
								<option value="4">Column 4</option>
								<option value="5">Column 5</option>
								<option value="6">Column 6</option>
								<option value="7">Column 7</option>
								<option value="8">Column 8</option>
								<option value="9">Column 9</option>
								<option value="10">Column 10</option>
								<option value="11">Column 11</option>
								<option value="12">Column 12</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</div>
					<div id="get_code" class="input-container" style="display: none; position: relative;">
						<label for="code" class="rl-label">Get code</label>
						<div id="view_code" style="padding:3px; border: 1px solid #efeaea!important;"></div>
						<span id="copy-link" onclick="copyAdCode()"><i class="fa fa-copy"></i> copy</span>
					</div>
					<!-- /INPUT CONTAINER -->

					<div class="modal-footer">
			          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
			           <button type="submit" id="submitBtn" class="btn btn-sm btn-success">Get Code</button>
			        </div>
					<!-- /dashboard-affiliate-program -->
 			 	</form>
 			</div>
	    </div>
	</div>
	<!-- End location model---->		
 @endsection

 @section('js')

<script type="text/javascript">
	
	$("#generate_code").submit(function(e){
		e.preventDefault();

        var  link = '{{route("affiliate_code")}}';
        $.ajax({
            url:link,
            method:"post",
            data:$("#generate_code").serialize(),
            success:function(data){
                if(data){
                    $("#view_code").html(data);
                    document.getElementById("get_code").style.display = 'block';
                }
            }
        
        }); 
   });


    function deleteItem(id) {
    if (confirm("Are you sure delete it.?")) {
       
            var  link = '<?php echo URL::to("admin/workplace/category/delete");?>/'+id;
            $.ajax({
            url:link,
            method:"get",
            
            success:function(data){
                if(data){
                    
                    $("#item"+id).hide();
                    toastr.info(data);
                }
            }
        
        });
    }
    return false;
        
  } 

</script>


<script>
 function copyAdCode() {
    var range = document.createRange();
    range.selectNode(document.getElementById("view_code"));
    window.getSelection().removeAllRanges(); // clear current selection
    window.getSelection().addRange(range); // to select text
    document.execCommand("copy");
    window.getSelection().removeAllRanges();// to deselect
}
</script>
@endsection
