<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembayaran;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Mail;
use App\Mail\MidnightEmail;
use Illuminate\Support\Facades\Log;
use App\Mail\PembayaranEmail;
use App\Services\GmailService;
use Midtrans\Config;
use Midtrans\Snap;

class PembayaranController extends Controller
{

    private $gmailService;

    public function index(){
        $data = pembayaran::all(); //Ambil semua data dari database
        return view('pembayaran.pembayaran', compact('data')); //kirim data ke view
    }

    public function getPembayaran(){
        $pembayarans = pembayaran::all();
        return $pembayarans;
    }

    public function __construct(GmailService $gmailService)
    {
        $this->gmailService = $gmailService;
    }
    
    public function sendEmails()
    {
    $pembayarans = \App\Models\Pembayaran::all();

    foreach ($pembayarans as $pembayaran) {
        try {
            $to = $pembayaran->email;
            $subject = 'Tagihan Pembayaran';
            $body = "<p>Halo {$pembayaran->nama},<br>Tagihan Anda sebesar Rp{$pembayaran->biaya}.</p>";

            $this->gmailService->sendEmail($to, $subject, $body);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    return response()->json(['message' => 'Semua email telah dikirim!']);
    }

    public function stay(){
        $data = pembayaran::all();
        return view('pembayaran.pembayaran', compact('data'));
    }

    public function tambahPembayaran(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([ 
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'biaya'=> 'required|integer|min:1'   
            // Add validation rules for other fields
        ]);

        // Log a message to confirm redirection
        Log::info('Redirecting to tambahdata route with success message.');

        pembayaran::create($validatedData);

        return redirect()->route('pcreate')->with('success', 'data berhasil ditambahkan');
        //Karyawan::create($request->all());
        //return redirect()->route('create')->with('success', 'data berhasil ditambahkan');
    }

    public function kembali()
    {
        $data = pembayaran::all();
        return view('pembayaran.pembayaran', compact('data'));
    }

    public function showdatapembayaran($id){
        $data = pembayaran::find($id);
        return view('pembayaran.show', compact('data'));
    }

    public function editpembayaran(Request $request, string $id){
        $data =pembayaran::find($id);
        $data->update($request->all());
        return redirect()->route('kembali')->with('success', 'data berhasil diupdate');
    }

    public function pcreate()
    {

        return view('pembayaran.create');
    }

    public function redirectToGoogle(GmailService $gmailService)
    {
        // Dapatkan URL autentikasi
        $authUrl = $gmailService->authenticate();
        
        // Redirect pengguna ke Google untuk login
        return redirect()->away($authUrl);
    }

    public function handleGoogleCallback(GmailService $gmailService)
    {
    // Tangkap kode otorisasi dari URL
    $authorizationCode = request('code'); // 'code' berasal dari parameter URL

    if (!$authorizationCode) {
        return response()->json(['error' => 'Authorization code not found'], 400);
    }

    try {
        // Tukarkan authorization code dengan access token
        $gmailService->fetchAccessTokenWithAuthCode($authorizationCode);
        
        return response()->json(['message' => 'Authentication successful!']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    public function paymentTampilan(){
        return view('tampilan.payment');
    }

    public function paymentMidtrans(Request $request) 
    {if (!$request->has('amount')) {
            return response()->json(['error' => 'Field amount tidak ditemukan dalam request.'], 400);}
        if (!$request->isMethod('post')) {
            return response()->json(['error' => 'Invalid request method, use POST'], 405);}        
        $amount = (float) $request->input('amount', 0);
        if ($amount < 0.01) { 
            return response()->json(['error' => 'gross_amount harus lebih dari 0.01'], 400);}
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => $amount,];
        $customer_details = [
            'first_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,];
        $transaction = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];
        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
