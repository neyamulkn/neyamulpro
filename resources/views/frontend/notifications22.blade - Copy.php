<?php  // get notifications
	$get_notify = App\Notification::with(['user'])->where('forUser', Auth::user()->id)
		->orderBy('id',  'DESC')
		->limit(10)
		->get();

	if(count($get_notify)>0){

		foreach($get_notify as $show_notify){
			switch ($show_notify->platform) 
			{
				case 'marketplace':
					if($show_notify->type == 'order')
					{
			            echo '
		            	<li class="dropdown-item" style="background:#f0f3f7">
							<a href="'.route('gig_order_details', $show_notify->item_id).'" >
							<figure class="user-avatar">
								<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
							</figure>
							<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.str_limit($show_notify->gigOrder->getGig->gig_title, 40).'</span></p>
							<span class="price tiny">$'.$show_notify->gigOrder->total.'</span>
							<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
							</a>
						</li>';
					}
					elseif($show_notify->type == 'status')
					{
			            echo '
		            	<li class="dropdown-item" style="background:#f0f3f7">
							<a href="'.route('gig_details', $show_notify->getGig->gig_url).'" >
							<figure class="user-avatar">
								<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
							</figure>
							<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.str_limit($show_notify->getGig->gig_title, 40).'</span></p>
							<span class="price tiny">$'.$show_notify->get_gig_price->basic_p.'</span>
							<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
							</a>
						</li>';
					}else{
						
					}
		        break;

				case 'all':
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
			            	<li class="dropdown-item" '.($show_notify->read == 0 ? 'style="background:#f0f3f7"' : '').'>
								<a href="'.$url.'">
								<figure class="user-avatar">
									<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
								</figure>
								<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.$msg.'</span></p>
								<span class="price tiny">$'.$withdrawal->amount.'</span>
								<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
								</a>
							</li>';
						break;
					}
				}
			}
		}

?>

	<li class="allnotify"><a href="{{route('notifications')}}"> View All  </a></li>
<?php } ?>