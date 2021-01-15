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
    return view('welcome');
});

Auth::routes();

// Admin only
Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/admin', 'admin\AdminController@index')->name('admin');

    Route::get('/admin/{id}/delete', 'admin\AdminController@delete')->name('admin.delete');

    Route::get('/admin/users', 'admin\AdminController@users')->name('admin.users');

    Route::get('/admin/{id}/edit', 'admin\AdminController@editUser')->name('admin.editUser');
    Route::post('/admin/{id}/update', 'admin\AdminController@updateUser')->name('admin.updateUser');

    Route::get('/admin/pdf', 'admin\AdminController@pdf')->middleware('admin');
    Route::get('/admin/noFeature', 'admin\AdminController@noFeature')->name('admin.noFeature');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
