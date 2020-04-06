<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AffiliateAddsController extends Controller
{
    public function index(Request $request)
    {

    	if ($request->hotlancer_type == "themeplace") {
    		if ($request->hotlancer_column == 1) {
                $column_1 = 1;
            }
            if ($request->hotlancer_column == 2) {
                $column_1 = 2;
            }
            if ($request->hotlancer_column == 3) {
                $column_1 = 3;
            }
            if ($request->hotlancer_column == 4) {
                $column_1 = 4;
            }
            if ($request->hotlancer_column == 5) {
                $column_1 = 5;
            }
            if ($request->hotlancer_column == 6) {
                $column_1 = 6;
            }
            if ($request->hotlancer_column == 7) {
                $column_1 = 7;
            }
            if ($request->hotlancer_column == 8) {
                $column_1 = 8;
            }
            if ($request->hotlancer_column == 9) {
                $column_1 = 9;
            }
            if ($request->hotlancer_column == 10) {
                $column_1 = 10;
            }
            if ($request->hotlancer_column == 11) {
                $column_1 = 11;
            }
            if ($request->hotlancer_column == 12) {
                $column_1 = 12;
            }
            $ref_name = $request->hotlancer_ref;
    		
            $get_theme = DB::table('themes')
                ->limit($request->product_count)
                ->inRandomOrder()->get();

    		return view('themeplace', compact('get_theme','column_1','ref_name'));
    	}
    	if ($request->hotlancer_type == "marketplace") {
    		if ($request->hotlancer_column == 1) {
    			$column_1 = 1;
    		}
    		if ($request->hotlancer_column == 2) {
    			$column_1 = 2;
    		}
    		if ($request->hotlancer_column == 3) {
    			$column_1 = 3;
    		}
    		if ($request->hotlancer_column == 4) {
    			$column_1 = 4;
    		}
    		if ($request->hotlancer_column == 5) {
    			$column_1 = 5;
    		}
    		if ($request->hotlancer_column == 6) {
    			$column_1 = 6;
    		}
    		if ($request->hotlancer_column == 7) {
    			$column_1 = 7;
    		}
    		if ($request->hotlancer_column == 8) {
    			$column_1 = 8;
    		}
    		if ($request->hotlancer_column == 9) {
    			$column_1 = 9;
    		}
    		if ($request->hotlancer_column == 10) {
    			$column_1 = 10;
    		}
    		if ($request->hotlancer_column == 11) {
    			$column_1 = 11;
    		}
    		if ($request->hotlancer_column == 12) {
    			$column_1 = 12;
    		}
    		$ref_name = $request->hotlancer_ref;
    	    $products = DB::table('gig_basics')
                ->leftJoin('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->leftJoin('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->select('gig_basics.*', 'gig_prices.basic_p', 'gig_images.image_path')
                ->limit($request->product_count)
                ->inRandomOrder()
                ->get();
    		return view('marketplace',compact('products','column_1','ref_name'));
    
    	}
    	if ($request->hotlancer_type == "workplace") {
    		if ($request->hotlancer_column == 1) {
    			$column_1 = 1;
    		}
    		if ($request->hotlancer_column == 2) {
    			$column_1 = 2;
    		}
    		if ($request->hotlancer_column == 3) {
    			$column_1 = 3;
    		}
    		if ($request->hotlancer_column == 4) {
    			$column_1 = 4;
    		}
    		if ($request->hotlancer_column == 5) {
    			$column_1 = 5;
    		}
    		if ($request->hotlancer_column == 6) {
    			$column_1 = 6;
    		}
    		if ($request->hotlancer_column == 7) {
    			$column_1 = 7;
    		}
    		if ($request->hotlancer_column == 8) {
    			$column_1 = 8;
    		}
    		if ($request->hotlancer_column == 9) {
    			$column_1 = 9;
    		}
    		if ($request->hotlancer_column == 10) {
    			$column_1 = 10;
    		}
    		if ($request->hotlancer_column == 11) {
    			$column_1 = 11;
    		}
    		if ($request->hotlancer_column == 12) {
    			$column_1 = 12;
    		}
    		$ref_name = $request->hotlancer_ref;
    		$get_jobs = DB::table('jobs')
                ->limit($request->product_count)
                ->inRandomOrder()->get();

    		return view('workplace',compact('get_jobs','column_1','ref_name'));
    	}
    
    }

    public function affiliate_code(Request $request){
       
        $code = '';
        $data = [
            'ref_username' => $request->username,
            'platform_type' => $request->platform_type,
            'view_product' => $request->total_product,
            'column' => $request->column,
            'popup' => $request->popup
        ];

        DB::table('affiliate_ads')->insert($data);
        
        $code = ' <xmp><script src="http://localhost:8000/affiliate.js"
    class="affiliatebyhotlancer"
    style="display:inline-block"
    data-hotlancer-ref="'.$request->username.'"
    data-hotlancer-count="'.$request->total_product.'"
    data-hotlancer-column="'.$request->column.'"
    data-hotlancer-popup="'.$request->popup.'"
    data-hotlancer-type="'.$request->platform_type.'">
</script></xmp>';
    echo $code;
    }

    public function affiliate_program(){
        $ref_username = Auth::user()->username;
        $get_ref_info = DB::table('ref_counts')
         ->select(
            'created_at',
            DB::raw("SUM(total_view) as total_view"),
            DB::raw("SUM(total_item) as total_item"),
            DB::raw("SUM(ref_earning ) as ref_earning")
         )
        ->where('ref_username', $ref_username)

        ->groupBy(DB::raw("MONTH(created_at)"))
        ->get();
        return view('backend/affiliate')->with('get_ref_info', $get_ref_info );
    }
    
}
