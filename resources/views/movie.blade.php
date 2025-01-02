<!-- resources/views/movie.blade.php -->
@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800">{{ $title }}</h1>
    <p class="mt-4 text-gray-600">{{ $description }}</p>
</div>
@endsection
