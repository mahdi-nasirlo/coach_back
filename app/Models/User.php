<?php

namespace App\Models;

use App\Models\Blog\Post;
use App\Models\Meeting\Coach;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @param string $password
 * @property numeric $id
 * @property string $email
 * @property string $image
 * @property string $bio
 * @property string $name
 * @property Coach $coach
 */
class User extends Authenticatable implements FilamentUser, HasTenants, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return true;
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return Team::all();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_author_id');
    }

    public function coach()
    {
        return $this->hasOne(Coach::class);
    }
}
