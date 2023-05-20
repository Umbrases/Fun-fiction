<?php

namespace App\Http\Controllers\Chapters;

use App\Models\Chapter;
use App\Models\Fanfiction;
use Illuminate\Support\Facades\Storage;

class DestroyController extends BaseController
{
    public function __invoke(Chapter $work)
    {

        $id = $work['fanFiction_id'];
        $work->delete();
        Storage::disk('public')->delete('/fileText/'.$work['fanFiction_id'].'.'.$work['title']);
        return redirect()->route('fan.show', $id);
    }
}
