
<?php 
$session_id = 0;
$session_id =  Session::get('session_id');
$get_cart_info = DB::table('theme_add_to_cart')->orWhere('user_id', $get_id)->orWhere('session_id', $session_id)->get();?>	
					
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
            $get_theme= DB::table('themes')
                ->where('theme_id', $get_cart->theme_id)->first();
		 ?>
		 
		<li class="dropdown-item">
			<a href="{{url('themeplace/cart/')}}" class="link-to"></a>
			<!-- SVG PLUS -->
			<svg class="svg-plus">
				<use xlink:href="#svg-plus"></use>
			</svg>
			<!-- /SVG PLUS -->
			<div class="dropdown-triangle"></div>
			<figure class="product-preview-image tiny">
				<img src="{{ asset('theme/images/'.$get_theme->main_image)}}" alt="">
			</figure>
			<p class="text-header tiny">{{$get_theme->theme_name}}</p>
			
			<p class="price tiny"><span>$</span>{{$get_theme->price_regular}}</p>
		</li>

	@endforeach
		<li class="dropdown-item">
			<p class="text-header tiny">Total</p>
			<p class="price"><span>$</span>108.00</p>
			<a href="{{url('themeplace/cart')}}" class="button tertiary half">Go to Cart</a>
			<a href="checkout.html" class="button secondary half">Go to Checkout</a>
		</li>
		<!-- /DROPDOWN ITEM -->
	
	</ul>
<?php } ?>

	<!-- /DROPDOWN CART -->
</div>