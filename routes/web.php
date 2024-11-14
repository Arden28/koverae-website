<?php

use App\Http\Controllers\DocController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OAuth\AuthorizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/trial', [HomeController::class, 'trial'])->name('demo');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/docs', [DocController::class, 'index'])->name('docs.index');
Route::get('/kokoma', [HomeController::class, 'typo']);
// Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');


#Passport
// http://your-laravel-app.com/oauth/authorize?client_id=YOUR_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URI&response_type=code&scope=view-profile+edit-profile"
// Route::get('/oauth/authorize', [AuthorizationController::class, 'authorizeClient']);
// Route::post('/oauth/approve', [AuthorizationController::class, 'approve'])->middleware('auth:api')->name('approve');
// Route::post('/oauth/deny', [AuthorizationController::class, 'deny'])->name('deny');
// Route::post('/oauth/token', [AuthorizationController::class, 'issueToken']);

require __DIR__.'/auth.php';
