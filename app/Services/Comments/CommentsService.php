<?php

namespace App\Services\Comments;

use App\Models\Comments;
use App\Models\Fanfiction;

class CommentsService
{
    public function store($data, $fanfiction)
    {
        $user_id = auth()->user()->id;
        $fanfiction_id = $fanfiction->id;

        $fanfiction = Comments::create([
            'message' => $data['message'],
            'fanfiction_id' => $fanfiction_id,
            'user_id' => $user_id,
        ]);
    }


}
