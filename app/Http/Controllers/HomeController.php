<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller{
    public function index(){
        return view('tampilan.home');
    }

    public function about(){
        return view('tampilan.about');
    }

    public function contact(){
        return view('tampilan.contact');
    }

    public function course(){
        return view('tampilan.course');
    }

    public function team(){
        return view('tampilan.team');
    }

    public function testimonial(){
        return view('tampilan.testimonial');
    }

    public function belajar(){
        return view('tampilan.belajar');
    }

    public function math(){
        return view('tampilan.math');
    }

    public function biology(){
        return view('tampilan.biology');
    }

    public function chemistry(){
        return view('tampilan.chemistry');
    }

    public function physic(){
        return view('tampilan.physic');
    }
}