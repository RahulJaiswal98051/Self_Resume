<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> {{-- Bootstrap/Tailwind --}}
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-indigo-800 text-white">
            <div class="text-2xl font-bold p-6 border-b border-indigo-600">Dashboard</div>
            <nav class="px-4">
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ url('/dashboard') }}" class="block px-2 py-2 hover:bg-indigo-700 rounded">🏠 Dashboard</a></li>
                    <li><a href="{{ route('resumes.index') }}" class="block px-2 py-2 hover:bg-indigo-700 rounded">📄 Resumes</a></li>
                    <li><a href="{{ route('education.index') }}" class="block px-2 py-2 hover:bg-indigo-700 rounded">🎓 Education</a></li>
                    <li><a href="{{ route('personal.index') }}" class="block px-2 py-2 hover:bg-indigo-700 rounded">👤 Personal Details</a></li>
                    <li><a href="#" class="block px-2 py-2 hover:bg-indigo-700 rounded">👥 Users Management</a></li>
                    <li><a href="#" class="block px-2 py-2 hover:bg-indigo-700 rounded">⚙️ Settings</a></li>
                    <li class="nav-item">
    <a class="nav-link" href="{{ route('personal.index') }}">
        <i class="fas fa-id-card"></i>
        <span>Personal Details</span>
    </a>
</li>

                </ul>
            </nav>
        </aside>

        {{-- Main --}}
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
            </div>

            @yield('content')
        </main>
    </div>

</body>
</html>

