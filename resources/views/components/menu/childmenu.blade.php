<li class="nav-item" onclick="menu(1)">
    <a class="nav-link" href="#">
        <i class="ti-trash"></i>
        {{ $data['menu'] }} 
        @if($data['alert'] !=0)         
            <x-uikit.element.bedge :alert="$data['alert']" ></x-uikit.element.bedge>
        @endif
    </a>
</li>