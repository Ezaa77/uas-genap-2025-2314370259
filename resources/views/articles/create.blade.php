@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 min-h-screen bg-gray-100 text-gray-800 animate-fadeIn">

    <h1 class="text-3xl font-bold mb-6 border-b border-red-500 pb-2">📝 Tulis Artikel Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" class="space-y-5">
        @csrf

        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Judul Artikel</label>
            <input type="text" name="title" class="px-4 py-2 rounded bg-white text-gray-800 border border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>

        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Konten</label>
            <textarea name="content" rows="5" class="px-4 py-2 rounded bg-white text-gray-800 border border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400" required></textarea>
        </div>

        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Kategori</label>
            <select name="category_id" class="px-4 py-2 rounded bg-white text-gray-800 border border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_publish" value="1" class="form-checkbox text-red-500 focus:ring-red-400"
                {{ old('is_publish', $article->is_publish ?? false) ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Terbitkan Artikel</span>
            </label>
        </div>

        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded shadow transition transform hover:scale-105">
            Simpan Artikel
        </button>
    </form>
</div>
@endsection