<li> 
    <a href="javascript: void(0);"> <i data-feather="home" class="align-self-center menu-icon"></i><span>{{ $parent_menu }}</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        {{-- <x-menu.subchildmenu></x-menu.subchildmenu> --}}
        @foreach($data as $menu)
            <x-menu.childmenu :data=$menu></x-menu.childmenu>
        @endforeach
    </ul>
</li>