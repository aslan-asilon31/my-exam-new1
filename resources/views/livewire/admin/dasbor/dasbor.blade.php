<div>


    <x-card  :title="$title"  :url="$url" >


        <div class="flex items-center space-x-4 pb-2">
            <x-stat
                title="Peserta Asesmen"
                value="{{ $totalPesertaAsesmen }}"
                icon="o-envelope"
                tooltip="Hello"
                color="text-primary" class="text-md md:text-xl"/>

            <x-stat
                title="Jumlah Asesmen"
                value="{{ $totalSoalAsesmen }}"
                icon="o-envelope"
                tooltip="Hello"
                color="text-primary" class="text-md md:text-xl"/>

            <x-button wire:click="openModal" label="Tambah Peserta">
                <x-icon name="o-plus" class="w-9 h-9 text-green-500" /> Tambah Peserta 
             </x-button>
             
        </div>

        <x-menu-separator />


        <div class="mt-6">


            <div class="flex items-center space-x-4">
                <img src="{{ Auth::user()->img_url ??  asset('user-no.png') }}" alt="Profile Image" class="w-16 h-16 md:w-[50px] md:h-[50px] rounded-full border border-gray-300">
                <div>
                    <h1 class="text-md md:text-lg font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name }}</h1>
                    <p class="text-xs md:text-sm font-semibold text-gray-600">anda login sebagai {{ $user_role }}</p>
                </div>
            </div>

        </div>

    </x-card>




    <x-modal wire:model="modalUser" class=" backdrop-blur">

        <x-form wire:submit="simpan" >
            <div class="text-center mt-3">
            Tambah Peserta
            </div>
            <x-menu-separator />

            <div id="pertanyaan">

                <div class="mb-3 ">
                    <x-file wire:model="image" accept="image/*" />
                </div>

                <div class="mt-3">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() ?? 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}" alt="Image preview" class="w-full"/>
                    @else
                        <img src="{{ $masterForm->img_url  ?? 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}" alt="Image preview" class="w-full"/>
                    @endif
                </div>

                <div class="mb-3">
                    <x-input  label="Name" wire:model.blur="masterForm.name" id="masterForm.name" name="masterForm.name" placeholder="Name" />
                </div>

                <div class="mb-3">
                    <x-input label="Email" wire:model.blur="masterForm.email" id="masterForm.email" name="masterForm.email" placeholder="Email" />
                </div>

                <div class="text-center mt-3">
                    <x-errors class="text-white mb-3" />
                    <x-button type="submit" :label="'Simpan'" class="btn-success btn-sm text-white" />
                </div>

                <div wire:loading> 
                    <x-loading class="progress-primary" />
                </div>

            </div>
        </x-form>

        <x-button label="Cancel" class="text-xs md:text-sm" wire.click="closeModal" />

    </x-modal>

<x-modal wire:model="modalUserHapus" class="backdrop-blur text-xs md:text-sm">
<x-button label="Cancel" wire.click="closeModal" />
</x-modal>


@script

<script>
    document.addEventListener('livewire:initialized', () => {
        console.log('Livewire sudah siap');

        // Misalnya kamu ingin mencari elemen dengan x-loading
        document.querySelectorAll('[x-loading]').forEach(el => {
            const loadingClass = el.getAttribute('x-loading');

            // Saat komponen Livewire melakukan request, tambahkan class
            Livewire.hook('message.sent', () => {
                el.classList.add(loadingClass);
            });

            Livewire.hook('message.processed', () => {
                el.classList.remove(loadingClass);
            });
        });
    });

</script>

@endscript 
</div>
