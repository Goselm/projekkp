<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\PembayaranController;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use App\Services\GmailService;
use Illuminate\Http\Request;

//login
Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('tampilan.home');
    })->name('tampilan.home');
});
Route::get('tampilan.login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('tampilan.login', [LoginController::class, 'login']);
Route::get('siswa.dashboard', 'App\Http\Controllers\SiswaController@index');

//jadwal
Route::get('/screate',[JadwalController::class, 'screate'])->name('screate');
Route::post('jadwal.create', 'App\Http\Controllers\JadwalController@screate');
Route::get('jadwal.show', 'App\Http\Controllers\JadwalControllers@tunjukkan');
Route::get('/back', [JadwalController::class, 'back'])->name('back');
Route::post('/add',[JadwalController::class, 'add'])->name('add');
Route::get('/tunjukkan/{id}', [JadwalController::class, 'tunjukkan'])->name('tunjukkan');
Route::post('/updatebaru/{id}', [JadwalController::class, 'updatebaru'])->name('updatebaru');
Route::get('/clear/{id}', [JadwalController::class, 'clear'])->name('clear');
Route::get('/print', 'App\Http\Controllers\JadwalController@print')->name('print');
Route::get('jadwal.jadwal_pdf', 'App\Http\Controllers\JadwalController@pdf')->name('pdf');
Route::get('jadwal.jadwal', '\App\Http\Controllers\JadwalController@index');
Route::get('/get-karyawan', [KaryawanController::class, 'getKaryawan'])->name('get-karyawan');

//siswa
Route::get('/tambahkan',[SiswaController::class, 'tambahkan'])->name('tambahkan');
Route::post('siswa.create', 'App\Http\Controllers\SiswaController@tambahkan');
Route::get('siswa.show', 'App\Http\Controllers\SiswaControllers@showdata');
Route::get('/kembali', [SiswaController::class, 'kembali'])->name('kembali');
Route::post('/masukdata',[SiswaController::class, 'masukdata'])->name('masukdata');
Route::get('/showdata/{id}', [SiswaController::class, 'showdata'])->name('showdata');
Route::post('/updatedata/{id}', [SiswaController::class, 'updatedata'])->name('updatedata');
Route::get('/hapusdata/{id}', [SiswaController::class, 'hapusdata'])->name('hapusdata');
Route::get('/printpdfsiswa', 'App\Http\Controllers\SiswaController@printpdfsiswa')->name('printpdfsiswa');
Route::get('siswa.siswa_pdf', 'App\Http\Controllers\SiswaController@pdfsiswa')->name('pdfsiswa');
Route::get('siswa.chatUser', 'App\Http\Controllers\SiswaController@chatMasuk');

//karyawan
Route::get('/printpdfkaryawan', 'App\Http\Controllers\KaryawanController@printpdfkaryawan')->name('printpdfkaryawan');
Route::get('karyawan.karyawan_pdf', 'App\Http\Controllers\KaryawanController@pdfkaryawan')->name('pdfkaryawan');
Route::get('/create',[KaryawanController::class, 'create'])->name('create');
Route::post('karyawan.create', 'App\Http\Controllers\KaryawanController@create');
Route::get('karyawan.show', 'App\Http\Controllers\KaryawanControllers@show');
Route::get('/return', [KaryawanController::class, 'return'])->name('return');
Route::post('/store',[KaryawanController::class, 'store'])->name('store');
Route::get('/show/{id}', [KaryawanController::class, 'show'])->name('show');
Route::post('/update/{id}', [KaryawanController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [KaryawanController::class, 'destroy'])->name('destroy');
Route::get('karyawan.karyawan', 'App\Http\Controllers\KaryawanController@index');

//tampilan
Route::get('tampilan.home', 'App\Http\Controllers\HomeController@index');
Route::get('tampilan.about', 'App\Http\Controllers\AboutController@index');
Route::get('tampilan.contact', 'App\Http\Controllers\ContactController@index');
Route::get('tampilan.course', 'App\Http\Controllers\CourseController@index');
Route::get('tampilan.team', 'App\Http\Controllers\TeamController@index');
Route::get('tampilan.testimonial', 'App\Http\Controllers\TestimonialController@index');
Route::get('tampilan.error', 'App\Http\Controllers\ErrorController@index');
Route::get('tampilan.chat', 'App\Http\Controllers\ChatController@index');

//midtrans
Route::get('tampilan.payment', 'App\Http\Controllers\PembayaranController@paymentTampilan');
Route::post('/payment', 'App\Http\Controllers\PembayaranController@paymentMidtrans');
Route::get('/payment', 'App\Http\Controllers\PembayaranController@paymentMidtrans');

//join
Route::get('/tambahdata',[JoinController::class, 'tambahdata'])->name('tambahdata');
Route::get('tampilan.join', 'App\Http\Controllers\JoinController@index');
Route::post('/insertdata', [JoinController::class, 'insertdata'])->name('insertdata');

//pembayaran untuk nmengirim pesan email
Route::get('pembayaran.pembayaran', 'App\Http\Controllers\PembayaranController@index');
Route::get('/showdatapembayaran/{id}', [PembayaranController::class, 'showdatapembayaran'])->name('showdatapembayaran');
Route::post('/editpembayaran/{id}', [PembayaranController::class, 'editpembayaran'])->name('editpembayaran');
Route::get('/kembali', [PembayaranController::class, 'kembali'])->name('kembali');
Route::get('/pcreate',[PembayaranController::class, 'pcreate'])->name('pcreate');
Route::post('/tambahPembayaran',[PembayaranController::class, 'tambahPembayaran'])->name('tambahPembayaran');

Route::get('/send-emails', 'App\Http\Controllers\PembayaranController@sendEmails');
Route::get('getPembayaran', 'App\Http\Controllers\PembayaranController@getPemabyaran');

Route::get('/callback', function (Request $request, GmailService $gmailService) {
    $authorizationCode = $request->query('code'); // Tangkap 'code' dari URL
    if (!$authorizationCode) {
        return response()->json(['error' => 'Authorization code is missing.'], 400);
    }

    // Kirim kode ke GmailService untuk mendapatkan access token
    try {
        $gmailService->fetchAccessTokenWithAuthCode($authorizationCode);
        return response()->json(['message' => 'Authorization successful. Access token saved.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/send-email', function (GmailService $gmailService) {
    $to = $pembayaran->email;
    $subject = 'Tes Gmail API';
    $body = 'Halo, ini adalah email yang dikirim melalui Gmail API.';
    
    try {
        $gmailService->sendEmail($to, $subject, $body);
        return response()->json(['message' => 'Email berhasil dikirim.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/auth/google', 'App\Http\Controllers\PembayaranController@redirectToGoogle')->name('google.redirect');
Route::get('/panggil', 'App\Http\Controllers\PembayaranController@handleGoogleCallback')->name('google.callback');


Route::get('/send-emails', 'App\Http\Controllers\PembayaranController@sendEmails');
//belajar
Route::get('belajar.view', 'App\Http\Controllers\BelajarController@index');
Route::get('belajar.math', 'App\Http\Controllers\BelajarController@math');
Route::get('belajar.physic', 'App\Http\Controllers\BelajarController@physic');
Route::get('belajar.chemistry', 'App\Http\Controllers\BelajarController@chemistry');
Route::get('belajar.biology', 'App\Http\Controllers\BelajarController@biology');