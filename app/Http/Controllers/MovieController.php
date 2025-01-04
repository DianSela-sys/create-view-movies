<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    // Menampilkan semua movie
    public function index(Request $request)
    {
        $genres = Genre::all();

        // Filter berdasarkan genre jika ada request genre_id
        $movies = Movie::when($request->genre_id, function ($query) use ($request) {
            return $query->where('genre_id', $request->genre_id);
        })->get();

        return view('movies.index', compact('movies', 'genres'));
    }

    // Menampilkan form untuk menambah movie baru
    public function create()
    {
        // Mengambil semua genre dari database
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    // Menyimpan data movie baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:movies,title', // Pastikan judul unik
            'synopsis' => 'required|string|min:10', // Minimal 10 karakter untuk sinopsis
            'poster' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:10240', // Validasi ekstensi dan ukuran file
            'year' => 'required|integer|min:1800|max:' . date('Y'),
            'available' => 'nullable|boolean', // Validasi nullable dan boolean
            'genre_id' => 'required|exists:genres,id', // Pastikan genre valid
        ]);

        // Upload file poster
        $posterPath = $request->file('poster')->store('posters', 'public'); // Folder 'posters' di storage/public

        // Simpan data ke database
        $movie = Movie::create([
            'id' => Str::uuid(),
            'title' => $validated['title'],
            'synopsis' => $validated['synopsis'],
            'poster' => $posterPath, // Simpan path poster
            'year' => $validated['year'],
            'available' => $validated['available'] ?? true, // Set default `true` jika `available` tidak diisi
            'genre_id' => $validated['genre_id'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    // Menampilkan detail movie
    public function show($id)
    {
        // Mengambil movie berdasarkan ID dengan eager loading untuk genre
        $movie = Movie::with('genre')->find($id);

        // Jika movie tidak ditemukan, redirect dengan pesan error
        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        // Tampilkan halaman detail movie
        return view('movies.show', compact('movie'));
    }

    // Menampilkan form edit movie
    public function edit($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::all();

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        return view('movies.edit', compact('movie', 'genres'));
    }

    // Update movie yang ada
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:movies,title,' . $movie->id,
            'synopsis' => 'required|string|min:10',
            'poster' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:10240',
            'year' => 'required|integer|min:1800|max:' . date('Y'),
            'available' => 'nullable|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Update poster jika ada file baru
        if ($request->hasFile('poster')) {
            // Hapus poster lama
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster = $posterPath;
        }

        // Update data lainnya
        $movie->update([
            'title' => $validated['title'],
            'synopsis' => $validated['synopsis'],
            'year' => $validated['year'],
            'available' => $validated['available'] ?? $movie->available,
            'genre_id' => $validated['genre_id'],
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    // Menghapus movie
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found.');
        }

        // Hapus poster dari storage
        if ($movie->poster) {
            Storage::disk('public')->delete($movie->poster);
        }

        // Hapus movie dari database
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
