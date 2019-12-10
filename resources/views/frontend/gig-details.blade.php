@extends('frontend.layouts.master')
<?php $title = strtolower($get_gig_info->gig_title) ; ?>
@section('title', 'I will '. $title .' – '. Request::segment(1) .' – '. 'HOTLancer' )
@section('metatag')
    <meta name="description" content="{{ strip_tags($get_gig_info->gig_dsc) }}">
    <meta name="image" content="{{asset('/gigimages/'.$get_gig_info->get_image->image_path) }}">
    <meta name="rating" content="5">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="{{'I will '. $title .' – '. Request::segment(1) .' – '. 'HOTLancer'}}">
    <meta itemprop="description" content="{{ strip_tags($get_gig_info->gig_dsc) }}">
    <meta itemprop="image" content="{{asset('/gigimages/'.$get_gig_info->get_image->image_path) }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{'I will '. $title .' – '. Request::segment(1) .' – '. 'HOTLancer'}}">
    <meta name="twitter:description" content="{{ strip_tags($get_gig_info->gig_dsc) }}">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:creator" content="{{$get_user_info->username}}">
    <meta name="twitter:image:src" content="{{asset('/gigimages/'.$get_gig_info->get_image->image_path) }}">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->
    
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="{{'I will '. $title .' – '. Request::segment(1) .' – '. 'HOTLancer'}}">
    <meta name="og:description" content="{{ strip_tags($get_gig_info->gig_dsc) }}">
    <meta name="og:image" content="{{asset('/gigimages/'.$get_gig_info->get_image->image_path) }}">
    <meta name="og:url" content="{{ url()->full() }}">
    <meta name="og:site_name" content="HOTLancer">
    <meta name="og:locale" content="en">
    <meta name="og:video" content="#">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="product">
    <script type="application/ld+json">
	{
	  "@context": "https://schema.org/",
	  "@type": "Product","category":"Corporate",
	  "name": "{{'I will '. $title .' – '. Request::segment(1) .' – '. 'HOTLancer'}}",
	  "image": [
	    "{{asset('/gigimages/'.$get_gig_info->get_image->image_path) }}"
	   ],
	  "description": "{{ strip_tags($get_gig_info->gig_dsc) }}",
	  "sku": "HOTLancer",
	  "mpn": "925872",
	  "brand": {
	    "@type": "Thing",
	    "name": "HOTLancer"
	  },
	  "review": {
	    "@type": "Review",
	    "reviewRating": {
	      "@type": "Rating",
	      "ratingValue": "4",
	      "bestRating": "5"
	    },
	    "author": {
	      "@type": "Person",
	      "name": "{{$get_user_info->username}}"
	    }
	  },
	  "aggregateRating": {
	    "@type": "AggregateRating",
	    "ratingValue": "4.4",
	    "reviewCount": "89"
	  },
	  "offers": {
	    "@type": "Offer",
	    "url": "{{ url()->full() }}",
	    "priceCurrency": "USD",
	    "price": "{{ $get_gig_price->basic_p }}",
	    "priceValidUntil": "{!!  \Carbon\Carbon::parse($get_gig_info->created_at)->format('M d, Y') !!}",
	    "itemCondition": "https://schema.org/UsedCondition",
	    "availability": "https://schema.org/InStock",
	    "seller": {
	      "@type": "Organization",
	      "name": "{{$get_user_info->username}}"
	    }
	  }
	}
	</script>
@endsection
@section('css')
	<link rel="stylesheet" href=" {{asset('allscript/css/vendor/simple-line-icons.css')  }}">
	<link rel="stylesheet" href=" {{asset('allscript/css/vendor/tooltipster.css')  }}">
	<link rel="stylesheet" href=" {{asset('allscript') }}/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" href=" {{asset('allscript') }}/e/1.css">
	<link rel="stylesheet" href=" {{asset('allscript') }}/css/pricing-table.css">
<style type="text/css">
	
