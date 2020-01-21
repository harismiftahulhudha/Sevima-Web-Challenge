<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Instagram</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @auth
                <li><a href="#modal1" class="modal-trigger"><i class="material-icons">search</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Postingan<i
                            class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i
                            class="material-icons right">arrow_drop_down</i></a></li>
            @else
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @endauth
        </ul>
    </div>
</nav>

<ul id="dropdown2" class="dropdown-content">
    <li><a href="{{ route('post.index') }}">Lihat Postingan</a></li>
    <li><a href="{{ route('post.create') }}">Buat Posting</a></li>
</ul>

<ul id="dropdown1" class="dropdown-content">
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>

<ul id="dropdown3" class="dropdown-content">
    <li><a href="{{ route('post.index') }}">Lihat Postingan</a></li>
    <li><a href="{{ route('post.create') }}">Buat Posting</a></li>
</ul>

<ul id="dropdown4" class="dropdown-content">
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>

<ul class="sidenav" id="mobile-demo">
    @auth
        <li><a href="#modal1" class="modal-trigger">Pencarian</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Postingan<i
                    class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown4">{{ Auth::user()->name }}<i
                    class="material-icons right">arrow_drop_down</i></a></li>
    @else
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @endauth
</ul>

<div id="modal1" class="modal">
    <div class="modal-content">
        <form action="{{ route('search.index') }}" method="GET">
            <div class="input-field col s12">
                <input id="search" type="text" class="validate" required name="search">
                <label for="search">Cari User</label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">TUTUP</a>
    </div>
</div>
