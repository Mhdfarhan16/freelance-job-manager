<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div x-data="{ sidebarOpen: true }" class="flex">

        <!-- SIDEBAR -->
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
            class="h-screen bg-gradient-to-b from-blue-600 via-blue-700 to-indigo-700 text-white fixed flex flex-col p-5 shadow-2xl transition-all duration-300 z-50">

            <!-- Header with Logo -->
            <div class="mb-8 flex items-center justify-center">
                <template x-if="sidebarOpen">
                    <div class="flex items-center justify-between w-full">
                        <div class="text-2xl font-bold whitespace-nowrap">
                            JobManager
                        </div>
                        <button @click="sidebarOpen = false"
                            class="p-2 rounded-lg hover:bg-white/20 transition-all duration-200 hover:scale-110 flex-shrink-0">
                            <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                        </button>
                    </div>
                </template>
                <template x-if="!sidebarOpen">
                    <button @click="sidebarOpen = true"
                        class="p-2 rounded-lg hover:bg-white/20 transition-all duration-200 hover:scale-110">
                        <svg class="w-6 h-6 transition-transform duration-300 rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                    </button>
                </template>
            </div>

            <!-- Navigation -->
            <nav class="flex flex-col gap-2 flex-1">
                <a href="/jobs"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-white/20 transition-all duration-200 group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300">
                    </div>
                    <svg class="w-6 h-6 flex-shrink-0 relative z-10" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'"
                        class="font-medium transition-all duration-200 whitespace-nowrap relative z-10">
                        Jobs
                    </span>
                    <!-- Tooltip untuk collapsed state -->
                    <div x-show="!sidebarOpen"
                        class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                        Jobs
                    </div>
                </a>

                <a href="/profile"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-white/20 transition-all duration-200 group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300">
                    </div>
                    <svg class="w-6 h-6 flex-shrink-0 relative z-10" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'"
                        class="font-medium transition-all duration-200 whitespace-nowrap relative z-10">
                        Profile
                    </span>
                    <div x-show="!sidebarOpen"
                        class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                        Profile
                    </div>
                </a>

                <!-- Decorative Card (Hidden when collapsed) -->
                <div x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    class="mt-auto mb-4 p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20">
                    <div class="text-xs text-blue-200 mb-2">💼 Freelance Manager</div>
                    <div class="text-sm">Kelola proyek dengan mudah</div>
                </div>
            </nav>

            <!-- Logout Button -->
            <form method="POST" action="/logout" class="mt-auto">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-red-500/30 transition-all duration-200 group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-red-500/20 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300">
                    </div>
                    <svg class="w-6 h-6 flex-shrink-0 relative z-10" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0'"
                        class="font-medium transition-all duration-200 whitespace-nowrap relative z-10">
                        Logout
                    </span>
                    <div x-show="!sidebarOpen"
                        class="absolute left-full ml-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                        Logout
                    </div>
                </button>
            </form>

            <!-- Decorative Element -->
            <div
                class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-indigo-900/50 to-transparent pointer-events-none">
            </div>
        </aside>

        <!-- MAIN WRAPPER -->
        <div :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="flex-1 transition-all duration-300">

            <!-- TOP NAVIGATION BAR (TOPBAR) -->
            <header x-data="{ open: false }"
                class="bg-white/80 backdrop-blur-md border-b border-blue-100 sticky top-0 z-40 shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <!-- Date Time Display -->
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div
                                class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                {{ \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }} WIB
                            </div>
                        </div>
                    </div>

                    <!-- User Menu & Notifications -->
                    <div class="flex items-center gap-3">
                        <!-- Notification Bell -->
                        <button class="relative p-2 rounded-xl hover:bg-blue-50 transition-all duration-200 group">
                            <svg class="w-6 h-6 text-gray-600 group-hover:text-blue-600 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                        </button>

                        <!-- User Avatar -->
                        <div
                            class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-blue-50 transition-all duration-200 cursor-pointer">
                            <div
                                class="w-9 h-9 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold shadow-lg">
                                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                            </div>
                            <div class="hidden sm:block">
                                <div class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'User' }}
                                </div>
                                <div class="text-xs text-gray-500">Freelancer</div>
                            </div>
                        </div>

                        <!-- Mobile Toggle -->
                        <button @click="open = !open"
                            class="sm:hidden text-blue-600 p-2 rounded-lg hover:bg-blue-50 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <!-- CONTENT AREA -->
            <main class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100">
                {{ $slot }}
            </main>

        </div>

    </div>

    <!-- Enhanced Styles -->
    <style>
        @layer utilities {
            .shadow-premium {
                box-shadow: 0 10px 40px rgba(37, 99, 235, 0.3),
                    0 0 0 1px rgba(37, 99, 235, 0.1);
            }
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #3b82f6, #6366f1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #2563eb, #4f46e5);
        }
    </style>

</body>

</html>
