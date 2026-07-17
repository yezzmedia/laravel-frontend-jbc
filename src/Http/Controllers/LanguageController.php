<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController
{
    public function switch(string $locale): RedirectResponse
    {
        if (in_array($locale, ['de', 'en'], true)) {
            session()->put('locale', $locale);
            session()->save();
        }

        return redirect('/');
    }
}
