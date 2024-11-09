<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;

class UserTimeController extends Controller
{
    public function adminWeekList() {
        // echo "Admin Week List";
        // die();
        $data['getRecord'] = Week::get();
        return view('admin.week.list', $data);
    }

    public function adminAddWeek() {
        // echo "Admin Week Add";
        // die();
        return view('admin.week.add');
    }

    public function adminStoreWeek(Request $request) {
        // dd($request->all());
        $save = new Week;
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/week')->with('success', 'Week Create Successfully.');
    }

    public function adminWeekEdit($id) {
        $data['getRecord'] = Week::find($id);
        return view('admin.week.edit', $data);
    }

    public function adminWeekUpdate(Request $request, $id) {
        $save = Week::find($id);
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/week')->with('success', 'Week Updated Successfully.');
    }

    public function adminWeekDelete(Request $request, $id) {
        $save = Week::find($id);
        $save->delete();

        return redirect('admin/week')->with('success', 'Week Deleted Successfully.');
    }
}
