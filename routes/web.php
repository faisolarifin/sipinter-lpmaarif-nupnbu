<?php

use App\Http\Controllers\{AdminController,
    ApiController,
    AuthController,
    ExportController,
    GeneralController,
    OperatorController,
    SatpenController,
    ForgotPasswordController,
    OSSController,
};
use App\Http\Controllers\Master\{
    InformasiController,
    JenjangPendidikanController,
    PengurusCabangController,
    PropinsiController,
    KabupatenController,
};
use App\Http\Controllers\Admin\{
    OSSController as OSSControllerAdmin,
};
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

Route::get('/', [GeneralController::class, 'homePage'])->name('home');
Route::get('/verify/{qrcode?}', [GeneralController::class, 'verifyDokumenPage'])->name('verify');
Route::get('/informasi/{slug?}', [GeneralController::class, 'readInformasiPage'])->name('informasi');
Route::get('/informasi/download/{filename?}', [GeneralController::class, 'downloadFileInformasi'])->name('informasi.download');
Route::get('/kontak', [GeneralController::class, 'contactPage'])->name('kontak');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [SatpenController::class, 'registerProses'])->name('register.proses');
Route::get('/ceknpsn', [AuthController::class, 'cekNpsnPage'])->name('ceknpsn');
Route::post('/ceknpsn', [AuthController::class, 'checkNpsn'])->name('ceknpsn.proses');
Route::get('/register/success', [AuthController::class, 'registerSuccess'])->name('register.success');
Route::get('/json/provcount', [ApiController::class, 'getProvAndCount'])->name('provcount');

Route::middleware('mustlogin')->group(function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/gantipassword', [AuthController::class, 'changePassword'])->name('changepass');
    Route::get('/upload/{fileName?}', [AdminController::class, 'pdfUploadViewer'])->name('viewerpdf');

    Route::middleware('onlyoperator')->group(function() {
        /**
         * Satpen
         */
        Route::get('/dashboard', [OperatorController::class, 'dashboardPage'])->name('dashboard');
        Route::get('/satpen', [OperatorController::class, 'mySatpenPage'])->name('mysatpen');
        Route::get('/satpen/edit', [OperatorController::class, 'editSatpenPage'])->name('mysatpen.revisi');
        Route::get('/satpen/perpanjang', [OperatorController::class, 'perpanjangSatpenPage'])->name('mysatpen.perpanjang');
        Route::put('/satpen/edit', [SatpenController::class, 'revisionProses'])->name('mysatpen.revisi');
        Route::put('/satpen/perpanjang', [SatpenController::class, 'revisionProses'])->name('mysatpen.perpanjang');
        Route::get('/download/{document}', [SatpenController::class, 'downloadDocument'])->name('download');
        /**
         * OSS
         */
        Route::group(["prefix" => "oss"], function() {
            Route::get('/', [OSSController::class, 'permohonanOSSPage'])->name('oss');
            Route::put('/', [OSSController::class, 'storePermohonanOSS'])->name('oss.save');
            Route::get('/new', [OSSController::class, 'permohonanBaruOSS'])->name('oss.new');
            Route::get('/file/{fileName?}', [OSSController::class, 'viewBuktiPembayaran'])->name('oss.file');
            Route::get('/history', [OSSController::class, 'historyPermohonan'])->name('oss.history');
        });
        /**
         * BHPNU
         */
        Route::get('/bhpnu', [OperatorController::class, 'underConstruction'])->name('bhpnu');
    });

    Route::middleware('onlyadmin')->prefix('admin')->group(function() {

        Route::resource('/informasi', InformasiController::class);
        Route::resource('/propinsi', PropinsiController::class);
        Route::resource('/kabupaten', KabupatenController::class);
        Route::resource('/cabang', PengurusCabangController::class);
        Route::resource('/jenjang', JenjangPendidikanController::class);

        Route::get('/', [AdminController::class, 'dashboardPage'])->name('a.dash');
        Route::get('/dashboard', [AdminController::class, 'dashboardPage'])->name('a.dash');
        Route::get('/satpen', [AdminController::class, 'permohonanRegisterSatpen'])->name('a.satpen');
        Route::put('/satpen/{satpen}/status', [AdminController::class, 'updateSatpenStatus'])->name('a.satpen.changestatus');
        Route::get('/rekapsatpen', [AdminController::class, 'getAllSatpenOrFilter'])->name('a.rekapsatpen');
        Route::get('/rekapsatpen/{satpenId}/detail', [AdminController::class, 'getSatpenById'])->name('a.rekapsatpen.detail');
        Route::delete('/rekapsatpen/{satpen}', [AdminController::class, 'destroySatpen'])->name('a.rekapsatpen.destroy');
        Route::get('/oss', [AdminController::class, 'underConstruction'])->name('a.oss');
        Route::get('/bhpnu', [AdminController::class, 'underConstruction'])->name('a.bhpnu');
        Route::post('/doc/generate', [AdminController::class, 'generatePiagamAndSK'])->name('generate.document');
        Route::post('/doc/regenerate', [AdminController::class, 'reGeneratePiagamAndSK'])->name('regenerate.document');

        /**
         * OSS
         */
        Route::group(["prefix" => "oss"], function() {
            Route::get('/', [OSSControllerAdmin::class, 'listPermohonanOSS'])->name('a.oss');
            Route::get('/acc/{oss}', [OSSControllerAdmin::class, 'setAcceptOSS'])->name('a.oss.acc');
            Route::put('/appear/{oss}', [OSSControllerAdmin::class, 'setIzinTerbitOSS'])->name('a.oss.appear');
            Route::put('/reject/{oss}', [OSSControllerAdmin::class, 'setRejectOSS'])->name('a.oss.reject');
            Route::get('/file/{fileName?}', [OSSControllerAdmin::class, 'viewBuktiPembayaran'])->name('a.oss.file');
            Route::delete('/destroy/{oss}', [OSSControllerAdmin::class, 'destroyOSS'])->name('a.oss.destroy');
        });

    });
    Route::prefix('api')->middleware('onlyadmin')->group(function () {
        Route::get('/provcount', [ApiController::class, 'getProvAndCount'])->name('api.provcount');
        Route::get('/satpen/{satpenId}', [ApiController::class, 'getSatpenById'])->name('api.satpenbyid');
        Route::get('/kabupaten/{provId}', [ApiController::class, 'getKabupatenByProv'])->name('api.kabupatenbyprov');
        Route::get('/kabcount/{provId?}', [ApiController::class, 'getKabAndCount'])->name('api.kabcount');
        Route::get('/jenjangcount', [ApiController::class, 'getJenjangAndCount'])->name('api.jenjangcount');
    });
    Route::middleware('onlyadmin')->group(function() {
        Route::get('/generate/{type?}/{fileName?}', [AdminController::class, 'pdfGeneratedViewer'])->name('pdf.generated');
    });
});

/**
 * Forgot Password
 */
Route::prefix("auth")->group(function() {
    Route::get('forgot', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgot');
    Route::post('forgot', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.send');
    Route::get('reset/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset');
    Route::post('reset', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.send');
});
