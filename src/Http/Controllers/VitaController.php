<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\FrontendJbc\Models\Book;
use YezzMedia\FrontendJbc\Models\Post;

class VitaController
{
    public function show(): View
    {
        $project = view()->shared('project');

        $totalPosts = Post::query()
            ->forProject($project->id)
            ->published()
            ->count();

        $totalBooksRead = Book::query()
            ->forProject($project->id)
            ->read()
            ->count();

        $totalPagesRead = Book::query()
            ->forProject($project->id)
            ->read()
            ->sum('pages');

        return view('frontend-jbc::vita.show', [
            'totalPosts' => $totalPosts,
            'totalBooksRead' => $totalBooksRead,
            'totalPagesRead' => $totalPagesRead,
            'yearsActive' => date('Y') - 2022,
        ]);
    }
}
