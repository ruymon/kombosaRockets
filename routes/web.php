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
Route::group([], function () {
    Route::get('/admin', 'admin\AdminController@dataCount')->name('admin');

    Route::get('/admin/{user}/delete', 'admin\AdminController@delete')->name('admin.delete');
    Route::get('/admin/users', 'admin\AdminController@users')->name('admin.users');

    Route::get('admin/users/create', 'admin\AdminController@create')->name('admin.users.create');
    Route::post('admin/users', 'admin\AdminController@store')->name('admin.users.store');

    Route::get('/admin/{user}/edit', 'admin\AdminController@editUser')->name('admin.editUser');
    Route::post('/admin/{user}/update', 'admin\AdminController@updateUser')->name('admin.updateUser');

    Route::get('/admin/pdf', 'admin\AdminController@pdf');

    Route::get('/admin/manageNews', 'admin\AdminNewsController@indexNews')->name('admin.indexNews');
    Route::post('/admin/manageNews/create', 'admin\AdminNewsController@createNews')->name('admin.createNews');
    Route::get('/admin/{news}/deleteNews', 'admin\AdminNewsController@deleteNews')->name('admin.deleteNews');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
