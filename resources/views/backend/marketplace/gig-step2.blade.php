@extends('backend.layouts.master')
@section('title', $get_data->gig_title. ' - HOTLancer')
@section('css')
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
    <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">
   
<!--end tags -->
  <style type="text/css">
.checkbox, .radio {margin-bottom: initial;}
#update_profile input[type="text"], input[type="password"], input[type="number"], textarea{
  font-size: 12px !important;
}
.table>tbody>tr>td{
  font-size: 15px;
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

<!--Multi Step Wizard Start-->
   <div id="rms-wizard" class="rms-wizard">
           <!--Wizard Step Navigation Start-->
            <div class="rms-step-section" data-step-counter="false" data-step-image="false">
                <ul class="rms-multistep-progressbar"> 
                    <li class="rms-step  rms-current-step">
                        <span class="step-icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <span class="step-title">Overview </span>
                    </li> 
          
                     <li class="rms-step rms-current-step">
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
               
              <div class="rms-content-box price rms-current-section">
          
                  <div class="rms-content-area "> 
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-lock" aria-hidden="true"></i> Price</b> Scope</div>
                            <div class="step-label">Step 2 - 5 </div> 
                        </div>
                        <div class="rms-content-body"> 
                            <form action="{{ route('gig_step_second', $get_data->gig_url) }}" method="post">
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
                                      
                                            {{csrf_field()}}  
                                            <tr>
                                              <td>Packages</td>
                                              <td><textarea type="text" required="required" maxlength="35" name="basic_title" placeholder="Name your package">@if($get_data){{$get_data->basic_title}}@endif</textarea></td>
                                              <td><textarea type="text" maxlength="35" name="plus_title"  placeholder="Name your package">@if($get_data){{$get_data->plus_title}}@endif</textarea></td>
                                              <td><textarea type="text"  maxlength="35" name="super_title"  placeholder="Name your package">@if($get_data){{$get_data->super_title}}@endif</textarea></td>
                                              <td><textarea type="text"  maxlength="35" name="platinum_title"  placeholder="Name your package">@if($get_data){{$get_data->platinum_title}}@endif</textarea></td>
                                            </tr>
                                            <tr>
                                              <td>Description</td>
                                              <td><textarea type="text" required="required" maxlength="100" name="basic_dsc"  placeholder="This is the option for those developing out a fully-formed mobile application.">@if($get_data){{$get_data->basic_dsc}}@endif</textarea></td>
                                              <td><textarea type="text"  maxlength="100" name="plus_dsc" placeholder="This is the option for those developing out a fully-formed mobile application.">@if($get_data){{$get_data->plus_dsc}}@endif</textarea></td>
                                              <td><textarea maxlength="100" type="text" name="super_dsc" placeholder="This is the option for those developing out a fully-formed mobile application.">@if($get_data){{$get_data->super_dsc}}@endif</textarea></td>
                                              <td><textarea  maxlength="100" type="text" name="platinum_dsc" placeholder="This is the option for those developing out a fully-formed mobile application.">@if($get_data){{$get_data->platinum_dsc}}@endif</textarea></td>
                                            </tr>

                                            <tr>
                                              <td>Delivery Time</td>
                                              
                                              <td>
                                                <label for="price_filter" class="select-block">
                                                  <select name="delivery_time_b" required="required" id="price_filter">
                                                    @if($get_data->gig_payment_type == 'fixed')
                                                      @for($d=1; $d<=9; $d++)
                                                        <option  @if($get_data && $get_data->delivery_time_b == $d) selected @endif value="{{$d}}">{{ $d }} day</option>
                                                      @endfor
                                                    @endif
                                                    @if($get_data->gig_payment_type == 'monthly')
                                                      
                                                        @for($m=1; $m<=29; $m++)
                                                        <option @if($get_data && $get_data->delivery_time_b == $m) selected @endif value="{{$m}}"> {{$m}} month</option>
                                                        @endfor
                                                      @endif
                                                   
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
                                                    @if($get_data->gig_payment_type == 'fixed')
                                                      @for($d=1; $d<=9; $d++)
                                                        <option  @if($get_data && $get_data->delivery_time_p == $d) selected @endif value="{{$d}}">{{ $d }} day</option>
                                                      @endfor
                                                    @endif
                                                    @if($get_data->gig_payment_type == 'monthly')
                                                      
                                                        @for($m=1; $m<=29; $m++)
                                                        <option @if($get_data && $get_data->delivery_time_p == $m) selected @endif value="{{$m}}"> {{$m}} month</option>
                                                        @endfor
                                                    @endif
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
                                                    @if($get_data->gig_payment_type == 'fixed')
                                                      @for($d=1; $d<=9; $d++)
                                                        <option  @if($get_data && $get_data->delivery_time_s == $d) selected @endif value="{{$d}}">{{ $d }} day</option>
                                                      @endfor
                                                    @endif
                                                    @if($get_data->gig_payment_type == 'monthly')
                                                      
                                                        @for($m=1; $m<=29; $m++)
                                                        <option @if($get_data && $get_data->delivery_time_s == $m) selected @endif value="{{$m}}"> {{$m}} month</option>
                                                        @endfor
                                                      @endif
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
                                                    @if($get_data->gig_payment_type == 'fixed')
                                                      @for($d=1; $d<=9; $d++)
                                                        <option  @if($get_data && $get_data->delivery_time_pm == $d) selected @endif value="{{$d}}">{{ $d }} day</option>
                                                      @endfor
                                                    @endif
                                                    @if($get_data->gig_payment_type == 'monthly')
                                                      
                                                        @for($m=1; $m<=29; $m++)
                                                        <option @if($get_data && $get_data->delivery_time_pm == $m) selected @endif value="{{$m}}"> {{$m}} month</option>
                                                        @endfor
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

                                            <tr>
                                              <td>Revisions</td>
                                              <td>
                                                <label for="price_filter" class="select-block">
                                                  <select name="rivision_b" id="price_filter">
                                                    @for($d=1; $d<=12; $d++)
                                                    <option @if($get_data && $get_data->rivision_b == $d) selected @endif value="{{$d}}">{{$d}}</option>
                                                    @endfor
                                                    <option @if($get_data && $get_data->rivision_b == 0) selected @endif value="0">unlimited</option>
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
                                                    @for($d=1; $d<=12; $d++)
                                                    <option @if($get_data && $get_data->rivision_p == $d) selected @endif value="{{$d}}">{{$d}}</option>
                                                    @endfor
                                                 
                                                    <option @if($get_data && $get_data->rivision_p == 0) selected @endif value="0">unlimited</option>
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
                                                    @for($d=1; $d<=12; $d++)
                                                    <option @if($get_data && $get_data->rivision_s == $d) selected @endif value="{{$d}}">{{$d}}</option>
                                                    @endfor
                                                 
                                                    <option @if($get_data && $get_data->rivision_s == 0) selected @endif value="0">unlimited</option>
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
                                                    @for($d=1; $d<=12; $d++)
                                                    <option @if($get_data && $get_data->rivision_pm == $d) selected @endif value="{{$d}}">{{$d}}</option>
                                                    @endfor
                                                 
                                                    <option @if($get_data && $get_data->rivision_pm == 0) selected @endif value="0">unlimited</option>
                                                  </select>
                                                  <!-- SVG ARROW -->
                                                  <svg class="svg-arrow">
                                                    <use xlink:href="#svg-arrow"></use>
                                                  </svg>
                                                  <!-- /SVG ARROW -->
                                                </label>
                                              
                                              </td>
                                            </tr>
                                            @if($get_data->gig_payment_type == 'monthly')
                                            <tr>
                                              <td>Daily work</td>
                                              <td>
                                                <label for="price_filter" class="select-block">
                                                  <select name="daily_work_b" id="price_filter">
                                                    @for($d=1; $d<=24; $d++)
                                                    <option @if($get_data && $get_data->daily_work_b == $d) selected @endif value="{{$d}}">{{ $d}}  hour</option>
                                                    @endfor
                                                   <!--  <option @if($get_data && $get_data->daily_work_b == 0) selected @endif value="0">unlimited</option> -->
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
                                                    @for($d=1; $d<=24; $d++)
                                                    <option @if($get_data && $get_data->daily_work_p == $d) selected @endif value="{{$d}}">{{ $d}}  hour</option>
                                                    @endfor 
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
                                                    @for($d=1; $d<=24; $d++)
                                                    <option @if($get_data && $get_data->daily_work_s == $d) selected @endif value="{{$d}}">{{ $d}}  hour</option>
                                                    @endfor 
                                                    
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
                                                    @for($d=1; $d<=24; $d++)
                                                    <option @if($get_data && $get_data->daily_work_pm == $d) selected @endif value="{{$d}}">{{ $d}}  hour</option>
                                                    @endfor
                                                  </select>
                                                  <!-- SVG ARROW -->
                                                  <svg class="svg-arrow">
                                                    <use xlink:href="#svg-arrow"></use>
                                                  </svg>
                                                  <!-- /SVG ARROW -->
                                                </label>
                                              
                                              </td>
                                            </tr>
                                             @endif
                                              <?php 
                                                if($get_data->gig_subcategory){
                                                  foreach ($filters  as $filter){
                                                    $select_id = $filter->sub_filter_id;
                                                ?>
                                                <tr>
                                                    <td>{{$filter->sub_filter_name}}
                                                      <input type="hidden" name="feature_name[]" value="{{$filter->sub_filter_name}}">
                                                      <input type="hidden" name="feature_id[]" value="{{$select_id}}">
                                                    </td>
                                                    
                                                    <td>
                                                      <input value="Yes" @if($filter->gig_feature && $filter->gig_feature->feature_basic == 'Yes') checked @endif   type="checkbox" id="basic{{$select_id}}" name="feature_basic[]">
                                                      <label for="basic{{$select_id}}">
                                                        <span class="checkbox primary"><span>
                                                      </label>
                                                    <td>
                                                      <input value="Yes" @if($filter->gig_feature && $filter->gig_feature->feature_plus == 'Yes') checked @endif  type="checkbox" id="plus{{$select_id}}" name="feature_plus[]" >
                                                      <label for="plus{{$select_id}}">
                                                        <span class="checkbox primary"><span>
                                                      </label>
                                                    </td>
                                                    <td>
                                                      <input value="Yes" @if($filter->gig_feature && $filter->gig_feature->feature_super == 'Yes') checked @endif type="checkbox" id="super{{$select_id}}" name="feature_super[]" >
                                                      <label for="super{{$select_id}}">
                                                        <span class="checkbox primary"><span>
                                                      </label>
                                                    </td>
                                                    <td>
                                                      <input value="Yes" @if($filter->gig_feature && $filter->gig_feature->feature_platinum == 'Yes') checked @endif type="checkbox" id="platinum{{$select_id}}"  name="feature_platinum[]" >
                                                      <label for="platinum{{$select_id}}">
                                                        <span class="checkbox primary"><span>
                                                      </label>
                                                    </td>               
                                                </tr>
                                                  <?php }}

                                                  $gig_pricescope = DB::table('gig_metadatas')
                                                    ->where('filter_id', $get_data->gig_subcategory)
                                                    ->where('filter_type', 'price')->get();
                                                  
                                                  foreach ($gig_pricescope  as $filter){
                                                    $select_id = $filter->sub_filter_id;
                                                ?>

                                                <tr>
                                                    <td>{{$filter->sub_filter_name}}
                                                      <input type="hidden" name="feature_name[]" value="{{$filter->sub_filter_name}}">
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
                                                <?php } ?>
                                                    <tr>
                                                    <td>Price</td>
                                                    <td><span class="price_dollar">$</span><input required="required" value="@if($get_data){{ $get_data->basic_p }}@endif" type="number"  name="basic_p"></td>
                                                    <td><span class="price_dollar">$</span><input  type="number" value="@if($get_data){{ $get_data->plus_p }}@endif" name="plus_p"></td>
                                                    <td><span class="price_dollar">$</span><input  type="number" value="@if($get_data){{ $get_data->super_p }}@endif" name="super_p"></td>
                                                    <td><span class="price_dollar">$</span><input type="number" value="@if($get_data){{$get_data->platinum_p}}@endif" name="platinum_p"></td>
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
                                          <button type="submit" class="btn">Next Step
                                              <small>Your information</small>
                                         </button> 
                                      </span>
                                </form>
                            <span class="prev">
                                <a href="{{route('gig_step', $get_data->gig_url)}}" class="btn" >Previous Step
                                     <small>Your information</small>
                                </a>
                            </span>
                    </div>
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



<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>
@endsection