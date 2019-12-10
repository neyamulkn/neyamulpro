<?php  // get notifications
	$get_notify = App\Notification::where('forUser', Auth::user()->id)
		->orderBy('id',  'DESC')
		->limit(10)
		->get();

	if(count($get_notify)>0){

		foreach($get_notify as $show_notify){
			switch ($show_notify->platform) {

				case 'marketplace':
					if($show_notify->type == 'order'){
			            $get_notify_order = DB::table('gig_orders')
			            ->Join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
			            ->select('gig_basics.gig_title', 'gig_orders.total')
			            ->where('gig_orders.order_id' , '=', $show_notify->item_id)
			            ->where('gig_orders.seller_id', '=', $show_notify->forUser)->first();
			            echo '
			            	<li class="dropdown-item" style="background:#f0f3f7">
								<a href="'.route('gig_order_details', $show_notify->item_id).'" >
								<figure class="user-avatar">
									<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="">
								</figure>
								<p class="tiny"><span><b>'.$show_notify->user->username.'</b> '.str_limit($get_notify_order->gig_title, 40).'</span></p>
								<span class="price tiny">$'.$get_notify_order->total.'</span>
								<p class="timestamp">'.Carbon\Carbon::parse($show_notify->created_at)->format('M d, Y').'</p>
								</a>
							</li>';
					}
		        break;
				
				case 'all':
				if($show_notify->type == 'withdrawal'){
					$withdrawal = App\Withdraw::where('invoice_id', $show_notify->item_id)->first();
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

?>

	<li class="allnotify"><a href="{{route('notifications')}}"> View All  </a></li>
<?php } ?>