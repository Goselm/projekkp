<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ErrorController extends Controller{
    public function index(){
        return view('tampilan.error');
    }
}