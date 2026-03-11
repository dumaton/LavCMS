<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\MenuItemController as AdminMenuItemController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PriceController as AdminPriceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

if (config('features.articles_enabled')) {
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
}


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

        if (config('features.articles_enabled')) {
            Route::resource('articles', AdminArticleController::class)->except(['show']);
        }
        Route::resource('users', AdminUserController::class)->except(['show']);

        Route::get('settings', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');

        Route::get('contacts', [AdminContactMessageController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [AdminContactMessageController::class, 'show'])->name('contacts.show');
        Route::delete('contacts/{contact}', [AdminContactMessageController::class, 'destroy'])->name('contacts.destroy');

        Route::resource('menu', AdminMenuItemController::class)->except(['show']);
        Route::post('menu/reorder', [AdminMenuItemController::class, 'reorder'])->name('menu.reorder');

        Route::resource('services', AdminServiceController::class)->except(['show']);
        Route::post('services/reorder', [AdminServiceController::class, 'reorder'])->name('services.reorder');

        Route::resource('prices', AdminPriceController::class)->except(['show']);
        Route::post('prices/reorder', [AdminPriceController::class, 'reorder'])->name('prices.reorder');
    });
});
