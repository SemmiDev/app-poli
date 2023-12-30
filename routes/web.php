<?php

use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaPasienController;
use App\Http\Controllers\Dokter\RiwayatPasienController;
use App\Http\Controllers\Pasien\DaftarPoliController;
use App\Http\Controllers\ProfileController;
use App\Models\DaftarPoli;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix("admin")->group(function () {
    Route::get("/dokter", [DokterController::class, 'index'])->name('admin.dokter.index');
    Route::get("/dokter/create", [DokterController::class, 'create'])->name('admin.dokter.create');
    Route::post("/dokter/store", [DokterController::class, 'store'])->name('admin.dokter.store');
    Route::get("/dokter/edit/{dokter}", [DokterController::class, 'edit'])->name('admin.dokter.edit');
    Route::put("/dokter/update/{dokter}", [DokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete("/dokter/destroy/{dokter}", [DokterController::class, 'destroy'])->name('admin.dokter.destroy');

    Route::get("/pasien", [PasienController::class, 'index'])->name('admin.pasien.index');
    Route::get("/pasien/create", [PasienController::class, 'create'])->name('admin.pasien.create');
    Route::post("/pasien/store", [PasienController::class, 'store'])->name('admin.pasien.store');
    Route::get("/pasien/edit/{pasien}", [PasienController::class, 'edit'])->name('admin.pasien.edit');
    Route::put("/pasien/update/{pasien}", [PasienController::class, 'update'])->name('admin.pasien.update');
    Route::delete("/pasien/destroy/{pasien}", [PasienController::class, 'destroy'])->name('admin.pasien.destroy');

    Route::get("/poli", [PoliController::class, 'index'])->name('admin.poli.index');
    Route::get("/poli/create", [PoliController::class, 'create'])->name('admin.poli.create');
    Route::post("/poli/store", [PoliController::class, 'store'])->name('admin.poli.store');
    Route::get("/poli/edit/{poli}", [PoliController::class, 'edit'])->name('admin.poli.edit');
    Route::put("/poli/update/{poli}", [PoliController::class, 'update'])->name('admin.poli.update');
    Route::delete("/poli/destroy/{poli}", [PoliController::class, 'destroy'])->name('admin.poli.destroy');

    Route::get("/obat", [ObatController::class, 'index'])->name('admin.obat.index');
    Route::get("/obat/create", [ObatController::class, 'create'])->name('admin.obat.create');
    Route::post("/obat/store", [ObatController::class, 'store'])->name('admin.obat.store');
    Route::get("/obat/edit/{obat}", [ObatController::class, 'edit'])->name('admin.obat.edit');
    Route::put("/obat/update/{obat}", [ObatController::class, 'update'])->name('admin.obat.update');
    Route::delete("/obat/destroy/{obat}", [ObatController::class, 'destroy'])->name('admin.obat.destroy');
});

Route::middleware('auth')->prefix("dokter")->group(function () {
    Route::get("/jadwal-periksa", [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
    Route::get("/jadwal-periksa/create", [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
    Route::post("/jadwal-periksa/store", [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
    Route::get("/jadwal-periksa/edit/{jadwal}", [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal-periksa.edit');
    Route::put("/jadwal-periksa/update/{jadwal}", [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
    Route::delete("/jadwal-periksa/destroy/{jadwal}", [JadwalPeriksaController::class, 'destroy'])->name('dokter.jadwal-periksa.destroy');


    Route::get("/periksa-pasien", [PeriksaPasienController::class, 'index'])->name('dokter.periksa.index');
    Route::get("/periksa-pasien/create", [PeriksaPasienController::class, 'create'])->name('dokter.periksa-pasien.create');
    Route::post("/periksa-pasien/store", [PeriksaPasienController::class, 'store'])->name('dokter.periksa-pasien.store');
    Route::get("/periksa-pasien/detail/{poli}", [PeriksaPasienController::class, 'detail'])->name('dokter.periksa-pasien.detail');
    Route::get("/periksa-pasien/show/{poli}", [PeriksaPasienController::class, 'edit'])->name('dokter.periksa-pasien.edit');
    Route::put("/periksa-pasien/update/{poli}", [PeriksaPasienController::class, 'update'])->name('dokter.periksa-pasien.update');
    Route::delete("/periksa-pasien/destroy/{poli}", [PeriksaPasienController::class, 'destroy'])->name('dokter.periksa-pasien.destroy');

    Route::get("/riwayat-pasien", [RiwayatPasienController::class, 'index'])->name('dokter.riwayat-pasien.index');
    Route::get("/riwayat-pasien/show/{poli}", [RiwayatPasienController::class, 'show'])->name('dokter.riwayat-pasien.show');
});

Route::middleware('auth')->prefix("pasien")->group(function () {
    Route::get("/daftar-poli", [DaftarPoliController::class, 'index'])->name('pasien.daftar-poli.index');
    Route::get("/daftar-poli/create", [DaftarPoliController::class, 'create'])->name('pasien.daftar-poli.create');
    Route::post("/daftar-poli/store", [DaftarPoliController::class, 'store'])->name('pasien.daftar-poli.store');
    Route::get("/daftar-poli/show/{poli}", [DaftarPoliController::class, 'show'])->name('dokter.daftar-poli.show');
    Route::delete("/daftar-poli/destroy/{poli}", [DaftarPoliController::class, 'destroy'])->name('dokter.daftar-poli.destroy');
});

Route::get('/api/jadwal-periksa', [DaftarPoliController::class, 'getDaftarJadwalByPoli'])->name('dokter.jadwal-periksa.get-jadwal');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
