<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index(){
        return view('belajar.view');
    }

    public function math(){
        return view('belajar.math');
    }

    public function physic(){
        return view('belajar.physic');
    }

    public function chemistry(){
        return view('belajar.chemistry');
    }

    public function biology(){
        return view('belajar.biology');
    }
}
