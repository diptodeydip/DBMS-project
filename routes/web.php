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
//Frontend Site.......
Route::get('/', 'HomeController@index');


//Backend Routes......
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin_dashboard', 'AdminController@admin_dashboard');
Route::get('/logout', 'SuperAdminController@logout');

//Category Related route
Route::get('/add_category', 'CategoryController@index');
Route::get('/all_category', 'CategoryController@all_category');
Route::post('/save_category', 'CategoryController@save_category');
Route::get('/inactive_category/{id}', 'CategoryController@inactive_category');
Route::get('/active_category/{id}', 'CategoryController@active_category');
Route::get('/edit_category/{id}', 'CategoryController@edit_category');
Route::post('/update_category/{id}', 'CategoryController@update_category');
Route::get('/delete_category/{id}', 'CategoryController@delete_category');

//Manufacture or Brands routes are here

Route::get('/add_manufacture', 'ManufactureController@index');
Route::post('/save_manufacture', 'ManufactureController@save_manufacture');
Route::get('/all_manufacture', 'ManufactureController@all_manufacture');
Route::get('/delete_manufacture/{id}', 'ManufactureController@delete_manufacture');
Route::get('/inactive_manufacture/{id}', 'ManufactureController@inactive_manufacture');
Route::get('/edit_manufacture/{id}', 'ManufactureController@edit_manufacture');
Route::post('/update_manufacture/{id}', 'ManufactureController@update_manufacture');
Route::get('/active_manufacture/{id}', 'ManufactureController@active_manufacture');



//Product related routes
Route::get('/add_product', 'ProductController@index');
Route::post('/save_product', 'ProductController@save_product');
Route::get('/all_product', 'ProductController@all_product');
Route::get('/inactive_product/{id}', 'ProductController@inactive_product');
Route::get('/active_product/{id}', 'ProductController@active_product');
Route::get('/delete_product/{id}', 'ProductController@delete_product');
Route::get('/edit_product/{id}', 'ProductController@edit_product');
Route::post('/update_product/{id}', 'ProductController@update_product');
Route::get('/products', 'HomeController@products');
Route::get('/inactive_featured_status/{id}', 'ProductController@inactive_featured_status');
Route::get('/active_featured_status/{id}', 'ProductController@active_featured_status');
Route::get('/outofstock/{id}', 'ProductController@outofstock');
Route::get('/available/{id}', 'ProductController@available');
Route::get('/all_product_images/{id}', 'ProductController@all_images');
Route::get('/inactive_rec_status/{id}', 'ProductController@inactive_rec_status');
Route::get('/active_rec_status/{id}', 'ProductController@active_rec_status');
Route::get('/availableproducts', 'HomeController@availableproducts');
Route::get('/outofstockproducts', 'HomeController@outofstockproducts');

//review related
Route::post('/post_review', 'ReviewController@post_review');
Route::get('/delete_review/{id}', 'ReviewController@delete_review');


//show category/price wise product
Route::get('/product_by_category/{id}', 'HomeController@product_by_category');
Route::get('/product_by_manufacture/{id}', 'HomeController@product_by_manufacture');
Route::post('/product_by_search', 'HomeController@product_by_search');
Route::post('/search', 'HomeController@product_by_search2');

//Product showing
Route::get('/view_product/{id}', 'HomeController@view_product');
Route::get('/all_images/{id}', 'HomeController@all_images');

//User login
Route::get('/user_login_page', 'UserController@user_login_page');
Route::get('/user_registration_page', 'UserController@user_registration_page');
Route::post('/user_registration', 'UserController@user_registration');
Route::post('/user_login','UserController@user_login');
Route::get('/user_profile', 'UserController@user_profile');
Route::post('/user_info_registration', 'UserController@user_info_registration');
Route::get('/logout_user', 'UserController@logout');
Route::get('/user_profile_edit', 'UserController@user_profile_edit');
Route::post('/user_info_update', 'UserController@user_info_update');
Route::get('/emailVerified/{id}', 'UserController@verify_Email');
Route::get('/forgot_password', 'UserController@forgot_password');
Route::post('/send_password', 'UserController@send_password');

//User products

Route::get('/post_a_ad', 'UserController@post_a_ad');
Route::get('/my_ads', 'HomeController@my_ads');
Route::post('/save_ad', 'HomeController@save_ad');
Route::get('/edit_ad/{id}', 'HomeController@edit_ad');
Route::post('/update_ad/{id}', 'HomeController@update_ad');
Route::get('/delete_ad/{id}', 'HomeController@delete_ad');



//Sliders

Route::get('/add_slider', 'SliderController@add_slider');
Route::get('/all_slider', 'SliderController@all_slider');
Route::post('/save_slider', 'SliderController@save_slider');
Route::get('/inactive_slider/{id}', 'SliderController@inactive_slider');
Route::get('/active_slider/{id}', 'SliderController@active_slider');
Route::get('/delete_slider/{id}', 'SliderController@delete_slider');


