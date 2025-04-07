<div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
 
  <x-card :title="$title" shadow separator class="border shadow">
  
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
      
  
      <x-tabs wire:model="selectedTab" class="h-screen">
          <x-tab name="asesmen-tab" label="Asesmen" icon="o-users" class="h-screen">
              
              <x-form wire:submit="update" wire:confirm="Are you sure?">
                  <div id="judul-asesmen">
          
                    <div class="mb-3">
                      <x-input type="" wire:model="masterForm.id" id="masterForm.id" name="masterForm.id" placeholder="Id" hidden />
                    </div>
                    
                    <div class="mb-3">
                      <x-input label="Judul" wire:model.blur="masterForm.judul"  name="masterForm.judul" placeholder="Judul" />
                    </div>
                    
                    <div class="mb-3">
                      <x-markdown 
                          label="Deskripsi"
                          wire:model="masterForm.deskripsi"
                          placeholder="Deskripsi"
                          hint="Max 1000 chars"
                          rows="5"
                      >
                      </x-markdown>
                  </div>
                  
                 
                    <div class="mb-3">
                      <x-datetime label="Tanggal Mulai" wire:model="masterForm.tgl_mulai" icon="o-calendar" type="datetime-local"/>
                    </div>
          
                    <div class="mb-3">
                      <x-datetime label="Tanggal Selesai" wire:model="masterForm.tgl_selesai" icon="o-calendar" type="datetime-local" />
                    </div>
                    
                    
                    <div class="mb-3">
                      <x-choices-offline wire:model="masterForm.apa_aktif" label="Apakah Aktif ?" :options="[['id' => 0, 'name' => 'Tidak Aktif'], ['id' => 1, 'name' => 'Aktif']]" single searchable
                        :readonly="$isReadonly" />
                    </div>
                              
                    <div class="mb-3">
                      <x-input label="Durasi (detik)" wire:model.blur="masterForm.durasi" id="masterForm.durasi" name="masterForm.durasi" placeholder="Durasi" />
                    </div>
          
                  </div>
          
                @if (!$isReadonly)
                  <div class="text-center mt-3">
                    <x-errors class="text-white mb-3" />
                    <x-button type="submit" :label="$id ? 'ubah' : 'Simpan'" class="btn-success btn-sm text-white" />
                  </div>
                @endif
                
                
              </x-form>
  
          </x-tab>
          <x-tab name="tricks-tab" label="Soal" icon="o-sparkles">
              <livewire:admin.pertanyaan.daftar-pertanyaan/>
          </x-tab>
      </x-tabs>
  
  
  
  </x-card>
  
  <script>
    $('#summernote-deskripsi').summernote({
      tabsize: 2,
      height: 120,
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
  </script>


</div>