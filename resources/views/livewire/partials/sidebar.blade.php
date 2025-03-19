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
            <x-menu-item title="Asesmen" icon="o-squares-2x2" link="/admin-daftar-asesmen" :class="request()->is('admin-daftar-asesmen') ? 'active' : ''" />
            <x-menu-item title="Pertanyaan" icon="o-squares-2x2" link="/daftar-pertanyaan" :class="request()->is('daftar-pertanyaan') ? 'active' : ''" />
            <x-menu-item title="Role" icon="o-squares-2x2" link="/roles" :class="request()->is('roles') ? 'active' : ''" />
            <x-menu-item title="Permission" icon="o-squares-2x2" link="/permission" :class="request()->is('permissions') ? 'active' : ''" />
            <x-menu-item title="Pengguna" icon="o-squares-2x2" link="/pengguna" :class="request()->is('pengguna') ? 'active' : ''" />
    
        </x-menu>
    </x-slot:sidebar>
</div>