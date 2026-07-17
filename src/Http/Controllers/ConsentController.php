<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use YezzMedia\Consent\Support\ConsentManager;

class ConsentController
{
    public function preferences(ConsentManager $consent): View
    {
        $state = $consent->state();

        $categories = array_map(fn ($p) => $p->toArray(), $state->profiles);

        return view('frontend-jbc::consent.preferences', [
            'categories' => $categories,
            'categoriesJson' => json_encode(array_values($categories), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'allDecided' => $state->allDecided,
        ]);
    }
}
