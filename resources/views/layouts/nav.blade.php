<nav class="navbar main-nav navbar-expand-lg sticky-top navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{url('assets/tema/images/logo-small.png')}}" alt="logo"/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Navegação') }}">
        <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            @auth()
                @if (in_array(Auth::user()->id_tipo_usuario,[\App\Constants::tipoUsuarioAdmin,\App\Constants::tipoUsuarioProfissional]))
                    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            Usuários
                        </a>
                    </li>
                @endif
                @can('view_apostas')
                    <li class="nav-item {{ Request::is('apostas') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('apostas.index') }}">
                            Histórico
                        </a>
                    </li>
                    @if (Auth::user()->id_tipo_usuario == App\Constants::tipoUsuarioAdmin)
                    <li class="nav-item {{ Request::is('apostas/gols*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('apostas.gols') }}">
                            Gols
                        </a>
                    </li>
                    @endif
                    <li class="nav-item {{ Request::is('apostas/live*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('apostas.live') }}">
                            Live
                        </a>
                    </li>
                @endcan
                @can('view_jogos')
                    <li class="nav-item {{ Request::is('jogos*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('jogos.index') }}">
                            Jogos
                        </a>
                    </li>
                @endcan
                @can('view_relatorios')
                    <li class="nav-item {{ Request::is('relatorios*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('relatorios.index') }}">
                            Relatórios
                        </a>
                    </li>
                @endcan
                @if (Auth::user()->id_tipo_usuario == App\Constants::tipoUsuarioAdmin)
                    @can('view_crons')
                        <li class="nav-item {{ Request::is('crons*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('crons.index') }}">
                                Cron
                            </a>
                        </li>
                    @endcan
                @endif
            @endauth
            <li class="nav-item {{ Request::is('pagamentos*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pagamentos.index') }}">
                    Pagamentos
                </a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                    </li>
                @endif
            @else
                @if (Auth::user()->id_tipo_usuario == App\Constants::tipoUsuarioAdmin)
                    @can('view_roles')
                        <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                🔒 Visão
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(auth()->user())
                            {{ auth()->user()->name }}
                        @endif
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
