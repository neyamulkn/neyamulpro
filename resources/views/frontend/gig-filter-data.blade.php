
@if(count($get_gigs)>0)
<!-- HEADLINE -->
<div class="headline primary">
    <h4>{{$get_gigs->total()}} Products Found</h4>
    <form id="shop_filter_form" name="shop_filter_form">
        <span style="display: inline-block; float: left; padding: 8px">
            Sort by: 
        </span>
        <label for="gig_asc" class="select-block">
            <select name="gig_sort" id="gig_asc">
                <option value="ASC">Price (Low to High)</option>
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


<!-- PRODUCT SHOWCASE -->
<div class="product-showcase">
    <!-- PRODUCT LIST -->
    <div class="product-list grid column3-4-wrap">

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
                        <a href="<?php echo url($show_gig->username.'/'.$show_gig->gig_url); ?>" target="_blank">
                            <div class="circle tiny primary">
                                <span class="icon-tag"></span>
                            </div>
                        </a>
                        <a href="<?php echo url('marketplace/'.$show_gig->gig_url); ?>" target="_blank">
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
                    <p class="category primary">
                        <?php 
                        if($show_gig->gig_payment_type == "monthly"){
                         echo '<span style="color:red">'.ucfirst($show_gig->gig_payment_type). '</span>';
                        }else{
                            echo ucfirst($show_gig->gig_payment_type). ' Price';
                        }
                        ?>
                    </p>
                </a>
                <p class="price"><span>$</span><?php echo $show_gig->basic_p; ?> </p>
            </div>
            <!-- /PRODUCT INFO -->
            <hr class="line-separator">

            <!-- USER RATING -->
            <div class="user-rating">
                <a href="<?php echo url($show_gig->username); ?>" target="_blank">
                    <figure class="user-avatar small user_image">
                        <img src="<?php echo asset('/image/'.$show_gig->user_image); ?>">
                    </figure>
                </a>
                <a href="<?php echo url($show_gig->username); ?>" target="_blank">
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
   <!-- /gig LIST -->
            
</div>

<!-- /gig SHOWCASE -->

<!-- PAGER -->
<div class="page primary paginations">
   {{$get_gigs->links()}}
</div>
<!-- /PAGER -->
@else
<h1 style="color:#000;">No record found.!</h1>

@endif