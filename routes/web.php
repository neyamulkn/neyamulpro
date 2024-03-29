<?php

// view add page for testing
Route::get('view/add', function(){
	return view('add');
});

Route::get('/','HomeController@index')->name('home');
 //home page
Route::get('search/keyword', 'HomeController@search_keyword')->name('search_keyword');
// suggest search keyword every platform
Route::post('suggest/keyword', 'HomeController@suggest_keyword')->name('suggest_keyword');

Auth::routes();

Route::group(['prefix'=> 'dashboard', 'middleware' => ['auth']], function(){
	Route::get('notifications', 'NotificationController@notifications')->name('notifications');
	Route::get('notifications/read/{id}', 'NotificationController@readNotify')->name('readNotify');

});

Route::get('dashboard', 'userController@dashboard')->name('dashboard');

Route::get('switch/user', 'userController@switchUser')->name('switchUser');

Route::get('adsense/view', 'AdsenseController@index');

Route::get('dashboard/profile/setting', 'UserinfoController@profile_setting')->name('profile_setting');

Route::post('/checkemail', 'UserinfoController@check_email');
Route::post('/profile/update', 'UserinfoController@update');
Route::post('/location/update', 'UserinfoController@location_update');
Route::post('/experience/update', 'UserinfoController@experience_update');
Route::post('/skillTags/update', 'UserinfoController@skillTags_update');
Route::post('/user/image/upload', 'UserinfoController@user_image');

Route::get('stripe', 'GigOrderController@stripe');
Route::post('stripe', 'GigOrderController@stripePost')->name('stripe.post');


Route::group(['prefix'=> 'dashboard/themeplace', 'middleware' => ['auth']],  function(){
 
	Route::get('/upload/', 'themeController@index')->name('upload_theme');
	Route::post('/upload/form/', 'themeController@theme_upload_title')->name('theme_upload_title');
	Route::get('/upload/{url}', 'themeController@theme_upload_form')->name('theme_upload_form');
	Route::get('/child/category', 'themeController@getChild')->name('getChild');
	Route::post('/file/upload', 'themeController@file_upload')->name('file_upload');
	Route::post('/image/upload', 'themeController@image_upload')->name('image_upload');
	Route::post('/upload/', 'themeController@insert_theme')->name('insert_theme');
	Route::get('/manage/{status?}', 'themeController@manage_theme')->name('manage_theme');

	Route::get('change/status', 'themeController@themeStatusCng')->name('themeStatusCng');

	Route::post('/delete', 'themeController@delete_theme')->name('delete_theme');

	Route::get('delete/folder_item', 'themeController@delete_folder_item')->name('delete_folder_item');

});
Route::get('/tags/input/', 'themeController@search_tags')->name('theme_tags');


//Start Themeplace route frontend
Route::group(['prefix'=> 'themeplace'],  function(){
	Route::get('/', 'themefrontController@themeplace');
	Route::post('/theme_show_category', 'themefrontController@theme_show_category'); // show category home page
	Route::get('/search/', 'themefrontController@theme_search')->name('theme_search');

	Route::get('category/{category}/{subcategory}', 'themefrontController@theme_view')->name('theme_category');
	Route::get('item/{theme_url}/{comments?}', 'themefrontController@theme_details')->name('theme_detail');
	
	Route::get('comment/insert', 'themefrontController@comment_insert')->name('comment_insert');
	Route::post('comment/reply/{id}', 'themefrontController@comment_reply')->name('comment_reply');


	//add to cart item
	Route::post('/cart/', 'AddToCartController@theme_cart')->name('theme_cart');
	// view cart
	Route::get('/cart/view', 'AddToCartController@view_cart')->name('theme.view_cart');
	// delete cart
	Route::get('/cart/delete/{id}', 'AddToCartController@theme_delete_cart')->name('themeCartDelete');

	Route::match(array('GET', 'POST'), '/checkout', 'ThemeOrderController@theme_checkout')->name('theme_checkout');

	Route::get('/payment/completed/paypal', 'ThemeOrderController@payment_success')->name('themePaymentSuccess');

	Route::post('/payment/completed/stripe', 'ThemeOrderController@stripe_payment')->name('theme_stripe_payment'); // stripe payment
	Route::get('/downloads', 'themefrontController@theme_download')->name('theme_downloads');
	Route::get('/download_file/bytheme_id/{theme_id}', 'themefrontController@download_file');
	Route::post('/review/', 'themefrontController@review')->name('theme.review');

	//Followings route

	Route::get('following-items', 'FollowingController@index')->name('following.items');
	Route::post('following/store', 'FollowingController@store')->name('following.store');

});

