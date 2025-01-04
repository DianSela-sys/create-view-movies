@extends('layouts.app')

@section('title', 'Tambah Movie')

@section('content')
<section class="container mx-auto py-12 px-6">
  <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-8">Tambah Movie</h1>
  <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data"
    class="w-full max-w-4xl mx-auto bg-gradient-to-r from-purple-100 via-purple-300 to-purple-500 rounded-lg shadow-lg p-8 dark:bg-gradient-to-r dark:from-purple-700 dark:to-purple-900">
    @csrf

    <!-- Title -->
    <div class="mb-6">
      <label for="title" class="block text-lg font-semibold text-gray-800 dark:text-gray-200">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title') }}"
        class="mt-2 block w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 p-3 text-lg placeholder-gray-500"
        placeholder="Enter movie title" required />
      @error('title')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Synopsis -->
    <div class="mb-6">
      <label for="synopsis" class="block text-lg font-semibold text-gray-800 dark:text-gray-200">Synopsis</label>
      <textarea id="synopsis" name="synopsis" rows="6"
        class="mt-2 block w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 p-3 text-lg placeholder-gray-500"
        placeholder="Write the movie synopsis here" required>{{ old('synopsis') }}</textarea>
      @error('synopsis')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Poster Image -->
    <div class="mb-6">
      <label for="poster" class="block text-lg font-semibold text-gray-800 dark:text-gray-200">Poster Image</label>
      <input type="file" id="poster" name="poster"
        class="mt-2 block w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 p-3 text-lg"
        accept="image/*" required />
      @error('poster')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Year -->
    <div class="mb-6">
      <label for="year" class="block text-lg font-semibold text-gray-800 dark:text-gray-200">Year</label>
      <input type="number" id="year" name="year" value="{{ old('year') }}"
        class="mt-2 block w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 p-3 text-lg"
        min="1900" max="2100" placeholder="Enter year" required />
      @error('year')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Available -->
    <div class="mb-6">
      <label for="available" class="block text-lg font-semibold text-gray-800 dark:text-gray-200">Available</label>
      <select id="available" name="available"
        class="mt-2 block w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 p-3 text-lg">
        <option value="1" {{ old('available') == 1 ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ old('available') == 0 ? 'selected' : '' }}>No</option>
      </select>
      @error('available')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Genre -->
    <div class="mb-6">
      <label for="genre_id" class="block text-lg font-semibold text-gray-800 dark:text-gray-200">Genre</label>
      <select id="genre_id" name="genre_id"
        class="mt-2 block w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 p-3 text-lg">
        <option value="" disabled {{ old('genre_id') ? '' : 'selected' }}>Pilih genre</option>
        @foreach ($genres as $genre)
        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
          {{ $genre->name }}
        </option>
        @endforeach
      </select>
      @error('genre_id')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Submit Button -->
    <div class="flex justify-between mb-6">
      <button type="submit"
        class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-semibold rounded-lg text-lg px-6 py-3 dark:bg-purple-500 dark:hover:bg-purple-600">
        Save
      </button>
      <a href="{{ route('movies.index') }}"
        class="text-white-700 bg-purple-200 hover:bg-purple-300 focus:ring-4 focus:outline-none focus:ring-purple-300 font-semibold rounded-lg text-lg px-6 py-3 dark:bg-purple-600 dark:hover:bg-purple-700">
        Cancel
      </a>
    </div>
  </form>
</section>
@endsection