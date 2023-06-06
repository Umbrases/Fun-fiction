<?php

namespace App\Http\Controllers\Chapters;

use App\Http\Requests\Chapters\AdminRequest;
use App\Models\Chapter;
use App\Models\Fanfiction;

class ShowController extends BaseController
{
    public function __invoke(Chapter $work)
    {
        return view('Chapters.show', compact('work'));
    }
}
