<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SupervisorLoginController;
use App\Http\Controllers\SupervisorDashboard\HomeController;
use App\Http\Controllers\SupervisorDashboard\WebNotificationController;

Auth::routes();

Route::get('/lang-change', [HomeController::class ,'changLang'])->name('supervisor.lang.change');
Route::get('/login', [SupervisorLoginController::class ,'showSupervisorLoginForm'])->name('supervisor.login');
Route::post('/login', [SupervisorLoginController::class ,'supervisorLogin'])->name('supervisor.login.submit');
Route::get('/logout', [SupervisorLoginController::class ,'logout'])->name('supervisor.logout');

Route::name('supervisor.')->middleware(['auth:supervisor'])->group(function () {

    Route::middleware(['supervisor-access:supervisor'])->group(function () {

        Route::post('/store-token', 'WebNotificationController@storeToken')->name('store.token');
        Route::post('read/{id}', 'WebNotificationController@read')->name('read_notification');

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
        Route::name('all_supervisors.')->prefix('all_supervisors')->group(function(){
            Route::get('/','SupervisorsController@index')->name('index');
            Route::get('/show/{id}','SupervisorsController@show')->name('show');
            Route::post('/delete', 'SupervisorsController@destroy')->name('delete');
            Route::get('/create','SupervisorsController@create')->name('create');
            Route::post('/store','SupervisorsController@store')->name('store');
            Route::get('/edit/{id}', 'SupervisorsController@edit')->name('edit');
            Route::post('/update', 'SupervisorsController@update')->name('update');
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
        Route::name('branches.')->prefix('branches')->group(function(){
            Route::get('/','branchesController@index')->name('index');
            Route::post('/delete', 'branchesController@destroy')->name('delete');
            Route::post('/store','branchesController@store')->name('store');
            Route::get('/edit/{id}', 'branchesController@edit')->name('edit');
            Route::post('/update', 'branchesController@update')->name('update');
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
