<?php

use Illuminate\Support\Facades\Route;
use Modules\MyKover\Http\Controllers\InvoiceController;
use Modules\MyKover\Http\Controllers\MyKoverController;
use Modules\MyKover\Http\Controllers\OrderController;
use Modules\MyKover\Http\Controllers\PaymentController;
use Modules\MyKover\Http\Controllers\ProfileController;
use Modules\MyKover\Http\Controllers\SecurityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('my-kover')->middleware(['auth', 'twofactor'])->group(function() {
    Route::get('/', [MyKoverController::class, 'index'])->name('dashboard');

    // Profile
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/personal-info', [ProfileController::class, 'edit'])->name('profile.edit');
    // Aavatar
    Route::patch('/personal-info/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    // Name
    Route::get('/personal-info/name', [ProfileController::class, 'editName'])->name('profile.edit.name');
    Route::patch('/personal-info/name', [ProfileController::class, 'updateName'])->name('profile.update.name');
    // Birth date
    Route::get('/personal-info/birth', [ProfileController::class, 'editBirthday'])->name('profile.edit.birth');
    Route::patch('/personal-info/birth', [ProfileController::class, 'updateBirth'])->name('profile.update.birth');
    // Gender
    Route::get('/personal-info/gender', [ProfileController::class, 'editGender'])->name('profile.edit.gender');
    Route::patch('/personal-info/gender', [ProfileController::class, 'updateGender'])->name('profile.update.gender');
    // E-mail Addresses
    Route::get('/personal-info/email-addresses', [ProfileController::class, 'editEmail'])->name('profile.edit.email');
    Route::patch('/personal-info/email-addresses', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    // Phone Number
    Route::get('/personal-info/phone-number', [ProfileController::class, 'editPhone'])->name('profile.edit.phone');
    Route::patch('/personal-info/phone-number', [ProfileController::class, 'updatePhone'])->name('profile.update.phone');
    // Home Address
    Route::get('/personal-info/home-address', [ProfileController::class, 'editHomeAddress'])->name('profile.edit.home-address');
    Route::patch('/personal-info/home-address', [ProfileController::class, 'updateHomeAddress'])->name('profile.update.home-address');
    // Work Address
    Route::get('/personal-info/work-address', [ProfileController::class, 'editWorkAddress'])->name('profile.edit.work-address');
    Route::patch('/personal-info/work-address', [ProfileController::class, 'updateWorkAddress'])->name('profile.update.work-address');

    // Security
    Route::get('/security', [SecurityController::class, 'edit'])->name('security.edit');
    // Security Notification
    Route::get('/security/notification', [SecurityController::class, 'editAlert'])->name('security.edit.notification');
    Route::delete('/devices/{ip}', [SecurityController::class, 'deleteByIp'])->name('devices.deleteByIp');
    // Password
    Route::middleware('password.confirm')->get('/security/password', [SecurityController::class, 'editPassword'])->name('security.edit.password');
    Route::patch('/security/password', [SecurityController::class, 'updatePassword'])->name('security.update.password');
    // Two-step validation
    Route::middleware('password.confirm')->get('/security/two-step', [SecurityController::class, 'editTwoStep'])->name('security.edit.steps');
    Route::patch('/security/two-step', [SecurityController::class, 'updateTwoStep'])->name('security.update.steps');

    // Payment methods
    Route::get('/payments-and-subscriptions', [PaymentController::class, 'edit'])->name('payment.edit');
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    // Orders
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice.index');
});
