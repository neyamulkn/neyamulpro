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
use App\User;
use App\ref_count;
use DB;
use Session;
use Illuminate\Support\Facades\Input;

class gighomeController extends Controller
{


    public function marketplace(){

        $get_category = DB::table('gig_home_category')->get();
        return view('frontend.gigs')->with(compact('get_category'));
    }


    public function gig_view(Request $request){

        $get_filters = DB::table('gig_subcategories')
        ->join('filter_subcategories', 'gig_subcategories.id', 'filter_subcategories.subcategory_id')
        ->join('filters', 'filter_subcategories.filter_id', 'filters.filter_id')
        ->where('gig_subcategories.subcategory_url', $request->subcategory)
        ->groupBy('filter_subcategories.filter_id')->get();

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
             $get_gigs = $get_gigs->where('gig_basics.gig_payment_type',  $request->payment);  
        }
        $src = Input::get('item');
        if(Input::has('item') && !empty(Input::get('item'))){
            $get_gigs =  $get_gigs->where('gig_basics.gig_title', 'LIKE', '%'.$src.'%');
            $get_gigs =  $get_gigs->orWhere('gig_basics.gig_search_tag', 'LIKE', '%'.$src.'%');
        }

        // if(isset($request->delivery)){
        //     $get_gigs->whereBetween('gig_prices.delivery_time_p',  array($request->delivery));  
        // }

        if(isset($request->tags)){
            if(!is_array($request->tags)){ // direct url tags
                 $tags = explode(',', $request->tags);
             }else{ // filter by ajax
                $tags = implode(',', $request->tags);
             }
           
            $get_tags = gig_metadata_filter::whereIn('metadata_id', [$tags])->get();    

            foreach ($get_tags as $show_tags){
               $array[] = $show_tags->gig_id;
            }
            $get_gigs = $get_gigs->whereIn('gig_basics.gig_id', $array);
        }

        if(isset($request->gig_sort)){
            $get_gigs = $get_gigs->orderBy('basic_p', $request->gig_sort);
        }
        
        $get_gigs = $get_gigs->paginate(3);

        if(!isset($_GET['filter'])){
            return view('frontend.gigs-categories')->with(compact('get_gigs', 'get_filters'));
        }else{
            echo view('frontend.gig-filter-data')->with(compact('get_gigs'));
        }
       

    }



    public function gig_details($gig_url){

        
        $get_gig_info = gig_basic::where('gig_url', $gig_url)
        ->leftJoin('gig_home_category','gig_basics.category_name', 'gig_home_category.id')
        ->leftJoin('gig_subcategories','gig_basics.gig_subcategory', 'gig_subcategories.id')
        ->first();
        $get_user_info = user::where('id', $get_gig_info->gig_user_id)->first();
        // refferel_user_name
        if(isset($_GET['ref']) && !Session::has('refferel_user_name')){

            $get_ads = DB::table('affiliate_ads')->where('ref_username', $_GET['ref'])->first();
           
            if($get_ads){
                DB::table('affiliate_ads')->where('ref_username', $_GET['ref'])->increment('total_view');
            }else{
                $data = [
                    'ref_username' => $_GET['ref'],
                    'platform_type' => 'marketplace',
                    'total_view' => 1
                ];
                DB::table('affiliate_ads')->insert($data); 
            }
            Session::put('refferel_user_name', $_GET['ref']);  
        }

        if($get_gig_info){
            $gig_id = $get_gig_info->gig_id;
          
            // if exist gig view table
            $get_info = DB::table('gigs_view')->where('gig_id', $gig_id)->first();
            if($get_info){ DB::table('gigs_view')->where('gig_id', $gig_id)->update([
                    'gig_impress' => $get_info->gig_impress+1,
                    'gig_click' => $get_info->gig_click+1,
                    'gig_view' => $get_info->gig_view+1,
                ]);
            }
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














}
