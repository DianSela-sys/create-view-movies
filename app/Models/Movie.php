<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'synopsis',
        'poster',
        'year',
        'available',
        'genre_id'
    ];

    protected $casts = [
        'genre_id' => 'integer',
        'available' => 'boolean',
        'year' => 'integer',
    ];

    protected $attributes = [
        'available' => true,
    ];

    // Relasi dengan Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Validasi request
    public static function validate($request)
    {
        return $request->validate([
            'title'     => 'required|string|max:255',
            'synopsis'  => 'nullable|string',
            'poster'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'year'      => 'required|integer|min:1900|max:' . date('Y'),
            'available' => 'required|boolean',
            'genre_id'  => 'required|exists:genres,id',
        ]);
    }
}
