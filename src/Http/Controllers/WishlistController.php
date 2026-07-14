<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\FrontendJbc\Models\WishlistBook;

class WishlistController
{
    public function index(): View
    {
        $project = view()->shared('project');

        $books = WishlistBook::query()
            ->forProject($project->id)
            ->ordered()
            ->get();

        $totalBooks = $books->count();

        $averageRating = $books->filter(fn ($b) => $b->rating !== null)->avg('rating');

        return view('frontend-jbc::wishlist.index', [
            'books' => $books,
            'totalBooks' => $totalBooks,
            'averageRating' => $averageRating !== null ? round($averageRating, 1) : null,
        ]);
    }
}
