<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

<body>
    <div class="flex justify-between items-center bg-transparent p-6">
        <h1 class="font-bold">@yield('page-title', 'App Pegawai')</h1>
        <header class="px-2 py-3 flex rounded-full justify-between bg-white shadow-md text-black">
            <nav class="flex justify-between items-center">
                <ul class="flex items-center gap-5">
                    <li><a href="{{ url('/employees') }}"
                            class="{{ request()->is('employees') ? 'bg-gray-900 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Employee</a>
                    </li>
                    <li><a href="{{ url('/departments') }}"
                            class="{{ request()->is('departments') ? 'bg-gray-900 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Department</a>
                    </li>
                    <li><a href="{{ url('/attendances') }}"
                            class="{{ request()->is('attendances') ? 'bg-gray-900 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Attendance</a>
                    </li>
                    <li><a href="{{ url('/salaries') }}"
                            class="{{ request()->is('salaries') ? 'bg-gray-900 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Salary</a>
                    </li>
                    <li><a href="{{ url('/positions') }}"
                            class="{{ request()->is('positions') ? 'bg-gray-900 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Position</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="">
            <i class="fa-solid"></i>
            <img src="" alt="">
        </div>
    </div>
    <main>
        @yield('content')
    </main>
    <footer>&copy; {{ date('Y') }} App Pegawai</footer>
</body>

</html>
