<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\BuyerController;

Route::middleware(['guest'])->group( function (){
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/category', [FrontendController::class, 'category'])->name('frontend.category');
Route::get('/detail', [FrontendController::class, 'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class, 'shop'])->name('frontend.shop');
Route::get('/cart', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('/check-out', [FrontendController::class, 'check_out'])->name('frontend.check-out');
Route::get('/product/{category}', [FrontendController::class, 'product'])->name('frontend.product');
Route::get('/product/{category}/{product}', [FrontendController::class, 'productView'])->name('frontend.product.view');


Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/login', [BuyerController::class, 'login'])->name('buyer.login');
Route::post('/login/confirm', [BuyerController::class, 'loginConfirm'])->name('buyer.loginConfirm');
Route::get('/register', [BuyerController::class, 'register'])->name('buyer.register');
Route::post('/register/confirm', [BuyerController::class, 'registerConfrim'])->name('buyer.registerConfirm');
Route::get('buyer/logout', [BuyerController::class, 'logout'])->name('buyer.logout');


Route::get('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login/confirm', [AuthController::class, 'loginConfirm'])->name('admin.loginConfirm');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['buyer'])->prefix('buyer')->group(function(){
Route::get('/dashboard', [BuyerController::class, 'dashboard'])->name('buyer.dashboard');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile/edit/{profile}', [AdminController::class, 'profileEdit'])->name('admin.profile.edit');

    // Route::resource('/category', CategoryController::class);
    Route::controller(CategoryController::class)->group( function(){
        Route::get('category', 'index')->name('admin.category');
        Route::get('category/create', 'create')->name('admin.category.create');
        Route::post('category/create', 'store')->name('admin.category.store');
        Route::get('category/{category}/edit', 'edit')->name('admin.category.edit');
        Route::put('category/{category}/edit', 'update')->name('admin.category.update');
        Route::delete('category/{category}/delete', 'destroy')->name('admin.category.delete');
    });

    Route::get('settings', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('settings', [SettingController::class, 'store'])->name('admin.setting.store');
    // Route::resource('/brand', BrandController::class);
    Route::get('brand', App\Livewire\Admin\Brand\Index::class)->name('admin.brand');
    Route::get('color', App\Livewire\Admin\Color\Index::class)->name('admin.color');
    Route::get('size', App\Livewire\Admin\Size\Index::class)->name('admin.size');

    // Route::resource('/color', ColorController::class);
    // Route::resource('/product', ProductController::class);
    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('admin.product');
        Route::get('product/create', 'create')->name('admin.product.create');
        Route::post('product/create', 'store')->name('admin.product.store');
        Route::get('product/{product}/edit', 'edit')->name('admin.product.edit');
        Route::put('product/{product}/edit', 'update')->name('admin.product.update');
        Route::get('product/{image}/remove', 'removeImage')->name('admin.product.delete.image');
        Route::delete('product/{product}/delete', 'destroy')->name('admin.product.delete');
    });
});

// Route::get('/product', [ProductController::class, 'removeImage'])->name('admin.product.delete.image');
