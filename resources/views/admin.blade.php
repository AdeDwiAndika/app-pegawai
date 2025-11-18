<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen text-white bg-slate-900">
    <div class="flex">
        <!-- Sidebar -->
        <aside
            class="w-64 min-h-screen bg-gray-900/80 backdrop-blur-lg border-r border-white/10 p-6 fixed left-0 top-0">
            <div class="mb-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cloud text-white text-xl"></i>
                    </div>
                    <h2 class="text-xl w-min font-bold text-white">Management Pegawai</h2>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="{{ url('admin/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('admin/dashboard') ? 'text-white bg-blue-500/20 border-l-4 border-blue-500' : 'text-gray-300 hover:bg-blue-500/10' }}">
                    <i class="fas fa-home w-5"></i>
                    <span>Home</span>
                </a>
                <a href="{{ url('/employees') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('employees') ? 'text-white bg-blue-500/20 border-l-4 border-blue-500' : 'text-gray-300 hover:bg-blue-500/10' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Employee</span>
                </a>
                <a href="{{ url('/departments') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('departments') ? 'text-white bg-blue-500/20 border-l-4 border-blue-500' : 'text-gray-300 hover:bg-blue-500/10' }}">
                    <i class="fas fa-building w-5"></i>
                    <span>Department</span>
                </a>
                <a href="{{ url('/attendances') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('attendances') ? 'text-white bg-blue-500/20 border-l-4 border-blue-500' : 'text-gray-300 hover:bg-blue-500/10' }}">
                    <i class="fas fa-calendar-check w-5"></i>
                    <span>Attendance</span>
                </a>
                <a href="{{ url('/salaries') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('salaries') ? 'text-white bg-blue-500/20 border-l-4 border-blue-500' : 'text-gray-300 hover:bg-blue-500/10' }}">
                    <i class="fas fa-money-check-alt w-5"></i>
                    <span>Salary</span>
                </a>
                <a href="{{ url('/positions') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('positions') ? 'text-white bg-blue-500/20 border-l-4 border-blue-500' : 'text-gray-300 hover:bg-blue-500/10' }}">
                    <i class="fas fa-briefcase w-5"></i>
                    <span>Position</span>
                </a>
            </nav>

            <div class="absolute bottom-6 left-6 right-6 space-y-2">
                <form method="POST" action="{{ route('logout')}}" class="transition-all hover:bg-red-500/10 rounded-lg">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-500">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Sign out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <!-- Header -->
            <header class="sticky top-0 bg-slate-900 z-10 px-8 py-6">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">@yield('page-title', 'App Pegawai')</h1>

                    <div class="flex items-center gap-4">
                        <!-- Search akan diisi dari masing-masing halaman -->
                        @yield('search-form')

                        <!-- Profile dropdown -->
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="px-8 py-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>
