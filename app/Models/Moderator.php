<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class Moderator extends Model
{
    use HasFactory;

    protected $table = 'moderators';
    protected $fillable = ['nama', 'email', 'alamat', 'no_telp'];
}