h3.gigs1 {
	text-align: left;
	padding-bottom: 19px;
	line-height: 34px;
}
.gigs {
    background-color: white;
    padding: 20px;
    padding-bottom: 20px;
}
a.gigs-cat {
    color: black;
}
.post .post-content {
    padding: 10px 16px 20px !important;
    overflow: hidden;
	background-color: white;
}
h3.panel-title.price {
    top: 10px;
}
.accordion.item-faq {
    width: 872px;
    margin: 36px auto 46px;
    background-color: white;
}
h4.gigsfuq-item {
	background: #ffffff;
    border-bottom: 1px solid #ddd;
    padding: 18px;
}
.information-layout .information-layout-item {
    padding: 5px 0 0 0;
    border-bottom: 1px solid #ebebeb;
    overflow: hidden;
}

.post-tab .tab-header .tab-item {
    width: 65px !important;
    height: 50px !important;
}

.post-tab .tab-header .tab-item > p {
    line-height: 50px !important;
}

.post-tab .tab-header .tab-item.selected > p {
    line-height: 40px !important;
}

.images{
	border: 1px solid #ccc;
	padding: 2px;
	width: 55px;
	height: 55px;
}

.price_tab{
	font-weight: bolder; color: #000;line-height: 30px;margin-top: 5px;
}


.btn{
	padding: 8px 15px !important;
}
.feedback{
	color: #FFC100;font-size: 15px;font-weight: bold;
}
.rating_type{
	width: 30%;
	float: left;
	padding: 5px;
}
.price{
	font-size: 15px;
}
.marketplacepost {
    padding: 10px;
    background-color: white;
}
.marketplacepost h2 {
	color: #000;
	padding: 5px 0;
	font-size: 20px;
}

.price_left{
	text-transform: capitalize;
    text-align: left!important;
    padding: 10px !important;
}
</style>
@endsection


	<!-- SECTION -->
