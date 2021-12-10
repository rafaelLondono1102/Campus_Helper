<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        FOROS
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('forums.index') }}">
            VISTA GENERAL
        </a>
        @if (Auth::check())
            <a class="dropdown-item" href="{{ route('forums.create') }}">
                CREAR
            </a>
        @endif
    </div>
 </li>
