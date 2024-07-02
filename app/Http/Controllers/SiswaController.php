<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = siswa::all();
        return view('siswa.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /* public function tambahdata()
    {
        return view('tampilan.join');
    }
 */
    /**
     * Store a newly created resource in storage.
     */

    public function kembali()
    {
        $data = siswa::all();
        return view('siswa.dashboard', compact('data'));
    }
    public function tambahkan(){
        return view('siswa.create');}

    public function masukdata(Request $request){
         // Validate incoming data
         $validatedData = $request->validate([
            'nama' => 'required|string|max:255', 
            'grade' => 'required|integer|min:1', 
            'school' => 'required|string|max:255',]);  
            // Add validation rules for other fields
        

        // Log a message to confirm redirection
        Log::info('Redirecting to tambahdata route with success message.');

        siswa::create($validatedData);

        return redirect()->route('tambahkan')->with('success', 'data berhasil ditambahkan');}
        /* siswa::create($request->all());
        return redirect()->route('tambahkan')->with('success', 'data berhasil ditambahkan'); */
    

    /**
     * Display the specified resource.
     */
    public function showdata($id){
        $data = siswa::find($id);
        //dd($data);
        return view('siswa.show', compact('data'));}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatedata(Request $request, string $id){
        $data =siswa::find($id);
        $data->update($request->all());
        return redirect()->route('kembali')->with('success', 'data berhasil diupdate');}

    /**
     * Remove the specified resource from storage.
     */
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
}
