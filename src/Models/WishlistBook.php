<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WishlistBook extends Model
{
    protected $table = 'wishlist_books';

    protected $fillable = [
        'project_id',
        'asin',
        'title',
        'author',
        'cover_url',
        'amazon_url',
        'price',
        'rating',
        'rating_count',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'rating_count' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function scopeForProject(Builder $query, int $projectId): void
    {
        $query->where('project_id', $projectId);
    }

    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderBy('title');
    }
}
