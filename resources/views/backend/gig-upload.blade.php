<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/tooltipster.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/vendor/jquery.range.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/c.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/pricing-table.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/style.css">
	<link rel="stylesheet" href="{{ asset('allscript')}}/css/dropzone.css">
	<!-- favicon -->
	<link rel="icon" href="favicon.ico">
	<title>HOTLancer.com | Dashboard</title>
</head>
<body>

	<!-- SIDE MENU -->
	<div id="dashboard-options-menu" class="side-menu dashboard left closed">
        <!-- SVG PLUS -->
		<svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
		<!-- /SVG PLUS -->
        
		<!-- SIDE MENU HEADER -->
		<div class="side-menu-header">
			<!-- USER QUICKVIEW -->
			<div class="user-quickview">
				<!-- USER AVATAR -->
				<a href="author-profile.html">
				<div class="outer-ring">
					<div class="inner-ring"></div>
					<figure class="user-avatar">
						<img src="images/avatars/avatar_01.jpg" alt="avatar">
					</figure>
				</div>
				</a>
				<!-- /USER AVATAR -->

				<!-- USER INFORMATION -->
				<p class="user-name">Johnny Fisher</p>
				<p class="user-money">$745.00</p>
				<!-- /USER INFORMATION -->
			</div>
			<!-- /USER QUICKVIEW -->
		</div>
		<!-- /SIDE MENU HEADER -->

		<!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Your Account</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect interactive">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-settings.html">
                    <span class="sl-icon icon-settings"></span>
                    Account Settings
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-notifications.html">
                    <span class="sl-icon icon-star"></span>
                    Notifications
                </a>
                <!-- PIN -->
                <span class="pin soft-edged big primary">49</span>
                <!-- /PIN -->
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item interactive">
				<a href="#">
                    <span class="sl-icon icon-envelope"></span>
                    Messages
                    <!-- SVG ARROW -->
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
					<!-- /SVG ARROW -->
				</a>

				<!-- INNER DROPDOWN -->
				<ul class="inner-dropdown">
					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="dashboard-inbox.html">Your Inbox (36)</a>
						<!-- PIN -->
						<span class="pin soft-edged secondary">2</span>
						<!-- /PIN -->
					</li>
					<!-- /INNER DROPDOWN ITEM -->

					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="dashboard-inbox-v2.html">Your Inbox (36) V2</a>
					</li>
					<!-- /INNER DROPDOWN ITEM -->

					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="dashboard-openmessage.html">Open Message</a>
					</li>
					<!-- /INNER DROPDOWN ITEM -->

					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="dashboard-inbox.html">Starred Message</a>
					</li>
					<!-- /INNER DROPDOWN ITEM -->

					<!-- INNER DROPDOWN ITEM -->
					<li class="inner-dropdown-item">
						<a href="dashboard-inbox.html">Deleted Messages</a>
					</li>
					<!-- /INNER DROPDOWN ITEM -->
				</ul>
				<!-- INNER DROPDOWN -->

                <!-- PIN -->
                <span class="pin soft-edged big secondary">!</span>
                <!-- /PIN -->
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-purchases.html">
                    <span class="sl-icon icon-tag"></span>
                    Your Purchases
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item active">
				<a href="dashboard-buycredits.html">
                    <span class="sl-icon icon-credit-card"></span>
                    Buy Credits
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->

        <!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Info &amp; Statistics</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-statement.html">
                    <span class="sl-icon icon-layers"></span>
                    Sales Statement
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-statistics.html">
                    <span class="sl-icon icon-chart"></span>
                    Statistics
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->

         <!-- SIDE MENU TITLE -->
		<p class="side-menu-title">Author Tools</p>
		<!-- /SIDE MENU TITLE -->

		<!-- DROPDOWN -->
		<ul class="dropdown dark hover-effect">
			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-uploaditem.html">
                    <span class="sl-icon icon-arrow-up-circle"></span>
                    Upload Item
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->

			<!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-manageitems.html">
                    <span class="sl-icon icon-folder-alt"></span>
                    Manage Items
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->

            <!-- DROPDOWN ITEM -->
			<li class="dropdown-item">
				<a href="dashboard-withdrawals.html">
                    <span class="sl-icon icon-wallet"></span>
                    Withdrawals
                </a>
			</li>
			<!-- /DROPDOWN ITEM -->
		</ul>
		<!-- /DROPDOWN -->

        <a href="#" class="button medium secondary">Logout</a>
	</div>
	<!-- /SIDE MENU -->

    <!-- DASHBOARD BODY -->
    <div class="dashboard-body">
        <!-- DASHBOARD HEADER -->
        <div class="dashboard-header retracted">
            <!-- DB CLOSE BUTTON -->
            <a href="index.html" class="db-close-button">
               <img src="images/dashboard/back-icon.png" alt="back-icon">
            </a>
            <!-- DB CLOSE BUTTON -->

			<!-- DB OPTIONS BUTTON -->
            <div class="db-options-button">
               <img src="images/dashboard/db-list-right.png" alt="db-list-right">
			   <img src="images/dashboard/close-icon.png" alt="close-icon">
            </div>
            <!-- DB OPTIONS BUTTON -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item title">
                <!-- DB SIDE MENU HANDLER -->
                 <div class="db-side-menu-handler">
                    <img src="images/dashboard/db-list-left.png" alt="db-list-left">
                </div>
                <!-- /DB SIDE MENU HANDLER -->
                <h6>Your Dashboard</h6>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

			<!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item form">
                <form class="dashboard-search">
                    <input type="text" name="search" id="search_dashboard" placeholder="Search on dashboard...">
                    <input type="image" src="images/dashboard/search-icon.png" alt="search-icon">
                </form>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart1">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus primary">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>64.579</h6>
                    <p>New Original Visits</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart2">
                        <!-- SVG PLUS -->
                        <svg class="svg-minus tertiary">
                            <use xlink:href="#svg-minus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>20.8</h6>
                    <p>Less Sales Than Last Month</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

            <!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item stats">
                <!-- STATS META -->
                <div class="stats-meta">
                    <div class="pie-chart pie-chart3">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus primary">
                            <use xlink:href="#svg-plus"></use>
                        </svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <h6>322k</h6>
                    <p>Total Visits This Month</p>
                </div>
                <!-- /STATS META -->
            </div>
            <!-- /DASHBOARD HEADER ITEM -->

			<!-- DASHBOARD HEADER ITEM -->
            <div class="dashboard-header-item back-button">
                <a href="index.html" class="button mid dark-light">Back to Homepage</a>
            </div>
            <!-- /DASHBOARD HEADER ITEM -->
        </div>
        <!-- DASHBOARD HEADER -->

        <!-- DASHBOARD CONTENT -->
        <div class="">
            <div class="" style="display: block;">
				<!-- TAB HEADER -->
				<div class="tab-header primary">
					<!-- TAB ITEM -->
					<div class="tab-item selected">
						<p class="text-header">Overview</p>
					</div>
					<div class="tab-item">
						<p class="text-header">Pricing</p>
					</div>
					<div class="tab-item">
						<p class="text-header">Description & FAQ</p>
					</div>
					<div class="tab-item">
						<p class="text-header">DRAFT</p>
					</div>
					<div class="tab-item">
						<p class="text-header">DENIED</p>
					</div>
					<div class="tab-item">
						<p class="text-header">PAUSED</p>
					</div>
					<!-- /TAB ITEM -->
				</div>
				<!-- /TAB HEADER -->

				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list">
						<div class="comment-giglt">
							<div class="ttinput-group">
								<label class="ttinput-groupt1" for="name">GIG TITLE</label>
									<div class="input-wrap gig-edit-title-wrap">
										<textarea class="gig-title-text" type="text" placeholder="do something I'm really good at"></textarea>
										<div class="char-count"><em>0</em> / 80 max</div>
										<div class="char-count-desc"></div>
										<span class="gig-before-title">I will</span>
									</div>
							</div>
							
							<div class="ttinput-group">
								<label class="ttinput-groupt1" for="name">CATEGORY</label>
									<div class="input-wrap gig-edit-title-wrap">
										<div class="input-container half hv4">
											<label for="vr" class="select-block">
												<select name="vr" id="vr">
													<option value="0">Vectorized</option>
													<option value="1">Rasterized</option>
												</select>
												<!-- SVG ARROW -->
												<svg class="svg-arrow">
													<use xlink:href="#svg-arrow"></use>
												</svg>
												<!-- /SVG ARROW -->
											</label>
										</div>
										<div class="input-container half hv4">
											<label for="vr" class="select-block">
												<select name="vr" id="vr">
													<option value="0">Vectorized</option>
													<option value="1">Rasterized</option>
												</select>
												<!-- SVG ARROW -->
												<svg class="svg-arrow">
													<use xlink:href="#svg-arrow"></use>
												</svg>
												<!-- /SVG ARROW -->
											</label>
										</div>
									</div>
							</div>
							
							<div class="ttinput-group">
								<label class="ttinput-groupt1" for="name">SEARCH TAGS</label>
									<div class="input-wrap gig-edit-tags-input-wrap">
										<div class="gig-edit-tags-wrap general-form-field-wrap" id="js-gig-tags">
											<textarea class="tagstext" cols="74" id="gig_tag_list" maxlength="100" name="gig[tag_list]" rows="2" style="display: none;"></textarea>
											<input type="text" class="tag-input" name="tag-input" maxlength="20"><input type="hidden" name="hidden-tag-input">
											<ul class="js-tag-list auto-complete-tags"></ul>
										</div>
										<div class="gig-edit-tags-desc">
											Up to 5 terms
										</div>
									</div>
							</div>
							
							
							
						</div>
						
					</div>
					<!-- /COMMENTS -->
				</div>

				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list">
						<table class="table table-hover table-bordered" style="margin-bottom: 20px; margin-top: 15px; text-align:center;padding-left:200px; padding-right:200px; background-color: white;">
							<thead>
							  <tr class="active">
								  <th><center></center></th>
								  <th><center><h3>Basic</h3></center></th>
								  <th><center><h3>Plus</h3></center></th>
								  <th><center><h3>Super</h3></center></th>
								  <th><center><h3>Platinum</h3></center></th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td><br>Price</td>
								<td><h3 class="panel-title price">$10</h3></td>
								<td><h3 class="panel-title price">$100</h3></td>
								<td><h3 class="panel-title price">$500</h3></td>
								<td><h3 class="panel-title price">$9999</h3></td>
							  </tr>
							  <tr>
								<td class="active"><b>Packages</b></td>
								<td><textarea type="text" placeholder="Name your package"></textarea></td>
								<td><textarea type="text" placeholder="Name your package"></textarea></td>
								<td><textarea type="text" placeholder="Name your package"></textarea></td>
								<td><textarea type="text" placeholder="Name your package"></textarea></td>
							  </tr>
							  <tr>
								<td>Description</td>
								<td><textarea type="text" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
								<td><textarea type="text" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
								<td><textarea type="text" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
								<td><textarea type="text" placeholder="This is the option for those developing out a fully-formed mobile application."></textarea></td>
								</tr>
							  <tr>
								<td>Responsive design</td>
								
								<td>
									<input type="checkbox" id="ft1" name="ft1" form="shop_search_form">
									<label for="ft1">
										<span class="checkbox primary"><span>
									</label>
								<td>
									<input type="checkbox" id="filter2" name="filter2" checked>
									<label for="filter2">
										<span class="checkbox primary"><span>
									</label>
								</td>
								<td>
									<input type="checkbox" id="filter3" name="filter3" checked>
									<label for="filter3">
										<span class="checkbox primary"><span>
									</label>
								</td>
								<td>
									<input type="checkbox" id="filter4" name="filter4" checked>
									<label for="filter4">
										<span class="checkbox primary"><span>
									</label>
								</td>								
							  </tr>
							  <tr>
								<td>Scales to mobile</td>
								<td>
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
								
								</td>
								<td>
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
								
								</td>
								<td>
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
								
								</td>
								<td>
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
								
								</td>
							  </tr>
							  <tr>
								<td>Contact Form</td>
								<td><i style="color:black;font-size: 15px;" class="fa fa-minus fa-lg"></i></td>
								<td><span class="checkbox primary"><span></span></span></td>
								<td><span class="checkbox primary"><span></span></span></td>
								<td><span class="checkbox primary"><span></span></span></td>
							  </tr>
							<tr>
								<td>Social Media Integration</td>
								<td><i style="color:black;font-size: 15px;" class="fa fa-minus fa-lg"></i></td>
								<td><span class="checkbox primary"><span></span></span></td>
								<td><span class="checkbox primary"><span></span></span></td>
								<td><span class="checkbox primary"><span></span></span></td>
							</tr>
							  <tr>
								<td>Revisions</td>
								<td>3</td>
								<td>10</td>
								<td>5</td>
								<td>13</td>
							  </tr>
							  <tr>
								<td>Delivery time</td>
								<td>5 days</td>
								<td>7 days</td>
								<td>14 days</td>
								<td>29 days</td>
							  </tr>
							  <tr>
								</tr><tr><td></td>
								<td><a class="btn btn-info" style="margin-top:10px; margin-bottom:10px">Order Now</a></td>
								<td><a class="btn btn-info" style="margin-top:10px; margin-bottom:10px">Order Now</a></td>
								<td><a class="btn btn-info" style="margin-top:10px; margin-bottom:10px">Order Now</a></td>
								<td><a class="btn btn-info" style="margin-top:10px; margin-bottom:10px">Order Now</a></td></tr>
							</tbody>
						  </table>
					</div>
					<!-- /COMMENTS -->
				</div>
				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list">
						<!-- COMMENT -->
						<div class="comment-giglt">
							<div class="gigseditor">
								<form>
									<textarea class="ttinput-grouptddd" id="textarea" placeholder="Enter text ..."></textarea>
									<div id="toolbar" style="display: none;">
										<a class="bottomtt" data-wysihtml5-command="bold" title="CTRL+B"><img src="e/1.png"></a>
										<a class="bottomtt" data-wysihtml5-command="italic" title="CTRL+I"><img src="e/2.png"></a></a>
										<a class="bottomtt" data-wysihtml5-command="insertUnorderedList"><img src="e/3.png"></a></a>
										<a class="bottomtt" data-wysihtml5-command="insertOrderedList"><img src="e/4.png"></a></a>
										<a class="bottomtt" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"><img src="e/5.png"></a></a>
									</div>
								</form>
								<div id="log" style="display: none;"></div>
							</div>
							<div class="ttinput-group">
								<label class="ttinput-groupt1" for="name">Questions</label>
								<div class="input-wrap gig-edit-tags-input-wrap">
										<input type="text" class="tag-input" name="tag-input" maxlength="20">
										<textarea class="ttinput-gig" placeholder="Enter text ..."></textarea>
										
								</div>
							</div>
						</div>
						
						<div class="comment-gigrt">
							<div class="form-box-item full">
								<h4>Upload Queue</h4>
								<hr class="line-separator">
								<!-- PG BAR LIST -->
								<div class="pg-bar-list">
									<!-- PG BAR LIST ITEM -->
									<div class="pg-bar-list-item">
										<div class="pg-bar-list-item-info">
											<p class="text-header">Professional Business Card</p>
											<p class="text-header">86%</p>
											<p class="timestamp">4 days ago</p>
										</div>
										<!-- BADGE PROGRESS -->
										<div class="pg1 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="188" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
										<!-- /BADGE PROGRESS -->
									</div>
									<!-- /PG BAR LIST ITEM -->

									<!-- PG BAR LIST ITEM -->
									<div class="pg-bar-list-item">
										<div class="pg-bar-list-item-info">
											<p class="text-header">Professional Business Card</p>
											<p class="text-header">92%</p>
											<p class="timestamp">12 days ago</p>
										</div>
										<!-- BADGE PROGRESS -->
										<div class="pg2 xmlinefill" style="width: 219.094px; height: 30px; position: relative;"><canvas class="lineOutline" width="219" height="30" style="position: absolute; z-index: 0; top: 0px; left: 0px;"></canvas><canvas class="lineBar" width="201" height="30" style="position: absolute; z-index: 1; top: 0px; left: 0px;"></canvas></div>
										<!-- /BADGE PROGRESS -->
									</div>
									<!-- /PG BAR LIST ITEM -->
								</div>
								<!-- /PG BAR LIST -->
							</div>
						</div>
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
						<div class="comment-giglt">
						<form action="/upload-target" class="dropzone"></form>
						</div>
						<div class="comment-gigrt">
						</div>			

						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				<div class="tab-content void open">
					<!-- COMMENTS -->
					<div class="comment-list"><br>
						<!-- COMMENT -->
						<!-- /COMMENT REPLY -->
					</div>
					<!-- /COMMENTS -->
				</div>
				
			</div>

			<div class="clearfix"></div>			

			<!-- FORM BOX ITEMS -->
			<!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->

	<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">	
	<symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
		<path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
	</symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG PLUS -->
