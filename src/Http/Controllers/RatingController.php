<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;

class RatingController
{
    public function show(): View
    {
        return view('frontend-jbc::rating.show');
    }
}
