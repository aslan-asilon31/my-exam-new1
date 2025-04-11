<div>
    <header class="bg-white shadow-md p-4 mb-10 rounded-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-sm md:text-md font-bold text-orange-900">Umedalife</h1>
            <span id="asesmen-durasi" class="font-bold text-orange-900">00:00</span>
            <x-logout-button />
        </div>
    </header>
    {{-- {{ print_r($detailPenggunaAsesmen) }}

    @dump( $detailPenggunaAsesmen[$indexDetailPenggunaAsesmen])
    @dump( $penggunaAsesmen)
    @dump( Session()) --}}

<div class="mx-auto max-w-full h-screen bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">
    @if (empty($detailPenggunaAsesmen))
        <p class="text-gray-700 text-center">Tidak ada pertanyaan tersedia.</p>
    @else
        <h1 class="text-sm md:text-md font-bold mb-6 text-orange-900 text-center">

            <p> Soal {{ $indexDetailPenggunaAsesmen + 1 }} dari {{ count($detailPenggunaAsesmen) }}</p>

            <hr class="my-5" />
            
        </h1>
        <p hidden>Timer Soal Berjalan: <span id="timer-soal-berjalan">00:00</span></p>
        <div class="mb-6 ">

      
            <div class="w-full flex justify-center text-center">
                <div class="mb-3 flex w-64 ">
                  <div  >

                    {!! $detailPenggunaAsesmen[$indexDetailPenggunaAsesmen]['pertanyaan'] !!}

                    {{-- {!! $pertanyaans[$indexJawaban]->pertanyaan !!} --}}
                  </div>
                </div>
            </div>



            <div class="flex justify-center items-center w-full md:w-full ">
                <textarea 
                wire:model="jawaban"
                placeholder="Tulis jawaban Anda di sini..."
            ></textarea>
                {{-- @foreach ($detailPenggunaAsesmen as $index => $item)
                <textarea 
                    wire:model="detailPenggunaAsesmen.{{ $index }}.jawaban"
                    placeholder="Tulis jawaban Anda di sini..."
                ></textarea>
                @endforeach --}}
                {{-- 
                <textarea 
                    wire:model="detailPenggunaAsesmen.{{ $indexDetailPenggunaAsesmen }}.jawaban"
                    class="form-control @error('jawaban.' . $indexDetailPenggunaAsesmen) is-invalid @enderror h-32 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                    placeholder="Tulis jawaban Anda di sini..."
                ></textarea>
                 --}}
            </div>
            <div class="flex justify-center items-center w-full md:w-full ">
                <span id="durasiSoal" >Durasi Soal {{ $indexDetailPenggunaAsesmen + 1 }}</span>
            </div>


        </div>

        <div class="flex justify-center items-center w-full md:w-full  mt-8">

            <button
                wire:click=""
                class="text-xs md:text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                Sebelumnya
            </button>
            

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

<script>
    $(document).ready(function() {
        $('#summernote-soal').summernote({
            height: 'auto', // Set height to auto to fit content
            toolbar: false, // Disable the toolbar for read-only mode
            focus: true,
            callbacks: {
            onInit: function() {
                // Optional: Add any additional styles or classes if needed
                $(this).css('overflow', 'visible'); // Ensure overflow is visible
            }
        }
        });

        // Set the content of the Summernote editor
        $('#summernote-soal').summernote('code', $('#summernote-soal').html());
    });
</script>

</div>
