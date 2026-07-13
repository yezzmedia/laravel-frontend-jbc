<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc;

use YezzMedia\Foundation\Contracts\PlatformPackage;
use YezzMedia\Foundation\Contracts\RegistersFeatures;
use YezzMedia\Foundation\Data\FeatureDefinition;
use YezzMedia\Foundation\Data\PackageMetadata;

final class FrontendJbcPlatformPackage implements PlatformPackage, RegistersFeatures
{
    public function metadata(): PackageMetadata
    {
        return new PackageMetadata(
            name: 'yezzmedia/laravel-frontend-jbc',
            vendor: 'yezzmedia',
            description: 'Julisbookcorner.com frontend theme for the Yezz Media platform.',
            packageClass: self::class,
        );
    }

    /**
     * @return array<int, FeatureDefinition>
     */
    public function featureDefinitions(): array
    {
        return [
            new FeatureDefinition(
                name: 'frontend-jbc.blog',
                package: 'yezzmedia/laravel-frontend-jbc',
                label: 'Blog',
                description: 'Blog module with posts listing and detail pages.',
            ),
            new FeatureDefinition(
                name: 'frontend-jbc.books',
                package: 'yezzmedia/laravel-frontend-jbc',
                label: 'Book Library',
                description: 'Book library module with reading status tracking.',
            ),
        ];
    }
}
