<div>
    
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp

    <div class=" bg-white p-8 md:p-16 rounded-md shadow-lg ">
        <h1 class="text-md sm:text-lg font-bold mb-6 text-orange-900 text-center">Daftar Asesmen Yang Sudah Diikuti <b> {{ $this->userSelected['name'] }} </b> </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @if(!empty($this->ActivePenggunaAsesmens))
                @foreach($this->ActivePenggunaAsesmens as $index => $asesmen)
                    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md" style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
                        <div class="relative z-2 flex flex-col justify-between">
                            <h2 class="text-sm md:text-md font-semibold text-white text-center">{{ $asesmen['asesmen']['judul'] }}</h2>
                            @if(collect($asesmen['detail_pengguna_asesmens'])->sum('poin') <= 0)
                                <h4 class="text-sm md:text-md font-semibold text-white text-center">( belum di nilai )</h4>
                            @else
                            @endif
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

                                    @php
                                        $totalPoints = collect($asesmen['detail_pengguna_asesmens'])->sum('poin');

                                        $jumlahBobotMaksimal = collect($asesmen['asesmen']['pertanyaans'])->sum('bobot'); // Pastikan 'bobot' ada di setiap pertanyaan

                                        $nilaiPoin = 0;

                                        if ($jumlahBobotMaksimal > 0) {
                                            $nilaiPoin = ($totalPoints / $jumlahBobotMaksimal) * 100; 
                                            $nilaiPoin = min(max($nilaiPoin, 0), 100);
                                        }
                                    @endphp
                                
                                

                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-sm md:text-md">Nilai Asesmen:</p>
                                        <p class="text-gray-100 text-sm md:text-md">
                                            @if( $nilaiPoin <= 0 )
                                            belum di nilai
                                            @else
                                            {{ round($nilaiPoin,2) }} / 100
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            
                                <!-- Kolom Kanan -->
                                <div class="flex-1 ">
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs md:text-md">Waktu :</p>
                                        <p class="text-gray-100 text-[12px]">
                                            {{ \Carbon\Carbon::parse($asesmen['asesmen']['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($asesmen['tgl_selesai'])->translatedFormat('H:i') }} WIB
                                        </p>
                                    </div>

                                    @php
                                        if (isset($asesmen['asesmen']['tgl_mulai']) && isset($asesmen['asesmen']['tgl_selesai'])) {
                                            $tglMulai = \Carbon\Carbon::parse($asesmen['asesmen']['tgl_mulai']);
                                            $tglSelesai = \Carbon\Carbon::parse($asesmen['asesmen']['tgl_selesai']);
                                            
                                            $durasi = $tglMulai->diff($tglSelesai);
                                            
                                            $durasi1 = $durasi->format('%h jam %i menit %s detik');
                                        } else {
                                            $durasi1 = null; 
                                        }
                                    @endphp
                                
                                    <div class="flex flex-col py-2">
                                        <p class="text-gray-100 text-xs md:text-md">Durasi :</p>
                                        <p class="text-gray-100 text-[12px]">{{ $durasi1 }}</p>
                                    </div>
                                </div>
                            </div>

                            @if(collect($asesmen['detail_pengguna_asesmens'])->sum('poin') <= 0)
                                <x-button class="bg-[#954832] text-white" label="Beri nilai" :link="route('daftar-penilaian-asesmen-detail', $asesmen['asesmen_id'])"/>
                            @else
                                <x-button class="bg-[#26733e] text-white" label="Update nilai" :link="route('daftar-penilaian-asesmen-detail', $asesmen['asesmen_id'])"/>
                            @endif
                        
                            
                        </div>
                    </div>
                @endforeach
            @else
                <p>Tidak ada data pengguna asesemen.</p>
            @endif
            
        </div>



    
    </div>
    
    
</div>
