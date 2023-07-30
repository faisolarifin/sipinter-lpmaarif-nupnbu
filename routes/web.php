<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ApiController,
    AuthController,
    BHPNUController,
    ForgotPasswordController,
    GeneralController,
    OSSController,
    SatpenController,
    FileViewerController,};
use App\Http\Controllers\Admin\{
    SATPENController as SATPENControllerAdmin,
    BHPNUController as BHPNUControllerAdmin,
    OSSController as OSSControllerAdmin,};
use App\Http\Controllers\Master\{
    InformasiController,
    JenjangPendidikanController,
    KabupatenController,
    PengurusCabangController,
    PropinsiController,};

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
    Route::get('/upload/{fileName?}', [FileViewerController::class, 'pdfUploadViewer'])->name('viewerpdf');

    Route::middleware('onlyoperator')->group(function() {

        Route::get('/dashboard', [SatpenController::class, 'dashboardPage'])->name('dashboard');
        /**
         * Satpen
         */
        Route::group(["prefix" => "satpen"], function() {
            Route::get('/', [SatpenController::class, 'mySatpenPage'])->name('mysatpen');
            Route::get('/edit', [SatpenController::class, 'editSatpenPage'])->name('mysatpen.revisi');
            Route::get('/perpanjang', [SatpenController::class, 'perpanjangSatpenPage'])->name('mysatpen.perpanjang');
            Route::put('/edit', [SatpenController::class, 'revisionProses'])->name('mysatpen.revisi');
            Route::put('/perpanjang', [SatpenController::class, 'revisionProses'])->name('mysatpen.perpanjang');
            Route::get('/download/{document}', [SatpenController::class, 'downloadDocument'])->name('download');
        });
        /**
         * OSS
         */
        Route::get('/oss/forbidden', [OSSController::class, 'forbiddenPage'])->name('oss.403');
        Route::group(["prefix" => "oss", "middleware" => "verifysatpenactive"], function() {
            Route::get('/', [OSSController::class, 'permohonanOSSPage'])->name('oss');
            Route::get('/new', [OSSController::class, 'permohonanBaruOSS'])->name('oss.new');
            Route::put('/{oss}', [OSSController::class, 'storePermohonanOSS'])->name('oss.save');
            Route::get('/history', [OSSController::class, 'historyPermohonan'])->name('oss.history');
            Route::get('/file/{fileName?}', [FileViewerController::class, 'viewBuktiPembayaran'])->name('oss.file');
        });
        /**
         * BHPNU
         */
        Route::get('/bhpnu/forbidden', [BHPNUController::class, 'forbiddenPage'])->name('bhpnu.403');
        Route::group(["prefix" => "bhpnu", "middleware" => "verifysatpenactive"], function() {
            Route::get('/', [BHPNUController::class, 'permohonanBHPNUPage'])->name('bhpnu');
            Route::get('/new', [BHPNUController::class, 'permohonanBaruBHPNU'])->name('bhpnu.new');
            Route::put('/{bhpnu}', [BHPNUController::class, 'storePermohonanBHPNU'])->name('bhpnu.save');
            Route::get('/history', [BHPNUController::class, 'historyPermohonan'])->name('bhpnu.history');
            Route::get('/file/{fileName?}', [FileViewerController::class, 'viewBuktiPembayaran'])->name('bhpnu.file');
        });
    });

    Route::middleware('onlyadmin')->prefix('admin')->group(function() {
        /**
         * Dashboard
         */
        Route::get('/', [SATPENControllerAdmin::class, 'dashboardPage'])->name('a.dash');
        Route::get('/dashboard', [SATPENControllerAdmin::class, 'dashboardPage'])->name('a.dash');

        /**
         * Master
         */
        Route::resource('/informasi', InformasiController::class);
        Route::resource('/propinsi', PropinsiController::class);
        Route::resource('/kabupaten', KabupatenController::class);
        Route::resource('/cabang', PengurusCabangController::class);
        Route::resource('/jenjang', JenjangPendidikanController::class);

        /**
         * Satpen
         */
        Route::group(["prefix" => "satpen"], function() {
            Route::get('/', [SATPENControllerAdmin::class, 'permohonanRegisterSatpen'])->name('a.satpen');
            Route::put('/{satpen}/status', [SATPENControllerAdmin::class, 'updateSatpenStatus'])->name('a.satpen.changestatus');
            Route::get('/rekap', [SATPENControllerAdmin::class, 'getAllSatpenOrFilter'])->name('a.rekapsatpen');
            Route::get('/{satpenId}/detail', [SATPENControllerAdmin::class, 'getSatpenById'])->name('a.rekapsatpen.detail');
            Route::delete('/{satpen}', [SATPENControllerAdmin::class, 'destroySatpen'])->name('a.rekapsatpen.destroy');
            Route::post('/doc/generate', [SATPENControllerAdmin::class, 'generatePiagamAndSK'])->name('generate.document');
            Route::post('/doc/regenerate', [SATPENControllerAdmin::class, 'reGeneratePiagamAndSK'])->name('regenerate.document');
            Route::get('/reader/{type?}/{fileName?}', [FileViewerController::class, 'pdfGeneratedViewer'])->name('pdf.generated');
        });
        /**
         * OSS
         */
        Route::group(["prefix" => "oss"], function() {
            Route::get('/', [OSSControllerAdmin::class, 'listPermohonanOSS'])->name('a.oss');
            Route::get('/acc/{oss}', [OSSControllerAdmin::class, 'setAcceptOSS'])->name('a.oss.acc');
            Route::put('/appear/{oss}', [OSSControllerAdmin::class, 'setIzinTerbitOSS'])->name('a.oss.appear');
            Route::put('/reject/{oss}', [OSSControllerAdmin::class, 'setRejectOSS'])->name('a.oss.reject');
            Route::delete('/destroy/{oss}', [OSSControllerAdmin::class, 'destroyOSS'])->name('a.oss.destroy');
            Route::get('/file/{fileName?}', [FileViewerController::class, 'viewBuktiPembayaran'])->name('a.oss.file');
        });

        /**
         * BHPNU
         */
        Route::group(["prefix" => "bhpnu"], function() {
            Route::get('/', [BHPNUControllerAdmin::class, 'listPermohonanBHPNU'])->name('a.bhpnu');
            Route::get('/acc/{bhpnu}', [BHPNUControllerAdmin::class, 'setAcceptBHPNU'])->name('a.bhpnu.acc');
            Route::put('/appear/{bhpnu}', [BHPNUControllerAdmin::class, 'setIzinTerbitBHPNU'])->name('a.bhpnu.appear');
            Route::put('/reject/{bhpnu}', [BHPNUControllerAdmin::class, 'setRejectBHPNU'])->name('a.bhpnu.reject');
            Route::delete('/destroy/{bhpnu}', [BHPNUControllerAdmin::class, 'destroyBHPNU'])->name('a.bhpnu.destroy');
            Route::get('/file/{fileName?}', [FileViewerController::class, 'viewBuktiPembayaran'])->name('a.bhpnu.file');
        });

    });
    /**
     * API Json
     */
    Route::prefix('api')->middleware('onlyadmin')->group(function () {
        Route::get('/provcount', [ApiController::class, 'getProvAndCount'])->name('api.provcount');
        Route::get('/satpen/{satpenId}', [ApiController::class, 'getSatpenById'])->name('api.satpenbyid');
        Route::get('/kabupaten/{provId}', [ApiController::class, 'getKabupatenByProv'])->name('api.kabupatenbyprov');
        Route::get('/kabcount/{provId?}', [ApiController::class, 'getKabAndCount'])->name('api.kabcount');
        Route::get('/jenjangcount', [ApiController::class, 'getJenjangAndCount'])->name('api.jenjangcount');
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
