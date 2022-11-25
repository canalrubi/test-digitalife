<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductoImageController;

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


Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/products/new',      [ProductController::class, 'create']);
    Route::delete('/products/{id}',  [ProductController::class, 'destroy']);
    Route::resource('/products',     ProductController::class);
    Route::resource('/files',        ProductoImageController::class);
    

 });



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
