<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
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

    Route::get('admin/email/compose', [EmailController::class, 'adminEmailCompose']);

    Route::post('admin/email/composePost', [EmailController::class, 'adminEmailComposePost']);

    Route::get('admin/email/sent', [EmailController::class, 'adminEmailSent']);

    Route::get('admin/email/delete', [EmailController::class, 'adminEmailDelete']);

    Route::get('admin/email/read/{id}', [EmailController::class, 'adminEmailRead']);

    Route::get('admin/email/read/delete/{id}', [EmailController::class, 'adminEmailReadDelete']);
});

Route::middleware(['auth', 'role:agent'])->group(function() {
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

Route::get('setNewPassword/{token}', [AdminController::class, 'setNewPassword']);

Route::post('setNewPassword/{token}', [AdminController::class, 'resetNewPassword']);

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');