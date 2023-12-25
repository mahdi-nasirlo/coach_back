<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogPostsPageResource;
use App\Models\Blog\Post;

class BlogPostController extends Controller
{

    public function getPage()
    {
        $posts = Post::with(["author"])->select(["id", "title", "slug", "image", "blog_author_id", "updated_at"])->paginate(5);

        return BlogPostsPageResource::collection($posts);
    }

    public function get(Post $post)
    {
        return new BlogPostsPageResource($post);
    }

}
