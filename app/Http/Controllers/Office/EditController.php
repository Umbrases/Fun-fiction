<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Fanfiction;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke()
    {
        $user = User::all();
        return view('Office.edit', compact('user'));
    }
}
