<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cast_movies', function (Blueprint $table) {
            $table->uuid('id')->primary();  // UUID sebagai primary key
            $table->uuid('movie_id');       // UUID untuk movie_id
            $table->uuid('cast_id');        // UUID untuk cast_id
        
            // Foreign key movie_id -> movies.id
            $table->foreign('movie_id')
                  ->references('id')->on('movies')
                  ->onDelete('cascade')     // Cascade on delete
                  ->onUpdate('cascade');    // Cascade on update
        
            // Foreign key cast_id -> casts.id
            $table->foreign('cast_id')
                  ->references('id')->on('casts')
                  ->onDelete('cascade')     // Cascade on delete
                  ->onUpdate('cascade');    // Cascade on update
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_movies'); // Menghapus tabel jika rollback
    }
};
