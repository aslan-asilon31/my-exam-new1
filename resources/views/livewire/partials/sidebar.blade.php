<div>
    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

        {{-- BRAND --}}
        <x-app-brand class="p-5 pt-3" />

        {{-- MENU --}}
        <x-menu activate-by-route>

            {{-- User --}}
            <x-menu-sub title="Setting" icon="o-cog-6-tooth">
            <x-menu-item title="Profile" icon="o-user-circle" link="#" />
            <x-menu-item wire:click="logout" title="Logout" icon="o-x-circle" />
            {{-- <x-menu-item title="sample" icon="o-arrow-right-circle" link="#" /> --}}
            </x-menu-sub>
            <x-menu-separator />

            
            <x-menu-item title="Dashboard" icon="o-home" link="/"  :class="request()->is('dasbor') ? 'active' : ''" />
            <x-menu-separator title="Management" icon="o-sparkles" />
            <x-menu-item title="Asesmen Evaluator" icon="o-squares-2x2" link="/asesmen-evaluator" :class="request()->is('asesmen-evaluator') ? 'active' : ''" />
            <x-menu-item title="Penilaian Asesmen" icon="o-squares-2x2" link="/penilaian-asesmen" :class="request()->is('daftar-penilaian-asesmen-detail') || request()->is('daftar-penilaian-asesmen-crud-ubah') ? 'active' : ''" />
            <x-menu-item title="Hasil Asesmen" icon="o-squares-2x2" link="/hasil-asesmen" :class="request()->is('hasil-asesmen') ? 'active' : ''" />
            <x-menu-item title="Pengguna" icon="o-squares-2x2" link="/pengguna" :class="request()->is('pengguna') ? 'active' : ''" />
        </x-menu>
    </x-slot:sidebar>
</div>