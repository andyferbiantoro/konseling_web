<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GuruKonselingController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
	return view('welcome');
});



Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');


	


//Routing untuk role SuperAdmin
Route::middleware(['auth', 'superadmin'])->group(function () {
	Route::get('/superadmin_dashboard', [SuperAdminController::class, 'superadmin_dashboard'])->name('superadmin_dashboard');
	Route::get('/superadmin_guru_konseling', [SuperAdminController::class, 'superadmin_guru_konseling'])->name('superadmin_guru_konseling');

	Route::post('/superadmin_guru_add', [SuperAdminController::class, 'superadmin_guru_add'])->name('superadmin_guru_add');
	Route::post('/superadmin_guru_update/{id}', [SuperAdminController::class, 'superadmin_guru_update'])->name('superadmin_guru_update');
	Route::post('/superadmin_guru_delete/{id}', [SuperAdminController::class, 'superadmin_guru_delete'])->name('superadmin_guru_delete');

	Route::get('/c', [AuthController::class, 'superadmin_logout'])->name('superadmin_logout');
});	


//Routing untuk role SuperAdmin
Route::middleware(['auth', 'guru_konseling'])->group(function () {
	Route::get('/guru_konseling_dashboard', [GuruKonselingController::class, 'guru_konseling_dashboard'])->name('guru_konseling_dashboard');

	//kelas
	Route::get('/kelas', [GuruKonselingController::class, 'kelas'])->name('kelas');
	Route::post('/kelas_add', [GuruKonselingController::class, 'kelas_add'])->name('kelas_add');
	Route::post('/kelas_update/{id}', [GuruKonselingController::class, 'kelas_update'])->name('kelas_update');
	Route::post('/kelas_delete/{id}', [GuruKonselingController::class, 'kelas_delete'])->name('kelas_delete');

	//Siswa
	Route::get('/siswa', [GuruKonselingController::class, 'siswa'])->name('siswa');
	Route::post('/siswa_add', [GuruKonselingController::class, 'siswa_add'])->name('siswa_add');
	Route::post('/siswa_update/{id}', [GuruKonselingController::class, 'siswa_update'])->name('siswa_update');
	Route::post('/siswa_delete/{id}', [GuruKonselingController::class, 'siswa_delete'])->name('siswa_delete');

	//pelanggaran
	Route::get('/pelanggaran', [GuruKonselingController::class, 'pelanggaran'])->name('pelanggaran');
	Route::get('/lihat_pelanggaran{id}', [GuruKonselingController::class, 'lihat_pelanggaran'])->name('lihat_pelanggaran');
	Route::get('/cetak_surat_peringatan{id}', [GuruKonselingController::class, 'cetak_surat_peringatan'])->name('cetak_surat_peringatan');
	Route::post('/pelanggaran_add', [GuruKonselingController::class, 'pelanggaran_add'])->name('pelanggaran_add');
	Route::post('/pelanggaran_update/{id}', [GuruKonselingController::class, 'pelanggaran_update'])->name('pelanggaran_update');
	Route::post('/pelanggaran_delete/{id}', [GuruKonselingController::class, 'pelanggaran_delete'])->name('pelanggaran_delete');

	//Point 
	Route::get('/point', [GuruKonselingController::class, 'point'])->name('point');
	Route::post('/point_add', [GuruKonselingController::class, 'point_add'])->name('point_add');
	Route::post('/point_update/{id}', [GuruKonselingController::class, 'point_update'])->name('point_update');
	Route::post('/point_delete/{id}', [GuruKonselingController::class, 'point_delete'])->name('point_delete');
	

	Route::get('/guru_konseling_logout', [AuthController::class, 'guru_konseling_logout'])->name('guru_konseling_logout');
});	
