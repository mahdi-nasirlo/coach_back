<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\AdminStorePostRequest;
use App\Http\Requests\Admin\Blog\AdminUpdatePostRequest;
use App\Http\Resources\Blog\BlogPostsPageResource;
use App\Models\Blog\Post;

class AdminBlogPostController extends Controller
{
    public function getPage()
    {
        $posts = Post::with(["author"])->select(["id", "title", "slug", "image", "blog_author_id", "updated_at"])->paginate(5);

        return BlogPostsPageResource::collection($posts);
    }

    public function create(AdminStorePostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

        return response()->json(['status' => $post, 'message' => 'Blog post created successfully'], 201);
    }

    public function get(Post $post)
    {
        return new BlogPostsPageResource($post);
    }

    public function update(AdminUpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post = $post->update($validated);

        return response()->json(['status' => $post, 'message' => "successfully operation", 'success' => $post]);
    }

}
