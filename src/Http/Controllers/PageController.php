<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\Content\Models\Page;

class PageController
{
    public function show(string $slug): View
    {
        $project = view()->shared('project');

        $page = Page::query()
            ->forProject($project->id)
            ->published()
            ->bySlug($slug)
            ->first();

        abort_unless($page !== null, 404);

        return view('frontend-jbc::pages.show', [
            'page' => $page,
        ]);
    }
}
