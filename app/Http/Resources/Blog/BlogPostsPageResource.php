<?php

namespace App\Http\Resources\Blog;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Transform the resource into an array.
 * @mixin Post
 * @return array<string, mixed>
 */
class BlogPostsPageResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "path" => $this->slug,
            "excerpt" => $this->content,
            "views" => $this->view,
            "postedAt" => "Nov 21, 2023",
            "image" => ["src" => '/images/blog/home-personal-finance-blog-01.jpg'],
            "category" => $this->category,
//            "category" => $this->whenLoaded('category', fn() => [
//                "title" => $this->whenNotNull($this->category->name),
//                "slug" => $this->whenNotNull($this->category->slug),
//            ]),
//            "seo_title" => $this->seo_title,
//            "seo_description" => $this->seo_description,
//            "blog_category_id" => $this->blog_category_id,
            "author" => new BlogAuthorResource($this->whenLoaded('author'))
        ];
    }
}
