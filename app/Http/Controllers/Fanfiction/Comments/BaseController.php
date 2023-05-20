<?php

namespace App\Http\Controllers\Fanfiction\Comments;

use App\Http\Controllers\Controller;
use App\Services\Comments\CommentsService;


class BaseController extends Controller
{
    public $service;

    public function __construct(CommentsService $service){
        $this->service = $service;
    }
}
