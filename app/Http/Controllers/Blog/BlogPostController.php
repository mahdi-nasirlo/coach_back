<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogPostRequest;
use App\Http\Requests\Blog\UpdateBlogPostRequest;
use App\Http\Resources\Blog\BlogPostsResource;
use App\Models\Blog\Post;

class BlogPostController extends Controller
{

    public function getPage()
    {
        $posts = Post::with(["author"])->select(["title", "slug", "image", "blog_author_id", "updated_at"])->paginate(5);

        return BlogPostsResource::collection($posts);
    }

    public function create(StoreBlogPostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

        return response()->json(['message' => 'Blog post created successfully'], 201);
    }


    public function get(Post $post)
    {
        return new BlogPostsResource($post);
    }

    public function update(UpdateBlogPostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post = $post->update($validated);

        return response()->json(['message' => "successfully operation", 'success' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
