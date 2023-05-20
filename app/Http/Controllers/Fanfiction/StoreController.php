<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Requests\Fanfiction\StoreRequest;
use App\Models\User;

class StoreController extends BaseController
{
    public function __invoke(User $user, StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('fan.index');
    }
}
