<?php

use Illuminate\Support\Facades\Route;

require_once 'admin.php';

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/productos', 'App\Http\Controllers\ProductsController');

Route::resource('/in_shopping_carts', 'App\Http\Controllers\ProductInShoppingCartController',['only'=> 'store', 'destroy']);

Route::get('/carrito', 'App\Http\Controllers\ShoppingCartController@show')->name('shopping_cart.show');

Route::get('/carrito/productos', 'App\Http\Controllers\ShoppingCartController@products')->name('shopping_car.products');

Route::resource('/contactos', 'App\Http\Controllers\ContactoController');

Route::resource('/comentarios', 'App\Http\Controllers\ComentarioController');

Route::resource('/faq', 'App\Http\Controllers\FAQController');

Route::resource('/api/comentarios', 'App\Http\Controllers\Api\ComentarioController');

Route::resource('/api/faqs', 'App\Http\Controllers\Api\FAQController');

Route::resource('/api/contactos', 'App\Http\Controllers\Api\ContactoController');

Route::resource('/api/productos', 'App\Http\Controllers\Api\ProductsController');
