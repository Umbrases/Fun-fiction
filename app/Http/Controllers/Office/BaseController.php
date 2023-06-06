<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Services\Office\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
}
