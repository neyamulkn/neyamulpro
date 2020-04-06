@extends('backend.layouts.master')
@section('title',$get_data->gig_title. ' - HOTLancer')
@section('css')
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
    <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">

@endsection
@section('content')
<?php $step=0;  if(Request::route('step')){$step = Request::route('step');}?><br/>

<?php $gig_id = $get_data->gig_id; ?>
<!--Multi Step Wizard Start-->
   <div id="rms-wizard" class="rms-wizard">
           <!--Wizard Step Navigation Start-->
            <div class="rms-step-section" data-step-counter="false" data-step-image="false">
                <ul class="rms-multistep-progressbar"> 
                    <li class="rms-step rms-current-step">
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
               
                <div class="rms-content-box rms-current-section">
                     <div class="rms-content-area">
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-user" aria-hidden="true"></i> Description & FAQ</b></div>
                            <div class="step-label">Step 3 - 6 </div> 
                        </div>
                     <form action="{{route('gig_step_third', $get_data->gig_url)}}" method="post" data-parsley-validate>
                      {{csrf_field()}}
                         <div class="rms-content-body"> 
                          <label for="item_description" class="rl-label">Item Description</label>
                             <div class="row">
                                 <div class="col-md-12">
                                    <div class="comment-giglt">
                                      <div class="gigseditor">
                                        
                                          <textarea name="gig_dsc" maxlength="5000" required="required" class="ttinput-grouptddd" style="border:1px solid #ccc" id="textarea" placeholder="Enter text ...">{{$get_data->gig_dsc}}</textarea>
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
                                            
                                         @foreach($get_data->questionAnswer as $show_question_answer)

                                          <div  id="question_answer{{$show_question_answer->id}}" class="panel panel-default " style="background: #f9f9f9;padding: 13px 5px 1px; margin-bottom: 5px;  border: 1px solid #cecece;">
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
                                                    
                                                    <span id="{{$show_question_answer->id}}" onclick="delete_ques_ans('{{$show_question_answer->id}}')" class="btn_remove"><i class="fa fa-trash" aria-hidden="true"></i> delete</span><br/>
                                               
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
                          <input type="hidden" name="gig_id" value="{{ $gig_id }}">
                         
                            <button class="btn">Next Step
                                <small>Your information</small>
                           </button> 
                        </span>
                  </form>
                        <span class="prev">
                          
                            <a href="{{route('gig_step_second', $get_data->gig_url)}}" class="btn" >Previous Step
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
  if (confirm("Are you sure delete it.?")) {

      var _token = $('input[name="_token"]').val();
      $.ajax({
      url:'{{ URL::to("/question_answer/delete") }}',
      method:"POST",
      data:{
        ques_ans_id:id,
        _token: _token
      },
      success:function(data){
         $('#question_answer'+id).remove();
         toastr.success('Question deleted successful.')
      }

  });
}
  return false;     
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