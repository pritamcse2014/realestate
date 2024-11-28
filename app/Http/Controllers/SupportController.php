<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function adminSupportList(Request $request) {
        // echo "Support List";
        // die();
        $getSupport = Support::getDetails($request);
        $data['getRecord'] = $getSupport;
        return view('admin.support.list', $data);
    }
}
