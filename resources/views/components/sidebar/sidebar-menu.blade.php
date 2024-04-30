<div class="sidebar-menu">
    <ul id="accordion-menu">
        @if (auth()->user()->hasRole('admin'))
        <x-menu.sidebar-menu-item class="no-arrow" link="{{route('admin.dashboard')}}" icon="micon bi bi-house" title="Home"/>
        <x-menu.sidebar-menu-item class="no-arrow" link="{{route('admin.users.index')}}" icon="micon bi bi-archive" title="Users"/>

        @elseif (auth()->user()->hasRole('kades'))
        <x-menu.sidebar-menu-item class="no-arrow" link="{{route('kades.dashboard')}}" icon="micon bi bi-house" title="Home"/>

        @elseif (auth()->user()->hasRole('staff'))
        <x-menu.sidebar-menu-item class="no-arrow" link="{{route('staff.dashboard')}}" icon="micon bi bi-house" title="Home"/>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-file-earmark-text"></span
                ><span class="mtext">Pengajuan</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow" link="{{route('staff.pengajuan.index')}}" icon="" title="Belum diKonfirmasi" />
                {{-- <x-menu.sidebar-menu-item class="no-arrow" link="{{route('staff.pengajuan.history')}}" icon="" title="Riwayat" /> --}}
            </ul>
        </li>

        @elseif (auth()->user()->hasRole('warga'))
        <x-menu.sidebar-menu-item class="no-arrow" link="{{route('warga.dashboard')}}" icon="micon bi bi-house" title="Home"/>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-file-earmark-text"></span
                ><span class="mtext">Surat</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow" link="{{route('warga.surat.index')}}" icon="" title="Buat Surat" />
                <x-menu.sidebar-menu-item class="no-arrow" link="{{route('warga.surat.history')}}" icon="" title="Riwayat" />
            </ul>
        </li>
        @endif
    </ul>
</div>
