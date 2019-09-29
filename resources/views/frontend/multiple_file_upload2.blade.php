@extends('backend.layouts.master')
@section('title','Create gig | ')
@section('css')
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/allscript')}}/css/icon.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
  <link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
    <link href="{{ asset('allscript')}}/gig/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="{{ asset('allscript')}}/gig/css/multistep.min.css" rel="stylesheet">

@endsection
  
   
@section('content')

<div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 - File Upload with Progressbar using Ajax jQuery</h3>
     <br />
     <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">File Upload with Progressbar using Ajax jQuery</h3>
                </div>
                <div class="panel-body">
                    <br />
                    <form  action="{{route('upload')}}" method="post" name="fullForm" id="fullForm">  @csrf()  </form>
                    <input type="text" form="fullForm" name="fasd">

                    <button type="submit" form="fullForm">submit </button>
                    <form id="uploadImage" method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                            <div class="col-md-3" align="right"><h4>Select Image</h4></div>
                            <div class="col-md-6">
                              <input type="file" onchange="uploadselectFile()" name="uploadFile" id="file" />
                            </div>
                            <div class="col-md-3">
                              <input type="submit" id="uploadSubmit" style="display: none;" name="upload" value="Upload" class="btn btn-success" />
                            </div>
                        </div>
                    </form>
                    <br />
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow=""
                      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                      </div>
                    </div><p class="text-header">46%</p>
                    <br />
                    <div id="success">

                    </div>
                    <br />
                </div>
            </div>
  </div>

  @endsection
@section('js') 

<script type="text/javascript" src="{{asset('allscript/js/jquery.form.js')}}"></script>

<script>

function uploadselectFile(){
   $("#uploadSubmit").click();

}
$(document).ready(function(){

    $('#uploadImage').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.text-header').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');
          $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('#success').append(data.image);
        }
      }
    });

});
</script>

@endsection