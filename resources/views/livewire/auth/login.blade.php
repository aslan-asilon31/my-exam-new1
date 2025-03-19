<div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-orange-900">Login</h2>
            
            @if (session()->has('message'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif
    
        @if (session()->has('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        
            <x-form wire:submit="login">
                <x-input wire:model="loginForm.surel" label="surel" placeholder="surel" icon-right="o-user"
                  right />
                <x-password wire:model="loginForm.sandi" label="sandi" placeholder="sandi"
                  password-icon="o-lock-closed" password-visible-icon="o-lock-open" right />
  
                <x-button type="submit" spinner="login" class="bg-blue-700 hover:bg-blue-400 text-white btn-block">
                  Login
                </x-button>
                <x-errors class="text-white" />
              </x-form>
    
            <div class="text-center">
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Lupa password?</a>
            </div>
        </div>
    </div>
    
</div>