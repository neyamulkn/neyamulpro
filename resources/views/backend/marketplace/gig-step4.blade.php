@extends('backend.layouts.master')
@section('title',$get_data->gig_title. ' - HOTLancer')
@section('css')
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
    <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">
  <style type="text/css">
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

<?php $gig_id = $get_data->gig_id;  ?>
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
          
                    <li class="rms-step rms-current-step">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Description & FAQ </span>
                       
                    </li>

                    <li class="rms-step rms-current-step">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Requirements </span>
                       
                    </li>

                    <li class="rms-step ">
                        <span class="step-icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="step-title">Gellary </span>
                        
                    </li>

                     <li class="rms-step">
                        <span class="step-icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="step-title">Publish </span>
                        
                    </li>
                </ul>
            </div>
            <!--Wizard Navigation Close-->
            <!--Wizard Content Section Start-->
            <div class="rms-content-section">
               
                <div class="rms-content-box rms-current-section">
                     <div class="rms-content-area">
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-credit-card" aria-hidden="true"></i> Requirements</b></div>
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
               <form action="{{route('gig_step_fourth', $get_data->gig_url)}}" method="post"data-parsley-validate>
                          {{csrf_field()}}
                       
                    <textarea name="requirement" maxlength="1200" required="required" class="ttinput-grouptddd" style="border: 1px solid rgb(204, 204, 204);" placeholder="Enter text ...">@if($get_data->gig_requirement) {{$get_data->gig_requirement->requirement}} @endif</textarea>
                
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
                          
                          <input type="hidden" name="gig_id" value="{{ $gig_id }}">
                       
                            <button class="btn">Next Step
                                <small>Your information</small>
                           </button> 
                        </span>
                </form>
                        <span class="prev">
                            <a href="{{route('gig_step_third', $get_data->gig_url)}}" class="btn" >Previous Step
                                 <small>Your information</small>
                            </a>
                        </span>
                        
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

<script>
       

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
  @if($get_data->gig_subcategory)
    get_medata({{ $get_data->gig_subcategory }}, {{ $get_data->gig_id }});
  @endif

    function get_medata(subcategory_id, gig_id){
        var _token = $('input[name="_token"]').val();
        if(subcategory_id){
            $.ajax({
                method:'post',
                url:'{{url("get_medata")}}',
                data:{subcategory_id:subcategory_id, gig_id:gig_id, _token:_token},
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
        }
    }




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

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>
@endsection