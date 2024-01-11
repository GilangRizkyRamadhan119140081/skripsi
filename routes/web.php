<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontributorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\KontributorListController;
use App\Http\Controllers\Admin\SitusBersejarahController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\ModeratorListController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProgresController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\MailController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\Admin\FormulirController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UploadSitusController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SitusController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\SearchController;


// Rute untuk login dan registrasi admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::put('/admin/updateRole/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
Route::get('/admin/logindash', function () {
    return view('admin.logindash');
})->name('admin.logindash');

// Rute untuk dashboard admin (memerlukan autentikasi)
Route::middleware(['auth:admin', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
});


//routeuntuk kontributor
Route::controller(KontributorController::class)->prefix('kontributor')->group(function () {
    Route::get('', 'index')->name('kontributor');
    Route::get('insert', 'add')->name('kontributor.insert');
    Route::post('insert', 'insert')->name('kontributor.add.insert');
    Route::get('edit/{id}', 'edit')->name('kontributor.edit');
    Route::put('update/{id}', 'update')->name('kontributor.update');
    Route::delete('delete/{id}', 'delete')->name('kontributor.delete');
});
// Route untuk admin
Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.index');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::resource('situsadmin', SitusBersejarahController::class);
    Route::get('situsadmin/create', [SitusBersejarahController::class, 'create'])->name('admin.situsadmin.create');
    Route::get('situsadmin/edit/{situs}', [SitusBersejarahController::class, 'edit'])->name('admin.situsadmin.edit');
    Route::get('situsadmin/download/{format}', [SitusBersejarahController::class, 'download'])->name('situs.download');
    Route::get('admin/situsadmin/dokumen', [SitusBersejarahController::class, 'dokumenPdf'])->name('situs.dokumen');


    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('informasiadmin', InformasiController::class);
    Route::get('informasiadmin/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
    Route::get('informasiadmin/edit/{informasi}', [InformasiController::class, 'edit'])->name('admin.informasi.edit');


    // Rute untuk progres
    Route::get('progres', [AdminProgresController::class, 'index'])->name('admin.progres.index');
    Route::get('progres/create', [AdminProgresController::class, 'create'])->name('admin.progres.create');
    Route::post('progres/store', [AdminProgresController::class, 'store'])->name('admin.progres.store');
    Route::get('progres/edit/{id}', [AdminProgresController::class, 'edit'])->name('admin.progres.edit');
    Route::put('progres/update/{id}', [AdminProgresController::class, 'updateStatus'])->name('admin.progres.update');
    Route::delete('progres/destroy/{id}', [AdminProgresController::class, 'destroy'])->name('admin.progres.destroy');
    Route::get('progres/reject/{id}', [AdminProgresController::class, 'reject'])->name('admin.progres.reject');
    Route::get('progres/upload-feedback/{id}', [AdminProgresController::class, 'uploadFeedback'])->name('admin.progres.upload-feedback');
    Route::get('progres/preview/{id}', [AdminProgresController::class, 'preview'])->name('admin.progres.preview');
    Route::get('progres/download', [AdminProgresController::class, 'laporanPdf'])->name('admin.progres.download');
    // Rute untuk pengguna di dalam grup 'admin.'
    Route::get('user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('admin.user.update');
    Route::put('user/{id}/update-role', [UserController::class, 'updateRole'])->name('admin.user.updateRole');
    Route::delete('user/{id}/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');
});


// Rute untuk KontributorListController
Route::controller(KontributorListController::class)->prefix('admin/kontributor')->group(function () {
    Route::get('', 'index')->name('admin.kontributor');
    Route::get('insert', 'add')->name('admin.kontributor.insert');
    Route::post('insert', 'insert')->name('admin.kontributor.add.insert');
    Route::get('edit/{id}', 'edit')->name('admin.kontributor.edit');
    Route::put('update/{id}', 'update')->name('admin.kontributor.update');
    Route::delete('delete/{id}', 'delete')->name('admin.kontributor.delete');
});
// Rute untuk situs bersejarah
Route::prefix('situs')->group(function () {
    Route::get('', [SitusBersejarahController::class, 'index'])->name('situs.index');
    Route::get('create', [SitusBersejarahController::class, 'create'])->name('situs.create');
    Route::post('store', [SitusBersejarahController::class, 'store'])->name('situs.store');
    Route::get('edit/{id}', [SitusBersejarahController::class, 'edit'])->name('situs.edit');
    Route::put('update/{id}', [SitusBersejarahController::class, 'update'])->name('situs.update');
    Route::delete('destroy/{id}', [SitusBersejarahController::class, 'destroy'])->name('situs.destroy');
});


