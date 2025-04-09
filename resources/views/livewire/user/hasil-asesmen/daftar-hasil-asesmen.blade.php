<x-card :url="$url" :title="$title" shadow separator class="border shadow">

    @if($ActivePenggunaAsesmens)
        @forelse($asesmenYangPernahDiikuti as $asesmen)

            @php 
                $tglMulai = \Carbon\Carbon::parse($asesmen['asesmen']['tgl_mulai']);
                $tglSelesai = \Carbon\Carbon::parse($asesmen['asesmen']['tgl_selesai']);
                $durasi1 = $tglMulai->diff($tglSelesai);
                $asesmenDurasi1 = $durasi1->format('%h jam %i menit %s detik');


                $totalBobots = array_sum(array_column($asesmen['asesmen']['pertanyaans'], 'bobot'));
                $totalPoints = array_sum(array_column($asesmen['detail_pengguna_asesmens'], 'poin'));
                $countHasilAsesmen =  ceil(($totalPoints/$totalBobots)*100);
            @endphp

            <div class="my-4 py-4">
                <div class=" transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md" style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
                    <div class="relative z-99 flex flex-col justify-between h-full">
                        <div class=" text-gray-100 text-md md:text-xl flex justify-center items-center">Judul Asesmen : {{ $asesmen['asesmen']['judul'] }}</div>
                        <div class="py-4 flex flex-col md:flex-row flex-grow">
                            <!-- Kolom Kiri -->
                            <div class="flex-1 pr-2">
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Hari :</p>
                                    <p class="text-gray-100 text-[12px]">
                                        {{ \Carbon\Carbon::parse($asesmen['asesmen']['tgl_mulai'])->translatedFormat('l') }} 
                                    </p>
                                </div>
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Tanggal :</p>
                                    <p class="text-gray-100 text-[12px]">
                                        {{ \Carbon\Carbon::parse($asesmen['asesmen']['tgl_mulai'])->translatedFormat('d F Y') }}  
                                    </p>
                                </div>

                            </div>

                            <!-- Kolom Kanan -->
                            <div class="flex-1 pl-2">
                                <div class="flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Waktu</p>
                                    <p class="text-gray-100 text-[12px]">
                                        {{ \Carbon\Carbon::parse($asesmen['asesmen']['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($ActivePenggunaAsesmens['asesmen']['tgl_selesai'])->translatedFormat('H:i') }} WIB
                                    </p>
                                </div>
                                <div class="text-gray-100flex flex-col py-2">
                                    <p class="text-gray-100 text-xs md:text-md">Durasi :</p>


                                    <p class="text-gray-100 text-[12px]">{{ $asesmenDurasi1 }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-center text-white text-xl md:2xl">

                            Hasil Asesmen : &nbsp;
                            @if($countHasilAsesmen > 0)
                                {{ $countHasilAsesmen }}
                            @else
                                <p> sedang dinilai</p>
                            @endif
                        
                        </div>
                    </div>
                </div>
            </div>
        @empty 
        @endforelse
    @else
        <img class="w-96" src="{{ asset('flat-image/flat404.png') }}" alt="" srcset="">
        <h2>Anda belum mengikuti Asesmen</h2>
    @endif 

</x-card>
