<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiTransaksiBarang extends Controller
{
    public function index(){
        return view('simulasi_transaksi_barang.index');
    }
}
