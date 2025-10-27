<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-+GQyb7kTjE8R3F0x+E3v4YcC9k2B6S5p8F7Fq+8A2VwLnb6x7O+jfYo2Z8fI6T1Yg0k8h5V6nMZL3q6zj5cYjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex justify-between items-center bg-transparent p-6 sticky top-0">
        <h1 class="font-bold">@yield('page-title', 'App Pegawai')</h1>
        <header
            class="px-2 py-3 flex rounded-full justify-between border border-gray-200 bg-white shadow-[0px_10px_28px_-11px_rgba(0,_0,_0,_0.1)] text-black">
            <nav class="flex justify-between items-center">
                <ul class="flex items-center gap-5">
                    <li><a href="{{ url('/employees') }}"
                            class="{{ request()->is('employees') ? 'bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Employee</a>
                    </li>
                    <li><a href="{{ url('/departments') }}"
                            class="{{ request()->is('departments') ? 'bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Department</a>
                    </li>
                    <li><a href="{{ url('/attendances') }}"
                            class="{{ request()->is('attendances') ? 'bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Attendance</a>
                    </li>
                    <li><a href="{{ url('/salaries') }}"
                            class="{{ request()->is('salaries') ? 'bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Salary</a>
                    </li>
                    <li><a href="{{ url('/positions') }}"
                            class="{{ request()->is('positions') ? 'bg-gradient-to-br from-green-800 via-green-700 to-green-500 text-white' : 'text-black hover:text-black'}} rounded-full px-3 py-2 text-sm font-medium">Position</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
                <button type="button"
                    class="relative rounded-full p-1 text-black hover:text-gray-600 focus:outline-2 focus:outline-offset-2 focus:outline-gray-200">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6">
                        <path
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <el-dropdown class="relative ml-3">
                    <button
                        class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                    </button>

                    <el-menu anchor="bottom end" popover
                        class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">Your
                            profile</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">Settings</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">Sign
                            out</a>
                    </el-menu>
                </el-dropdown>
            </div>
        </div>
    </div>
    <main>
        @yield('content')
    </main>

</body>

</html>
