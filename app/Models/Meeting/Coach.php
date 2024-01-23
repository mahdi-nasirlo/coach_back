<?php

namespace App\Models\Meeting;

use App\Enums\CoachStatusEnum;
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
 * @property CoachStatusEnum $status
 * @method static create()
 * @method acceptedStatus()
 */
class Coach extends Model
{
    protected $casts = ['status' => CoachStatusEnum::class];
    protected $guarded = ['created_at', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
