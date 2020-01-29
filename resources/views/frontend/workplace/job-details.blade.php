@extends('frontend.layouts.master')
@section('title')
{!! $get_job->job_title .' – '. Request::segment(1) .' – '. 'HOTLancer' !!}
@endsection

@section('metatag')
    <meta name="description" content="{!! strip_tags(str_limit($get_job->job_dsc, 160)) !!}">
    <meta name="image" content="{{ asset('allscript/images/logo.png') }}">
    <meta name="rating" content="5">
    <meta name="keywords" content="{{$get_job->job_title}}">
    
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="{{$get_job->job_title  .' – '. Request::segment(1) .' – '. 'HOTLancer'}}">
    <meta itemprop="description" content="{{ strip_tags(str_limit($get_job->job_dsc, 160)) }}">
    <meta itemprop="image" content="{{ asset('allscript/images/logo.png') }}">
    
    <meta itemprop="keywords" content="{{$get_job->job_title}}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$get_job->job_title  .' – '. Request::segment(1) .' – '. 'HOTLancer'}}">
    <meta name="twitter:description" content="{{ strip_tags(str_limit($get_job->job_dsc, 160)) }}">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:creator" content="{{$get_job->username}}">
    <meta name="twitter:image:src" content="{{ asset('allscript/images/logo.png') }}">
    <meta name="twitter:player" content="#">
    <meta name="twitter:keywords" content="{{$get_job->job_title}}">
    
    <!-- Twitter - Product (e-commerce) -->
    
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="{{$get_job->job_title  .' – '. Request::segment(1) .' – '. 'HOTLancer'}}">
    <meta name="og:description" content="{{ strip_tags(str_limit($get_job->job_dsc, 160)) }}">
    <meta name="og:image" content="{{ asset('allscript/images/logo.png') }}">
    <meta name="og:url" content="{{ url()->full() }}">
    <meta name="og:site_name" content="HOTLancer">
    <meta name="og:locale" content="en">
    <meta name="og:keywords" content="{{$get_job->job_title}}">
    <meta name="og:video" content="#">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="product">
    <script type="application/ld+json">
	{
	  "@context": "https://schema.org/",
	  "@type": "Product","category":"Corporate",
	  "name": "{{$get_job->job_title  .' – '. Request::segment(1) .' – '. 'HOTLancer'}}",
	  "image": [
	    "{{ asset('allscript/images/logo.png') }}"
	   ],
	  "description": "{{ strip_tags(str_limit($get_job->job_dsc, 160)) }}",
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
	      "name": "{{$get_job->username}}"
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
	    "price": "{{ $get_job->budget }}",
	    "priceValidUntil": "{!!  \Carbon\Carbon::parse($get_job->created_at)->format('M d, Y') !!}",
	    "itemCondition": "https://schema.org/UsedCondition",
	    "availability": "https://schema.org/InStock",
	    "seller": {
	      "@type": "Organization",
	      "name": "{{$get_job->username}}"
	    }
	  }
	}
	</script>
@endsection
@section('css')
	<link rel="stylesheet" href="{!! asset('allscript/css/vendor/simple-line-icons.css') !!}">
	<link rel="stylesheet" href="{{ asset('allscript/gig/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{!! asset('allscript/css')!!}/hl-work.css">
	<link rel="stylesheet" href="{!! asset('allscript')!!}/e/1.css">

@endsection

