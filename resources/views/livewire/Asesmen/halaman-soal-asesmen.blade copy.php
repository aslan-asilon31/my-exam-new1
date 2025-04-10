<div>

    {{-- @dd($pertanyaans[$indexJawaban]->pertanyaan,$waktuSoal) --}}
    <header class="bg-white shadow-md p-4 mb-10 rounded-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-sm md:text-md font-bold text-orange-900">Umedalife</h1>
            <span id="asesmen-durasi" class="font-bold text-orange-900">00:00</span>
            <x-logout-button />
        </div>
    </header>

<div class="mx-auto max-w-full h-screen bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">
    @if ($pertanyaans->isEmpty())
        <p class="text-gray-700 text-center">Tidak ada pertanyaan tersedia.</p>
    @else
        <h1 class="text-sm md:text-md font-bold mb-6 text-orange-900 text-center">


          <p> Soal {{ $indexJawaban +1  }} dari {{ count($pertanyaans) }}</p>

            <hr class="my-5" />
            
        </h1>
        <p hidden>Timer Soal Berjalan: <span id="timer-soal-berjalan">00:00</span></p>
        <div class="mb-6 ">

      
            <div class="w-full flex justify-center text-center">
                <div class="mb-3 flex w-64 ">
                  <div id="summernote-soal" class="summernote-editor">
                    {!! $pertanyaans[$indexJawaban]->pertanyaan !!}
                  </div>
                </div>
            </div>

            <textarea 
                wire:model="jawaban.{{ $indexJawaban }}"
                class="form-control @error('jawaban.' . $indexJawaban) is-invalid @enderror w-full h-32 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                placeholder="Tulis jawaban Anda di sini..."
            ></textarea>


            {{-- <div id="soal-durasi" class="text-md md:text-lg font-bold">00:00</div>
             --}}

             <span id="durasiSoal" >0</span>
             <span >{{ $waktuSoal }}</span>


        </div>

        <div class="flex justify-between mt-8">

            <button
                wire:click="soalSebelumnya"
                class="text-xs md:text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                {{ $indexJawaban == 0 ? 'disabled' : '' }}
            >
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


    <script>
        // Ambil waktu yang telah berlalu dari local storage, jika ada
        let elapsedTime = localStorage.getItem('elapsedTime') ? parseInt(localStorage.getItem('elapsedTime')) : 0;
    
        // Durasi asesmen dalam detik, dikurangi dengan waktu yang telah berlalu
        let countdownAssesmentTime = {{ $asesmenDurasi }} - Math.floor(elapsedTime / 1000);
        if (countdownAssesmentTime < 0) {
            countdownAssesmentTime = 0;
        }
    
        // Update tampilan durasi asesmen
        const updateDisplay = () => {
            const minutes = Math.floor(countdownAssesmentTime / 60);
            const seconds = countdownAssesmentTime % 60;
            const formattedTime = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            document.getElementById('asesmen-durasi').innerText = formattedTime;
        };
    
        // Interval untuk menghitung mundur
        const examIntervalAsesmen = setInterval(() => {
            if (countdownAssesmentTime <= 0) {
                clearInterval(examIntervalAsesmen);
                document.getElementById('asesmen-durasi').innerText = "00:00"; 
                
                // Kirim nilai ke Livewire controller
                Livewire.emit('assesmenSelesai', {{ $asesmenDurasi }}); // Ganti dengan nilai yang sesuai jika perlu
            } else {
                countdownAssesmentTime--;
                updateDisplay();
            }
    
            // Simpan waktu yang telah berlalu ke local storage
            localStorage.setItem('elapsedTime', ({{ $asesmenDurasi }} - countdownAssesmentTime) * 1000);
        }, 1000);
    
        // Tampilkan waktu saat pertama kali dimuat
        updateDisplay();
    </script>





    @script

        <script>
            document.addEventListener('livewire:initialized', () => {
                var durasiSoal = $wire.waktuSoal ;
                console.log(durasiSoal);
                
                function startCountdown(duration) {
                    let timer = duration, minutes, seconds;
                    const display = document.getElementById('durasiSoal');

                    const interval = setInterval(() => {
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
                    let durasiSoal = $wire.durasiSoal ;
                    startCountdown(durasiSoal);
                });

            })
        </script>


    @endscript


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('hentikan-waktu-soal-berjalan', () => {
                clearInterval(timerSoalBerjalanInterval);
                alert('waktu soal berjalan terhenti');
            })
        })
    </script>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    
    
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

    <style>
        .summernote-editor {
            border: 1px solid #ccc; /* Optional: Add a border for better visibility */
            padding: 10px; /* Optional: Add padding */
            border-radius: 5px; /* Optional: Add rounded corners */
        }
    </style>
    


</div>

</div>
