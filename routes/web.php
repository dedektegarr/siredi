<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\PolyController;
use App\Http\Controllers\QueueController;
use App\Models\MedicalRecord;
use App\Models\Medicine;
use Faker\Guesser\Name;
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

    Route::prefix('users')->group(function() {
        // doctor resource
        Route::resource('dokter', DoctorController::class);
        
        // nurse resource
        Route::resource('perawat', NurseController::class);
    
        // pharmacist resource
        Route::resource('apoteker', PharmacistController::class);
    });

    
    // patient resource
    Route::resource('pasien', PatientController::class);

    // poly resource
    Route::resource('poli', PolyController::class);

    // medicine resource
    Route::resource('obat', MedicineController::class);

    // queue resource
    Route::resource('antrian', QueueController::class);

    // medical record route
    Route::get('antrian/{antrian}/periksa', [QueueController::class, 'check'])->name('antrian.check');
        // show detail
        Route::get('pasien/{pasien}/rekam-medis/{rekam_medis}', [MedicalRecordController::class, 'show'])->name('rekam_medis.show');

        // store
        Route::post('rekam-medis', [MedicalRecordController::class, 'store'])->name('rekam_medis.store');
});

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('loginStore');
});

