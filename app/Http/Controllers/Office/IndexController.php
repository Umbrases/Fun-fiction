<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Fanfiction;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(Fanfiction  $fanfiction)
    {
        $fanfictions = Fanfiction::all();
        $comments = Comments::all();
        $user = User::all();
        return view('Office.index', compact('fanfictions', 'user', 'comments', 'fanfiction'));
    }
}
