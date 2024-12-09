<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function usersDateFormate(Request $request) {
        if ($request->ajax()) {
            $data = User::query();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $row->status ? "Active" : "Inactive";
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at ? $row->created_at->format('d-m-Y H:i:s') : '';
                })
                ->editColumn('updated_at', function ($row) {
                    return $row->updated_at ? $row->updated_at->format('d-m-Y H:i:s') : '';
                })
                ->addColumn('action', function ($row) {
                    return '<a class="edit btn btn-primary btn-sm" href="javascript:void(0)">View</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('usersdateformate');
    }
}
