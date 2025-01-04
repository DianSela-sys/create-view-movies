@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
<section class="container my-24 mx-auto px-6 lg:px-16">

  @if ($errors->any())
  <div class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-lg">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Edit Movie</h1>

  <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" 
        class="rounded-lg shadow-lg p-8" 
        style="background: linear-gradient(135deg, #e0d4fc, #f7f5ff);">
      @csrf
      @method('PUT')

      <!-- Title -->
      <div class="mb-6">
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" 
              class="block w-full px-4 py-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
      </div>

      <!-- Synopsis -->
      <div class="mb-6">
          <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
          <textarea id="synopsis" name="synopsis" rows="5"
              class="block w-full px-4 py-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
      </div>

      <!-- Year -->
      <div class="mb-6">
          <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
          <input type="number" id="year" name="year" value="{{ old('year', $movie->year) }}" 
              class="block w-full px-4 py-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
      </div>

      <!-- Genre -->
      <div class="mb-6">
          <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
          <select id="genre_id" name="genre_id" 
              class="block w-full px-4 py-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500">
              <option value="">Select Genre</option>
              @foreach($genres as $genre)
              <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                  {{ $genre->name }}
              </option>
              @endforeach
          </select>
      </div>

      <!-- Poster -->
      <div class="mb-6">
            <label for="poster" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poster</label>
            <input type="file" id="poster" name="poster"
                class="block w-full px-4 py-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500">
            
            @if($movie->poster)
            <p class="mt-2 text-sm text-gray-500">Current Poster:</p>
            <img src="{{ asset('storage/' . $movie->poster) }}" 
                alt="Poster" 
                class="mt-2 rounded-lg shadow-md"
                style="max-width: 200px; max-height: 300px; object-fit: cover;">
            @endif
        </div>

      <!-- Available -->
      <div class="mb-6">
          <label for="available" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Available</label>
          <select id="available" name="available" 
              class="block w-full px-4 py-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500">
              <option value="1" {{ $movie->available ? 'selected' : '' }}>Yes</option>
              <option value="0" {{ !$movie->available ? 'selected' : '' }}>No</option>
          </select>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end">
          <button type="submit" 
              class="text-white bg-purple-500 hover:bg-purple-600 font-medium rounded-lg text-sm px-6 py-2.5 shadow-lg transition-all">
              Update Movie
          </button>
      </div>
  </form>

</section>
@endsection
