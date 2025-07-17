<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryArticle</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-black text-white font-sans min-h-screen">

    <!-- Navbar -->
    <nav class="bg-yellow-500 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-black hover:text-white transition">LibraryArticle</a>
            <div class="space-x-4">
                <a href="{{ route('articles.index') }}" class="text-black hover:text-white font-semibold transition">Beranda</a>
                <a href="{{ route('articles.create') }}" class="text-black hover:text-white font-semibold transition">Tambah Artikel</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8 px-4 sm:px-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-yellow-500 mt-12">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-black font-semibold">
            &copy; {{ date('Y') }} LibraryArticle. All rights reserved.
        </div>
    </footer>

</body>
</html>
