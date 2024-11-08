<?php

namespace App\Http\Controllers;

use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataPemasukannController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = UangMasuk::query();

        if ($request->has(['tgl_awal', 'tgl_akhir'])) {
            $tgl_awal = Carbon::parse($request->input('tgl_awal'))->startOfDay();
            $tgl_akhir = Carbon::parse($request->input('tgl_akhir'))->endOfDay();

            // Filter berdasarkan rentang tanggal
            $query->whereBetween('tanggal', [$tgl_awal, $tgl_akhir]);
        }

        $uang_masuks = $query->get();
        return view('datapemasukan.index', compact('uang_masuks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datapemasukan.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|max:255',
            'keterangan_pemasukan' => 'required|max:255',
            'jumlah' => 'required|numeric',
        ]);

        UangMasuk::create($validated);

        $notification = array(
            'message' => "Data Uang Masuk berhasil ditambahkan!",
            'alert-type' => 'success'
        );

        $notifications = array(
            'message' => "Data Uang Masuk gagal ditambahkan!",
            'alert-type' => 'error'
        );
        

        if ($request->simpan == true) {
            return redirect()->route('datapemasukan.index')->with($notification);
        } else {
            return redirect()->route('datapemasukan.create')->with($notifications);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['datapemasukan'] = UangMasuk::findOrFail($id);
        return view('datapemasukan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datapemasukan = UangMasuk::findOrFail($id);

        $validated = $request->validate([
            'tanggal' => 'required|max:255',
            'keterangan_pemasukan' => 'required|max:255',
            'jumlah' => 'required|numeric',
        ]);

        UangMasuk::where('id', $id)->update($validated);

      
        $notification = array(
            'message' => "Data Uang Masuk berhasil diedit!",
            'alert-type' => 'success'
        );

        $notifications = array(
            'message' => "Data Uang Masuk gagal diedit!",
            'alert-type' => 'error'
        );

        
        return redirect()->route('datapemasukan.index')->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datapemasukan = UangMasuk::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );

        
        $notification = array(
            'message' => "Data Uang Masuk berhasil dihapus!",
            'alert-type' => 'success'
        );

        $notifications = array(
            'message' => "Data Uang Masuk gagal dihapus!",
            'alert-type' => 'error'
        );


        return redirect()->route('datapemasukan.index', $datapemasukan)->with($notification);
    }
}
