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


Route::get('/', 'HomePageController@index')->name('home');;

Route::prefix('/homepage')->group(function() {
    Route::get('/', 'HomePageController@index')->name('homepage');
    Route::get('detail/{id}/{slug}.html', 'HomePageController@show');
});

Route::resource('comment', 'CommentProductController')->only([
    'index', 'create' ,'store', 'destroy'
]);
Route::resource('childcomment', 'ChildCommentProductController')->only([
     'index', 'create' ,'store', 'destroy'
]);

Route::group(['prefix' => 'cart'], function() {
    Route::get('/', 'CartController@index')->name('show');
    Route::get('add/{id}', 'CartController@show')->name('cart.show');
    Route::get('delete/{id}', 'CartController@destroy')->name('cart.destroy');
    Route::get('update', 'CartController@store')->name('cart.update');
});

Route::resource('order', 'OrderController')->only([
     'index', 'create', 'show'
]);
Route::resource('suggest', 'SuggestUserController')->only([
     'index', 'store'
]);
Route::resource('profile', 'ProfileUserController')->only([
     'index', 'update'
]);
Route::resource('changepasswword', 'ChangePasswordserController')->only([
     'index', 'update'
]);

Route::get('categories/{id}/{slug}.html', 'CategoriesController@show');
Route::get('search', 'HomePageController@store')->name('search');

Route::group(['prefix' => 'admin', 'middleware'=>'CheckLevel', 'namespace' => 'Admin'], function() {
    Route::resource('statistic', 'StatisticProductController');
    Route::resource('product', 'AdminProductController');
    Route::resource('productorder', 'AdminOrderController');
    Route::resource('category', 'AdminCategoriesController');
    Route::resource('users', 'AdminUserController');
    Route::resource('comments', 'AdminCommentController');
    Route::resource('childcomment', 'AdminChildCommentController');
    Route::resource('suggests', 'SuggestAdminCommentController');
});

Auth::routes();
Route::get('logout', 'AuthController@logout')->name('Logout');
Route::post('/login', 'AuthController@login');
