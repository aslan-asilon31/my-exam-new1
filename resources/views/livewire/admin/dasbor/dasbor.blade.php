<div>

    <x-card  :title="$title"  :url="$url" >

        <div class="flex items-center space-x-4">
        <img src="{{ asset('path/to/profile-image.jpg') }}" alt="Profile Image" class="w-16 h-16 rounded-full border border-gray-300">

        <div>
            <h1 class="text-xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name }}</h1>
            <p class="text-sm text-gray-600">Role: {{ $user_role }}</p> <!-- Mengambil role pertama dari user -->
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-medium text-gray-700">Dashboard Content</h2>

    </div>

    </x-card>



</div>
