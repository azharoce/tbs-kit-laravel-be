{{-- <?php dd($data);?> --}}
<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu"> 
        <x-menu.labelmenu></x-menu.labelmenu>
        @foreach($data as $parent)
            <x-menu.parentmenu :data=$parent></x-menu.parentmenu>
        @endforeach
        {{-- <hr class="hr-dashed hr-menu"> --}}
    </ul>

</div>