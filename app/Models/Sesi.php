<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    protected $table = 'sesi';

    protected $fillable = ['nama'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}