<div class="flex flex-col lg:flex-row h-screen">

  <!-- Left Pane (Image) -->
  <div class="flex items-center justify-center bg-white text-black lg:flex-1">

      <!-- Gambar untuk Mobile -->
      <div class="max-w-md text-center lg:hidden my-4">
          <img src="{{ asset('umeda-logo.png') }}" class="w-48" alt="" srcset="">
      </div>

      <!-- Gambar untuk Desktop -->
      <div class="hidden lg:flex items-center justify-center flex-1">
          <img src="{{ asset('umeda-logo.png') }}" width="524.67004" height="531.39694" alt="" srcset="">
      </div>
  </div>

  <!-- Right Pane (Form) -->
  <div class="w-full border-x-2 lg:w-1/2 flex items-center justify-center  md:p-4">

    <x-form wire:submit="login" class="p-4 mt-2 border-2 ">
        <p class="text-md font-bold text-center  pb-2 ">LOGIN</pc>

        <x-input class="outline-[#954832] caret-pink-500" wire:model="email" label="email" placeholder="email" icon-right="o-user"
          right />
        <x-password wire:model="password" class="block text-sm font-medium text-gray-700" label="password"  placeholder="password"
          password-icon="o-lock-closed" password-visible-icon="o-lock-open" right />

        <x-button type="submit" spinner="login" class="bg-[#A16A38] hover:bg-red-900  block text-sm font-medium text-white p-2" >
          Masuk
        </x-button>
        <x-errors class="text-white" />
    </x-form>
  </div>
</div>
