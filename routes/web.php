<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SistemLoginController;
use App\Http\Controllers\HalDashboardController;
use App\Http\Controllers\HalProfilController;
use App\Http\Controllers\HalPenggunaController;
use App\Http\Controllers\HalPaketController;
use App\Http\Controllers\HalOutletController;
use App\Http\Controllers\HalPelangganController;
use App\Http\Controllers\HalTransaksiController;
use App\Http\Controllers\HalPesananPelangganController;
use App\Http\Controllers\HalLaporanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\LaporanCreditController;
use App\Http\Controllers\HalPostController;
use App\Models\Post;


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
    $posts = Post::latest()->paginate(5);
    return view('halaman_depan.welcome', compact('posts'));
});
// Route::get('/', [HalPostController::class, 'halamanPosts'])->name('/');
Route::resource('kelola_posts', HalPostController::class);
// Route::get('kelola_posts', [HalPostController::class, 'halamanPostsindex'])->name('kelola_posts');
// Route::get('tambah_posts', [HalPostController::class, 'tambahPosts'])->name('tambah_posts');
// Route::post('simpan_posts', [HalPostController::class, 'simpanPosts'])->name('simpan_posts');
// Route::get('edit_posts/{id}', [HalPostController::class, 'editPosts'])->name('edit_posts/{id}');
// Route::post('update_posts/{id}', [HalPostController::class, 'updatePosts'])->name('update_posts/{id}');
// Route::get('hapus_posts/{id}', [HalPostController::class, 'hapusPosts'])->name('hapus_posts/{id}');
// Route::get('/', function () {
//     return view('halaman_welcome');
// });
// ========================================== SISTEM LOGIN =========================================
    Route::get('login', [SistemLoginController::class, 'halamanLogin'])->name('login');
    Route::post('registrasi_awal', [SistemLoginController::class, 'registrasiAwal'])->name('registrasi_awal');
    Route::post('login_verifikasi', [SistemLoginController::class, 'verifikasiLogin'])->name('login_verifikasi');
    Route::get('logout', [SistemLoginController::class, 'prosesLogout'])->name('logout');
// =================================================================================================

// =============================== AKSES ADMIN, KASIR, DAN PELANGGAN ===============================
Route::group(['middleware' => ['auth', 'checkRole:admin,kasir,non_member,member']], function(){
    // => Halaman Dashboard
    Route::get('dashboard', [HalDashboardController::class, 'halamanDashboard'])->name('dashboard');
    // => Hubungan Transaksi
    Route::get('pdf_transaksi/{id}', [HalTransaksiController::class, 'halamanDashboard'])->name('pdf_transaksi/{id}');
    Route::get('ubah_status_transaksi/{status}/{id}', [HalTransaksiController::class, 'ubahStatusTransaksi'])->name('ubah_status_transaksi/{status}/{id}');
    });
// =================================================================================================

