<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', [App\Http\Controllers\Admin\LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login.post');
    Route::get('logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
    });
});

Route::group(['prefix'  =>  'products'], function () {

    Route::get('/', [App\Http\Controllers\Admin\ProductsController::class,'index'])->name('admin.products.index');
    Route::get('/create', [App\Http\Controllers\Admin\ProductsController::class,'create'])->name('admin.products.create');
    Route::post('/store', [App\Http\Controllers\Admin\ProductsController::class,'store'])->name('admin.products.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Admin\ProductsController::class,'edit'])->name('admin.products.edit');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\ProductsController::class,'update'])->name('admin.products.update');
    Route::get('/{id}/delete', [App\Http\Controllers\Admin\ProductsController::class,'destroy'])->name('admin.products.destroy');
}); 

Route::group(['prefix'  =>  'contacts'], function () {

    Route::get('/', [App\Http\Controllers\Admin\ContactoController::class,'index'])->name('admin.contactos.index');
    Route::get('/create', [App\Http\Controllers\Admin\ContactoController::class,'create'])->name('admin.contactos.create');
    Route::post('/store', [App\Http\Controllers\Admin\ContactoController::class,'store'])->name('admin.contactos.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Admin\ContactoController::class,'edit'])->name('admin.contactos.edit');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\ContactoController::class,'update'])->name('admin.contactos.update');
    Route::get('/{id}/delete', [App\Http\Controllers\Admin\ContactoController::class,'destroy'])->name('admin.contactos.destroy');
}); 

Route::group(['prefix'  =>  'categories'], function () {

    Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class,'index'])->name('admin.categories.index');
    Route::get('/create', [App\Http\Controllers\Admin\CategoriesController::class,'create'])->name('admin.categories.create');
    Route::post('/store', [App\Http\Controllers\Admin\CategoriesController::class,'store'])->name('admin.categories.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Admin\CategoriesController::class,'edit'])->name('admin.categories.edit');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\CategoriesController::class,'update'])->name('admin.categories.update');
    Route::get('/{id}/delete', [App\Http\Controllers\Admin\CategoriesController::class,'destroy'])->name('admin.categories.destroy');
}); 

Route::group(['prefix'  =>  'faqs'], function () {

    Route::get('/', [App\Http\Controllers\Admin\FAQController::class,'index'])->name('admin.faqs.index');
    Route::get('/create', [App\Http\Controllers\Admin\FAQController::class,'create'])->name('admin.faqs.create');
    Route::post('/store', [App\Http\Controllers\Admin\FAQController::class,'store'])->name('admin.faqs.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Admin\FAQController::class,'edit'])->name('admin.faqs.edit');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\FAQController::class,'update'])->name('admin.faqs.update');
    Route::get('/{id}/delete', [App\Http\Controllers\Admin\FAQController::class,'destroy'])->name('admin.faqs.destroy');
}); 

Route::group(['prefix'  =>  'coments'], function () {

    Route::get('/', [App\Http\Controllers\Admin\ComentarioController::class,'index'])->name('admin.comentarios.index');
    Route::get('/create', [App\Http\Controllers\Admin\ComentarioController::class,'create'])->name('admin.comentarios.create');
    Route::post('/store', [App\Http\Controllers\Admin\ComentarioController::class,'store'])->name('admin.comentarios.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Admin\ComentarioController::class,'edit'])->name('admin.comentarios.edit');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\ComentarioController::class,'update'])->name('admin.comentarios.update');
    Route::get('/{id}/delete', [App\Http\Controllers\Admin\ComentarioController::class,'destroy'])->name('admin.comentarios.destroy');
}); 