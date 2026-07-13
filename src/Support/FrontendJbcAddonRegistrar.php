<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Support;

use YezzMedia\UserProjects\Support\ProjectAddon;
use YezzMedia\UserProjects\Support\ProjectAddonManager;

class FrontendJbcAddonRegistrar
{
    public function register(ProjectAddonManager $manager): void
    {
        $manager->register(new ProjectAddon(
            key: 'frontend',
            label: 'Frontend',
            icon: 'globe-alt',
            description: 'Manage the public frontend site, blog, and booklist for this project.',
            urlGenerator: fn ($project) => url('/'),
            sort: 10,
            subItems: [
                [
                    'label' => 'Blog',
                    'icon' => 'document-text',
                    'urlGenerator' => fn ($project) => url('/blog'),
                ],
                [
                    'label' => 'Books',
                    'icon' => 'book-open',
                    'urlGenerator' => fn ($project) => url('/booklist'),
                ],
            ],
            blockedUrls: ['/'],
        ));

        $manager->register(new ProjectAddon(
            key: 'booklist',
            label: 'Booklist',
            icon: 'book-open',
            description: 'Book library with reading status tracking for this project.',
            urlGenerator: fn ($project) => url('/booklist'),
            sort: 20,
            blockedUrls: ['/booklist*'],
        ));
    }
}
