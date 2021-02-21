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
Route::get('/', 'IndexController@getHome')->name('home.index');

Route::get('/search', 'IndexController@getSearch')->name('home.search');

Route::get('/gioi-thieu', 'IndexController@getListAbout')->name('home.about');

Route::get('/dich-vu', 'IndexController@getServices')->name('home.services');

Route::get('/dich-vu/{slug}', 'IndexController@getCategoryServices')->name('home.cate-services');

Route::get('/dich-vu/chi-tiet/{slug}', 'IndexController@servicesDetail')->name('home.services-detail');

Route::get('/bao-gia-va-quy-trinh', 'IndexController@getQuotes')->name('home.quotes');

Route::get('/bao-gia-va-quy-trinh/{slug}', 'IndexController@getChildQuotes')->name('home.child-quotes');

Route::get('/thuoc-lo-ban', 'IndexController@thuocLoBan')->name('home.thuoc-lo-ban');

Route::get('/phong-thuy', 'IndexController@phongThuy')->name('home.phong-thuy');

Route::get('/du-an-hoan-thanh', 'IndexController@projectCompleted')->name('home.project-completed');

Route::get('/du-an-hoan-thanh/danh-muc/{slug}', 'IndexController@categoryProjectCompleted')->name('home.category-project-completed');

Route::get('/du-an-hoan-thanh/{slug}', 'IndexController@projectDetail')->name('home.project-detail');

Route::get('/mau-nha-dep', 'IndexController@beautifulhome')->name('home.beautiful-home');

Route::get('/mau-nha-dep/danh-muc/{slug}', 'IndexController@categoryBeautifulHome')->name('home.category-beautiful-home');

Route::get('/mau-nha-dep/{slug}', 'IndexController@beautifulHomeDetail')->name('home.beautiful-home-detail');

Route::get('/tien-ich', 'IndexController@Utilities')->name('home.utilities');

Route::get('/tien-ich/danh-muc/{slug}', 'IndexController@categoryUtilities')->name('home.category-utilities');

Route::get('/tien-ich/{slug}', 'IndexController@utilitiesDetail')->name('home.utilities-detail');

Route::get('/lien-he', 'IndexController@getContact')->name('home.contact');

Route::get('dang-ky-tu-van', 'IndexController@signupConsultation')->name('home.signup-consultation');

Route::post('/dang-ky-tu-va/gui', 'IndexController@postsignupConsultation')->name('home.post-signupconsultation');





Route::get('/danh-muc-san-pham/{slug}', 'IndexController@getCatetoryProducts')->name('home.category-product');

Route::get('/san-pham/{slug}', 'IndexController@getSingleProduct')->name('home.single-product');

Route::get('/danh-muc-san-pham-gift/{slug}', 'IndexController@getCatetoryProductsGift')->name('home.category-product-gift');

Route::get('/san-pham-gift/{slug}', 'IndexController@getSingleProductGift')->name('home.single-product-gift');

Route::get('/san-pham', 'IndexController@getListProducts')->name('home.product');

Route::get('/san-pham-gift', 'IndexController@getListProductsGift')->name('home.product-gift');

Route::get('/sale', 'IndexController@getListProductsSale')->name('home.product-sale');

Route::get('/blogs', 'IndexController@getListNews')->name('home.news');

Route::get('/blogs/{slug}', 'IndexController@getSingleNews')->name('home.news-single');

Route::get('story', 'IndexController@getStory')->name('home.story');

Route::get('/faq', 'IndexController@getFaq')->name('home.faq');

Route::get('/dai-ly', 'IndexController@getAgency')->name('home.agency');

Route::post('add-cart', 'IndexController@postAddCart')->name('home.post-add-cart');

Route::get('/get-add-cart', 'IndexController@getAddCart')->name('home.get-add-cart');

Route::get('gio-hang', 'IndexController@getCart')->name('home.cart');

Route::get('remove-cart', 'IndexController@getRemoveCart')->name('home.remove.cart');

Route::get('update-cart', 'IndexController@getUpdateCart')->name('home.update.cart');

Route::post('thanh-toan', 'IndexController@postCheckOut')->name('home.check-out.post');

