<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailOTPController extends Controller
{
    public function adminAddEmailOTP() {
        // echo "Email OTP";
        // die();
        return view('admin.emailotp.add');
    }

    public function adminStoreEmailOTP(Request $request) {
        dd($request->all());
    }
}
