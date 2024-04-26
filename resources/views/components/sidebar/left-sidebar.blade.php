<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('dashboard')}}">
            <img src="{{asset('vendors/images/deskapp-logo.svg')}}" alt="" class="dark-logo" />
            <img
                src="{{asset('vendors/images/deskapp-logo-white.svg')}}"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <x-sidebar.sidebar-menu />
    </div>
</div>
