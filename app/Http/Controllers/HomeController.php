<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $carousel = Carousel::all(3);
        $items = Item::all();
        return view('home', compact('profile', 'carousel', 'items'));
    }
}
