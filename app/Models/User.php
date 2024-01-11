<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'role'];

    const ROLE_USER = 1;
    const ROLE_KONTRIBUTOR = 2;
    const ROLE_ADMIN = 3;

    public function isUser()
    {
        return $this->role === self::ROLE_USER;
    }

    public function isKontributor()
    {
        return $this->role === self::ROLE_KONTRIBUTOR;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function updateUser(array $data)
    {
        $this->update($data);
    }
    public function formulirs()
    {
        return $this->hasMany(Formulir::class);
    }
}
