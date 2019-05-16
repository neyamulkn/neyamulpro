@extends('backend.layouts.master')

@section('css')
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
    <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" rel="stylesheet">
  <style type="text/css">

   .tagsButton{
	   	right: 0px;
		top: -7px;
		padding: 7px 20px;
		border-bottom-right-radius: 4px;
		border-top-right-radius: 4px;
		background: #00D7B3;
		color: #fff;
   	}
	.tags{
		position: absolute;
		top: 0px;
		right: 0px;
	}
   	#show_metadata{
   		display: none;
   	}
   	/* style for skill level */
.eo-button-box-radio{
    cursor:pointer;
}


.eo-button-box{

margin-right: 10px;
height: 120px;
font-size: 18px;
font-weight: bold;
}
.col-md-4{
	padding: 3px;
}
.active{
	color:green;
}
.extra_field{
	position:relative; background: #f9f9f9;padding: 13px 5px 1px; margin-bottom: 5px;  border: 1px solid #cecece;
}
.btn_remove {
	padding: 2px 6px;
border: 1px solid #fb5c5c;
border-radius: 10px;
font-weight: bold;
font-size: 12px;
margin-right: 5px;
cursor: pointer;
color: #f22f2f;
float: right;
}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #F7F7F7;
  width: 35%;
  height: 300px;
 
}

/* Style the buttons inside the tab */
.tab p {
  display: block;
  background-color: inherit;
  color: black;
  padding: 5px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
  border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
}

/* Change background color of buttons on hover */
.tab p:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab p.active {
  background-color: #fff;
  border-right: none;
}
.tab :hover{
  border-right: none;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 30px;
  border: 1px solid #ccc;
  width: 65%;
  border-left: none;
  height: 300px;
}
   </style>
@endsection
@section('content')
<?php $step=0;  if(Request::route('step')){$step = Request::route('step');}?><br/>

