<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Filters\FanfictionFilter;
use App\Http\Requests\Fanfiction\FilterRequest;
use App\Models\Fanfiction;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(FanfictionFilter::class, ['queryParams' => array_filter($data)]);
        $fanfictions = Fanfiction::filter($filter)->get();

        return view('Search.index', compact('fanfictions'));
    }
}
