<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\Auth\LoginController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', 'App\Http\Controllers\HomeController@redirectAdmin')->name('index');
// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
      
        Route::get('/',  'App\Http\Controllers\Backend\DashboardController@index')->name('admin.dashboard');
        Route::resource('roles', 'App\Http\Controllers\Backend\RolesController', ['names' => 'admin.roles']);
        //Route::resource('users', 'App\Http\Controllers\Backend\UsersController', ['names' => 'admin.users']);
        Route::resource('admins', 'App\Http\Controllers\Backend\AdminsController', ['names' => 'admin.admins']);
       
        // Login Routes
        Route::get('/login', 'App\Http\Controllers\Backend\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('/login/submit', 'App\Http\Controllers\Backend\Auth\LoginController@login')->name('admin.login.submit');

        // Logout Routes
         Route::post('/logout/submit', 'App\Http\Controllers\Backend\Auth\LoginController@logout')->name('admin.logout.submit');   
       
});