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


            @can('dashboard-lihat');
            <x-menu-item title="Dashboard" icon="o-home" link="/dasbor"  :class="request()->is('dasbor') ? 'active' : ''" />
            @endcan

            @can('dashboard-user-lihat');
            <x-menu-item title="Dashboard" icon="o-home" link="/dasbor-user"  :class="request()->is('dasbor') ? 'active' : ''" />
            @endcan

            <x-menu-separator title="Management" icon="o-sparkles" />

            @can('asesmen_evaluator-lihat');
            <x-menu-item title="Asesmen Evaluator" icon="o-squares-2x2" link="/asesmen-evaluator" :class="request()->is('asesmen-evaluator') ? 'active' : ''" />
            @endcan

            @can('penilaian_asesmen-lihat');
            <x-menu-item title="Penilaian Asesmen" icon="o-squares-2x2" link="/penilaian-asesmen" :class="request()->is('daftar-penilaian-asesmen-detail') || request()->is('daftar-penilaian-asesmen-crud-ubah') ? 'active' : ''" />
            @endcan

            @can('hasil_asesmen-lihat');
            <x-menu-item title="Hasil Asesmen" icon="o-squares-2x2" link="/hasil-asesmen" :class="request()->is('hasil-asesmen') ? 'active' : ''" />
            @endcan

            @can('pengguna-lihat');
            <x-menu-item title="Pengguna" icon="o-squares-2x2" link="/pengguna" :class="request()->is('pengguna') ? 'active' : ''" />
            @endcan

            <x-menu-separator title="Role & Permission" icon="o-sparkles" />

            @can('role-lihat');
            <x-menu-item title="Role" icon="o-squares-2x2" link="/role" :class="request()->is('role') ? 'active' : ''" />
            @endcan

            @can('permission-lihat');
            <x-menu-item title="Permission" icon="o-squares-2x2" link="/permission" :class="request()->is('permission') ? 'active' : ''" />
            @endcan
        </x-menu>
    </x-slot:sidebar>
</div>
