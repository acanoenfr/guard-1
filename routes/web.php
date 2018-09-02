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

Route::get('/', 'PagesController@index')->name('index');

Route::get('/forget', 'PasswordController@forget')->name('forget');
Route::post('/forget', 'PasswordController@postForget')->name('postForget');

Route::get('/reset', 'PasswordController@noReset')->name('noReset');
Route::get('/reset/{token}', 'PasswordController@reset')->name('reset');
Route::post('/reset/{token}', 'PasswordController@postReset')->name('postReset');

Route::get('/login', 'PagesController@login')->name('login');
Route::post('/login', 'PagesController@postLogin')->name('postLogin');

Route::get('/logout', 'PagesController@logout')->name('logout');

Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
Route::post('/dashboard', 'AuthController@postDashboard')->name('postDashboard');

Route::get('/account', 'AuthController@account')->name('account');
Route::patch('/account', 'AuthController@postAccount')->name('postAccount');

Route::resource('/users', 'UsersController');
Route::resource('/members', 'MembersController');