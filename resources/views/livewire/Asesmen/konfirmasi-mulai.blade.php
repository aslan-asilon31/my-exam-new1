<div>

    <header class="bg-white shadow-md p-4 mb-10 rounded-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-sm md:text-md font-bold text-orange-900">Umedalife</h1>
            <span id="asesmen-durasi" class="text-sm md:text-md font-bold text-orange-900">{{ $this->penggunaAsesmen['pengguna_asesmen.asesmen_durasi'] }}</span>
            <x-logout-button />
        </div>
    </header>

    <div class=" ">
        <div class="w-96 h-screen bg-white p-8 rounded-md shadow-lg ">
            <div class="">
                @if ($asesmen)
                    <div class=" transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-lg hover:scale-105 " style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
                        <div class="relative z-99">
                            <h2 class="text-sm md:text-md font-semibold text-white text-center">{{ $asesmen['judul'] }}</h2>
                            <div class="py-4 flex">
                                <!-- Kolom Kiri -->
                                <div class="flex-1 pr-2">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs">Hari :</p>
                                        <p class="text-gray-100 text-[9px]">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('l') }} 
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs">Tanggal :</p>
                                        <p class="text-gray-100 text-[9px]">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('d F Y') }}  
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs">Nama :</p>
                                        <p class="text-gray-100 text-[9px]">
                                            {{ $userName }}  
                                        </p>
                                    </div>
                                </div>
                            
                                <!-- Kolom Kanan -->
                                <div class="flex-1 pl-2">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs">Waktu :</p>
                                        <p class="text-gray-100 text-[9px]">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($asesmen['tgl_selesai'])->translatedFormat('H:i') }} WIB
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs">Durasi :</p>
                                        <p class="text-gray-100 text-[9px]  " id="">  {{ $this->penggunaAsesmen['pengguna_asesmen.asesmen_durasi'] }} </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs">Email :</p>
                                        <p class="text-gray-100 text-[9px]">
                                            {{ auth()->user()->email }}  
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                                
                            
                        </div>
                    </div>
                @else
                    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-lg hover:scale-105">
                        <h2 class="text-sm md:text-md font-semibold">-</h2>
                    </div>
                @endif
                
            </div>
            
            <div class="flex justify-center mt-2 gap-4">
                <a href="{{ route('daftar-asesmen') }}" class="text-xs md:text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Kembali
                </a>
                <a href="/soal-asesmen/{{ $this->penggunaAsesmen['pengguna_asesmen.asesmen_id'] }}" class="text-xs md:text-sm bg-orange-900 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">
                    Mulai Ujian
                </a>
            </div>
        </div>
    </div>



</div>

