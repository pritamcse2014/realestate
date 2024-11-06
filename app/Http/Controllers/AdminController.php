<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisteredMail;
use App\Http\Requests\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function AdminDashboard() {
        // echo 'Admin';
        // die();
        $user = User::selectRaw('count(id) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
        $data['months'] = $user->pluck('month');
        $data['counts'] = $user->pluck('count');
        return view('admin.index', $data);
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

    public function adminUsers(Request $request) {
        // echo "Users";
        // die();
        $data['getRecord'] = User::getRecord($request);
        return view('admin.users.list', $data);
    }

    public function adminUsersView($id) {
        // echo "Users";
        // die();
        $data['getRecord'] = User::find($id);
        return view('admin.users.view', $data);
    }

    public function adminAddUser() {
        // echo "Add";
        // die();
        return view('admin.users.add');
    }

    public function adminStoreUser(Request $request) {
        // dd($request->all());
        $save = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'status' => 'required',
        ]);
        $save = new User;
        $save->name = trim($request->name);
        $save->username = trim($request->username);
        $save->email = trim($request->email);
        $save->phone = trim($request->phone);
        $save->role = trim($request->role);
        $save->status = trim($request->status);
        $save->remember_token = Str::random(50);
        $save->save();

        Mail::to($save->email)->send(new RegisteredMail($save));

        return redirect('admin/users')->with('success', 'User Create Successfully.');
    }

    public function adminUserEdit($id) {
        // echo $id;
        // die();
        $data['getRecord'] = User::find($id);
        return view('admin.users.edit', $data);
    }

    public function adminUserUpdate($id, Request $request) {
        // dd($request->all());
        $save = User::find($id);
        $save->name = trim($request->name);
        $save->username = trim($request->username);
        $save->phone = trim($request->phone);
        $save->role = trim($request->role);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/users')->with('success', 'User Updated Successfully.');
    }

    public function setNewPassword($token) {
        // echo $token;
        // die();
        $data['token'] = $token;
        return view('auth.reset_password', $data);
    }

    public function resetNewPassword($token, ResetPassword $request) {
        $user = User::where('remember_token', '=', $token);
        if ($user->count() === 0) {
            about(403);
        }
        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect('admin/login')->with('success', 'Password Reset Successfully.');
    }
}
