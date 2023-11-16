<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('lang_manager')->group(function(){

    Route::get('/lang/{locale}', [
        LangController::class,
        'change'
    ])->name('lang');

    Route::middleware('is_admin')->group(function(){
    
        Route::get('/categorias', [
            CategoriaController::class,
            'index'
        ])->name('categorias.index');
        
        Route::post('/categorias', [
            CategoriaController::class,
            'store'
        ])->name('categorias.store');
        
        Route::resource('/mascotas', MascotaController::class);

        Route::resource('/servicios', ServicioController::class);

        Route::resource('/cart', CartController::class)->except(['create', 'show', 'edit']);
    
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
