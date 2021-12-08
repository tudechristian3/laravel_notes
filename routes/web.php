<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function(){
    Auth::routes();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
    Route::get('profile', 'App\Http\Controllers\AdminController@profile')->name('admin.profile');
    Route::get('blog', 'App\Http\Controllers\AdminController@blog')->name('admin.blog');
});

Route::group(['prefix' => 'user', 'middleware' =>['isUser', 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', 'App\Http\Controllers\UserController@index')->name('user.dashboard');
    Route::get('profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
    Route::get('blog', 'App\Http\Controllers\UserController@blog')->name('user.blog');
});
