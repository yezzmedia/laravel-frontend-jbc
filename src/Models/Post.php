<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use YezzMedia\FrontendJbc\Enums\PostStatus;
use YezzMedia\UserProjects\Models\Project;

class Post extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'category',
        'featured_image',
        'author_name',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => PostStatus::class,
            'published_at' => 'datetime',
        ];
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('status', PostStatus::Published)
            ->whereNotNull('published_at');
    }

    public function scopeForProject(Builder $query, int $projectId): void
    {
        $query->where('project_id', $projectId);
    }

    public function isPublished(): bool
    {
        return $this->status === PostStatus::Published && $this->published_at !== null;
    }

    public function isDraft(): bool
    {
        return $this->status === PostStatus::Draft;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
