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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/article', 'HomeController@index');
Route::get('/article/{id}', 'HomeController@show');

Route::post('/comment/store', 'CommentController@store');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('home', 'HomeController@index');


//    Route::get('article', 'ArticleController@index');
//    Route::get('article/create', 'ArticleController@create');
//    Route::post('article', 'ArticleController@store');
//    Route::get('article/{id}/edit', 'ArticleController@edit');
    Route::resource('article', 'ArticleController');

    Route::get('category', 'CategoryController@index');
    Route::post('category/store', 'CategoryController@store');
    Route::get('category/edit/{id}', 'CategoryController@edit');
    Route::get('category/delete/{id}', 'CategoryController@destroy');

    Route::resource('image', 'ImageController');
});
