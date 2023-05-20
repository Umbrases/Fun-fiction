<?php

namespace App\Http\Controllers\Fanfiction\Chapters;

use App\Http\Controllers\Controller;
use App\Services\Chapters\ChaptersService;


class BaseController extends Controller
{
    public $service;

    public function __construct(ChaptersService $service){
        $this->service = $service;
    }
}
