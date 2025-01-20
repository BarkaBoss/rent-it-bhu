<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function getItems(){
        return $this->paginate(25);
    }

    public function addItem($data)
    {
        $item = [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'availability' => $data['availability'],
        ];

        $item->save();

        foreach ($data['images'] as $imageFile) {
            $image = new Image();
            $path = $imageFile->store('images', 'public');
            $image->url = $path;
            $image->item_id = $item->id;
            $image->save();
        }
    }
}
