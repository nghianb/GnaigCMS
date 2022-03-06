<ul class="navbar-nav pt-lg-3">
    @foreach($sidebar as $item)
        <li class="nav-item {{ $item->isActivated() ? 'active' : '' }} {{ $item->hasChildren() ? ($item->isActivated() ? 'dropdown show' : 'dropdown') : '' }}">
            <a class="nav-link {{ $item->hasChildren() ? 'dropdown-toggle' : '' }}" href="{{ $item->getUrl() }}"
                @if($item->hasChildren())
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="false" role="button"
                    aria-expanded="false"
                @endif
            ><span class="nav-link-title">{{ $item->getName() }}</span></a>
            @if($item->hasChildren())
                <div class="dropdown-menu {{ $item->isActivated() ? 'show' : '' }}">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                            @foreach($item->getChildren() as $item)
                                <a href="{{ $item->getUrl() }}"
                                   class="dropdown-item {{ $item->isActivated() ? 'active' : '' }}"
                                >{{ $item->getName() }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>
