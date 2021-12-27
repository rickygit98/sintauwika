<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mahasiswa\MhsDashboardController;
use App\Http\Controllers\Mahasiswa\MhsSkripsiController;
use App\Http\Controllers\Mahasiswa\MhsBimbinganController;
use App\Http\Controllers\Mahasiswa\MhsTopikController;
use App\Http\Controllers\Mahasiswa\MhsJadwalController;

use App\Http\Controllers\Dosen\DsnDashboardController;
use App\Http\Controllers\Dosen\DsnTopikController;
use App\Http\Controllers\Dosen\DsnSkripsiController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSkripsiController;
use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Livewire\Admin\AdminUser;
use App\Http\Livewire\Admin\AdminMahasiswa;
use App\Http\Livewire\Admin\AdminDosen;
use App\Http\Livewire\Admin\AdminTopik;

use App\Http\Controllers\SmsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\kartuBimbinganController;

use App\Http\Controllers\TestTime;
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
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/mahasiswa/', [MhsDashboardController::class, 'index'])->name('mahasiswa.dashboard')->middleware(['auth','mahasiswa']);
Route::get('/dosen/', [DsnDashboardController::class, 'index'])->name('dosen.dashboard')->middleware(['auth','dosen']);
Route::get('/admin/', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);

//GROUP ADMIN
Route::group(['as'=>'admin.','prefix' => 'admin','middleware'=>['auth','admin']], function () {
    // Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('skripsi/showbimbingan/{skripsi:id}', [AdminSkripsiController::class,'showBimbingan']);
    Route::resource('skripsi', AdminSkripsiController::class);
    Route::resource('jadwal', AdminJadwalController::class);

    Route::get('user',AdminUser::class)->name('admin.user');
    Route::get('dosen',AdminDosen::class)->name('admin.dosen');
    Route::get('mahasiswa',AdminMahasiswa::class)->name('admin.mahasiswa');
    Route::get('topik',AdminTopik::class)->name('admin.topik');

    
    
});

// GROUP DOSEN
Route::group(['as'=>'dosen.','prefix' => 'dosen','middleware'=>['auth','dosen']], function () {
    Route::get('dashboard', [DsnDashboardController::class, 'index'])->name('dosen.dashboard');
    Route::get('skripsi/showbimbingan/{skripsi:id}', [DsnSkripsiController::class,'showBimbingan']);
    Route::resource('topik', DsnTopikController::class);
    Route::resource('skripsi', DsnSkripsiController::class);
 
    
});

// GROUP MAHASISWA
Route::group(['as'=>'mahasiswa.','prefix' => 'mahasiswa','middleware'=>['auth','mahasiswa']], function () {
    Route::get('dashboard', [MhsDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::resource('skripsi', MhsSkripsiController::class);
    Route::resource('topik', MhsTopikController::class);
    Route::resource('bimbingan', MhsBimbinganController::class);
    Route::resource('jadwal', MhsJadwalController::class);


});


// ROUTE Notification
Route::get('/sms',[SmsController::class,'sendSms']);
Route::get('/sendEmail', [EmailController::class,'sendEmail']);
Route::get('download/',[FileController::class,'download']);

//Kartu Bimbingan
Route::get('/print/{skripsi:id}', [kartuBimbinganController::class,'print'])->name('print')->middleware('auth');
Route::get('/download-pdf/{skripsi:id}', [kartuBimbinganController::class,'downloadPdf'])->name('downloadPdf')->middleware('auth');

// ROUTE TESTING
Route::get('/testTime',[TestTime::class,'index']);
Route::get('/phpinfo', function () {
    return phpinfo();
});
