<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,GeneralController,SatpenController,
    OperatorController,AdminController,ApiController,ExportController,InformasiController,
    PropinsiController,KabupatenController,PengurusCabangController};

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
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [SatpenController::class, 'registerProses'])->name('register.proses');
Route::get('/ceknpsn', [AuthController::class, 'cekNpsnPage'])->name('ceknpsn');
Route::post('/ceknpsn', [AuthController::class, 'checkNpsn'])->name('ceknpsn.proses');
Route::get('/register/success', [AuthController::class, 'registerSuccess'])->name('register.success');

Route::middleware('mustlogin')->group(function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/upload/{fileName?}', [AdminController::class, 'pdfUploadViewer'])->name('viewerpdf');

    Route::middleware('onlyoperator')->group(function() {
        Route::get('/dashboard', [OperatorController::class, 'dashboardPage'])->name('dashboard');
        Route::get('/satpen', [OperatorController::class, 'mySatpenPage'])->name('mysatpen');
        Route::get('/satpen/edit', [OperatorController::class, 'editSatpenPage'])->name('mysatpen.revisi');
        Route::get('/satpen/perpanjang', [OperatorController::class, 'perpanjangSatpenPage'])->name('mysatpen.perpanjang');
        Route::put('/satpen/edit', [SatpenController::class, 'revisionProses'])->name('mysatpen.revisi');
        Route::put('/satpen/perpanjang', [SatpenController::class, 'revisionProses'])->name('mysatpen.perpanjang');
        Route::get('/download/{document}', [SatpenController::class, 'downloadDocument'])->name('download');
        Route::get('/oss', [OperatorController::class, 'underConstruction'])->name('oss');
        Route::get('/bhpnu', [OperatorController::class, 'underConstruction'])->name('bhpnu');
    });

    Route::middleware('onlyadmin')->prefix('admin')->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboardPage'])->name('a.dash');
        Route::get('/satpen', [AdminController::class, 'permohonanRegisterSatpen'])->name('a.satpen');
        Route::put('/satpen/{satpen}/status', [AdminController::class, 'updateSatpenStatus'])->name('a.satpen.changestatus');
        Route::get('/rekapsatpen', [AdminController::class, 'getAllSatpenOrFilter'])->name('a.rekapsatpen');
        Route::get('/rekapsatpen/{satpenId}/detail', [AdminController::class, 'getSatpenById'])->name('a.rekapsatpen.detail');
        Route::get('/oss', [AdminController::class, 'underConstruction'])->name('a.oss');
        Route::get('/bhpnu', [AdminController::class, 'underConstruction'])->name('a.bhpnu');
        Route::post('/doc/generate', [AdminController::class, 'generatePiagamAndSK'])->name('generate.document');
        Route::post('/doc/regenerate', [AdminController::class, 'reGeneratePiagamAndSK'])->name('regenerate.document');

        Route::resource('/informasi', InformasiController::class);
        Route::resource('/propinsi', PropinsiController::class);
        Route::resource('/kabupaten', KabupatenController::class);
        Route::resource('/cabang', PengurusCabangController::class);
        Route::resource('/jenjang', PropinsiController::class);
    });
    Route::middleware('onlyadmin')->prefix('api')->group(function () {
       Route::get('/satpen/{satpenId}', [ApiController::class, 'getSatpenById'])->name('api.satpenbyid');
       Route::get('/kabupaten/{provId}', [ApiController::class, 'getKabupatenByProv'])->name('api.kabupatenbyprov');
       Route::get('/provcount', [ApiController::class, 'getProvAndCount'])->name('api.provcount');
       Route::get('/kabcount/{provId?}', [ApiController::class, 'getKabAndCount'])->name('api.kabcount');
       Route::get('/jenjangcount', [ApiController::class, 'getJenjangAndCount'])->name('api.jenjangcount');
    });
    Route::middleware('onlyadmin')->group(function() {
        Route::get('/generate/{type?}/{fileName?}', [AdminController::class, 'pdfGeneratedViewer'])->name('pdf.generated');
    });
});

Route::get('test', [GeneralController::class, 'totalSatpenByJenjang']);
