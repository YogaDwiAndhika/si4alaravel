<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();$table->string('tahun_akademik', 9); // Format: YYYY/YY
            $table->string('kode_smt', 10);
            $table->string('kelas', 50);
            $table->foreignId('matakuliah_id')->constrained('matakuliah')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('dosen_id')->constrained('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('sesi_id')->constrained('sesi')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
};
