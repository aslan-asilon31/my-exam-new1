
<div>



  <x-card :title="$title" shadow separator class="border shadow">
    <div id="summernote"></div>

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
</div>