<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = ['nama', 'kode_mk', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
