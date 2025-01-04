<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    // Menentukan tipe primary key
    protected $keyType = 'string';  // UUID sebagai primary key
    public $incrementing = false;   // Menonaktifkan auto-increment

    // Field yang dapat diisi (Mass Assignment)
    protected $fillable = [
        'id',
        'title',
        'synopsis',
        'poster',
        'year',
        'available',
        'genre_id',
    ];

    protected $casts = [
        'genre_id' => 'string',  // Pastikan genre_id adalah UUID (string)
        'available' => 'boolean',
        'year' => 'integer',
    ];

    protected $attributes = [
        'available' => true,
    ];

    // Relasi dengan Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);  // Relasi ke Genre (Many-to-One)
    }

    // Accessor untuk judul
    public function getTitleAttribute($value)
    {
        return ucfirst($value);  // Mengubah judul menjadi huruf kapital pertama
    }

    // Mutator untuk judul
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);  // Menyimpan judul dalam huruf kecil
    }

    // Scope untuk filter genre
    public function scopeFilterByGenre($query, $genreId)
    {
        return $query->where('genre_id', $genreId);  // Filter berdasarkan genre_id
    }

    // Scope untuk status tersedia
    public function scopeAvailable($query)
    {
        return $query->where('available', true);  // Filter hanya movie yang tersedia
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