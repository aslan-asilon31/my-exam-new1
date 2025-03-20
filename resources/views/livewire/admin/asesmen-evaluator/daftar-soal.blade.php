
    <div class="mb-3">
        <x-input wire:model="masterForm.id" id="masterForm.id" name="masterForm.id" placeholder="Id" hidden />
    </div>


    <div class="mb-3">
        <x-textarea
            label="Pertanyaan"
            wire:model="masterForm.pertanyaan"
            placeholder="Pertanyaan"
            hint="Max 1000 chars"
            rows="5"
        />
    </div>

    <div class="mb-3">
        <x-input label="Jenis" wire:model.blur="masterForm.jenis" id="masterForm.jenis" name="masterForm.jenis" placeholder="Jenis" />
    </div>

    <div class="mb-3">
        <x-input label="Durasi" wire:model.blur="masterForm.durasi" id="masterForm.durasi" name="masterForm.durasi" placeholder="Durasi" />
    </div>

    <div class="mb-3">
        <x-input label="Bobot" wire:model.blur="masterForm.bobot" id="masterForm.bobot" name="masterForm.bobot" placeholder="Bobot" />
    </div>

    <div class="mb-3">
        <x-input label="Dibuat oleh" wire:model.blur="masterForm.dibuat_oleh" id="masterForm.dibuat_oleh" name="masterForm.dibuat_oleh" placeholder="Dibuat oleh" />
    </div>

    <div class="mb-3">
        <x-input label="Diupdate oleh" wire:model.blur="masterForm.diupdate_oleh" id="masterForm.diupdate_oleh" name="masterForm.diupdate_oleh" placeholder="Diupdate oleh" />
    </div>

    <div class="mb-3">
        <x-datetime label="Tanggal dibuat" wire:model="masterForm.tgl_dibuat" icon="o-calendar" />
    </div>

    <div class="mb-3">
        <x-datetime label="Tanggal diupdate" wire:model="masterForm.tgl_diupdate" icon="o-calendar" />
    </div>

    <div class="mb-3">
        <x-input label="Nomor Urut" wire:model.blur="masterForm.no_urut" id="masterForm.no_urut" name="masterForm.no_urut" placeholder="Nomor Urut" />
    </div>



