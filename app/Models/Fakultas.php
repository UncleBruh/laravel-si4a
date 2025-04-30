<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    public function prodi()
    {
        return $this->hasMany(Fakultas::class,'fakultas_id', 'id');
    }
}
