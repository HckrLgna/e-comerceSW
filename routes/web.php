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

Route::get('/','App\Http\Controllers\EcomerceController@index');

Auth::routes();
;
Route::post('/loggin',[App\Http\Controllers\LoginController::class, 'login'])
    ->name('loggin');

Route::get('/shop', 'App\Http\Controllers\CartController@shop')->name('shop');
Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart.index');
Route::post('/add', 'App\Http\Controllers\CartController@add')->name('cart.store');
Route::post('/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::post('/remove', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::post('/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');

Route::get('test', function(){
    return view('theme.frontoffice.pages.admin.register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth'], 'as' => 'backoffice.'], function (){
    Route::resource('role','App\Http\Controllers\RoleController');
    Route::resource('permission','App\Http\Controllers\PermissionController');
    Route::resource('user','App\Http\Controllers\UserController');

    Route::get('admin','App\Http\Controllers\AdminController@show')
        ->name('admin.show');
});

Route::get('ecomerce','App\Http\Controllers\EcomerceController@index')->name('ecomerce');
Route::post('ecomerce/mostrar','App\Http\Controllers\EcomerceController@mostrar')->name('ecomerce.mostrar');
Route::get('ecomerce/{fotografia}/comprar','App\Http\Controllers\EcomerceController@guardarFotografia')->name('ecomerce.comprar');
Route::get('admin','App\Http\Controllers\AdminController@show')
    ->name('admin.show');

Route::get('about','App\Http\Controllers\HomeController@about')->name('about');
Route::resource('fotografo','App\Http\Controllers\FotografoController');
Route::resource('plan','App\Http\Controllers\PlanController');
Route::resource('evento','App\Http\Controllers\EventoController');
Route::resource('cliente','App\Http\Controllers\ClienteController');

Route::get('evento/{evento}/participantes','App\Http\Controllers\EventoController@participantes')->name('evento.participantes');
Route::get('evento/{evento}/album','App\Http\Controllers\EventoController@album')->name('evento.album');

Route::post('fotografia/{evento}/store','App\Http\Controllers\FotografiaController@store')->name('fotografia.store');


Route::get('suscripcion','App\Http\Controllers\SuscripcionController@index')->name('suscripcion.index');
Route::post('suscripcion','App\Http\Controllers\SuscripcionController@store')->name('suscripcion.store');
Route::get('/check-out/{id}', [\App\Http\Controllers\PlanController::class, 'pagos'])
    ->name('check-out',);
Route::post('/checkout/{id}',[\App\Http\Controllers\SuscripcionController::class, 'store'])
    ->name('checkout-input');
