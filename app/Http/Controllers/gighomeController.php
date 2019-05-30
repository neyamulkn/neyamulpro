<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gig_basic;
use App\gig_price;
use App\gig_feature;
use App\question_answer;
use App\gig_image;
use App\gig_home_category;
use App\gig_subcategory;
use App\filter_subcategory;
use App\gig_metadata_filter;
use App\user;
use App\ref_count;
use DB;
use Session;

class gighomeController extends Controller
{
    public function gig_view($category, $subcatery){

		
		$get_subcategory_id = gig_subcategory::where('subcategory_url', $subcatery)->first();
		if($get_subcategory_id){

			//$get_gig_basic = gig_basic::where('gig_subcategory', $get_subcategory_id->id)->where('gig_status', 'active')->paginate(3); 

			// get filter id for leftsite bar
			$get_filter_id = filter_subcategory::select('filter_id')->where('subcategory_id', $get_subcategory_id->id)->get();

			$alldata = [
				//'get_gig_basic' => $get_gig_basic,
				'get_filter_id' => $get_filter_id,
			];
			return view('frontend.gigs-categories')->with($alldata);

		}
    }

    public function gig_details($user_name, $gig_url){

    	$get_user_info = user::where('username', $user_name)->first();
        $get_gig_info = gig_basic::where('gig_url', $gig_url)->first();

    	// refferel_user_name
        if(isset($_GET['ref'])){
            Session::put('refferel_user_name', $_GET['ref']);

            ref_count::create([
                'ref_username' => $_GET['ref'],
                'total_view' => 1,
                'total_item' => 0,
                'ref_earning' => 0,
            ]);
            
        }
    	if($get_user_info and $get_gig_info){
    		$gig_id = $get_gig_info->gig_id;

            // if exist gig view table
            $get_info = DB::table('gigs_view')->where('gig_id', $gig_id)->first();
            if($get_info){ DB::table('gigs_view')->where('gig_id', $gig_id)->update([
                'gig_impress' => $get_info->gig_impress+1,
                'gig_click' => $get_info->gig_click+1,
                'gig_view' => $get_info->gig_view,
            ]);}
            else{  DB::table('gigs_view')->insert(['gig_id' => $gig_id, 'gig_impress' => 1] );  }

            $get_gig_price = gig_price::where('gig_id', $gig_id)->first();
            $get_gig_feature = gig_feature::where('gig_id', $gig_id)->get();
            $get_question_answer = question_answer::where('gig_id', $gig_id)->get();
    		$get_feedback = DB::table('feedback')
                        ->leftjoin('users', 'feedback.buyer_id', 'users.id')
                        ->leftjoin('userinfos', 'feedback.buyer_id', 'userinfos.user_id')
                       
                        ->where('gig_id', $gig_id)->get();

            $get_gig_image = gig_image::where('gig_id', $gig_id)->get();

    		$alldata = [
    			'get_user_info' => $get_user_info,
                'get_gig_info' => $get_gig_info,
    			'get_gig_image' => $get_gig_image,
                'get_gig_price' => $get_gig_price,
                'get_gig_feature' => $get_gig_feature,
                'get_question_answer' => $get_question_answer,
    			'get_feedback' => $get_feedback,
    		];
    		return view('frontend.gig-details')->with($alldata);
           

    	}else{
    		return redirect('/');
    	}
    	
    }


    public function gig_filter(Request $request)
    {
     
       $get_gigs = DB::table('gig_basics')
            ->join('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
            ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
            ->leftJoin('users', 'gig_basics.gig_user_id', '=', 'users.id')
            ->leftJoin('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
            ->leftJoin('gig_home_category', 'gig_basics.category_name', '=', 'gig_home_category.id')
            ->leftJoin('gig_subcategories', 'gig_basics.gig_subcategory', '=', 'gig_subcategories.id')
            ->where('gig_home_category.category_url', $request->category)
            ->where('gig_subcategories.subcategory_url',  $request->subcategory)
            ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path', 'users.username', 'users.name', 'userinfos.user_image')
            ->groupby('gig_basics.gig_id');

        if(isset($request->payment)){
            $get_gigs->where('gig_basics.gig_payment_type',  $request->payment);  
        }

        // if(isset($request->delivery)){
        //     $get_gigs->whereBetween('gig_prices.delivery_time_p',  array($request->delivery));  
        // }

        if(isset($request->metadata)){
            $metadata = implode(',', $request->metadata);
            $get_metadata = gig_metadata_filter::whereIn('metadata_id', [$metadata])->get();    

            foreach ($get_metadata as $show_metadata){
               $array[] = $show_metadata->gig_id;
            }
            $get_gigs = $get_gigs->whereIn('gig_basics.gig_id', $array);
        }

        if(isset($request->gig_sort)){
             $get_gigs = $get_gigs->orderBy('basic_p', $request->gig_sort);
        }

        $get_gigs = $get_gigs->paginate(3);

        if($get_gigs){
            echo '<!-- PRODUCT SHOWCASE -->
                    <div class="product-showcase">
                        <!-- PRODUCT LIST -->
                        <div class="product-list grid column3-4-wrap">';
      
            foreach($get_gigs as $show_gig){
                ?>
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
                                            <a href="<?php echo url($show_gig->username.'/'.$show_gig->gig_url); ?>" target="_blank">
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
                                    <a href="<?php echo url($show_gig->username.'/'.$show_gig->gig_url); ?>">
                                        <p class="text-header">I will <?php echo $show_gig->gig_title; ?></p>
                                    </a>
                                    <p class="product-description">Lorem ipsum dolor sit urarde...</p>
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
            <?php 
                }
                echo '</div>
                       <!-- /gig LIST -->
                                
                </div>

                <!-- /gig SHOWCASE -->
            
                <!-- PAGER -->
                <div class="page primary paginations">
                   '. $get_gigs->links() .'
                </div>
                <!-- /PAGER -->';
        }
    }
}
