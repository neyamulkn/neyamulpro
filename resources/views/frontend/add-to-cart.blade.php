<?php 

        $user_id = Auth::user()->id;
        $get_cart_details = DB::table('add_to_carts')->where('user_id', $user_id)->get();

       


        if($get_cart_details){

        foreach ($get_cart_details as $get_cart) {
            $get_gigs = DB::table('gig_basics')
                ->join('gig_prices', 'gig_basics.gig_id', '=', 'gig_prices.gig_id')
                ->Join('gig_images', 'gig_basics.gig_id', '=', 'gig_images.gig_id')
                ->Join('users', 'gig_basics.gig_user_id', '=', 'users.id')
                //->Join('userinfos', 'gig_basics.gig_user_id', '=', 'userinfos.user_id')
                ->select('gig_basics.*', 'gig_prices.*', 'gig_images.image_path', 'users.username', 'users.name')
                ->where([
                    ['gig_basics.gig_id', '=', $get_cart->gig_id],
                    ['users.id', '=', $get_cart->gig_user_id],
                ])->first();

                $data = [
                    'get_gigs' => $get_gigs,
                   // 'package' => $package
                ];

                if($get_cart->package_name == 'basic'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_basic', 'Yes')->get();
                    $package = [
                        
                        'gig_title' => $get_gigs->gig_title,
                        'gig_images' => $get_gigs->image_path,
                        'package_title' => $get_gigs->basic_title,
                        'package_dsc' => $get_gigs->basic_dsc,
                        'delivery_time' => $get_gigs->delivery_time_b,
                        'price' => $get_gigs->basic_p ,
                    ];
                }

                if($get_cart->package_name == 'plus'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_plus', 'Yes')->get();
                    $package = [
                        
                        'gig_title' => $get_gigs->gig_title,
                        'gig_images' => $get_gigs->image_path,
                        'package_title' => $get_gigs->plus_title,
                        'package_dsc' => $get_gigs->plus_dsc,
                        'delivery_time' => $get_gigs->delivery_time_p,
                        'price' => $get_gigs->plus_p,
                    ];
                }

                if($get_cart->package_name == 'super'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_super', 'Yes')->get();
                    $package = [
                        
                        'gig_title' => $get_gigs->gig_title,
                        'gig_images' => $get_gigs->image_path,
                        'package_title' => $get_gigs->super_title,
                        'package_dsc' => $get_gigs->super_dsc,
                        'delivery_time' => $get_gigs->delivery_time_s,
                        'price' => $get_gigs->super_p,
                    ];
                }

                if($get_cart->package_name == 'platinum'){
                    $gig_features = DB::table('gig_features')->where('gig_id', $get_gigs->gig_id)->where('feature_platinum', 'Yes')->get();
                    $package = [
                        
                        'gig_title' => $get_gigs->gig_title,
                        'gig_images' => $get_gigs->image_path,
                        'package_title' => $get_gigs->platinum_title,
                        'package_dsc' => $get_gigs->platinum_dsc,
                        'delivery_time' => $get_gigs->delivery_time_pm,
                        'price' => $get_gigs->platinum_p,
                    ];
                }


                $data = [
                    'package' => $package,
                    'gig_features' =>  $gig_features
                ];
            }
?>