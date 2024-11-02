<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function adminEmailCompose() {
        // echo "Email";
        // die();
        return view('admin.email.compose');
    }
    
    public function adminEmailComposePost(Request $request) {
        dd($request->all());
    }
}
