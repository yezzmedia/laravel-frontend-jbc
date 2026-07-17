<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use YezzMedia\FrontendJbc\Http\Controllers\BlogController;
use YezzMedia\FrontendJbc\Http\Controllers\BookController;
use YezzMedia\FrontendJbc\Http\Controllers\ConsentController;
use YezzMedia\FrontendJbc\Http\Controllers\HomeController;
use YezzMedia\FrontendJbc\Http\Controllers\LanguageController;
use YezzMedia\FrontendJbc\Http\Controllers\LegalController;
use YezzMedia\FrontendJbc\Http\Controllers\PageController;
use YezzMedia\FrontendJbc\Http\Controllers\ProofreadingController;
use YezzMedia\FrontendJbc\Http\Controllers\RatingController;
use YezzMedia\FrontendJbc\Http\Controllers\VitaController;
use YezzMedia\FrontendJbc\Http\Controllers\WishlistController;
use YezzMedia\UserProjects\Http\Middleware\ResolveProject;

Route::middleware(['web', ResolveProject::class])->name('frontend.')->group(function (): void {
    app()->setLocale(session('locale', config('app.locale', 'de')));
    Route::get('/', [HomeController::class, 'index2'])->name('home');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/booklist', [BookController::class, 'index'])->name('books');
    Route::get('/proofreading', [ProofreadingController::class, 'show'])->name('proofreading');
    Route::post('/proofreading/contact', [ProofreadingController::class, 'store'])->name('proofreading.contact');
    Route::get('/rating', [RatingController::class, 'show'])->name('rating');
    Route::get('/vita', [VitaController::class, 'show'])->name('vita');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
    Route::get('/imprint', [LegalController::class, 'imprint'])->name('imprint');
    Route::get('/consent', [ConsentController::class, 'preferences'])->name('consent');
    Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->where('locale', 'de|en')->name('lang.switch');

    $staticPages = config('frontend-jbc.static_pages', []);
    if ($staticPages !== []) {
        Route::get('/{slug}', [PageController::class, 'show'])
            ->where('slug', implode('|', $staticPages));
    }
});