Route::group(['prefix'=> 'dashboard/workplace', 'middleware' => ['auth']],  function(){

	// upload job 
	Route::get('/job-post/{post_slug?}', 'WorkplaceController@job_post')->name('job_post');
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

	Route::get('/job-list/{status?}', 'WorkplaceController@job_list')->name('job_list');
	Route::get('/job/status', 'WorkplaceController@job_status')->name('job_status');


	Route::get('/proposals-list/{slug}', 'JobProposalController@proposals_list');

	Route::get('/applicant-hire/{job_slug}/{applicant_id}', 'JobProposalController@applicant_hire')->name('applicant_hire');

	Route::post('/payment_stripe/', 'WorkplaceController@payment_stripe')->name('payment_stripe.post');
	Route::get('/work-description/{order_id}', 'WorkplaceController@work_description');
	Route::post('/insert-workdsc/', 'WorkplaceController@insert_workdsc');
	// order route
	Route::get('/manage/order/{status?}', 'JobOrderController@job_manage_order')->name('job_manage_order');
	Route::get('/order-details/{order_id}', 'JobOrderController@order_details')->name('job_order_details');
	
	Route::post('/order/quick-response', 'JobOrderController@quick_response')->name('job_quick_response'); 
	Route::post('/order/extratime-cancel', 'JobOrderController@order_timeExtra_cancel')->name('job_order_timeorcancel'); 
	// order deliver 
	Route::post('/order/deliver/{order_id}', 'JobOrderController@order_deliver')->name('job_order_delivery'); 
	Route::post('/revision/order', 'JobOrderController@revision_delivery')->name('job_revision_delivery'); 
	Route::post('/order/completed/{order_id}', 'JobOrderController@order_completed')->name('job_order_completed');
	Route::get('/order/feadback/{order_id}', 'JobOrderController@job_feadback')->name('job_feadback');
	Route::post('/order/feadback/{order_id}', 'JobOrderController@insert_feadback')->name('job_feadback');



});


// workplace frontend route

Route::group(['prefix' => 'workplace'], function(){
	Route::get('/', 'WorkplaceHomeController@index');
	Route::get('category/{category}/{subcategory}', 'WorkplaceHomeController@workplace_category')->name('workplace.cat');
	Route::get('/search', 'WorkplaceHomeController@job_search')->name('job_search');
	Route::post('/{category}/{subcategory}', 'WorkplaceHomeController@get_filter_data');
	Route::get('{job_url}', 'WorkplaceHomeController@job_details')->name('job-details');

	Route::get('proposal/{job_url}', 'JobProposalController@submit_proposal')->name('job_proposal');
	Route::post('job/proposal/create', 'JobProposalController@insert_proposal')->name('apply_job');
	
});


// marketplace dashboard


Route::post('/get_subcategory', 'GigController@get_subcategory'); //get sub category for gig
Route::post('/get_medata', 'GigController@get_medata'); //get sub category for gig
 
Route::get('/dashboard/create-gig', 'GigController@create_gig'); // view gig page
Route::post('/dashboard/create-gig', 'GigController@insert_gig'); // insert gig 1st step
Route::get('/dashboard/create-gig/{url}', 'GigController@gig_step')->name('gig_step'); // update gig

