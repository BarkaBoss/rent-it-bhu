<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'availability',
    ];

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Images::class);
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
            'availability' => true,
        ];

        #$item->save();
        $thisItem = $this->create($item);

        foreach ($data['images'] as $imageFile) {
            $image = new Images();
            $imageName = md5($imageFile->getClientOriginalName() . time()) . "." . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('products', $imageName, 'my_files');
            $image->url = $path;
            $image->item_id = $thisItem->id;
            $thisItem->images()->save($image);
        }
        return $thisItem;
    }
}
