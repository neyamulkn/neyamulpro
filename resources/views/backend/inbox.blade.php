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

@endsection

@section('content')
     <link rel="stylesheet" href="{{asset('chatbox')}}/css/style.css">
     <title>Ready</title>
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
                            <li class="active message" onclick="message('{{$conversations_show->id}}')">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img  src="{{ asset('image/'.$conversations_show->user_image)}}" class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <a href="#" id="sender_name{{$conversations_show->id}}">
                                            {{$conversations_show->username}}
                                        </a>
                                        <p>{{$conversations_show->msg}}</p>
                                    </div>
                                </div>
                            </li> 
                            @endforeach
                            
                            </ui>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>

                <div class="col-md-6  chat" style="position: relative;">
                    <div class="card">
                        <div class="card-header msg_head">
                            
                            <div class="d-flex bd-highlight">
                                <span class="d-xl-none .d-lg-none d-md-none"  onclick="cahtlist('block')" >
                                    <i class="fa fa-angle-left" style="padding-top: 20px;"></i>
                                </span>
                                <div class="img_cont">
                                    <img  src="{{asset('chatbox')}}/images/1.jpg" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>Chat with joy</span>
                                    <p>Last seen 1d ago</p>
                                </div>
                                <!-- <div class="video_cam">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div> -->
                            </div>
                            <span id="action_menu_btn" style="color: #000;"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
                            <div class="action_menu">
                                <ul>
                                    <li><i class="fas fa-user-circle"></i> View profile</li>
                                    <li><i class="fas fa-users"></i> Add to close friends</li>
                                    
                                    <li><i class="fas fa-ban"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body show_conversation">

                            <div class="d-flex justify-content-start mb-4">
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Hi joyi am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                
                                <input  name="" class="form-control type_msg" placeholder="Type your message...">
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn"><i class="material-icons">send</i></span>
                                </div>
                            </div>
                            <div class="message_tools" style="margin-top: 3px;">
                                <label class="msg_class" title="send emoji"><i class="fa fa-smile-o" aria-hidden="true"></i></label> 
                                <label  for="attach_file" title="attach file" class="msg_class"><i class="fa fa-paperclip" aria-hidden="true"></i>
                                    <input type="file" style="display: none;" name="attach_file" id="attach_file"> 
                                </label>
                                
                                <label for="image" title="attach image" class="msg_class"><i class="fa fa-camera" aria-hidden="true"></i>
                                    <input type="file" id="image" name="image" style="display: none;">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 chat">
                    <div class="card mb-sm-3 mb-md-0 contacts_card">
                        <div class="card-header">
                            <div class="about" style="padding: 10px;">
                                
                                About
                            </div>
                        </div>
                        <div class="card-body contacts_body">
                            
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>

            </div>
        </div>
    
 
 

     <script src="{{asset('chatbox')}}/js/script.js"></script>

    <script src="{{asset('js/custom.js')}}"></script>
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

<script type="text/javascript">
$(document).ready(function(){

    $(document).on('click', '.message a', function(e){
    e.preventDefault();
    });
});
    
   <?php 
        $con_username =  Request::route('username'); 
        $get_userid = DB::table('users')->where('username', $con_username)->first();
        if($get_userid){
            $con_userid = $get_userid->id;
        
        }else{ 
            $con_userid = '';
        }
    ?>

    message(<?php echo $con_userid ; ?>);

    function message(id){
        var  link = '<?php echo URL::to("/dashboard/getmessages/");?>/'+id;
        $.ajax({
            url:link,
            method:"get",
            data:{
                conversaion:id
            },
            success:function(data){
                if(data){
                   
                    $('.show_conversation').html(data);

               }else{
                    $('.show_conversation').html('<p>No Conversation </p>');
                    //document.getElementById("message-body").style.display = "none"; 
               }
            }
        });

        var sender_name = document.getElementById("sender_name"+id).innerHTML;
        var show_name = document.getElementById("show_name").innerHTML = sender_name;
        history.pushState('state', sender_name+' | inbox', sender_name);

    }


</script>
  
@endsection
