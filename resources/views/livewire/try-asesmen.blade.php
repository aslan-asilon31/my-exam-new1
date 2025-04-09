<div>
{{ $indexSoalAsesmen +1 }} <br >
    <span id="durasiSoal" >0</span>

    {{-- @forelse($questions as $question)

        <div></div>
         <p>{{ $question->text }}</p>
         <p>Durasi {{ $question->duration }}</p>
         
         <div>
             @if ($currentQuestionIndex > 0)
                 <button wire:click="soalSebelumnya">Previous</button>
             @endif

             @if ($currentQuestionIndex < count($questions) -1)
                 <button wire:click="halamanSelanjutnya">Next</button>
             @endif  
         </div>

     @empty  
         <p>No more questions available.</p>  
     @endforelse  --}}

</div>


@script
    <script>

        document.addEventListener('livewire:initialized', () => {
            var durasiSoal = $wire.durasiSoal ;
            
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
