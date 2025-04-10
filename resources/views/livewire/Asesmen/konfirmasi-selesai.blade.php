<div>

    {{-- <x-header-layout/> --}}

    <header class="bg-white shadow-md p-4 mb-10 rounded-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-sm md:text-md font-bold text-orange-900">Umedalife</h1>
            <span id="asesmen-durasi" class="font-bold text-orange-900">00:00</span>
            <x-logout-button />
        </div>
    </header>


    <div class="max-w-4xl  mx-auto bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">
        <div class="w-full flex flex-col items-center justify-center">
            <h1 class="text-md md:text-xl font-bold mb-6 text-center text-green-700">Tes Selesai!</h1>
            <img src="{{ asset('frontend/clock-brown.png') }}" alt="img-clock" class="w-16 md:w-24 rounded-full shadow-lg">
        </div>
        
        <div class="pb-8">
            <br>
           
            <div class="mb-4">
                <h3 class="text-sm md:text-md font-bold text-left">Nama:</h3>
                <span class="text-xs md:text-sm text-right">{{ auth()->user()->name }}</span>
            </div>
           
            <div class="mb-4">
                <h3 class="text-sm md:text-md font-bold text-left">Email:</h3>
                <span class="text-xs md:text-sm text-right">{{ auth()->user()->email }}</span>
            </div>
           
            <div class="mb-4">
                <h3 class="text-sm md:text-md font-bold text-left">Durasi:</h3>
                <span class="text-xs md:text-sm text-right">{{ $this->penggunaAsesmen['pengguna_asesmen.asesmen_durasi'] }}</span>
            </div>

           
            
        </div>
        
        <p class="text-center text-gray-700 text-xs">Klik tombol selesai untuk menyelesaikan asesmen ini</p> <!-- Centered text -->

        <div class="flex items-center justify-center mt-1 text-center gap-2">
            <a href="javascript:void(0);" onclick="window.history.back();" class="text-xs md:text-sm bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Kembali ke soal
            </a>

            <button type="button"  wire:click="simpanJawaban" wire:confirm="Apakah kamu yakin akan menyelesaikan asesmen ini ?" class="text-xs md:text-sm bg-orange-900 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Selesai
            </button>
        </div>

    </div>


</div>