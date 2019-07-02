	<div class="main-menu-wrap">
		<div class="menu-bar">
			<nav>
				<ul class="main-menu">
					<!-- MENU ITEM -->
				<?php
					$get_category = DB::table('gig_home_category')->orderBy('sorting', 'asc')->get();
					if($get_category){
					foreach ($get_category as $show_category) {
						$category_id = $show_category->id;
					
				?>
					<li class="menu-item category-sitebar">
						<a href="item-filter/graphics-design">{{$show_category->category_name}}
						</a>	

						<?php
						$sub_category = DB::table('gig_subcategories')->where('category_id', $category_id)->get();
						if($sub_category){
						?>
						<div class="content-dropdown home_manu">
						<!-- FEATURE LIST BLOCK -->
							<div class="feature-list-block">
								<!-- FEATURE LIST -->
								<ul class="feature-list">
									
								@foreach ($sub_category as $show_subcategory)
									<li class="feature-list-item">
										<a href="{{url('/gig/'.$show_category->category_url.'/'.$show_subcategory->subcategory_url)}}"><?php echo $show_subcategory->subcategory_name; ?></a>
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

