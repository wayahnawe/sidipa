<?php

use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });
Route::get('/verifyEmailFirst/', [App\Http\Controllers\Auth\RegisterController::class, 'verifyEmailFirst'])->name('verifyEmailFirst');
Route::get('/verifyEmail/{email}/{verify_token}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyEmail'])->name('verifyEmail');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::prefix('adminpanel')->middleware('auth')->name('backend.')->group(function () {
    route::get('/perjalanan_dinas/domestik',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'domestik'])->name('perjalanan_dinas.domestik');
    route::get('/adminpanel/perjalanan_dinas/internasional',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'internasional'])->name('perjalanan_dinas.internasional');
    route::get('/perjalanan_dinas/domestik/{jaldin}/edit',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'edit_domestik'])->name('perjalanan_dinas.domestik.edit');
     route::get('/perjalanan_dinas/domestik/{jaldin}/checklist_biaya',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'checklist_biaya_domestik'])->name('perjalanan_dinas.domestik.check_list_biaya');
    route::get('/adminpanel/perjalanan_dinas/internasional/{jaldin}/edit',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'edit_internasional'])->name('perjalanan_dinas.internasional.edit');
    route::get('/perjalanan_dinas/domestik/{jaldin}/getpeserta/{id}',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'peserta']);
    route::get('/perjalanan_dinas/domestik/{jaldin}/list_peserta/{id}',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'list_peserta']);
    route::get('/perjalanan_dinas/domestik/{jaldin}/checklist_peserta/{golongan}',[App\Http\Controllers\Dipanel\PerjalananDinasController::class, 'checklist_biaya_peserta_domestik']);
    route::get('/permissions/{permissions}/check',[App\Http\Controllers\PermissionsController::class,'check_alias']);

    route::get('/dashboard', [App\Http\Controllers\Dipanel\DashboardController::class, 'index'])->name('dashboard');
    route::resource('/employee', App\Http\Controllers\Dipanel\EmployeesController::class);
    route::resource('/expenses', App\Http\Controllers\Dipanel\BiayaController::class);
    // route::resource('/daerah', App\Http\Controllers\Dipanel\DaerahController::class);
    route::resource('/laporan/ledger', App\Http\Controllers\Dipanel\LedgerController::class);
    route::resource('/maskapai', App\Http\Controllers\Dipanel\MaskapaiController::class);
    route::resource('/organisasi', App\Http\Controllers\Dipanel\OrganizationController::class);
    route::resource('/pagu', App\Http\Controllers\Dipanel\PaguController::class);
    route::resource('/pejabat', App\Http\Controllers\Dipanel\PejabatController::class);
    route::resource('/perjalanan_dinas', App\Http\Controllers\Dipanel\PerjalananDinasController::class);
    route::resource('/realisasi', App\Http\Controllers\Dipanel\RealisasiController::class);
    route::resource('/daftar_perjalanan', App\Http\Controllers\Dipanel\ReportDaftarController::class);
    route::resource('/jadwal_perjalanan', App\Http\Controllers\Dipanel\ReportJadwalController::class);
    route::resource('/rekap_perjalanan', App\Http\Controllers\Dipanel\ReportRekapController::class);
    route::resource('/sbu', App\Http\Controllers\Dipanel\SBUController::class);
    route::resource('/sptjb', App\Http\Controllers\Dipanel\SPTJBController::class);
    route::resource('/gtpd', App\Http\Controllers\Dipanel\GTPDController::class);
    route::resource('/tarif', App\Http\Controllers\Dipanel\TarifController::class);
    route::resource('/budget', App\Http\Controllers\Dipanel\BudgetController::class);

     //User Management
     Route::resource('users', App\Http\Controllers\UsersController::class);
     Route::resource('roles', App\Http\Controllers\RolesController::class);
     Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
     Route::resource('module', App\Http\Controllers\ModuleController::class);


});
Route::fallback(function () {
    return view('errors.404');
});
