<?php

namespace App\Http\Controllers;

use App\Models\ComposeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeEmailMail;

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
        // Email Send Start
        $getUserEmail = User::where('id', '=', $request->user_id)->first();
        Mail::to($getUserEmail->email)->cc($request->cc_email)->send(new ComposeEmailMail($save));
        // Email Send End
        return redirect('admin/email/compose')->with('success', 'Email Sent Successfully.');
    }

    public function adminEmailSent() {
        // echo "Email Sent";
        // die();
        $data['getRecord'] = ComposeEmail::get();
        return view('admin.email.send', $data);
    }

    public function adminEmailDelete(Request $request) {
        if (!empty($request->id)) {
            $option = explode(',', $request->id);
            foreach ($option as $id) {
                if (!empty($id)) {
                    $getRecord = ComposeEmail::find($id);
                    $getRecord->delete();
                }
            }
        }
        return redirect()->back()->with('success', 'Delete Email Successfully.');
    }
}
