<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Freelance Job Manager</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delay {
            animation: float 6s ease-in-out 2s infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body class="antialiased overflow-x-hidden">
    <!-- Background -->
    <div class="fixed inset-0 bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-100 -z-10"></div>

    <!-- Decorative Shapes -->
    <div class="fixed top-20 right-10 w-72 h-72 bg-blue-400/20 rounded-full blur-3xl animate-float"></div>
    <div class="fixed bottom-20 left-10 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl animate-float-delay"></div>

    <!-- Navigation -->
    @if (Route::has('login'))
        <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-md border-b border-blue-100 z-50 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span
                            class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                            JobManager
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl transition-all shadow-lg hover:shadow-xl font-medium">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-6 py-2.5 text-gray-700 hover:text-blue-600 transition-colors font-medium">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl transition-all shadow-lg hover:shadow-xl font-medium">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    @endif

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center px-6 pt-20">
        <div class="max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left space-y-6 opacity-0 animate-fade-in-up">
                    <div
                        class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4">
                        🚀 Kelola Freelance dengan Mudah
                    </div>

                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight">
                        <span class="text-gray-900">Manage Your</span>
                        <span
                            class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mt-2">
                            Freelance Jobs
                        </span>
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl opacity-0 animate-fade-in-up delay-100">
                        Platform modern untuk mengelola proyek freelance Anda. Lacak job, kelola task, dan tingkatkan
                        produktivitas dengan interface yang intuitif.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4 opacity-0 animate-fade-in-up delay-200">
                        @guest
                            <a href="{{ route('register') }}"
                                class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl transition-all shadow-lg hover:shadow-2xl font-medium text-lg flex items-center justify-center gap-2">
                                Get Started
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                            <a href="{{ route('login') }}"
                                class="px-8 py-4 bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 hover:border-blue-300 rounded-xl transition-all font-medium text-lg flex items-center justify-center gap-2">
                                Sign In
                            </a>
                        @else
                            <a href="{{ url('/dashboard') }}"
                                class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl transition-all shadow-lg hover:shadow-2xl font-medium text-lg flex items-center justify-center gap-2">
                                Go to Dashboard
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @endguest
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 opacity-0 animate-fade-in-up delay-300">
                        <div class="text-center">
                            <div
                                class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                100+</div>
                            <div class="text-sm text-gray-600 mt-1">Active Users</div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                500+</div>
                            <div class="text-sm text-gray-600 mt-1">Jobs Managed</div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                99%</div>
                            <div class="text-sm text-gray-600 mt-1">Satisfaction</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Mockup -->
                <div class="relative opacity-0 animate-fade-in-up delay-400">
                    <div
                        class="relative bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-blue-100">
                        <!-- Mini Dashboard Preview -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-3 pb-4 border-b border-blue-100">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                                    JD
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-800">John Doe</div>
                                    <div class="text-xs text-gray-500">Freelancer</div>
                                </div>
                            </div>

                            <!-- Job Cards Preview -->
                            <div class="space-y-3">
                                <div
                                    class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="font-semibold text-gray-800">Website Development</div>
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">In
                                            Progress</span>
                                    </div>
                                    <div class="text-sm text-gray-600 mb-3">PT Maju Jaya</div>
                                    <div class="space-y-2">
                                        <div class="flex items-center gap-2">
                                            <div class="w-4 h-4 bg-blue-500 rounded flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <span class="text-sm text-gray-600 line-through">Design mockup</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="w-4 h-4 border-2 border-blue-300 rounded"></div>
                                            <span class="text-sm text-gray-600">Build frontend</span>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="font-semibold text-gray-800">Mobile App Design</div>
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Done</span>
                                    </div>
                                    <div class="text-sm text-gray-600">Tech Startup Inc</div>
                                </div>

                                <div
                                    class="p-4 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="font-semibold text-gray-800">Logo Design</div>
                                        <span
                                            class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">Pending</span>
                                    </div>
                                    <div class="text-sm text-gray-600">Creative Agency</div>
                                </div>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-blue-400/20 rounded-full blur-2xl"></div>
                        <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-indigo-400/20 rounded-full blur-2xl"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Fitur Unggulan
                </h2>
                <p class="text-xl text-gray-600">
                    Semua yang Anda butuhkan untuk mengelola freelance job
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Job Management</h3>
                    <p class="text-gray-600">Kelola semua job freelance Anda dalam satu tempat dengan mudah dan
                        terorganisir.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Task Tracking</h3>
                    <p class="text-gray-600">Lacak progress setiap task dengan checklist yang intuitif dan mudah
                        digunakan.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-blue-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Real-time Updates</h3>
                    <p class="text-gray-600">Update status job secara real-time dan dapatkan notifikasi untuk setiap
                        perubahan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto">
            <div
                class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-3xl p-12 text-center shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full -ml-32 -mb-32"></div>

                <div class="relative z-10">
                    <h2 class="text-4xl font-bold text-white mb-4">
                        Siap Meningkatkan Produktivitas?
                    </h2>
                    <p class="text-xl text-blue-100 mb-8">
                        Bergabunglah dengan ratusan freelancer yang sudah menggunakan JobManager
                    </p>
                    @guest
                        <a href="{{ route('register') }}"
                            class="inline-block px-8 py-4 bg-white hover:bg-gray-100 text-blue-600 rounded-xl transition-all shadow-lg hover:shadow-xl font-bold text-lg">
                            Daftar Sekarang - Gratis!
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-8 py-4 bg-white hover:bg-gray-100 text-blue-600 rounded-xl transition-all shadow-lg hover:shadow-xl font-bold text-lg">
                            Ke Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-6 bg-white/80 backdrop-blur-md border-t border-blue-100">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span
                            class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                            JobManager
                        </span>
                    </div>
                    <p class="text-gray-600 max-w-sm">
                        Platform modern untuk mengelola proyek freelance Anda dengan mudah dan efisien.
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Product</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="#" class="hover:text-blue-600 transition">Features</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Company</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="#" class="hover:text-blue-600 transition">About</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Blog</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-100 mt-8 pt-8 text-center text-gray-600">
                <p>&copy; 2025 JobManager. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
