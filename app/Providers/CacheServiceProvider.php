<?php

namespace App\Providers;

use App\CachedRepo\PostCachedRepo;
use App\Contracts\PostRepoInterface;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepoInterface::class, PostCachedRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
