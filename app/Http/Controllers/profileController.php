<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\theme;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
class profileController extends Controller
{
    public function profile_view($username){
    	
        $userinfo = User::with('userinfo')->where('username', $username)->first();
 
    	if($userinfo){
    		
    		return view('frontend.profile')->with(compact('userinfo'));
    	}else{
    		return Redirect('/');
    	}
    }

    public function userProtfolio(Request $request){
        $data = [];
        $username = $request->username;
        $data['userinfo'] = user::where('username', $username)->first();

        if ($request->platform == 'workplace') {
           $data['get_jobs'] = DB::table('jobs')
                        ->join('users', 'jobs.user_id', '=', 'users.id')
                        ->where('users.username', $username)
                        ->where('jobs.status', 'active')
                        ->orderBy('job_id', 'DESC')->paginate(15);
            return view('frontend.workplace.profile-workplace')->with($data);
        }
        elseif($request->platform == 'marketplace'){
            $data['get_gigs'] = DB::table('gig_basics')
                            ->leftJoin('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                            ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                            ->leftJoin('users', 'gig_basics.gig_user_id', '=', 'users.id')
                            ->leftJoin('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                            ->leftJoin('gig_home_category', 'gig_basics.category_name', '=', 'gig_home_category.id')
                            ->leftJoin('gig_subcategories', 'gig_basics.gig_subcategory', '=', 'gig_subcategories.id')
                            ->where('users.username', $username)
                            ->where('gig_basics.gig_status', 'active')
                            ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path', 'users.username', 'users.name', 'userinfos.user_image')->paginate(15);
            return view('frontend.profile-marketplace')->with($data);


        }elseif($request->platform == 'themeplace'){
            $data['get_theme_info'] = theme::with(['orders', 'theme_review', 'comments'])
                ->leftJoin('users', 'themes.user_id', 'users.id')
            ->leftJoin('userinfos', 'themes.user_id', '=', 'userinfos.user_id')
            ->leftJoin('theme_category', 'themes.category_id', 'theme_category.id')
            ->leftJoin('theme_subcategory', 'themes.sub_category', 'theme_subcategory.id')
            ->leftJoin('theme_filters', 'themes.category_id', 'theme_filters.category_id')
            ->leftJoin('theme_features', 'themes.theme_id', '=', 'theme_features.theme_id')
            ->select('themes.*', 'theme_category.category_name', 'users.name', 'userinfos.user_image', 'users.id', 'users.username', 'theme_subcategory.subcategory_name')
            
            ->where('users.username', $username)
            ->where('themes.status','active')
            ->groupBy('themes.theme_id')->paginate(15);
           
            return view('frontend.theme.profile-theme')->with($data);
        }else{
            return Redirect('/');
        }

    }
}
