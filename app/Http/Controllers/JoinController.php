<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JoinController extends Controller{
    public function index(){
        return view('tampilan.join');
    }
    public function tambahdata(){
        return view('tampilan.join');
    }
    public function insertdata(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255', 
            'grade' => 'required|integer|min:1',
            'email' => 'required|string|max:255',
            'school' => 'required|string|max:255',  
            // Add validation rules for other fields
        ]);

        // Log a message to confirm redirection
        Log::info('Redirecting to tambahdata route with success message.');
        siswa::create($validatedData);
        return redirect()->route('tambahdata')->with('success', 'berhasil mendaftar');
        //siswa::create($request->all());
        //return redirect()->route('tambahdata')->with('success', 'data berhasil ditambahkan');
    }
}
    