// ===================================== AKSES ADMIN DAN KASIR =====================================
Route::group(['middleware' => ['auth', 'checkRole:admin,kasir']], function(){
    // => Halaman Profil
    Route::get('kelola_profil', [HalProfilController::class, 'halamanProfil'])->name('kelola_profil');
    Route::post('update_profil', [HalProfilController::class, 'updateProfil'])->name('update_profil');
    Route::post('ubah_password/{id}', [HalProfilController::class, 'ubahPassword'])->name('ubah_password/{id}');

    // => Halaman Pelanggan
    Route::get('registrasi_pelanggan', [HalPelangganController::class, 'registrasiPelanggan'])->name('registrasi_pelanggan');
    Route::get('kelola_transaksi', [HalPelangganController::class, 'halamanTransaksi'])->name('kelola_transaksi');        Route::get('kelola_pelanggan', [HalPelangganController::class, 'halamanPelanggan'])->name('kelola_pelanggan');
    Route::get('detail_pelanggan_member/{id}', [HalPelangganController::class, 'detailPelangganMember'])->name('detail_pelanggan_member/{id}');
    Route::get('detail_pelanggan_non_member/{id}', [HalPelangganController::class, 'detailPelangganNonMember'])->name('detail_pelanggan_non_member/{id}');
    Route::get('layanan_member/{id}', [HalPelangganController::class, 'halamanLayananMember'])->name('layanan_member/{id}');
    Route::get('sort_outlet_tabel_kiloan/{id}', [HalPelangganController::class, 'sortOutletTabelKiloan'])->name('sort_outlet_tabel_kiloan/{id}');
    Route::get('sort_outlet_tabel_satuan/{id}', [HalPelangganController::class, 'sortOutletTabelSatuan'])->name('sort_outlet_tabel_satuan/{id}');
    Route::post('simpan_pelanggan', [HalPelangganController::class, 'simpanPelanggan'])->name('simpan_pelanggan');
    Route::post('simpan_pesanan', [HalPelangganController::class, 'simpanPesanan'])->name('simpan_pesanan');
    Route::get('lihat_paket_kilo_member/{id}', [HalPelangganController::class, 'lihatPaketKiloMember'])->name('lihat_paket_kilo_member/{id}');
    Route::get('lihat_paket_satu_member/{id}', [HalPelangganController::class, 'lihatPaketSatuMember'])->name('lihat_paket_satu_member/{id}');
    Route::get('update_status_transaksi/{id}/{status}', [HalPelangganController::class, 'updateStatusTransaksi'])->name('update_status_transaksi/{id}/{status}');
    Route::get('hapus_pesanan_kilo/{id}', [HalPelangganController::class, 'hapusPesananKilo'])->name('hapus_pesanan_kilo/{id}');
    Route::get('hapus_pesanan_satu/{id}', [HalPelangganController::class, 'hapusPesananSatu'])->name('hapus_pesanan_satu/{id}');
    Route::get('hapus_pelanggan/{id}', [HalPelangganController::class, 'hapusPelanggan'])->name('hapus_pelanggan/{id}');
    Route::get('pdf_pelanggan/{id}', [HalPelangganController::class, 'pdfPelanggan'])->name('pdf_pelanggan/{id}');
        
    // => Halaman Transaksi
    Route::get('lihat_transaksi_selesai/{id}', [HalTransaksiController::class, 'lihatTransaksiSelesai'])->name('lihat_transaksi_selesai/{id}');
    Route::get('lihat_transaksi_diantar/{id}', [HalTransaksiController::class, 'lihatTransaksiDiantar'])->name('lihat_transaksi_diantar/{id}');        Route::get('lihat_transaksi_diambil/{id}', [HalTransaksiController::class, 'lihatTransaksiDiambil'])->name('lihat_transaksi_diambil/{id}');
    Route::post('bayar_pesanan', [HalTransaksiController::class, 'bayarPesanan'])->name('bayar_pesanan');

    // => Halaman Laporan
    Route::get('laporan_transaksi', [HalLaporanController::class, 'halamanLaporanTransaksi'])->name('laporan_transaksi');
    Route::get('laporan_pegawai', [HalLaporanController::class, 'halamanLaporanPegawai'])->name('laporan_pegawai');
    Route::get('laporan_pegawai_riwayat/{id}', [HalLaporanController::class, 'halamanLaporanPegawaiRiwayat'])->name('laporan_pegawai_riwayat/{id}');
    Route::post('filter_laporan_transaksi', [HalLaporanController::class, 'filterLaporanTransaksi'])->name('filter_laporan_transaksi');
    Route::post('filter_laporan_pegawai/{id}', [HalLaporanController::class, 'filterLaporanPegawain'])->name('filter_laporan_pegawai/{id}');
    Route::post('pdf_laporan_transaksi', [HalLaporanController::class, 'pdfLaporanTransaksi'])->name('pdf_laporan_transaksi');
    Route::post('pdf_laporan_pegawai/{id}', [HalLaporanController::class, 'pdfLaporanPegawai'])->name('pdf_laporan_pegawai/{id}');
    Route::get('laporan_credit', [LaporanCreditController::class, 'index'])->name('laporan_credit');
    Route::get('laporan_credit/check', [LaporanCreditController::class, 'check'])->name('laporan_credit.check');
    
    // => Halaman Pengeluaran
    Route::resource('kategori', PengeluaranController::class);
    Route::resource('uang_keluar', CreditController::class);
    
    //laporan credit
    // Route::get('/laporan_credit', 'account\LaporanCreditController@index')->name('account.laporan_credit.index');
    // Route::get('/laporan_credit/check', 'account\LaporanCreditController@check')->name('account.laporan_credit.check');
});
    
    // =================================================================================================

