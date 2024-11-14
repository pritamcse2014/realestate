<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function adminColorList() {
        // echo "Color";
        // die();
        $data['getRecord'] = Color::get();
        return view('admin.color.list', $data);
    }

    public function adminAddColor() {
        // echo "Color Add";
        // die();
        return view('admin.color.add');
    }

    public function adminStoreColor(Request $request) {
        // dd($request->all());
        $save = new Color;
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/color')->with('success', 'Color Create Successfully.');
    }

    public function adminColorEdit($id) {
        $data['getRecord'] = Color::find($id);
        return view('admin.color.edit', $data);
    }
    
    public function adminColorUpdate(Request $request, $id) {
        $save = Color::find($id);
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/color')->with('success', 'Color Updated Successfully.');
    }

    public function adminColorDelete($id) {
        $save = Color::find($id);
        $save->delete();

        return redirect('admin/color')->with('success', 'Color Deleted Successfully.');
    }
}