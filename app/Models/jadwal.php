<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
   protected $table = 'jadwal'; 

    protected $fillable = [
        'tahun_akademik',
        'kode_smt',
        'kelas',
        'dosen_id',
        'sesi_id',
        'mata_kuliah_id',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(Matakuliah::class); 
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}