// ========================================== AKSES ADMIN ==========================================
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    // => Halaman Pengguna
    // Route::resource('kelola_pengguna', HalPenggunaaController::class);
    Route::get('kelola_pengguna', [HalPenggunaController::class, 'halamanPengguna'])->name('kelola_pengguna');
    Route::get('tambah_pengguna', [HalPenggunaController::class, 'tambahPengguna'])->name('tambah_pengguna');
    Route::post('simpan_pengguna', [HalPenggunaController::class, 'simpanPengguna'])->name('simpan_pengguna');
    Route::get('edit_pengguna/{id}', [HalPenggunaController::class, 'editPengguna'])->name('edit_pengguna/{id}');
    Route::post('update_pengguna/{id}', [HalPenggunaController::class, 'updatePengguna'])->name('update_pengguna/{id}');
    Route::get('hapus_pengguna/{id}', [HalPenggunaController::class, 'hapusPengguna'])->name('hapus_pengguna/{id}');

    // => Halaman Outlet
    Route::get('kelola_outlet', [HalOutletController::class, 'halamanOutlet'])->name('kelola_outlet');
    Route::get('/kelola_outlet/tambah_outlet', [HalOutletController::class, 'tambahOutlet'])->name('tambah_outlet');
    Route::post('simpan_outlet', [HalOutletController::class, 'simpanOutlet'])->name('simpan_outlet');
    Route::get('edit_outlet/{id}', [HalOutletController::class, 'editOutlet'])->name('edit_outlet/{id}');
    Route::post('update_outlet/{id}', [HalOutletController::class, 'updateOutlet'])->name('update_outlet/{id}');
    Route::get('hapus_outlet/{id}', [HalOutletController::class, 'hapusOutlet'])->name('hapus_outlet/{id}');
        
    // => Halaman Paket Kilo
    Route::get('kelola_paket', [HalPaketController::class, 'halamanPaket'])->name('kelola_paket');
    Route::get('/kelola_paket/tambah_paket_kiloan', [HalPaketController::class, 'tambahPaketKiloan'])->name('/kelola_paket/tambah_paket_kiloan');
    Route::post('simpan_paket_kiloan', [HalPaketController::class, 'simpanPaketKiloan'])->name('simpan_paket_kiloan');
    Route::get('edit_paket_kiloan/{id}', [HalPaketController::class, 'editPaketKiloan'])->name('edit_paket_kiloan/{id}');
    Route::post('update_paket_kiloan/{id}', [HalPaketController::class, 'updatePaketKiloan'])->name('update_paket_kiloan/{id}');
    Route::get('hapus_paket_kiloan/{id}', [HalPaketController::class, 'hapusPaketKiloan'])->name('hapus_paket_kiloan/{id}');
        
    // => Halaman Paket Satuan
    Route::get('/kelola_paket/tambah_paket_satuan', [HalPaketController::class, 'tambahPaketSatuan'])->name('/kelola_paket/tambah_paket_satuan');
    Route::post('simpan_paket_satuan', [HalPaketController::class, 'simpanPaketSatuan'])->name('simpan_paket_satuan');
    Route::get('lihat_paket_satuan/{id}', [HalPaketController::class, 'lihatPaketSatuan'])->name('lihat_paket_satuan/{id}');
    Route::get('edit_paket_satuan/{id}', [HalPaketController::class, 'editPaketSatuan'])->name('edit_paket_satuan/{id}');
    Route::post('update_paket_satuan/{id}', [HalPaketController::class, 'updatePaketSatuan'])->name('update_paket_satuan/{id}');
    Route::get('hapus_paket_satuan/{id}', [HalPaketController::class, 'hapusPaketSatuan'])->name('hapus_paket_satuan/{id}');

});
// ======================================== AKSES PELANGGAN ========================================
Route::group(['middleware' => ['auth', 'checkRole:member,non_member']], function(){
    // => Dashboard Pelanggan
    Route::get('data_outlet_dashboard/{id}', [HalDashboardController::class, 'dashboardPelanggan'])->name('data_outlet_dashboard/{id}');
    Route::get('outlet_tabel_kiloan/{id}', [HalDashboardController::class, 'outletTabelKiloan'])->name('outlet_tabel_kiloan/{id}');
    Route::get('outlet_tabel_satuan/{id}', [HalDashboardController::class, 'outletTabelSatuan'])->name('outlet_tabel_satuan/{id}');
    Route::post('update_profil_pelanggan', [HalDashboardController::class, 'updateProfilPelanggan'])->name('update_profil_pelanggan');
    Route::get('pesanan_saya', [HalPesananPelangganController::class, 'halamanPesananPelanggan'])->name('pesanan_saya');
    Route::get('lihat_pesanan_pelanggan/{id}', [HalPesananPelangganController::class, 'lihatPesananPelanggan'])->name('lihat_pesanan_pelanggan/{id}');
});
// =================================================================================================    
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
