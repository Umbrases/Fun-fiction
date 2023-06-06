<?php

namespace App\Services\Admin;

class Service
{


    public function update($user)
    {
        if ($user->banned_until === null)
        $user->update([
            'banned_until' => '+1 month',
        ]);
        else
            $user->update([
                'banned_until' => null,
            ]);
    }

}
