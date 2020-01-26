<?php $get_cart_info = DB::table('add_to_carts')->where('user_id', $get_id)->get();?>	

<div class="account-cart-quickview">
	<span class="icon-present">
		<!-- SVG ARROW -->
		<svg class="svg-arrow">
			<use xlink:href="#svg-arrow"></use>
		</svg>
		<!-- /SVG ARROW -->
	</span>

	<!-- PIN -->
	<span class="pin soft-edged secondary"><?php echo count($get_cart_info); ?></span>
	<!-- /PIN -->
<?php if(count($get_cart_info)>0){ ?>
	<!-- DROPDOWN CART -->
	<ul class="dropdown cart closed">

			<!-- DROPDOWN ITEM -->
	@foreach($get_cart_info as $get_cart)
		
		<?php
            $get_gigs = DB::table('gig_basics')
                ->join('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->Join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->Join('users', 'gig_basics.gig_user_id', '=', 'users.id')
                //->Join('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->select('gig_basics.gig_title', 'gig_prices.*', 'gig_images.image_path', 'users.username', 'users.name')
                ->where([
                    ['gig_basics.gig_id', '=', $get_cart->gig_id],
                    ['users.id', '=', $get_cart->gig_user_id],
                ])->first();

                if($get_gigs){
	               
	                if($get_cart->package_name == 'basic'){
	                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_basic', 'Yes')->get();
	                  
	                        $gig_title = $get_gigs->gig_title;
	                        $gig_images = $get_gigs->image_path;
	                        $package_title = $get_gigs->basic_title;
	                        $package_dsc = $get_gigs->basic_dsc;
	                        $delivery_time = $get_gigs->delivery_time_b;
	                        $price = $get_gigs->basic_p;
	                   
	                }

	                if($get_cart->package_name == 'plus'){
	                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_plus', 'Yes')->get();
	                  
	                        $gig_title = $get_gigs->gig_title;
	                        $gig_images = $get_gigs->image_path;
	                        $package_title = $get_gigs->plus_title;
	                        $package_dsc = $get_gigs->plus_dsc;
	                        $delivery_time = $get_gigs->delivery_time_p;
	                        $price = $get_gigs->plus_p;
	                    
	                }

	                if($get_cart->package_name == 'super'){
	                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_super', 'Yes')->get();
	                    
	                        
	                        $gig_title = $get_gigs->gig_title;
	                        $gig_images = $get_gigs->image_path;
	                        $package_title = $get_gigs->super_title;
	                        $package_dsc = $get_gigs->super_dsc;
	                        $delivery_time = $get_gigs->delivery_time_s;
	                        $price = $get_gigs->super_p;
	                    
	                }

	                if($get_cart->package_name == 'platinum'){
	                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_platinum', 'Yes')->get();
	                   
	                        
	                        $gig_title = $get_gigs->gig_title;
	                        $gig_images = $get_gigs->image_path;
	                        $package_title = $get_gigs->platinum_title;
	                        $package_dsc = $get_gigs->platinum_dsc;
	                        $delivery_time = $get_gigs->delivery_time_pm;
	                        $price = $get_gigs->platinum_p;
	                    
	                }


		 		?>
					<li class="dropdown-item">
						<a href="{{route('order_checkout', $get_cart->cart_id)}}" class="link-to"></a>
						<!-- SVG PLUS -->
						<svg class="svg-plus">
							<use xlink:href="#svg-plus"></use>
						</svg>
						<!-- /SVG PLUS -->
						<div class="dropdown-triangle"></div>
						<figure class="product-preview-image tiny">
							<img src="{{ asset('gigimages/'.$gig_images)}}" alt="">
						</figure>
						<p class="text-header tiny">{{$gig_title}}</p>
						
						<p class="price tiny"><span>$</span>{{$price}}</p>
						
					</li>
			<?php } ?>
	@endforeach
		<!-- /DROPDOWN ITEM -->

	</ul>
<?php } ?>

	<!-- /DROPDOWN CART -->
</div>