<?php

namespace App\Http\Controllers;
use App\Models\UangKeluar;

use Illuminate\Http\Request;

class LaporanKeluarController extends Controller
{
    public function index()
    {
        $data['uang_keluars'] = UangKeluar::all();
        return view('laporankeluar.index', $data);
    }
}

