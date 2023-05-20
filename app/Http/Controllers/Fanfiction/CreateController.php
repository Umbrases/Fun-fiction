<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Fanfiction;
use App\Models\Tag;
use App\Models\User;

class CreateController extends BaseController
{
    public function __invoke(User $user)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('Fanfiction.create', compact('tags', 'categories', 'user'));
    }
}
