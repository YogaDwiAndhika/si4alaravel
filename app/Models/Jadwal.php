<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    use HasFactory;

    protected $fillable = [
        'tahun_akademik',
        'kode_smt',
        'kelas',
        'matakuliah_id',
        'dosen_id',
        'sesi_id',
        // tambahkan field lain jika ada
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }
}

