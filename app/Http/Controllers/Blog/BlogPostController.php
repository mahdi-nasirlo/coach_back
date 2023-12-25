<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogPostsPageResource;
use App\Models\Blog\Post;

/**
 * @mixin Post
 */
class BlogPostController extends Controller
{

    public function getPage()
    {
        $posts = Post::with(["author:name,image,bio", "category:name"])
            ->select(["id", "title", "slug", "view", "image", "blog_author_id", "updated_at"])
            ->orderBy("created_at", "asc")
            ->paginate(5);

        return BlogPostsPageResource::collection($posts);
    }

    public function get(Post $post)
    {
        return new BlogPostsPageResource($post);
    }

}
