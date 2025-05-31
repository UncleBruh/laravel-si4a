<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik', 9);
            $table->enum('kode_smt',['Ganjil', 'Genap']);
            $table->string('kelas', 9);                        
            $table->foreign('mata_kuliah_id')->constrained('matakuliahs')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('dosen_id')->constrained('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('sesi_id')->constrained('sesis')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();


        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
