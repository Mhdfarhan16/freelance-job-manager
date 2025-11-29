<x-app-layout>

    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1
                    class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-2">
                    Profile Settings
                </h1>
                <p class="text-gray-600">Kelola informasi akun dan keamanan Anda</p>
            </div>

            <!-- Profile Information -->
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-6 mb-6 border border-blue-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-blue-800">Informasi Profile</h2>
                        <p class="text-sm text-gray-500">Update nama dan email akun Anda</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full border-2 border-blue-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-blue-300">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full border-2 border-blue-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-blue-300">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div class="mt-2 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-sm text-yellow-700">
                                    Email Anda belum diverifikasi.
                                    <button form="send-verification"
                                        class="text-blue-600 hover:text-blue-800 underline">
                                        Klik di sini untuk kirim ulang verifikasi
                                    </button>
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Success Message -->
                    @if (session('status') === 'profile-updated')
                        <div class="p-3 bg-green-50 border border-green-200 rounded-lg flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <p class="text-sm text-green-700 font-medium">Profile berhasil diupdate!</p>
                        </div>
                    @endif

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl font-medium flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </form>
            </div>

            <!-- Update Password -->
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-6 mb-6 border border-blue-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-blue-800">Update Password</h2>
                        <p class="text-sm text-gray-500">Pastikan menggunakan password yang kuat dan aman</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Password Saat Ini</label>
                        <input type="password" name="current_password" required autocomplete="current-password"
                            class="w-full border-2 border-blue-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-blue-300">
                        @error('current_password', 'updatePassword')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Password Baru</label>
                        <input type="password" name="password" required autocomplete="new-password"
                            class="w-full border-2 border-blue-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-blue-300">
                        @error('password', 'updatePassword')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full border-2 border-blue-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:border-blue-300">
                    </div>

                    @if (session('status') === 'password-updated')
                        <div class="p-3 bg-green-50 border border-green-200 rounded-lg flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <p class="text-sm text-green-700 font-medium">Password berhasil diupdate!</p>
                        </div>
                    @endif

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl font-medium flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Update Password
                    </button>
                </form>
            </div>

            <!-- Delete Account -->
            <div class="bg-red-50/80 backdrop-blur-lg rounded-3xl shadow-2xl p-6 border border-red-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-red-100 rounded-xl">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-red-800">Delete Account</h2>
                        <p class="text-sm text-red-600">Hapus akun Anda secara permanen</p>
                    </div>
                </div>

                <div class="bg-white/50 rounded-2xl p-4 mb-4">
                    <p class="text-sm text-gray-700 mb-2">
                        <strong>Perhatian:</strong> Setelah akun Anda dihapus, semua data dan resource akan dihapus
                        secara permanen.
                    </p>
                    <p class="text-sm text-gray-700">
                        Sebelum menghapus akun, silakan download data atau informasi yang ingin Anda simpan.
                    </p>
                </div>

                <button x-data @click="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="w-full bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl font-medium flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete Account
                </button>
            </div>

        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-data="{ show: false }" @open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true"
        @close-modal.window="show = false" x-show="show" class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">

        <!-- Backdrop -->
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm" @click="show = false">
        </div>

        <!-- Modal -->
        <div class="flex items-center justify-center min-h-screen p-4">
            <div x-show="show" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative bg-white rounded-3xl shadow-2xl max-w-md w-full p-6">

                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-red-100 rounded-xl">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Konfirmasi Hapus Account</h3>
                </div>

                <p class="text-gray-600 mb-4">
                    Apakah Anda yakin ingin menghapus akun? Setelah akun dihapus, semua data akan hilang secara
                    permanen.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                    @csrf
                    @method('DELETE')

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Konfirmasi dengan Password
                            Anda</label>
                        <input type="password" name="password" required placeholder="Masukkan password Anda"
                            class="w-full border-2 border-red-200 p-3 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition-all">
                        @error('password', 'userDeletion')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="button" @click="show = false"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-3 rounded-xl transition-all font-medium">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl transition-all font-medium">
                            Hapus Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Verification Email Form (Hidden) -->
    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
        <form id="send-verification" method="POST" action="{{ route('verification.send') }}"
            style="display: none;">
            @csrf
        </form>
    @endif

</x-app-layout>
