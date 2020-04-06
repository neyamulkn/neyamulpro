<?php 

Route::group(['middleware' => ['admin', 'auth']], function(){

	Route::get('/','superAdminController@index')->name('admin_dashboard');
	//manage user
	Route::get('/manage/user/{status?}', 'AdminController@manage_user')->name('manage_user');
	Route::post('/user/approveOrReject', 'AdminController@userApproveOrReject')->name('userApproveOrReject');
	Route::post('/user/delete', 'AdminController@user_delete')->name('user_delete');

	Route::get('payment-method','superAdminController@paymentMethod')->name('paymentMethod');
	Route::post('payment-method/store','superAdminController@paymentMethodStore')->name('paymentMethodStore');
	Route::get('payment-method/edit/{id}','superAdminController@paymentMethodEdit')->name('paymentMethodEdit');
	Route::post('payment-method/update','superAdminController@paymentMethodUpdate')->name('paymentMethodUpdate');
	Route::get('payment-method/delete/{id}','superAdminController@paymentMethodDelete')->name('paymentMethodDelete');
	Route::get('withdrawal', 'WithdrawController@withdrawal')->name('admin.withdrawal'); 
	Route::get('withdrawal/details/{invoice_id}', 'WithdrawController@withdraw_detials')->name('admin.withdraw_detials'); 
	Route::post('withdrawal/action', 'WithdrawController@withdrawalAction')->name('admin.withdrawalAction'); 
	
	//theme category & filter 
	Route::group(['prefix'=> 'themeplace'],  function(){
		Route::get('/category', 'superAdminController@theme_category')->name('theme_category');
		Route::post('/create_theme_category', 'superAdminController@create_theme_category')->name('insert_theme_cat');
		Route::get('category/edit/{id}', 'superAdminController@theme_category_edit');
		Route::get('category/delete/{id}', 'superAdminController@theme_category_delete');

		// insert sub category
		Route::get('/subcategory', 'superAdminController@theme_subcategory')->name('theme_subcategory');
		Route::post('/subcategory', 'superAdminController@create_theme_subcategory')->name('insert_theme_subcategory');

		Route::get('subcategory/edit/{id}', 'superAdminController@theme_subcategory_edit');
		Route::get('subcategory/delete/{id}', 'superAdminController@theme_subcategory_delete');

		// insert sub child category
		Route::get('/subchildcategory', 'superAdminController@theme_subchildcategory');
		Route::post('/subchildcategory', 'superAdminController@create_theme_subchildcategory')->name('theme_subchildcategory');
		Route::get('/subchildcategory/edit/{id}', 'superAdminController@theme_subchildcategory_edit');
		Route::get('/subchildcategory/delete/{id}', 'superAdminController@theme_subchildcategory_delete');

		
		/// filter theme
		Route::get('filter/', 'filterController@theme_filter')->name('theme_filter'); // filter
		Route::post('filter/{id?}', 'filterController@insert_theme_filter')->name('theme_filter'); // filter

		Route::get('filter/edit/{id}', 'filterController@theme_filter_edit');
		Route::get('filter/delete/{id}', 'filterController@theme_filter_delete');

		/// sub filter theme
		Route::get('subfilter/', 'filterController@theme_subfilter'); // filter
		Route::post('subfilter/', 'filterController@insert_theme_subfilter')->name('insert_theme_subfilter'); 
		Route::get('subfilter/edit/{id}', 'filterController@theme_subfilter_edit');
		Route::get('subfilter/delete/{id}', 'filterController@theme_subfilter_delete');

		//manage theme

		Route::get('/manage/{status?}', 'themeController@manage_theme')->name('admin_manage_theme');
		Route::post('/theme/approve', 'AdminController@themeAproveOrReject')->name('approveOrReject');
	});

	//workplace category & filter 
	Route::group(['prefix'=> 'workplace'],  function(){

		Route::get('category', 'superAdminController@workplace_category');
		Route::post('category', 'superAdminController@create_workplace_category');
		Route::get('category/edit/{id}', 'superAdminController@workplace_category_edit');
		Route::get('category/delete/{id}', 'superAdminController@workplace_category_delete');

		// create sub category
		Route::get('subcategory', 'superAdminController@workplace_subcategory');
		// insert or update route
		Route::post('subcategory', 'superAdminController@create_workplace_subcategory');
		Route::get('subcategory/edit/{id}', 'superAdminController@workplace_subcategory_edit');
		Route::get('subcategory/delete/{id}', 'superAdminController@workplace_subcategory_delete');

		///create filter 
		Route::get('filter', 'filterController@workplace_filter'); 
		// insert or update route
		Route::post('filter', 'filterController@workplace_filter_store'); 
		Route::get('filter/edit/{id}', 'filterController@workplace_filter_edit');
		Route::get('filter/delete/{id}', 'filterController@workplace_filter_delete');


		/// sub filter 
		Route::get('subfilter/', 'filterController@workplace_subfilter'); // filter
		Route::post('subfilter/', 'filterController@insert_workplace_subfilter'); // filter
		Route::get('subfilter/edit/{id}', 'filterController@workplace_subfilter_edit');
		Route::get('subfilter/delete/{id}', 'filterController@workplace_subfilter_edit');



		
		//manage jobs

		Route::get('/manage/{status?}', 'workplaceController@job_list')->name('admin_manage_job');
		Route::post('/job/approve', 'AdminController@themeAproveOrReject')->name('jobApproveOrReject');

		//order list
		Route::get('/manage/order/{status?}', 'themeController@job_order_list')->name('job_order_list');

	});


	Route::group(['prefix'=> 'marketplace'],  function(){
		// gig category
		Route::get('category', 'superAdminController@gig_category');
		// insert or update gig category
		Route::post('category', 'superAdminController@create_gig_category');

		Route::get('category/edit/{id}', 'superAdminController@marketplace_category_edit');
		Route::get('category/delete/{id}', 'superAdminController@marketplace_category_delete');

		// get gig sub category
		Route::get('subcategory', 'superAdminController@gig_subcategory');
		// insert or update gig sub category
		Route::post('subcategory', 'superAdminController@marketplace_subcategory');
		Route::get('subcategory/edit/{id}', 'superAdminController@marketplace_subcategory_edit');
		Route::get('subcategory/delete/{id}', 'superAdminController@marketplace_subcategory_delete');

		// insert gig subfilter metadata
		Route::get('metadata', 'filterController@gig_metadata');
		Route::post('metadata', 'filterController@insert_metadata');

		Route::get('subfilter/edit/{id}', 'filterController@marketplace_subfilter_edit');
		Route::get('subfilter/delete/{id}', 'filterController@marketplace_subfilter_delete');


		/// filter route
		Route::get('filter', 'filterController@show_filer_page'); // filter
		Route::post('filter', 'filterController@insert_filter'); // filter


		Route::get('filter/edit/{id}', 'filterController@marketplace_filter_edit');
		Route::get('filter/delete/{id}', 'filterController@marketplace_filter_delete');

		// gig pricescope insert by super admin
		Route::get('pricescope', 'superAdminController@gig_pricescope');
		Route::post('pricescope', 'superAdminController@insert_pricescope');

		Route::get('pricescope/edit/{id}', 'superAdminController@marketplace_pricescope_edit');
		Route::get('pricescope/delete/{id}', 'superAdminController@marketplace_pricescope_delete');


		Route::get('/manage/{status?}', 'GigController@manage_gigs')->name('admin_manage_gigs');
		Route::post('/gig/approve', 'AdminController@gigApproveOrReject')->name('gigApproveOrReject');
	});

});