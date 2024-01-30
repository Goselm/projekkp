<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Karyawan::create($request->all());
        return redirect()->route('create')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $karyawans = Karyawan::find($id);
        //dd($data);
        return view('karyawan.show', compact('karyawans'));
    }

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
    public function update(Request $request, string $id)
    {
        $karyawans =Karyawan::find($id);
        $karyawans->update($request->all());
        return redirect()->route('karyawan.karyawan')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawans = Karyawan::find($id);
        $karyawans->delete();
        return redirect()->route('dashboard')->with('success', 'data berhasil dihapus');
    }
}
