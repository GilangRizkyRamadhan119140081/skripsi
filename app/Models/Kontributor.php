<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontributor extends Model
{
    use HasFactory;

    protected $table = 'kontributors';

    protected $fillable = ['nama', 'email', 'alamat', 'no_telp'];
}