Route::get('/dashboard/create-gig/{url}/second', 'GigController@gig_step_second')->name('gig_step_second');
Route::post('/dashboard/create-gig/{url}/second', 'GigController@insert_gig_step_second')->name('gig_step_second');

Route::get('/dashboard/create-gig/{url}/third', 'GigController@gig_step_third')->name('gig_step_third'); // insert gig step 3rd
Route::post('/dashboard/create-gig/{url}/third', 'GigController@insert_gig_step_third')->name('gig_step_third'); // insert gig step 3rd

Route::get('/dashboard/create-gig/{url}/fourth', 'GigController@gig_step_fourth')->name('gig_step_fourth'); // insert gig step 4th
Route::post('/dashboard/create-gig/{url}/fourth', 'GigController@insert_gig_step_fourth')->name('gig_step_fourth'); // insert gig step 4th
Route::get('/dashboard/create-gig/{url}/five', 'GigController@gig_step_five')->name('gig_step_five'); // insert gig step 5th
Route::post('/dashboard/create-gig/{url}/five', 'GigController@insert_gig_step_five')->name('gig_step_five'); // insert gig step 5th
Route::get('/dashboard/gigimage/delete', 'GigController@gigimage_delete')->name('gigimage_delete'); // insert gig step 5th

Route::get('/dashboard/create-gig/{url}/finish', 'GigController@gig_step_finish')->name('gig_step_finish'); // insert gig step finish
Route::post('/dashboard/create-gig/{url}/finish', 'GigController@insert_gig_step_finish'); // insert gig step finish

Route::get('dashboard/manage-gigs/{status?}', 'GigController@manage_gigs')->name('manage_gigs');

Route::get('gig/change/status', 'GigController@gigStatusCng')->name('gigStatusCng');

Route::post('dashboard/marketplace/gig/delete', 'GigController@gig_delete')->name('gig_delete');

Route::post('/dashboard/create/price', 'GigController@insert_price'); // update gig

Route::get('/image-upload/{id}', 'GigController@image_upload'); // update gig

//question_answer delete
Route::post('/question_answer/delete', 'GigController@question_answer_delete'); // question_answer_delete gig


//message inbox
Route::get('/dashboard/inbox/{username?}', 'MessageController@inbox')->name('inbox');
Route::get('/dashboard/getmessages/{id?}', 'MessageController@getmessages');
Route::post('/dashboard/message/send', 'MessageController@message_send')->name('message.send');

//error page
Route::get('/hotlancer/error', function(){
	// $user = Auth::user();
 //        $userinfo = Auth::user()->userinfo;
	return view('backend.error');
})->name('404');

//frontend 

Route::get('marketplace/', 'gighomeController@marketplace');

Route::get('user/{username}', 'profileController@profile_view')->name('profile_view');
Route::get('user/{username}/{platform}', 'profileController@userProtfolio')->name('userProtfolio');

Route::get('marketplace/category/{category}/{subcategory}', 'gighomeController@gig_view')->name('marketplace_cat');
Route::get('marketplace/search', 'gighomeController@search_gigs')->name('marketplace_search');
Route::get('marketplace/{gig_url}', 'gighomeController@gig_details')->name('gig_details');

Route::post('marketplace/suggest/keyword', 'gighomeController@suggest_keyword')->name('gigs_suggest_keyword');


// order 
Route::post('/order/add_card/', 'GigOrderController@add_to_cart'); // add to cart
Route::get('/delete/add_to_cart/{cart_id}', 'GigOrderController@delete_cart'); // delete add to cart

Route::post('marketplace/order/checkout', 'GigOrderController@order_checkout')->name('gig_checkout'); // view order details
Route::match(array('GET', 'POST'), 'marketplace/order/payment', 'GigOrderController@placeorder_payment')->name('gigOrderPayment'); // order & payment

