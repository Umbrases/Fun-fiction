<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comments;
use App\Models\Fanfiction;
use App\Models\Tag;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(Fanfiction  $fanfiction)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $chapters = Chapter::all();
        $comments = Comments::all();
        $user = User::all();
        return view('Fanfiction.show', compact('fanfiction', 'categories', 'tags', 'chapters', 'comments', 'user'));
    }
}
