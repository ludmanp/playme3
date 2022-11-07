@if ($menu = Menus::getMenu($name))
    @if ($menulinks = $menu->menulinks->load('image') and $menulinks->count() > 0)
        @if(view()->exists('menus::public.'.$name))
            @include('menus::public.'.$name)
        @else
            <ul class="{{ $name }}-nav-list {{ $menu->class }}" role="menu">
                @foreach ($menulinks as $menulink)
                    @include('menus::public._item')
                @endforeach
            </ul>
        @endif
    @endif
@endif
