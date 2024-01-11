<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;

    protected $table = 'formulirs';
    protected $primaryKey = 'id';
    protected $guarded = 'id';

    // protected $fillable = [
    //     'nama',
    //     'instansi',
    //     'email',
    //     'alamat',
    //     'nomor_hp',
    //     'jenis_keperluan',
    //     'keterangan',
    //     'surat_perizinan',
    //     'gambar',
    //     'status',
    //     'download',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
