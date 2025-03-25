<div>


    <header class="bg-white shadow-md p-4 mb-10 rounded-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-sm md:text-md font-bold text-orange-900">Umedalife</h1>
            <span id="asesmen-durasi" class="font-bold text-orange-900">00:00</span>
            <x-logout-button />
        </div>
    </header>


<div class="w-96 h-screen bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">

    @if ($pertanyaans->isEmpty())
        <p class="text-gray-700 text-center">Tidak ada pertanyaan tersedia.</p>
    @else
        <h1 class="text-sm md:text-md font-bold mb-6 text-orange-900 text-center">

            Soal {{ $indexJawaban +1  }} dari {{ count($pertanyaans) }}
        </h1>
        <p hidden>Timer Soal Berjalan: <span id="timer-soal-berjalan">00:00</span></p>
        <div class="mb-6">
            <p class="text-gray-700 mb-4">{{ $pertanyaans[$indexJawaban]->pertanyaan }}?</p>

            <textarea
                wire:model="jawaban.{{ $indexJawaban }}"
                class="form-control @error('jawaban.' . $indexJawaban) is-invalid @enderror w-full h-32 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                placeholder="Tulis jawaban Anda di sini..."
            ></textarea>


            <div id="soal-durasi" class="text-md md:text-lg font-bold"> {{ $waktuSoal }}</div>

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
            document.addEventListener('livewire:init', () => {
                Livewire.on('hentikan-waktu-soal-berjalan', () => {
                    clearInterval(timerSoalBerjalanInterval);
                    alert('waktu soal berjalan terhenti');
                })
            })
        </script>
    @endscript





    <script>
        let elapsedTime = localStorage.getItem('elapsedTime') ? parseInt(localStorage.getItem('elapsedTime')) : 0;

        let countdownAssesmentTime = {{ $asesmenDurasi }} - Math.floor(elapsedTime / 1000); // Mengurangi waktu yang telah berlalu
        if (countdownAssesmentTime < 0) {
            countdownAssesmentTime = 0;
        }

        const examIntervalAsesmen = setInterval(() => {
            const minutes = Math.floor(countdownAssesmentTime / 60);
            const seconds = countdownAssesmentTime % 60;

            const formattedTime = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            document.getElementById('asesmen-durasi').innerText = formattedTime;

            elapsedTime += 1000; // Tambahkan 1 detik (1000 ms)
            localStorage.setItem('elapsedTime', elapsedTime);

            countdownAssesmentTime--;

            if (countdownAssesmentTime < 0) {
                clearInterval(examIntervalAsesmen);
                document.getElementById('asesmen-durasi').innerText = "00:00"; 
                Livewire.dispatch('assesmen-selesai', value:20);
                alert('waktu habis');
            }
        }, 1000);
    </script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('hentikan-waktu-soal-berjalan', () => {
                clearInterval(timerSoalBerjalanInterval);
                alert('waktu soal berjalan terhenti');
            })
        })
    </script>


    <script>
            let countdownSoalTime = {{ $waktuSoal }};

            const examInterval = setInterval(() => {
                const minutes = Math.floor(countdownSoalTime / 60);
                const seconds = countdownSoalTime % 60;

                const formattedTime = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                // document.getElementById('soal-durasi').textContent = formattedTime;

                countdownSoalTime--;

                if (countdownSoalTime < 0) {
                    clearInterval(examInterval);
                    document.getElementById('soal-durasi').textContent = "00:00";
                    Livewire.dispatch('durasi-soal-selesai', { value: countdownSoalTime });
                }
            }, 1000);

    </script>

</div>

</div>
