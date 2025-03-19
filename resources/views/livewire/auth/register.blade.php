<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Registrasi</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="register">
        <div class="mb-4">
            <label for="surel" class="block text-sm font-medium text-gray-700">Surel</label>
            <input type="email" wire:model="surel" id="surel" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            @error('surel') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="sandi" class="block text-sm font-medium text-gray-700">Sandi</label>
            <input type="password" wire:model="sandi" id="sandi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            @error('sandi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="konfirmasiSandi" class="block text-sm font-medium text-gray-700">Konfirmasi Sandi</label>
            <input type="password" wire:model="konfirmasiSandi" id="konfirmasiSandi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            @error('konfirmasiSandi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Daftar</button>
    </form>
</div>
