<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\HomeController;

Auth::routes();

Route::get('/lang-change', [HomeController::class ,'changLang'])->name('admin.lang.change');
Route::get('/login', [AdminLoginController::class ,'showAdminLoginForm'])->name('admin.login');
Route::post('/login', [AdminLoginController::class ,'adminLogin'])->name('admin.login.submit');
Route::get('/logout', [AdminLoginController::class ,'logout'])->name('admin.logout');

Route::name('admin.')->middleware(['auth:admin'])->group(function () {

    Route::middleware(['emp-access:dash'])->group(function () {

        Route::get('/','HomeController@index')->name('index');

        Route::name('settings.')->prefix('settings')->group(function(){
            Route::get('/edit/{id}', 'SettingsController@edit')->name('edit');
            Route::post('/update', 'SettingsController@update')->name('update');
        });

        Route::name('employees.')->prefix('employees')->group(function(){
            Route::get('/','EmployeesController@index')->name('index');
            Route::get('/show/{id}','EmployeesController@show')->name('show');
            Route::post('/delete', 'EmployeesController@destroy')->name('delete');
            Route::get('/create','EmployeesController@create')->name('create');
            Route::post('/store','EmployeesController@store')->name('store');
            Route::get('/edit/{id}', 'EmployeesController@edit')->name('edit');
            Route::post('/update', 'EmployeesController@update')->name('update');
        });

        Route::name('users.')->prefix('users')->group(function(){
            Route::get('/','UsersController@index')->name('index');
            Route::get('/show/{id}','UsersController@show')->name('show');
            Route::post('/delete', 'UsersController@destroy')->name('delete');
            Route::get('/create','UsersController@create')->name('create');
            Route::post('/store','UsersController@store')->name('store');
            Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
            Route::post('/update', 'UsersController@update')->name('update');
        });

        Route::name('sliders.')->prefix('sliders')->group(function(){
            Route::get('/','SlidersController@index')->name('index');
            Route::post('/delete', 'SlidersController@destroy')->name('delete');
            Route::post('/store','SlidersController@store')->name('store');
            Route::get('/edit/{id}', 'SlidersController@edit')->name('edit');
            Route::post('/update', 'SlidersController@update')->name('update');
        });

        Route::name('contacts.')->prefix('contacts')->group(function(){
            Route::get('/','ContactsController@index')->name('index');
            Route::get('/show/{id}','ContactsController@show')->name('show');
            Route::post('/delete', 'ContactsController@destroy')->name('delete');
            Route::post('/store','ContactsController@store')->name('store');
            Route::get('/edit/{id}', 'ContactsController@edit')->name('edit');
            Route::post('/update', 'ContactsController@update')->name('update');
        });

        Route::name('pages.')->prefix('pages')->group(function(){
            Route::get('/','PagesController@index')->name('index');
            Route::get('/show/{id}','PagesController@show')->name('show');
            Route::post('/delete', 'PagesController@destroy')->name('delete');
            Route::get('/create','PagesController@create')->name('create');
            Route::post('/store','PagesController@store')->name('store');
            Route::get('/edit/{id}', 'PagesController@edit')->name('edit');
            Route::post('/update', 'PagesController@update')->name('update');
        });

        Route::name('categorys.')->prefix('categorys')->group(function(){
            Route::get('/','CategorysController@index')->name('index');
            Route::post('/delete', 'CategorysController@destroy')->name('delete');
            Route::post('/store','CategorysController@store')->name('store');
            Route::get('/edit/{id}', 'CategorysController@edit')->name('edit');
            Route::post('/update', 'CategorysController@update')->name('update');
        });

        Route::name('countries.')->prefix('countries')->group(function(){
            Route::get('/','CountriesController@index')->name('index');
            Route::post('/delete', 'CountriesController@destroy')->name('delete');
            Route::post('/store','CountriesController@store')->name('store');
            Route::get('/edit/{id}', 'CountriesController@edit')->name('edit');
            Route::post('/update', 'CountriesController@update')->name('update');
        });

        Route::name('citys.')->prefix('citys')->group(function(){
            Route::get('/','CitysController@index')->name('index');
            Route::post('/delete', 'CitysController@destroy')->name('delete');
            Route::post('/store','CitysController@store')->name('store');
            Route::get('/edit/{id}', 'CitysController@edit')->name('edit');
            Route::post('/update', 'CitysController@update')->name('update');
        });

        Route::name('neighborhoods.')->prefix('neighborhoods')->group(function(){
            Route::get('/','NeighborhoodsController@index')->name('index');
            Route::post('/delete', 'NeighborhoodsController@destroy')->name('delete');
            Route::post('/store','NeighborhoodsController@store')->name('store');
            Route::post('/fetchState','NeighborhoodsController@fetchState')->name('fetchState');
            Route::get('/edit/{id}', 'NeighborhoodsController@edit')->name('edit');
            Route::post('/update', 'NeighborhoodsController@update')->name('update');
        });

    });

});
