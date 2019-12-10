

<div class="col-md-8 chat">
 
    <div class="card-header msg_head">
        
        <div class="d-flex bd-highlight">
            <span class="d-xl-none .d-lg-none d-md-none"  onclick="cahtlist('block')" >
                <i class="fa fa-angle-left" style="padding-top: 20px;"></i>
            </span>
            <div class="img_cont">
                <img  src="{{ asset('image/'.$userinfo->user_image)}}" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <div class="user_info">
                 <p id="show_name">{{$userinfo->username}}</p>
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
    <div class="card">
        <div class="show_conversation" style="min-height: 100% !important; max-height: 100% !important">
                                    
            <div class="card-body msg_card_body"  style="min-height: 78% !important; max-height: 78% !important; overflow-y: scroll; ">

                @if(count($get_messages)>0)
                    @foreach($get_messages  as $message)
                       
                        @if($message->from_user != Auth::user()->id)
                       
                              <div class="d-flex justify-content-start mb-4">
                                @if($message->image != null)
                                <a href="{{ asset('images/message/'.$message->image) }}" target="_blank">
                                <img src="{{ asset('images/message/thumb_img/'.$message->image) }}" class="img-thumbnail" width="150" height="150"></a>
                                @endif
                                    <div class="msg_cotainer">
                                       {{ $message->msg }}
                                        <span class="msg_time">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans()}} </span>
                                    </div>
                                </div>
                        
                        @else
                            <div class="d-flex justify-content-end mb-4">
                                @if($message->image != null)
                               
                                    <a href="{{ asset('images/message/'.$message->image) }}" target="_blank">
                                    <img src="{{ asset('images/message/thumb_img/'.$message->image) }}" class="img-thumbnail" width="150" height="150"></a>
                                
                                @endif
                                <div class="msg_cotainer_send">
                                   {{ $message->msg }}
                                    <span class="msg_time_send">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <h2>No conversation</h2>
                @endif
            </div>

            <form action="{{ route('message.send') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="to_user" id="to_user" value='{{$userinfo->id}}'>
                <div class="card-footer">
                    <div class="input-group">
                        <input  name="message" required="" class="form-control type_msg" placeholder="Type your message...">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text send_btn"><i class="material-icons">send</i></button> 
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
            </form>
        </div>
    </div>
</div>
<div class="col-md-4 chat">
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