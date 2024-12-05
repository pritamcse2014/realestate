<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addMore() {
        return view('addmore');
    }

    public function addMoreStore(Request $request) {
        // dd($request->all());
        $rules = [
            "name" => "required",
            "stock.*" => "required",
        ];
        foreach ($request->stock as $key => $value) {
            $rules["stock.{$key}.quantity"] = "required";
            $rules["stock.{$key}.price"] = "required";
        }
        $request->validate($rules);
        $product = Category::create([
            "name" => $request->name
        ]);
        foreach ($request->stock as $key => $value) {
            $product->stock()->create($value);
        }
        return redirect()->back()->with(['success' => 'Category Created Successfully.']);
    }
}
