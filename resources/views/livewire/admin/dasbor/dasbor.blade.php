<div>

    <x-card  :title="$title"  :url="$url" >

        <div class="flex items-center space-x-4">
            
            <img src="{{ Auth::user()->img_url ? Auth::user()->img_url : asset('user-no.png') }}" alt="Profile Image" class="w-16 h-16 md:w-[50px] md:h-[50px] rounded-full border border-gray-300">

            <div>
                <h1 class="text-md md:text-xl font-semibold text-gray-800">Selamat Datang, {{ Auth::user()->name }}</h1>
                <p class="text-xs md:text-sm font-semibold text-gray-600">Role: {{ $user_role }}</p>
            </div>
        </div>

        <div class="mt-6">

        </div>

    </x-card>



</div>
