<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Role extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
    ];

    // Tentukan primary key menggunakan UUID
    protected $keyType = 'string';
    public $incrementing = false;
}
