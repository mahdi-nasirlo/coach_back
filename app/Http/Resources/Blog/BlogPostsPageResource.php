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
            "excerpt" => $this->whenHas("content"),
            "views" => $this->view,
            "postedAt" => $this->whenHas("updated_at", $this->updated_at->format('M d, Y')),
            "image" => [
                "src" => "https://placehold.co/1200X754/f1f5f9/696969"
            ],
            "category" => $this->whenLoaded('category', fn() => [
                "title" => $this->whenNotNull($this->category->name),
                "slug" => $this->whenNotNull($this->category->slug),
            ]),
            "seo_title" => $this->whenHas("seo_title"),
            "seo_description" => $this->whenHas("seo_description"),
            "author" => new BlogAuthorResource($this->whenLoaded('author'))
        ];
    }
}
