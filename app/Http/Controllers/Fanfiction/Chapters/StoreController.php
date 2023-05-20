<?php

namespace App\Http\Controllers\Fanfiction\Chapters;

use App\Http\Requests\Chapters\StoreRequest;
use App\Models\Fanfiction;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request,  Fanfiction $fanfiction)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('fan.show', compact('fanfiction'));
    }
}
