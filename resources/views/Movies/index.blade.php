@extends('layouts.app')

@section('title', 'Movies List')

@section('content')
<section class="container my-24 mx-auto px-6 lg:px-16">

  @if(session('success'))
  <div class="bg-purple-500 text-white p-4 rounded-lg mb-6 shadow-lg">
      {{ session('success') }}
  </div>
  @endif

  <!-- Header Section -->
  <div class="flex justify-between items-center px-4 lg:px-0 mb-8">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Movies List</h1>
    <a href="{{ route('movies.create') }}"
      class="text-white hover:text-white border border-purple-600 bg-purple-700 hover:bg-purple-500 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-full text-base font-medium px-6 py-2.5 shadow-md transition-all">
      Add Movie
    </a>
  </div>

  <!-- Movie List -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @forelse ($movies as $movie)
    <div class="relative border rounded-lg shadow-lg hover:shadow-xl transition-shadow bg-gradient-to-b from-purple-100 via-purple-200 to-purple-300 overflow-hidden">
      <!-- Poster -->
      <a href="{{ route('movies.show', $movie->id) }}" class="block">
        <img class="h-64 w-full object-cover"
          src="{{ $movie->poster ? asset('storage/' . $movie->poster) : 'https://via.placeholder.com/150' }}" 
          alt="{{ $movie->title }}">
      </a>

      <!-- Details -->
      <div class="absolute top-0 left-0 w-full bg-gradient-to-b from-white/75 via-white/50 to-transparent text-gray-800 dark:text-gray-300">
        <div class="flex justify-between items-center px-4 py-2">
          <p class="text-sm font-bold">{{ $movie->year }}</p>
          <p class="text-sm font-bold">
            {{ $movie->genre? $movie->genre->name : 'No Genre' }}
          </p>
        </div>
      </div>

      <div class="p-4">
        <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white truncate">{{ $movie->title }}</h5>
        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">
          Available: <span class="font-medium">{{ $movie->available ? 'Yes' : 'No' }}</span>
        </p>
        <div class="flex justify-between mt-4">
          <a href="{{ route('movies.show', $movie->id) }}"
            class="text-white bg-purple-500 hover:bg-purple-600 font-medium rounded-lg text-sm px-5 py-2 shadow transition-all">
            View
          </a>
        </div>
      </div>
    </div>
    @empty
    <!-- No Movies Found -->
    <div class="flex flex-col items-center justify-center h-96 w-full text-center">
      <div class="p-3 bg-blue-100 rounded-full dark:bg-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-12 h-12 text-blue-500">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
      </div>
      <h1 class="mt-4 text-xl font-bold text-gray-800 dark:text-white">No movies found</h1>
      <p class="mt-2 text-gray-500 dark:text-gray-400">We couldn't find any movies that matched your search.</p>
      <a href="{{ route('movies.create') }}"
        class="mt-6 px-5 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow-lg transition-all">
        Add a Movie
      </a>
    </div>
    @endforelse
  </div>

</section>
@endsection
