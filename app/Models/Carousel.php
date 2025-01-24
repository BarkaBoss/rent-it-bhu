<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $table = 'carousels';

    protected $fillable = [
      'title',
      'description',
      'image',
    ];

    public function getAllCarousel()
    {
        return Carousel::all()->take(3);
    }

    public function createCarousel($data)
    {
        $carousel = [
            'title'=> $data['title'],
            'description' => $data['description'],
        ];

        if(request()->hasFile('image') && request()->file('image')->isValid()) {
            $file = request()->file('image');
            $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/carousel', $imageName);
            $carousel['image'] = $imageName;
        }else{
            $carousel['image'] = '';
        }

        return $this->create($carousel);
    }
}
