<?php

namespace App\Models;

use App\Facades\PostState;
use App\States\Post\Published;
use App\Traits\HasUUID;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $user_id
 * @property mixed $uuid
 * @property mixed $state
 * @property mixed $title
 */
class Post extends Model
{
    use HasFactory, Sluggable, SoftDeletes, HasUUID;

    protected $fillable = [
        'title', 'slug', 'body', 'user_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOwner($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function isOwner($userId): bool
    {
        return $this->user_id === $userId;
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function getStateTitle()
    {
        app()->postState = $this->state;
        return PostState::getTitle();
    }

    public function getColor()
    {
        app()->postState = $this->state;
        return PostState::getColor();
    }

    public function getNextResources(): array
    {
        app()->postState = $this->state;
        return PostState::getNextResources();
    }

    public function isPermittedToUpdateStateBy($state, $userRole)
    {
        app()->postState = $this->state;
        return PostState::isPermittedByGivenStateAndRole($state, $userRole);
    }

    public function isPublished(): bool
    {
        return $this->state === Published::TITLE;
    }
}
