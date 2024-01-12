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
        $posts = Post::with(["author:name,image"])
            ->select(["id", "title", "view", "slug", "image", "blog_author_id", "updated_at"])
            ->paginate(5);

        return BlogPostsPageResource::collection($posts);
    }

    public function create(AdminStorePostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::query()->create($validated);

//        $request->whenHas('image', function () use ($request, $post) {
//
//            $temporaryFile = TemporaryFile::query()->where("folder", $request->input("image"))->first();
//
//            if ($temporaryFile) {
//
//                $post
//                    ->addMedia(storage_path('app/public' . $request->image . '/' . $temporaryFile->filename))
//                    ->toMediaCollection("blog/post");
//
//                rmdir(storage_path('/app/public' . $request->image));
//                $temporaryFile->delete();
//            }
//
//        });

        return response()->json([
            'success' => true,
            'message' => 'Blog post created successfully',
            "data" => $post
        ], 201);
    }

    public function delete(Post $post)
    {
        $post = $post->delete();

        return response()->json([
            'success' => $post,
            'message' => "successfully"
        ]);
    }

    public function get(Post $post)
    {
        $post->update(["view" => $post->view + 1]);

        return new BlogPostsPageResource($post);
    }

    public function update(AdminUpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post = $post->update($validated);

        return response()->json(['status' => $post, 'message' => "successfully operation", 'success' => $post]);
    }

}
