<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function addItem(Request $request, Item $item)
    {
        $newItem = $item->addItem($request->all());

        if ($newItem) {
            return redirect()->route('items')
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
                ]);
        }
    }
}
