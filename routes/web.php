<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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



// Front
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'indexfront'])->name('product.all');
Route::get('/products/{id}/detail', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/about', [AboutController::class, 'indexfront'])->name('about');
Route::get('/promo/{id}', [HomeController::class, 'promo'])->name('promo');

// login
Route::get('/login', [LoginController::class, 'login'])->name('front.login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('front.loginproses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('front.register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('front.registeruser');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('back.dashboard.index');
    })->name('dashboard');

    // Category
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

    // Brand
    Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/admin/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/admin/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/admin/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/admin/brand/{id}/update', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/admin/brand/{id}/delete', [BrandController::class, 'destroy'])->name('brand.delete');

    // Product
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/admin/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::get('/admin/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');

    // Promo
    Route::get('/admin/promos', [PromoController::class, 'index'])->name('promo.index');
    Route::get('/admin/promos/create', [PromoController::class, 'create'])->name('promo.create');
    Route::get('/admin/promos/{id}/show', [PromoController::class, 'show'])->name('promo.show');
    Route::post('/admin/promos/store', [PromoController::class, 'store'])->name('promo.store');
    Route::get('/admin/promos/{id}/edit', [PromoController::class, 'edit'])->name('promo.edit');
    Route::post('/admin/promos/{id}/update', [PromoController::class, 'update'])->name('promo.update');
    Route::get('/admin/promos/{id}/delete', [PromoController::class, 'destroy'])->name('promo.delete');

    // Banner
    Route::get('/admin/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/admin/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/admin/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/admin/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/admin/banner/{id}/update', [BannerController::class, 'update'])->name('banner.update');
    Route::get('/admin/banner/{id}/delete', [BannerController::class, 'destroy'])->name('banner.delete');

    // About Us
    Route::get('/admin/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/admin/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/admin/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/admin/about/{id}/update', [AboutController::class, 'update'])->name('about.update');
    Route::get('/admin/about/{id}/delete', [AboutController::class, 'destroy'])->name('about.delete');
});