<style>
    .size-3 {
        width: 20px;
        height: 20px;
    }
</style>


<div>

    <x-card :title="$title"  :url="$url" >

        <div class="flex items-center space-x-4">

            <x-stat
                title="Asesmen Yang Sudah Diikuti"
                value="{{ count($this->jumlahAsesmenYangPernahDiikuti) }}"
                icon="o-envelope"
                tooltip="Hello"
                color="text-primary" />
        </div>

        <x-menu-separator />


        <div class="flex items-center space-x-4">
            <img src="{{ Auth::user()->img_url ? Auth::user()->img_url : asset('user-no.png') }}" alt="Profile Image" class="w-16 h-16 md:w-[50px] md:h-[50px] rounded-full border border-gray-300">

            <div>
                <h1 class="text-md md:text-xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name }}</h1>
                <p class="text-xs md:text-sm font-semibold text-gray-600">anda login sebagai {{ $user_role }}</p>
            </div>

        </div>

        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 md:w-[50px] md:h-[50px]"></div>
            <div class="pt-8">
                <div class="relative inline-block ">
                    <a href="/daftar-asesmen" class="bg-[#954832] hover:bg-[#954832] text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">
                        Mulai Asesmen
                    </a>
                    <span class="absolute top-0 right-0 transform translate-x-[50%] -translate-y-[50%] flex size-3">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#954832] opacity-75"></span>
                        <span class="relative inline-flex h-full w-full rounded-full bg-[#954832] opacity-100"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-6">

        </div>

    </x-card>
</div>
