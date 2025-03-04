<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans'; // Pastikan sesuai dengan nama tabel

    protected $fillable = [
        'judul','jenis', 'dasar', 'urgensi', 'perubahan', 'instalasi', 'pemohon', 'kepala_instalasi', 'kontak'
    ];
}

