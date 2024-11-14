<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Kover\DatabaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\CartController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/home', function () {
//     return redirect()->route('home');
// });


// Route::get('/', [HomeController::class, 'home'])->name('home');

// Pricing
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/trial', [DemoController::class, 'demo'])->name('demo');

// Test
Route::get('/sms-test', [HomeController::class, 'testSmS']);

Route::middleware('auth')->prefix('my-kover')->group(function () {
    Route::get('/shop/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/shop/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
});

Route::middleware(['auth', 'cart'])->group(function () {
    Route::get('/shop/cart/delete', [CartController::class, 'deleteCart'])->name('cart.destroy');
    Route::get('/shop/checkout', [CartController::class, 'ship'])->name('cart.ship');
    Route::post('/shop/checkout', [CartController::class, 'shipping'])->name('cart.shipping');
    Route::get('/shop/checkout/payment', [CartController::class, 'payment'])->name('cart.pay');
    Route::post('/shop/checkout/payment/stripe', [CartController::class, 'charge'])->name('cart.pay.stripe');
});

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/docs', [DocumentationController::class, 'index'])->name('docs.index');

// Blog routes
Route::get('/blog', [HomeController::class, 'blog'])->name('blogs.index');
Route::get('/blog/{slug}', [HomeController::class, 'single'])->name('blogs.show');


Route::get('/kokoma', [HomeController::class, 'typo']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
// });

// Kover Account
Route::middleware('auth')->prefix('my-kover')->group(function () {
    Route::get('/databases', [DatabaseController::class, 'index'])->name('kovers.databases');
    Route::get('/home', [ProfileController::class, 'index'])->name('kovers.home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// OAuth 2.0
Route::get('auth/k/redirect', [HomeController::class, 'redirectToProvider'])->name('oauth.redirect');
Route::get('auth/k/callback', [HomeController::class, 'handleProviderCallback'])->name('oauth.callback');

require __DIR__.'/auth.php';