<?php $gig_id = $gig_basic->gig_id; $gig_url = $gig_basic->gig_url; ?>
<!--Multi Step Wizard Start-->
   <div id="rms-wizard" class="rms-wizard">
           <!--Wizard Step Navigation Start-->
            <div class="rms-step-section" data-step-counter="false" data-step-image="false">
                <ul class="rms-multistep-progressbar"> 
                    <li class="rms-step  <?php if ($step <= '1st'){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <span class="step-title">Overview </span>
                       
                    </li> 
					
					<li class="rms-step <?php if ($step == '2nd'){ echo "rms-current-step"; } ?>">
                        <span class="step-icon "><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                        <span class="step-title">Pricing </span>
                       
                    </li>
					
                    <li class="rms-step <?php if ($step == '3rd'){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Description & FAQ </span>
                       
                    </li>

                    <li class="rms-step <?php if ($step == '4th'){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Requirements </span>
                       
                    </li>

                    <li class="rms-step <?php if ($step == '5th'){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="step-title">Gellary </span>
                        
                    </li>

                     <li class="rms-step <?php if ($step == '6th'){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="step-title">Publish </span>
                        
                    </li>
                </ul>
            </div>
            <!--Wizard Navigation Close-->
            <!--Wizard Content Section Start-->
            <div class="rms-content-section">
                <div class="rms-content-box <?php if ($step <= 1){ echo "rms-current-section"; } ?>">
                    <div class="rms-content-area"> 
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> Gig</b> Overview</div>
                            <div class="step-label">Step 1 - 6 </div> 
                        </div>
                        <div class="rms-content-body"> 
                            <div class="row">
                                <div class="col-md-9">
                                	<form action="{{url('dashbord/create-gig/1st/'.$gig_basic->gig_url)}}" method="post" data-parsley-validate>
                                		{{csrf_field()}}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="inpt-form-group"> 
                                                <label class="rl-label filter_boreder">Gig Title</label>
                                            	<div class="inpt-group">
													<textarea required="required" name="gig_title" style="font-size: 35px;height: 115px;" class="inpt-control gig-title-text" type="text" placeholder="do something I'm really good at">{{ $gig_basic->gig_title }}</textarea>
	                                                    <div class="form-tooltip">
	                                                        <span class="tooltip-title">Why do we need this info?</span>
	                                                        <p class="tooptip-content">Lorem Ipsum is simply dummy text of the printing and
															typesetting industry. Lorem Ipsum has been the industry's
															standard dummy text ever since the 1500s</p>
	                                                        <span class="tooltip-info">Your information is Safe here & never shared.</span>
	                                                    </div>  
	                                                 <div class="char-count"><em>0</em> / 80 max</div>
													<div class="char-count-desc"></div>
													<span class="gig-before-title">I will</span>
		                                        </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label class="rl-label filter_boreder">Category</label>
                                                <div class="inpt-group dropdown-select-icon"> 
                                                   
								                    <select name="category_id" required="required" class="inpt-control select " id="category_id">
														<option value="{{ $gig_basic->category_name }}" >{{ $gig_basic->get_category->category_name }}</option>
														<?php
															$get_category = DB::table('gig_home_category')->get();
															
														 ?>
														@foreach($get_category as $category)
															<option value="{{$category->id}}">{{$category->category_name}}</option>
														@endforeach
													</select>
                                                    <div class="form-tooltip">
                                                        <span class="tooltip-title">Why do we need this info?</span>
                                                       <p class="tooptip-content">Lorem Ipsum is simply dummy text of the printing and
								    						typesetting industry. Lorem Ipsum has been the industry's
								    						standard dummy text ever since the 1500s</p>
                                                        <span class="tooltip-info">Your information is Safe here & never shared.</span>
                                                   </div> 
                                                </div> 
                                         </div>
                                         <div class="col-md-6"><br>
                                            <div class="inpt-group dropdown-select-icon"> 
                                                   <select name="subcategory" required="required" id="subcategory" class="inpt-control select ">

                                                       <option value="{{ $gig_basic->gig_subcategory }}">{{ $gig_basic->get_subcategory->subcategory_name }}</option>

								                    </select> 
                                                    
                                                </div> 
                                         </div>
                                    </div><br/>
                                    
                                  <div class="row" id="show_metadata">
                                        <div class="col-md-12">
                                        	<div class="input-container" id="sub_category_filter">
											<ul class="filter_ul"  id="filter_ul__7">
                  								<div class="row">
                  									<div class="col-md-2">
                  										<label class="rl-label filter_boreder">GIG METADATA</label>
                  									</div>
                  									<div class="col-md-10 ">
                                                		 <div id="metadata"></div>

                  										</div>
                  								</div>		
                  							</ul>

                  							</div>
                                   		</div>
                                    </div>

								<label class="rl-label filter_boreder">How would you want to pay?</label>
														
			                      <div class="row">

											<label for="fixedid" class="col-md-6 labbel_box"  onclick="activeButton('fixed')">
												<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php if($gig_basic->gig_payment_type == 'fixed'){echo 'active';} ?>" id="fixed">
												<span>$$$</span><br/>
												<span class="m-sm-bottom">Fixed Price</span>
												<input required="" <?php if($gig_basic->gig_payment_type == 'fixed'){echo 'checked';} ?> type="radio" id="fixedid" class="labbel_box_radio"  name="gig_payment_type" value="fixed">
												</div>
			                                </label>
											<label for="monthlyid" class="col-md-6  labbel_box"  for="Intermediate" onclick="activeButton('monthly')">
												<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php if($gig_basic->gig_payment_type == 'monthly'){echo 'active';} ?>" id="monthly">
												<span>$$$</span><br/>
												<span class="m-sm-bottom">Monthly Price</span>
												<input required="" <?php if($gig_basic->gig_payment_type == 'monthly'){echo 'checked';} ?> type="radio" id="monthlyid" class="labbel_box_radio" name="gig_payment_type"  value="monthly">
												</div>
											</label>
			                     	</div>


                                    <div class="row">
                                        <div class="col-md-12">
                                        	<div class="inpt-form-group"> 
	                                            <label for="gig_search_tag" class="rl-label">Search Tags</label>
	                                            <div class="inpt-group">
	                                            	<select name="gig_search_tag[]" required="required" id="gig_search_tag" multiple="multiple" style="width:100%" class="select2">

	                                            		<?php 
															if($gig_basic->gig_search_tag ){
																$gig_search_tag = explode(',', $gig_basic->gig_search_tag);
																for($i = 0; $i<count($gig_search_tag); $i++){
																	echo '<option selected="selected" value="'.$gig_search_tag[$i].'">'.$gig_search_tag[$i].'</option>';
																}
															}
														?>

														<?php
															$key_keyword = DB::table('key_keyword')->get();
															
														 ?>
														@foreach($key_keyword as $keyword)
															<option value="{{$keyword->keyword_name}}">{{$keyword->keyword_name}}</option>
														@endforeach
													</select>


	                                            </div>
                                            </div>
                                        

										<!--
                                            <div class="inpt-form-group"> 
                                               <label for="serachTags">Search Tags</label>
                                               <div class="inpt-group">
                                                   <input type="text" list="tags_data" name="serachTags" id="serachTags" onkeyup="display_tags(this.value);" class="inpt-control required" >
                                                   <span class=" tags input-group-btn">
														<button class="tagsButton" id="save_tagsID" onclick="save_tags(tags.value)" type="button">+</button>
												   </span>
					                            <div class="input-group">
					                            	
												   <datalist id="tags_data">
												   		<option selected="" value="Software Developer"></option>	
												   		<option value="HTML"></option>
												   		<option value="PHPHTML"></option>
												   		<option value="Mobile Design"></option>
												   </datalist>

												</div>
                                                   <div class="form-tooltip tooltip-edge">
                                                        <span class="tooltip-title">Why do we need this info?</span>
                                                       <p class="tooptip-content">Lorem Ipsum is simply dummy text of the printing and
								    						typesetting industry. Lorem Ipsum has been the industry's
								    						standard dummy text ever since the 1500s</p>
                                                        <span class="tooltip-info">Your information is Safe here & never shared.</span>
                                                   </div> 
                                                </div>
                                            </div>

                                        -->
                                         </div>
                                    </div>
                                    	<div class="rms-footer-section">
							                <div class="button-section">
							                    <span class="nextstep">
							                        <button type="submit" name="form_first_step" class="btn">Next Step
							                            <small>Your information</small>
							                       </button> 
							                    </span>
							                    <span class="prev">
							                        <button  class="btn" >Previous Step
							                             <small>Your information</small>
							                        </button>
							                    </span>
							                </div>
							            </div>
                                </form>
                                </div> 

                            </div> 
                        </div> 
                    </div>
                </div>
				
				<div class="rms-content-box price <?php if ($step == 2){ echo "rms-current-section"; } ?>">
					
                    <div class="rms-content-area "> 
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-lock" aria-hidden="true"></i> Price</b> Scope</div>
                            <div class="step-label">Step 2 - 5 </div> 
                        </div>
                        <div class="rms-content-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                  	<div class="comment-list">
									<table class="table table-hover table-bordered" style="margin-bottom: 20px; margin-top: 15px; text-align:center;padding-left:200px; padding-right:200px; background-color: white;">
											<thead>
											  <tr class="active">
												  <th><center></center></th>
												  <th><center><b>Basic</b></center></th>
												  <th><center><b>Plus</b></center></th>
												  <th><center><b>Super</b></center></th>
												  <th><center><b>Platinum</b></center></th>
											  </tr>
											</thead>
											<tbody>
									<form action="{{ url('/dashbord/create-gig/second') }}" method="post">
											{{csrf_field()}}  
											  <tr>
												<td>Packages</td>
												<td><textarea type="text" required="required" maxlength="35" name="basic_title" placeholder="Name your package"></textarea></td>
												<td><textarea type="text" required="required" maxlength="35" name="plus_title"  placeholder="Name your package"></textarea></td>
												<td><textarea type="text" required="required" maxlength="35" name="super_title"  placeholder="Name your package"></textarea></td>
												<td><textarea type="text" required="required" maxlength="35" name="platinum_title"  placeholder="Name your package"></textarea></td>
											  </tr>
											  <tr>
												<td>Description</td>
												<td><textarea type="text" required="required" maxlength="100" name="basic_dsc"  placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
												<td><textarea type="text" required="required" maxlength="100" name="plus_dsc" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
												<td><textarea required="required" maxlength="100" type="text" name="super_dsc" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
												<td><textarea required="required" maxlength="100" type="text" name="platinum_dsc" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
											</tr>

											<tr>
												<td>Delivery Time</td>
												
												<td>
													<label for="price_filter" class="select-block">
														<select name="delivery_time_b" required="required" id="price_filter">
															<?php if($gig_basic->gig_payment_type == 'fixed')
																{
																 for($d=1; $d<=9; $d++){ 
																 	echo '<option value="'.$d.'">'.$d.' day</option>';
																 }
															 } ?>
															<?php if($gig_basic->gig_payment_type == 'monthly')
																{ 
																	for($m=1; $m<=29; $m++){
																	echo '<option value="'.$m.'">'.$m.' month</option>';
																	}
																}
															?>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
												<td>
													<label for="price_filter" class="select-block">
														<select  name="delivery_time_p" id="price_filter">
															<?php if($gig_basic->gig_payment_type == 'fixed')
																{
																 for($d=1; $d<=9; $d++){ 
																 	echo '<option value="'.$d.'">'.$d.' day</option>';
																 }
															 } ?>
															<?php if($gig_basic->gig_payment_type == 'monthly')
																{ 
																	for($m=1; $m<=29; $m++){
																	echo '<option value="'.$m.'">'.$m.' month</option>';
																	}
																}
															?>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>

												<td>
													<label for="price_filter" class="select-block">
														<select name="delivery_time_s" id="price_filter">
															<?php if($gig_basic->gig_payment_type == 'fixed')
																{
																 for($d=1; $d<=9; $d++){ 
																 	echo '<option value="'.$d.'">'.$d.' day</option>';
																 }
															 } ?>
															<?php if($gig_basic->gig_payment_type == 'monthly')
																{ 
																	for($m=1; $m<=29; $m++){
																	echo '<option value="'.$m.'">'.$m.' month</option>';
																	}
																}
															?>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
												<td>
													<label for="price_filter" class="select-block">
														<select name="delivery_time_pm" id="price_filter">
															<?php if($gig_basic->gig_payment_type == 'fixed')
																{
																 for($d=1; $d<=9; $d++){ 
																 	echo '<option value="'.$d.'">'.$d.' day</option>';
																 }
															 } ?>
															<?php if($gig_basic->gig_payment_type == 'monthly')
																{ 
																	for($m=1; $m<=29; $m++){
																	echo '<option value="'.$m.'">'.$m.' month</option>';
																	}
																}
															?>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
											
											  </tr>

											  <tr>
												<td>Revisions</td>
												<td>
													<label for="price_filter" class="select-block">
														<select name="rivision_b" id="price_filter">
															<?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d.'</option>'; } ?>
															<option value="unlimited">unlimited</option>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
												<td>
													<label for="rivision_p" class="select-block">
														<select name="rivision_p" id="revision_p">
															<?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d.'</option>'; } ?>
															<option value="unlimited">unlimited</option>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
												<td>
													<label for="price_filter" class="select-block">
														<select name="rivision_s" id="price_filter">
															<?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d.'</option>'; } ?>
															<option value="unlimited">unlimited</option>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
												<td>
													<label for="price_filter" class="select-block">
														<select name="rivision_pm" id="price_filter">
															<?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d.'</option>'; } ?>
															<option value="unlimited">unlimited</option>
														</select>
														<!-- SVG ARROW -->
														<svg class="svg-arrow">
															<use xlink:href="#svg-arrow"></use>
														</svg>
														<!-- /SVG ARROW -->
													</label>
												
												</td>
											  </tr>

                      <tr>
                        <td>Daily work</td>
                        <td>
                          <label for="price_filter" class="select-block">
                            <select name="daily_work_b" id="price_filter">
                              <?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d. '  hour</option>'; } ?>
                              <option value="unlimited">unlimited</option>
                            </select>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                              <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                          </label>
                        
                        </td>
                        <td>
                          <label for="rivision_p" class="select-block">
                            <select name="daily_work_p" id="revision_p">
                              <?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d. ' hour</option>'; } ?>
                              <option value="unlimited">unlimited</option>
                            </select>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                              <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                          </label>
                        
                        </td>
                        <td>
                          <label for="price_filter" class="select-block">
                            <select name="daily_work_s" id="price_filter">
                              <?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d. ' hour</option>'; } ?>
                              <option value="unlimited">unlimited</option>
                            </select>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                              <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                          </label>
                        
                        </td>
                        <td>
                          <label for="price_filter" class="select-block">
                            <select name="daily_work_pm" id="price_filter">
                              <?php for($d=1; $d<=12; $d++){ echo '<option value="'.$d.'">'.$d. ' hour</option>'; } ?>
                              <option value="unlimited">unlimited</option>
                            </select>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                              <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                          </label>
                        
                        </td>
                        </tr>
											 
									  	<?php 
										if($gig_basic->gig_metadata){
												$get_gig_metadata = explode(',', $gig_basic->gig_metadata);

											for($i=0; $i<count($get_gig_metadata); $i++){
												$get_filter_id = $get_gig_metadata[$i];

												$gig_pricescope = DB::table('gig_metadatas')
												->where('filter_id', $get_filter_id)
												->where('filter_type', 'Yes')->get();
											
											foreach ($gig_pricescope  as $price_scope){
												$select_id = $price_scope->sub_filter_id;
										?>

											<tr>
												<td>{{$price_scope->sub_filter_name}}
													<input type="hidden" name="feature_name[]" value="{{$price_scope->sub_filter_name}}">
													<input type="hidden" name="feature_id[]" value="{{$select_id}}">
												</td>
												
												<td>
													<input value="Yes"  type="checkbox" id="basic{{$select_id}}" name="feature_basic[]">
													<label for="basic{{$select_id}}">
														<span class="checkbox primary"><span>
													</label>
												<td>
													<input value="Yes" type="checkbox" id="plus{{$select_id}}" name="feature_plus[]" >
													<label for="plus{{$select_id}}">
														<span class="checkbox primary"><span>
													</label>
												</td>
												<td>
													<input value="Yes" type="checkbox" id="super{{$select_id}}" name="feature_super[]" >
													<label for="super{{$select_id}}">
														<span class="checkbox primary"><span>
													</label>
												</td>
												<td>
													<input value="Yes" type="checkbox" id="platinum{{$select_id}}"  name="feature_platinum[]" >
													<label for="platinum{{$select_id}}">
														<span class="checkbox primary"><span>
													</label>
												</td>								
											</tr>
										<?php }} }?>
											  <tr>
												<td>Price</td>
												<td><span class="price_dollar">$</span><input required="required" type="number"  name="basic_p"></td>
												<td><span class="price_dollar">$</span><input required="required" type="number" name="plus_p"></td>
												<td><span class="price_dollar">$</span><input required="required" type="number" name="super_p"></td>
												<td><span class="price_dollar">$</span><input required="required" type="number" name="platinum_p"></td>
											  </tr>
											</tbody>
										  </table>
									</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <br/>
                     <div class="rms-footer-section">
		                <div class="button-section">
		                    <span class="nextstep">
		                    	<input type="hidden" name="form_step" value="form_step_second">
		                    	<input type="hidden" name="gig_id" value="{{ $gig_id }}">
		                    	<input type="hidden" name="gig_url" value="{{ $gig_url }}">
		                        <button type="submit" class="btn">Next Step
		                            <small>Your information</small>
		                       </button> 
		                    </span>
		          </form>
		                    <span class="prev">
		                        <span class="btn" >Previous Step
		                             <small>Your information</small>
		                        </span>
		                    </span>
		                    
		                </div>
		            </div>
		      
                </div>

                <div class="rms-content-box <?php if ($step == 3){ echo "rms-current-section"; } ?>">
                     <div class="rms-content-area">
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-user" aria-hidden="true"></i> Personal</b> Information</div>
                            <div class="step-label">Step 2 - 4 </div> 
                        </div>
                     <form action="{{url('/dashbord/create-gig/third')}}" method="post" data-parsley-validate>
                     	{{csrf_field()}}
                         <div class="rms-content-body"> 
                         	<label for="item_description" class="rl-label">Item Description</label>
                             <div class="row">
                                 <div class="col-md-12">
									<div class="comment-giglt">
										<div class="gigseditor">
											
												<textarea name="gig_dsc" maxlength="5000" required="required" class="ttinput-grouptddd" style="border:1px solid #ccc" id="textarea" placeholder="Enter text ...">{{$gig_basic->gig_dsc}}</textarea>
												<div id="toolbar" style="display: none;">
													<a class="bottomtt" data-wysihtml5-command="bold" title="CTRL+B"><img src="{{ asset('allscript')}}/e/1.png"></a>
													<a class="bottomtt" data-wysihtml5-command="italic" title="CTRL+I"><img src="{{ asset('allscript')}}/e/2.png"></a></a>
													<a class="bottomtt" data-wysihtml5-command="insertUnorderedList"><img src="{{ asset('allscript')}}/e/3.png"></a></a>
													<a class="bottomtt" data-wysihtml5-command="insertOrderedList"><img src="{{ asset('allscript')}}/e/4.png"></a></a>
													<a class="bottomtt" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"><img src="{{ asset('allscript')}}/e/5.png"></a></a>
												</div>
											
											<div id="log" style="display: none;"></div>
										</div>
				
										<div class="form-box-item">
											<label class="rl-label">Frequently Asked Questions</label>
											<label for="" style="float: right;" class="rl-label">
												<button id="add" style="padding:5px;" class="btn-success" type="button" >+ Add</button> </label>
											<hr class="line-separator">
										
										<div class="table table-striped" id="extra_ul">
											
											<div id="dynamic_field">
													
											 @foreach($question_answer as $show_question_answer)

												<div  id="row{{$show_question_answer->id}}" class="panel panel-default " style="background: #f9f9f9;padding: 13px 5px 1px; margin-bottom: 5px;  border: 1px solid #cecece;">
												      <div class="panel-heading">
												        <h4 class="panel-title">
											          <a data-toggle="collapse" style="display: block;" href="#{{$show_question_answer->id}}">{{$show_question_answer->question}}? <i style="float: right;" class="fa fa-chevron-down" aria-hidden="true"></i></a> 
												        </h4>
												      </div>
												    <div id="{{$show_question_answer->id}}" class="panel-collapse collapse">
												        <div class="panel-body">
												        		<input type="hidden" name="update_ques_ans[]" value="{{$show_question_answer->id}}">
														 		<div class="input-container">
														 			<input type="text" required="required" maxlength="150" name="update_question[]" placeholder="Enter your question." value="{{$show_question_answer->question}}" >
														 		</div>
														 			<div class="input-container">
														 				<input type="text" required="required" maxlength="300" value="{{$show_question_answer->answer}}" name="update_answer[]" placeholder="Enter your answer."></div>
														 			
														 			<span id="{{$show_question_answer->id}}" onclick="delete_ques_ans({{$show_question_answer->id}})" class="btn_remove"><i class="fa fa-trash" aria-hidden="true"></i> delete</span><br/>
														 
												        </div>
												       
												    </div>
												</div>
											@endforeach
												</div>
										  </div>
											<!-- /INPUT CONTAINER -->
										</div>
									</div>
									
									<div class="comment-gigrt">
										<div class="form-box-item full">
											<h4>Upload Queue</h4>
											<hr class="line-separator">
											<!-- PG BAR LIST -->
											<div class="pg-bar-list">
												<!-- PG BAR LIST ITEM -->
												<div class="pg-bar-list-item">
													<div class="pg-bar-list-item-info">
														<p class="text-header">Professional Business Card</p>
														<p class="text-header">86%</p>
														<p class="timestamp">4 days ago</p>
													</div>
													<!-- BADGE PROGRESS -->
													<div class="pg1 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="188" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
													<!-- /BADGE PROGRESS -->
												</div>
												<!-- /PG BAR LIST ITEM -->

												<!-- PG BAR LIST ITEM -->
												<div class="pg-bar-list-item">
													<div class="pg-bar-list-item-info">
														<p class="text-header">Professional Business Card</p>
														<p class="text-header">92%</p>
														<p class="timestamp">12 days ago</p>
													</div>
													<!-- BADGE PROGRESS -->
													<div class="pg2 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="201" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
													<!-- /BADGE PROGRESS -->
												</div>
												<!-- /PG BAR LIST ITEM -->
											</div>
											<!-- /PG BAR LIST -->
										</div>
									</div>
                                </div> 
                             </div> 
                        </div> 
                    </div>

                    <br/>
                     <div class="rms-footer-section">
		                <div class="button-section">
		                    <span class="nextstep">
		                    	<input type="hidden" name="form_step" value="form_3rd_step">
		                    	<input type="hidden" name="gig_id" value="{{ $gig_id }}">
		                    	<input type="hidden" name="gig_url" value="{{ $gig_url }}">
		                        <button class="btn">Next Step
		                            <small>Your information</small>
		                       </button> 
		                    </span>
		              </form>
		                    <span class="prev">
		                    	
		                        <button class="btn" >Previous Step
		                             <small>Your information</small>
		                        </button>
		                    </span>
		                </div>
		            </div>
		       
                </div>
                <div class="rms-content-box <?php if ($step == '4th'){ echo "rms-current-section"; } ?>">
                     <div class="rms-content-area">
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-credit-card" aria-hidden="true"></i> Payment</b> Information</div>
                            <div class="step-label">Step 3 - 4 </div>
                           
                        </div>
                        <div class="rms-content-body"> 
                         	<label for="item_description" class="rl-label">
			                    <i></i>
			                    <h4>Tell your buyer what you need to get started.</h4>
			                    <small>Structure your Buyer Instructions as free text, a multiple choice question or file upload.</small>
			                </label>
                             <div class="row">
                                 <div class="col-md-12">
									<div class="comment-giglt">
										<div class="gigseditor">
							 <form action="{{url('/dashbord/create-gig/fourth')}}" method="post"data-parsley-validate>
                     			{{csrf_field()}}
                     			<?php if(count($gig_requirement)<1){ ?>			
										<textarea name="requirement" maxlength="1200" required="required" class="ttinput-grouptddd" style="border: 1px solid rgb(204, 204, 204);" placeholder="Enter text ..."></textarea>
									<?php } ?>
										</div>
										<label for="" style="float: right;" class="rl-label">
												<button id="add" style="padding:5px;" class="btn-success" type="button">+ Add another requirement</button> </label><br/>
											<hr class="line-separator">
										
										<div class="table table-striped" id="extra_ul">
											<div id="dynamic_field">
											@foreach($gig_requirement as $requirement )
												<div id="row"  style="background: #f9f9f9;padding: 13px 5px 1px; margin-bottom: 5px;  border: 1px solid #cecece;">

											      <div class="panel-heading">
											        <h4 class="panel-title" style="padding-bottom: 10px;">
										          <a data-toggle="collapse"  href="#requirement">requirement <i style="float: right;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
											        </h4>
											      </div>
												    <div id="requirement" class="panel-collapse collapse">
												        <div class="panel-body">
											        		<input type="hidden" name="requirement_id[]" value="14">
													 		<div class="input-container">
													 			<input type="text" required="required" maxlength="150" name="requirement_update[]" placeholder="Enter your question." value="question">
													 		</div>
													 			
												 			<span id="14" onclick="delete_ques_ans(14)" class="btn_remove"><i class="fa fa-trash" aria-hidden="true"></i> delete</span><br>
												        </div>
												    </div>
												</div>
											@endforeach
											</div>
										  </div>
									</div>
									
									<div class="comment-gigrt">
										<div class="form-box-item full">
											<h4>Upload Queue</h4>
											<hr class="line-separator">
											<!-- PG BAR LIST -->
											<div class="pg-bar-list">
												<!-- PG BAR LIST ITEM -->
												<div class="pg-bar-list-item">
													<div class="pg-bar-list-item-info">
														<p class="text-header">Professional Business Card</p>
														<p class="text-header">86%</p>
														<p class="timestamp">4 days ago</p>
													</div>
													<!-- BADGE PROGRESS -->
													<div class="pg1 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="188" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
													<!-- /BADGE PROGRESS -->
												</div>
												<!-- /PG BAR LIST ITEM -->

												<!-- PG BAR LIST ITEM -->
												<div class="pg-bar-list-item">
													<div class="pg-bar-list-item-info">
														<p class="text-header">Professional Business Card</p>
														<p class="text-header">92%</p>
														<p class="timestamp">12 days ago</p>
													</div>
													<!-- BADGE PROGRESS -->
													<div class="pg2 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="201" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
													<!-- /BADGE PROGRESS -->
												</div>
												<!-- /PG BAR LIST ITEM -->
											</div>
											<!-- /PG BAR LIST -->
										</div>
									</div>
                                </div> 
                             </div> 
                        </div>
                    </div> 
                    <br/>
                     <div class="rms-footer-section">
		                <div class="button-section">
		                    <span class="nextstep">
		                    	<input type="hidden" name="form_step" value="form_4th_step">
		                    	<input type="hidden" name="gig_id" value="{{ $gig_id }}">
		                    	<input type="hidden" name="gig_url" value="{{ $gig_url }}">
		                        <button class="btn">Next Step
		                            <small>Your information</small>
		                       </button> 
		                    </span>
		            </form>
		                    <span class="prev">
		                        <button  class="btn" >Previous Step
		                             <small>Your information</small>
		                        </button>
		                    </span>
		                    
		                </div>
		            </div>
                </div>

         <!---End 4th step ---->

                <div class="rms-content-box <?php if ($step == '5th'){ echo "rms-current-section"; } ?>">
                    <div class="rms-content-area">
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-file-text" aria-hidden="true"></i> Confirm</b> Details</div>
                            <div class="step-label">Step 4 - 4 </div> 
                        </div>
                        <div class="rms-content-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="comment-list"><br>
                      						<!-- COMMENT -->
                      						<div class="comment-giglt">
                      					<form action="{{url('/dashbord/create-gig/five')}}" method="post" enctype="multipart/form-data">
                      							{{csrf_field()}}
                       
                         					 <input name="gig_image[]" type="file" />
                         					 <input name="gig_image[]" type="file" />
                         					 <input name="gig_image[]" type="file" />


                         					 
                       

                      						</div>
                      						<div class="comment-gigrt">
                      						</div>			

                      						<!-- /COMMENT REPLY -->
                      					</div>
                                </div> 
                            </div> 
                        </div> 
                    </div>
                    	<br/>
		            <div class="rms-footer-section">
		                <div class="button-section">
		                    <span class="nextstep">
		                    	<input type="hidden" name="form_step" value="form_5th_step">
		                    	<input type="hidden" name="gig_id" value="{{ $gig_id }}">
		                    	<input type="hidden" name="gig_url" value="{{ $gig_url }}">
		                        <button class="btn">Next Step
		                            <small>Your information</small>
		                       </button> 
		                    </span>
		           </form>
		                    <span class="prev">
		                        <button  class="btn" >Previous Step
		                             <small>Your information</small>
		                        </button>
		                    </span>
		                    
		                </div>
		            </div>
        	 </div>
        	 <!-- end fourth step-->

        	 <div class="rms-content-box <?php if ($step == '6th'){ echo "rms-current-section"; } ?>">
                    <div class="rms-content-area">
                    <form action="{{url('/dashbord/create-gig/finish')}}" method="post" >
                      {{csrf_field()}}
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-file-text" aria-hidden="true"></i> Confirm</b> Details</div>
                            <div class="step-label">Step 4 - 4 </div> 
                        </div>
                        <div class="rms-content-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="comment-list"><br>
							
										                
                            		</div> 
                        		</div> 
                    		</div>
                    	<br/>
			            <div class="rms-footer-section">
			                <div class="button-section">
			                    <span class="nextstep">
			                    	<input type="hidden" name="form_step" value="form_5th_step">
			                    	<input type="hidden" name="gig_id" value="{{ $gig_id }}">
			                    	<input type="hidden" name="gig_url" value="{{ $gig_url }}">
			                        <button class="btn">Next Step
			                            <small>Your information</small>
			                       </button> 
			                    </span>
			          </form>
			                    <span class="prev">
			                        <button  class="btn" >Previous Step
			                             <small>Your information</small>
			                        </button>
			                    </span>
			                    
			                </div>
		            </div>
         		</div>
         	<!--End last step-->
    </div>
