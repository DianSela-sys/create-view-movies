<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casts extends Model
{
    use HasFactory;

    // Specify the table if the table name is different from the plural form of the model name
    protected $table = 'casts';

    // Specify the primary key if you're using UUID instead of auto-incrementing integers
    protected $primaryKey = 'id';

    // Set the primary key type to 'string' since we're using UUID
    protected $keyType = 'string';

    // Disable auto-incrementing for the primary key as we are using UUID
    public $incrementing = false;

    // Allow mass assignment for the following fields
    protected $fillable = ['name', 'age', 'biodata', 'avatar'];

    // Define the many-to-many relationship with Movie model
    public function movies()
    {
        // Define the relationship using a pivot table 'cast_movies'
        return $this->belongsToMany(Movie::class, 'cast_movies');
    }
}
