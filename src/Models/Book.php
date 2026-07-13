<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use YezzMedia\FrontendJbc\Enums\BookStatus;
use YezzMedia\UserProjects\Models\Project;

class Book extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'author',
        'description',
        'cover_image',
        'genre',
        'pages',
        'publisher',
        'status',
        'read_date',
        'external_url',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'status' => BookStatus::class,
            'read_date' => 'datetime',
            'pages' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeRead(Builder $query): void
    {
        $query->where('status', BookStatus::Read)
            ->whereNotNull('read_date');
    }

    public function scopeUnread(Builder $query): void
    {
        $query->where('status', BookStatus::Unread);
    }

    public function scopeReading(Builder $query): void
    {
        $query->where('status', BookStatus::Reading);
    }

    public function scopeForProject(Builder $query, int $projectId): void
    {
        $query->where('project_id', $projectId);
    }

    public function isRead(): bool
    {
        return $this->status === BookStatus::Read;
    }
}
