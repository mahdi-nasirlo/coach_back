<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $folder
 * @property string $filename
 */
class TemporaryFile extends Model
{
    use HasFactory;

    protected $guarded = [];

}
