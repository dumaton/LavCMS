<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\MenuItemController as AdminMenuItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

if (config('features.news_enabled')) {
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');
}

if (config('features.articles_enabled')) {
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
}

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/category/{categorySlug}', [CatalogController::class, 'index'])->name('catalog.category');
Route::get('/catalog/product/{product:slug}', [CatalogController::class, 'show'])->name('catalog.show');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/privacy-policy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/terms-of-use', [LegalController::class, 'terms'])->name('legal.terms');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::middleware('auth')->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        if (config('features.news_enabled')) {
            Route::resource('news', AdminNewsController::class)->except(['show']);
        }
        if (config('features.articles_enabled')) {
            Route::resource('articles', AdminArticleController::class)->except(['show']);
        }
        Route::resource('brands', AdminBrandController::class)->except(['show']);
        Route::post('brands/reorder', [AdminBrandController::class, 'reorder'])->name('brands.reorder');
        Route::resource('products', AdminProductController::class)->except(['show']);
        Route::delete('products/{product}/images/{image}', [AdminProductController::class, 'destroyImage'])
            ->name('products.images.destroy');
        Route::post('products/{product}/images/reorder', [AdminProductController::class, 'reorderImages'])
            ->name('products.images.reorder');
        Route::resource('product-categories', AdminProductCategoryController::class)->except(['show']);
        Route::post('product-categories/reorder', [AdminProductCategoryController::class, 'reorder'])->name('product-categories.reorder');
        Route::resource('users', AdminUserController::class)->except(['show']);

        Route::get('settings', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');

        Route::get('contacts', [AdminContactMessageController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [AdminContactMessageController::class, 'show'])->name('contacts.show');
        Route::delete('contacts/{contact}', [AdminContactMessageController::class, 'destroy'])->name('contacts.destroy');

        Route::resource('menu', AdminMenuItemController::class)->except(['show']);
        Route::post('menu/reorder', [AdminMenuItemController::class, 'reorder'])->name('menu.reorder');
    });
});
