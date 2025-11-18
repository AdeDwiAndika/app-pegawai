<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-50">

    <div class="flex h-screen min-h-screen">
        <aside class="w-64 bg-white border-r border-gray-200 p-6 flex flex-col">
            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cloud text-white text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Pegawai Portal</h2>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 space-y-1">

                <a href="{{ route('pegawai.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all
                    {{ request()->routeIs('pegawai.dashboard')
                    ? 'bg-blue-50 text-blue-600 font-medium'
                    : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('pegawai.profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all
                    {{ request()->routeIs('pegawai.profile')
                    ? 'bg-blue-50 text-blue-600 font-medium'
                    : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i class="fas fa-user w-5"></i>
                    <span>Profil Saya</span>
                </a>

                <a href="{{ route('pegawai.attendance') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all
                    {{ request()->routeIs('pegawai.attendance')
                    ? 'bg-blue-50 text-blue-600 font-medium'
                    : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i class="fas fa-calendar-check w-5"></i>
                    <span>Absensi</span>
                </a>

                <a href="{{ route('pegawai.salary') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all
                    {{ request()->routeIs('pegawai.salary')
                    ? 'bg-blue-50 text-blue-600 font-medium'
                    : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <i class="fas fa-money-bill-wave w-5"></i>
                    <span>Slip Gaji</span>
                </a>

            </nav>


            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg transition-all">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="font-medium">Logout</span>
                </button>
            </form>

        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">

            <!-- Top Header -->
            <header class="bg-white border-b border-gray-200 px-8 py-4">
                <div class="flex items-center justify-between">
                    <h1>Dashboard Pegawai</h1>
                    <!-- User Profile -->
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-8 bg-gray-50 overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>