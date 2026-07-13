<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\FrontendJbc\Models\Book;
use YezzMedia\FrontendJbc\Models\Post;

class HomeController
{
    public function index2(): View
    {
        $project = view()->shared('project');

        $activeAddonKeys = view()->shared('activeAddonKeys', []);

        $latestPosts = Post::query()
            ->forProject($project->id)
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $totalBooksRead = 0;
        $totalPagesRead = 0;
        $latestBook = null;
        $booksThisYear = 0;

        if (in_array('booklist', $activeAddonKeys, true)) {
            $totalBooksRead = Book::query()->forProject($project->id)->read()->count();
            $totalPagesRead = Book::query()->forProject($project->id)->read()->sum('pages');
            $latestBook = Book::query()->forProject($project->id)->read()->latest('read_date')->first();
            $booksThisYear = Book::query()->forProject($project->id)->read()->whereYear('read_date', date('Y'))->count();
        }

        return view('frontend-jbc::index2', [
            'latestPosts' => $latestPosts,
            'totalBooksRead' => $totalBooksRead,
            'totalPagesRead' => $totalPagesRead,
            'latestBook' => $latestBook,
            'booksThisYear' => $booksThisYear,
        ]);
    }
}