@section('content')

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar right up">
				<a href="{!! route('job_proposal', $get_job->job_title_slug) !!}" class="button mid secondary-dark upb">Submit a Proposal</a><br/>
				<button form="shop_search_form" class="button mid secondary-dark">Save Job</button>
				<p class="pin-tag primary"><svg class="svg-check bullet-icon"><use xlink:href="#svg-check"></use></svg> Flag as inappropriate</p>
				<p>Required Connects to submit a proposal: 2 <svg class="svg-check bullet-icon"><use xlink:href="#svg-check"></use></svg></p>
				<p>Available Connects: 60 <svg class="svg-check bullet-icon"><use xlink:href="#svg-check"></use></svg></p>
				<hr class="line-separator">
				<b>About the Client</b><br/><br/>
				<b><svg class="svg-check bullet-icon"><use xlink:href="#svg-check"></use></svg> Payment Method Verified</b><br/><br/>
				<ul class="rating">
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
					<p> 5.00 of 1 review</p>
				</ul>
				<b>India</b><br/>
				<p>Noida 09:25 PM</p>
				<b>2 jobs posted</b><br/>
				<p>50% hire rate, 1 open job</p>
				<b>${!!$get_job->budget!!} total spent</b><br/>
				<p>1 hire, 0 active</p><br/>
				<p>{!! \Carbon\Carbon::parse($get_job->created_at)->diffForHumans()!!}</p><br/>
				
			</div>
			<!-- CONTENT -->
			<div class="content left">
				<div class="hotlancer-work">
				<h3 class="up-post">{!!$get_job->job_title!!}</h3>
				<!-- POST -->
				<article class="post">
					<p class="up-cat"><a href="#">Web Development</a></p><br/>
					<p class="up-time">Posted 14 minutes ago</p><br/>
					<hr class="line-separator"><br/>
					<!-- POST CONTENT -->
					<div class="up-dis">
						<p>{!! $get_job->job_dsc !!}</p>
					</div>
						<br/><hr class="line-separator"><br/>
						<!-- POST PARAGRAPH -->
						
						<div class="up-half">
							<b class="post-title small">Hours to be determined</b>
							<!-- POST ITEM LIST -->
							<ul class="post-item-list">
								<li>
									<p>{!!$get_job->price_type!!}</p>
								</li>
							</ul>
							<!-- POST ITEM LIST -->
						</div>
						<div class="up-half">
							<b class="post-title small">


								@if($get_job->project_time==1)
									Less than 1 month
								@endif
								@if($get_job->project_time==2)
									1 to 3 months
								@endif
								@if($get_job->project_time==3)
									3 to 6 months
								@endif
								@if($get_job->project_time==4)
									More than 6 months
								@endif
								
								
							</b>
							<!-- POST ITEM LIST -->
							<ul class="post-item-list">
								<li>
									<p>Project Length</p>
								</li>
							</ul>
							<!-- POST ITEM LIST -->
						</div>
						<div class="up-half">
							<b class="post-title small">{!!$get_job->experience!!} Level</b>
							<!-- POST ITEM LIST -->
							<ul class="post-item-list">
								<li>
									<p>I am looking for a mix of<br/>experience and value</p>
								</li>
							</ul>
						</div>
						
						<br/><br/><hr class="line-separator"><br/>
						<!-- /POST PARAGRAPH -->
						<p class="up-cat"><b>Project Stage:</b> Concept</p>
						<p class="up-time"><b>Project Stage:</b> Concept</p>
						<!-- POST PARAGRAPH -->
						<br/><hr class="line-separator"><br/>
						<h4 class="up-cat">Skills and expertise</h4>
						<div class="tag-list primary up-cat">


							<?php 

								$get_filters = DB::table('job_expertise')
			                        ->join('workplace_filters', 'job_expertise.filter_id', 'workplace_filters.filter_id')
			                        ->where('job_expertise.job_id', $get_job->job_id)->get();

							?>
								 @foreach($get_filters as $show_filter)

			                         <?php
									 $get_subfilters = DB::table('workplace_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>


								 @foreach($get_subfilters as $show_subfilter)
									<a href="#" class="tag-list-item">{!!$show_subfilter->sub_filtername!!}</a>
								@endforeach
							@endforeach
							
						</div>
						<hr class="line-separator">
						<div class="clearfix"></div>
					
					<!-- SHARE -->
						<div class="share-links-wrap">
							<p class="text-header small">Social Share:</p>
							<!-- SHARE LINKS -->
							<ul class="share-links hoverable">
								<li><a href="http://www.facebook.com/sharer.php?u={!! url('workplace/'.$get_job->job_title_slug) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/share?url={!! url('workplace/'.$get_job->job_title_slug) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif&amp;text={!! $get_job->job_title !!}&amp;hashtags=HOTLancer" target="_blank"><i class="fa fa-twitter"></i></a></li>
						
								<li><a href="http://reddit.com/submit?url={!! url('workplace/'.$get_job->job_title_slug) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif&amp;title={!! $get_job->job_title !!}" target="_blank"><i class="fa fa-reddit"></i></a></li>
								<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={!! url('workplace/'.$get_job->job_title_slug) !!}@if(Auth::check())?ref={{Auth::user()->username}}@endif" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							</ul>
							<!-- /SHARE LINKS -->
						</div>
						<!-- /SHARE -->
						<!-- Affiliate SHARE -->
						<div class="share-links-wrap">
							<p class="text-header small">Affiliate Link:</p>
							<!-- Affiliate SHARE LINKS -->
							<ul class="share-links v3">
								<input type="text" value="{{ url('workplace/'.$get_job->job_title_slug) }}@if(Auth::check())?ref={{Auth::user()->username}}@endif" id="myInput">
								<button onclick="myFunction()"><i class="fa fa-copy"></i></button>
							</ul>
							<!-- /Affiliate SHARE LINKS -->
						</div>
						<!-- /Affiliate SHARE -->
					</article>
				</div>
			</div>
			<!-- CONTENT -->
		</div>
	</div>
	<!-- /SECTION -->
@endsection

@section('js')

<!-- XM LineFill -->
<script src="{!! asset('allscript')!!}/js/vendor/jquery.xmlinefill.min.js"></script>

<script src="{!! asset('allscript')!!}/js/badges.js"></script>

<script src="https://cdn.plyr.io/3.3.10/plyr.js"></script>
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