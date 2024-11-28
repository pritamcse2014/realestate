<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function adminSupportList(Request $request) {
        // echo "Support List";
        // die();
        $getSupport = Support::getDetails($request);
        $data['getRecord'] = $getSupport;
        $data['getUser'] = User::get();
        return view('admin.support.list', $data);
    }

    public function adminSupportReply($id) {
        $getSupport = Support::where('id', '=', $id);
        $getSupport = $getSupport->first();
        $data['getUser'] = $getSupport;
        return view('admin.support.reply', $data);
    }
}
