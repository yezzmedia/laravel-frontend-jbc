<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\FrontendJbc\Models\Book;

class BookController
{
    public function index(): View
    {
        $project = view()->shared('project');

        $readBooks = Book::query()
            ->forProject($project->id)
            ->read()
            ->orderByDesc('read_date')
            ->get()
            ->groupBy(fn (Book $book) => $book->read_date->format('Y'))
            ->map(fn ($books) => $books->groupBy(fn (Book $book) => $book->read_date->translatedFormat('F')));

        $readingBooks = Book::query()
            ->forProject($project->id)
            ->reading()
            ->orderBy('sort_order')
            ->get();

        $unreadBooks = Book::query()
            ->forProject($project->id)
            ->unread()
            ->orderBy('sort_order')
            ->get();

        return view('frontend-jbc::books.index', [
            'readBooks' => $readBooks,
            'readingBooks' => $readingBooks,
            'unreadBooks' => $unreadBooks,
        ]);
    }
}
