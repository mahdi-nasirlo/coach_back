<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\AdminStorePostRequest;
use App\Http\Requests\Admin\Blog\AdminUpdatePostRequest;
use App\Http\Resources\Blog\BlogPostsResource;
use App\Models\Blog\Post;

class AdminBlogPostController extends Controller
{
    public function index()
    {
        $posts = Post::with(["author"])->select(["title", "slug", "image", "blog_author_id", "updated_at"])->paginate(5);

        return BlogPostsResource::collection($posts);
    }

    public function create(AdminStorePostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

        return response()->json(['message' => 'Blog post created successfully'], 201);
    }

    public function update(AdminUpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post = $post->update($validated);

        return response()->json(['message' => "successfully operation", 'success' => $post]);
    }

}
