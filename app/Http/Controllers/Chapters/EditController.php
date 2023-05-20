<?php

namespace App\Http\Controllers\Chapters;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Fanfiction;

class EditController extends BaseController
{
    public function __invoke(Fanfiction $fanfiction, Chapter $chapters)
    {
        return view('Chapters.edit', compact('chapters', 'fanfiction'));
    }
}
