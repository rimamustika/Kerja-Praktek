<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UangMasuk;

class LaporanMasukController extends Controller
{
    public function index()
    {
        $data['uang_masuks'] = UangMasuk::all();
        return view('laporanmasuk.index', $data);
    }
}
