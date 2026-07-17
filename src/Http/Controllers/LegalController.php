<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\Content\Models\Page;

class LegalController
{
    public function privacy(): View
    {
        return $this->render('privacy');
    }

    public function imprint(): View
    {
        return $this->render('imprint');
    }

    private function render(string $slug): View
    {
        $project = view()->shared('project');

        $page = Page::query()
            ->forProject($project->id)
            ->bySlug($slug)
            ->first();

        return view('frontend-jbc::legal.show', [
            'page' => $page,
            'slug' => $slug,
        ]);
    }
}
