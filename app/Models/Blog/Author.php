<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $email
 * @property string $photo
 * @property string $bio
 * @property string $instagram_handle
 * @property string $telegram_handle
 */
class Author extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'blog_authors';

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_author_id');
    }
}
