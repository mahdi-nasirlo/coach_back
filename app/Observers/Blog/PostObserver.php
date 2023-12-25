<?php

namespace App\Observers\Blog;

use App\Models\Blog\Post;

class PostObserver
{
    public function creating(Post $post): void
    {
        if (!$post->blog_author_id) {
            $post->blog_author_id = auth()->id();
        }
    }
}
