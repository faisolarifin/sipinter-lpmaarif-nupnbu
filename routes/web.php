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
    FileViewerController,
    Settings};
use App\Http\Controllers\Admin\{
    SATPENController as SATPENControllerAdmin,
    BHPNUController as BHPNUControllerAdmin,
    OSSController as OSSControllerAdmin,
    VirtualNPSNController,
    UsersController,
    ExportExcelController,};
use App\Http\Controllers\Master\{
    InformasiController,
    JenjangPendidikanController,
    KabupatenController,
    PengurusCabangController,
    PropinsiController,DapoController};

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
Route::get('/register/success', [AuthController::class, 'registerSuccess'])->name('register.success');
Route::get('/ceknpsn', [AuthController::class, 'cekNpsnPage'])->name('ceknpsn');
Route::post('/ceknpsn', [AuthController::class, 'checkNpsn'])->name('ceknpsn.proses');
Route::get('/npsnvirtual', [AuthController::class, 'npsnVirtualPage'])->name('npsnvirtual');
Route::post('/npsnvirtual', [AuthController::class, 'requestVirtualNPSN'])->name('npsnvirtual.request');
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
            Route::put('/change/npsn/{satpen}', [SatpenController::class, 'changeNPSN'])->name('mysatpen.npsn');
            Route::put('/perpanjang', [SatpenController::class, 'revisionProses'])->name('mysatpen.perpanjang');
            Route::get('/download/{document}', [SatpenController::class, 'downloadDocument'])->name('download');
        });
        /**
         * OSS
         */
        Route::get('/oss/forbidden', [OSSController::class, 'forbiddenPage'])->name('oss.403');
        Route::group(["prefix" => "oss", "middleware" => "verifysatpenactive"], function() {
            Route::get('/', [OSSController::class, 'landOSSRequest'])->name('oss');
            Route::get('/new', [OSSController::class, 'newOSSRequest'])->name('oss.new');
            Route::get('/detail/{ossId}', [OSSController::class, 'detailOSSQuesioner'])->name('oss.detail');
            Route::put('/{oss}', [OSSController::class, 'storedOSSRequest'])->name('oss.save');
            Route::get('/history', [OSSController::class, 'historyOSSRequest'])->name('oss.history');
            Route::get('/file/{path?}/{fileName?}', [FileViewerController::class, 'viewOSSDoc'])->name('oss.file');
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
        Route::group(["prefix" => "bantuan"], function() {
            Route::get('/', [SatpenController::class, 'underConstruction'])->name('bantuan');
        });

        Route::group(["prefix" => "beasiswa"], function() {
            Route::get('/', [SatpenController::class, 'underConstruction'])->name('beasiswa');
        });

        Route::group(["prefix" => "katalog"], function() {
            Route::get('/', [SatpenController::class, 'underConstruction'])->name('katalog');
        });
        /**
         * API
         */
        Route::group(["prefix" => "api"], function () {
            Route::get('/checknpsn/{npsn}', [ApiController::class, 'checkNPSNtoReferensiData'])->name('api.checknpsn');
        });
    });

    Route::middleware('onlyadmin')->prefix('admin')->group(function() {
        /**
         * Dashboard
         */
        Route::get('/', [SATPENControllerAdmin::class, 'dashboardPage'])->name('a.dash');
        Route::get('/dashboard', [SATPENControllerAdmin::class, 'dashboardPage'])->name('a.dash');
        Route::get('/setting', [Settings::class, 'pageSetting'])->name('a.setting');
        Route::put('/setting', [Settings::class, 'saveSetting'])->name('a.setting.save');

        Route::middleware('primaryadmin')->group(function() {
            /**
             * Master
             */
            Route::resource('/informasi', InformasiController::class);
            Route::resource('/propinsi', PropinsiController::class);
            Route::resource('/kabupaten', KabupatenController::class);
            Route::resource('/cabang', PengurusCabangController::class);
            Route::resource('/jenjang', JenjangPendidikanController::class);
            Route::resource('/users', UsersController::class)->middleware('superadmin');
            Route::group(["prefix" => "/dapo", "middleware" => "superadmin"], function (){
                Route::get("/", [DapoController::class, 'index'])->name('dapo.index');
                Route::delete("/{npsn}", [DapoController::class, 'destroy'])->name('dapo.delete');
                Route::post("/", [DapoController::class, 'store'])->name('dapo.save');
            });
            Route::group(["prefix" => "satpen/users", "middleware" => "superadmin"], function (){
                Route::get("/", [UsersController::class, 'users'])->name('users.satpen');
                Route::get("{user}/reset", [UsersController::class, 'reset'])->name('users.reset');
                Route::get("{user}/block", [UsersController::class, 'block'])->name('users.block');
                Route::get("{user}/unblock", [UsersController::class, 'unblock'])->name('users.unblock');
            });

            /**
             * Satpen
             */
            Route::group(["prefix" => "satpen"], function() {
                Route::get('/', [SATPENControllerAdmin::class, 'permohonanRegisterSatpen'])->name('a.satpen');
                Route::put('/{satpen}/status', [SATPENControllerAdmin::class, 'updateSatpenStatus'])->name('a.satpen.changestatus');
                Route::get('/rekap', [SATPENControllerAdmin::class, 'getAllSatpenOrFilter'])->name('a.rekapsatpen')->withoutMiddleware('primaryadmin');
                Route::get('/{satpenId}/detail', [SATPENControllerAdmin::class, 'getSatpenById'])->name('a.rekapsatpen.detail')->withoutMiddleware('primaryadmin');
                Route::delete('/{satpen}', [SATPENControllerAdmin::class, 'destroySatpen'])->name('a.rekapsatpen.destroy');
                Route::post('/doc/generate', [SATPENControllerAdmin::class, 'generatePiagamAndSK'])->name('generate.document');
                Route::post('/doc/regenerate', [SATPENControllerAdmin::class, 'reGeneratePiagamAndSK'])->name('regenerate.document');
                Route::get('/email/{satpen}', [SATPENControllerAdmin::class, 'sendNotifEmail'])->name('email.notif');
                Route::get('/reader/{type?}/{fileName?}', [FileViewerController::class, 'pdfGeneratedViewer'])->name('pdf.generated')->withoutMiddleware('primaryadmin');
                Route::get('/export_excel', [ExportExcelController::class, 'exportSatpentoExcel'])->name('satpen.excel')->withoutMiddleware('primaryadmin');
            });
            /**
             * Virtual NPSN
             */
            Route::group(["prefix" => "virtualnpsn"], function() {
                Route::get('/', [VirtualNPSNController::class, 'listPermohonanVNPSN'])->name('a.vnpsn');
                Route::delete('/{virtualNPSN}', [VirtualNPSNController::class, 'destroyVNPSN'])->name('a.vnpsn.destroy');
                Route::delete('/reject/{virtualNPSN}', [VirtualNPSNController::class, 'rejectPermohonanVNPSN'])->name('a.vnpsn.reject');
                Route::put('/{virtualNPSN}', [VirtualNPSNController::class, 'generateVirtualNumber'])->name('a.vnpsn.accept');
            });
            /**
             * OSS
             */
            Route::group(["prefix" => "oss"], function() {
                Route::get('/', [OSSControllerAdmin::class, 'listPermohonanOSS'])->name('a.oss')->withoutMiddleware('primaryadmin');
                Route::get('/detail/{ossId}', [OSSControllerAdmin::class, 'detailOSSQuesioner'])->name('a.oss.detail');
                Route::put('/acc/{oss}', [OSSControllerAdmin::class, 'setAcceptOSS'])->name('a.oss.acc');
                Route::put('/appear/{oss}', [OSSControllerAdmin::class, 'setIzinTerbitOSS'])->name('a.oss.appear');
                Route::put('/reject/{oss}', [OSSControllerAdmin::class, 'setRejectOSS'])->name('a.oss.reject');
                Route::delete('/destroy/{oss}', [OSSControllerAdmin::class, 'destroyOSS'])->name('a.oss.destroy');
                Route::get('/file/{path}/{fileName?}', [FileViewerController::class, 'viewOSSDoc'])->name('a.oss.file')->withoutMiddleware('primaryadmin');
            });

            /**
             * BHPNU
             */
            Route::group(["prefix" => "bhpnu"], function() {
                Route::get('/', [BHPNUControllerAdmin::class, 'listPermohonanBHPNU'])->name('a.bhpnu')->withoutMiddleware('primaryadmin');
                Route::get('/acc/{bhpnu}', [BHPNUControllerAdmin::class, 'setAcceptBHPNU'])->name('a.bhpnu.acc');
                Route::put('/appear/{bhpnu}', [BHPNUControllerAdmin::class, 'setIzinTerbitBHPNU'])->name('a.bhpnu.appear');
                Route::put('/reject/{bhpnu}', [BHPNUControllerAdmin::class, 'setRejectBHPNU'])->name('a.bhpnu.reject');
                Route::delete('/destroy/{bhpnu}', [BHPNUControllerAdmin::class, 'destroyBHPNU'])->name('a.bhpnu.destroy');
                Route::get('/file/{fileName?}', [FileViewerController::class, 'viewBuktiPembayaran'])->name('a.bhpnu.file')->withoutMiddleware('primaryadmin');
            });

            Route::group(["prefix" => "bantuan"], function() {
               Route::get('/', [SATPENControllerAdmin::class, 'underConstruction'])->name('a.bantuan');
            });

            Route::group(["prefix" => "beasiswa"], function() {
                Route::get('/', [SATPENControllerAdmin::class, 'underConstruction'])->name('a.beasiswa');
            });

            Route::group(["prefix" => "katalog"], function() {
                Route::get('/', [SATPENControllerAdmin::class, 'underConstruction'])->name('a.katalog');
            });

        });

    });
    /**
     * API Json
     */
    Route::prefix('api')->middleware('onlyadmin')->group(function () {
        Route::get('/provcount', [ApiController::class, 'getProvAndCount'])->name('api.provcount');
        Route::get('/satpen/{satpenId}', [ApiController::class, 'getSatpenById'])->name('api.satpenbyid');
        Route::get('/kabupaten/{provId}', [ApiController::class, 'getKabupatenByProv'])->name('api.kabupatenbyprov')->withoutMiddleware(["onlyadmin","mustlogin"]);
        Route::get('/pc/{provId}', [ApiController::class, 'getPCByProv'])->name('api.pcbyprov')->withoutMiddleware(["onlyadmin","mustlogin"]);
        Route::get('/kabcount/{provId?}', [ApiController::class, 'getKabAndCount'])->name('api.kabcount');
        Route::get('/pccount', [ApiController::class, 'getPCAndCount'])->name('api.pccount');
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
