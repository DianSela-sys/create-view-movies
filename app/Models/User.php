<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // Tambahkan untuk UUID

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids; // Aktifkan UUID jika menggunakan UUID

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Jika menggunakan UUID
    protected $keyType = 'string';
    public $incrementing = false; // Non-auto-increment
}
