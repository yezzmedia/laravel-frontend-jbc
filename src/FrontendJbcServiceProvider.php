<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use YezzMedia\Content\Models\FormDefinition;
use YezzMedia\Content\Models\Page;
use YezzMedia\Content\Models\Redirect;
use YezzMedia\Dashboard\Support\HubExtensionRegistry;
use YezzMedia\Foundation\Support\PlatformPackageRegistrar;
use YezzMedia\FrontendJbc\Console\Commands\ImportWishlistCommand;
use YezzMedia\FrontendJbc\Filament\FrontendJbcPlugin;
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

        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportWishlistCommand::class,
            ]);
        }

        $this->registerHubPlugin();
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
        $this->registerPageRedirects();
        $this->registerLegalPages();
        $this->registerProofreadingForm();
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

    private function registerPageRedirects(): void
    {
        if (! class_exists(Redirect::class)) {
            return;
        }

        $projectId = config('user-projects.default_project_id');

        if ($projectId === null) {
            return;
        }

        if (! class_exists(ProjectAddonManager::class)) {
            return;
        }

        try {
            $manager = $this->app->make(ProjectAddonManager::class);

            foreach ($manager->all() as $addon) {
                foreach ($addon->pageRedirects as $source) {
                    Redirect::query()->firstOrCreate(
                        ['project_id' => $projectId, 'source' => $source],
                        ['target' => $source, 'status_code' => 301, 'enabled' => true],
                    );
                }
            }
        } catch (\Throwable) {
            // Table may not exist yet during install.
        }
    }

    private function registerLegalPages(): void
    {
        if (! class_exists(Page::class)) {
            return;
        }

        $projectId = config('user-projects.default_project_id');

        if ($projectId === null) {
            return;
        }

        try {
            $privacyContent = file_get_contents(__DIR__.'/../resources/legal/privacy.html');
            $imprintContent = file_get_contents(__DIR__.'/../resources/legal/imprint.html');

            if ($privacyContent !== false) {
                Page::query()->firstOrCreate(
                    ['project_id' => $projectId, 'slug' => 'privacy'],
                    [
                        'title' => 'Datenschutzerklaerung',
                        'content' => $privacyContent,
                        'status' => 'published',
                        'meta_description' => 'Datenschutzerklaerung von Julisbookcorner',
                    ],
                );
            }

            if ($imprintContent !== false) {
                Page::query()->firstOrCreate(
                    ['project_id' => $projectId, 'slug' => 'imprint'],
                    [
                        'title' => 'Impressum',
                        'content' => $imprintContent,
                        'status' => 'published',
                        'meta_description' => 'Impressum von Julisbookcorner',
                    ],
                );
            }
        } catch (\Throwable) {
            // Table may not exist yet during install.
        }
    }

    private function registerProofreadingForm(): void
    {
        if (! class_exists(FormDefinition::class)) {
            return;
        }

        $projectId = config('user-projects.default_project_id');

        if ($projectId === null) {
            return;
        }

        try {
            FormDefinition::query()->firstOrCreate(
                ['project_id' => $projectId, 'name' => 'Proofreading Contact'],
                [
                    'fields' => [
                        ['key' => 'name', 'type' => 'text', 'label' => 'Name', 'required' => true],
                        ['key' => 'email', 'type' => 'email', 'label' => 'E-Mail', 'required' => true],
                        ['key' => 'message', 'type' => 'textarea', 'label' => 'Nachricht', 'required' => true],
                    ],
                    'options' => [
                        'honeypot' => true,
                        'rate_limit' => 3,
                        'rate_limit_period' => 300,
                    ],
                ],
            );
        } catch (\Throwable) {
            // Table may not exist yet during install.
        }
    }

    private function registerHubPlugin(): void
    {
        if (! class_exists(HubExtensionRegistry::class)) {
            return;
        }

        $this->app->make(HubExtensionRegistry::class)
            ->register(FrontendJbcPlugin::class);
    }
}
