<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('frontend/index');
});

Auth::routes();

Route::get('dashbord/profile/setting', 'userinfoController@profile_setting');

Route::post('/checkemail', 'userinfoController@check_email');
Route::post('/profile/update', 'userinfoController@update');
Route::post('/location/update', 'userinfoController@location_update');
Route::post('/experience/update', 'userinfoController@experience_update');
Route::post('/skillTags/update', 'userinfoController@skillTags_update');
Route::post('/user/image/upload', 'userinfoController@user_image');


Route::get('stripe', 'gigOrderController@stripe');
Route::post('stripe', 'gigOrderController@stripePost')->name('stripe.post');

// insert main category
Route::get('dashbord/gig-category', 'superAdminController@gig_category');
Route::post('dashbord/create-gig-category', 'superAdminController@create_gig_category');
// insert sub category
Route::get('dashbord/gig-subcategory', 'superAdminController@gig_subcategory');
Route::post('dashbord/create-gig-subcategory', 'superAdminController@create_gig_subcategory');
// insert gig meta data
Route::get('dashbord/gig-metadata', 'superAdminController@gig_metadata');
Route::post('dashbord/gig-metadata', 'superAdminController@insert_metadata');

/// filter route
Route::get('/dashbord/filter/', 'filterController@show_filer_page'); // filter
Route::post('/dashbord/filter/', 'filterController@insert_filter'); // filter

//message inbox
Route::get('/dashbord/inbox/{username?}', 'messageController@inbox');
Route::get('/dashbord/getmessages/{id}', 'messageController@getmessages');

Route::get('dashbord/gig-pricescope', 'superAdminController@gig_pricescope');
Route::post('dashbord/gig-pricescope', 'superAdminController@insert_pricescope');

Route::post('/get_subcategory', 'gigController@get_subcategory'); //get sub category for gig
Route::post('/get_medata', 'gigController@get_medata'); //get sub category for gig

Route::get('/dashbord/create-gig', 'gigController@create_gig'); // view gig page
Route::post('/dashbord/create-gig', 'gigController@insert_gig'); // insert gig 1st step
Route::get('/dashbord/create-gig/{step}/{title?}', 'gigController@gig_step'); // update gig

Route::post('/dashbord/create-gig/second', 'gigController@insert_gig_step_second'); // insert gig step 2nd
Route::post('/dashbord/create-gig/third', 'gigController@insert_gig_step_third'); // insert gig step 3rd
Route::post('/dashbord/create-gig/fourth', 'gigController@insert_gig_step_fourth'); // insert gig step 4th
Route::post('/dashbord/create-gig/five', 'gigController@insert_gig_step_five'); // insert gig step 5th
Route::post('/dashbord/create-gig/finish', 'gigController@insert_gig_step_finish'); // insert gig step finish
Route::post('/dashbord/create/price', 'gigController@insert_price'); // update gig

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

Route::get('/{id}', 'profileController@profile_view');

Route::any('/categories/{category}/{subcategory}', 'gighomeController@gig_view');
Route::get('/{user_name}/{gig_url}', 'gighomeController@gig_details');

Route::post('/categories/{category}/{subcategory}', 'gighomeController@gig_filter');

// order 
Route::post('/order/add_card/', 'gigOrderController@add_to_cart'); // add to cart
Route::get('/delete/add_to_cart/{cart_id}', 'gigOrderController@delete_cart'); // delete add to cart

Route::get('/order/checkout/{cart_id}', 'gigOrderController@order_checkout'); // view order details
Route::post('/order/placeorder/payment/', 'gigOrderController@placeorder_payment'); // order & payment

Route::get('/order/placeorder/card/', 'gigOrderController@card'); // stripe payment

Route::post('/order/placeorder/stripe_payment/', 'gigOrderController@stripe_payment'); // stripe payment


Route::get('/order/payment/success', 'gigOrderController@payment_success'); // order & payment
Route::get('/order/requirements/{order_id}', 'gigOrderController@order_requirements'); // order requirements
Route::post('/order/requirements/{order_id}', 'gigOrderController@insert_order_requirements'); // order requirements
Route::get('/order/started/{order_id}', 'gigOrderController@order_started'); // order requirements
 // order review for buyer
Route::get('/order/review/{order_id}', 'gigOrderController@order_review');

Route::get('/order/payment/{order_id}', 'gigOrderController@order_payment'); // 

// manage seller order
Route::get('dashbord/{username}/manage/seller_order/{status?}', 'gigOrderController@manage_seller_order'); 
// get seller order by status
Route::get('dashbord/manage/get_seller_orders/{status}', 'gigOrderController@get_seller_orders_by_status'); 
// get order details
Route::get('dashbord/{username}/manage/order/{order_id}', 'gigOrderController@manage_order_details'); 
// order deliver 
Route::post('dashboard/order/deliver/{order_id}', 'gigOrderController@order_deliver'); 

// buyer 
Route::get('dashbord/{username}/manage/buyer_order/{status?}/', 'gigOrderController@manage_buyer_order'); 
// get_orders_by_status
Route::get('dashbord/manage/get_buyer_orders/{status}', 'gigOrderController@get_orders_by_status'); 

Route::get('dashbord/{username}/manage/buyer_order_details/{order_id}', 'gigOrderController@buyer_order_details'); // all orders



//Earnings 
Route::get('dashbord/earnings/balance', 'earningController@earnings_view'); 

// affiliate program

Route::get('dashbord/affiliate/program', 'affiliateController@affiliate_program'); 
// Referell
Route::get('/categories/{category}/{subcategory}/{ref?}/{user_id?}', 'gighomeController@gig_view');
