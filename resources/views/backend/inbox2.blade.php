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

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
      
            <!-- INBOX MESSAGES PREVIEW -->
            <div class="inbox-messages-preview">
                <!-- INBOX MESSAGES -->
                <div class="inbox-messages message" style="height: auto;">
                    <!-- INBOX MESSAGE -->
                    <form class="search-form v2">
						<input type="text" class="rounded" name="search" id="search_products" placeholder="Search products here...">
						<input type="image" src="{{ asset('allscript')}}/images/search-icon.png" alt="search-icon">
					</form>
				@foreach($conversation_list as $conversations_show)

                
                <a href="{{url('dashboard/inbox/'.$conversations_show->username)}}" onclick="message('{{$conversations_show->id}}')" class="message" >
                    <div class="inbox-message v2">

                        <div class="inbox-message-author">
                            <figure class="user-avatar">
                                <img src="{{ asset('image/'.$conversations_show->user_image)}}" alt="user-img">
                            </figure>
                            <p id="sender_name{{$conversations_show->id}}" class="text-header">
                                {{$conversations_show->username}}
                            </p>
                        </div>

                        <div class="inbox-message-content">
                            <p class="description">{{$conversations_show->msg}}</p>
                        </div>

                        <div class="inbox-message-date">
                            <p>May 18th, 2014</p>
                        </div>
                    </div>
                </a>
                @endforeach
                    <!-- INBOX MESSAGE -->

                </div>
                <!-- /INBOX MESSAGES -->

                <!-- INBOX MESSAGE PREVIEW -->
                <div class="inbox-message-preview " id="message-body">
                    <div class="inbox-message-preview-header" style="height: 48px">
                        <p id="show_name">No Conversation </p>
                    </div>

                    <div class="inbox-message-preview-body">
                        <span class="show_conversation"></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="">
                                <textarea type="text" style="height: 58px; border-bottom: 1px solid #ebebeb" name="reply" placeholder="Write your message here..."> </textarea><br/>
                           
                        </div>
                        <div class="col-sm-12">

                            <label for="msg-image" style="float: left;" class="icon-energy attach-msg"> 
                                <input type="file" id="msg-image" name="attachImg">
                            </label>
                            <label style="float: left;" for="msg-file" class="sl-icon icon-camera attach-msg"> 
                                <input type="file" id="msg-file" name="attachFile"> 
                            </label>
                            <button style="float: right;" class="btn btn-success btn-sm">Send</button>
                        </div>
                         </form>
                    </div>
                </div>
                <!-- <div class="inbox-message-preview " id="no_conversation"><h2>No Conversation Select one.</h2></div> -->
                <!-- /INBOX MESSAGE PREVIEW -->
            </div>
            <!-- /INBOX MESSAGES PREVIEW -->
        </div>
        <!-- DASHBOARD CONTENT -->
    
    <!-- /DASHBOARD BODY -->

	<div class="shadow-film closed"></div>

@endsection

@section('js')

<!-- Tweet -->
<script src="{{ asset('allscript/js/vendor/jquery.magnific-popup.min.js') }}"></script>
<!-- xmAlerts -->
<script src="{{ asset('allscript/js/vendor/jquery.xmalert.min.js') }}"></script>

<script src="{{ asset('allscript/js/dashboard-inbox.js') }}"></script>
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
