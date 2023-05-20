<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fanfiction\StoreRequest;
use App\Models\Category;
use App\Models\Fanfiction;
use App\Models\Tag;

class DestroyController extends BaseController
{
    public function __invoke(Fanfiction $fanfiction)
    {
        $fanfiction->delete();
        return redirect()->route('fan.index');
    }
}