@section('content')
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<?php if(isset(Auth::user()->id)){
				$check_login_user = Auth::user()->id;
			}else{
				$check_login_user = "";
			} ?>
			<!-- SIDEBAR -->
			<div class="sidebar right">

				<div class="post-tab">
					<!-- TAB HEADER -->
					<div class="tab-header tertiary">


						<!-- TAB ITEM -->
						<div class="tab-item selected">
							<p class="text-header">Basic </p>
						</div>
						<!-- /TAB ITEM -->
						<div class="tab-item">
							<p class="text-header">Plus</p>
						</div>

						<!-- TAB ITEM -->
						<div class="tab-item">
							<p class="text-header">Super</p>
						</div>
						
						<!-- TAB ITEM -->
						
						<div class="tab-item">
							<p class="text-header">Platinum</p>
						</div>
						<!-- /TAB ITEM -->

					</div>
					<!-- /TAB HEADER -->
		<form action=" {{ url('order/add_card/') }}" method="post">
			 {{ csrf_field() }}
			<?php $time_type = ' days'; if($get_gig_info->gig_payment_type == 'monthly'){ $time_type = ' month'; }?>
					<!-- TAB CONTENT -->
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							<!-- COMMENT -->
							<div class="post-content">
								<p class="price_tab"> {{ $get_gig_price->basic_title }} <span style="float: right;">$ {{ $get_gig_price->basic_p }}</span></p>

								<p> {{ $get_gig_price->basic_dsc }}</p><br/>

								<p class="price_tab"><span class="sl-icon icon-clock"></span>  {{ $get_gig_price->delivery_time_b. $time_type }} delivery <span style="float: right;"><span class="sl-icon icon-refresh"></span>  {{ $get_gig_price->rivision_b }} Revision </span></p>

								@foreach($get_gig_feature as $gig_feature) 

									
								<p>
									<?php if($gig_feature->feature_basic == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i> ';} 
									?>  {{ $gig_feature->feature_name }} 
								</p>


								@endforeach
								<div class="clearfix"></div><br>
								<?php if($get_gig_info->gig_user_id != $check_login_user){ ?>
									<button name="package" value="basic" class="btn-info"> Continue ($ {{ $get_gig_price->basic_p }})</button>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							<!-- COMMENT -->
							<div class="post-content">
								<p class="price_tab"> {{ $get_gig_price->plus_title }} <span style="float: right;">$ {{ $get_gig_price->plus_p }}</span></p>

								<p> {{ $get_gig_price->plus_dsc }}</p><br/>

								<p class="price_tab"><span class="sl-icon icon-clock"></span>  {{ $get_gig_price->delivery_time_p. $time_type }} delivery <span style="float: right;"><span class="sl-icon icon-refresh"></span>  {{ $get_gig_price->rivision_p }} Revision </span></p>

								@foreach($get_gig_feature as $gig_feature)
									<p> 
									<?php if($gig_feature->feature_plus == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i> ';} 
									?>  {{ $gig_feature->feature_name }} </p>

								@endforeach
								<div class="clearfix"></div><br>
								<?php if($get_gig_info->gig_user_id != $check_login_user){ ?>
									<button name="package" value="plus" class="btn-info"> Continue ($ {{ $get_gig_price->plus_p }})</button>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							<!-- COMMENT -->
							<div class="post-content">
								<p class="price_tab"> {{ $get_gig_price->super_title }} <span style="float: right;">$ {{ $get_gig_price->super_p }}</span></p>

								<p> {{ $get_gig_price->super_dsc }}</p><br/>

								<p class="price_tab"><span class="sl-icon icon-clock"></span>  {{ $get_gig_price->delivery_time_s. $time_type }} delivery <span style="float: right;"><span class="sl-icon icon-refresh"></span>  {{ $get_gig_price->rivision_s }} Revision </span></p>

								@foreach($get_gig_feature as $gig_feature)
									<p> 
									<?php if($gig_feature->feature_super == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i> ';} 
									?>  {{ $gig_feature->feature_name }} </p>
									
								@endforeach
								<div class="clearfix"></div><br>

								<?php if($get_gig_info->gig_user_id != $check_login_user){ ?>
									<button name="package" value="super" class="btn-info"> Continue ($ {{ $get_gig_price->super_p }})</button>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="tab-content void">
						<!-- COMMENTS -->
						<div class="comment-list">
							<!-- COMMENT -->
							<div class="post-content">
								<p class="price_tab"> {{ $get_gig_price->platinum_title }} <span style="float: right;">$ {{ $get_gig_price->platinum_p }}</span></p>

								<p> {{ $get_gig_price->platinum_dsc }}</p><br/>

								<p class="price_tab"><span class="sl-icon icon-clock"></span>  {{ $get_gig_price->delivery_time_pm. $time_type }} Delivery <span style="float: right;"><span class="sl-icon icon-refresh"></span>  {{ $get_gig_price->rivision_pm }} Revision </span></p>

								@foreach($get_gig_feature as $gig_feature)
									<p>
									<?php if($gig_feature->feature_platinum == 'Yes') {echo ' <i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i> ';} 
									?>  {{ $gig_feature->feature_name }} </p>
									
								@endforeach
								<div class="clearfix"></div><br>
							<?php if($get_gig_info->gig_user_id != $check_login_user){ ?>
								<button name="package" value="platinum"  class="btn-info"> Continue ($ {{ $get_gig_price->platinum_p }})</button>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="sidebar-item author-bio author-badges-v2 column">
					<!-- USER AVATAR -->
					<a href=" {{ route('profile_view', $get_user_info->username) }}" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
							<img src="{{ asset('image/').'/'.$get_user_info->userinfo->user_image}}" class="images" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header"> {{ $get_user_info->name }}</p>
					<p class="text-oneline"> {{ $get_user_info->userinfo->user_title }}</p>
					<!-- BADGE LIST -->
					<div class="badge-list short">
						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{asset('allscript') }}/images/badges/community/bronze_s.png}}" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{asset('allscript') }}/images/badges/flags/flag_usa_s.png}}" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

						<!-- BADGE LIST ITEM -->
						<div class="badge-list-item">
							<figure class="badge small liquid">
								<img src="{{asset('allscript') }}/images/badges/community/support_s.png}}" alt="">
							</figure>
						</div>
						<!-- /BADGE LIST ITEM -->

					</div>	
					<!-- /BADGE LIST -->

					<div class="clearfix"></div>
					<a href="{{ route('inbox', $get_user_info->username) }}" class="button mid dark-light spaced">Contace me</a>
					<div class="information-layout">
						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header"><span class="icon-energy"></span> From</p>
							<p><b> {{ $get_user_info->country }}</b></p>
						</div>
						<div class="information-layout-item">
							<p class="text-header"><span class="icon-user"></span> Member since</p>
							<p><b> {{  \Carbon\Carbon::parse($get_user_info->created_at)->format('F d, Y') }}</b></p>
						</div>
						<div class="information-layout-item">
							<p class="text-header"><span class="icon-energy"></span> Avg. Response Time</p>
							<p><b>3 hours</b></p>
						</div>
						<div class="information-layout-item">
							<p class="text-header"><span class="icon-energy"></span> Recent Delivery</p>
							<p><b>15 days</b></p>
						</div>
						<p> {!! $get_user_info->userinfo->user_description  !!}</p>
						<!-- /INFORMATION LAYOUT ITEM -->
					</div>
					
					<div class="clearfix"></div>
						
				</div>
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item product-info">
					<h4>Gig Information</h4>
					<hr class="line-separator">
					<!-- INFORMATION LAYOUT -->
					<div class="information-layout">
						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Sales:</p>
							<p>22</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Upload Date:</p>
							<p>{!!  \Carbon\Carbon::parse($get_gig_info->created_at)->format('M d, Y') !!}</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Files Included:</p>
							<p>PSD, AI<br>JPEG, PNG</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Requirements:</p>
							<p>CS6 or Lower</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Dimensions:</p>
							<p>4500x2800 Px</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="tags primary">
								<?php $gig_search_tag = explode(',', $get_gig_info->gig_search_tag); ?>

								@foreach($gig_search_tag as $search_tag)
									<a href="#"> {{ $search_tag }}</a>,
								@endforeach
							</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->
					</div>
					<!-- INFORMATION LAYOUT -->
				</div>
				<!-- /SIDEBAR ITEM -->		
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content left">
				<!-- POST -->
				<div class="gigs">
					<h3 class="gigs1"> I will  {{ $get_gig_info->gig_title }}</h3>
					<input type="hidden" name="gig_id" value=" {{ $get_gig_info->gig_id }}">
					<input type="hidden" name="gig_user_id" value=" {{ $get_gig_info->gig_user_id }}">
					<hr class="line-separator"><br>
					<a class="gigs-cat" href="#">Marketplace > {{$get_gig_info->category_name}} > {{$get_gig_info->subcategory_name}}</a>
				</div>

				

				<article class="post">
					<!-- POST IMAGE -->
					<div class="post-image">
						<figure class="product-preview-image large liquid">
							<?php if(!empty($get_gig_info->get_image->image_path)){ ?>
							<img src="{{asset('/gigimages/'.$get_gig_info->get_image->image_path) }}" alt="">
						<?php } ?>
						</figure>
						<!-- SLIDE CONTROLS -->
						<div class="slide-control-wrap">
							<div class="slide-control rounded left">
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</div>

							<div class="slide-control rounded right">
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</div>
						</div>
					
					</div>
					<!-- /POST IMAGE -->

					<!-- POST IMAGE SLIDES -->
					<div class="post-image-slides">
						<!-- IMAGE SLIDES WRAP -->
						<div class="image-slides-wrap full">
							<!-- IMAGE SLIDES -->
							<div class="image-slides" data-slide-visible-full="8" 
													  data-slide-visible-small="2"
													  data-slide-count="9">
							
								
								<!-- /IMAGE SLIDE -->
								@foreach($get_gig_image as $gig_image)
								<div class="image-slide ">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<?php if(!empty($gig_image->image_path)){ ?>
										<img src="{{ asset('gigimages/'.$gig_image->image_path) }}" alt="">
									<?php } ?>
									</figure>
								</div>
								@endforeach
								<!-- IMAGE SLIDE -->
								
							</div>
							<!-- IMAGE SLIDES -->
						</div>
						<!-- IMAGE SLIDES WRAP -->
					</div>
					<!-- /POST IMAGE SLIDES -->
				</article>
				<table class="table table-hover table-bordered" style="margin-bottom: 20px; text-align:center;padding-left:200px; padding-right:200px; background-color: white;">
					<thead>
					  <tr>
						  <th><center></center></th>
						  <th><center><h3>Basic</h3></center></th>
						  <th><center><h3>Plus</h3></center></th>
						  <th><center><h3>Super</h3></center></th>
						  <th><center><h3>Platinum</h3></center></th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td class="price_left">{{$get_gig_info->gig_payment_type}} Price</td>
						<td><h3 class="panel-title price">$ {{ $get_gig_price->basic_p }}</h3></td>
						<td><h3 class="panel-title price">$ {{ $get_gig_price->plus_p }}</h3></td>
						<td><h3 class="panel-title price">$ {{ $get_gig_price->super_p }}</h3></td>
						<td><h3 class="panel-title price">$ {{ $get_gig_price->platinum_p }}</h3></td>
					  </tr>
					  <tr>
						<td class="price_left"><b>Packages</b></td>
						<td> {{ $get_gig_price->basic_title }}</td>
						<td> {{ $get_gig_price->plus_title }}</td>
						<td> {{ $get_gig_price->super_title }}</td>
						<td> {{ $get_gig_price->platinum_title }}</td>
					  </tr>
					  <tr>
						<td class="price_left">Description</td>
						<td> {{ $get_gig_price->basic_dsc }}</td>
						<td> {{ $get_gig_price->plus_dsc }}</td>
						<td> {{ $get_gig_price->super_dsc }}</td>
						<td> {{ $get_gig_price->platinum_dsc }}</td>
					  </tr>
					  <tr>
						<td class="price_left">Revisions</td>
						<td> {{ $get_gig_price->rivision_b }}</td>
						<td> {{ $get_gig_price->rivision_p }}</td>
						<td> {{ $get_gig_price->rivision_s }}</td>
						<td> {{ $get_gig_price->rivision_pm }}</td>
					  </tr>

					  @foreach($get_gig_feature as $gig_feature)
					  <tr>
						<td> {{ $gig_feature->feature_name }}</td>
						<td><?php if($gig_feature->feature_basic == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i>';} ?></td>
						<td><?php if($gig_feature->feature_plus == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i>';} ?></td>
						<td><?php if($gig_feature->feature_super == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i>';} ?></td>
						<td><?php if($gig_feature->feature_platinum == 'Yes') {echo '<i style="color:#1fd0b6;font-size: 15px;" class="fa fa-check fa-lg"></i>'; }else{ echo '<i style="color:#ccc;font-size: 15px;" class="fa fa-check fa-lg"></i>';} ?></td>
					  </tr>
					 @endforeach
					 
					@if($get_gig_info->gig_payment_type == 'monthly')
					 	<tr>
						<td class="price_left">Daily Work</td>
						<td> 1 hour</td>
						<td> 3 hour</td>
						<td> 4 hour</td>
						<td> 6 hour</td>
					  </tr>
					@endif
					
					 <tr>
						<td class="price_left">Delivery time</td>
						<td> {{ $get_gig_price->delivery_time_b . $time_type }} </td>
						<td> {{ $get_gig_price->delivery_time_p . $time_type }} </td>
						<td> {{ $get_gig_price->delivery_time_s . $time_type }} </td>
						<td> {{ $get_gig_price->delivery_time_pm . $time_type }} </td>
					 </tr>
					<?php if($get_gig_info->gig_user_id != $check_login_user) { ?>
					  <tr>
						</tr><tr><td></td>
						<td style="margin: 0 10px;">
							<b>$ {{ $get_gig_price->basic_p }} </b><br>
							<button class="btn-info"  name="package" value="basic">Select</button>
						</td>
						<td>
							<b>$ {{ $get_gig_price->plus_p }}</b><br>
							<button class="btn-info"  name="package" value="plus">Select</button>
						</td>
						<td>
							<b>$ {{ $get_gig_price->super_p }}</b><br>
							<button class="btn-info"  name="package" value="super">Select</button>
						</td>
						<td>
							<b>$ {{ $get_gig_price->platinum_p }}</b><br>
							<button class="btn-info"  name="package" value="platinum">Select</button>
						</td>
					</tr>
				<?php }?>
					</tbody>
				  </table>
				</form>
				<article class="marketplacepost">
					<p> {!! $get_gig_info->gig_dsc !!}</p>

					<hr class="line-separator">

					<!-- SHARE -->
								<div class="share-links-wrap">
									<p class="text-header small">Social Share:</p>
									<!-- SHARE LINKS -->
									<ul class="share-links hoverable">
										<li><a href="http://www.facebook.com/sharer.php?u={{  url('marketplace/'.$get_gig_info->gig_url) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com/share?url={{  url('marketplace/'.$get_gig_info->gig_url) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif&amp;text={{  $get_gig_info->gig_title }}&amp;hashtags=HOTLancer" target="_blank"><i class="fa fa-twitter"></i></a></li>
								
										<li><a href="http://reddit.com/submit?url={{  url('marketplace/'.$get_gig_info->gig_url) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif&amp;title={{  $get_gig_info->gig_title }}" target="_blank"><i class="fa fa-reddit"></i></a></li>
										<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{  url('marketplace/'.$get_gig_info->gig_url) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									</ul>
									<!-- /SHARE LINKS -->
								</div>
								<!-- /SHARE -->
								<!-- Affiliate SHARE -->
								<div class="share-links-wrap">
									<p class="text-header small">Affiliate Link:</p>
									<!-- Affiliate SHARE LINKS -->
									<ul class="share-links v3">
										<input type="text" value="{{ url('marketplace/'.$get_gig_info->gig_url) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif" id="myInput">
										<button onclick="myFunction()"><i class="fa fa-copy"></i></button>
									</ul>
									<!-- /Affiliate SHARE LINKS -->
								</div>
								<!-- /Affiliate SHARE -->
				</article>
				<!-- /POST -->
				<div class="accordion item-faq primary">
					<!-- ACCORDION ITEM -->
					<h4 class="gigsfuq-item">Frequently Asked Questions</h4>

					@foreach($get_question_answer as $question_answer)
					<div class="accordion-item">
						<h6 class="accordion-item-header"> {{ $question_answer->question }}</h6>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
						<div class="accordion-item-content">
							<p> {{ $question_answer->answer }}</p>
						</div>
					</div>
					@endforeach
					<!-- /ACCORDION ITEM -->

				
					
				</div>
			@if(count($get_feedback)>0)
			<div class="comment-list">
				<?php 
					$com_seller  = 0;
					$service_describe = 0;
					$buy_again_recommend = 0;
					$total = 0;
					foreach($get_feedback as $show_feedback)
						{
							$com_seller  += $show_feedback->com_seller ;
							$service_describe += $show_feedback->service_describe;
							$buy_again_recommend += $show_feedback->buy_again_recommend;
							$total += 1;
						}
					?>
				<h4 class="gigsfuq-item">Reviews <i class="fa fa-star feedback" aria-hidden="true">  {{ round((($com_seller)/$total+($service_describe/$total)+($buy_again_recommend/$total))/3, 1) }} </i> ( {{ $total }})</h4>
				<div style="margin: 20px;">
					<sapn class="rating_type">Seller communication level <br/><i class="fa fa-star feedback" aria-hidden="true">  {{ round(($com_seller)/$total) }} </i></sapn>
					<sapn class="rating_type">Recommend to a friend <br/><i class="fa fa-star feedback" aria-hidden="true">  {{ round($service_describe/$total) }} </i></sapn>
					<sapn class="rating_type">Service as described <br/><i class="fa fa-star feedback" aria-hidden="true">  {{ round($buy_again_recommend/$total) }} </i></sapn> <br/>
				</div>
				<hr class="line-separator">
					<!-- feedback -->
					@foreach($get_feedback as $show_feedback)
							<?php $com_seller  = $show_feedback->com_seller ;
							$service_describe = $show_feedback->service_describe;
							$buy_again_recommend = $show_feedback->buy_again_recommend; ?>
					<div class="comment-wrap">
						<!-- USER AVATAR -->
						<a href="{{ route('gig_details', $show_feedback->username)}} " >
							<figure class="user-avatar medium">
								<img src=" {{asset('image/'.$show_feedback->user_image) }}" class="images" alt="images">
							</figure>
						</a>
						<!-- /USER AVATAR -->
						<div class="comment">
							<p class="text-header"> {{ $show_feedback->username }} <i class="fa fa-star feedback" aria-hidden="true">  {{ round(($com_seller+$service_describe+$buy_again_recommend)/3, 1)  }}</i> </p>
							<p class="timestamp"> {{  \Carbon\Carbon::parse($show_feedback->created_at)->format('M d, Y') }}</p>
						
							<p> {{ $show_feedback->feadback_msg }}</p>
						</div>
					</div>
					<hr class="line-separator">
					@endforeach
					<!-- /feedback -->
			</div>
			@endif
				<div class="clearfix"></div><br>
				<div class="product-list grid column4-wrap">
					<!-- PRODUCT ITEM -->
					<?php
						$get_another_gig = DB::table('gig_basics')->where('gig_user_id', $get_user_info->id)->where('gig_status', 'active')->limit(6)->get(); 

						if(count($get_another_gig)>1){
					?>

					@foreach( $get_another_gig as $another_gig)
					<div class="product-item column">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
							<?php
								$get_image = DB::table('gig_images')->where('gig_id', $another_gig->gig_id)->first(); ?>
								
								<img src=" {{ asset('/gigimages/'.$get_image->image_path) }}" alt="product-image">
							
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->

							<!-- PREVIEW ACTIONS -->
							<div class="preview-actions">
								<!-- PREVIEW ACTION -->
								<div class="preview-action">
									<a href=" {{ route('gig_details', $another_gig->gig_url) }}" target="_blank">
										<div class="circle tiny primary">
											<span class="icon-tag"></span>
										</div>
									</a>
									<a href="{{ route('gig_details', $another_gig->gig_url) }}" target="_blank">
										<p>Go to Item </p>
									</a>
								</div>
								<!-- /PREVIEW ACTION -->

								<!-- PREVIEW ACTION -->
								<div class="preview-action">
									<a href="#">
										<div class="circle tiny secondary">
											<span class="icon-heart"></span>
										</div>
									</a>
									<a href="#">
										<p>Favourites +</p>
									</a>
								</div>
								<!-- /PREVIEW ACTION -->
							</div>
							<!-- /PREVIEW ACTIONS -->
						</div>
						<!-- /PRODUCT PREVIEW ACTIONS -->

						<!-- PRODUCT INFO -->
						<div class="product-info">
							<a href=" {{ route('gig_details', $another_gig->gig_url) }}" target="_blank">
								<p class="text-header">I will  {!! $another_gig->gig_title   !!}</p>
							</a>
							<a href="shop-gridview-v1.html">
								<p class="category primary">PSD Templates</p>
							</a>
							<p class="price"><span>$</span><?php $get_gig_price = DB::table('gig_prices')->select('basic_p')->where('gig_id', $another_gig->gig_id)->first(); 
									if($get_gig_price){ 
										echo $get_gig_price->basic_p;
										}
									?></p>
						</div>
						<!-- /PRODUCT INFO -->
						<hr class="line-separator">

						<!-- USER RATING -->
						<div class="user-rating">
							<a href="author-profile.html">
								<figure class="user-avatar small">
									<img src=" {{asset('allscript') }}/images/avatars/avatar_01.jpg }}" alt="user-avatar">
								</figure>
							</a>
							<a href=" {{ route('profile_view', $get_user_info->username) }}">
								<p class="text-header tiny"> {{ $get_user_info->name }}</p>
							</a>
							<ul class="rating tooltip tooltipstered">
								<li class="rating-item">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="rating-item">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="rating-item">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="rating-item">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="rating-item empty">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
							</ul>
						</div>
						<!-- /USER RATING -->
					</div>

					@endforeach
					<!-- /PRODUCT ITEM -->
				<?php } ?>
				</div>
			</div>
		
			<!-- CONTENT -->
		</div>
		
	</div>
<!-- /SECTION -->
@endsection

@section('js')

<!-- Tooltipster -->
<script src=" {{asset('/allscript') }}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- ImgLiquid -->
<script src=" {{asset('/allscript') }}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src=" {{asset('/allscript') }}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Tweet -->
<script src=" {{asset('/allscript') }}/js/vendor/twitter/jquery.tweet.min.js"></script>

<!-- Liquid -->
<script src=" {{asset('/allscript') }}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src=" {{asset('/allscript') }}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src=" {{asset('/allscript') }}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src=" {{asset('/allscript') }}/js/post-tab.js"></script>
<!-- XM Accordion -->
<script src=" {{asset('/allscript') }}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
<script src=" {{asset('/allscript') }}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- Item V1 -->
<script src=" {{asset('/allscript') }}/js/item-v1.js"></script>
<!-- Tooltip -->
<script src=" {{asset('/allscript') }}/js/tooltip.js"></script>
<!-- User Quickview Dropdown -->

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}
</script>
@endsection