<?php

namespace App\Services\Fanfiction;

use App\Models\Fanfiction;
use App\Services\ImageUploader;

class Service
{
    public function store($data)
    {
        $id =  auth()->user()->id;
        $fanfiction = Fanfiction::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $id,
        ]);

        if (isset($data['image'])) {
            $imagePath = ImageUploader::save($data['image']);
            $fanfiction->update(['image' => $imagePath]);
        }


        $this->createTags($fanfiction, $data['tags'] ?? null);
        $this->createCategories($fanfiction, $data['categories'] ?? null);


    }

    private function createTags(Fanfiction $fanfiction, ?array $tags)
    {
        $fanfiction->tags()->attach($tags);
    }

    private function createCategories(Fanfiction $fanfiction, ?array $categories)
    {
        $fanfiction->categories()->attach($categories);
    }


    public function update(Fanfiction $fanfiction, $data)
    {
        $fanfiction->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        if (isset($data['image'])) {
            $imagePath = ImageUploader::save($data['image']);
            $fanfiction->update(['image' => $imagePath]);
        }

        $this->updateTags($fanfiction, $data['tags'] ?? null);
        $this->updateCategories($fanfiction, $data['categories'] ?? null);
    }

    private function updateTags(Fanfiction $fanfiction, ?array $tags)
    {
        $fanfiction->tags()->sync($tags);
    }

    private function updateCategories(Fanfiction $fanfiction, ?array $categories)
    {
        $fanfiction->categories()->sync($categories);
    }
}
