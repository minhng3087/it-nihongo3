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

// Backend
Route::get('backend/login', 'AdminAuth\AuthController@getLogin')->name('backend.auth.getLogin');
Route::post('backend/postlogin', 'AdminAuth\AuthController@postLogin')->name('backend.auth.postLogin');
Route::group(['middleware' =>'authen', 'prefix' => 'backend'], function(){
	Route::get('register','AdminAuth\AuthController@getRegister')->name('getRegister');
	Route::post('postregister','AdminAuth\AuthController@postRegister')->name('postRegister');
	Route::get('logout','AdminAuth\AuthController@logout')->name('backend.auth.logout');
});
Route::group(['namespace' => 'Admin'], function () {
	Route::group(['middleware' =>'authen', 'prefix' => 'backend'], function(){
		Route::get('/','IndexController@getIndex')->name('backend.index');
		Route::group(['prefix' => 'users'], function(){
			Route::get('info','UsersController@getAdmin')->name('backend.users.getAdmin');
			/* phan quyen */
			Route::get('listuse','UsersController@listuse')->name('backend.users.listuse');
			Route::get('adduse','UsersController@adduse')->name('backend.users.adduse');
			Route::post('posuse','UsersController@posuse')->name('backend.users.posuse');
			Route::get('edituse','UsersController@edituse')->name('backend.users.edituse');
			Route::post('postedituse','UsersController@postedituse')->name('backend.users.postedituse');
			Route::get('{id}/deleteuse','UsersController@deleteuse')->name('backend.users.deleteuse');
			Route::get('khong-co-quyen','UsersController@khongquyen')->name('backend.users.khongquyen');
			/* end phan quyen */
			Route::post('updateinfo','UsersController@updateinfo')->name('backend.users.updateinfo');
			// Post
		});

		$routes = config('admin.route');
		
        foreach ($routes as $key => $route) {
            Route::resource($route['name'], ucfirst($key).'Controller', [
				'except' => 'show', 
			]);
            if($route['multi_del'] == true){
                Route::post( $key.'/postMultiDel',ucfirst($key).'Controller@deleteMuti')->name($key.'.postMultiDel');
            }
        }

		// Setting
		Route::group(['prefix' => 'options'], function() {
            Route::get('/general', 'SettingController@getGeneralConfig')->name('backend.options.general');
            Route::post('/general', 'SettingController@postGeneralConfig')->name('backend.options.general.post');

            Route::get('/smtp', 'SettingController@getSmtpConfig')->name('backend.options.smtp-config');
            Route::post('/smtp-config', 'SettingController@postSmtpConfig')->name('backend.options.smtp-config.post');
            Route::post('/send-mail-test', 'SettingController@postSendTestEmail')->name('backend.options.send-mail.post');

        });
		// Bài viết
		Route::get('posts/get-slug', 'PostController@getAjaxSlug')->name('posts.get-slug');
		Route::get('posts/anyData', 'PostController@anyData')->name('posts.anyData');
		Route::resource('categories-post', 'CategoriesPostController', ['except' => [
			'show','create'
		]]);

		// Filter
        Route::get('category-filter', 'FilterController@getListCategory')->name('list-category-filter');
        Route::get('sort-filter', 'FilterController@getSort')->name('sort-category-filter');
        Route::post('sort-filter-update', 'FilterController@postSort')->name('sort.filter.update');

		// Products
        Route::get('products/get-slug', 'ProductsController@getAjaxSlug')->name('products.get-slug');
        Route::resource('product-gift', 'ProductGiftController', ['except' => ['show']]);
        Route::get('products/get-slug', 'ProductsController@getAjaxSlug')->name('products.get-slug');
		
		// Menu
		Route::group(['prefix' => 'menu'], function () {
            Route::get('/','MenuController@getListMenu')->name('setting.menu');
			Route::get('/edit/{id}', 'MenuController@getEditMenu')->name('backend.config.menu.edit');
			Route::post('update', 'MenuController@postUpdateMenu')->name('setting.menu.update');
			Route::post('add-item/{id}', 'MenuController@postAddItem')->name('setting.menu.addItem');
			Route::get('edit-item/{id}', 'MenuController@getEditItem')->name('setting.menu.geteditItem');
			Route::post('edit', 'MenuController@postEditItem')->name('setting.menu.editItem');
            Route::get('delete/{id}','MenuController@getDelete')->name('setting.menu.delete');
        });

		// Menu Category
		Route::group(['prefix' => 'menu-category'], function () {
            Route::get('/','CategoryMenuController@getList')->name('setting.menu-category');
            Route::get('edit/{id}','CategoryMenuController@getEditMenu')->name('setting.menu-category.edit');
            Route::post('update','CategoryMenuController@postUpdateMenu')->name('setting.menu-category.update');
			Route::post('add-item','CategoryMenuController@postAddItem')->name('setting.menu-category.addItem');
			Route::post('edit', 'CategoryMenuController@postEditItem')->name('setting.menu-category.editItem');
			Route::get('delete/{id}', 'CategoryMenuController@getDelete')->name('setting.menu-category.delete');
			Route::get('edit-item/{id}', 'CategoryMenuController@getEditItem')->name('setting.menu-category.geteditItem');
			Route::post('edit', 'CategoryMenuController@postEditItem')->name('setting.menu-category.editItem');

        });

		// Pages

		Route::group(['prefix' => 'pages'], function () {
            Route::get('/','PagesController@getListPages')->name('pages.list');
			Route::get('build', 'PagesController@getBuildPages')->name('pages.build');
			Route::post('build', 'PagesController@postBuildPages')->name('pages.build.post');
			Route::post('/create', 'PagesController@postCreatePages')->name('pages.create');
        });

		// Contact
        Route::get('contact-active/', ['as' => 'contact.active', 'uses' => 'ContactController@getQuickActive']);
		Route::get('contact/anyData', 'ContactController@anyData')->name('contact.anyData');

        Route::resource('category', 'CategoryController', ['except' => ['show']]);
        Route::get('/get-layout', 'IndexController@getLayOut')->name('get.layout');
		
	});
});

