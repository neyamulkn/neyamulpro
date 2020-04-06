@extends('backend.layouts.master')
@section('title', $get_data->gig_title. ' - HOTLancer')
@section('css')
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
  <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
  <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">
 <link href="{{ asset('allscript')}}/gig/css/dropify.min.css" rel="stylesheet">

@endsection
@section('content')

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
                            <div class="leftside-title"><b> <i class="fa fa-file-text" aria-hidden="true"></i> Gellary</b></div>
                            <div class="step-label">Step 5 - 6 </div> 
                        </div>
                        <div class="rms-content-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="comment-list" style="background-color: transparent; border:none;"><br>
                                 
                                     <div class="row">
                                      <div  id="images-to-upload" ></div>
                                       <form style="width: 100%;" name="submit_form" action="{{ Route('gig_step_five', $get_data->gig_url) }}" enctype="multipart/form-data" method="POST" id="submit_form">
                                        {{csrf_field()}}
                                           <input type="hidden" name="gig_id" value="{{ $get_data->gig_id }}">
                                          <span class="firstImage">
                                          <input  accept="image/*" data-type='image' data-allowed-file-extensions="jpg jpeg png gif"  name="file[]" id="firstImage" class="dropify"  @if(count($get_data->get_allImage)>0) data-default-file="{{ asset('gigimages/'. $get_data->get_allImage[0]->image_path )}}" @else type="file" required="" @endif />
                                          </span>

                                          <span class="secondImage">
                                          <input  accept="image/*" data-type='image' data-allowed-file-extensions="jpg jpeg png gif" name="file[]" id="secondImage" class="dropify"  @if(count($get_data->get_allImage)>1) data-default-file="{{ asset('gigimages/'. $get_data->get_allImage[1]->image_path )}}" @else type="file" @endif />
                                           </span>
                                          <span class="thirdImage">
                                          <input  accept="image/*" data-type='image' data-allowed-file-extensions="jpg jpeg png gif" name="file[]" id="thirdImage" class="dropify"  @if(count($get_data->get_allImage)>2) data-default-file="{{ asset('gigimages/'. $get_data->get_allImage[2]->image_path )}}" @else type="file" @endif />
                                           </span>
                                           <button  style="display: none; width: 92%; margin-left: 10px;" class="button mid-short primary">Upload Images</button>
                                        </form>
                                      </div> <p style="color: red">Please select 835px-485px image</p>
                                    </div>
                                </div> 

                            </div> 
                        </div> 
                    </div>
                      <br/>
                    <div class="rms-footer-section">
                    
                      <div class="button-section">
                        <span class="nextstep">
                         
                            <button  form="submit_form" id="submit_btn" class="btn">Next Step
                                <small>Your information</small>
                           </button> 
                        </span>
                        <span class="prev">
                            <a href="{{route('gig_step_fourth', $get_data->gig_url)}}" class="btn" >Previous Step
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

<!-- image upload  prograss bar -->
<script>

            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

             
                // Used events
                var firstImage = $('#firstImage').dropify();

                firstImage.on('dropify.beforeClear', function(event, element){
                  if (confirm("Are you sure delete it.?")) {
                   
                    deleteImage( element.file.name, 'firstImage');
                
                  }
                  return false;
                });

                var secondImage = $('#secondImage').dropify();

                secondImage.on('dropify.beforeClear', function(event, element){
                    if (confirm("Are you sure delete it.?")) {
                   
                    deleteImage( element.file.name, 'secondImage');
                
                  }
                  return false;
                });

                var thirdImage = $('#thirdImage').dropify();

                thirdImage.on('dropify.beforeClear', function(event, element){
                   if ( confirm("Are you sure delete it.?")) {
                   
                    deleteImage( element.file.name, 'thirdImage');
                
                  }
                  return false;
                });

            });


            function deleteImage(image_path, imageNo){
              
                var gig_id = "{{ $get_data->gig_id }}";
                 $.ajax({
                    url:"{{route('gigimage_delete')}}",
                    method:"get",
                    data: {gig_id:gig_id, image_path: image_path},
                    success:function(data){
                        if(data){
                            
                            $('.'+imageNo).html('<input type="file" accept="image/*" data-type="image" data-allowed-file-extensions="jpg jpeg png gif"  name="file[]" id="'+imageNo+'" class="dropify" />');
                              $("#"+imageNo).addClass('dropify');
                              $('.dropify').dropify();

                              toastr.success(data);
                        }
                    }

                });
              
          }

</script>

<script src="{{asset('/allscript')}}/gig/js/dropify.min.js"></script>
<script src="{{asset('/allscript')}}/js/parsley.min.js"></script>
@endsection