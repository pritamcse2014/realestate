<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class FormController extends Controller
{
    public function usersCreate(): View {
        return view('userscreate');
    }

    public function usersCreateStore(Request $request) {
        // dd($request->all());
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->save();

        return redirect('usersCreate')->with('success', 'User Create Successfully.');
    }

    public function eloquentTrashed($id) {
        // dd($id);
        $getRecord = Color::withTrashed()->find($id);
        // $getRecord = Color::withTrashed()->findOrFail($id);
        dd($getRecord);
    }
}
