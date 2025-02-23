<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StatusController extends Controller
{
    public function index()
    {
        $data = Notifikasi::all();
        return view('status.status', compact('data'));
    }

    public function balik()
    {
        $data = Notifikasi::all();
        return view('status.status', compact('data'));
    }
    
    public function tambahdatastatus(){
        return view('status.create');
    }

    public function masukdatastatus(Request $request){
         $validatedData = $request->validate([
            'nama' => 'required|string|max:255', 
            'jumlah' => 'required|integer|min:1',
            'status'=> 'required|string|max:255', 
        ]);

        Log::info('Redirecting to tambahdata route with success message.');
        Notifikasi::create($validatedData);
        return redirect()->route('index')->with('success', 'data berhasil ditambahkan');
    }

    public function showdatastatus($id){
        $data = Notifikasi::find($id);
        return view('status.show', compact('data'));}

    public function updatedatastatus(Request $request, string $id){
        $data =Notifikasi::find($id);
        $data->update($request->all());
        return redirect()->route('index')->with('success', 'data berhasil diupdate');
    }

    public function hapusdatastatus($id){
    $data =Notifikasi::where('id',$id)->first();
    if ($data != null) {
        $data->delete();
        return redirect()->route('index')->with(['message'=> 'Successfully deleted!!']);}
    return redirect()->route('index')->with(['message'=> 'Wrong ID!!']);}

    public function pdfstatus(){
        $notifikasis = Notifikasi::all();
        return view('status.status_pdf', compact('notifikasis'));}

    public function printpdfstatus(){
        $notifikasis = Notifikasi::all();

        $pdf = Pdf::loadview('status.status_pdf',compact('notifikasis'));
        return $pdf->download('laporan-status-pdf.pdf');}
}
