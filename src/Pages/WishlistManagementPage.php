<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Pages;

use Livewire\Attributes\Url;
use YezzMedia\Dashboard\Pages\DashboardPage;
use YezzMedia\FrontendJbc\Models\WishlistBook;
use YezzMedia\FrontendJbc\Support\WishlistImporter;
use YezzMedia\UserProjects\Models\Project;

class WishlistManagementPage extends DashboardPage
{
    protected string $view = 'frontend-jbc::wishlist.management';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $slug = 'frontend-jbc/wishlist';

    #[Url(as: 'project')]
    public ?int $projectId = null;

    public string $importResult = '';

    /** @var array<int, array<string, mixed>> */
    public array $wishlistBooks = [];

    public function mount(): void
    {
        $this->loadBooks();
    }

    public function import(): void
    {
        if ($this->projectId === null) {
            $this->importResult = 'No project selected.';

            return;
        }

        $project = Project::query()->find($this->projectId);

        if ($project === null) {
            $this->importResult = 'Project not found.';

            return;
        }

        $importer = app(WishlistImporter::class);
        $result = $importer->import($project->id);

        if (isset($result['error'])) {
            $this->importResult = $result['error'];
        } else {
            $this->importResult = "Imported {$result['imported']} books.";
        }

        $this->loadBooks();
    }

    private function loadBooks(): void
    {
        if ($this->projectId === null) {
            $this->wishlistBooks = [];

            return;
        }

        $this->wishlistBooks = WishlistBook::query()
            ->where('project_id', $this->projectId)
            ->ordered()
            ->get()
            ->toArray();
    }

    public static function canAccess(): bool
    {
        return auth(config('dashboard.panel.guard', 'web'))->check();
    }

    public function getTitle(): string
    {
        return 'Wishlist Import';
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [...parent::getViewData(), 'wishlistBooks' => $this->wishlistBooks];
    }
}
