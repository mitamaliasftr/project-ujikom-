<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiGaji extends Controller
{
    public function index(){
        return view('simulasi_gaji.index');
    }
}
