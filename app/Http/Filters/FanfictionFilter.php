<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

class FanfictionFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CATEGORIES = 'categories';
    public const TAGS = 'tags';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CATEGORIES => [$this, 'categories'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    public function title(Builder $bulder, $value)
    {
        $bulder->where('title', 'like', "%{$value}%");
    }

    public function categories(Builder $bulder, $value)
    {
        $bulder->whereHas('categories', function ($b) use ($value) {
            return $b->where('title', 'like', "%{$value}%");
        });
    }

    public function tags(Builder $bulder, $value)
    {
        $bulder->whereHas('tags', function ($b) use ($value) {
           return $b->where('title', 'like', "%{$value}%");
        });
    }
}
