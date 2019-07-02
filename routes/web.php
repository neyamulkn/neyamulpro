<?php

Route::get('/', function () {

    return view('frontend/index');
});

Auth::routes();

Route::get('dashboard/profile/setting', 'userinfoController@profile_setting');

Route::post('/checkemail', 'userinfoController@check_email');
Route::post('/profile/update', 'userinfoController@update');
Route::post('/location/update', 'userinfoController@location_update');
Route::post('/experience/update', 'userinfoController@experience_update');
Route::post('/skillTags/update', 'userinfoController@skillTags_update');
Route::post('/user/image/upload', 'userinfoController@user_image');

Route::get('stripe', 'GigOrderController@stripe');
Route::post('stripe', 'GigOrderController@stripePost')->name('stripe.post');


//theme category & filter 
Route::group(['prefix'=> 'dashboard/theme'],  function(){

	Route::get('/category', 'superAdminController@theme_category');
	Route::post('create_theme_category', 'superAdminController@create_theme_category');

	// insert sub category
	Route::get('/subcategory', 'superAdminController@theme_subcategory');
	Route::post('/subcategory', 'superAdminController@create_theme_subcategory');

	// insert sub child category
	Route::get('/subchildcategory', 'superAdminController@theme_subchildcategory');
	Route::post('/subchildcategory', 'superAdminController@create_theme_subchildcategory');

	/// filter theme
	Route::get('filter/', 'filterController@theme_filter'); // filter
	Route::post('filter/', 'filterController@insert_theme_filter'); // filter

	/// sub filter theme
	Route::get('subfilter/', 'filterController@theme_subfilter'); // filter
	Route::post('subfilter/', 'filterController@insert_theme_subfilter'); // filter


	Route::get('/upload/', 'themeController@index');
	Route::post('/upload/', 'themeController@insert_theme');
	Route::get('/upload/form/', 'themeController@theme_upload');

});

// Themeplace route 

Route::group(['prefix'=> 'themeplace'],  function(){
	Route::get('/{category}/{subcategory}', 'themefrontController@theme_view');
	Route::get('/item/{theme_url}/{theme_id?}', 'themefrontController@theme_details');
	// left sitebar filter
	Route::post('/{category}/{subcategory}', 'gighomeController@theme_filter');

	//add to cart added
	Route::post('/cart/', 'AddToCartController@theme_cart');
	// view cart
	Route::get('/cart/', 'AddToCartController@view_cart');
	// delete cart
	Route::get('/cart/delete/{id}', 'AddToCartController@theme_delete_cart');
	
	Route::post('/checkout', 'themefrontController@theme_checkout');
	Route::get('/payment/completed/paypal', 'themefrontController@payment_success');
	Route::get('/downloads/', 'themefrontController@theme_download');
	Route::get('/download_file/bytheme_id/{theme_id}', 'themefrontController@download_file');
	Route::post('/review/', 'themefrontController@review');

});


