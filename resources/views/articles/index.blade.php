@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 text-yellow-300 bg-black min-h-screen">

    <div class="flex justify-between items-center mb-6 border-b border-yellow-500 pb-2">
        <h1 class="text-3xl font-bold">📚 Daftar Artikel</h1>
        <a href="{{ route('articles.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg font-semibold">
            + Tambah Artikel
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-600 text-white p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
        <table class="w-full table-auto text-sm">
            <thead class="bg-yellow-700 text-black">
                <tr>
                    <th class="px-4 py-2 text-left">Judul</th>
                    <th class="px-4 py-2 text-left">Kategori</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Like</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-yellow-700">
                @forelse($articles as $article)
                <tr class="hover:bg-yellow-800 hover:text-black transition">
                    <td class="px-4 py-2 font-semibold">{{ $article->title }}</td>
                    <td class="px-4 py-2">{{ $article->category->name ?? '-' }}</td>
                    <td class="px-4 py-2">
                        @if($article->is_publish)
                            <span class="bg-green-500 text-black px-2 py-1 text-xs rounded-full">Published</span>
                        @else
                            <span class="bg-red-500 text-black px-2 py-1 text-xs rounded-full">Draft</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        ❤️ {{ $article->likes_count ?? 0 }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-yellow-400 italic">Belum ada artikel.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
