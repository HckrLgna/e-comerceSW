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

Route::get('/','App\Http\Controllers\HomeController@index')->name('home.');

Route::post('/loggin',[App\Http\Controllers\LoginController::class, 'login'])
    ->name('loggin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify'=>true]);
    Route::group(['middleware' => ['auth']],function (){
        Route::get('ecomerce','App\Http\Controllers\EcomerceController@index')->name('ecomerce');
        Route::get('ecomerce/mostrar/{evento}','App\Http\Controllers\EcomerceController@mostrar')->name('ecomerce.mostrar');
        Route::post('ecomerce/{fotografia}/comprar','App\Http\Controllers\EcomerceController@guardarFotografia')->name('ecomerce.comprar');
        Route::get('admin','App\Http\Controllers\AdminController@show')
            ->name('admin.show');

        Route::resource('fotografo','App\Http\Controllers\FotografoController',);
        Route::get('fotografo/{fotografo}/profile','App\Http\Controllers\FotografoController@showProfile')->name('fotografo.showProfile');
        Route::post('fotografia/{evento}/store','App\Http\Controllers\FotografiaController@store')->name('fotografia.store');
        Route::resource('cliente','App\Http\Controllers\ClienteController');

        Route::resource('plan','App\Http\Controllers\PlanController');

        Route::resource('evento','App\Http\Controllers\EventoController');

        Route::get('evento/{evento}/participantes','App\Http\Controllers\EventoController@participantes')->name('evento.participantes');
        Route::get('evento/{evento}/album','App\Http\Controllers\EventoController@album')->name('evento.album');
        Route::get('evento/{evento}/invitacion','App\Http\Controllers\EventoController@indexInvitacion')->name('evento.index.invitacion');

        Route::get('registrar/{evento}/usuario','App\Http\Controllers\EventoController@registrarUsuario')->name('registrarusuario');

        Route::post('suscripcion','App\Http\Controllers\SuscripcionController@store')->name('suscripcion.store');
        Route::get('/check-out/{id}', [\App\Http\Controllers\PlanController::class, 'pagos'])
            ->name('check-out',);
        Route::post('/checkout/{id}',[\App\Http\Controllers\SuscripcionController::class, 'store'])
            ->name('checkout-input');
    });

Route::group(['middleware'=>['auth'], 'as' => 'backoffice.'], function (){
    Route::resource('role','App\Http\Controllers\RoleController');
    Route::resource('permission','App\Http\Controllers\PermissionController');
    Route::resource('user','App\Http\Controllers\UserController');
    Route::get('admin','App\Http\Controllers\AdminController@show')
        ->name('admin.show');
});

Route::get('suscripcion','App\Http\Controllers\SuscripcionController@index')->name('suscripcion.index')->excludedMiddleware(['middleware' => ['auth']]);
Route::get('evento/create','App\Http\Controllers\EventoController@create')->name('evento.create')->excludedMiddleware(['middleware' => ['auth']]);
Route::post('evento','App\Http\Controllers\EventoController@store')->name('evento.store')->excludedMiddleware(['middleware' => ['auth']]);
Route::get('fotografo/create','App\Http\Controllers\FotografoController@create')->name('fotografo.create')->excludedMiddleware(['middleware' => ['auth']]);
Route::post('fotografo','App\Http\Controllers\FotografoController@store')->name('fotografo.store')->excludedMiddleware(['middleware' => ['auth']]);
Route::post('cliente/profile/edit/','App\Http\Controllers\ClienteController@subirFotoPerfil')->name('cliente.subir_fotografia');
Route::post('ecomerce/filtrar','App\Http\Controllers\EcomerceController@filtrarReconocimiento')->name('ecomerce.filtrar');
