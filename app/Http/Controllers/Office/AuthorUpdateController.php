<?php

namespace App\Http\Controllers\Office;

use App\Http\Requests\Office\UpdateRequest;
use App\Models\User;

class AuthorUpdateController extends BaseController
{

    public function __invoke(User $user)
    {

            $user->update([
                'role' => 'author',
            ]);


        return redirect()->route('office.index');

    }
}
