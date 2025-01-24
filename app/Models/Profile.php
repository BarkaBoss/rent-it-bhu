<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'instagram_url',
        'facebook_url',
        'twitter_url',
        'tiktok_url',
        'youtube_url',
        'about',
        'logo'
    ];

    public function getProfile()
    {
        return $this->first();
    }

    public function updateProfile($data)
    {
        $profile = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'instagram_url' => $data['instagram_url'],
            'facebook_url' => $data['facebook_url'],
            'twitter_url' => $data['twitter_url'],
            'tiktok_url' => $data['tiktok_url'],
            'youtube_url' => $data['youtube_url'],
            'about' => $data['about']
        ];

        if(request()->hasFile('logo') && request()->file('logo')->isValid()) {
            $file = request()->file('logo');
            $imageName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/profile', $imageName);
            $profile['logo'] = $imageName;
        }else{
            $profile['logo'] = '';
        }

        return $this->updateOrInsert(
            ['id' => 1],
            $profile
        );
    }
}
