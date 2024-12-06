<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorizeNetController extends Controller
{
    public function authorizePayment(): View {
        // echo "Authorize Payment";
        // die();
        return view('authorizenetpayment');
    }
}
