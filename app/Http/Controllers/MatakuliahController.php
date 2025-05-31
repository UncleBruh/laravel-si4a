<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliah = matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        //validasi input
        $input = $request->validate(
            [
                'nama' => 'required',
                'kode' => 'required|unique:matakuliah',
                'prodi_id' => 'required'

            ]);

        //simpan data ke tabel fakultas
        matakuliah::create($input);

        //redirect ke route fakultas.index
        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(matakuliah $matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, matakuliah $matakuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(matakuliah $matakuliah)
    {
        //
    }
}
