<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ClientLoginController;
use App\Http\Controllers\Front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/lang-change', [HomeController::class ,'changLang'])->name('change_lang');

Route::post('/loginpost', [ClientLoginController::class ,'clientLogin'])->name('client.loginpost');
Route::post('/registerpost', [ClientLoginController::class ,'clientRegister'])->name('client.registerpost');
Route::get('/logout', [ClientLoginController::class ,'logout'])->name('client.logout');

Route::get('/','HomeController@index')->name('index');
Route::get('/about','HomeController@about')->name('about');
Route::get('/login','HomeController@login')->name('login');
Route::get('/contact-us','HomeController@contact')->name('contact');
Route::post('/contact-submit','HomeController@contactSubmit')->name('contactsubmit');
Route::get('/blogs','HomeController@blogs')->name('blogs');
Route::get('/blog-details/{id}','HomeController@blogDetails')->name('blogDetails');
Route::get('/education','HomeController@education')->name('education');
Route::get('/gifts/{id}','HomeController@gifts')->name('gifts');
Route::get('/servicemodal/{id}','HomeController@servicemodal')->name('servicemodal');
Route::post('/order-success','HomeController@orderSuccess')->name('ordersuccess');
Route::post('/search','HomeController@search')->name('search');
Route::get('/terms','HomeController@terms')->name('terms');
Route::get('/privacy','HomeController@privacy')->name('privacy');