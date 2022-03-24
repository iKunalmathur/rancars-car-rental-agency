<?php

use App\Models\Role;
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

/* Open Routes */

Route::get('/', [\App\Http\Controllers\WelcomeController::class, "index"]);

// Auth only routes
Route::get('/dashboard', function () {
    switch (auth()->user()->role_id) {
        case Role::IS_ADMIN:
            return redirect()->route('admin.dashboard');
            break;
        case Role::IS_OWNER:
            return view("owner.dashboard");
            break;

        case Role::IS_CUSTOMER:
            return view("customer.dashboard");
            break;

        default:
            abort(404);
            break;
    }
})->middleware(['auth'])->name('dashboard');

// Auth only routes
Route::group(["middleware" => ["auth"], "as" => "auth."], function () {
    // Account Routes
    Route::controller(\App\Http\Controllers\Auth\AccountController::class)->group(function () {
        Route::get("/account", "index")->name("account");
        Route::put("/account/details", "details")->name("account.details");
        Route::put("/account/password", "password")->name("account.password");
    });
});

/* Admin Routes */
Route::group(["prefix" => "admin", "as" => "admin."], function () {
    Route::get("/dashboard", \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    // Auth routes
    Route::group(["middleware" => ["auth", "isAdmin"]], function () {
        Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
        Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
        Route::put('users/update/password', [\App\Http\Controllers\Admin\UserController::class, "password"])->name('users.update.password');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});

/* Owner/Agency Routes */
Route::group(["prefix" => "owner", "as" => "owner."], function () {

    // Owner/Agency Login GET & POST
    Route::controller(App\Http\Controllers\Owner\LoginController::class)->group(function () {
        Route::get("/login", "create")->name('login');
    });

    // Owner/Agency Register GET & POST
    Route::controller(App\Http\Controllers\Owner\RegisterController::class)->group(function () {
        Route::get("/register", "create")->name('register');
        Route::post('/register', 'store');
    });

    // Auth routes
    Route::group(["middleware" => ["auth", "isOwner"]], function () {
        Route::resource('cars', \App\Http\Controllers\Owner\CarController::class);
        Route::resource('bookings', \App\Http\Controllers\Owner\BookingController::class);
    });
});

/* Customer Routes */
Route::group(["prefix" => "customer", "as" => "customer."], function () {

    // Customer Login GET & POST
    Route::controller(App\Http\Controllers\Customer\LoginController::class)->group(function () {
        Route::get("/login", "create")->name('login');
    });

    // Customer Register GET & POST
    Route::controller(App\Http\Controllers\Customer\RegisterController::class)->group(function () {
        Route::get("/register", "create")->name('register');
        Route::post('/register', 'store');
    });

    Route::group(["middleware" => ["auth", "isCustomer"]], function () {
        Route::resource('bookings', \App\Http\Controllers\Customer\BookingController::class)->only("store", "index", "destroy");
        Route::resource('cars', \App\Http\Controllers\Customer\CarController::class)->only("show");
    });
});


require __DIR__ . '/auth.php';
