<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(AdminRequest $request)
    {
        $data = $request->validated();
        $user = User::find($data['id']);
        $this->service->update($user);

        return redirect()->route('admin');
    }
}
