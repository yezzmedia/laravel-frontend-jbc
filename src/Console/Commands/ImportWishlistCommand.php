<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Console\Commands;

use Illuminate\Console\Command;
use YezzMedia\FrontendJbc\Support\WishlistImporter;

class ImportWishlistCommand extends Command
{
    protected $signature = 'frontend-jbc:import-wishlist
                            {--project= : Project ID to import wishlist for}';

    protected $description = 'Import wishlist books from the configured Amazon wishlist URL.';

    public function handle(WishlistImporter $importer): int
    {
        $projectId = $this->option('project') ?? config('user-projects.default_project_id');

        if ($projectId === null) {
            $this->error('No project ID specified. Use --project or configure user-projects.default_project_id.');

            return self::FAILURE;
        }

        $this->info("Importing wishlist for project {$projectId}...");

        $result = $importer->import((int) $projectId);

        if (isset($result['error'])) {
            $this->error($result['error']);

            return self::FAILURE;
        }

        $this->info("Imported {$result['imported']} books.");

        return self::SUCCESS;
    }
}