<!--Wizard Content Section Close-->
           

    <!--Wizard Container Close-->
</div>
    <!--Multi Step Wizard Close-->
 @endsection

 @section('js')

<script src="{{ asset('allscript')}}/e/01.js"></script>
<script src="{{ asset('allscript')}}/e/02.js"></script>
<script>
  var editor = new wysihtml5.Editor("textarea", {
    toolbar:      "toolbar",
    stylesheets:  "{{ asset('allscript')}}/e/1.css",
    parserRules:  wysihtml5ParserRules
  });
  
  var log = document.getElementById("log");
  
  editor
    .on("load", function() {
      log.innerHTML += "<div>load</div>";
    })
    .on("focus", function() {
      log.innerHTML += "<div>focus</div>";
    })
    .on("blur", function() {
      log.innerHTML += "<div>blur</div>";
    })
    .on("change", function() {
      log.innerHTML += "<div>change</div>";
    })
    .on("paste", function() {
      log.innerHTML += "<div>paste</div>";
    })
    .on("newword:composer", function() {
      log.innerHTML += "<div>newword:composer</div>";
    })
    .on("undo:composer", function() {
      log.innerHTML += "<div>undo:composer</div>";
    })
    .on("redo:composer", function() {
      log.innerHTML += "<div>redo:composer</div>";
    });
