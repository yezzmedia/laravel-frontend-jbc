<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use YezzMedia\FrontendJbc\Http\Controllers\BlogController;
use YezzMedia\FrontendJbc\Http\Controllers\BookController;
use YezzMedia\FrontendJbc\Http\Controllers\HomeController;
use YezzMedia\FrontendJbc\Http\Controllers\PageController;
use YezzMedia\UserProjects\Http\Middleware\ResolveProject;

Route::middleware(['web', ResolveProject::class])->name('frontend.')->group(function (): void {
    Route::get('/', [HomeController::class, 'index2'])->name('home');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/booklist', [BookController::class, 'index'])->name('books');

    $staticPages = config('frontend-jbc.static_pages', []);
    if ($staticPages !== []) {
        Route::get('/{slug}', [PageController::class, 'show'])
            ->where('slug', implode('|', $staticPages));
    }
});
