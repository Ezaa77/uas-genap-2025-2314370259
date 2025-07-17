@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-black min-h-screen text-yellow-300">

    <h1 class="text-3xl font-bold mb-6 border-b border-yellow-600 pb-2">✍️ Tulis Artikel Baru</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul Artikel</label>
            <input type="text" name="title" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-yellow-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Konten</label>
            <textarea name="content" rows="6" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-yellow-500" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Kategori</label>
            <select name="category_id" class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-yellow-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
            <input type="checkbox" name="is_publish" value="1" class="form-checkbox text-yellow-500"
               {{ old('is_publish', $article->is_publish ?? false) ? 'checked' : '' }}>
             <span class="ml-2">Terbitkan Artikel</span>
            </label>
        </div>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-6 rounded transition">
            Simpan Artikel
        </button>
    </form>
</div>
@endsection
