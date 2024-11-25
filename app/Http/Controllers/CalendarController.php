<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function adminCalendarList(Request $request) {
        if ($request->ajax()) {
            $data = Calendar::whereDate('start', '>=', $request->start)
                    ->whereDate('end', '<=', $request->end)
                    ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('admin.calendar.list');
    }

    public function adminCalendarAction(Request $request) {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Calendar::create([
                    'title' =>  $request->title,
                    'start' =>  $request->start,
                    'end' =>  $request->end,
                ]);
                return response()->json($event);
            }
            if ($request->type == 'update') {
                $event = Calendar::find($request->id)->update([
                    'title' =>  $request->title,
                    'start' =>  $request->start,
                    'end' =>  $request->end,
                ]);
                return response()->json($event);
            }
            if ($request->type == 'delete') {
                $event = Calendar::find($request->id)->delete();
                return response()->json($event);
            }
        }
    }
}
