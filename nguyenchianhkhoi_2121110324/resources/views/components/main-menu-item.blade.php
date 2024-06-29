
@if (count($listmenu) == 0)
    <a href="/{{ $menu_item->link }}" class="nav-item nav-link">{{ $menu_item->name }}</a>
@else
    <div class="dropdown nav-item">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $menu_item->name }}</a>
        <div class="dropdown-menu rounded-0 m-0">
            @foreach ($listmenu as $item)
                <a href="/{{ $item->link }}" class="dropdown-item">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
@endif
