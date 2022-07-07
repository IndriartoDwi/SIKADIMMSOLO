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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/check-access', 'HomeController@rbacCheck')->name('check-access');
Route::post('/check-access', 'HomeController@chooseRole')->name('choose-role');
Route::get('/menus', 'HomeController@loadMenu')->name('load-menu');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('rbac:beranda');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', 'UsersController@index')->name('users')->middleware('rbac:pengguna');
        Route::get('/data', 'UsersController@data')->name('users.data')->middleware('rbac:pengguna');
        Route::post('/store', 'UsersController@store')->name('users.store')->middleware('rbac:pengguna,2');
        Route::patch('/update', 'UsersController@update')->name('users.update')->middleware('rbac:pengguna,3');
        Route::patch('/switch', 'UsersController@switchStatus')->name('users.switch')->middleware('rbac:pengguna,3');
        Route::delete('/delete', 'UsersController@delete')->name('users.delete')->middleware('rbac:pengguna,4');
        Route::patch('/update/roles', 'UsersController@updateRole')->name('users.update.roles')->middleware('rbac:pengguna,3');
        Route::patch('/reset-password', 'UsersController@resetPassword')->name('users.reset-password')->middleware('rbac:pengguna,3');
        Route::patch('/change-password', 'UsersController@changePassword')->name('users.change-password');
    });

    Route::prefix('manajemen-menu')->group(function () {
        Route::get('/', 'MenusController@index')->name('manajemen-menu')->middleware('rbac:manajemen_menu');
        Route::get('/data', 'MenusController@data')->name('manajemen-menu.data')->middleware('rbac:manajemen_menu');
        Route::post('/store', 'MenusController@store')->name('manajemen-menu.store')->middleware('rbac:manajemen_menu,2');
        Route::patch('/update', 'MenusController@update')->name('manajemen-menu.update')->middleware('rbac:manajemen_menu,3');
        Route::delete('/delete', 'MenusController@delete')->name('manajemen-menu.delete')->middleware('rbac:manajemen_menu,4');

        Route::get('/get/main-menu', 'MenusController@getMainMenu')->name('manajemen-menu.get.main-menu')->middleware('rbac:manajemen_menu');
    });

    Route::prefix('otoritas')->group(function () {
        Route::get('/', 'OtoritasController@index')->name('otoritas')->middleware('rbac:otoritas');
        Route::get('/data', 'OtoritasController@data')->name('otoritas.data')->middleware('rbac:otoritas');
        Route::post('/store', 'OtoritasController@store')->name('otoritas.store')->middleware('rbac:otoritas,2');
        Route::patch('/update', 'OtoritasController@update')->name('otoritas.update')->middleware('rbac:otoritas,3');
        Route::delete('/delete', 'OtoritasController@delete')->name('otoritas.delete')->middleware('rbac:otoritas,4');

        Route::get('/permission/{slug}', 'OtoritasController@formPermission')->name('otoritas.open.permission')->middleware('rbac:otoritas,3');
        Route::patch('/permission', 'OtoritasController@submitPermission')->name('otoritas.submit.permission')->middleware('rbac:otoritas,3');
    });
});
