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

    public function viewProfileForm()
    {
        $profile= Profile::first();
        return view('admin.profile-form', compact('profile'));
    }

    public function postProfileForm(Request $request, Profile $profile)
    {
        $companyProfile = $profile->updateProfile($request);

        if ($companyProfile) {
            return redirect()->back()
                ->with([
                    'alert-type' => 'success',
                    'alert-message' => 'Profile updated successfully!'
                ]);
        } else {
            return redirect()->back()
                ->with([
                    'alert-type' => 'error',
                    'alert-message' => 'Failed to update profile!'
                ]);
        }
    }

    public function viewCarouselForm()
    {
        $profile= Carousel::first();
        return view('admin.carousel-form', compact('profile'));
    }

    public function postCarouselForm(Request $request, Carousel $carousel)
    {
        $newCarousel = $carousel->createCarousel($request);

        if ($newCarousel) {
            return redirect()->back()
                ->with([
                    'alert-type' => 'success',
                    'alert-message' => 'Carousel created successfully!'
                ]);
        } else {
            return redirect()->back()
                ->with([
                    'alert-type' => 'error',
                    'alert-message' => 'Failed to create carousel!'
                ]);
        }
    }
}
