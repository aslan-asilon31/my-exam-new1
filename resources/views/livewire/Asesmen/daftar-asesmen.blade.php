<div>
    
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp


    <x-card  :title="$title"  :url="$url" >

        <div class=" bg-white p-8 !pt-[0]  rounded-md shadow-lg ">
            <h1 class="text-md md:text-lg font-bold mb-6 text-orange-900 text-center">Daftar Asesmen</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @forelse ($asesmens as $asesmen)


                    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md" style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
                        
                        <div class="relative z-2 flex flex-col justify-between">
                            <h2 class="text-md font-bold font-semibold text-white text-center">{{ $asesmen['judul'] }}</h2>
                            <div class="py-4 flex  md:flex-row flex-grow">
                                <!-- Kolom Kiri -->
                                <div class="flex-1 pr-2">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-md font-bold">Hari :</p>
                                        <p class="text-gray-100 text-md">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('l') }} 
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-md font-bold">Tanggal :</p>
                                        <p class="text-gray-100 text-md">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('d F Y') }}  
                                        </p>
                                    </div>

                                </div>
                            
                                <!-- Kolom Kanan -->
                                <div class="flex-1 ">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-md font-bold">Waktu :</p>
                                        <p class="text-gray-100 text-sm">
                                            {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($asesmen['tgl_selesai'])->translatedFormat('H:i') }} WIB
                                        </p>
                                    </div>
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-md font-bold">Durasi :</p>
                                        <p class="text-gray-100 text-md">{{ $asesmenDurasi }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 flex justify-center">
                        
                                @if ($this->apakahSudahIkutAsesmen->contains('asesmen_id',  $asesmen['id']))
                                    <span class="text-sm px-2 py-2 text-md bg-gray-500 text-white rounded text-center">
                                        <x-icon name="o-lock-closed" /> Sudah Menyelesaikan Asesmen Ini
                                    </span>
                                @else
                                    <a type="button" href="/konfirmasi-mulai/{{ $asesmen['id'] }}" class="text-sm px-2 py-2 text-md rounded  bg-[#954832] hover:bg-[#954832] text-white  text-center">
                                        Mulai Asesmen 
                                    </a>
                                @endif  
                            </div>

                        </div>
                    </div>


                @empty
                    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-lg hover:scale-105">
                        <h2 class="text-md font-bold font-semibold">-</h2>
                    </div>
                @endforelse
                
            </div>



        
        </div>
        
    </x-card>
    
</div>
