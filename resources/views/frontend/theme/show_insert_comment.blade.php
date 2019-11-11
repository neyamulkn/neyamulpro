<div class="comment-wrap">
	<!-- USER AVATAR -->
	<a href="user-profile.html">
		<figure class="user-avatar medium user">
			<img src="{!! asset('image/'.$get_comment->user_image) !!}" alt="">
		</figure>
	</a>
	<!-- /USER AVATAR -->
	<div class="comment">
		<p class="text-header">{{$get_comment->username}}</p>
		<!-- PIN -->
		<span class="pin greyed">Purchased</span>
		<!-- /PIN -->
		<p class="timestamp">{{ \Carbon\Carbon::parse($get_comment->created_at)->format('M d, Y') }}</p>
		<a style="cursor: pointer;" onclick="reply_field('{{$get_comment->com_id}}')" class="report">Reply</a>
		<p>{{$get_comment->comment}}</p>
	</div> 
</div>