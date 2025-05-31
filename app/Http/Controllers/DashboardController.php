<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::select('
        SELECT prodi.nama, COUNT(*) as Jumlah 
        FROM `mahasiswa`
        JOIN prodi on mahasiswa.prodi_id = prodi.id
        GROUP BY prodi.nama
        ');
        //dd ($mahasiswaprodi);
        return view('dashboard.index', compact('mahasiswaprodi'));
    }
}
