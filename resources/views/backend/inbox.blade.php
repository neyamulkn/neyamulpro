@extends('backend.layouts.master')

@section('title', 'Inbox')

@section('css')

    <link rel="stylesheet" href="{{ asset('allscript/css/vendor/magnific-popup.css') }}">

<style>
form.search-form.v2 {
    padding: 10px;
}
.search-form input[type="image"] {
    position: absolute;
    top: 9px !important;
    right: 12px !important;
}
.inbox-messages-preview .inbox-message-preview {

    float: left;
    height: 555px !important;
    overflow: hidden;
}

.inbox-message-preview-body {

    height: 415px !important;
    padding-bottom: 60px;
    border-bottom: 1px solid #ebebeb;
    overflow-y: auto;
    overflow-x: hidden;

}

.inbox-messages-preview .inbox-messages{
    float: left;
    height: 555px !important;

}

.getmessages{
    padding: 5px;
}
.getmessages img, .inbox-message img{
    border-radius: 50%;

width: 45px;

height: 45px;

}

.message_tools label{
    float: left;
    padding: 0px 9px;
    font-size: 18px;
}

.inbox-message.v2 {
    height: 80px !important;
   
}

.dashboard-content {
    padding: 10px 0px 0px !important;

}

.inbox-message.v2:hover{
     background: #f5f5f5;
}

.active{
     background: #f5f5f5;
}
.attach-msg{
    float: left;
    padding: 5px;
}
#msg-image, #msg-file{
    display: none;
}
h2{
    color: #000 !important;
}

</style>
 <link rel="stylesheet" href="{{asset('chatbox')}}/css/style.css">

@endsection

@section('content')
    
     <style type="text/css">
        .card{
            box-shadow: none;
        }
        .card-header { padding: 3px 12px !important; }
        .chat{
            margin: 0px !important;
            padding: 0px !important;
            overflow: hidden;
            height: 595px;
        }

        input[type="text"]:not(.browser-default){
            width: 50% !important;
            padding-left: 3px;
        }
        input[type=text]:not(.browser-default){height: 35px;margin: 7px 0px;}
        .input-group > .input-group-prepend:not(:first-child) > .input-group-text {height: 35px; margin: 7px 0px;}

        .contacts li:hover{
            background: #ccc;
        }
        .type_msg{
            background-color:  rgba(255, 255, 255, 0.3) !important;
        }
        .row{
            margin-bottom: 0px !important;
        }
        .msg_class{
            cursor: pointer;
        }
        .msg_class:hover{
            color: red;
        }

        label{
            margin-bottom: 3px !important;
        }
     </style>
    
    <div class="container-fluid h-100">
            <div class="row">
                <div class="col-md-3 chat " id="cahtlist" style="display: block;">
                    <div class="card mb-sm-3 mb-md-0 contacts_card">
                        <div class="card-header">
                            
                            <div class="input-group">
                                <span class="d-xl-none .d-lg-none d-md-none" style="padding-top: 20px;" onclick="cahtlist('none')"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." name="" class="form-control search">
                                <div class="input-group-prepend">
                                    <span class="input-group-text search_btn"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body contacts_body">
                            <ui class="contacts" id="myUL">

                            @foreach($conversation_list as $conversations_show)

                            <?php

                                if($conversations_show->from_user != Auth::user()->id){
                                   
                                    $user_id = $conversations_show->from_user;
                                }else{
                                   
                                    $user_id = $conversations_show->to_user;
                                }

                                $userinfo = DB::table('users')
                                ->leftJoin('userinfos', 'users.id', '=', 'userinfos.user_id')
                                ->where('users.id', $user_id)
                                ->select('users.username', 'users.id', 'userinfos.user_image')
                                ->first();

                            ?>
                            @if($userinfo)
                            <li class="active message" id="{{$userinfo->username}}"   onclick="message('{{$userinfo->username}}')">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img  src="{{ asset('image/'.$userinfo->user_image)}}" class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <a>
                                        {{$userinfo->username}}
                                        </a>
                                    </div>
                                </div>
                            </li> 
                            @endif
                            @endforeach
                            
                            </ui>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row conversation-history" style="position: relative;"></div>
                </div>
            </div>
        </div>
    
  @endsection  
@section('js')
     <script src="{{asset('chatbox')}}/js/script.js"></script>


     <script type="text/javascript">

        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        function cahtlist(value){
            
            document.getElementById("cahtlist").style.display = value;
        }
     </script>

<script>
    

    var username = '{{ (Request::route("username")) ?  Request::route("username") : ""}}';
    
    $(document).ready(function(){
        if(username){
            message(username);
        }
    });
  
    function message(username){
        var  link = '<?php echo URL::to("/dashboard/getmessages/");?>/'+username;
        $('.conversation-history').html('<div id="overlay" style="" ></div>');
        $.ajax({
            url:link,
            method:"get",
            data:{
                conversaion:username
            },
            success:function(data){
                if(data){
                    $('.conversation-history').html(data);
                   
               }else{
                    $('.conversation-history').html('<p>No Conversation </p>');
                  
                    //document.getElementById("message-body").style.display = "none"; 
               }
            }
        });
        
        //document.getElementById(username).style.backgroundColor = 'white';
        var path = "{{route('inbox')}}/"+username;
        history.pushState(null, null, path);

    }



</script>
  
@endsection
