<?php

namespace App\Http\Controllers;

use App\Models\UangKeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataPengeluaranController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = UangKeluar::query();

        if ($request->has(['tgl_awal', 'tgl_akhir'])) {
            $tgl_awal = Carbon::parse($request->input('tgl_awal'))->startOfDay();
            $tgl_akhir = Carbon::parse($request->input('tgl_akhir'))->endOfDay();

            // Filter berdasarkan rentang tanggal
            $query->whereBetween('tanggal', [$tgl_awal, $tgl_akhir]);
        }

        $uang_keluars = $query->get();
        return view('datapengeluaran.index', compact('uang_keluars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datapengeluaran.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|max:255',
            'keterangan_pengeluaran' => 'required|max:255',
            'jumlah' => 'required|numeric',
        ]);

        UangKeluar::create($validated);

       
        $notification = array(
            'message' => "Data Uang Keluar berhasil ditambahkan!",
            'alert-type' => 'success'
        );

        $notifications = array(
            'message' => "Data Uang Keluar gagal ditambahkan!",
            'alert-type' => 'error'
        );

        return redirect()->route('datapengeluaran.index')->with($notification);
        // if ($request->simpan == true) {
        //     return redirect()->route('datapengeluaran.index')->with($notification);
        // } else {
        //     return redirect()->route('datapengeluaran.create')->with($notification);
        // }
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
        $data['datapengeluaran'] = UangKeluar::findOrFail($id);
        return view('datapengeluaran.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datapengeluaran = UangKeluar::findOrFail($id);

        $validated = $request->validate([
            'tanggal' => 'required|max:255',
            'keterangan_pengeluaran' => 'required|max:255',
            'jumlah' => 'required|numeric',
        ]);

        UangKeluar::where('id', $id)->update($validated);

        
        $notification = array(
            'message' => "Data Uang keluar berhasil diedit!",
            'alert-type' => 'success'
        );

        $notifications = array(
            'message' => "Data Uang Keluar gagal diedit!",
            'alert-type' => 'error'
        );

        
        return redirect()->route('datapengeluaran.index')->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datapengeluaran = UangKeluar::findOrFail($id)->delete();

        
        $notification = array(
            'message' => "Data Uang Keluar berhasil dihapus!",
            'alert-type' => 'success'
        );

        $notifications = array(
            'message' => "Data Uang Keluar gagal dihapus!",
            'alert-type' => 'error'
        );


        return redirect()->route('datapengeluaran.index', $datapengeluaran)->with($notification);
    }
}
