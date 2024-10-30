<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard() {
        // echo 'Admin';
        // die();
        return view('admin.index');
    }
}
