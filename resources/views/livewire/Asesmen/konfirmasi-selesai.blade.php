<div>


    <div class="max-w-4xl  mx-auto bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105" >
        <div class="w-full flex flex-col items-center justify-center">
            <h1 class="text-md md:text-xl font-bold mb-6 text-center text-green-700">Tes Selesai!</h1>
            <img src="{{ asset('frontend/clock-brown.png') }}" alt="img-clock" class="w-16 md:w-24 rounded-full shadow-lg">
        </div>
        
        <div class="py-4 flex">
            <!-- Kolom Kiri -->
            <div class="flex-1 pr-2">
           
                <div class="mb-4">
                    <h3 class="text-sm md:text-md font-bold text-left">Nama:</h3>
                    <span class="text-xs md:text-sm text-right">{{ auth()->user()->name }}</span>
                </div>

                <div class="mb-4">
                    <h3 class="text-sm md:text-md font-bold text-left">Email:</h3>
                    <span class="text-xs md:text-sm text-right">{{ auth()->user()->email }}</span>
                </div>
            

            </div>
                                
            <!-- Kolom Kanan -->
            <div class="flex-1 pl-2">
                <div class="mb-4">
                    <h3 class="text-sm md:text-md font-bold text-left">Durasi:</h3>
                    <span class="text-xs md:text-sm text-right">{{ $this->penggunaAsesmen['pengguna_asesmen.asesmen_durasi'] }}</span>
                </div>
            </div>

           
            
        </div>
        
        <p class="text-center text-gray-700 text-xs">Kembali ke daftar asesmen</p> 

        <div class="flex items-center justify-center mt-1 text-center gap-2">
            <button type="button"  wire:click="simpanJawaban"  class="text-xs md:text-sm bg-orange-900 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Daftar Asesmen
            </button>
        </div>

    </div>


</div>