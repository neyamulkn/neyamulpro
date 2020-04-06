@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')

<!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline simple primary">
                <h4>Statistics</h4>
            </div>
            <!-- /HEADLINE -->

			<!-- GRAPH STATS LIST -->
			<div class="graph-stats-list">
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item green bars">
					<h2>863k</h2>
					<p class="text-header">Visitors this Month</p>
					<p>Avg 28766 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item violet line">
					<h2>36.428</h2>
					<p class="text-header">Referals this Month</p>
					<p>Avg 1214 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item blue step">
					<h2>7.698</h2>
					<p class="text-header">Conversions this Month</p>
					<p>Avg 256 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item red curve">
					<h2>65.254</h2>
					<p class="text-header">Returns this Month</p>
					<p>Avg 2175 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->
			</div>
			<!-- /GRAPH STATS LIST -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter">
					<h4>Main Activity Chart</h4>
					<hr class="line-separator">
					<canvas class="main-activity-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-tag primary"></span>
							<p class="text-header">Sales</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-bubble"></span>
							<p>Comments</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-eye"></span>
							<p>Views</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-heart"></span>
							<p>Likes</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period1" class="select-block">
									<select name="period1" id="period1">
										<option value="0">This Month</option>
										<option value="1">This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->
			
			<!-- FORM BOX ADDON -->
			<div class="form-box-addon">
				<!-- CHART WRAP -->
				<div class="chart-wrap">
					<div class="main-activity-pie-chart-wrap">
						<canvas class="main-activity-pie-chart"></canvas>
					</div>
					<!-- CHART LEGEND -->
					<div class="chart-legend">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Earnings</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Revenue</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /CHART WRAP -->
				
				<!-- CHART META WRAP -->
				<div class="chart-meta-wrap">
					<!-- CHART META -->
					<div class="chart-meta">
						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="price"><span>$</span>560</p>
							<p class="text-header small">Total Earnings</p>
							<p>This Month</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="text-header">138</p>
							<p class="text-header small">Total Sales</p>
							<p>This Month</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="text-header">4.45</p>
							<p class="text-header small">Daily Sales</p>
							<p>Average</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="price"><span>$</span>897</p>
							<p class="text-header small">Total Revenue</p>
							<p>This Month</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="price"><span>$</span>18.06</p>
							<p class="text-header small">Daily Earnings</p>
							<p>Average</p>
						</div>
						<!-- /CHART META ITEM -->
					</div>
					<!-- /CHART META -->
				</div>
				<!-- /CHART META WRAP -->
			</div>
			<!-- /FORM BOX ADDON -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items wrap-3-1 left">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full not-padded not-spaced">
					<h4>Recent Activity</h4>
					<hr class="line-separator">
					<!-- RECENT ACTIVITY -->
					<div class="recent-activity">
						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-heart"></span>
							<div class="recent-activity-item-timestamp">
								<p>2 Hours Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="{{asset('/allscript')}}/images/avatars/avatar_02.jpg" alt="user-image">
								</figure>
								<p><a href="#"><span class="bold">MeganV.</span></a> added <a href="#"><span class="bold">Pixel Diamond Gaming Shop</span></a> to favourites</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="{{asset('/allscript')}}/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-present"></span>
							<div class="recent-activity-item-timestamp">
								<p>10 Hours Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="{{asset('/allscript')}}/images/avatars/avatar_01.jpg" alt="user-image">
								</figure>
								<p>Your Item <a href="#"><span class="bold">Food Line Icons Pack</span></a> was succesfuly approved for sale</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="{{asset('/allscript')}}/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-tag"></span>
							<div class="recent-activity-item-timestamp">
								<p>18 Hours Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="{{asset('/allscript')}}/images/avatars/avatar_04.jpg" alt="user-image">
								</figure>
								<p><a href="#"><span class="bold">Red Thunder Graphics</span></a> purchased <a href="#"><span class="bold">La Marina Flyer Template</span></a></p>
							</div>
							<!-- CLOSE ICON -->
							<img src="{{asset('/allscript')}}/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-bubble"></span>
							<div class="recent-activity-item-timestamp">
								<p>1 Day Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="{{asset('/allscript')}}/images/avatars/avatar_04.jpg" alt="user-image">
								</figure>
								<p><a href="#"><span class="bold">Red Thunder Graphics</span></a> commented on <a href="#"><span class="bold">La Marina Flyer Template</span></a></p>
							</div>
							<!-- CLOSE ICON -->
							<img src="{{asset('/allscript')}}/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-heart"></span>
							<div class="recent-activity-item-timestamp">
								<p>3 Days Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="{{asset('/allscript')}}/images/avatars/avatar_06.jpg" alt="user-image">
								</figure>
								<p><a href="#"><span class="bold">Sarah-Imaginarium</span></a> added <a href="#"><span class="bold">City Landscape Icons</span></a> to favourites</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="{{asset('/allscript')}}/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-wallet"></span>
							<div class="recent-activity-item-timestamp">
								<p>6 Weeks Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="{{asset('/allscript')}}/images/avatars/avatar_01.jpg" alt="user-image">
								</figure>
								<p>You made a <a href="#"><span class="bold">Withdrawal Request</span></a> for $ 500.00 to jfisher@yourmail.com via <a href="#"><span class="bold">Paypal</span></a></p>
							</div>
							<!-- CLOSE ICON -->
							<img src="{{asset('/allscript')}}/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->
					</div>
					<!-- /RECENT ACTIVITY -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-full">
					<h4>Lines Graphic</h4>
					<hr class="line-separator">
					<canvas class="lines-graph-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period4" class="select-block">
									<select name="period4" id="period4">
										<option value="0">This Month</option>
										<option value="1">This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEMS -->
				<div class="form-box-items wrap-3-1 left">
					<!-- FORM BOX ITEM -->
					<div class="form-box-item full not-padded not-spaced">
						<h4>Most Popular Items</h4>
						<hr class="line-separator">
						<!-- POPULAR ITEMS -->
						<div class="popular-items">
							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="{{asset('/allscript')}}/images/items/westeros_t.jpg" alt="product-image">
									</figure>
									<p class="text-header small">Westeros Custom Clothing</p>
									<p class="category primary">PSD Templates</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>136</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>3690</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>2042</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->

							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="{{asset('/allscript')}}/images/items/miniverse_t.jpg" alt="product-image">
									</figure>
									<p class="text-header small">Miniverse - Hero Image Composer</p>
									<p class="category primary">Hero Image</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>96</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>2510</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>1005</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->

							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="{{asset('/allscript')}}/images/items/pixel_t.jpg" alt="product-image">
									</figure>
									<p class="text-header small">Pixel Diamond Gaming Shop</p>
									<p class="category primary">Shopify</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>57</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>1345</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>963</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->

							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="{{asset('/allscript')}}/images/items/anime_t.jpg" alt="product-image">
									</figure>
									<p class="text-header small">Anime Party Flyer + Ticket</p>
									<p class="category primary">Flyers</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>42</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>988</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>954</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->
						</div>
						<!-- /POPULAR ITEMS -->
					</div>
					<!-- /FORM BOX ITEM -->
				</div>
				<!-- /FORM BOX ITEMS -->

				<!-- FORM BOX ITEMS -->
				<div class="form-box-items wrap-1-3 right">
					<!-- FORM BOX ITEM -->
					<div class="form-box-item full graph-bg">
						<h4>Pie Chart V2</h4>
						<hr class="line-separator">
						<div class="bounce-pie-chart">
							<p class="text-header big bounce-perc-link">68<span>%</span></p>
							<p class="text-header small">Bounce Back Rate</p>
							<p>In the Last Month</p>
						</div>
					</div>
					<!-- /FORM BOX ITEM -->
				</div>
				<!-- /FORM BOX ITEMS -->

				<div class="clearfix"></div>

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-full has-chart-legend">
					<h4>Double Bar Graphic</h4>
					<hr class="line-separator">
					<canvas class="double-bar-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period5" class="select-block">
									<select name="period5" id="period5">
										<option value="0">This Month</option>
										<option value="1" selected>This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->

					<!-- CHART LEGEND -->
					<div class="chart-legend inline">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Value 01</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Value 02</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-full has-chart-legend">
					<h4>Waves Graphic</h4>
					<hr class="line-separator">
					<canvas class="waves-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period6" class="select-block">
									<select name="period6" id="period6">
										<option value="0">This Month</option>
										<option value="1" selected>This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->

					<!-- CHART LEGEND -->
					<div class="chart-legend inline">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color red"></div>
							<p>Value 01</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Value 02</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items wrap-1-3 right">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Colors Pie Chart</h4>
					<hr class="line-separator">
					<div class="colors-pie-chart-wrap">
						<canvas class="colors-pie-chart"></canvas>
						<!-- CHART DESCRIPTION -->
						<div class="chart-description">
							<p class="text-header">25.396</p>
							<p class="text-header">Visitors</p>
						</div>
						<!-- /CHART DESCRIPTION -->
					</div>
					<!-- CHART LEGEND -->
					<div class="chart-legend full">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color violet"></div>
							<p>From Google</p>
							<p class="text-header">16.534</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Your Website</p>
							<p class="text-header">5.980</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Other Search Engines</p>
							<p class="text-header">2.882</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Your Text Box</h4>
					<hr class="line-separator">
					<!-- PLAIN TEXT BOX -->
					<div class="plain-text-box">
						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Text Box Title:</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut ut labore. Eiusmod tempor incididunt ut labore et dolore magna aliqua en derum de lorem consectur labore.</p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->

						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Text Box Title:</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut ut labore.</p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->

						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Title of Link Text:</p>
							<p><a href="#" class="primary">Click here for the link.</a></p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->
					</div>
					<!-- /PLAIN TEXT BOX -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Progress Bars</h4>
					<hr class="line-separator">
					<!-- PG BAR LIST -->
					<div class="pg-bar-list">
						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Sales Conversions</p>
								<p class="text-header">86%</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg1"></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Customer Referrals</p>
								<p class="text-header">1200/2000</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg2"></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Visitors</p>
								<p class="text-header">1.250.500</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg3"></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->
					</div>
					<!-- /PG BAR LIST -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-simple">
					<h4>Social Media</h4>
					<hr class="line-separator">
					<canvas class="social-media-chart" height="300"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period2" class="select-block">
									<select name="period2" id="period2">
										<option value="0">This Month</option>
										<option value="1">This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Numbers Box</h4>
					<hr class="line-separator">
					<!-- SLIDER WRAP -->
					<div class="slider-wrap">
						<!-- NUMBERS SLIDER -->
						<div class="numbers-slider">
							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">522</p>
								<p class="text-header">Stars Received</p>
								<p>In the Last Year</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">982</p>
								<p class="text-header">Reviews Received</p>
								<p>In the Last Year</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">360</p>
								<p class="text-header">Messages Sent</p>
								<p>In the Last Month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">634</p>
								<p class="text-header">Messages Received</p>
								<p>In the Last Month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">132</p>
								<p class="text-header">Ratings Received</p>
								<p>In the Last Month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->
						</div>
						<!-- /NUMBERS SLIDER -->

						<!-- SLIDER PAGER -->
						<div class="slider-pager">
							<a data-slide-index="0" href="#"></a>
							<a data-slide-index="1" href="#"></a>
							<a data-slide-index="2" href="#"></a>
							<a data-slide-index="3" href="#"></a>
							<a data-slide-index="4" href="#"></a>
						</div>
						<!-- /SLIDER PAGER -->
					</div>
					<!-- /SLIDER WRAP -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-simple has-chart-legend">
					<h4>Single Bar</h4>
					<hr class="line-separator">
					<canvas class="single-bar-chart" height="300"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period3" class="select-block">
									<select name="period3" id="period3">
										<option value="0">This Month</option>
										<option value="1">This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->

					<!-- CHART LEGEND -->
					<div class="chart-legend inline">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Value 01</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Value 02</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->

			<div class="clearfix"></div>

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter">
					<h4>Two Lines Big Chart</h4>
					<hr class="line-separator">
					<canvas class="two-lines-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<!-- CHART LEGEND -->
							<div class="chart-legend inline">
								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color blue"></div>
									<p>Value 01</p>
								</div>
								<!-- /CHART LEGEND ITEM -->

								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color yellow"></div>
									<p>Value 02</p>
								</div>
								<!-- /CHART LEGEND ITEM -->
							</div>
							<!-- /CHART LEGEND -->
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period7" class="select-block">
									<select name="period7" id="period7">
										<option value="0">This Month</option>
										<option value="1" selected>This Year</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item has-chart-filter">
					<h4>Country Statistics</h4>
					<hr class="line-separator">
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<!-- CHART LEGEND -->
							<div class="chart-legend inline">
								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color violet"></div>
									<p>Visits</p>
								</div>
								<!-- /CHART LEGEND ITEM -->

								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color yellow"></div>
									<p>Sales</p>
								</div>
								<!-- /CHART LEGEND ITEM -->
							</div>
							<!-- /CHART LEGEND -->
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->

					<!-- PIE CHART LIST -->
					<div class="pie-chart-list">
						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc1"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag01.png" alt="country-image">
							<p class="text-header tiny">United States</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc2"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag02.png" alt="country-image">
							<p class="text-header tiny">France</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc3"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag03.png" alt="country-image">
							<p class="text-header tiny">Canada</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc4"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag04.png" alt="country-image">
							<p class="text-header tiny">Ireland</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc5"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag05.png" alt="country-image">
							<p class="text-header tiny">Germany</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc6"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag06.png" alt="country-image">
							<p class="text-header tiny">Netherlands</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc7"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag07.png" alt="country-image">
							<p class="text-header tiny">Mexico</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc8"></canvas>
							</div>
							<img src="{{asset('/allscript')}}/images/dashboard/dash-flag08.png" alt="country-image">
							<p class="text-header tiny">Indonesia</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->
					</div>
					<!-- /PIE CHART LIST -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<h4>Icons With Text</h4>
					<hr class="line-separator">
					<!-- TEXT ICONS -->
					<div class="text-icons">
						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon green">
								<span class="sl-icon icon-tag"></span>
							</div>
							<p class="text-header mid">68.107</p>
							<p>Themes Sales</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon blue">
								<span class="sl-icon icon-cup"></span>
							</div>
							<p class="text-header mid">39.512</p>
							<p>New Services</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon red">
								<span class="sl-icon icon-fire"></span>
							</div>
							<p class="text-header mid">14.800</p>
							<p>New Auctions</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon violet">
								<span class="sl-icon icon-present"></span>
							</div>
							<p class="text-header mid">7.324</p>
							<p>New Items</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon violet">
								<span class="sl-icon icon-eye"></span>
							</div>
							<p class="text-header mid">18.006</p>
							<p>New Visits</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon violet">
								<span class="sl-icon icon-heart"></span>
							</div>
							<p class="text-header mid">9.094</p>
							<p>New Likes</p>
						</div>
						<!-- /TEXT ICON -->
					</div>
					<!-- /TEXT ICONS -->

					<!-- TEXT ICON -->
					<div class="text-icon">
						<div class="ticon green">
							<span class="sl-icon icon-bubble"></span>
						</div>
						<p class="text-header mid">Paragraph</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut ut labore. Eiusmod tempor incididunt ut labore et dolore magna aliqua en derum de lorem consectur labore.</p>
					</div>
					<!-- /TEXT ICON -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->

@endsection

@section('js')

<!-- XM LineFill -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.xmlinefill.min.js"></script>
<!-- Chartjs -->
<script src="{{asset('/allscript')}}/js/vendor/chart.min.js"></script>
<!-- bxSlider -->
<script src="{{asset('/allscript')}}/js/vendor/jquery.bxslider.min.js"></script>
<script src="{{asset('/allscript')}}/js/dashboard-statistics.js"></script>
@endsection