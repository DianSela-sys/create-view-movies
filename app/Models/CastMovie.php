<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastMovie extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa diisi
    protected $fillable = ['movie_id', 'cast_id'];

    /**
     * Relasi ke model Movie
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }

    /**
     * Relasi ke model Cast
     */
    public function casts()
    {
        return $this->belongsTo(Casts::class, 'cast_id', 'id');
    }
}
