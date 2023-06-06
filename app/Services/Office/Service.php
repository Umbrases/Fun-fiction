<?php

namespace App\Services\Office;

use App\Models\Fanfiction;
use App\Services\ImageUploader;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Service
{


    public function update($user, $data)
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        if (isset($data['image'])) {
            $imagePath = ImageUploader::save($data['image']);
            $user->update(['image' => $imagePath]);
        }

    }

    public function updatePassword($user, $data)
    {
        $user->update([
            'password' => Hash::make($data['password']),
        ]);

    }
}
