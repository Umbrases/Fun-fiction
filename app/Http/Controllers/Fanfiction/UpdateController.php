<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Requests\Fanfiction\UpdateRequest;
use App\Models\Fanfiction;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Fanfiction $fanfiction)
    {
        $data = $request->validated();
        $this->service->update( $fanfiction, $data);

        return redirect()->route('fan.show', $fanfiction->id);
    }
}
