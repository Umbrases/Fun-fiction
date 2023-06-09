<?php

namespace App\Http\Controllers\Fanfiction;

use App\Http\Filters\FanfictionFilter;
use App\Http\Requests\Fanfiction\FilterRequest;
use App\Models\Category;
use App\Models\Fanfiction;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(FanfictionFilter::class, ['queryParams' => array_filter($data)]);
        $fanfictions = Fanfiction::filter($filter)->get();
        $categories = Category::all();
        $tags = Tag::all();

        return view('Fanfiction.index', compact('fanfictions', 'categories', 'tags'));
    }
}
