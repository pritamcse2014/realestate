<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard() {
        // echo 'Admin';
        // die();
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        // echo 'Logout';
        // die();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }

    public function AdminLogin() {
        // echo "Login";
        // die();
        return view('admin.admin_login');
    }

    public function AdminProfile() {
        // echo "Profile";
        // die();
        return view('admin.admin_profile');
    }
}
