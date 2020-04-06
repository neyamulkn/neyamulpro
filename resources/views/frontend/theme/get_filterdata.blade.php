<!-- HEADLINE -->
<div class="headline tertiary">
	<h4>{{$get_theme_info->total()}} Products Found</h4>
	<form id="shop_filter_form" name="shop_filter_form">
		<label for="price_sort" class="select-block">
			<select name="price_sort"  id="price_sort">
				<option value="ASC" selected="selected" >Price (Low to High)</option>
				<option value="DESC">Price (High to Low)</option>
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
									<a href="{{ route('theme_detail', $show_theme_info->theme_url) }}" class="Template">
										<img class="themeimg" src="{{asset('theme/images/thumb').'/'.$show_theme_info->main_image }}" >
									</a>
									<div class="author-data v2">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<figure class="user-avatar small">
													<img src="<?php echo asset('image/'.$show_theme_info->user_image); ?>" alt="user-avatar">
												</figure>
											</a>
											<a class="user-rating v4" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<p class="text-header tiny">{{$show_theme_info->name}}</p>
											</a>

										</div>
										<!-- /USER RATING -->

										<!-- METADATA -->
										<div class="metadata">
											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-bubble"></span>
												<p>{{count($show_theme_info->comments)}}</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>{{$show_theme_info->view_counts}}</p>
											</div>
											<!-- /META ITEM -->
											<?php $ratting = array_sum(array_column($show_theme_info->theme_review->toArray(), 'ratting_star')) / (count($show_theme_info->theme_review)>0 ? count($show_theme_info->theme_review) : 1) ?>
											<ul class="rating ">
											 @for($i=1; $i<=5; $i++)
												<li class="rating-item @if($i <= $ratting) @else empty @endif">
													<svg class="svg-star">
														<use xlink:href="#svg-star"></use>
													</svg>

												</li>
												@endfor
												<li><span>$</span>{{$show_theme_info->price_regular}}</li>
											</ul>

										</div>
										<!-- /METADATA -->

									</div>
								</div>
								<div class="theme3">
									<div class="themett">
										<a href="{{ route('theme_detail',$show_theme_info->theme_url) }}">{{$show_theme_info->theme_name}}</a>
									</div>
									<a>
										<p class="category tertiary v2">{{$show_theme_info->category_name}} / {{$show_theme_info->subcategory_name}}</p>
									</a>
									<p class="prodlist-i-txt">
										{{$show_theme_info->summary}}
									</p>
									<div class="bottomtheme">
										
										<a href="{{ route('theme_detail',$show_theme_info->theme_url) }}" target="_blank" class="button mid tertiary half v2">Preview</a>
										<input type="hidden" name="price" value="{{$show_theme_info->price_regular}}" id="price">

										<a onclick="add_to_cart('{{$show_theme_info->theme_id}}')"  class="button mid secondary wicon half v2"><i class="fa fa-shopping-cart"></i>
										</a>
									</div>
									<div class="author-data v2 author-mobile">
										<!-- USER RATING -->
										<div class="user-rating v2">
											<a class="user-rating v1" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<figure class="user-avatar small">
													<img src="<?php echo asset('image/'.$show_theme_info->user_image); ?>" alt="user-avatar">
												</figure>
											</a>
											<a class="user-rating v4" href="{{ route('profile_view', [$show_theme_info->username]) }}">
												<p class="text-header tiny">{{$show_theme_info->name}}</p>
											</a>
											<span style="float: right;" class="price small v2"><span>$</span>{{$show_theme_info->price_regular}}</span>
										</div>
										<!-- /USER RATING -->

										<!-- METADATA -->
										<div class="metadata">
											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-bubble"></span>
												<p>{{count($show_theme_info->comments)}}</p>
											</div>
											<!-- /META ITEM -->

											<!-- META ITEM -->
											<div class="meta-item">
												<span class="icon-eye"></span>
												<p>{{$show_theme_info->view_counts}}</p>
											</div>
											<!-- /META ITEM -->
											<ul class="rating ">
											 @for($i=1; $i<=5; $i++)
												<li class="rating-item @if($i <= $ratting) @else empty @endif">
													<svg class="svg-star">
														<use xlink:href="#svg-star"></use>
													</svg>

												</li>
											@endfor
											</ul>

										</div>
										<!-- /METADATA -->
									</div>
								</div>
								<div class="theme4">
									<ul>
										<li class="prodlist-i-props"><b>Created</b> {!! Carbon\Carbon::parse($show_theme_info->created_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Update</b> {!! Carbon\Carbon::parse($show_theme_info->updated_at)->format('d M, Y') !!}</li>
										<li class="prodlist-i-props"><b>Sale </b>{{count($show_theme_info->orders)}}</li>
										<li class="prodlist-i-props"><b>Review</b> {{count($show_theme_info->theme_review)}}</li>
										<li class="prodlist-i-props"><b>Author </b> {{$show_theme_info->username}}</li>
									
										<li class="prodlist-i-props"><b>Ex. License</b> ${{$show_theme_info->price_extented}}</li>
										<li class="prodlist-i-props"><b>View</b> {{$show_theme_info->view_counts}}</li>
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
