<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller{
    public function index(){
        $jadwals=[];
        $jadwals = Jadwal::all();
        return view('jadwal.jadwal', ['jadwals' => $jadwals]);
    }

    //buat return untuk fungsi hapuss
    public function back(){
        $jadwals = Jadwal::all();
        return view('jadwal.jadwal', compact('jadwals'));
    }

    //buat show create data
    public function screate(){
        return view('jadwal.create', );
    }

    //buat tambahkan data atau store
    public  function add(Request $request){
         // Validate incoming data
         $validatedData = $request->validate([
            'siswa' => 'required|string|max:255', 
            'karyawan' => 'required|string|max:255',
            'mata_pelajaran'=> 'required|string|max:255',   
            // Add validation rules for other fields
        ]);

        // Log a message to confirm redirection
        Log::info('Redirecting to tambahdata route with success message.');

        Jadwal::create($validatedData);

        return redirect()->route('screate')->with('success', 'data berhasil ditambahkan');
    }

    //buat tunjukkan data atau show data
    public function tunjukkan($id)
    {
        $jadwals = Jadwal::find($id);
        //dd($data);
        return view('jadwal.show', compact('jadwals'));
    }

    //buat update data
    public function updatebaru(Request $request, string $id){
        $jadwals = Jadwal::find($id);
        $jadwals->update($request->all());
        return redirect()->route('back')->with('success', 'data berhasil diupdate');
    }

    //buat hapus data
    public function clear(string $id){
        $jadwals =Jadwal::where('id',$id)->first();

        if ($jadwals != null) {
            $jadwals->delete();
            return redirect()->route('back')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('back')->with(['message'=> 'Wrong ID!!']);
    }

    public function pdf(){
        $jadwals = Jadwal::all();
        return view('jadwal.jadwal_pdf', compact('jadwals'));
    }

    public function print(){
        $jadwals = Jadwal::all();

        $pdf = PDF::loadview('jadwal.jadwal_pdf',compact('jadwals'));
        return $pdf->download('laporan-jadwal-pdf.pdf');

    }
}