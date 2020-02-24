<header>
    <div class="wrapper-header">
        <span class="logo-title">
            $cratch
        </span>
        <nav class="nav-desktop">
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li class="menu-cours-li">
                    <a class="menu-cours">Les cours</a>
                    <div class="menu-list_of_cours">
                        @foreach ($menu as $m)
                            <a href="{{ url('cours/'.$m->nom_cours.'/1') }}">{{ $m->nom_cours }}</a>
                        @endforeach
                    </div>
                </li>
                <li><a href="#">FAQ</a></li>
                {!! Auth::check() ? (Auth::user()->rights == 1 ? '<li><a href="'.route('Admin').'">Admin</a>' : '') : '' !!}
                {!! Auth::check() ? '<li><a href="'.route('logout').'"><b>Déconnexion</b></a></li>' : '<li><a class="menu-connexion-button" href="#"><b>Connexion</b></a></li>' !!}
            </ul>
        </nav>
        <nav class="nav-mobile">
                <img src="{{ asset('img/nav-burger.svg') }}" alt="burger-menu"/>
                <ul class="nav-ul-mobile">
                    <img src="{{ asset('img/nav-cross.svg') }}" alt="cross-menu"/>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li class="menu-cours-li">
                        <a class="menu-cours">Les cours</a>
                        <div class="menu-list_of_cours">
                            @foreach ($menu as $m)
                                <a href="{{ url('cours/'.$m->nom_cours.'/1') }}">{{ $m->nom_cours }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li><a href="#">FAQ</a></li>
                    {!! Auth::check() ? (Auth::user()->rights == 1 ? '<li><a href="'.route('Admin').'">Admin</a>' : '') : '' !!}
                    {!! Auth::check() ? '<li><a href="'.route('logout').'"><b>Déconnexion</b></a></li>' : '<li><a class="menu-connexion-button" href="#"><b>Connexion</b></a></li>' !!}
                </ul>
            </nav>
    </div>
</header>