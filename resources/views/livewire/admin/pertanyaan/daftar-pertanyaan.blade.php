<x-card  shadow separator class="border shadow">
    <div class="overflow-x-auto">
        <button label="Buat" @click="$wire.modalPertanyaan = true"  class="border text-xs md:text-sm border-gray-800 text-gray-800 bg-transparent hover:bg-gray-800 hover:text-white font-semibold py-2 px-4 rounded transition duration-200"> Buat </button>

        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Action</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">ID</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Asesmen ID</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Pertanyaan</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Jenis</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Durasi</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Bobot</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Dibuat Oleh</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Diupdate Oleh</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Tanggal Dibuat</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Tanggal Diupdate</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">No Urut</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Apa Aktif</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($soals as $item)
                    <tr>
                        <td class="flex ">
                            <button label="Ubah" @click="$wire.ubah('{{ $item['id'] }}')"  class=" text-gray-800 bg-transparent hover:bg-green-800 hover:text-white font-semibold py-1 px-2 rounded transition duration-200 text-xs md:text-md"> 
                                <x-icon name="o-pencil" class="w-9 h-9 bg-green-500 text-white p-2 rounded-full" />
                            </button>
                            <button label="Hapus" @click="$wire.modalPertanyaanHapus = true" class=" text-gray-800 bg-transparent hover:bg-red-800 hover:text-white font-semibold py-1 px-2 rounded transition duration-200 text-xs md:text-md">
                                <x-icon name="o-trash" class="w-9 h-9 bg-red-500 text-white p-2 rounded-full" />
                            </button>
                            <button label="Hapus" @click="$wire.modalPertanyaanHapus = true" class=" text-gray-800 bg-transparent hover:bg-violet-800 hover:text-white font-semibold py-1 px-2 rounded transition duration-200 text-xs md:text-md">
                                <x-icon name="o-eye" class="w-9 h-9 bg-violet-500 text-white p-2 rounded-full" />
                            </button>
                        </td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->id }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->asesmen_id }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{!! $item->pertanyaan !!}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->jenis }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->durasi }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->bobot }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->dibuat_oleh }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->diupdate_oleh }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->tgl_dibuat }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->tgl_diupdate }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->no_urut }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->apa_aktif ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-modal wire:model="modalPertanyaan" class=" backdrop-blur">

            <x-form wire:submit="{{ $idSoal ? 'update' : 'simpan' }}" wire:confirm="Are you sure?">
                <div class="text-center mt-3">
                  Soal
                </div>
                <x-menu-separator />
        
                  <div id="pertanyaan">

                    {{-- 
                    <div class="mb-3">
                      <x-textarea
                          label="Pertanyaan"
                          wire:model="masterSoalForm.pertanyaan"
                          placeholder="Pertanyaan"
                          hint="Max 1000 chars"
                          rows="5"
                      />
                    </div>

                    
                     --}}

                    {{-- <div id="summernote" wire:model="masterSoalForm.pertanyaan"></div> --}}


                    <div class="form-group" wire:ignore>
                        <label for="desciption">Deskripsi</label>
                        <textarea type="text" input="masterSoalForm.pertanyaan" id="summernote" class="form-control summernote" wire:model="masterSoalForm.pertanyaan"></textarea>
                    </div>

                    <div class="mb-3">
                        <x-input label="Bobot" wire:model.blur="masterSoalForm.bobot" id="masterSoalForm.bobot" name="masterSoalForm.bobot" placeholder="Bobot" />
                    </div>
        
                    <div class="mb-3">
                        <x-input label="Nomor Urut" wire:model.blur="masterSoalForm.no_urut" id="masterSoalForm.no_urut" name="masterSoalForm.no_urut" placeholder="Nomor Urut" />
                    </div>
                    
                    <div class="mb-3">
                        <x-input type="number" label="Durasi" wire:model.blur="masterSoalForm.durasi" id="masterSoalForm.durasi" name="masterSoalForm.durasi" placeholder="Durasi" />
                    </div>
                    
                    @if (!$isReadonly)
                      <div class="text-center mt-3">
                        <x-errors class="text-white mb-3" />
                        <x-button type="submit" :label="$idSoal ? 'update' : 'Simpan'" class="btn-success btn-sm text-white" />
                      </div>
                    @endif
        
                  </div>
              </x-form>

            <x-button label="Cancel" class="text-xs md:text-sm" @click="$wire.modalPertanyaanUbah = false" />
        
        </x-modal>

        <x-modal wire:model="modalPertanyaanHapus" class="backdrop-blur text-xs md:text-sm">
            <x-button label="Cancel" @click="$wire.modalPertanyaanHapus = false" />
        </x-modal>
        
    </div>



    


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
  
  
    
    <script>
    $('.summernote').summernote({
      tabsize: 2,
      height: 200,
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
      ],
      callbacks: {

            onImageUpload: function(files) {
                alert('cek onImageUpload');
                on
              
            },
            onShow: function() {

                alert('cek onShow');


                $('.note-modal-backdrop').css({
                    'display': 'relative',
                    'z-index': '999'
                });
            }
            
           

        }




    });


        // summernote.image.upload
    $('#summernote').on('summernote.image.upload', function(we, files) {
    // upload image to server and create imgNode...
    $summernote.summernote('insertNode', imgNode);

        alert('cek onShow');

        setTimeout(function() {
            $('.note-modal-backdrop').css({
                'display': 'relative',
                'z-index': '999'
            });
            }, 100);

        });
    onImage

    </script>

</x-card>
  