<?php

namespace App\Http\Controllers\Office;

use App\Http\Requests\Office\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $this->service->update($user, $data);

        return redirect()->route('office.index');

    }
}
