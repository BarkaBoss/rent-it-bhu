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
            $file->storeAs('carousel', $imageName, 'my_files');
            $carousel['image'] = $imageName;
        }else{
            $carousel['image'] = '';
        }

        return $this->create($carousel);
    }

    public function editCarousel($carousel_id)
    {
        $carouselId = decrypt($carousel_id);
        return $this->where('id', $carouselId)->first();
    }

    public function updateCarousel($data)
    {
        $carouselId = decrypt($data['carousel_id']);
        $updateCarousel = [
            'title' => $data['title'],
            'description' => $data['description'],
        ];
        if(request()->hasFile('image') && request()->file('image')->isValid()) {
            $file = request()->file('image');
            $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->storeAs('carousel', $imageName, 'my_files');
            $updateCarousel['image'] = $imageName;
        }else{
            $updateCarousel['image'] = '';
        }

        return $this->where('id', $carouselId)->update($updateCarousel);
    }
}
