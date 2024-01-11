<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasis';
    protected $primaryKey = 'id_informasi';
    public $incrementing = false;

    protected $fillable = [
        'id_informasi',
        'judul_informasi',
        'alamat_informasi',
        'gambar_informasi',
        'tanggal_informasi',
        'pemilik_informasi',
        'keterangan_informasi',
    ];
}
