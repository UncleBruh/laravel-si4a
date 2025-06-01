<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\Matakuliah;
use App\Models\Sesi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = matakuliah::all();
        $sesi = Sesi::all();
        return view('jadwal.create',compact('matakuliah', 'sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->validate(
            [
                'tahun_akademik' => 'required',
                'kode_smt' => 'required',
                'kelas' => 'required',
                'mata_kuliah_id' => 'required',
                'sesi_id' => 'required'

            ]);

        //simpan data ke tabel fakultas
        jadwal::create($input);

        //redirect ke route fakultas.index
        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show( $jadwal)
    {
        $jadwal = jadwal::findOrFail($jadwal);
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        $matakuliah = Matakuliah::all();
        $sesi = Sesi::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliah', 'sesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal $jadwal)
    {
        $input = $request->validate(
            [
                'tahun_akademik' => 'required',
                'kode_smt' => 'required',
                'kelas' => 'required',
                'mata_kuliah_id' => 'required',
                'sesi_id' => 'required'
            ]);

        //update data ke tabel jadwal
        $jadwal->update($input);

        //redirect ke route jadwal.index
        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $jadwal)
    {
        $jadwal = Jadwal::findOrFail($jadwal);
        //hapus data jadwal
        $jadwal->delete();

        //redirect ke route jadwal.index
        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
