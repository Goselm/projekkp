<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    public function index()
    {
        $data = siswa::all();
        return view('siswa.dashboard', compact('data'));
    }

    public function kembali()
    {
        $data = siswa::all();
        return view('siswa.dashboard', compact('data'));
    }
    
    public function tambahkan(){
        return view('siswa.create');
    }

    public function masukdata(Request $request){
         $validatedData = $request->validate([
            'nama' => 'required|string|max:255', 
            'grade' => 'required|integer|min:1',
            'email'=> 'required|string|max:255', 
            'school' => 'required|string|max:255',]);

        Log::info('Redirecting to tambahdata route with success message.');
        siswa::create($validatedData);
        return redirect()->route('tambahkan')->with('success', 'data berhasil ditambahkan');
    }

    public function showdata($id){
        $data = siswa::find($id);
        return view('siswa.show', compact('data'));}

    public function updatedata(Request $request, string $id){
        $data =siswa::find($id);
        $data->update($request->all());
        return redirect()->route('kembali')->with('success', 'data berhasil diupdate');}

    public function hapusdata($id){
    $data =siswa::where('id',$id)->first();
    if ($data != null) {
        $data->delete();
        return redirect()->route('kembali')->with(['message'=> 'Successfully deleted!!']);}
    return redirect()->route('kembali')->with(['message'=> 'Wrong ID!!']);}

    public function pdfsiswa(){
        $siswas = Siswa::all();
        return view('siswa.siswa_pdf', compact('siswas'));}

    public function printpdfsiswa(){
        $siswas = Siswa::all();

        $pdf = Pdf::loadview('siswa.siswa_pdf',compact('siswas'));
        return $pdf->download('laporan-siswa-pdf.pdf');}

    public function chatMasuk(){
        return view('siswa.chatUser');
    }
}
