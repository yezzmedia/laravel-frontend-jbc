<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use YezzMedia\FrontendJbc\Pages\WishlistManagementPage;

final class FrontendJbcPlugin implements Plugin
{
    public function getId(): string
    {
        return 'frontend-jbc';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            WishlistManagementPage::class,
        ]);
    }

    public function boot(Panel $panel): void {}
}
