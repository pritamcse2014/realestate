<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function adminNotificationUpdate() {
        $data['getRecord'] = User::get();
        return view('admin.notification.update', $data);
    }
}
