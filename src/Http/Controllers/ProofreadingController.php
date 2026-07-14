<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;

class ProofreadingController
{
    public function show(): View
    {
        return view('frontend-jbc::proofreading.show');
    }
}
