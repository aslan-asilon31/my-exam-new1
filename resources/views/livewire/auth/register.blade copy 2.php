<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Registrasi</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif


    <x-form wire:submit.prevent="register" class="space-y-4">
        <div class="mb-4">
            <x-input wire:model="loginForm.surel" label="surel" placeholder="surel" icon-right="o-user"
            right />
            @error('surel') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        </div>

        <div class="mb-4">
            <x-password wire:model="loginForm.sandi" class="block text-sm font-medium text-gray-700" label="sandi"  placeholder="sandi"
            password-icon="o-lock-closed" password-visible-icon="o-lock-open" right />
            @error('surel') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        </div>

        <x-button type="submit" spinner="login" class="block text-sm font-medium text-gray-700" class="bg-blue-700 hover:bg-blue-400 text-white btn-block">
          Login
        </x-button>
        <x-errors class="text-white" />
    </x-form>


</div>
