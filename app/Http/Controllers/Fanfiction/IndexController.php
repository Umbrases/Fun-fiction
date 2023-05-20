<?php

namespace App\Http\Controllers\Fanfiction;

use App\Models\Fanfiction;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $fanfictions = Fanfiction::all()->sortByDesc('id');
        return view('Fanfiction.index', compact('fanfictions'));
    }
}
