<?php

namespace App\Services\Chapters;

use App\Models\Chapter;
use Illuminate\Support\Facades\Storage;

class ChaptersService
{
    public function store($data)
    {
        $text = Storage::disk('public')->put('/fileText/'.$data['fanFiction_id'].'.'.$data['title'], $data['text']);
        if (isset($text) ){
        $textWay = Storage::disk('public')->path('/fileText/'.$data['fanFiction_id'].'.'.$data['title']);
        } echo 'Файл не сохранился';

        Chapter::create([
            'title' => $data['title'],
            'text' => $textWay,
            'fanFiction_id' => $data['fanFiction_id'],
        ]);

    }

    public function update($chapter, $data)
    {
        Storage::disk('public')->delete('/fileText/' . $chapter['fanFiction_id'] . '.' . $chapter['title']);
        Storage::disk('public')->put('/fileText/' . $data['fanFiction_id'] . '.' . $data['title'], $data['text']);
        $textWay = Storage::disk('public')->path('/fileText/' . $data['fanFiction_id'] . '.' . $data['title']);

        $chapter->update([
            'title' => $data['title'],
            'text' => $textWay,
            'fanFiction_id' => $data['fanFiction_id'],
        ]);
    }
}
