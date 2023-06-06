<?php

namespace App\Http\Controllers\Office;

use App\Http\Requests\Office\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordUpdateController extends BaseController
{

    public function __invoke(PasswordUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (Hash::check($data['oldPassword'], $user['password']))
            $this->service->updatePassword($user, $data);
        else
            dd('213123');

        return redirect()->route('office.index');

    }
}
