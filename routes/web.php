<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasatkerController;
use App\Http\Controllers\DepartemenControlller;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\PresensiController;
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


Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

/*hanya bisa diakses oleh guest*/
Route::middleware(['guest:satker'])->group(function () {
    Route::get('/panelsatker', function () {
        return view('auth.loginsatker');
    })->name('loginsatker');

    Route::post('/prosesloginsatker', [AuthController::class, 'prosesloginsatker']);
});


/*hanya bisa diakses oleh guest*/
Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');

    Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});

Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/proseslogout', [AuthController::class, 'proseslogout']);
    Route::get('/presensi/create', [PresensiController::class, 'create']);
    Route::post('/presensi/store', [PresensiController::class, 'store']);
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nik}/updateprofile', [PresensiController::class, 'updateprofile']);
    Route::get('/presensi/histori', [PresensiController::class, 'histori']);
    Route::post('/gethistori', [PresensiController::class, 'gethistori']);

    Route::get('/presensi/izin', [PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
    Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);

    Route::post('/presensi/cekpengajuanizin', [PresensiController::class, 'cekpengajuanizin']);


});


//Route::middleware(['auth:satker'])->group(function(){
//    Route::get('/proseslogoutsatker',[AuthController::class,'proseslogoutsatker']);
//    Route::get('panelsatker/dashboardsatker',[DashboardController::class,'dashboardsatker']);
//});
/*hanya utk satker yang terotentikasi*/

