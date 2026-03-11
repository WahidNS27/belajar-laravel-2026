<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\perhitunganController;
use App\Http\Controllers\pesertaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




//get = meliht data atau menampilkan nya
//post = mengirim data
//put/patch = merubah atau mengedit data
//delete = menghapus data

Route::get('navbar', function () {
    return view('inc.navbar');
});


//tampilan form perhitungan
route::get('perhitungan', function () {
    return view('perhitungan.index');
})->name('perhitungan.index');

// aksi perhitungan nya
route::post('perhitungan', [App\Http\Controllers\perhitunganController::class, 'store'])->name('perhitungan.store');

//tampilan form luas permukaan kubus
// Route::get('luaspermukaankubus', [App\Http\Controllers\perhitunganController::class, 'index'])->name('luaspermukaankubus.index');

// aksi perhitungan LP Kubus
// route::post('/lp-kubus', [App\Http\Controllers\perhitunganController::class, 'indexpKubus'])->name('luaspermukaankubus.store');

//tampilan form luas permukaan kubus


// Route::get('volumekubus', function () {
//     return view('inc.navbar');
// })->name('volumekubus.index');

route::get('volumekubus', [perhitunganController::class, 'indexVolKubus'])->name('volumekubus.index');
route::post('volumekubus', [perhitunganController::class, 'storeVolKubus'])->name('volumeKubus.store');

//
route::get('luaspermukaankubus', [perhitunganController::class, 'lpKubus'])->name('luaspermukaankubus.index');
route::post('luaspermukaankubus', [perhitunganController::class, 'storelpKubus'])->name('luaspermukaankubus.store');

route::get('volumetabung', [perhitunganController::class, 'volTabung'])->name('volumetabung.index');
route::post('volumetabung', [perhitunganController::class, 'storeVolTabung'])->name('volumeTabung.store');

//volumeLimas CRUD
Route::get('volumelimas', [App\Http\Controllers\volumeLimasController::class, 'index'])->name('volumelimas.index');
Route::get('volumelimas/create', [\App\Http\Controllers\volumeLimasController::class, 'create'])->name('volumelimas.create');
Route::post('volumelimas/store', [\App\Http\Controllers\volumeLimasController::class, 'store'])->name('volumelimas.store');
route::get('volumelimas/edit/{id}', [\App\Http\Controllers\volumeLimasController::class, 'edit'])->name('volumelimas.edit');
route::put('volumelimas/update/{id}', [\App\Http\Controllers\volumeLimasController::class, 'update'])->name('volumelimas.update');
route::delete('volumelimas/delete/{id}', [\App\Http\Controllers\volumeLimasController::class, 'destroy'])->name('volumelimas.destroy');


//shortcut untuk url crud dengan function controller dengan menggunakan php artisan make:model volumelimasController -m yang dimana itu sekalian mengcreate tabel database baru di php artisan migrate lalu membuat controller dengan php artisan make:controller volumelimasController -r (r itu resource);
// Route::resource('volumelimas', App\Http\Controllers\volumeLimasController::class);


//pserta route
Route::get('peserta', [pesertaController::class, 'index'])->name('peserta.index');
Route::get('peserta/create', [pesertaController::class, 'create'])->name('peserta.create');
Route::post('peserta/store', [pesertaController::class, 'store'])->name('peserta.store');
route::get('peserta/edit/{id}', [pesertaController::class, 'edit'])->name('peserta.edit');
route::put('peserta/update/{id}', [pesertaController::class, 'update'])->name('peserta.update');
route::delete('peserta/delete/{id}', [pesertaController::class, 'destroy'])->name('peserta.destroy');


//test belajar
route::get('belajar-laravel', [BelajarController::class, 'index'])->name('belajar');
route::get('siswa', [BelajarController::class, 'getSiswa'])->name('getSiswa');

route::get('create', [BelajarController::class, 'create'])->name('siswa.create');
route::post('store', [BelajarController::class, 'store'])->name('siswa.store');


route::get('/', [\App\http\Controllers\LoginController::class, 'index']);

route::get('dashboard', [DashboardController::class, 'index']);


route::post('action-login', [LoginController::class, 'actionLogin'])->name('action-login');
route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('user', UserController::class);

Route::resource('role', RoleController::class);

Route::resource('student', StudentController::class);

Route::resource('student', AttendanceController::class);
