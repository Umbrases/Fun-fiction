<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Controllers\Controller;
use App\Services\Fanfiction\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
}
