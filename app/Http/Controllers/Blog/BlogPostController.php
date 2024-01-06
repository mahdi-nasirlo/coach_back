<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogPostsPageResource;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Post
 */
class BlogPostController extends Controller
{

    public function getPage(Request $request): AnonymousResourceCollection
    {
        $request->validate([
            "page" => "nullable|numeric|min:1",
            "perPage" => "nullable|int|min:1",
            "search" => "nullable:1"
        ]);

        $query = Post::with(["author:id,name", "category:name,slug"])
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
            ]);


        if ($request->has("search")) {
            $search = "%" . $request->get("search") . "%";
            $query->where(function ($query) use ($search) {
                $query->where("title", "LIKE", $search)
                    ->orWhere("slug", "LIKE", $search)
                    ->orWhere("content", "LIKE", $search);
            });
        }

        $query->orderBy("created_at", "desc");

        if (!$request->has('search')) {
            $posts = $query->paginate($request->input("perPage"));
        } else {
            $posts = $query->get();
        }

        return BlogPostsPageResource::collection($posts);
    }

    public function get(Post $post)
    {
        return new BlogPostsPageResource($post);
    }

}
