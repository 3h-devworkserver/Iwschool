<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//-----------------For frontend ---------------//


Route::get('logout', 'Auth\LoginController@logout');

$router->group([], function () use ($router)
{
    // require(__DIR__ . "/routes/frontend/Access.php");
    require(__DIR__ . "/frontend/frontend.php");
    // require(__DIR__ . "/Routes/Frontend/Guide/Frontend.php");
    // require(__DIR__ . "/Routes/Frontend/Traveller/Frontend.php");
    // require(__DIR__ . "/Routes/Frontend/Payment.php");
});
//---------------------- For backend -------------------//
Route::get('/admin', function () {
    if(Auth::check()){
        if(Auth::user()->isPending() || Auth::user()->isDisabled()) { 
            Auth::logout();
            return redirect('/login')->with('info', 'Insert message here');
        }
        return view('welcome');
    }
    return redirect('/login');
});

// Route::get('general',function() {
// 	return view('layouts/settings/general');
// });
/* ---------- featured image delete -------------- */
Route::post('delete/featuredimg', ['as' => 'delete.fimg','uses' => 'Backend\PageController@destroyfimg']);

/* -----------------------Setting------------- */
Route::get('setting/generals', ['as' => 'setting.general','uses' => 'Backend\SettingController@index']);
Route::get('setting/seo', ['as' => 'setting.seo','uses' => 'Backend\SettingController@seo']);
Route::post('setting/general/store', ['as' => 'setting.general.store','uses' => 'Backend\SettingController@store']);
Route::post('setting/general/storeseo', ['as' => 'setting.general.seo.store','uses' => 'Backend\SettingController@storeseo']);
Route::get('setting/social', ['as' => 'setting.social', 'uses' => 'Backend\SettingController@getSettings']);
Route::post('setting/social/storesocial', ['as' => 'setting.social.store', 'uses' => 'Backend\SettingController@socialstore']);

Route::get('setting/email/notify', ['as' => 'setting.email', 'uses' => 'Backend\EmailController@index']);
Route::post('setting/email/store', ['as' => 'email.store', 'uses' => 'Backend\EmailController@store']);
Route::PATCH('setting/email/update/{id}', ['as' => 'email.update', 'uses' => 'Backend\EmailController@update']);
Route::get('setting/news-events/notify', ['as' => 'setting.news.email', 'uses' => 'Backend\EmailController@newsindex']);

/* Theme Option */
Route::get('theme/setting', ['as' => 'theme.setting','uses' => 'Backend\ThemeOptionController@index']);
Route::post('theme/store', ['as' => 'theme.store','uses' => 'Backend\ThemeOptionController@store']);

/* For Page */
Route::get('page/list', ['as' => 'page.list','uses' => 'Backend\PageController@index']);
Route::get('page/new', ['as' => 'page.new','uses' => 'Backend\PageController@create']);
Route::post('page/store', ['as' => 'page.store','uses' => 'Backend\PageController@store']);
Route::get('page/edit/{id}', ['as' => 'page.edit','uses' => 'Backend\PageController@edit']);
Route::patch('page/update/{id}', ['as' => 'page.update','uses' => 'Backend\PageController@update']);
Route::get('page/delete/{id}', ['as' => 'page.delete','uses' => 'Backend\PageController@destroy']);
Route::get('page/list/{id}', ['as' => 'page.sorting','uses' => 'Backend\PageController@sorting']);


/* For static Block */
Route::get('static/block/list', ['as' => 'static.list','uses' => 'Backend\StaticController@index']);
Route::get('static/block/new', ['as' => 'static.new','uses' => 'Backend\StaticController@create']);
Route::post('static/store', ['as' => 'static.store','uses' => 'Backend\StaticController@store']);
Route::get('static/block/edit/{id}', ['as' => 'static.edit','uses' => 'Backend\StaticController@edit']);
Route::patch('static/update/{id}', ['as' => 'static.update','uses' => 'Backend\StaticController@update']);
Route::get('static/delete/{id}', ['as' => 'static.delete','uses' => 'Backend\StaticController@destroy']);

/* for slider */

Route::get('admin/slider', ['as' => 'slides','uses' => 'Backend\SliderController@index']);
Route::get('slides/create', ['as' => 'slides.create','uses' => 'Backend\SliderController@create']);
Route::post('slider/store', ['as' => 'slider.store','uses' => 'Backend\SliderController@store']);
Route::get('slider/edit/{id}', ['as' => 'slider.edit','uses' => 'Backend\SliderController@edit']);
Route::patch('slider/update/{id}', ['as' => 'slider.update','uses' => 'Backend\SliderController@update']);
Route::get('slider/delete/{id}', ['as' => 'slider.delete','uses' => 'Backend\SliderController@destroy']);

