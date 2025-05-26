<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    use HasFactory;

    protected $fillable = [
        'npm',
        'nama',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sma',
        'prodi_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
