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

Route::get('/', 'App\Http\Controllers\CartController@shop')->name('shop');
Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart.index');
Route::post('/add', 'App\Http\Controllers\CartController@add')->name('cart.store');
Route::post('/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::post('/remove', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::post('/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');

Route::get('test', function(){
    return view('theme.frontoffice.pages.demo');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth'], 'as' => 'backoffice.'], function (){
    Route::resource('role','App\Http\Controllers\RoleController');
    Route::resource('permission','App\Http\Controllers\PermissionController');
    Route::resource('user','App\Http\Controllers\UserController');
});