</script>
<!-- /SVG MINUS -->

    <script type="text/javascript" src="{{ asset('allscript')}}/gig/js/multistep.min.js"></script>
    <script>
        $(document).ready(function() { 
            $('#rms-wizard').stepWizard({
                stepTheme: 'defaultTheme',/*defaultTheme,steptheme1,steptheme2*/
                allstepClickable: false,
                compeletedStepClickable: true,
                stepCounter: true,
                StepImage: true, 
                animation: true,
                animationClass: "fadeIn",
                stepValidation: true,
                validation : true, 
                field: {
                     username : { 
                        required : true, 
                        minlength: 2,
                        Regex: /^[a-zA-Z0-9]+$/,  
                    },
                     password : {
                        required : true,
                        minlength : 5,
                        maxlength : 20,
                        Regex: /^(?=.*[0-9_\W]).+$/, 
                    },
                    email:{
                        required : true,
                        Regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    },
                },
                message: {
                    username: "Please Enter UserName ", 
                }
                
            });
    });


  $(document).ready(function(){
    $('#category_id').on('change',function(){
        var category_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        if(category_id){
            $.ajax({
                method:'post',
                url:'{{url("get_subcategory")}}',
                data:{category_id:category_id, _token:_token},
                success:function(data){
                	if(data){
                    	$('#subcategory').html(data);
                    	
                    	//when change category meta field fresh 
                    	$('#metadata').html('');
                    	$('#show_metadata').attr('style', 'display:none');
                    }else{
                    	$('#subcategory').html('<option value="">category not available</option>');
                    	//when change category meta field fresh 
                    	$('#metadata').html('');
                    	$('#show_metadata').attr('style', 'display:none');
                    }
                    
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select category first</option>');
        }
    });

});

//get meta data query sub category

$(document).ready(function(){
    $('#subcategory').on('change',function(){
        var subcategory_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        if(subcategory_id){
            $.ajax({
                method:'post',
                url:'{{url("get_medata")}}',
                data:{subcategory_id:subcategory_id, _token:_token},
                success:function(data){
                	if(data){
                		$('#show_metadata').attr('style', 'display:block');
                    	$('#metadata').html(data);
                    }else{
                    	$('#metadata').html('');
                    	$('#show_metadata').attr('style', 'display:none');
                    }
                }
            }); 
        }else{
            $('#metadata').html('<option value="">Select category first</option>');
        }
    });

});


$("select").on('change', function(e) {
	if (Object.keys($(this).val()).length > 3) {
    	alert('You can select upto 3 options only');
    }
    if (Object.keys($(this).val()).length > 3) {
        $('option[value="' + $(this).val().toString().split(',')[3] + '"]').prop('selected', false);
    }

});

    function activeButton(id){

        if(id == "fixed"){
            var element = document.getElementById(id);
             element.classList.add("active");

             var remove = document.getElementById('monthly');
             remove.classList.remove("active");
             

        }
        if(id == "monthly"){
            var element = document.getElementById(id);
             element.classList.add("active");

             var remove = document.getElementById('fixed');
             remove.classList.remove("active");
             
        }
	}
// question & answer 
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		$('#extra_ul').attr('style', 'display:block-inline');
		i++;
		$('#dynamic_field').append('<div id="row'+i+'" class="panel panel-default extra_field" ><div class="panel-body"><div class="input-container"><input type="text" required="required" maxlength="150" name="question[]"  placeholder="Enter your question." ></div><div class="input-container"><input type="text" style="padding-right: 20px;" required="required" maxlength="300" name="answer[]" placeholder="Enter your answer."></div><span id="'+i+'" class="btn_remove"><i class="fa fa-trash" aria-hidden="true"></i> delete</span><span ></span><br/></div></div>');
	});

// remove extra question answer field
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
});


function delete_ques_ans(id){
			var _token = $('input[name="_token"]').val();
			$.ajax({
			url:'{{ URL::to("/question_answer/delete") }}',
			method:"POST",
			data:{
				ques_ans_id:id,
				_token: _token
			},
			success:function(data){
				
			}
	});
				
}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


    </script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="{{asset('/allscript')}}/js/dropzone.js"></script>
<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>
@endsection