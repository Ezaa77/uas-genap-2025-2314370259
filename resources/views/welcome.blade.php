@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 text-red-700 px-6 py-12 animate-fadeIn">
    <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-4 tracking-tight">
            <i class="fas fa-fire text-red-600 animate-bounce"></i> ARTICLEBOT
        </h1>
        <p class="text-lg text-gray-600">Baca dan ekspresikan ide cemerlangmu melalui artikel.</p>
        <a href="{{ route('articles.index') }}"
           class="mt-6 inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-300 transform hover:-translate-y-1">
            Lihat Artikel
        </a>
    </div>
</div>
@endsection
