<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatajurusanController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IjazahController;
use App\Http\Controllers\ManageuserController;
use App\Http\Controllers\SearchdataController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SearchdataController::class, 'index']);
Route::get('/searchdata', [SearchdataController::class, 'index']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'ceklevel:Administrator,Pendidik,Tendik'])->group(function () {
// ---------------Manage Profil-------------------//
Route::get('/profil', [HomeController::class, 'userProfile'])->name('profil');
Route::get('/user/profile/edit/{id}',[HomeController::class, 'editUserProfile'])->name('user.profile.edit');
Route::put('/user/profile/update/{id}',[HomeController::class, 'updateUserProfile'])->name('user.profile.update');

Route::resource('datajurusan', DatajurusanController::class);
Route::resource('/datasiswa', DatasiswaController::class,);
Route::resource('/dataijazah', IjazahController::class);

// ------------------- Import Export--------------------//
Route::post('/importexcel', [DatasiswaController::class, 'importexcel'])->name('importexcel');

// --------------------- Grafik Chart --------------------------//
// Route::get('/datasiswapertahun', [ChartController::class, 'datasiswapertahun'])->name('datasiswapertahun');
});

Route::middleware(['auth', 'ceklevel:Administrator'])->group(function () {
// ---------------Manage User-------------------//
Route::get('/manageuser', [ManageuserController::class, 'index'])->name('usermanage.index');
Route::get('/manageuser/create', [ManageuserController::class, 'create'])->name('usermanage.create');
Route::post('/manageuser/store', [ManageuserController::class, 'store'])->name('usermanage.store');
Route::get('/manageuser/edit/{id}', [ManageuserController::class, 'edit'])->name('usermanageEdit');
Route::put('/manageuser/update/{id}', [ManageuserController::class, 'update'])->name('usermanage.update');
Route::get('/manageuser/delete/{id}', [ManageuserController::class, 'destroy'])->name('usermanage.destroy');

// ------------------- Import Export--------------------//
Route::post('/importexcel', [DatasiswaController::class, 'importexcel'])->name('importexcel');
});