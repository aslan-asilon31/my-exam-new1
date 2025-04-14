<div>

    <x-card  :title="$title"  :url="$url" >


        <div class="flex items-center space-x-4 pb-8">
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

            <x-button label="Tambah Peserta"><x-icon name="o-plus" class="w-9 h-9 text-green-500" /> Tambah Peserta </x-button>

        </div>

        <x-menu-separator />


        <div class="mt-6">


            <div class="flex items-center space-x-4">

                <img src="{{ Auth::user()->img_url ? Auth::user()->img_url : asset('user-no.png') }}" alt="Profile Image" class="w-16 h-16 md:w-[50px] md:h-[50px] rounded-full border border-gray-300">

                <div>
                    <h1 class="text-md md:text-xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name }}</h1>
                    <p class="text-xs md:text-sm font-semibold text-gray-600">anda login sebagai {{ $user_role }}</p>
                </div>
            </div>

        </div>

    </x-card>



</div>
