<div class="sidebar-menu">
    <ul id="accordion-menu">
        @if (auth()->user()->hasRole('admin'))
        <x-menu.sidebar-menu-item>
            <x-slot name="link">{{route('dashboard')}}</x-slot>
            <x-slot name="icon">micon bi bi-house</x-slot>
            <x-slot name="title">Home</x-slot>
        </x-menu.sidebar-menu-item>
        <x-menu.sidebar-menu-item>
            <x-slot name="link">{{route('admin.users.index')}}</x-slot>
            <x-slot name="icon">micon bi bi-archive</x-slot>
            <x-slot name="title">Users</x-slot>
        </x-menu.sidebar-menu-item>
        @elseif (auth()->user()->hasRole('kades'))
        <x-menu.sidebar-menu-item>
            <x-slot name="link">{{route('kades.dashboard')}}</x-slot>
            <x-slot name="icon">micon bi bi-house</x-slot>
            <x-slot name="title">Home</x-slot>
        </x-menu.sidebar-menu-item>
        @elseif (auth()->user()->hasRole('staff'))
        <x-menu.sidebar-menu-item>
            <x-slot name="link">{{route('staff.dashboard')}}</x-slot>
            <x-slot name="icon">micon bi bi-house</x-slot>
            <x-slot name="title">Home</x-slot>
        </x-menu.sidebar-menu-item>
        @elseif (auth()->user()->hasRole('warga'))
        <x-menu.sidebar-menu-item>
            <x-slot name="link">{{route('warga.dashboard')}}</x-slot>
            <x-slot name="icon">micon bi bi-house</x-slot>
            <x-slot name="title">Home</x-slot>
        </x-menu.sidebar-menu-item>
        <x-menu.sidebar-menu-item>
            <x-slot name="link">{{route('warga.surat.index')}}</x-slot>
            <x-slot name="icon">micon bi bi-house</x-slot>
            <x-slot name="title">Surat</x-slot>
        </x-menu.sidebar-menu-item>
        @endif
    </ul>
</div>