<svg style="display: none;">
	<symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
		<rect x="5" width="3" height="13"/>
		<rect y="5" width="13" height="3"/>
	</symbol>
</svg>
<!-- /SVG PLUS -->

<!-- SVG MINUS -->
<svg style="display: none;">
	<symbol id="svg-minus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
		<rect y="5" width="13" height="3"/>
	</symbol>
</svg>
<script src="e/01.js"></script>
<script src="e/02.js"></script>
<script>
  var editor = new wysihtml5.Editor("textarea", {
    toolbar:      "toolbar",
    stylesheets:  "e/1.css",
    parserRules:  wysihtml5ParserRules
  });
  
  var log = document.getElementById("log");
  
  editor
    .on("load", function() {
      log.innerHTML += "<div>load</div>";
    })
    .on("focus", function() {
      log.innerHTML += "<div>focus</div>";
    })
    .on("blur", function() {
      log.innerHTML += "<div>blur</div>";
    })
    .on("change", function() {
      log.innerHTML += "<div>change</div>";
    })
    .on("paste", function() {
      log.innerHTML += "<div>paste</div>";
    })
    .on("newword:composer", function() {
      log.innerHTML += "<div>newword:composer</div>";
    })
    .on("undo:composer", function() {
      log.innerHTML += "<div>undo:composer</div>";
    })
    .on("redo:composer", function() {
      log.innerHTML += "<div>redo:composer</div>";
    });
</script>
<!-- /SVG MINUS -->
<script src="{{ asset('allscript')}}/js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src="{{ asset('allscript')}}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Side Menu -->
<script src="{{ asset('allscript')}}/js/side-menu.js"></script>
<!-- Liquid -->
<script src="{{ asset('allscript')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{ asset('allscript')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{ asset('allscript')}}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src="{{ asset('allscript')}}/js/post-tab.js"></script>
<!-- XM Accordion -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- Item V1 -->
<!-- JRange -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.range.min.js"></script>
<!-- Shop -->
<script src="{{ asset('allscript')}}/js/shop.js"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript')}}/js/tooltip.js"></script>
<script src="{{ asset('allscript')}}/js/dropzone.js"></script>
<!-- User Quickview Dropdown -->
<script src="{{ asset('allscript')}}/js/user-board.js"></script>
<!-- Footer -->
<script src="{{ asset('allscript')}}/js/footer.js"></script>

<!-- Dashboard Header -->
<script src="{{ asset('allscript')}}/js/dashboard-header.js"></script>
</body>
</html>