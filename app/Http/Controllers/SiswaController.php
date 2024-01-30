<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

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
    public function tambahdata()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertdata(Request $request)
    {
        siswa::create($request->all());
        return redirect()->route('tambahdata')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function showdata($id)
    {
        $data = siswa::find($id);
        //dd($data);
        return view('siswa.show', compact('data'));

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
    public function updatedata(Request $request, string $id)
    {
        $data =siswa::find($id);
        $data->update($request->all());
        return redirect()->route('siswa.dashboard')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = siswa::find($id);
        $data->delete();
        return redirect()->route('dashboard')->with('success', 'data berhasil dihapus');
    }
}
