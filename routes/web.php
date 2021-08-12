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
Route::get('/', 'HomeController@getHome');

Route::get('chi-tiet/{id}', 'HomeController@getDetail');

Route::get('cart', 'HomeController@getCart');
Route::post('cart', 'HomeController@postCart');
Route::get('update-cart', 'CartController@getUpdateCart');
Route::get('hoan-thanh', 'HomeController@getDone');
Route::post('review/{id}','ReviewController@addReview');
Route::get('category/{id}','CategoryController@getList');
Route::get('cart/add/{id}','CartController@addCart');
Route::get('cart/remove/{rowid}','CartController@removeCart');
Route::get('cart/ajaxadd','CartController@ajaxAddCart');

Route::get('login',['as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('login',['as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);

Route::get('logout','Admin\LoginController@getLogout');
Route::group(['prefix' => 'admin'], function() {
	Route::get('/','Admin\AdminController@getIndex');
	Route::group(['prefix'=>'user'],function (){ 
		Route::get('list','admin\UserController@getList'); 

		Route::get('add','admin\UserController@getAdd'); 
		Route::post('add','admin\UserController@postAdd'); 

		Route::get('edit/{id}','admin\UserController@getEdit'); 
		Route::post('edit/{id}','admin\UserController@postEdit');

		Route::get('del/{id}','admin\UserController@getDel'); 
	});

	Route::group(['prefix' => 'brand'], function() {
		Route::get('list','admin\BrandController@getList');
		Route::post('list','admin\BrandController@postList');
		Route::get('edit/{id}','admin\BrandController@getEdit');
		Route::post('edit/{id}','admin\BrandController@postEdit');

		Route::get('del/{id}', 'admin\BrandController@getDel');
	});

	Route::group(['prefix' => 'banner'], function() {
		Route::get('list','admin\BannerController@getList');
		Route::post('list','admin\BannerController@postList');
		Route::get('add/{id}','admin\BannerController@getAdd');
		Route::post('add/{id}','admin\BannerController@postAdd');
		Route::get('edit/{id}','admin\BannerController@getEdit');
		Route::post('edit/{id}','admin\BannerController@postEdit');

		Route::get('del/{id}', 'admin\BannerController@getDel');
	});

	Route::group(['prefix' => 'category'], function() {
		Route::get('add','admin\CategoryController@getAdd');
		Route::post('add','admin\CategoryController@postAdd');
		Route::get('edit/{id}','admin\CategoryController@getEdit');
		Route::post('edit/{id}','admin\CategoryController@postEdit');
		Route::get('del/{id}','admin\CategoryController@getDel');
		Route::get('list','admin\CategoryController@getList');
	});

	Route::group(['prefix' => 'listimg'], function() {
		Route::get('list/{id}','admin\ListimgController@getList');
		Route::post('list/{id}','admin\ListimgController@postList');
		Route::get('delimg/{id}','admin\ListimgController@getDel');
	});

	Route::group(['prefix' => 'product'], function() {
		Route::get('add','admin\ProductController@getAdd');
		Route::post('add','admin\ProductController@postAdd');
		Route::get('edit/{id}','admin\ProductController@getEdit');
		Route::post('edit/{id}','admin\ProductController@postEdit');
		Route::get('list', 'admin\ProductController@getList');
		Route::get('del/{id}', 'admin\ProductController@getDel');
	});

	Route::group(['prefix' => 'listcate'], function() {
		Route::get('list/{id}','admin\ListcateController@getList');
		Route::post('list/{id}','admin\ListcateController@postList');
		Route::get('delcate/{id}','admin\ListcateController@getDel');
	});

	Route::group(['prefix'=>'review'],function (){
		Route::get('/','admin\ReviewController@getList');
		Route::get('approve/{id}','admin\ReviewController@approve');
		Route::get('delete/{id}','admin\ReviewController@delete');
	});

	Route::group(['prefix'=>'order'],function (){
		Route::get('/','admin\OrderController@getList');
		Route::get('done/{id}','admin\OrderController@done');
		Route::get('detail/{id}','admin\OrderDetailController@getList');
	});

	Route::group(['prefix'=>'config'],function (){
		Route::get('/','admin\ConfigController@getConfig');
		Route::post('set','admin\ConfigController@set');
	});

	Route::group(['prefix'=>'report'],function (){
		Route::get('/', function (){
			return view('admin.report.report'); 
		});
		Route::get('getAll','admin\ReportController@getAll');
	});
});
