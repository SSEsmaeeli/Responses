<?php

namespace App\Traits;

use App\Helpers\UniqueStringGenerator;

trait HasUUID
{
    public static function boot(): void
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = UniqueStringGenerator::getString(self::class, 'uuid', 32);
        });
    }
}