//all platform order paypal payment
Route::post('/order/purchase/paypal', 'PaymentController@PaymentPaypal')->name('paymentPaypal');
Route::get('/order/purchase/status', 'PaymentController@PaymentStatus')->name('paymentStatus');

Route::get('/order/placeorder/card/', 'GigOrderController@card'); // stripe payment
Route::post('/order/placeorder/stripe_payment/', 'GigOrderController@stripe_payment'); // stripe payment

// order & payment
Route::get('/order/payment/success', 'GigOrderController@payment_success')->name('gigPaymentSuccess'); 
Route::get('/order/payment/cancel', 'GigOrderController@payment_cancel'); 
// order requirements
Route::get('/order/requirements/{order_id}', 'GigOrderController@order_requirements')->name('order_requirement'); 

Route::post('/order/requirements/{order_id}', 'GigOrderController@insert_order_requirements'); // order requirements
Route::get('/order/started/{order_id}', 'GigOrderController@order_started'); // order requirements
 // order review for buyer
Route::get('/order/review/{order_id}', 'GigOrderController@order_review');
// order completed for buyer
Route::post('/order/completed/{order_id}', 'GigOrderController@order_completed');

Route::get('dashboard/marketplace/order/feadback/{order_id}', 'GigOrderController@feadback')->name('gig_feadback');
Route::post('dashboard/marketplace/order/feadback/{order_id}', 'GigOrderController@insert_feadback')->name('gig_feadback');

Route::get('/order/payment/{order_id}', 'GigOrderController@order_payment'); // 

// manage seller order
Route::get('dashboard/marketplace/manage/order/{status?}', 'GigOrderController@manage_order')->name('manage_gig_order'); 
// get seller order by status
Route::get('dashboard/manage/get_seller_orders/{status}', 'GigOrderController@get_seller_orders_by_status'); 
// get order details
Route::get('dashboard/marketplace/order-details/{order_id}', 'GigOrderController@gig_order_details')->name('gig_order_details'); 
// order deliver 
Route::post('dashboard/order/deliver/{order_id}', 'GigOrderController@order_deliver'); 
Route::post('dashboard/order/quick-response', 'GigOrderController@quick_response')->name('quick_response'); 
Route::post('dashboard/revision/order-delivery', 'GigOrderController@revision_delivery')->name('revision_delivery'); 
Route::post('dashboard/order/order-timeorcancel', 'GigOrderController@order_timeExtra_cancel')->name('order_timeorcancel'); 


// get_orders_by_status
Route::get('dashboard/marketplace/manage/get_buyer_orders/{status?}', 'GigOrderController@get_orders_by_status'); 

Route::get('dashboard/{username}/manage/buyer_order_details/{order_id}', 'GigOrderController@buyer_order_details'); // all orders



//Earnings 
Route::get('dashboard/earnings/balance', 'earningController@earnings_view')->name('earnings'); 
Route::get('dashboard/withdrawal', 'WithdrawController@withdrawal')->name('withdrawal'); 
Route::post('dashboard/withdrawal/request', 'WithdrawController@withdraw_request')->name('withdraw_request'); 
Route::get('dashboard/withdrawal/details/{invoice_id}', 'WithdrawController@withdraw_detials')->name('withdraw_detials'); 

// affiliate program

Route::post('dashboard/generate/affiliatecede', 'AffiliateAddsController@affiliate_code')->name('affiliate_code'); 
Route::get('dashboard/affiliate/program', 'AffiliateAddsController@affiliate_program'); 
// Referell
Route::get('affiliate/view', 'AffiliateAddsController@index'); 

Route::get('/categories/{category}/{subcategory}/{ref?}/{user_id?}', 'gighomeController@gig_view');


/// multi test image
Route::post('/ajax_upload/action', 'MultipleUploadController@action')->name('action');

Route::get('image/multiple-file-upload', 'MultipleUploadController@index');

Route::post('multiple-file-upload/upload', 'MultipleUploadController@upload')->name('upload');




