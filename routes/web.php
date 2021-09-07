<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('admin/login', 'App\Http\Controllers\UserController@getLoginAdmin');
Route::post('admin/login', 'App\Http\Controllers\UserController@postLoginAdmin');
Route::get('admin/logout', 'App\Http\Controllers\UserController@getLogoutAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    Route::get('layout/index', 'App\Http\Controllers\CategoryController@getIndex');

    Route::group(['prefix' => 'category', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\CategoryController@getList')->name('list_category');

        Route::get('edit/{id}', 'App\Http\Controllers\CategoryController@getEdit')->name('detail_category');
        Route::post('edit/{id}', 'App\Http\Controllers\CategoryController@postEdit')->name('edit_category');

        Route::get('add', 'App\Http\Controllers\CategoryController@getAdd')->name('detail1_category');
        Route::post('add', 'App\Http\Controllers\CategoryController@postAdd')->name('add_category');

        Route::get('delete/{id}', 'App\Http\Controllers\CategoryController@getDelete')->name('delete_category');

        Route::get('/{name_url}', 'App\Http\Controllers\CategoryController@getCategoryNews')->name('list_categorynews');

    });

    Route::group(['prefix' => 'typeofnews', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\TypeOfNewsController@getList')->name('list_typeofnews');

        Route::get('edit/{id}', 'App\Http\Controllers\TypeOfNewsController@getEdit')->name('detail_typeofnews');
        Route::post('edit/{id}', 'App\Http\Controllers\TypeOfNewsController@postEdit')->name('edit_typeofnews');

        Route::get('add', 'App\Http\Controllers\TypeOfNewsController@getAdd')->name('detail1_typeofnews');
        Route::post('add', 'App\Http\Controllers\TypeOfNewsController@postAdd')->name('add_typeofnews');

        Route::get('delete/{id}', 'App\Http\Controllers\TypeOfNewsController@getDelete')->name('delete_typeofnews');

    });

    Route::group(['prefix' => 'news', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\NewsController@getList')->name('list_news');

        Route::get('edit/{id}', 'App\Http\Controllers\NewsController@getEdit')->name('detail_news');
        Route::post('edit/{id}', 'App\Http\Controllers\NewsController@postEdit')->name('edit_news');

        Route::get('add', 'App\Http\Controllers\NewsController@getAdd')->name('detail1_news');
        Route::post('add', 'App\Http\Controllers\NewsController@postAdd')->name('add_news');
        Route::get('delete/{id}', 'App\Http\Controllers\NewsController@getDelete')->name('delete_news');

    });

    Route::group(['prefix' => 'comment', 'middleware' => 'check'], function () {

        Route::get('delete/{id}/{id_news}
', 'App\Http\Controllers\CommentController@getDelete')->name('delete_comment');

    });

    Route::group(['prefix' => 'slide', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\SlideController@getList')->name('list_slide');

        Route::get('edit/{id}', 'App\Http\Controllers\SlideController@getEdit')->name('detail_slide');
        Route::post('edit/{id}', 'App\Http\Controllers\SlideController@postEdit')->name('edit_slide');

        Route::get('add', 'App\Http\Controllers\SlideController@getAdd')->name('detail1_slide');
        Route::post('add', 'App\Http\Controllers\SlideController@postAdd')->name('add_slide');
        Route::get('delete/{id}', 'App\Http\Controllers\SlideController@getDelete')->name('delete_slide');

    });

    Route::group(['prefix' => 'user', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\UserController@getList')->name('list_user');

        Route::get('edit/{id}', 'App\Http\Controllers\UserController@getEdit')->name('detail_user');
        Route::post('edit/{id}', 'App\Http\Controllers\UserController@postEdit')->name('edit_user');

        Route::get('add', 'App\Http\Controllers\UserController@getAdd')->name('detail1_user');
        Route::post('add', 'App\Http\Controllers\UserController@postAdd')->name('add_user');
        Route::get('delete/{id}', 'App\Http\Controllers\UserController@getDelete')->name('delete_user');

    });

    Route::get('user/editmyself/{id}', 'App\Http\Controllers\UserController@getEditmyself');
    Route::post('user/editmyself/{id}', 'App\Http\Controllers\UserController@postEditmyself');

    Route::group(['prefix' => 'permission', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\PermissionController@getList')->name('list_permission');

        Route::get('edit/{id}', 'App\Http\Controllers\PermissionController@getEdit')->name('detail_permission');
        Route::post('edit/{id}', 'App\Http\Controllers\PermissionController@postEdit')->name('edit_permission');

        Route::get('add', 'App\Http\Controllers\PermissionController@getAdd')->name('detail1_permission');
        Route::post('add', 'App\Http\Controllers\PermissionController@postAdd')->name('add_permission');
        Route::get('delete/{id}', 'App\Http\Controllers\PermissionController@getDelete')->name('delete_permission');

    });

    Route::group(['prefix' => 'role', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\RoleController@getList')->name('list_role');

        Route::get('edit/{id}', 'App\Http\Controllers\RoleController@getEdit')->name('detail_role');
        Route::post('edit/{id}', 'App\Http\Controllers\RoleController@postEdit')->name('edit_role');

        Route::get('add', 'App\Http\Controllers\RoleController@getAdd')->name('detail1_role');
        Route::post('add', 'App\Http\Controllers\RoleController@postAdd')->name('add_role');
        Route::get('delete/{id}', 'App\Http\Controllers\RoleController@getDelete')->name('delete_role');

    });

    Route::group(['prefix' => 'ajax'], function () {

        Route::get('typeofnews/{id_category}', 'App\Http\Controllers\AjaxController@getTypeofnews');
        Route::get('categorynews', 'App\Http\Controllers\AjaxController@getCategorynews');

    });

    Route::group(['prefix' => 'videonews', 'middleware' => 'check'], function () {
        Route::get('list', 'App\Http\Controllers\VideonewsController@getList')->name('list_videonews');

        Route::get('edit/{id}', 'App\Http\Controllers\VideonewsController@getEdit')->name('detail_videonews');
        Route::post('edit/{id}', 'App\Http\Controllers\VideonewsController@postEdit')->name('edit_videonews');

        Route::get('add', 'App\Http\Controllers\VideonewsController@getAdd')->name('detail1_videonews');
        Route::post('add', 'App\Http\Controllers\VideonewsController@postAdd')->name('add_videonews');
        Route::get('delete/{id}', 'App\Http\Controllers\VideonewsController@getDelete')->name('delete_videonews');

    });

});
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('homepage', 'App\Http\Controllers\PagesController@homepage');
Route::get('contact', 'App\Http\Controllers\PagesController@contact');
Route::get('introduce', 'App\Http\Controllers\PagesController@introduce');

