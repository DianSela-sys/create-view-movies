@extends('layouts.app')

@section('title', 'Detail Movie')

@section('content')
<section class="container mx-auto py-12 px-6">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 dark:bg-gray-800 dark:border-gray-700">
        <!-- Title -->
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">Detail Movie</h1>

        <!-- Movie Poster -->
        <div class="mb-6">
            <img class="h-80 w-full object-cover rounded-t-lg"
                src="{{ $movie->poster ? asset('storage/' . $movie->poster) : 'https://via.placeholder.com/150' }}"
                alt="{{ $movie->title }}">
        </div>

        <!-- Movie Details -->
        <div class="space-y-4">
            <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Title:</strong> {{ $movie->title }}</p>
            <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Synopsis:</strong> {{ $movie->synopsis }}</p>
            <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Year:</strong> {{ $movie->year }}</p>

            <!-- Genre: Jika ada, tampilkan nama genre -->
            <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Genre:</strong> 
                @if($movie->genre)
                    {{ $movie->genre->name }} <!-- Menampilkan nama genre yang sesuai -->
                @else
                    No Genre
                @endif
            </p>

            <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Available:</strong> {{ $movie->available ? 'Yes' : 'No' }}</p>
        </div>

        <!-- Back Button -->
        <div class="mt-6 flex justify-center">
            <a href="{{ route('movies.index') }}"
                class="inline-block px-6 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg">
                Back
            </a>
        </div>
    </div>
</section>
@endsection