Route::prefix('informasi')->group(function () {
    Route::get('', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('store', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::put('update/{id}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('destroy/{id}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
});


Route::prefix('uploadsitus')->group(function () {
    Route::get('', [UploadSitusController::class, 'index'])->name('uploadsitus.index');
    Route::get('/uploadsitus', [UploadSitusController::class, 'index'])->name('uploadsitus.index');
    Route::get('create', [UploadSitusController::class, 'create'])->name('uploadsitus.create');
    Route::post('store', [UploadSitusController::class, 'store'])->name('uploadsitus.store');
    Route::get('edit/{id}', [UploadSitusController::class, 'edit'])->name('uploadsitus.edit');
    Route::put('update/{id}', [UploadSitusController::class, 'update'])->name('uploadsitus.update');
    Route::delete('destroy/{id}', [UploadSitusController::class, 'destroy'])->name('uploadsitus.destroy');
});


// Rute untuk ModeratorListController
Route::controller(ModeratorListController::class)->prefix('admin/moderator')->group(function () {
    Route::get('', 'index')->name('admin.moderator');
    Route::get('insert', 'add')->name('admin.moderator.insert');
    Route::post('insert', 'insert')->name('admin.moderator.add.insert');
    Route::get('edit/{id}', 'edit')->name('admin.moderator.edit');
    Route::put('update/{id}', 'update')->name('admin.moderator.update');
    Route::delete('delete/{id}', 'delete')->name('admin.moderator.delete');
});

Route::get('send-mail', [MailController::class, 'index']);


Route::prefix('user')->group(function () {
    Route::get('/user/home', [UserAuthController::class, 'showHomePage'])->name('user.home');
    Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');
    Route::get('password/reset', [UserAuthController::class, 'showPasswordResetForm'])->name('password.request');
    Route::post('password/email', [UserAuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [UserAuthController::class, 'showPasswordResetForm'])->name('password.reset');
    Route::post('password/reset', [UserAuthController::class, 'resetPassword'])->name('password.update');
});
Route::prefix('pages')->group(function () {
    Route::view('home', 'pages.home')->name('pages.home');
    // Route::view('ensiklopedia', 'pages.ensiklopedia')->name('pages.ensiklopedia');
    Route::get('ensiklopedia', [SearchController::class, 'index'])->name('pages.ensiklopedia');

    Route::view('formulir', 'pages.formulir')->name('formulir');
    Route::get('informasi', [App\Http\Controllers\Admin\InformasiController::class, 'informasiPage'])->name('pages.informasi'); // Tambahkan rute ini
    Route::view('profil', 'pages.profil')->name('profil');
    Route::get('kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('detail-situs/{id}', [SitusController::class, 'show'])->name('detail.situs');
    Route::get('formulir/create', [FormulirController::class, 'create'])->name('formulir.create');
    Route::post('formulir', [FormulirController::class, 'store'])->name('formulir.store');
    Route::get('progres', [ProgresController::class, 'index'])->name('pages.progres');
    Route::post('komentar/{id}', [KomentarController::class, 'store']);
    Route::get('repository', [RepositoryController::class, 'show'])->name('pages.repository');
    Route::get('repository/{id}', [RepositoryController::class, 'showdetail'])->name('detail.situs');
    // Route::get('search', [SearchController::class, 'index'])->name('search.index');
    Route::get('search', [SearchController::class, 'result'])->name('pages.result');
});



Route::prefix('guest')->group(function () {
    Route::view('home', 'guest.home')->name('guest.home');
    Route::view('ensiklopedia', 'guest.ensiklopedia')->name('guest.ensiklopedia');
    Route::view('profil', 'guest.profil')->name('guest.profil');
    Route::get('kategori/{kategori}', [KategoriController::class, 'showGuest'])->name('guest.kategori.show');
    Route::get('detail-situs/{id}', [SitusController::class, 'showGuest'])->name('guest.detail.situs');
});

// Rute untuk otentikasi
// Rute admin tanpa middleware auth
Route::prefix('pages')->group(function () {
    Route::get('data', [DataController::class, 'index'])->name('pages.data');
    Route::get('data/download', [DataController::class, 'download'])->name('data.download');
});


// routes/komenmtar
Route::get('situs/{situs}', [SitusBersejarahController::class, 'showDetailSitus'])->name('situs.showDetail');
Route::get('/komentars/{pageId}', [KomentarController::class, 'show'])->name('komentars.show');
Route::post('/komentars/{pageId}', [KomentarController::class, 'store'])->name('komentars.store');
Route::get('/situs/{id}', [SitusController::class, 'show'])->name('situs.show');


// Rute untuk login dan registrasi user
Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

// Rute untuk login dan registrasi user
Route::get('/user/lupapassword', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showlupapasswordForm'])->name('user.lupapassword');
Route::post('/user/lupapassword', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'lupapassword']);
Route::get('/user/lupapassword', [ForgotPasswordController::class, 'showlupapasswordForm'])->name('user.lupapassword');
Route::get('/user/lupapassword', [ForgotPasswordController::class, 'showlupapasswordForm'])->name('user.lupapassword');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/user/resetpassword', [ResetPasswordController::class, 'showResetPasswordForm'])->name('user.resetpassword');
Route::post('user/resetpassword', 'App\Http\Controllers\Auth\ResetPasswordController@resetPassword')->name('user.updatepassword');



//route pages
Route::get('/', function () {
    return view('LandingPage');
})->name('landing.page');
