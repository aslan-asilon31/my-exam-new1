<div>
    <x-card :title="$title"  :url="$url" >

        <div class="flex items-center space-x-4">
        <!-- Gambar Profil -->
        <img src="{{ asset('path/to/profile-image.jpg') }}" alt="Profile Image" class="w-16 h-16 rounded-full border border-gray-300">

        <!-- Informasi Pengguna -->
        <div>
            <h1 class="text-xl font-semibold text-gray-800">Selamat Data, {{ Auth::user()->name }}</h1>
            <p class="text-sm text-gray-600">Role: {{ $this->user_role }}</p> <!-- Mengambil role pertama dari user -->
        </div>
    </div>

    <!-- Konten Tambahan di Dashboard -->
    <div class="mt-6">
        <!-- Tambahkan konten lain di sini sesuai kebutuhan -->
        <h2 class="text-lg font-medium text-gray-700">Dashboard Content</h2>
        <!-- Misalnya grafik atau statistik lainnya -->

        {{-- Contoh grafik atau komponen lain --}}

    </div>

    </x-card>
</div>
