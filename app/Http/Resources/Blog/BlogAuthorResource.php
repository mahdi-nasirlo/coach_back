<?php

namespace App\Http\Resources\Blog;

use App\Models\Blog\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Author
 */
class BlogAuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "photo" => $this->photo,
            "bio" => $this->bio,
            "path" => '/blogs/author/owen-christ',
            "instagram_handle" => $this->instagram_handle,
            "telegram_handle" => $this->telegram_handle,
        ];
    }
}
