@extends('frontend.layouts.master')
@section('title', 'Hotlancer')

@section('css')
    <link rel="stylesheet" href="{{ asset('allscript/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('allscript/css/vendor/tooltipster.css') }}">
    <link rel="stylesheet" href="{{ asset('allscript/css/vendor/owl.carousel.css') }}">

@endsection

@section('content')
    <!-- /MAIN MENU -->
    <div class="banner-wrap">
        <section class="banner banner-v2">
            <h5>Register now and start </h5>
            <h1><span>Gig Find Search</span></h1>

            <form class="search-widget-form">
                <input type="text" name="category_name" placeholder="Search goods or services here...">
                <label for="categories" class="select-block">
                    <select name="categories" id="categories">
                        <option value="0">All Categories</option>
                        @foreach($get_category as $show_category)
                            <option value="{{$show_category->category_url}}">{{$show_category->category_name}}</option>
                        @endforeach
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
                <button class="button medium primary">Search Now!</button>
            </form>
        </section>
    </div>
    <!-- PRODUCT SIDESHOW -->
    <div id="product-sideshow-wrap">
        <div id="product-sideshow">
            <!-- PRODUCT SHOWCASE -->
        <?php $i = 1; ?>
        @foreach($get_category as $show_category)
            <?php
                $get_gigs = DB::table('gig_basics')
                ->leftJoin('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->leftJoin('users', 'gig_basics.gig_user_id', '=', 'users.id')
                ->leftJoin('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->leftJoin('gig_home_category', 'gig_basics.category_name', '=', 'gig_home_category.id')
                ->leftJoin('gig_subcategories', 'gig_basics.gig_subcategory', '=', 'gig_subcategories.id')
                ->where('gig_home_category.category_name', $show_category->category_name)
                ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path', 'users.username', 'users.name', 'userinfos.user_image')
                ->limit(8)
                ->inRandomOrder()
                ->get();

            ?>
            @if(count($get_gigs)>0)
            <!-- PRODUCT SHOWCASE -->
            <div class="product-showcase">
                <!-- HEADLINE -->
                <div class="headline secondary">
                    <h4>{{$show_category->category_name}}</h4>
                    <!-- SLIDE CONTROLS -->
                    <div class="slide-control-wrap">
                        <div class="slide-control left">
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </div>

                        <div class="slide-control right">
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </div>
                    </div>
                    <!-- /SLIDE CONTROLS -->
                </div>
                <!-- /HEADLINE -->

                <!-- PRODUCT LIST -->
                <div id="pl-{{$i++}}" class="product-list grid column4-wrap owl-carousel">


                @foreach($get_gigs as $show_gig) 
                    <!-- PRODUCT ITEM -->
                    <div class="product-item column">
                                <!-- PRODUCT PREVIEW ACTIONS -->
                                <div class="product-preview-actions">
                                    <!-- PRODUCT PREVIEW IMAGE -->
                                    <figure class="product-preview-image">
                                        
                                        <img src="<?php echo asset('/gigimages/'.$show_gig->image_path); ?>">
                                    </figure>
                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                    <!-- PREVIEW ACTIONS -->
                                    <div class="preview-actions">
                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action">
                                            <a href="{{ route('gig_details', $show_gig->gig_url) }}" target="_blank">
                                                <div class="circle tiny primary">
                                                    <span class="icon-tag"></span>
                                                </div>
                                            </a>
                                            <a href="{{ route('gig_details', $show_gig->gig_url) }}" target="_blank">
                                                <p>Go to Item</p>
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
                                    <a href="<?php echo url('marketplace/'.$show_gig->gig_url); ?>">
                                        <p class="text-header">I will <?php echo $show_gig->gig_title; ?></p>
                                    </a>
                                   
                                    <a href="shop-gridview-v1.html">
                                        <p class="category primary"><?php 
                                        if($show_gig->gig_payment_type == "monthly"){
                                         echo '<span style="color:red">'.ucfirst($show_gig->gig_payment_type). '</span>';
                                        }else{
                                            echo ucfirst($show_gig->gig_payment_type). ' Price';
                                        }

                                        ?></p>
                                    </a>
                                    <p class="price"><span>$</span><?php echo $show_gig->basic_p; ?> </p>
                                </div>
                                <!-- /PRODUCT INFO -->
                                <hr class="line-separator">

                                <!-- USER RATING -->
                                <div class="user-rating">
                                    <a href="{{ route('profile_view', [$show_gig->username]) }}" target="_blank">
                                        <figure class="user-avatar small user_image">
                                            <img src="<?php echo asset('/image/'.$show_gig->user_image); ?>"> 
                                        </figure>
                                    </a>
                                    <a href="{{ route('profile_view', [$show_gig->username]) }}" target="_blank">
                                        <p class="text-header tiny"><?php echo $show_gig->name; ?></p>
                                    </a>
                                    <ul class="rating tooltip" title="Author's Reputation">
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
                    <!-- /PRODUCT ITEM -->

                 @endforeach
                </div>
                <!-- /PRODUCT LIST -->
            </div>
            @endif
            <!-- /PRODUCT SHOWCASE -->
        @endforeach

        </div>
    </div>
    <!-- /PRODUCTS SIDESHOW -->

@endsection

@section('js')
<!-- jQuery -->
<script src="{{ asset('allscript')}}/js/vendor/jquery-3.1.0.min.js"></script>
<!-- Tooltipster -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.tooltipster.min.js"></script>
<!-- Owl Carousel -->
<script src="{{ asset('allscript')}}/js/vendor/owl.carousel.min.js"></script>
<!-- Tweet -->
<script src="{{ asset('allscript')}}/js/vendor/twitter/jquery.tweet.min.js"></script>
<!-- xmAlerts -->
<script src="{{ asset('allscript')}}/js/vendor/jquery.xmalert.min.js"></script>

<!-- Home -->
<script src="{{ asset('allscript')}}/js/home.js"></script>
<!-- Tooltip -->
<script src="{{ asset('allscript')}}/js/tooltip.js"></script>

<!-- Home Alerts -->
<script src="{{ asset('allscript')}}/js/home-alerts.js"></script>
@endsection