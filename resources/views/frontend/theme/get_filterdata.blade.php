	<!-- HEADLINE -->
				<div class="headline tertiary">
					<h4>{{$get_theme_info->total()}} Products Found</h4>
					<form id="shop_filter_form" name="shop_filter_form">
						<label for="price_filter" class="select-block">
							<select name="price_filter" id="price_filter">
								<option value="0">Price (High to Low)</option>
								<option value="1">Price (Low to High)</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
						<label for="itemspp_filter" class="select-block">
							<select name="itemspp_filter" id="itemspp_filter">
								<option value="0">12 Items Per Page</option>
								<option value="1">6 Items Per Page</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
					</form>
					<div class="clearfix"></div>
				</div>
				<!-- /HEADLINE -->

				<!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">

						@foreach($get_theme_info as $show_theme_info)
							<!-- THEME ITEM -->
							<div class="theme1">
								<div class="theme2">
									<a href="#" class="Template">
										<img class="themeimg" src="{{asset('theme/images').'/'.$show_theme_info->main_image }}" >
									</a>
									<div class="author-data v2">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="#">
												<figure class="user-avatar small">
													<img src="{{ asset('allscript')}}/images/avatars/avatar_01.jpg" alt="user-avatar">
												</figure>
											</a>
											<a class="user-rating v4" href="{{url('themeplace/'.$show_theme_info->theme_url)}}">
												<p class="text-header tiny">{{$show_theme_info->name}}</p>
											</a>
										</div>
										<!-- /USER RATING -->

										<!-- METADATA -->
										<div class="metadata">
											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-bubble"></span>
												<p>12</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>210</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-heart"></span>
												<p>105</p>
											</div>
											<!-- /META ITEM -->
										</div>
										<!-- /METADATA -->
									</div>
								</div>
								<div class="theme3">
									<div class="themett">
										<a href="{{url('themeplace/'.$show_theme_info->theme_url)}}">{{$show_theme_info->theme_name}}</a>
									</div>
									<a href="shop-gridview-v1.html">
										<p class="category tertiary v2">{{$show_theme_info->category_name}} / {{$show_theme_info->subcategory_name}}</p>
									</a>
									<p class="prodlist-i-txt">
										{{$show_theme_info->summary}}
									</p>
									<div class="bottomtheme">
										<p class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</p>
										<a href="{{url('themeplace/'.$show_theme_info->theme_url)}}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">
										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')" class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i>
										</a>
									</div>
								</div>
								<div class="theme4">
									<ul >
										<li class="prodlist-i-props"><b>Update</b> {!! Carbon\Carbon::parse($show_theme_info->updated_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Sale </b> count</li>
										<li class="prodlist-i-props"><b>Review</b> count</li>
										<li class="prodlist-i-props"><b>Comment</b> count</li>
										<li class="prodlist-i-props"><b>Favourite </b> count</li>
										<li class="prodlist-i-props"><b>Author </b> count</li>
									
										<li class="prodlist-i-props"><b>Ex. License</b> None</li>
									</ul>
								</div>
							</div>
						@endforeach

					</div>
					<div class="page primary paginations">
	                   {{$get_theme_info->links()}}
	                </div>
				</div>
				<!-- /PRODUCT SHOWCASE -->
				