//workplace category & filter 
Route::group(['prefix'=> 'dashboard/workplace'],  function(){

	Route::get('/category', 'superAdminController@workplace_category');
	Route::post('category', 'superAdminController@create_workplace_category');

	Route::get('category/edit/{id}', 'superAdminController@workplace_category_edit');
	Route::get('category/delete/{id}', 'superAdminController@workplace_category_delete');

	// insert sub category
	Route::get('/subcategory', 'superAdminController@workplace_subcategory');
	Route::post('/subcategory', 'superAdminController@create_workplace_subcategory');

	
	/// filter 
	Route::get('filter/', 'filterController@workplace_filter'); // filter
	Route::post('filter/', 'filterController@insert_workplace_filter'); // filter

	/// sub filter 
	Route::get('subfilter/', 'filterController@workplace_subfilter'); // filter
	Route::post('subfilter/', 'filterController@insert_workplace_subfilter'); // filter



	// upload job 
	Route::get('/job-post/{post_id?}', 'WorkplaceController@job_post');
	// get sub category for upload job
	Route::get('/get_subcategory/{id}', 'WorkplaceController@get_subcategory');
	Route::post('/job-post/insert', 'WorkplaceController@insert_job_post');
	
	Route::get('/job-post/{post_id}/step/2', 'WorkplaceController@job_post_second');
	Route::post('/job-post/insert/step_second', 'WorkplaceController@insert_job_step_second');


	Route::get('/job-post/{post_id}/step/3', 'WorkplaceController@job_post_third');
	Route::post('/job-post/insert/step_third', 'WorkplaceController@insert_job_step_third');

	Route::get('/job-post/{post_id}/step/4', 'WorkplaceController@job_post_four');
	Route::post('/job-post/insert/step_four', 'WorkplaceController@insert_job_step_four');

	Route::get('/job-post/{post_id}/step/5', 'WorkplaceController@job_post_five');
	Route::post('/job-post/insert/step_five', 'WorkplaceController@insert_job_step_five');

	Route::get('/job-post/{post_id}/step/6', 'WorkplaceController@job_post_six');
	Route::post('/job-post/insert/step_six', 'WorkplaceController@insert_job_step_six');	

	Route::get('/job-post/{post_id}/step/7', 'WorkplaceController@job_post_seven');
	Route::post('/job-post/insert/step_seven', 'WorkplaceController@insert_job_step_seven');

	Route::get('/job-list/', 'WorkplaceController@job_list');
	Route::get('/proposals-list/{job_id}', 'WorkplaceController@proposals_list');

	Route::get('/applicant-hire/{job_id}/{applicant_id}', 'WorkplaceController@applicant_hire');


	Route::post('/job-post/', 'WorkplaceController@insert_job');
	

});

// workplace route

Route::group(['prefix' => 'workplace'], function(){
	Route::get('/', 'WorkplaceHomeController@workplace');
	Route::get('/{job_url}', 'WorkplaceHomeController@job_details');

	Route::get('/proposal/{job_url}', 'WorkplaceController@submit_proposal');
	Route::post('/insert-proposal', 'WorkplaceController@insert_proposal');
	
});





// insert main category
Route::get('dashboard/gig-category', 'superAdminController@gig_category');
Route::post('dashboard/create-gig-category', 'superAdminController@create_gig_category');
// insert sub category
Route::get('dashboard/gig-subcategory', 'superAdminController@gig_subcategory');
Route::post('dashboard/create-gig-subcategory', 'superAdminController@create_gig_subcategory');
// insert gig meta data
Route::get('dashboard/gig-metadata', 'superAdminController@gig_metadata');
Route::post('dashboard/gig-metadata', 'superAdminController@insert_metadata');

/// filter route
Route::get('/dashboard/filter/', 'filterController@show_filer_page'); // filter
Route::post('/dashboard/filter/', 'filterController@insert_filter'); // filter

//message inbox
Route::get('/dashboard/inbox/{username?}', 'messageController@inbox');
Route::get('/dashboard/getmessages/{id}', 'messageController@getmessages');

Route::get('dashboard/gig-pricescope', 'superAdminController@gig_pricescope');
Route::post('dashboard/gig-pricescope', 'superAdminController@insert_pricescope');

Route::post('/get_subcategory', 'gigController@get_subcategory'); //get sub category for gig
Route::post('/get_medata', 'gigController@get_medata'); //get sub category for gig

Route::get('/dashboard/create-gig', 'gigController@create_gig'); // view gig page
Route::post('/dashboard/create-gig', 'gigController@insert_gig'); // insert gig 1st step
Route::get('/dashboard/create-gig/{step}/{title?}', 'gigController@gig_step'); // update gig

Route::post('/dashboard/create-gig/second', 'gigController@insert_gig_step_second'); // insert gig step 2nd
Route::post('/dashboard/create-gig/third', 'gigController@insert_gig_step_third'); // insert gig step 3rd
Route::post('/dashboard/create-gig/fourth', 'gigController@insert_gig_step_fourth'); // insert gig step 4th
Route::post('/dashboard/create-gig/five', 'gigController@insert_gig_step_five'); // insert gig step 5th
Route::post('/dashboard/create-gig/finish', 'gigController@insert_gig_step_finish'); // insert gig step finish

