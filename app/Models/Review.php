<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating', 'user_id', 'movie_id'];

    // Set the ID to use UUIDs
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string'; // Set the key type to string for UUID

    // Automatically generate UUID when creating new review
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid(); // Generate UUID for ID if not set
            }
        });
    }
}
