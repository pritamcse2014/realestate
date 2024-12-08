<?php

namespace App\Http\Controllers;

use App\Mail\EmailOTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailOTPController extends Controller
{
    public function adminAddEmailOTP() {
        // echo "Email OTP";
        // die();
        return view('admin.emailotp.add');
    }

    public function adminStoreEmailOTP(Request $request) {
        // dd($request->all());
        $count = User::where('email', '=', $request->email)->count();
        // dd($count);
        if (!empty($count)) {
            // dd("IF");
            $user = User::where('email', '=', $request->email)->first();
            $randomOTP = rand(1111, 9999);
            $user->email_otp = $randomOTP;
            $user->save();
            Mail::to($request->email)->send(new EmailOTPMail($user, $randomOTP));
            return redirect('admin/emailOTP/verify')->with('success', 'Email OTP Sent Successfully.');
        } else {
            // dd("ELSE");
            return redirect()->back()->with('error', 'Email OTP Sent Failed.');
        }
    }

    public function adminEmailOTPVerify() {
        // echo "OTP Verify";
        // die();
        return view('admin.emailotp.verify');
    }

    public function adminStoreEmailOTPVerify(Request $request) {
        dd($request->all());
    }
}
