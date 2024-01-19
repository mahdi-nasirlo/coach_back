<?php

namespace App\Models\Meeting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $user_name
 * @property string $avatar
 * @property integer $hourly_price
 * @method static join(string $string, string $string1, string $string2, string $string3)
 * @method static create()
 * @method acceptedStatus()
 */
class Coach extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
