<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\SMTPController;
use App\Http\Controllers\UserTimeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('admin/profile', [AdminController::class, 'AdminProfile']);

    Route::post('admin_profile/update', [AdminController::class, 'AdminProfileUpdate']);

    Route::get('admin/edit_profile', [AdminController::class, 'adminEditProfile']);

    Route::post('admin/edit_profile/update', [AdminController::class, 'adminEditProfileUpdate']);

    Route::get('admin/users', [AdminController::class, 'adminUsers']);
    
    Route::get('admin/users/view/{id}', [AdminController::class, 'adminUsersView']);

    Route::get('admin/users/add', [AdminController::class, 'adminAddUser']);

    Route::post('admin/users/add', [AdminController::class, 'adminStoreUser']);

    Route::get('admin/users/edit/{id}', [AdminController::class, 'adminUserEdit']);

    Route::post('admin/users/edit/{id}', [AdminController::class, 'adminUserUpdate']);
    
    Route::get('admin/users/delete/{id}', [AdminController::class, 'adminUserDelete']);

    Route::post('admin/users/update', [AdminController::class, 'adminUserUpdateName']);

    Route::get('admin/users/change-status', [AdminController::class, 'adminUserChangeStatus']);

    Route::post('checkemail', [AdminController::class, 'checkEmail']);

    Route::get('admin/week', [UserTimeController::class, 'adminWeekList']);

    Route::get('admin/week/add', [UserTimeController::class, 'adminAddWeek']);

    Route::post('admin/week/add', [UserTimeController::class, 'adminStoreWeek']);

    Route::get('admin/week/edit/{id}', [UserTimeController::class, 'adminWeekEdit']);

    Route::post('admin/week/edit/{id}', [UserTimeController::class, 'adminWeekUpdate']);

    Route::get('admin/week/delete/{id}', [UserTimeController::class, 'adminWeekDelete']);

    Route::get('admin/time', [UserTimeController::class, 'adminTimeList']);
    
    Route::get('admin/time/add', [UserTimeController::class, 'adminAddTime']);

    Route::post('admin/time/add', [UserTimeController::class, 'adminStoreTime']);

    Route::get('admin/time/edit/{id}', [UserTimeController::class, 'adminTimeEdit']);

    Route::post('admin/time/edit/{id}', [UserTimeController::class, 'adminTimeUpdate']);

    Route::get('admin/time/delete/{id}', [UserTimeController::class, 'adminTimeDelete']);

    Route::get('admin/schedule', [UserTimeController::class, 'adminScheduleList']);

    Route::post('admin/schedule', [UserTimeController::class, 'adminScheduleUpdate']);

    Route::get('admin/notification', [NotificationController::class, 'adminNotificationUpdate']);
    
    Route::post('admin/notificationSend', [NotificationController::class, 'adminNotificationSend']);

    Route::get('admin/qrcode', [QRCodeController::class, 'adminQRCodeList']);

    Route::get('admin/qrcode/add', [QRCodeController::class, 'adminAddQRCode']);

    Route::post('admin/qrcode/add', [QRCodeController::class, 'adminStoreQRCode']);

    Route::get('admin/qrcode/edit/{id}', [QRCodeController::class, 'adminQRCodeEdit']);

    Route::post('admin/qrcode/edit/{id}', [QRCodeController::class, 'adminQRCodeUpdate']);

    Route::get('admin/qrcode/delete/{id}', [QRCodeController::class, 'adminQRCodeDelete']);

    Route::get('admin/smtp', [SMTPController::class, 'adminSMTPUpdate']);

    Route::post('admin/smtpSend', [SMTPController::class, 'adminSMTPSend']);

    Route::get('admin/color', [ColorController::class, 'adminColorList']);

    Route::get('admin/color/add', [ColorController::class, 'adminAddColor']);

    Route::post('admin/color/add', [ColorController::class, 'adminStoreColor']);

    Route::get('admin/color/edit/{id}', [ColorController::class, 'adminColorEdit']);

    Route::post('admin/color/edit/{id}', [ColorController::class, 'adminColorUpdate']);
    
    Route::get('admin/color/delete/{id}', [ColorController::class, 'adminColorDelete']);

    Route::get('admin/order', [OrderController::class, 'adminOrderList']);

    Route::get('admin/order/add', [OrderController::class, 'adminAddOrder']);

    Route::post('admin/order/add', [OrderController::class, 'adminStoreOrder']);

    Route::get('admin/order/edit/{id}', [OrderController::class, 'adminOrderEdit']);

    Route::post('admin/order/edit/{id}', [OrderController::class, 'adminOrderUpdate']);

    Route::get('admin/order/delete/{id}', [OrderController::class, 'adminOrderDelete']);

    Route::get('admin/blog', [BlogController::class, 'adminBlogList']);

    Route::get('admin/blog/add', [BlogController::class, 'adminAddBlog']);

    Route::post('admin/blog/add', [BlogController::class, 'adminStoreBlog']);

    Route::get('admin/email/compose', [EmailController::class, 'adminEmailCompose']);

    Route::post('admin/email/composePost', [EmailController::class, 'adminEmailComposePost']);

    Route::get('admin/email/sent', [EmailController::class, 'adminEmailSent']);

    Route::get('admin/email/delete', [EmailController::class, 'adminEmailDelete']);

    Route::get('admin/email/read/{id}', [EmailController::class, 'adminEmailRead']);

    Route::get('admin/email/read/delete/{id}', [EmailController::class, 'adminEmailReadDelete']);
});

Route::middleware(['auth', 'role:agent'])->group(function() {
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

    Route::get('agent/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    
    Route::get('agent/email/inbox', [AdminController::class, 'AgentEmailInbox']);
});

Route::get('setNewPassword/{token}', [AdminController::class, 'setNewPassword']);

Route::post('setNewPassword/{token}', [AdminController::class, 'resetNewPassword']);

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');