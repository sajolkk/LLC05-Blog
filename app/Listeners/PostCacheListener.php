<?php

namespace App\Listeners;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Validator;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
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
    public function handle($event)
    {

        cache()->forget('aritcle');
        $post = Post::with('category','user')->orderby('created_at','desc')->take(20)->get();
        cache()->forever('aritcle', $post);
    }
}
