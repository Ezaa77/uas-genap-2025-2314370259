@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 min-h-screen bg-gray-100 text-gray-800 animate-fadeIn">
    <h1 class="text-3xl font-bold mb-6 border-b border-red-500 pb-2">✏️ Edit Artikel</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Judul Artikel</label>
            <input type="text" name="title" value="{{ old('title', $article->title) }}" class="px-4 py-2 rounded bg-white text-gray-800 border border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>

        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Konten</label>
            <textarea name="content" rows="5" class="px-4 py-2 rounded bg-white text-gray-800 border border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Kategori</label>
            <select name="category_id" class="px-4 py-2 rounded bg-white text-gray-800 border border-red-300 focus:outline-none focus:ring-2 focus:ring-red-400">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-2">Status</label>
            <div class="flex items-center gap-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="is_publish" value="1" {{ $article->is_publish ? 'checked' : '' }} class="text-red-500 focus:ring-red-400">
                    <span class="ml-2">Published</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="is_publish" value="0" {{ !$article->is_publish ? 'checked' : '' }} class="text-red-500 focus:ring-red-400">
                    <span class="ml-2">Draft</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('articles.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded shadow transition transform hover:scale-105">
                Update Artikel
            </button>
        </div>
    </form>
</div>
@endsection