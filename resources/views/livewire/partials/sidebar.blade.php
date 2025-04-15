<div>
    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

        <x-app-brand class="p-5 pt-3" />

        <x-menu activate-by-route>

            <x-menu-sub title="Setting" icon="o-cog-6-tooth">
            <x-menu-item title="Profile" link="/profil"  :class="request()->is('profil') ? 'active' : ''" icon="o-user-circle"  />

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <x-menu-item title="Logout" wire.confirm="apakah kamu yakin ingin logout ?" icon="o-arrow-left-start-on-rectangle" link="{{ route('logout') }}"
                onclick="event.preventDefault();
                        if (confirm('Apakah kamu yakin ingin logout?')) {
                            document.getElementById('logout-form').submit();
                        }">
                    {{ __('Logout') }}
            </x-menu-item>

            </x-menu-sub>
            <x-menu-separator />

            @can('dashboard-lihat')
            <x-menu-item title="Dashboard" icon="o-presentation-chart-bar" link="/dasbor"  :class="request()->is('dasbor') ? 'active' : ''" />
            @endcan

            @can('dashboard-user-lihat')
            <x-menu-item title="Dashboard" icon="o-home" link="/dasbor-user"  :class="request()->is('dasbor') ? 'active' : ''" />
            @endcan

            @can('laporan-lihat')
            <x-menu-item title="Laporan" icon="o-book-open" link="/laporan"  :class="request()->is('laporan') ? 'active' : ''" />
            @endcan

            @if(auth()->user()->can('pengguna-lihat') || auth()->user()->can('asesmen_evaluator-lihat') || auth()->user()->can('penilaian_asesmen-lihat') || auth()->user()->can('hasil_asesmen-lihat'))
                <x-menu-separator title="Management" icon="o-sparkles" />
            @endif

            @can('asesmen_evaluator-lihat')
            <x-menu-item title="Asesmen Evaluator" icon="o-squares-2x2" link="/asesmen-evaluator" :class="request()->is('asesmen-evaluator') ? 'active' : ''" />
            @endcan

            @can('penilaian_asesmen-lihat')
            <x-menu-item title="Penilaian Asesmen" icon="o-squares-2x2" link="/penilaian-asesmen" :class="request()->is('daftar-penilaian-asesmen-detail') || request()->is('daftar-penilaian-asesmen-crud-ubah') ? 'active' : ''" />
            @endcan

            @can('hasil_asesmen-lihat')
            <x-menu-item title="Hasil Asesmen" icon="o-squares-2x2" link="/hasil-asesmen" :class="request()->is('hasil-asesmen') ? 'active' : ''" />
            @endcan

            @can('pengguna-lihat')
            <x-menu-item title="Pengguna" icon="o-squares-2x2" link="/pengguna" :class="request()->is('pengguna') ? 'active' : ''" />
            @endcan


            @if(auth()->user()->can('role-lihat') || auth()->user()->can('permission-lihat'))
                <x-menu-separator title="Role & Permission" icon="o-sparkles" />
            @endif

            @can('role-lihat')
            <x-menu-item title="Role" icon="o-squares-2x2" link="/role" :class="request()->is('role') ? 'active' : ''" />
            @endcan

            @can('permission-lihat')
            <x-menu-item title="Permission" icon="o-squares-2x2" link="/permission" :class="request()->is('permission') ? 'active' : ''" />
            @endcan




        </x-menu>
    </x-slot:sidebar>
</div>
