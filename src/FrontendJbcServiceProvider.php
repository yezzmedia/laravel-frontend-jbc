<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use YezzMedia\Foundation\Support\PlatformPackageRegistrar;
use YezzMedia\FrontendJbc\Support\FrontendJbcAddonRegistrar;
use YezzMedia\UserProjects\Support\InstalledAddonRegistry;
use YezzMedia\UserProjects\Support\ProjectAddonManager;

class FrontendJbcServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-frontend-jbc')
            ->hasConfigFile('frontend-jbc')
            ->hasRoutes('web')
            ->hasViews()
            ->hasTranslations();
    }

    public function packageRegistered(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function packageBooted(): void
    {
        $this->syncDefaultProjectId();

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'frontend-jbc');

        $this->publishes([
            __DIR__.'/../resources/images' => public_path('vendor/frontend-jbc/images'),
        ], 'frontend-jbc-assets');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/frontend-jbc'),
            ], 'frontend-jbc-views');
        }

        if (class_exists(PlatformPackageRegistrar::class)) {
            $this->app->make(PlatformPackageRegistrar::class)
                ->register(new FrontendJbcPlatformPackage);
        }

        $this->registerInstalledAddons();
        $this->registerProjectAddons();
    }

    private function registerInstalledAddons(): void
    {
        if (! class_exists(InstalledAddonRegistry::class)) {
            return;
        }

        try {
            $registry = $this->app->make(InstalledAddonRegistry::class);
            $registry->register('frontend', 'Frontend', '1.0.0', 'Public frontend site with blog, pages, and booklist.');
            $registry->register('booklist', 'Booklist', '1.0.0', 'Book library with reading status tracking.');
        } catch (\Throwable) {
            // Silently skip when the installed_addons table does not exist yet.
        }
    }

    private function registerProjectAddons(): void
    {
        if (! class_exists(ProjectAddonManager::class)) {
            return;
        }

        $manager = $this->app->make(ProjectAddonManager::class);

        (new FrontendJbcAddonRegistrar)->register($manager);
    }

    private function syncDefaultProjectId(): void
    {
        $projectId = config('frontend-jbc.default_project_id');

        if ($projectId !== null) {
            config()->set('user-projects.default_project_id', $projectId);
        }
    }
}