/*Hanya untuk user yang telah terotentikasi*/
//Route::get('/panelsatker/dashboardsatker', [DashboardController::class, 'dashboardsatker']);
Route::middleware(['auth:satker', 'checkrole'])->group(function () {
    Route::get('/proseslogoutsatker', [AuthController::class, 'proseslogoutsatker']);
    Route::get('/panelsatker/dashboardsatker', [DashboardController::class, 'dashboardsatker']);

    //DataUser
    Route::get('/datasatker', [DatasatkerController::class, 'index'])->middleware('admin');
    //Route::get('/datasatker', [DatasatkerController::class, 'index']);/*Di method ini ada contoh gate nya*/
    Route::post('/satker/store', [DatasatkerController::class, 'store']);
    Route::post('/satker/edit', [DatasatkerController::class, 'edit']);
    Route::post('/satker/{id}/update', [DatasatkerController::class, 'update']);
    Route::post('/satker/{id}/delete', [DatasatkerController::class, 'delete']);

    //Data Berita Satker
    Route::get('/datasatker/{kode_satker}/getberita', [DatasatkerController::class, 'getberita'])->name('getberita');
    Route::post('/datasatker/storeberita', [DatasatkerController::class, 'storeberita']);
    Route::post('/datasatker/tampilkandetailberita', [DatasatkerController::class, 'tampilkandetailberita']);
    Route::post('/datasatker/pilih_konfigurasi_berita', [DatasatkerController::class, 'pilih_konfigurasi_berita']);
    Route::post('/datasatker/pilihkonfigurasi', [DatasatkerController::class, 'pilihkonfigurasi']);
    Route::post('/datasatker/pilihkonfigurasi_kanwil', [DatasatkerController::class, 'pilihkonfigurasi_kanwil']);
    Route::post('/datasatker/whatssapgenerate_message', [DatasatkerController::class, 'whatssapgenerate_message']);
    Route::post('/datasatker/whatssapgenerate_message_today', [DatasatkerController::class, 'whatssapgenerate_message_today']);
    Route::post('/datasatker/whatssapgenerate_message_today_kanwil', [DatasatkerController::class, 'whatssapgenerate_message_today_kanwil']);
    Route::post('/datasatker/whatssapgenerate_message_news', [DatasatkerController::class, 'whatssapgenerate_message_news']);
    Route::post('/datasatker/{id_berita}/{kode_satker}/deleteberita', [DatasatkerController::class, 'deleteberita']);
    Route::post('/datasatker/editberita', [DatasatkerController::class, 'editberita']);
    Route::post('/datasatker/editberita/hapuslink', [DatasatkerController::class, 'hapuslink']);
    Route::post('/datasatker/editberita/hapuslink_nasional', [DatasatkerController::class, 'hapuslink_nasional']);
    Route::post('/datasatker/{id_beria}/updateberita', [DatasatkerController::class, 'updateberita']);
    Route::post('/datasatker/{kode_satker}/getberitabytanggal', [DatasatkerController::class, 'getberitabytanggal']);
    Route::get('/profilesatker/{kode_satker}/gantipassword', [DatasatkerController::class, 'gantipassword']);
    Route::post('/profilesatker/storeberita', [DatasatkerController::class, 'storeberita']);
    Route::post('/profilesatker/{kode_satker}/updatepassword', [DatasatkerController::class, 'updatepassword']);

    Route::get('/beritasatker/laporanberita', [DatasatkerController::class, 'laporanberita']);
    Route::post('/beritasatker/cetaklaporanberita', [DatasatkerController::class, 'cetaklaporanberita']);
    Route::get('/beritasatker/rekapberita', [DatasatkerController::class, 'rekapberita']);
    Route::post('/beritasatker/cetaklaporanberita_rekap', [DatasatkerController::class, 'cetaklaporanberita_rekap']);


    /*Konfigurasi*/
    Route::get('/konfigberita/konfiglaporanberita', [DatasatkerController::class, 'konfiglaporanberita']);
    Route::get('/konfigberita/konfigrekapberita', [DatasatkerController::class, 'konfigrekapberita']);
    Route::get('/konfigberita/{kode_satker}/getkonfig', [DatasatkerController::class, 'getkonfig']);
    Route::post('/konfigberita/storekonfig', [DatasatkerController::class, 'storekonfig']);
    Route::post('/konfigberita/storekonfig_rekap', [DatasatkerController::class, 'storekonfig_rekap']);
    Route::post('/konfigberita/tampilkandetailkonfig', [DatasatkerController::class, 'tampilkandetailkonfig']);
    Route::post('/konfigberita/tampilkandetailkonfig_rekap', [DatasatkerController::class, 'tampilkandetailkonfig_rekap']);
    Route::post('/konfigberita/editkonfig', [DatasatkerController::class, 'editkonfig']);
    Route::post('/konfigberita/editkonfig_rekap', [DatasatkerController::class, 'editkonfig_rekap']);

    Route::post('/konfigberita/editkonfig/hapushash', [DatasatkerController::class, 'hapushash']);
    Route::post('/konfigberita/editkonfig/hapusmoto', [DatasatkerController::class, 'hapusmoto']);
    Route::post('/konfigberita/editkonfig/hapustembusan_y', [DatasatkerController::class, 'hapustembusan_y']);
    Route::post('/konfigberita/editkonfig/hapustembusan_y_rekap', [DatasatkerController::class, 'hapustembusan_y_rekap']);
    Route::post('/konfigberita/{id_konfig}/updatekonfig', [DatasatkerController::class, 'updatekonfig']);
    Route::post('/konfigberita/{id_konfig}/updatekonfig_rekap', [DatasatkerController::class, 'updatekonfig_rekap']);
    Route::post('/konfigberita/{id_konfig}/deletekonfig', [DatasatkerController::class, 'deletekonfig']);
    Route::post('/konfigberita/{id_konfig}/deletekonfig_rekap', [DatasatkerController::class, 'deletekonfig_rekap']);

});
/*Hanya untuk user yang telah terotentikasi*/
Route::middleware(['auth:user'])->group(function () {
    Route::get('/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);
    Route::get('panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);

    //Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::post('/karyawan/store', [KaryawanController::class, 'store']);
    Route::post('/karyawan/edit', [KaryawanController::class, 'edit']);
    Route::post('/karyawan/{nik}/update', [KaryawanController::class, 'update']);
    Route::post('/karyawan/{nik}/delete', [KaryawanController::class, 'delete']);

    //Departemen
    Route::get('/departemen', [DepartemenControlller::class, 'index']);
    Route::post('/departemen/store', [DepartemenControlller::class, 'store']);
    Route::post('/departemen/edit', [DepartemenControlller::class, 'edit']);
    Route::post('/departemen/{kode_dept}/update', [DepartemenControlller::class, 'update']);
    Route::post('/departemen/{kode_dept}/delete', [DepartemenControlller::class, 'delete']);

    //Presensi
    Route::get('/presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getpresensi', [PresensiController::class, 'getpresensi']);
    Route::post('/tampilkanpeta', [PresensiController::class, 'tampilkanpeta']);
    Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
    Route::post('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/rekap', [PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit', [PresensiController::class, 'izinsakit']);
    Route::post('/presensi/approveizinsakit', [PresensiController::class, 'approveizinsakit']);
    Route::get('/presensi/{id}/batalkanizinsakit', [PresensiController::class, 'batalkanizinsakit']);

    //Cabang
    Route::get('/cabang', [CabangController::class, 'index']);
    Route::post('/cabang/store', [CabangController::class, 'store']);
    Route::post('/cabang/edit', [CabangController::class, 'edit']);
    Route::post('/cabang/update', [CabangController::class, 'update']);
    Route::post('/cabang/{kode_cabang}/delete', [CabangController::class, 'delete']);

    //Konfigurasi
    Route::get('/konfigurasi/lokasikantor', [KonfigurasiController::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasikantor', [KonfigurasiController::class, 'updatelokasikantor']);
    Route::get('/konfigurasi/jamkerja', [KonfigurasiController::class, 'jamkerja']);
    Route::post('/konfigurasi/storejamkerja', [KonfigurasiController::class, 'storejamkerja']);
    Route::post('/konfigurasi/editjamkerja', [KonfigurasiController::class, 'editjamkerja']);
    Route::post('/konfigurasi/updatejamkerja', [KonfigurasiController::class, 'updatejamkerja']);
    Route::post('/konfigurasi/{kode_jam_kerja}/delete', [KonfigurasiController::class, 'deletejamkerja']);


});

