<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
<script>
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const isDark = localStorage.getItem('theme') === 'dark';

        if (isDark) {
            document.documentElement.classList.add('dark');
        }

        const toggleDarkMode = () => {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        };

        const toggleButton = document.querySelector('#darkModeToggle');
        if (toggleButton) {
            toggleButton.addEventListener('click', toggleDarkMode);
        }
    });
</script>

    @include('layouts.head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body class="bg-gray-100 min-h-screen dark:bg-gray-900 text-black dark:text-white">
    <div class="flex flex-col md:flex-row">
        <aside class="w-72 bg-white shadow-md h-screen fixed transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-10 dark:bg-gray-800">
            @include('layouts.sidebar')
        </aside>

        <div class="flex-1 flex flex-col md:ml-72">
            <header class="sticky top-0 z-10 bg-white shadow-sm dark:bg-gray-800">
                @include('layouts.header')
            </header>

            <main class="flex-1 p-4 md:p-6 overflow-auto relative">
                @yield('alert')
                <div class="mt-2 md:mt-4">
                    @yield('content')
                </div>
            
            </main>
            {{-- <footer class="w-full text-gray-800 py-4 bg-transparent dark:text-gray-300 mt-auto">
                <div class="text-center">
                    <p class="text-sm">&copy; {{ date('Y') }} All rights reserved | Cette application est réalisée par Mohmmed El Abdellaoui</p>
                </div>
            </footer> --}}
        </div>
    </div>

    @include('layouts.scripts')
    
    <button class="md:hidden fixed bottom-4 right-4 bg-blue-500 text-white p-3 rounded-full shadow-lg z-20">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    @livewireScripts
</body>
</html>