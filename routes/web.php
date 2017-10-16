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

Route::get('/', 'IndexController@execute')->name('home.show');
Route::post('/', 'IndexController@contact')->name('home.contact');
Route::get('/page/{alias}', 'PageController@execute')->name('page');

Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
   Route::get('/', function() {

   });

   Route::group(['prefix' => 'pages'], function () {
       Route::get('/', 'Admin\PagesController@execute')->name('admin.pages');
       Route::match(['get','post'], '/add', 'Admin\PagesAddController@execute')->name('admin.pages.add');
       Route::match(['get','post', 'delete'], '/edit/{page}', 'Admin\PagesEditController@execute')->name('admin.pages.edit');
   });

    Route::group(['prefix' => 'portfolios'], function () {
        Route::get('/', 'Admin\PortfolioController@execute')->name('admin.portfolio');
        Route::match(['get','post'], '/add', 'Admin\PortfolioAddController@execute')->name('admin.portfolio.add');
        Route::match(['get','post', 'delete'], '/edit/{portfolio}', 'Admin\PortfolioEditController@execute')->name('admin.portfolio.edit');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', 'Admin\ServiceController@execute')->name('admin.service');
        Route::match(['get','post'], '/add', 'Admin\ServiceAddController@execute')->name('admin.service.add');
        Route::match(['get','post', 'delete'], '/edit/{service}', 'Admin\ServiceEditController@execute')->name('admin.service.edit');
    });
});

