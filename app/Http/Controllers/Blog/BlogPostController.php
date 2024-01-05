<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogPostsPageResource;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Post
 */
class BlogPostController extends Controller
{

    public function getPage()
    {
        $posts = Post::with(["author:id,name", "category:name,slug"])
            ->select([
                "id",
                "title",
                "slug",
                DB::raw('SUBSTR(content, 1, 100) as content'),
                "view",
                "image",
                "blog_author_id",
                "blog_category_id",
                "updated_at"
            ])
            ->orderBy("created_at", "asc")
            ->paginate(5);

        return BlogPostsPageResource::collection($posts);
    }

    public function get(Post $post)
    {
        return new BlogPostsPageResource($post);
    }

}
