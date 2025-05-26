<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model fakultas dmenggunakan eloquent
        $fakultas = Fakultas ::all(); // perintah sql select * from fakultas
        //dd($fakultas); // dump and die
        return view('fakultas.index', compact('fakultas')); // selain compact bisa menggunakan with()

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all(); // ambil semua data prodi
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' =>'required',
            'wakil_dekan' => 'required'
        ]);
        //simpan data ke tabel fakultas
        Fakultas::create($input);

        //redirect ke route fakultas index
        return redirect()->route('fakultas.index')->with('success','fakultas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show( $fakultas)
    {
        $fakultas = Fakultas ::findOrFail($fakultas);
        //dd($fakultas);
        return view('fakultas.show', compact('fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        return view('fakultas.edit', compact('fakultas'));    
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        $input=$request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' =>'required',
            'wakil_dekan' => 'required'
        ]);
        //simpan data ke tabel fakultas
        Fakultas::create($input);

        //redirect ke route fakultas index
        return redirect()->route('fakultas.index')->with('success','fakultas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        $fakultas = Fakultas ::findOrFail($fakultas);
        //dd($fakultas);

        //hapus data fakults
        $fakultas -> delete();

        //redirect ke route fakultas index
        return redirect()->route('fakultas.index')->with('success','Fakultas berhasil dihapus');
    }
}