Route::get('dashboard/manage-gigs/{status}', 'gigController@manage_gigs');
Route::get('dashboard/get_gigs_by_status/{status}', 'gigController@get_gigs_by_status');

Route::post('/dashboard/create/price', 'gigController@insert_price'); // update gig

Route::get('/image-upload/{id}', 'gigController@image_upload'); // update gig

//question_answer delete
Route::post('/question_answer/delete', 'gigController@question_answer_delete'); // question_answer_delete gig

//error page
Route::get('/hotlancer/error', function(){
	// $user = Auth::user();
 //        $userinfo = Auth::user()->userinfo;
	return view('backend.error');
});

//frontend

Route::get('/marketplace', 'gighomeController@marketplace');
Route::get('/themeplace', 'themefrontController@themeplace');



Route::get('/{id}', 'profileController@profile_view');

Route::get('/marketplace/{category}/{subcategory}', 'gighomeController@gig_view');
Route::get('gig/{user_name}/{gig_url}', 'gighomeController@gig_details');

Route::post('/gig/{category}/{subcategory}', 'gighomeController@gig_filter');

// order 
Route::post('/order/add_card/', 'GigOrderController@add_to_cart'); // add to cart
Route::get('/delete/add_to_cart/{cart_id}', 'GigOrderController@delete_cart'); // delete add to cart

Route::get('/order/checkout/{cart_id}', 'GigOrderController@order_checkout'); // view order details
Route::post('/order/placeorder/payment/', 'GigOrderController@placeorder_payment'); // order & payment

Route::get('/order/placeorder/card/', 'GigOrderController@card'); // stripe payment

Route::post('/order/placeorder/stripe_payment/', 'GigOrderController@stripe_payment'); // stripe payment

// order & payment
Route::get('/order/payment/success', 'GigOrderController@payment_success'); 
Route::get('/order/payment/cancel', 'GigOrderController@payment_cancel'); 
// order requirements
Route::get('/order/requirements/{order_id}', 'GigOrderController@order_requirements'); 

Route::post('/order/requirements/{order_id}', 'GigOrderController@insert_order_requirements'); // order requirements
Route::get('/order/started/{order_id}', 'GigOrderController@order_started'); // order requirements
 // order review for buyer
Route::get('/order/review/{order_id}', 'GigOrderController@order_review');
// order completed

Route::post('/order/completed/{order_id}', 'GigOrderController@order_completed');
Route::get('/order/completed/{order_id}', 'GigOrderController@order_review');
Route::get('/order/feadback/{order_id}', 'GigOrderController@feadback');
Route::post('/order/feadback/{order_id}', 'GigOrderController@insert_feadback');

Route::get('/order/payment/{order_id}', 'GigOrderController@order_payment'); // 

// manage seller order
Route::get('dashboard/{username}/manage/seller_order/{status?}', 'GigOrderController@manage_seller_order'); 
// get seller order by status
Route::get('dashboard/manage/get_seller_orders/{status}', 'GigOrderController@get_seller_orders_by_status'); 
// get order details
Route::get('dashboard/{username}/manage/order/{order_id}', 'GigOrderController@manage_order_details'); 
// order deliver 
Route::post('dashboard/order/deliver/{order_id}', 'GigOrderController@order_deliver'); 

// buyer 
Route::get('dashboard/{username}/manage/buyer_order/{status?}/', 'GigOrderController@manage_buyer_order'); 
// get_orders_by_status
Route::get('dashboard/manage/get_buyer_orders/{status}', 'GigOrderController@get_orders_by_status'); 

Route::get('dashboard/{username}/manage/buyer_order_details/{order_id}', 'GigOrderController@buyer_order_details'); // all orders



//Earnings 
Route::get('dashboard/earnings/balance', 'earningController@earnings_view'); 

// affiliate program

Route::get('dashboard/affiliate/program', 'affiliateController@affiliate_program'); 
// Referell
Route::get('/categories/{category}/{subcategory}/{ref?}/{user_id?}', 'gighomeController@gig_view');
