<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\WebNotificationController;

Auth::routes();
Route::get('/lang-change', [HomeController::class ,'changLang'])->name('user.lang.change');
Route::get('/login', [UserLoginController::class ,'showUserLoginForm'])->name('user.login');
Route::post('/login', [UserLoginController::class ,'userLogin'])->name('user.login.submit');
Route::get('/logout', [UserLoginController::class ,'logout'])->name('user.logout');

Route::name('user.')->middleware(['auth:web'])->group(function () {

    Route::post('/store-token', [WebNotificationController::class,'storeToken'])->name('store.token');
    Route::post('read/{id}', [WebNotificationController::class,'read'])->name('read_notification');


//    Route::middleware(['emp-access:dash'])->group(function () {

        Route::get('/','HomeController@index')->name('index');


        Route::name('users.')->prefix('users')->group(function(){
            Route::get('/','UsersController@index')->name('index');
            Route::get('/show/{id}','UsersController@show')->name('show');
            Route::post('/delete', 'UsersController@destroy')->name('delete');
            Route::get('/create','UsersController@create')->name('create');
            Route::post('/store','UsersController@store')->name('store');
            Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
            Route::post('/update', 'UsersController@update')->name('update');
        });

    Route::name('all_supervisors.')->prefix('all_supervisors')->group(function(){
        Route::get('/','SupervisorsController@index')->name('index');
        Route::get('/show/{id}','SupervisorsController@show')->name('show');
        Route::post('/delete', 'SupervisorsController@destroy')->name('delete');
        Route::get('/create','SupervisorsController@create')->name('create');
        Route::post('/store','SupervisorsController@store')->name('store');
        Route::get('/edit/{id}', 'SupervisorsController@edit')->name('edit');
        Route::post('/update', 'SupervisorsController@update')->name('update');
    });

    Route::name('messages.')->prefix('messages')->group(function(){
        Route::get('/','MessagesController@index')->name('index');
        Route::get('/show/{id}','MessagesController@show')->name('show');
        Route::post('/delete', 'MessagesController@destroy')->name('delete');
        Route::get('/create','MessagesController@create')->name('create');
        Route::post('/store','MessagesController@store')->name('store');
        Route::get('/edit/{id}', 'MessagesController@edit')->name('edit');
        Route::post('/update', 'MessagesController@update')->name('update');
        Route::get('/response/{id}', 'MessagesController@response')->name('response');
        Route::post('/send_response/{id}', 'MessagesController@send_response')->name('send_response');
    });

//    });

});
