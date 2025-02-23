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
        $profile= Profile::first();
        $carousels = Carousel::all()->take(3);
        return view('admin.carousel-form', compact('profile', 'carousels'));
    }

    public function editCarousel()
    {
        return view('admin.edit-carousel-form');
    }

    public function postEditCarousel($carousel_id, Carousel $carousel)
    {
        $updateCarousel = $carousel->updateCarousel($carousel_id);
        if ($updateCarousel) {
            return redirect()->back()
                ->with([
                    'alert-type' => 'success',
                    'alert-message' => 'Carousel updated successfully!'
                ]);
        } else{
            return redirect()->back()
                ->with([
                    'alert-type' => 'error',
                    'alert-message' => 'Failed to update carousel!'
                ]);
        }
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