Route::get('/chinh-sach/{slug}', 'IndexController@policy')->name('home.policy');
// Route::get('contact-registration', 'IndexController@postRegistrationEmail')->name('home.contact-registration');

Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
       	Route::get('/home', 'HomeController@index')->name('backend.home');

        Route::resource('users', 'UserController', ['except' => [
            'show'
        ]]);
        Route::resource('image', 'ImageController', ['except' => [
            'show'
        ]]);
        Route::post('image/postMultiDel', ['as' => 'image.postMultiDel', 'uses' => 'ImageController@deleteMuti']);
        // Bài viết
        Route::resource('posts', 'PostController', ['except' => ['show']]);
        Route::post('posts/postMultiDel', ['as' => 'posts.postMultiDel', 'uses' => 'PostController@deleteMuti']);
        Route::get('posts/get-slug', 'PostController@getAjaxSlug')->name('posts.get-slug');

        // Dịch vụ
        Route::resource('services', 'ServicesController', ['except' => ['show']]);
        Route::post('services/postMultiDel', ['as' => 'services.postMultiDel', 'uses' => 'ServicesController@deleteMuti']);
        Route::get('services/get-slug', 'ServicesController@getAjaxSlug')->name('services.get-slug');

        // Báo giá và quy trình
        Route::resource('quotes', 'QuotesController', ['except' => ['show']]);
        Route::post('quotes/postMultiDel', ['as' => 'quotes.postMultiDel', 'uses' => 'QuotesController@deleteMuti']);
        Route::get('quotes/get-slug', 'QuotesController@getAjaxSlug')->name('quotes.get-slug');


        // Dự án hoàn thành
        Route::resource('projects', 'ProjectsController', ['except' => ['show']]);
        Route::post('projects/postMultiDel', ['as' => 'projects.postMultiDel', 'uses' => 'ProjectsController@deleteMuti']);
        Route::get('projects/get-slug', 'ProjectsController@getAjaxSlug')->name('projects.get-slug');

        // Mẫu nhà đẹp
        Route::resource('beautiful-house', 'BeautifulHouseController', ['except' => ['show']]);
        Route::post('beautiful-house/postMultiDel', ['as' => 'beautiful-house.postMultiDel', 'uses' => 'BeautifulHouseController@deleteMuti']);
        Route::get('beautiful-house/get-slug', 'BeautifulHouseController@getAjaxSlug')->name('beautiful-house.get-slug');

        // Mẫu nhà đẹp
        Route::resource('utilities', 'UtilitiesController', ['except' => ['show']]);
        Route::post('utilities/postMultiDel', ['as' => 'utilities.postMultiDel', 'uses' => 'UtilitiesController@deleteMuti']);
        Route::get('utilities/get-slug', 'UtilitiesController@getAjaxSlug')->name('utilities.get-slug');






        // Sản phẩm
        Route::resource('products', 'ProductController', ['except' => ['show']]);
        Route::post('products/postMultiDel', ['as' => 'products.postMultiDel', 'uses' => 'ProductController@deleteMuti']);
        Route::get('products/get-slug', 'ProductController@getAjaxSlug')->name('products.get-slug');


        Route::resource('category', 'CategoryController', ['except' => ['show']]);

        // ngân hàng
        Route::resource('banks', 'BankController', ['except' => ['show']]);
        Route::post('banks/postMultiDel', ['as' => 'banks.postMultiDel', 'uses' => 'BankController@deleteMuti']);

        // Đại lý
        Route::resource('agency', 'AgencyController', ['except' => ['show']]);
        Route::post('agency/postMultiDel', ['as' => 'agency.postMultiDel', 'uses' => 'AgencyController@deleteMuti']);

        // Liên hệ
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', ['as' => 'get.list.contact', 'uses' => 'ContactController@getListContact']);
            Route::post('/delete-muti', ['as' => 'contact.postMultiDel', 'uses' => 'ContactController@postDeleteMuti']);
            Route::get('{id}/edit', ['as' => 'contact.edit', 'uses' => 'ContactController@getEdit']);
            Route::post('{id}/edit', ['as' => 'contact.post', 'uses' => 'ContactController@postEdit']);
            Route::delete('{id}/delete', ['as' => 'contact.destroy', 'uses' => 'ContactController@getDelete']);
        });

        // Đăng ký tư vấn
        Route::group(['prefix' => 'advispry'], function () {
            Route::get('/', ['as' => 'get.list.advisory', 'uses' => 'AdvisoryController@getListadvisory']);
            Route::post('/delete-muti', ['as' => 'advisory.postMultiDel', 'uses' => 'AdvisoryController@postDeleteMuti']);
            Route::get('{id}/edit', ['as' => 'advisory.edit', 'uses' => 'AdvisoryController@getEdit']);
            Route::post('{id}/edit', ['as' => 'advisory.post', 'uses' => 'AdvisoryController@postEdit']);
            Route::delete('{id}/delete', ['as' => 'advisory.destroy', 'uses' => 'AdvisoryController@getDelete']);
        });



        // Đơn hàng
        Route::group(['prefix' => 'orders'], function() {
            Route::get('/', ['as' => 'order.index', 'uses' => 'OrdersController@getList']);
            Route::get('edit/{id}', ['as' => 'order.edit', 'uses' => 'OrdersController@getEdit']);
            Route::post('edit/{id}', ['as' => 'order.edit.post', 'uses' => 'OrdersController@postEdit']);
            Route::delete('delete/{id}', ['as' => 'order.destroy', 'uses' => 'OrdersController@postDelete']);
            Route::post('delete-multi', ['as' => 'order.postMultiDel', 'uses' => 'OrdersController@deleteMuti']);
        });

        Route::group(['prefix' => 'pages'], function() {
            Route::get('/', ['as' => 'pages.list', 'uses' => 'PagesController@getListPages']);
            Route::get('build', ['as' => 'pages.build', 'uses' => 'PagesController@getBuildPages']);
            Route::post('build', ['as' => 'pages.build.post', 'uses' => 'PagesController@postBuildPages']);
            Route::post('/create', ['as' => 'pages.create', 'uses' => 'PagesController@postCreatePages']);
        });

        Route::group(['prefix' => 'options'], function() {
            Route::get('/general', 'SettingController@getGeneralConfig')->name('backend.options.general');
            Route::post('/general', 'SettingController@postGeneralConfig')->name('backend.options.general.post');

            Route::get('/developer-config', 'SettingController@getDeveloperConfig')->name('backend.options.developer-config');
            Route::post('/developer-config', 'SettingController@postDeveloperConfig')->name('backend.options.developer-config.post');
        });

        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', ['as' => 'setting.menu', 'uses' => 'MenuController@getListMenu']);
            Route::get('edit/{id}', ['as' => 'backend.config.menu.edit', 'uses' => 'MenuController@getEditMenu']);
            Route::post('add-item/{id}', ['as' => 'setting.menu.addItem', 'uses' => 'MenuController@postAddItem']);
            Route::post('update', ['as' => 'setting.menu.update', 'uses' => 'MenuController@postUpdateMenu']);
            Route::get('delete/{id}', ['as' => 'setting.menu.delete', 'uses' => 'MenuController@getDelete']);
            Route::get('edit-item/{id}', ['as' => 'setting.menu.geteditItem', 'uses' => 'MenuController@getEditItem']);
            Route::post('edit', ['as' => 'setting.menu.editItem', 'uses' => 'MenuController@postEditItem']);
        });

        //Chính sách
        Route::group(['prefix' => 'policy'], function () {
            Route::get('/', ['as' => 'policy.list', 'uses' => 'PolicyController@getListPolicy']);
            Route::get('/add-plicy', ['as' => 'policy.add', 'uses' => 'PolicyController@addPolicy']);
            Route::post('/post-add-plicy', ['as' => 'policy.post-add', 'uses' => 'PolicyController@postAddPolicy']);
            Route::get('/edit-policy/{id}', ['as' => 'policy.edit', 'uses' => 'PolicyController@editPolicy']);
            Route::post('/post-edit-policy/{id}', ['as' => 'policy.post-edit', 'uses' => 'PolicyController@postEditPolicy']);
            Route::get('/delete-policy/{id}', ['as' => 'policy.delete', 'uses' => 'PolicyController@deletePolicy']);

            //Liên hệ footer
            Route::get('/ft-ct', ['as' => 'policy.list-ftct', 'uses' => 'PolicyController@getListFooterContact']);
            Route::get('/add-ftct', ['as' => 'policy.add-ftct', 'uses' => 'PolicyController@addFooterContact']);
            Route::post('/post-add-ftct', ['as' => 'policy.post-add-ftct', 'uses' => 'PolicyController@postAddFooterContact']);
            Route::get('/edit-ftct/{id}', ['as' => 'policy.edit-ftct', 'uses' => 'PolicyController@editFooterContact']);
            Route::post('/post-edit-ftct/{id}', ['as' => 'policy.post-edit-ftct', 'uses' => 'PolicyController@postEditFooterContact']);
            Route::get('/delete-ftct/{id}', ['as' => 'policy.delete-ftct', 'uses' => 'PolicyController@deleteFooterContact']);

        });

       Route::get('/get-layout', 'HomeController@getLayOut')->name('get.layout');


    });
});

Auth::routes(
    [
        'register' => false,
        'verify' => false,
        'reset' => false,
    ]
);
