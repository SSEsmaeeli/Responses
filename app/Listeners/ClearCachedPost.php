<?php

namespace App\Listeners;

use App\Events\PostStateUpdated;
use App\Events\PostUpdated;
use Illuminate\Contracts\Cache\Repository as Cache;

class ClearCachedPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(public Cache $cache)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostStateUpdated  $event
     * @return void
     */
    public function handle(PostStateUpdated|PostUpdated $event)
    {
        $this->cache->forget('post:'.$event->post->uuid);
        $this->cache->forget('user:'.$event->post->user_id.'_posts');
    }
}
