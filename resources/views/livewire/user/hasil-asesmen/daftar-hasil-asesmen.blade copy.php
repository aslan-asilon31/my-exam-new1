<x-card :url="$url" :title="$title" shadow separator class="border shadow">

    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md" style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
        <div class="relative z-99 flex flex-col justify-between h-full">
            {{-- <h2 class="text-sm md:text-md font-semibold text-white text-center">{{ $asesmen['judul'] }}</h2> --}}
            <div class="py-4 flex flex-col md:flex-row flex-grow">
                <!-- Kolom Kiri -->
                <div class="flex-1 pr-2">
                    <div class="flex flex-col py-2">
                        <p class="text-gray-100 text-xs md:text-md">Hari :</p>
                        <p class="text-gray-100 text-[12px]">
                            {{ \Carbon\Carbon::parse($ActivePenggunaAsesmens['asesmen']['tgl_mulai'])->translatedFormat('l') }} 
                        </p>
                    </div>
                    <div class="flex flex-col py-2">
                        <p class="text-gray-100 text-xs md:text-md">Tanggal :</p>
                        <p class="text-gray-100 text-[12px]">
                            {{ \Carbon\Carbon::parse($ActivePenggunaAsesmens['asesmen']['tgl_mulai'])->translatedFormat('d F Y') }}  
                        </p>
                    </div>

                </div>

                <!-- Kolom Kanan -->
                <div class="flex-1 pl-2">
                    <div class="flex flex-col py-2">
                        <p class="text-gray-100 text-xs md:text-md">Waktu</p>
                        <p class="text-gray-100 text-[12px]">
                            {{ \Carbon\Carbon::parse($ActivePenggunaAsesmens['asesmen']['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($ActivePenggunaAsesmens['asesmen']['tgl_selesai'])->translatedFormat('H:i') }} WIB
                        </p>
                    </div>
                    <div class="text-gray-100flex flex-col py-2">
                        <p class="text-gray-100 text-xs md:text-md">Durasi :</p>
                        <p class="text-gray-100 text-[12px]">{{ $durasi }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-center text-white text-xl md:2xl">
                Hasil : {{ $countHasilAsesmen }}
            </div>
        </div>
    </div>

</x-card>
