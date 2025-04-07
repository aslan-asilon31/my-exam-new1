
<div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


  <x-card :title="$title"  :url="$url" shadow separator class="border shadow">

    <div class="grid grid-cols-2 mb-4">
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
    </div>


    <x-form wire:submit="{{ $id ? 'ubah' : 'simpan' }}" wire:confirm="Are you sure?">
        <div id="judul-asesmen">


          <div class="mb-3">
            <x-input wire:model="masterForm.id" id="masterForm.id" name="masterForm.id" placeholder="Id" hidden />
          </div>

          <div class="mb-3">
            <x-input label="Judul" wire:model.blur="masterForm.judul" id="masterForm.judul" name="masterForm.judul" placeholder="Judul" />
          </div>

          <div class="mb-3">
            <x-textarea
              label="Deskripsi"
              id="summerNoteEditor"
              wire:model="masterForm.deskripsi"
              placeholder="Deskripsi"
              hint="Max 1000 chars"
              rows="5"
            inline />
          </div>





          <div class="mb-3">
            <x-datetime label="Tanggal Mulai" wire:model="masterForm.tgl_mulai" icon="o-calendar" type="datetime-local"/>
          </div>

          <div class="mb-3">
            <x-datetime label="Tanggal Selesai" wire:model="masterForm.tgl_selesai" icon="o-calendar" type="datetime-local"/>
          </div>


          <div class="mb-3">
            <x-choices-offline wire:model="masterForm.apa_aktif" label="Apakah Aktif ?" :options="[['id' => 0, 'name' => 'Tidak Aktif'], ['id' => 1, 'name' => 'Aktif']]" single searchable
              :readonly="$isReadonly" />
          </div>


        </div>

      @if (!$isReadonly)
        <div class="text-center mt-3">
          <x-errors class="text-white mb-3" />
          <x-button type="submit" :label="$id ? 'ubah' : 'Simpan'" class="btn-success btn-sm text-white" />
        </div>
      @endif


    </x-form>


    <x-menu-separator />

    @if($id)
      <x-form wire:submit="{{ $idSoal ? 'ubahSoal' : 'simpanSoal' }}" wire:confirm="Are you sure?">
        <div class="text-center mt-3">
          Soal
        </div>
        <x-menu-separator />

          <div id="pertanyaan">



            <div class="mb-3">
              <x-textarea
                  label="Pertanyaan"
                  wire:model="masterSoalForm.pertanyaan"
                  placeholder="Pertanyaan"
                  hint="Max 1000 chars"
                  rows="5"
              />
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
                <x-button type="submit" :label="$idSoal ? 'ubah' : 'Simpan'" class="btn-success btn-sm text-white" />
              </div>
            @endif

          </div>
      </x-form>
    @endif



  </x-card>


  <script>
    // Initialize SummerNote after Livewire loads
    document.addEventListener('livewire:load', function () {
        try {
            $('#summerNoteEditor').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus:true,
                
                 callbacks:{
                     onImageUpload:function(files){
                         for(let i=0;i<files.length;i++){
                             sendFile(files[i],this);
                         }
                     }
                 }
            });
        } catch (error) {
            console.error('Failed to initialize SummerNote:', error);
        }
    });
    
    // Function to handle image upload via AJAX
    function sendFile(file, editor) {
        let data = new FormData();
        data.append("file", file);
        
        $.ajax({
            data:data,
            type:"POST",
            url:"/upload-image", // Your endpoint here 
            cache:false,
            contentType:false,
            processData:false,
    
           success:function(url){
               $('#summerNoteEditor').summernote('insertImage', url); // Insert uploaded image URL into editor 
           },
           error:function(data){
               console.error('Failed to upload image:',data); // Handle errors appropriately 
           }
       });
    }
    </script>

</div>
