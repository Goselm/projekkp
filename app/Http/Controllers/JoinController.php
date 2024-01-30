<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;

class JoinController extends Controller{
    public function index(){
        return view('tampilan.join');
    }
    
    public function insertdata(Request $request)
    {
        siswa::create($request->all());
        return redirect()->route('tambahdata')->with('success', 'data berhasil ditambahkan');
    }
}
    

