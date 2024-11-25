<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\SendPdfController;
use App\Http\Controllers\SMTPController;
use App\Http\Controllers\TransactionsController;
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

    Route::get('admin/countries', [CountryController::class, 'adminCountriesList']);

    Route::get('admin/countries/add', [CountryController::class, 'adminAddCountries']);

    Route::post('admin/countries/add', [CountryController::class, 'adminStoreCountries']);

    Route::get('admin/countries/edit/{id}', [CountryController::class, 'adminCountriesEdit']);

    Route::post('admin/countries/edit/{id}', [CountryController::class, 'adminCountriesUpdate']);

    Route::get('admin/countries/delete/{id}', [CountryController::class, 'adminCountriesDelete']);

    Route::get('admin/state', [CountryController::class, 'adminStateList']);

    Route::get('admin/state/add', [CountryController::class, 'adminAddState']);

    Route::post('admin/state/add', [CountryController::class, 'adminStoreState']);

    Route::get('admin/state/edit/{id}', [CountryController::class, 'adminStateEdit']);
    
    Route::post('admin/state/edit/{id}', [CountryController::class, 'adminStateUpdate']);

    Route::get('admin/state/delete/{id}', [CountryController::class, 'adminStateDelete']);

    Route::get('admin/city', [CountryController::class, 'adminCityList']);

    Route::get('admin/city/add', [CountryController::class, 'adminAddCity']);

    Route::get('get-state-record/{countryId}', [CountryController::class, 'getStateRecord']);

    Route::post('admin/city/add', [CountryController::class, 'adminStoreCity']);

    Route::get('admin/city/edit/{id}', [CountryController::class, 'adminCityEdit']);

    Route::post('admin/city/edit/{id}', [CountryController::class, 'adminCityUpdate']);

    Route::get('admin/city/delete/{id}', [CountryController::class, 'adminCityDelete']);

    Route::get('admin/address', [CountryController::class, 'adminAddressList']);

    Route::get('admin/address/add', [CountryController::class, 'adminAddAddress']);

    Route::get('get-state/{countryId}', [CountryController::class, 'getState']);

    Route::get('get-city/{stateId}', [CountryController::class, 'getCity']);

    Route::post('admin/address/add', [CountryController::class, 'adminStoreAddress']);

    Route::get('admin/address/edit/{id}', [CountryController::class, 'adminAddressEdit']);

    Route::post('admin/address/edit/{id}', [CountryController::class, 'adminAddressUpdate']);

    Route::get('admin/address/delete/{id}', [CountryController::class, 'adminAddressDelete']);

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

    Route::get('admin/pdf', [ColorController::class, 'adminPdf']);

    Route::get('admin/pdfColor', [ColorController::class, 'adminPdfColor']);

    Route::get('admin/color/pdf/{id}', [ColorController::class, 'adminColorPdf']);

    Route::post('admin/color/change-status', [ColorController::class, 'adminColorChangeStatus']);

    Route::get('admin/order', [OrderController::class, 'adminOrderList']);

    Route::get('admin/order/add', [OrderController::class, 'adminAddOrder']);

    Route::post('admin/order/add', [OrderController::class, 'adminStoreOrder']);

    Route::get('admin/order/edit/{id}', [OrderController::class, 'adminOrderEdit']);

    Route::post('admin/order/edit/{id}', [OrderController::class, 'adminOrderUpdate']);

    Route::get('admin/order/delete/{id}', [OrderController::class, 'adminOrderDelete']);

    Route::get('admin/blog', [BlogController::class, 'adminBlogList']);

    Route::get('admin/blog/add', [BlogController::class, 'adminAddBlog']);

    Route::post('admin/blog/add', [BlogController::class, 'adminStoreBlog']);

    Route::get('admin/blog/view/{id}', [BlogController::class, 'adminBlogView']);

    Route::get('admin/blog/edit/{id}', [BlogController::class, 'adminBlogEdit']);

    Route::post('admin/blog/edit/{id}', [BlogController::class, 'adminBlogUpdate']);

    Route::get('admin/blog/delete/{id}', [BlogController::class, 'adminBlogDelete']);

    Route::get('admin/blog/truncate', [BlogController::class, 'adminBlogTruncate']);

    Route::get('admin/sendPdf', [SendPdfController::class, 'adminSendPdf']);

    Route::post('admin/sendPdfEmail', [SendPdfController::class, 'adminSendPdfEmail']);

    Route::get('admin/transactions', [TransactionsController::class, 'adminTransactionsList']);

    Route::get('admin/transactions/edit/{id}', [TransactionsController::class, 'adminTransactionsEdit']);

    Route::post('admin/transactions/edit/{id}', [TransactionsController::class, 'adminTransactionsUpdate']);
    
    Route::get('admin/transactions/delete/{id}', [TransactionsController::class, 'adminTransactionsDelete']);

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

    Route::get('agent/transactions/add', [TransactionsController::class, 'agentAddTransactions']);

    Route::post('agent/transactions/add', [TransactionsController::class, 'agentStoreTransactions']);

    Route::get('agent/transactions', [TransactionsController::class, 'agentTransactionsList']);
});

Route::get('setNewPassword/{token}', [AdminController::class, 'setNewPassword']);

Route::post('setNewPassword/{token}', [AdminController::class, 'resetNewPassword']);

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');