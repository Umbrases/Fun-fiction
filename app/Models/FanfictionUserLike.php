<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FanfictionUserLike extends Model
{
    use HasFactory;
    protected $table = 'fanfiction_user_likes';
    protected $guarded = false;
}
