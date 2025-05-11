<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <script>
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }

            const locale = '{{ app()->getLocale() }}';
            document.documentElement.setAttribute('dir', locale === 'ar' ? 'rtl' : 'ltr');
        })();
    </script>

    @livewireStyles
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}

    @include('layouts.head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body x-data="{
    sidebarToggle: false,
    init() {
        // Initialize sidebar state from localStorage
        const storedState = localStorage.getItem('sidebar_colaps');
        if (storedState !== null) {
            this.$store.sidebar.colaps = storedState === 'true';
        }
    }
}" class="bg-gray-100 min-h-screen dark:bg-gray-900 text-black dark:text-white">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <aside x-ref="sidebar"
            :class="{
                'translate-x-0': sidebarToggle,
                'translate-x-full': !sidebarToggle && $store.app.isRtl,
                '-translate-x-full': !sidebarToggle && !$store.app.isRtl,
                'right-0': $store.app.isRtl,
                'left-0': !$store.app.isRtl
            }"
            class="w-72 bg-white shadow-md h-screen fixed transition-transform duration-300 z-20 transform md:translate-x-0 dark:bg-gray-800">
            @include('layouts.sidebar')
        </aside>

        @php
            $isRtl = app()->getLocale() === 'ar';
            $sidebarCollapsed = session('sidebar_colaps', true);
            $contentSpacing = $isRtl
                ? ($sidebarCollapsed
                    ? 'md:mr-72'
                    : 'md:mr-16')
                : ($sidebarCollapsed
                    ? 'md:ml-72'
                    : 'md:ml-16');
        @endphp

        <div x-ref="mainContent"
            class="content-container flex-1 w-full flex flex-col transition-all duration-300 overflow-hidden {{ $contentSpacing }}"
            :class="{
                'md:ml-72': $store.sidebar.colaps && !$store.app.isRtl,
                'md:mr-72': $store.sidebar.colaps && $store.app.isRtl,
                'md:ml-16': !$store.sidebar.colaps && !$store.app.isRtl,
                'md:mr-16': !$store.sidebar.colaps && $store.app.isRtl
            }">
            <!-- header -->
            <header class="sticky top-0 z-10 bg-white shadow-sm dark:bg-gray-800 w-full">
                @include('layouts.header')
            </header>

            <!-- Content -->
            <main class="flex-1 p-4 md:p-6 overflow-auto relative w-full">
                @yield('alert')
                <div class="mt-2 md:mt-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <button @click="sidebarToggle = !sidebarToggle"
        class="md:hidden fixed bottom-4 right-4 bg-gray-800 text-white p-3 rounded-full shadow-lg z-30">
        <svg x-show="!sidebarToggle" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="sidebarToggle" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('app', {
                isRtl: '{{ app()->getLocale() }}' === 'ar',
                setRtl(isRtl) {
                    this.isRtl = isRtl;
                    document.documentElement.setAttribute('dir', isRtl ? 'rtl' : 'ltr');
                }
            });

            Alpine.store('sidebar', {
                colaps: localStorage.getItem('sidebar_colaps') !== 'false',
                toggle() {
                    this.colaps = !this.colaps;
                    localStorage.setItem('sidebar_colaps', this.colaps);

                    fetch('/sync-sidebar-state', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            sidebar_colaps: this.colaps
                        })
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
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

    @include('layouts.scripts')
    @livewireScripts
</body>

</html>
