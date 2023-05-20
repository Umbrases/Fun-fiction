<?php

namespace App\Http\Controllers\Fanfiction\Like;

use App\Http\Controllers\Fanfiction\BaseController;
use App\Models\Fanfiction;


class StoreController extends BaseController
{
    public function __invoke(Fanfiction $fanfiction)
    {
        auth()->user()->likedFanfiction()->toggle($fanfiction->id);
        return redirect()->route('fan.show', $fanfiction->id);
    }
}
