<?php
// app/Models/Komentar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';

    protected $fillable = [
        'situs_id',
        'user_id',
        'message',
    ];
    public function situs()
    {
        return $this->belongsTo(SitusBersejarah::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
