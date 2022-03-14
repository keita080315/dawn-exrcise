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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::middleware(['auth'])->group(function () {
//ログイン中のページ
    Route::get('/top','PostsController@index');

    Route::get('/profile','UsersController@profile');

    Route::get('/search','UsersController@index')->name('search');
    Route::post('/search_mode','UsersController@search')->name('search_mode');
    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');


    Route::get('/userinfo', 'UsersController@detail')->name('userinfo');

    Route::post('/post','PostsController@post')->name('post');
    Route::get('/update_content','UsersController@update')->name('update_content');
    Route::post('/modify_content','UsersController@modify')->name('modify_content');
    Route::get('/logout','Auth\LoginController@logout');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('homa');
