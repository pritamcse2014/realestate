<?php

namespace App\Http\Controllers;

use App\Mail\SendPDFMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendPdfController extends Controller
{
    public function adminSendPdf() {
        // echo "Send PDF";
        // die();
        return view('admin.sendpdf.send');
    }

    public function adminSendPdfEmail(Request $request) {
        // dd($request->all());
        $request->validate([
            'pdf'   =>  'required|file|mimes:pdf|max:2048',
            'email'   =>  'required',
            'subject'   =>  'required',
            'message'   =>  'required',
        ]);
        try {
            $file = $request->file('pdf');
            $filePath = $file->store('documents');
            $fileUrl = asset('storage/app/'.$filePath);
            Mail::to($request->email)->queue(new SendPDFMail($request, $filePath, $fileUrl));
        } catch (\Exception $e) {
            
        }
        return redirect()->back()->with('success', 'Send PDF Successfully.');
    }
}