Route::get('category/{name_url}', 'App\Http\Controllers\PagesController@category');
Route::get('typeofnews/{name_url}', 'App\Http\Controllers\PagesController@typeofnews');
Route::get('news/{title_url}', 'App\Http\Controllers\PagesController@news');

// Route::get('category/{name_url}', 'App\Http\Controllers\PagesController@category');
// Route::get('typeofnews/{name_url}', 'App\Http\Controllers\PagesController@typeofnews');
// Route::get('news/{title_url}', 'App\Http\Controllers\PagesController@news');

Route::get('login', 'App\Http\Controllers\UserController@getLogin');
Route::post('login', 'App\Http\Controllers\UserController@postLogin');

Route::get('logout', 'App\Http\Controllers\UserController@getLogout');
Route::get('logout', 'App\Http\Controllers\UserController@getLogout');

Route::get('user', 'App\Http\Controllers\UserController@getUser')->name('user.detail1');
Route::post('user/{id}', 'App\Http\Controllers\UserController@postUser')->name('user.edit1');

Route::get('registration', 'App\Http\Controllers\UserController@getRegistration');
Route::post('registration', 'App\Http\Controllers\UserController@postRegistration');

Route::post('comment/{id}', 'App\Http\Controllers\CommentController@postComment');

////

Route::get('search', 'App\Http\Controllers\PagesController@search');

////
Route::get('/','App\Http\Controllers\PagesController@homepage1');

 Route::get('/{any}','App\Http\Controllers\PagesController@homepage1');
 Route::get('/{any}/{title_url}','App\Http\Controllers\PagesController@homepage1');
  Route::get('/{any}/{name_url}','App\Http\Controllers\PagesController@homepage1');

//@homepage ko dung url nen @homepage1