// Frontend

Route::get('/', 'IndexController@getHome')->name('home.index');

Route::get('tin-tuc', 'IndexController@getArchiveNews')->name('home.archive-news');


Route::get('tin-tuc/{slug}', 'IndexController@getSingleNews')->name('home.post.single');

Route::get('san-pham/{slug}', 'IndexController@getSingleProduct')->name('home.single.product');

Route::get('san-pham-moi', 'IndexController@getNewProduct')->name('home.new.product');

Route::get('danh-muc/{slug}', 'IndexController@getArchiveProduct')->name('home.archive.product');

Route::get('get-ajax-product','IndexController@getAjaxProduct')->name('get.ajax.product');

Route::get('tim-kiem', 'IndexController@getSearch')->name('home.search');

Route::get('lien-he', 'IndexController@getContact')->name('home.contact');

Route::post('lien-he', 'IndexController@postContact')->name('home.contact.post');

Route::get('filter-products', 'IndexController@getFilterProductsAjax')->name('home.filterProducts');

Route::get('version-product', 'IndexController@getVersionProduct')->name('home.version.product');

Route::post('add-cart', 'IndexController@postAddCart')->name('home.post-add-cart');

Route::get('get-add-cart', 'IndexController@getAddCart')->name('home.get-add-cart');

Route::get('get-remove-cart', 'IndexController@getDeleteCart')->name('home.get-remove-cart');


Route::get('gio-hang', 'IndexController@getCart')->name('home.cart');

Route::get('remove/{rowID}', 'IndexController@getRemoveCart')->name('home.remove.cart');
Route::get('update-cart', 'IndexController@getUpdateCart')->name('home.update.cart');

Route::get('thanh-toan', 'IndexController@getCheckOut')->name('home.check-out');
Route::get('load-province', 'IndexController@getProvince')->name('home.load.province');
Route::post('thanh-toan', 'IndexController@postCheckOut')->name('home.check-out.post');












