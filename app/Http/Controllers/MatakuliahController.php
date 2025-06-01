<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use App\Models\Prodi;
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
        $prodi = Prodi::all();
        return view('matakuliah.create', compact('prodi'))->with('success', 'Fakultas berhasil ditambahkan');;
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
                'kode_mk' => 'required',
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
    public function show($matakuliah)
    {
        $matakuliah = matakuliah::findOrFail($matakuliah);
        //dd($matakuliah);
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(matakuliah $matakuliah)
    {
        $prodi = prodi::all();
        return view('matakuliah.edit', compact('matakuliah', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, matakuliah $matakuliah)
    {
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);
        $matakuliah->update($input);

        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $matakuliah)
    {
         $matakuliah = matakuliah ::findOrFail($matakuliah);
        //dd($prodi);

        //hapus data fakults
        $matakuliah -> delete();

        //redirect ke route fakultas index
        return redirect()->route('matakuliah.index')->with('success','Mata Kuliah berhasil dihapus');
    }
}
