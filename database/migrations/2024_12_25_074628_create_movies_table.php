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
        Schema::create('movies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 255); // Judul film
            $table->text('synopsis')->nullable(); // Sinopsis, opsional
            $table->string('poster', 255)->nullable(); // URL poster film
            $table->char('year', 4); // Tahun rilis (4 karakter)
            $table->boolean('available')->default(true); // Ketersediaan film (default: tersedia)

            // Menggunakan UUID untuk genre_id
            $table->uuid('genre_id'); // Foreign key dari tabel genres
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade'); // Constraint dengan cascade delete

            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies'); // Menghapus tabel movies jika rollback
    }
};
