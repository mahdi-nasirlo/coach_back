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
            "email" => $this->whenHas("email"),
            "image" => $this->whenHas("name", [
                "src" => "https://placehold.co/80X80/f1f5f9/696969",
                "alt" => $this->name . "Avatar"
            ]),
            "bio" => $this->whenHas("bio"),
        ];
    }
}
