@extends('backend.layouts.master')

@section('title', 'All Notifications')

<style type="text/css">
	.profile-notifications .profile-notification{
		margin-bottom:0px !important;
		padding:8px;
	}
	.unread:hover{
		background: #fff;
	
	}

	.unread{
		background:#f0f3f7;
	}

</style>

@section('content')
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <!-- HEADLINE -->
        <div class="headline buttons primary">
            <h4>Your Notifications</h4>
			<a href="#" class="button mid-short primary">Mark all as Read</a>
        </div>
        <!-- /HEADLINE -->

		<!-- PROFILE NOTIFICATIONS -->
		<div class="profile-notifications">
			@foreach($get_notify as $show_notify)

			<?php 
				switch ($show_notify->platform) {

				case 'marketplace':
					if($show_notify->type == 'order'){
			            $get_notify_order = DB::table('gig_orders')
			            ->Join('gig_basics', 'gig_orders.gig_id', '=', 'gig_basics.gig_id')
			            ->select('gig_basics.gig_title', 'gig_orders.total')
			            ->where('gig_orders.order_id' , '=', $show_notify->item_id)
			            ->where('gig_orders.seller_id', '=', $show_notify->forUser)->first();
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
						}
						echo '<a href=""><div class="profile-notification '.($show_notify->read == 0 ? 'unread' : '').'">
								<div class="profile-notification-body">
									
										<figure class="user-avatar">
											<img src="'.asset('image/'.$show_notify->user->userinfo->user_image).'" alt="user-avatar">
										</figure>
										<p><span>'.$show_notify->user->username.'</span> added <span>Pixel Diamond Gaming Shop</span> to favourites</p>
										<span style="font-size: 12px; color: #ccc;margin-bottom: 5px;">2 hours ago</span>
									
								</div>
							</div></a>';
						break;
					}

				}


			?>

			@endforeach

		</div>
		<!-- /PROFILE NOTIFICATIONS -->

		<!-- PAGER -->
		<div class="pager-wrap">
			<div class="pager primary">
				<div class="pager-item"><p>1</p></div>
				<div class="pager-item active"><p>2</p></div>
				<div class="pager-item"><p>3</p></div>
				<div class="pager-item"><p>...</p></div>
				<div class="pager-item"><p>17</p></div>
			</div>
		</div>
		<!-- /PAGER -->
    </div>
    <!-- DASHBOARD CONTENT -->
@endsection