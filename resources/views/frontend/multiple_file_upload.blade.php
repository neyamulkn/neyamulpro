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
            <h3 align="center">Ajax File Upload Progress Bar using PHP JQuery</h3>
            <br />
            <div class="panel panel-default">
                <div class="panel-heading"><b>Ajax File Upload Progress Bar using PHP JQuery</b></div>
                <div class="panel-body">
                <form  action="{{route('action')}}" method="post" name="fullForm" id="fullForm">  @csrf()  </form>
                    <input type="text" form="fullForm" name="fasd"> <button type="submit" form="fullForm">submit </button>

                    <form id="uploadImage" action="{{route('upload')}}" method="post">
                        @csrf()
                        <div class="form-group">
                            <label>File Upload</label>
                            <input type="file" name="uploadFile" id="uploadFile" onchange="uploadselectFile()"  />
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><div class="percenss">0%</div>
                        <div id="targetLayer" style="display:none;"></div>
                    </form>
              
                 <div class="form-group">
                            <input type="submit" form="uploadImage" id="uploadSubmit" value="Upload" class="btn btn-info" />
                        </div>
                    <div id="loader-icon" style="display:none;"><img src="{{asset('image/loading.gif')}}" /></div>
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
  

    $('#uploadImage').submit(function(event){
        if($('#uploadFile').val())
        {
            event.preventDefault();
            $('#loader-icon').show();
            $('#targetLayer').hide();
            $(this).ajaxSubmit({
                target: '#targetLayer',
                beforeSubmit:function(){
                    $('.progress-bar').width('0%');
                },
                uploadProgress: function(event, position, total, percentageComplete)
                {
                    $('.progress-bar').animate({
                        width: percentageComplete + '%'
                    },{
                        duration: 1000
                    });
                    
                },
                success:function(){
                    $('#loader-icon').hide();
                    $('#targetLayer').show();
                },
                resetForm: true
            });
        }
        return false;
    });
});
</script>

@endsection