<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CourseController extends Controller{
    public function index(){
        return view('tampilan.course');
    }
}