/* for gallery management */

Route::get('admin/gallery', ['as' => 'admin.gallery','uses' => 'Backend\GalleryController@index']);
Route::get('admin/gallery/create', ['as' => 'admin.gallery.create','uses' => 'Backend\GalleryController@create']);
Route::post('admin/gallery/store', ['as' => 'admin.gallery.store','uses' => 'Backend\GalleryController@store']);
Route::get('admin/gallery/edit/{id}', ['as' => 'admin.gallery.edit','uses' => 'Backend\GalleryController@edit']);
Route::patch('admin/gallery/update/{id}', ['as' => 'admin.gallery.update','uses' => 'Backend\GalleryController@update']);
Route::get('admin/gallery/delete/{id}', ['as' => 'admin.gallery.delete','uses' => 'Backend\GalleryController@destroy']);

/* for notice management */

Route::get('admin/notice', ['as' => 'admin.notice','uses' => 'Backend\NoticeController@index']);
Route::get('admin/notice/create', ['as' => 'admin.notice.create','uses' => 'Backend\NoticeController@create']);
Route::post('admin/notice/store', ['as' => 'admin.notice.store','uses' => 'Backend\NoticeController@store']);
Route::get('admin/notice/edit/{id}', ['as' => 'admin.notice.edit','uses' => 'Backend\NoticeController@edit']);
Route::patch('admin/notice/update/{id}', ['as' => 'admin.notice.update','uses' => 'Backend\NoticeController@update']);
Route::get('admin/notice/delete/{id}', ['as' => 'admin.notice.delete','uses' => 'Backend\NoticeController@destroy']);

/* for menu management */
Route::group(['prefix' => '/admin/menus'], function()
{
    // Showing the admin for the menu builder and updating the order of menu items
    Route::get('/', 'Backend\MenuController@Index');
	Route::post('order', 'Backend\MenuController@postIndex');
	Route::post('new', 'Backend\MenuController@postNew');
	Route::get('edit/{id}', 'Backend\MenuController@Edit');
	Route::post('edit/{id}', 'Backend\MenuController@menuEdit');
	Route::post('delete', 'Backend\MenuController@menuDelete');
});

//------For Post Management ----------//
Route::get('admin/post', ['as' => 'post','uses' => 'Backend\PostController@index']);
Route::get('post/create', ['as' => 'post.create','uses' => 'Backend\PostController@create']);
Route::post('post/store', ['as' => 'post.store','uses' => 'Backend\PostController@store']);
Route::get('post/edit/{id}', ['as' => 'post.edit','uses' => 'Backend\PostController@edit']);
Route::patch('post/update/{id}', ['as' => 'post.update','uses' => 'Backend\PostController@update']);
Route::get('post/delete/{id}', ['as' => 'post.delete','uses' => 'Backend\PostController@destroy']);
Route::post('post/imgdelete', ['as' => 'post.imgdelete','uses' => 'Backend\PostController@imgdelete']);
Route::get('post/add/category', ['as' => 'post.add.category','uses' => 'Backend\PostController@addcategory']);
Route::post('post/category/store', ['as' => 'post.store.category','uses' => 'Backend\PostController@storecategory']);
Route::get('post/category/edit/{id}', ['as' => 'category.edit','uses' => 'Backend\PostController@editcategory']);
Route::patch('post/category/update/{id}', ['as' => 'category.update','uses' => 'Backend\PostController@updatecategory']);
Route::get('post/category/delete/{id}', ['as' => 'category.delete','uses' => 'Backend\PostController@deletecategory']);

/* For User Management */
Route::get('admin/user/list', ['as' => 'user.list','uses' => 'Backend\UserController@index']);
Route::get('admin/user/create', ['as' => 'user.create','uses' => 'Backend\UserController@create']);
Route::post('admin/user/store', ['as' => 'user.store','uses' => 'Backend\UserController@store']);
Route::get('admin/user/edit/{id}', ['as' => 'user.edit','uses' => 'Backend\UserController@edit']);
Route::patch('admin/user/update/{id}', ['as' => 'user.update','uses' => 'Backend\UserController@update']);
Route::get('admin/user/delete/{id}', ['as' => 'user.delete','uses' => 'Backend\UserController@destroy']);
