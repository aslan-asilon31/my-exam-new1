

<div>
  <x-card :title="$title" shadow separator class="border shadow">

    {{-- <div class="grid grid-cols-2 mb-4">
      <div>
        <x-button label="List" link="{{ $url }}" class="btn-ghost btn-outline" />
        @if ($id)
          <x-button label="Create" link="{{ $url . '/create' }}" class="btn-ghost btn-outline" />
        @endif
  
        @if ($id && $isReadonly)
          <x-button label="Edit" link="{{ $url . '/edit/' . $id }}" class="btn-ghost btn-outline" />
        @endif
  
  
      </div>
      <div class="text-right">
        @if ($id && !$isReadonly)
          <x-button label="Delete" wire:click="delete" wire:confirm="Do you want to delete this data?"
            class="btn-ghost btn-outline text-red-500" />
        @endif
      </div>
    </div> --}}
  
    {{-- <x-product-contents.product-content-tab activatedTab="product-contents" :fieldId="$id" /> --}}
  
    
    <div class="transform transition-transform duration-300 hover:shadow-2xl hover:scale-105 bg-gray-100 p-4 rounded-md shadow-md" style="background-image: url({{ asset('bg-brown.png') }}); background-size: cover; background-position: center;">
      <div class="absolute inset-0 bg-black opacity-50 rounded-md z-1"></div>
      <div class="relative z-99 flex flex-col justify-between h-full">
          <h2 class="text-sm md:text-xl font-semibold text-white text-center">{{ $asesmen['judul'] }}</h2>
          <div class="py-4 flex flex-col md:flex-row flex-grow">
              <!-- Kolom Kiri -->
              <div class="flex-1 pr-2">
                  <div class="flex flex-col py-2">
                      <p class="text-gray-100 text-md md:text-xl">Hari :</p>
                      <p class="text-gray-100 text-sm md:text-md">
                          {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('l') }} 
                      </p>
                  </div>
                  <div class="flex flex-col py-2">
                      <p class="text-gray-100 text-md md:text-xl">Tanggal :</p>
                      <p class="text-gray-100 text-sm md:text-md">
                          {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('d F Y') }}  
                      </p>
                  </div>
                  <div class="flex flex-col py-2">
                    <p class="text-gray-100 text-md md:text-xl">Total Poin :</p>
                    <p class="text-gray-100 text-sm md:text-md">
                        {{ $totalPoints = collect($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'])->sum('poin') }}
                    </p>
                </div>
              </div>
          
              <!-- Kolom Kanan -->
              <div class="flex-1 pl-2">
                  <div class="flex flex-col py-2">
                      <p class="text-gray-100 text-md md:text-xl">Waktu :</p>
                      <p class="text-gray-100 text-sm md:text-md">
                          {{ \Carbon\Carbon::parse($asesmen['tgl_mulai'])->translatedFormat('H:i') }} WIB - {{ \Carbon\Carbon::parse($asesmen['tgl_selesai'])->translatedFormat('H:i') }} WIB
                      </p>
                  </div>
                  <div class="flex flex-col py-2">
                      <p class="text-gray-100 text-md md:text-xl">Durasi :</p>
                      <p class="text-gray-100 text-sm md:text-md">{{ $this->asesmenDurasi }}</p>
                  </div>
              </div>
          </div>
       
      </div>
    </div>
  
  
  
    <x-form wire:submit="update" class="mt-4" >
  
  
      @forelse($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'] as $index => $detail)
          <div class="col-span-full pb-8">
              <x-hr />
                <label for="jawaban_{{ $index }}" class="block text-center font-extrabold text-sm md:text-md font-medium ext-gray-900">Jawaban Soal {{ $index + 1 }}</label>
              <x-hr target="update" />
  
              <div class="w-full flex justify-center text-center">
                <div class="mb-3 flex w-64 ">
                  <div id="summernote-soal-penilaian" class="summernote-editor">
                    <h3 class="">{!! $this->ActivePenggunaAsesmens['asesmen']['pertanyaans'][$index]['pertanyaan'] ?? 'Pertanyaan tidak ditemukan' !!}</h3>
                  </div>
                </div>
              </div>
              <div class="mt-2  justify-center  text-center ">
                  <x-textarea
                      class="{{ $this->ActivePenggunaAsesmens['detail_pengguna_asesmens'][$index]['jawaban'] != null ? 'text-gray-900 border-gray-300 focus:border-indigo-600 focus:ring-indigo-600' : 'text-red-700 border-red-700 focus:border-red-700 focus:ring-red-700' }}"
                      label=" "
                      wire:model="ActivePenggunaAsesmens.detail_pengguna_asesmens.{{ $index }}.jawaban" 
                      placeholder="tidak ada jawaban"
                      hint="Max 1000 chars"
                      rows="5"
                      inline readonly/>
              </div>
              <p class="mt-3 text-sm "></p>
              <div class="sm:col-span-2 sm:col-start-1">
                  <label for="poin_{{ $index }}" class="block text-sm font-medium text-gray-900">Poin (bobot: 10)</label>
                  <div class="mt-2  ">
                      <input type="number" 
                            name="poin_{{ $index }}" 
                            id="poin_{{ $index }}" 
                            wire:model="ActivePenggunaAsesmens.detail_pengguna_asesmens.{{ $index }}.poin" 
                            class="block  rounded-md bg-white px-3 py-1.5 outline-gray-900 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm" 
                            min="0" 
                            max="10" 
                            placeholder="Masukkan poin" />
                  </div>
              </div>
              <hr class="my-5 border-t-4 border-black">
  
          </div>
      @empty
          <p>Tidak ada data pengguna.</p>
      @endforelse
  
  
  
  
      @if (!$isReadonly)
        <div class="text-center mt-3">
          <x-errors class="text-white mb-3" />
          <x-button type="submit" :label="'Update' " class="btn-success btn-sm text-white" wire:confirm="Apakah kamu yakin ingin mengubah poin?" />
        </div>
      @endif
    </x-form>
  
  
  
   
  
  
  </x-card>
   
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
  




  <style>
      .summernote-editor {
          border: 1px solid #ccc; /* Optional: Add a border for better visibility */
          padding: 10px; /* Optional: Add padding */
          border-radius: 5px; /* Optional: Add rounded corners */
      }
  </style>
  
</div>
