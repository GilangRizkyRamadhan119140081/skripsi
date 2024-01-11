<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitusBersejarah extends Model
{
    use HasFactory;

    protected $table = 'situs_bersejarahs';
    protected $primaryKey = 'id_situs';
    public $incrementing = false;
    protected $guarded = ['id_situs'];

    // protected $fillable = [
    //     'id_situs',
    //     'user_id',
    //     'nama_situs',
    //     'gambar_situs',
    //     'alamat_situs',
    //     'tanggal_berdiri_situs',
    //     'pemilik_situs',
    //     'jenis_situs',
    //     'status_situs',
    //     'keterangan_situs',
    // ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function getAllDataForPDF()
    {
        return static::all();
    }
    // public function comments()
    // {
    //     return $this->hasMany(Komentar::class);
    // }
}
