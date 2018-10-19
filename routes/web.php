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

Route::group(['middleware'=>'web'], function () {
    Route::get('/', 'FrontController@get_all');
    Route::post('/send','FrontController@send')->name("send.mail");
});

Route::group(['prefix'=>'res_admin','namespace'=>'admin','middleware'=>'auth'],function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/staff','StaffController');
    Route::resource('/slider','SliderController');
    Route::post('/slider/update-order', 'SliderController@change_image_order');
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
});

Auth::routes();




