<div>

    <!-- include summernote-ko-KR -->
    <script src="lang/summernote-ko-KR.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                lang: 'ko-KR',
                placeholder: 'Hello Bootstrap 5',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    

    <div class="max-w-xl mx-auto bg-white p-8 rounded-md shadow-md transform transition-transform duration-300 hover:shadow-2xl hover:scale-105">
        <h1 class="text-sm md:text-md font-bold mb-6 text-orange-900 text-center">Soal 1</h1>
        <div id="summernote"></div>
        <div class="mb-6">
            @forelse ($pertanyaans as $pertanyaan)
                <p class="text-gray-700 mb-4">{{ $pertanyaan->pertanyaan }}?</p>
                <textarea class="w-full h-32 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Tulis jawaban Anda di sini..."></textarea>
            @empty
                -
            @endforelse
        </div>

        <div class="flex justify-between mt-8">
            <a href="/daftar-asesmen" class="text-xs md:text-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Sebelumnya
            </a>
            <a href="/konfirmasi-selesai" class="text-xs md:text-sm bg-orange-900 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Selanjutnya
            </a>
        </div>
    </div>
</div>