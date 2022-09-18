<?php

namespace App\Listeners;

use App\Events\PostStateUpdated;
use App\Notifications\PostStateUpdated as PostStateUpdatedNotification;

class SendNotificationToPostOwner
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\PostStateUpdated  $event
     * @return void
     */
    public function handle(PostStateUpdated $event)
    {
        $event->post->user->notify(new PostStateUpdatedNotification($event->post));
    }
}
