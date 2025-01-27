<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $profile= Profile::first();
        $items = Item::all();
        //dd($items[0]->images->first()->url);
        return view('admin.items-form', compact('profile','items'));
    }
    public function addItem(Request $request, Item $item)
    {
        $newItem = $item->addItem($request->all());

        if ($newItem) {
            return redirect()->back()
                ->with([
                        'alert-type' => 'success',
                        'alert-message' => 'New item created successfully!'
                    ]
                );
        } else {
            return redirect()->back()
                ->withInput()
                ->with([
                    'alert-type' => 'danger',
                    'alert-message' => 'An error occurred while creating a new item!',
                ],
            );
        }
    }
}
