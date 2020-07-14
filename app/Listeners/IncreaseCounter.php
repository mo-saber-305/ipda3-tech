<?php

namespace App\Listeners;

use App\Events\ArticleViews;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @param ArticleViews $event
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleViews $event)
    {
        $this->updateViews($event->article);
    }

    public function updateViews($article)
    {
        $article->views = $article->views + 1;
        $article->save();
    }
}
