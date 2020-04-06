@if(in_array(Request::segment(1), ['workplace', 'marketplace', 'themeplace', 'themeplaces']))
	<div class="main-menu-wrap">
		<div class="menu-bar">
			<nav>
				<ul class="main-menu">
					<!-- MENU ITEM -->
				<?php
					$category = Request::segment(1);
					if($category == 'workplace'){
						$category = 'workplace_category';
						$subcategory = 'workplace_subcategory';
						$type = 'workplace';
					}if($category == 'marketplace'){
						$category = 'gig_home_category';
						$subcategory = 'gig_subcategories';
						$type = 'marketplace';
					}if($category == 'themeplace'){
						$category = 'theme_category';
						$subcategory = 'theme_subcategory';
						$type = 'themeplace';
					}
					$menu_left_right = 1;
					$get_category = DB::table($category)->get();
					if($get_category){
					foreach ($get_category as $show_category) {
						$category_id = $show_category->id;
						$menu_left_right++;
					
				?>
					<li class="menu-item category-sitebar">
						<a href="">{{$show_category->category_name}}
						</a>	

						<?php
						$sub_category = DB::table($subcategory)->where('category_id', $category_id)->get();
						if($sub_category){
						?>
						<div class="content-dropdown home_manu" style="{{ ($menu_left_right<7) ? 'left: 0' : 'right:0' }} ">
						<!-- FEATURE LIST BLOCK -->
							<div class="feature-list-block">
								<!-- FEATURE LIST -->
								<ul class="feature-list">
									
								@foreach ($sub_category as $show_subcategory)
									<li class="feature-list-item">
										<a href="{{url($type.'/category/'.$show_category->category_url.'/'.$show_subcategory->subcategory_url)}}"><?php echo $show_subcategory->subcategory_name; ?></a>
									</li>
								@endforeach
								</ul>
							</div>
						</div>
						<?php } ?>
					</li>
				<?php }} ?>
				</ul>
			</nav>
		</div>
	</div>
@endif
