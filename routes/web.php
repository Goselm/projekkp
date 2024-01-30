<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', function () {
    return view('tampilan.home');
});
Route::get('tampilan.login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('tampilan.login', [LoginController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('siswa.dashboard', 'App\Http\Controllers\SiswaController@index');

Route::get('/tambahdata',[SiswaController::class, 'tambahdata'])->name('tambahdata');
Route::post('siswa.create', 'App\Http\Controllers\SiswaController@tambahdata');
Route::get('siswa.show', 'App\Http\Controllers\SiswaControllers@showdata');
Route::post('/insertdata',[SiswaController::class, 'insertdata'])->name('insertdata');
Route::get('/showdata/{id}', [SiswaController::class, 'showdata'])->name('showdata');
Route::post('/updatedata/{id}', [SiswaController::class, 'updatedata'])->name('updatedata');
Route::get('/destroy/{id}', [SiswaController::class, 'destroy'])->name('destroy');

Route::get('/create',[KaryawanController::class, 'create'])->name('create');
Route::post('karyawan.create', 'App\Http\Controllers\KaryawanController@create');
Route::get('karyawan.show', 'App\Http\Controllers\KaryawanControllers@show');
Route::post('/store',[KaryawanController::class, 'store'])->name('store');
Route::get('/show/{id}', [KaryawanController::class, 'show'])->name('show');
Route::post('/update/{id}', [KaryawanController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [KaryawanController::class, 'destroy'])->name('destroy');

Route::get('karyawan.karyawan', 'App\Http\Controllers\KaryawanController@index');

Route::get('tampilan.home', 'App\Http\Controllers\HomeController@index');
Route::get('tampilan.about', 'App\Http\Controllers\AboutController@index');
Route::get('tampilan.contact', 'App\Http\Controllers\ContactController@index');
Route::get('tampilan.course', 'App\Http\Controllers\CourseController@index');
Route::get('tampilan.team', 'App\Http\Controllers\TeamController@index');
Route::get('tampilan.testimonial', 'App\Http\Controllers\TestimonialController@index');
Route::get('tampilan.error', 'App\Http\Controllers\ErrorController@index');
Route::get('tampilan.join', 'App\Http\Controllers\JoinController@index');
Route::post('tampilan.join', 'App\Http\Controllers\JoinController@Store');