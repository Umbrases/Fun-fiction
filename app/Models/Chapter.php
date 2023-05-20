<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function fanfictions()
    {
        return $this->belongsTo(Fanfiction::class, 'fanFiction_id', 'id');
    }
}
