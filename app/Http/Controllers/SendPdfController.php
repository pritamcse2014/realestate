<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendPdfController extends Controller
{
    public function adminSendPdf() {
        // echo "Send PDF";
        // die();
        return view('admin.sendpdf.send');
    }

    public function adminSendPdfEmail(Request $request) {
        dd($request->all());
    }
}
