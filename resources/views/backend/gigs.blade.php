@extends('backend.layouts.master')

@section('css')
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
    <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">
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
<!--Multi Step Wizard Start-->
   <div id="rms-wizard" class="rms-wizard">
           <!--Wizard Step Navigation Start-->
            <div class="rms-step-section" data-step-counter="false" data-step-image="false">
                <ul class="rms-multistep-progressbar"> 
                    <li class="rms-step  <?php if ($step <= 1){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <span class="step-title">Overview </span>
                       
                    </li> 
					
					<li class="rms-step <?php if ($step == 2){ echo "rms-current-step"; } ?>">
                        <span class="step-icon "><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                        <span class="step-title">Pricing </span>
                       
                    </li>
					
                    <li class="rms-step <?php if ($step == 3){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Description & FAQ </span>
                       
                    </li>

                    <li class="rms-step <?php if ($step == 4){ echo "rms-current-step"; } ?>">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Requirements </span>
                       
                    </li>

                    <li class="rms-step <?php if ($step == 5){ echo "rms-current-section"; } ?>">
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
                                	<form action="{{url('dashboard/create-gig')}}" method="post" data-parsley-validate>
                                		{{csrf_field()}}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="inpt-form-group"> 
                                                <label class="rl-label filter_boreder">Gig Title</label>
                                            	<div class="inpt-group">
													<textarea minlength="15" maxlength="80" required="required" name="gig_title" style="font-size: 35px;height: 115px;" class="inpt-control gig-title-text" type="text" placeholder="do something I'm really good at"></textarea>
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
              														<option value="" disabled selected>Select Category</option>
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

                                                       <option value="" disabled selected>Select category first</option>

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
												<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php //if($userinfo->skill_level == 'Entry'){echo 'active';} ?>" id="fixed">
												<span>$$$</span><br/>
												<span class="m-sm-bottom">Fixed Price</span>
												<input required="" type="radio" id="fixedid" class="labbel_box_radio"  name="gig_payment_type" value="fixed">
												</div>
			                                </label>
											<label for="monthlyid" class="col-md-6  labbel_box"  for="Intermediate" onclick="activeButton('monthly')">
												<div class="p-lg-top-bottom ng-pristine ng-untouched ng-valid eo-button-box eo-button-box-radio ng-not-empty report_hidden <?php //if($userinfo->skill_level == 'Intermediate'){echo 'active';} ?>" id="monthly">
												<span>$$$</span><br/>
												<span class="m-sm-bottom">Monthly Price</span>
												<input required="" type="radio" id="monthlyid" class="labbel_box_radio" name="gig_payment_type"  value="monthly">
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
                        															$key_keyword = DB::table('key_keyword')->get();
                        															
                        														 ?>
                        														@foreach($key_keyword as $keyword)
                        															<option value="{{$keyword->keyword_name}}">{{$keyword->keyword_name}}</option>
                        														@endforeach
                        													</select>


	                                            </div>
                                            </div>
                                        
                                         </div>
                                    </div>
                                    	<div class="rms-footer-section">
							                <div class="button-section">
							                    <span class="nextstep">
							                        <button class="btn">Next Step
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
                    	$('#show_metadata').remove();
                    }
                }
            }); 
        }else{
            $('#metadata').html('<option value="">Select category first</option>');
            $('#show_metadata').remove();
            $('#show_metadata').attr('style', 'display:none');
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
<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>	
@endsection