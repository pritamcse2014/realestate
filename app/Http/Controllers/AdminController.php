<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile', $data);
    }

    public function AdminProfileUpdate(Request $request) {
        // dd($request->all());
        $user = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);
        $user = User::find(Auth::user()->id);
        // dd($user);
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        if (!empty ($request->password)) {
            $user->password = Hash::make($request->password);
        }
        if (!empty ($request->file('photo'))) {
            $file = $request->file('photo');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->photo = $filename;
        }
        $user->about = trim($request->about);
        $user->address = trim($request->address);
        $user->website = trim($request->website);
        $user->save();
        return redirect('admin/profile')->with('success', 'Profile Updated Successfully.');
    }

    public function adminUsers() {
        // echo "Users";
        // die();
        $data['getRecord'] = User::getRecord();
        return view('admin.users.list', $data);
    }
}
