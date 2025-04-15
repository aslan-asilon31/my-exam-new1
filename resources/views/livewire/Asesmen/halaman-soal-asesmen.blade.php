<div>


 <div class="flex justify-center">

    <div class="w-full max-w-96 md:max-w-screen-sm border p-4">
    @if (empty($detailPenggunaAsesmen))
        <p class="text-gray-700 text-center">Tidak ada pertanyaan tersedia.</p>
    @else
    <h1 class="text-sm md:text-md font-bold text-orange-900 text-center">
        Soal {{ $indexDetailPenggunaAsesmen + 1 }} dari {{ count($detailPenggunaAsesmen) }}
    </h1>
    <hr class="my-4"/>

        @if($detailPenggunaAsesmen[$indexDetailPenggunaAsesmen]['image_url'])
            <div class="mb-4 flex justify-center">
                <img src="{{ $detailPenggunaAsesmen[$indexDetailPenggunaAsesmen]['image_url'] }}" alt="Gambar Pengguna" class="w-full md:w-3/4 border object-cover"> 
            </div>
        @endif

        <div class="mb-4 text-left">
            {!! $detailPenggunaAsesmen[$indexDetailPenggunaAsesmen]['pertanyaan'] !!}
        </div>

        <div>
            <textarea wire:model="jawaban" class="w-full border min-h-36 p-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Tulis jawaban Anda di sini..."></textarea>
        </div>

        <div class="flex flex-row  mt-2">
            <div class="basis-1/2 flex items-center text-sm">
                Sisa Waktu :&nbsp;<span  id="durasiSoal"></span>
            </div>
            <div class="basis-1/2 flex justify-end">
                <button wire:click="soalSelanjutnya" class="btn btn-sm text-xs bg-orange-900 hover:bg-orange-700 text-white font-bold rounded focus:outline-none focus:shadow-outline">
                    Selanjutnya
                </button>
            </div>
        </div>


        
    @endif
    </div>

 </div>
    
</div>



@script 

<script>

    document.addEventListener('livewire:initialized', () => {
        var durasiSoal = $wire.durasiSoal ;
        var interval;

        function startCountdown(duration) {
            let timer = (duration+1), minutes, seconds;
            const display = document.getElementById('durasiSoal');

           interval = setInterval(() => {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    display.textContent = "00:00"; 
                    $wire.soalSelanjutnya();
                }

            }, 1000);
        }
        
        startCountdown(durasiSoal);

        $wire.on('resetCountdown',() => {
            clearInterval(interval);
            durasiSoal = $wire.durasiSoal;
            startCountdown(durasiSoal);
        });
    })

</script>
@endscript 