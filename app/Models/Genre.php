<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Menentukan tabel terkait
    protected $table = 'genres';

    // Mengatur field yang dapat diisi (Mass Assignment)
    protected $fillable = [
        'name',
    ];

    // Menentukan bahwa kolom id adalah string (UUID)
    protected $keyType = 'string';  // Mengubah tipe key menjadi string
    public $incrementing = false;   // Menonaktifkan auto-increment

    /**
     * Relasi dengan Movie (One-to-Many)
     * Sebuah Genre memiliki banyak Movies
     */
    public function movies()
    {
        return $this->hasMany(Movie::class); // Menghubungkan dengan model Movie
    }
}
