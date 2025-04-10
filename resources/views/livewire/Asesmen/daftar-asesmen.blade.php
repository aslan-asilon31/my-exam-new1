<div>

    <header class="bg-white shadow-md p-4 mb-10 rounded-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-sm md:text-md font-bold text-orange-900">Umedalife</h1>
            <span id="asesmen-durasi" class="font-bold text-orange-900">00:00</span>
            <x-logout-button />
        </div>
    </header>
    
    
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp

    <div class="flex justify-center">

        <div class=" h-screen max-w-4xl mx-auto bg-white p-8 rounded-md shadow-lg ">
            <h1 class="text-md sm:text-lg font-bold mb-6 text-orange-900 text-center">Daftar Asesmen</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @forelse ($asesmens as $asesmen)

                <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md" style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
                    <div class="relative z-99 flex flex-col justify-between h-full">
                        <h2 class="text-sm md:text-md font-semibold text-white text-center">{{ $asesmen['judul'] }}</h2>
                        <div class="py-4 flex flex-col md:flex-row flex-grow">
                            <!-- Kolom Kiri -->
                            <div class="flex-1 pr-2">
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Hari :</p>
                                    <p class="text-gray-100 text-[12px]">
                                        {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('l') }} 
                                    </p>
                                </div>
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Tanggal :</p>
                                    <p class="text-gray-100 text-[12px]">
                                        {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('d F Y') }}  
                                    </p>
                                </div>

                            </div>
                        
                            <!-- Kolom Kanan -->
                            <div class="flex-1 pl-2">
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Waktu :</p>
                                    <p class="text-gray-100 text-[12px]">
                                        {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($asesmen['tgl_selesai'])->translatedFormat('H:i') }} WIB
                                    </p>
                                </div>
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Durasi :</p>
                                    <p class="text-gray-100 text-[12px]">{{ $asesmen->durasi }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex justify-center">
                            <a href="/konfirmasi-mulai/{{ $asesmen->id }}" class="text-xs w-full bg-[#954832] hover:bg-[#954832] text-white py-2 px-4 rounded text-center">
                                Mulai Assesment
                            </a>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-lg hover:scale-105">
                        <h2 class="text-sm md:text-md font-semibold">-</h2>
                    </div>
                @endforelse
                
            </div>
        </div>
    </div>
    
    
</div>
