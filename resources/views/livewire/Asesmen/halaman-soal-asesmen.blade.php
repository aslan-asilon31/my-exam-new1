<div>



<div class="mx-auto max-w-full h-screen bg-white p-2 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">
    @if (empty($detailPenggunaAsesmen))
        <p class="text-gray-700 text-center">Tidak ada pertanyaan tersedia.</p>
    @else
        <h1 class="text-sm md:text-md font-bold mb-6 text-orange-900 text-center">

            <p> Soal {{ $indexDetailPenggunaAsesmen + 1 }} dari {{ count($detailPenggunaAsesmen) }}</p>

            <hr class="my-5" />
            
        </h1>
        <p hidden>Timer Soal Berjalan: <span id="timer-soal-berjalan">00:00</span></p>
        <div class="mb-6 ">
      
            <div class="w-full flex justify-center text-left">
                <div class="mb-3 flex md:w-64 w-full ">
                  <div  >
                    {!! $detailPenggunaAsesmen[$indexDetailPenggunaAsesmen]['pertanyaan'] !!}
                  </div>
                </div>
            </div>

            <div class="flex justify-center items-center w-full md:w-full ">
                <textarea 
                    wire:model="jawaban" class="w-full md:w-80 h-32 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                    placeholder="Tulis jawaban Anda di sini..."
                ></textarea>
            </div>

            <div class="flex justify-center items-center w-full md:w-full ">
                <span id="durasiSoal" >Durasi Soal {{ $indexDetailPenggunaAsesmen + 1 }}</span>
            </div>

        </div>

        <div class="flex justify-center items-center w-full md:w-full  mt-8">

            <button
                wire:click="soalSelanjutnya"
                class="text-xs md:text-sm bg-orange-900 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Selanjutnya
            </button>
        </div>
    @endif




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



</div>
