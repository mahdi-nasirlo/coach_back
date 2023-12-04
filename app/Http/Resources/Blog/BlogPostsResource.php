<?php

namespace App\Http\Resources\Blog;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @mixin Post
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
//        Log::info([
//            "title" => $this->title,
//            "slug" => $this->slug,
//            "content" => $this->content,
//            "seo_title" => $this->seo_title,
//            "seo_description" => $this->seo_description,
//            "blog_category_id" => $this->blog_category_id,
//        ]);

        return parent::toArray($request);
    }
}
