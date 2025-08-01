<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARTICLEBOT</title>

    <!-- Tailwind & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Animasi dan Font -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom right, #f5f5f5, #dcdcdc);
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out both;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .interactive-block {
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 9999px;
            filter: blur(80px);
            opacity: 0.3;
            z-index: 0;
        }

        .red-bubble {
            background-color: #ef4444;
            top: 10%;
            left: 5%;
        }

        .gray-bubble {
            background-color: #9ca3af;
            bottom: 15%;
            right: 10%;
        }

        .white-bubble {
            background-color: #fefefe;
            top: 45%;
            right: 30%;
        }
    </style>
</head>
<body class="relative text-gray-800 min-h-screen flex flex-col justify-between overflow-x-hidden">

    <!-- Interaktif Latar -->
    <div class="interactive-block red-bubble"></div>
    <div class="interactive-block gray-bubble"></div>
    <div class="interactive-block white-bubble"></div>

    <!-- Navbar -->
    <nav class="bg-white bg-opacity-90 shadow-lg z-10 relative">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-red-600 hover:text-gray-800 transition-all">ARTICLEBOT</a>
            <div class="space-x-6">
                <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Beranda</a>
                <a href="{{ route('articles.create') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Tambah Artikel</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 fade-in px-4 sm:px-8 py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white bg-opacity-90 text-center py-4 text-gray-600 text-sm z-10 relative font-medium">
        &copy; {{ date('Y') }} ARTICLEBOT. All rights reserved.
    </footer>

</body>
</html>
