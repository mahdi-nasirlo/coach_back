<?php

namespace App\Http\Resources\Blog;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
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
            "image" => [
                "src" => $this->image ?? "https://placehold.co/80x80/f5f5f5/f5f5f5",
                "alt" => $this->name . "Avatar"
            ],
            "bio" => $this->bio,
        ];
    }
}
