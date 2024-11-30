<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function itemCreate() {
        $input = [
            'name' => 'Mobile',
            'details' => [
                'brand' => 'Apple',
                'tags' => [
                    'Red',
                    'Black',
                    'White'
                ]
            ]
        ];
        return Item::create($input);
    }

    public function itemSearch() {
        // $item = Item::whereJsonContains('details->tags', 'Black')->get();
        $item = Item::get();
        return $item;
    }
}
