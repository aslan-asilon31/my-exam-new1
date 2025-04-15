<div>


    <div class="flex-grow"> 
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-xl hover:scale-105">
                @if ($asesmen)
                    <div class=" transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-lg hover:scale-105 " style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
                        <div class="relative z-99">
                            <h2 class="text-sm md:text-md font-semibold text-white text-center">{{ $asesmen['judul'] }}</h2>
                            <div class="py-4 flex">
                                <!-- Kolom Kiri -->
                                <div class="flex-1 pr-2">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm font-bold">Hari :</p>
                                        <p class="text-gray-100 text-sm">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('l') }} 
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm font-bold">Tanggal :</p>
                                        <p class="text-gray-100 text-sm">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('d F Y') }}  
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm font-bold">Nama :</p>
                                        <p class="text-gray-100 text-sm">
                                            {{ $userName }}  
                                        </p>
                                    </div>
                                </div>
                            
                                <!-- Kolom Kanan -->
                                <div class="flex-1 pl-2">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm font-bold">Waktu :</p>
                                        <p class="text-gray-100 text-sm">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($asesmen['tgl_selesai'])->translatedFormat('H:i') }} WIB
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm font-bold">Durasi :</p>
                                        <p class="text-gray-100 text-sm  " id="">  {{ $asesmenDurasi }} </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm font-bold">Email :</p>
                                        <p class="text-gray-100 text-sm">
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
                <a href="{{ route('daftar-asesmen') }}" class="text-sm font-bold md:text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Kembali
                </a>
                <a href="/soal-asesmen/{{ $this->id }}" class="text-sm font-bold md:text-sm bg-orange-900 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">
                    Mulai Ujian
                </a>
            </div>
        </div>
    </main>

</div>

