<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function() {
    Route::get('/', function() {
        return view('dashboard', [
            'pageTitle' => 'Dashboard'
        ]);
    });

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'pageTitle' => 'Dashboard'
        ]);
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   
    // user resource
    Route::resource('user', UserController::class);

    // nurse resource
    Route::resource('perawat', NurseController::class);

});

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('loginStore');
});

