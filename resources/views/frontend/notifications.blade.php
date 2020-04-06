<style type="text/css">
	.unread{background: #f0f3f7;}
	.read{background: #fff;}
	.notifications .timestamp{float: left;}
	.notifications .price{float: right;}
</style>

<?php  // get notifications
	$get_notify = App\Notification::with(['user'])->where('forUser', Auth::user()->id)
		->orderBy('id',  'DESC')
		->limit(7)
		->get();

	if(count($get_notify)>0){

		foreach($get_notify as $show_notify){
			if ($show_notify->platform == 'marketplace') 
			{
				if($show_notify->type == 'order'){

					$url = route('gig_order_details', $show_notify->item_id);
					$title = str_limit($show_notify->gigOrder->getGig->gig_title, 40);
					$notify = $show_notify->notify;
					$price = $show_notify->gigOrder->total;
					echo '
	            	<li onclick="readNotify('.$show_notify->id.')" class="dropdown-item" style="background:#f0f3f7">
						<a href="'.$url.'" >
						<figure class="user-avatar">
							<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
						</figure>
						<p class="tiny"><span><b>'.$show_notify->user->username.'</b>'.$notify .' your order '.$title.'</span></p>
						<span class="price tiny">$'.$price.'</span>
						<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
						</a>
					</li>';

				}elseif($show_notify->type == 'status'){
					$url = route('gig_details', $show_notify->getGig->gig_url);
					$title = str_limit($show_notify->getGig->gig_title, 40);
					$price = 0;

					echo '
	            	<li onclick="readNotify('.$show_notify->id.')" class="dropdown-item" style="background:{{ ($show_notify->read == 0 ) ? "#f0f3f7" : "#fff"}}">
						<a href="'.$url.'" >
						<figure class="user-avatar">
							<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
						</figure>
						<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.$title.'</span></p>
						<span class="price tiny">$'.$price.'</span>
						<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
						</a>
					</li>';
				}else{

				}

	            
	
		    }
			if ($show_notify->platform == 'themeplace') 
			{
				if($show_notify->type == 'order'){

					$url = route('gig_order_details', $show_notify->item_id);
					$title = str_limit($show_notify->gigOrder->getGig->gig_title, 40);
					$price = $show_notify->gigOrder->total;
					echo '
	            	<li onclick="readNotify('.$show_notify->id.')" class="dropdown-item" style="background:#f0f3f7">
						<a href="'.$url.'" >
						<figure class="user-avatar">
							<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
						</figure>
						<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.$title.'</span></p>
						<span class="price tiny">$'.$price.'</span>
						<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
						</a>
					</li>';

				}elseif($show_notify->type == 'status'){
					$url = route('theme_detail', $show_notify->getTheme->theme_url);
					$title = str_limit($show_notify->getTheme->theme_name, 40);
					$notify = $show_notify->notify;
					$price = $show_notify->getTheme->price_regular;

					echo '
	            	<li onclick="readNotify('.$show_notify->id.')" class="dropdown-item '. ($show_notify->read == 0 ? "unread" : "read").'">
						<a href="'.$url.'" >
							<figure class="user-avatar">
								<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
							</figure>
							<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.$notify.' your theme '.$title.'</span></p>
							<p style="overflow:hidden">
								<span class="timestamp" >'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'
								</span><span class="price tiny" style="text-aling:right">$'.$price.'</span>
							</p>
						</a>
					</li>';
				}else{

				}

	            
	
		    }
		    elseif($show_notify->platform == 'all'){
				if($show_notify->type == 'withdrawal'){
					$withdrawal = App\Withdraw::where('invoice_id', $show_notify->item_id)->first();
					if($withdrawal){
						if(Auth::user()->role_id == env('ADMIN')){ 
							$url = route('admin.withdraw_detials', $show_notify->item_id);
							$msg = 'withdrawal requested';
						}else{
							$url = route('withdraw_detials', $show_notify->item_id);
							$msg = 'withdrawal requested '. $withdrawal->status;
						}
						echo '
			            	<li onclick="readNotify('.$show_notify->id.')" class="dropdown-item" '.($show_notify->read == 0 ? 'style="background:#f0f3f7"' : '').'>
								<a href="'.$url.'">
								<figure class="user-avatar">
									<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
								</figure>
								<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.$msg.'</span></p>
								<span class="price tiny">$'.$withdrawal->amount.'</span>
								<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
								</a>
							</li>';
						
					}
				}
			}
		}

?>

	<li class="allnotify"><a href="{{route('notifications')}}"> View All  </a></li>
<?php } ?>