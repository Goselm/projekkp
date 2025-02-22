<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans=[];
        $karyawans = karyawan::all();
        return view('karyawan.karyawan',['karyawans' => $karyawans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */

    public function getKaryawan()
    {
        $karyawans = Karyawan::all();
        return $karyawans;
    }
    
    public function return()
    {        
        $karyawans = Karyawan::all();
        return view('karyawan.karyawan', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|string|max:255',
            'gaji'=> 'required|integer|min:1',   
        ]);
        Log::info('Redirecting to tambahdata route with success message.');
        Karyawan::create($validatedData);
        return redirect()->route('create')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    

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

    public function show($id)
    {
        $karyawans = Karyawan::find($id);
        //dd($data);
        return view('karyawan.show', compact('karyawans'));
    }

    public function update(Request $request, string $id)
    {
        $karyawans =Karyawan::find($id);
        $karyawans->update($request->all());
        return redirect()->route('return')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawans =Karyawan::where('id',$id)->first();

    if ($karyawans != null) {
        $karyawans->delete();
        return redirect()->route('return')->with(['message'=> 'Successfully deleted!!']);
    }
    return redirect()->route('return')->with(['message'=> 'Wrong ID!!']);
    }

    public function pdfkaryawan(){
        $karyawans = Karyawan::all();
        return view('karyawan.karyawan_pdf', compact('karyawans'));
    }

    public function printpdfkaryawan(){
        $karyawans = Karyawan::all();

        $pdf = Pdf::loadview('karyawan.karyawan_pdf',compact('karyawans'));
        return $pdf->download('laporan-karyawan-pdf.pdf');

    }
}
