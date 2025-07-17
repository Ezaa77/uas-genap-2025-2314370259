@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-yellow-400 flex flex-col justify-center items-center px-6">
    <h1 class="text-4xl md:text-6xl font-bold mb-4 text-center">Selamat Datang di <span class="text-yellow-500">LibraryArticle</span></h1>
    <p class="text-lg text-center text-yellow-300 mb-6 max-w-2xl">Temukan, baca, dan ekspresikan pendapatmu tentang artikel menarik dari berbagai kategori. Mulai sekarang!</p>
    <a href="{{ route('articles.index') }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-6 rounded-full transition duration-300">
        Lihat Artikel
    </a>
</div>
@endsection
