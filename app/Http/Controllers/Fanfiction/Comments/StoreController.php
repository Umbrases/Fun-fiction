<?php

namespace App\Http\Controllers\Fanfiction\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fanfiction\Comments\StoreRequest;
use App\Models\Fanfiction;


class StoreController extends BaseController
{
    public function __invoke(Fanfiction $fanfiction, StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data, $fanfiction);
        return redirect()->route('fan.show', $fanfiction->id);
    }
}
