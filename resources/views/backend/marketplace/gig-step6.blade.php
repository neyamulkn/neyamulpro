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

<?php $gig_id = $get_data->gig_id;?>
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

                    <li class="rms-step rms-current-step">
                        <span class="step-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="step-title">Requirements </span>
                       
                    </li>

                    <li class="rms-step rms-current-step">
                        <span class="step-icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="step-title">Gellary </span>
                        
                    </li>

                     <li class="rms-step rms-current-step">
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
                    <form action="{{route('gig_step_finish', $get_data->gig_url)}}" method="post" >
                      {{csrf_field()}}
                        <div class="rms-content-title">
                            <div class="leftside-title"><b> <i class="fa fa-file-text" aria-hidden="true"></i> Publish</b> Gig</div>
                            <div class="step-label">Step 6 - 6 </div> 
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
                           
                            <input type="hidden" name="gig_id" value="{{ $gig_id }}">
                            
                              <button class="btn">Next Step
                                  <small>Your information</small>
                             </button> 
                          </span>
                      </form>
                          <span class="prev">
                              <a href="{{ route('gig_step_five', $get_data->gig_url) }}" class="btn" >Previous Step
                                   <small>Your information</small>
                              </a>
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

<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>
@endsection