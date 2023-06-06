<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fanfiction extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'fanfiction_category', 'fanfiction_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'fanfiction_tag', 'fanfiction_id', 'tag_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function likesCount()
    {
        return $this->belongsToMany(User::class, 'fanfiction_user_likes', 'fanfiction_id', 'user_id')->count();
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
