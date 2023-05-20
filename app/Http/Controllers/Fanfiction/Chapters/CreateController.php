<?php

namespace App\Http\Controllers\Fanfiction\Chapters;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Fanfiction;

class CreateController extends Controller
{
    public function __invoke(  Fanfiction $fanfiction)
    {
        $chapters = Chapter::all();
        return view('Chapters.create', compact('chapters', 'fanfiction'));
    }
}
