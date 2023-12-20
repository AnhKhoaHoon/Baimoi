<?php
use App\Http\Controllers\QueryBuilder\ProductController;
use App\Http\Controllers\QueryBuilder\CategoryController;

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');
        Route::get('index','index')->name('index');
    });
    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('index','index')->name('index');
    });
});
Route::prefix('querybuilder')->name('querybuilder.')->group(function () {

    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');
        Route::get('index','index')->name('index');
    });
    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('index','index')->name('index');
        Route::get('destroy/{id}','destroy')->name('destroy');
    });
});
