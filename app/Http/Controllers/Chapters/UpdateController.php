<?php

namespace App\Http\Controllers\Chapters;

use App\Http\Requests\Chapters\StoreRequest;
use App\Models\Chapter;
use App\Models\Fanfiction;

class UpdateController extends BaseController
{

    public function __invoke(StoreRequest $request, Chapter $chapter)
    {

        $data = $request->validated();

        $this->service->update( $chapter, $data);

        return redirect()->route('fan.index');
    }
}
