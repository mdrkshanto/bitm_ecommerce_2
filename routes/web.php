<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

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

Route::controller(FrontEndController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/category', 'category')->name('category');
    Route::get('/product', 'product')->name('product');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('create.category');
        Route::post('/category/store', 'store')->name('store.category');
        Route::get('/category/edit/{slug}', 'edit')->name('edit.category');
        Route::post('/update-category/{id}', 'update')->name('update.category');
        Route::post('/delete-category/{id}', 'delete')->name('delete.category');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/sub-category', 'index')->name('sub-category');
        Route::get('/sub-category/create', 'create')->name('create.sub-category');
        Route::post('/sub-category/store', 'store')->name('store.sub-category');
        Route::get('/sub-category/edit/{slug}', 'edit')->name('edit.sub-category');
        Route::post('/update-sub-category/{id}', 'update')->name('update.sub-category');
        Route::post('/delete-sub-category/{id}', 'delete')->name('delete.sub-category');
    });

    Route::controller(BrandController::class)->group(function (){
        Route::get('/brand','index')->name('brand');
        Route::get('/brand/create','create')->name('create.brand');
        Route::post('/brand/create','store')->name('create.brand');
        Route::get('/brand/edit/{slug}','edit')->name('edit.brand');
        Route::post('/brand/edit/{id}','update')->name('update.brand');
        Route::post('/brand/delete/{id}','delete')->name('delete.brand');
    });

    Route::controller(UnitController::class)->group(function (){
        Route::get('/unit','index')->name('unit');
        Route::get('/unit/create','create')->name('create.unit');
        Route::post('/unit/create','store')->name('create.unit');
        Route::get('/unit/edit/{slug}','edit')->name('edit.unit');
        Route::post('/unit/edit/{id}','update')->name('update.unit');
        Route::post('/unit/delete/{id}','delete')->name('delete.unit');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::get('/product','index')->name('product');
        Route::get('/product/create','create')->name('create.product');
        Route::post('/product/create','store')->name('create.product');
    });

});
