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
            <div id="countdown" class="text-md md:text-lg font-bold">00:00</div>
            <input type="hidden" id="value-durasi" value="{{ $pertanyaans[$currentQuestionIndex]->durasi }}">
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
                wire:click="nextQuestion"
                class="text-xs md:text-sm bg-orange-900 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Selanjutnya
            </button>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countdownElement = document.getElementById('countdown');
            const valueDurasiElement = document.getElementById('value-durasi');
            let countdownInterval;

            function startCountdown(duration) {
                let timer = duration, minutes, seconds;
                clearInterval(countdownInterval); // Clear any existing interval
                countdownInterval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    countdownElement.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(countdownInterval);
                        Livewire.dispatch('durasi-soal-selesai'); // Dispatch event when time is up
                    }
                }, 1000);
            }

            // Start countdown when the DOM content is loaded
            const initialDuration = parseInt(valueDurasiElement.value, 10);
            startCountdown(initialDuration);

            // Listen for Livewire events to restart the countdown
            Livewire.on('start-timers', () => {
                const newDuration = parseInt(valueDurasiElement.value, 10);
                startCountdown(newDuration);
            });
        });
    </script>
</div>
