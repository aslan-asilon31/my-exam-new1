<div class="w-96 h-screen bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">
    @if ($pertanyaans->isEmpty())
        <p class="text-gray-700 text-center">Tidak ada pertanyaan tersedia.</p>
    @else
        <h1 class="text-sm md:text-md font-bold mb-6 text-orange-900 text-center">
            Soal {{ $currentQuestionIndex + 1 }} dari {{ count($pertanyaans) }}
        </h1>
        <div class="mb-6">
            <p class="text-gray-700 mb-4">{{ $pertanyaans[$currentQuestionIndex]->pertanyaan }}?</p>
            <textarea
                wire:model="jawaban.{{ $currentQuestionIndex }}"
                class="form-control @error('jawaban.{{ $currentQuestionIndex }}') is-invalid @enderror w-full h-32 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                placeholder="Tulis jawaban Anda di sini..."
            ></textarea>
            <div id="countdown" class="text-md md:text-lg font-bold"></div>
            <div id="value-durasi">{{ $pertanyaans[$currentQuestionIndex]->durasi }}</div>
            <input type="string" wire.model="durasi.{{ $currentQuestionIndex }}" value="{{ $pertanyaans[$currentQuestionIndex]->durasi }}?" hidden>
            <input type="string" wire.model="bobot" hidden>
        </div>

        <div class="flex justify-between mt-8">
            <button
                wire:click="previousQuestion"
                class="text-xs md:text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                {{ $currentQuestionIndex == 0 ? 'disabled' : '' }}
            >
                Sebelumnya
            </button>
            <button
                wire:click="nextQuestion" id="start-timer"
                class="text-xs md:text-sm bg-orange-900 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Selanjutnya
            </button>


            <hr>

            <div id="cek-value-durasi">{{ $pertanyaans[$currentQuestionIndex]->durasi }}</div>
<div id="countdown">00:00</div>
        </div>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countdownElement = document.getElementById('countdown');
            const startButton = document.getElementById('start-timer');
    
            // Ambil durasi dari elemen
            const duration = parseInt(document.getElementById('cek-value-durasi').innerText, 10);
    
            function startCountdown(duration) {
                let timer = duration, minutes, seconds;
                const interval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);
    
                    // Tambahkan leading zero jika perlu
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
    
                    // Tampilkan waktu yang tersisa
                    countdownElement.textContent = minutes + ":" + seconds;
    
                    // Jika timer mencapai 0, hentikan interval
                    if (--timer < 0) {
                        clearInterval(interval);
                        // countdownElement.textContent = "Waktu Habis!";
                        Livewire.dispatch('durasi-soal-selesai'); // Dispatch event
                        
                    }
                }, 1000);
            }
    
            // Tambahkan event listener untuk button
            startButton.addEventListener('click', function () {
                startCountdown(duration);
            });
        });
    </script>

    {{-- <script>
        // Mengambil durasi dari Livewire
        let duration = @json($pertanyaans[$currentQuestionIndex]->durasi);

        // Fungsi untuk memulai countdown
        function startCountdown(duration) {
            let timer = duration, minutes, seconds;
            const countdownElement = document.getElementById('countdown');

            const interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                countdownElement.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    Livewire.dispatch('durasi-soal-selesai');
                }
            }, 1000);
        }

        // Memulai countdown
        startCountdown(duration);

        // Memantau perubahan durasi
        let previousDuration = duration;
        alert(previousDuration);
        alert(newDuration);

        setInterval(() => {
            // Fetch the new duration from Livewire
            let newDuration = @json($pertanyaans[$currentQuestionIndex]->durasi);
            if (newDuration !== previousDuration) {
                previousDuration = newDuration;
                alert(previousDuration);
                alert(newDuration);
                startCountdown(newDuration);
            }
        }, 1000); // Cek setiap detik
    </script> --}}

    {{-- <script>
        let countdownElement = document.getElementById('countdown');
        let timer; // Variabel untuk menyimpan timer
    
        // Fungsi untuk memulai countdown
        function startCountdown() {
            let duration = {{ $pertanyaans[$currentQuestionIndex]->durasi }}; // Durasi dalam detik

            let timer = duration, minutes, seconds;
    
            // Update countdown setiap detik
            let interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
    
                // Tambahkan 0 di depan angka jika kurang dari 10
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
    
                countdownElement.textContent = minutes + ":" + seconds; // Tampilkan waktu
    
                // Jika waktu habis
                if (--timer < 0) {
                    clearInterval(interval); // Hentikan interval
                    Livewire.dispatch('durasi-soal-selesai'); // Dispatch event
                }
            }, 1000);
        }
    
        // Event listener untuk Livewire navigated
        document.addEventListener('livewire:navigated', () => {
            startCountdown(); // Mulai countdown
        });
    
        // Inisialisasi countdown saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', () => {
            startCountdown(); // Mulai countdown
        });
    </script> --}}
</div>
