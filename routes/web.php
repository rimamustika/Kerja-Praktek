<?php

use App\Http\Controllers\DataHarianController;
use App\Http\Controllers\DataPemasukannController;
use App\Http\Controllers\DataPengeluaranController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\LaporanKeluarController;
use App\Models\UangMasuk;
use App\Models\UangKeluar;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    // $dataPemasukan = UangMasuk::select(DB::raw('SUM(jumlah) as total'), DB::raw('MONTH(created_at) as month'))
    // ->groupBy('month')
    // ->orderBy('month')
    // ->pluck('total')->toArray();

    // $dataPengeluaran = UangKeluar::select(DB::raw('SUM(jumlah) as total'), DB::raw('MONTH(created_at) as month'))
    // ->groupBy('month')
    // ->orderBy('month')
    // ->pluck('total')->toArray();

    // // Pastikan array memiliki 12 elemen untuk setiap bulan
    // $dataPemasukan = array_pad($dataPemasukan, 12, 0);
    // $dataPengeluaran = array_pad($dataPengeluaran, 12, 0);

    // return view('dashboard',compact('dataPemasukan', 'dataPengeluaran'));

     return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    // Route::get('/dataharian', [DataHarianController::class, 'index'])->name('dataharian.index');
    Route::get('/inputdata', [InputDataController::class, 'index'])->name('inputdata.index');

    Route::get('/datapemasukan', [DataPemasukannController::class, 'index'])->name('datapemasukan.index');
    Route::get('/datapemasukan/create', [DataPemasukannController::class, 'create'])->name('datapemasukan.create');
    Route::post('/datapemasukan', [DataPemasukannController::class, 'store'])->name('datapemasukan.store');
    Route::get('/datapemasukan/{id}/edit', [DataPemasukannController::class, 'edit'])->name('datapemasukan.edit');
    Route::match(['put', 'patch'],'/datapemasukan/{id}', [DataPemasukannController::class, 'update'])->name('datapemasukan.update');
    Route::delete('/datapemasukan/{id}', [DataPemasukannController::class, 'destroy'])->name('datapemasukan.destroy');

    Route::get('/datapengeluaran', [DataPengeluaranController::class, 'index'])->name('datapengeluaran.index');
    Route::get('/datapengeluaran/create', [DataPengeluaranController::class, 'create'])->name('datapengeluaran.create');
    Route::post('/datapengeluaran', [DataPengeluaranController::class, 'store'])->name('datapengeluaran.store');
    Route::get('/datapengeluaran/{id}/edit', [DataPengeluaranController::class, 'edit'])->name('datapengeluaran.edit');
    Route::match(['put', 'patch'],'/datapengeluaran/{id}', [DataPengeluaranController::class, 'update'])->name('datapengeluaran.update');
    Route::delete('/datapengeluaran/{id}', [DataPengeluaranController::class, 'destroy'])->name('datapengeluaran.destroy');

    Route::get('/datapengeluaran', [DataPengeluaranController::class, 'index'])->name('datapengeluaran.index');
    Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');

    Route::get('/laporanmasuk', [LaporanMasukController::class, 'index'])->name('laporanmasuk.index');
    Route::get('/laporanmasuk/print', [LaporanMasukController::class, 'print'])->name('laporanmasuk.print');
    Route::get('/laporanmasuk/export', [LaporanMasukController::class, 'export'])->name('laporanmasuk.export');

    Route::get('/laporankeluar', [LaporanKeluarController::class, 'index'])->name('laporankeluar.index');
    Route::get('/laporankeluar/print', [LaporanMasukController::class, 'print'])->name('laporankeluar.print');
    Route::get('/laporankeluar/export', [LaporanMasukController::class, 'export'])->name('laporankeluar.export');



});

require __DIR__ . '/auth.php';
