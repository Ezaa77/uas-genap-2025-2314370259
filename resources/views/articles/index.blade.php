@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 bg-white text-gray-800 min-h-screen animate-fadeIn">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-red-700 flex items-center gap-2">
            <i class="fas fa-newspaper text-red-600 animate-pulse"></i> DAFTAR TERTULIS
        </h1>
        <a href="{{ route('articles.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow transition duration-200">
            + Tambah Artikel
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-3 px-6 text-left">Judul</th>
                    <th class="py-3 px-6 text-left">Kategori</th>
                    <th class="py-3 px-6 text-left">Status</th>
                    <th class="py-3 px-6 text-left">Like</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @forelse($articles as $article)
                <tr class="hover:bg-gray-100 transition">
                    <td class="py-3 px-6 font-medium">{{ $article->title }}</td>
                    <td class="py-3 px-6">{{ $article->category->name ?? '-' }}</td>
                    <td class="py-3 px-6">
                        @if($article->is_publish)
                            <span class="bg-green-200 text-green-800 px-3 py-1 text-xs rounded-full">Published</span>
                        @else
                            <span class="bg-yellow-200 text-yellow-800 px-3 py-1 text-xs rounded-full">Draft</span>
                        @endif
                    </td>
                    <td class="py-3 px-6">❤️ {{ $article->likes_count ?? 0 }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-500 italic">Belum ada artikel.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
