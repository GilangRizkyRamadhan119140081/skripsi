<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['nama', 'email', 'password', 'role'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    const ROLE_SUPER_ADMIN = 0;
    const ROLE_ADMIN = 1;
    const ROLE_MODERATOR = 2;

    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isModerator()
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    public function updateAdmin(array $data)
    {
        $this->update($data);
    }
}
