<?php

namespace App\Http\Controllers\Fanfiction;

use App\Models\Category;
use App\Models\Fanfiction;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Fanfiction $fanfiction)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('Fanfiction.edit', compact('fanfiction', 'categories', 'tags'));
    }
}
