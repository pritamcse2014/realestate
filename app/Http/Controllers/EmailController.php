<?php

namespace App\Http\Controllers;

use App\Models\ComposeEmail;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function adminEmailCompose() {
        // echo "Email";
        // die();
        $data['getEmail'] = User::whereIn('role', ['agent', 'user'])->get();
        return view('admin.email.compose', $data);
    }
    
    public function adminEmailComposePost(Request $request) {
        // dd($request->all());
        $save = new ComposeEmail;
        $save->user_id = $request->user_id;
        $save->cc_email = trim($request->cc_email);
        $save->subject = trim($request->subject);
        $save->descriptions = trim($request->descriptions);
        $save->save();
        return redirect('admin/email/compose')->with('success', 'Email Sent Successfully.');
    }
}
