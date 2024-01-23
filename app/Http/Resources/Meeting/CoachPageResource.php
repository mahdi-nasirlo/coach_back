<?php

namespace App\Http\Resources\Meeting;

use App\Http\Resources\Blog\BlogAuthorResource;
use App\Models\Meeting\Coach;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @mixin Coach
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'username' => $this->whenHas('user_name'),
            'status' => $this->status,
            'hourly_price' => $this->hourly_price,
            'hourly_price_formatted' => number_format($this->hourly_price),
            'user' => new BlogAuthorResource($this->whenLoaded('user'))
        ];
    }

}
