<?php

namespace App\Models\Blog;

use App\Models\Comment;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Tags\HasTags;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $image
 * @property string | null $seo_title
 * @property string | null $seo_description
 * @property User $author
 * @property int $blog_category_id
 * @property int $blog_author_id
 * @property string $created_at
 * @property DateTime $updated_at
 * @property Category $category
 * @property int $view
 */
class Post extends Model
{
    use HasFactory;
    use HasTags;

    protected $table = 'blog_posts';

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'blog_author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
