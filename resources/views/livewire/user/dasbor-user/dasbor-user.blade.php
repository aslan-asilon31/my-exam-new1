<div>
    <x-card :title="$title"  :url="$url" >

        <div class="flex items-center space-x-4">
        <img src="" alt="Profile Image" class="w-16 h-16 rounded-full border border-gray-300">

        <div>
            <h1 class="text-xl font-semibold text-gray-800">Selamat Data, {{ Auth::user()->name }}</h1>
            <p class="text-sm text-gray-600">Role: {{ $this->user_role }}</p> <!-- Mengambil role pertama dari user -->
        </div>
    </div>

    <div class="mt-6">

    </div>

    </x-card>
</div>
