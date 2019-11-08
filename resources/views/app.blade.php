<!doctype html>
<html lang="pt-br">
  <head>
    <title>FÓRMULA 1 @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- Scripts JS -->
    <script defer src="{{ url('/icons/js/all.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/filterImage/common.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/filterImage/paintbrush.js') }}"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="thetop"></div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ URL::asset('/image/logo_f1.png') }}" width="" height="40" class="d-inline-block align-top" alt="">
                    <span class="align-middle font-weight-bold">Fórmula 1</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-info" id="navbarToggler">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ request()->is('home*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ request()->is('seasons*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('seasons.index') }}"><i class="fas fa-flag-checkered"></i> Corridas</a>
                        </li>
                        <li class="nav-item {{ request()->is('drivers*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('drivers.index') }}"><i class="fas fa-hard-hat"></i> Pilotos</a>
                        </li>
                        <li class="nav-item dropdown {{ request()->is('teams*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ route('teams.index') }}" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-car"></i> Equipes</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('teams.index') }}">Todas Equipes</a>
                                <div class="dropdown-divider"></div>
                                @foreach (App\Team::orderby('nome')->get() as $equipe)
                                    <a class="dropdown-item" href="{{ route('teams.show', $equipe->id) }}">{{ $equipe->nome }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item {{ request()->is('tracks*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('tracks.index') }}"><i class="fas fa-road"></i> Pistas</a>
                        </li>
                        <li class="nav-item {{ request()->is('countries*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('countries.index') }}"><i class="fas fa-globe-americas"></i> Países</a>
                        </li>
                    </ul>
                    {{-- <button type="button" name="" id="" class="btn btn-outline-warning"><i class="fas fa-sign-in-alt"></i> Login</button> --}}

                    <!-- Authentication Links -->
                    @guest
                        <a class="btn btn-info" role="button" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="btn btn-outline-light ml-1" role="button" href="{{ route('register') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Cadastrar') }}</a>
                        @endif
                    @else
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-wide" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                        </div>

                        {{-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0 float-right">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul> --}}
                    @endguest
                </div>
            </div>
        </nav>

        <div class="container min-vh-100">
            <br><br>
            @yield('content')
        </div>


        {{-- RODAPÉ --}}
        <nav class="navbar sticky-bottom navbar-light bg-dark mt-4 text-white" style="background-color: #0f0f0f !important">
            <div class="container py-3">
                <button class="btn btn-outline-light mx-auto" type="button" data-toggle="collapse" data-target="#collapseSobre" role="button" aria-expanded="false" aria-controls="collapseSobre">
                    Sobre | Desenvolvimento <i class="fas fa-angle-down"></i>
                </button>
                <div class="collapse mt-3" id="collapseSobre">
                    <div class="row align-items-start border border-secondary p-3 rounded-lg">
                        <div class="col-md-6 border-right border-light">
                            <h3 class="font-weight-light text-center"><b>Sobre</b></h3>
                            <hr class="bg-light">
                            <p class="lead text-justify">
                                Projeto Web desenvolvido em PHP juntamente com framework Laravel como trabalho para disciplina de
                                Linguagem de Programação. O mesmo realiza operações de CRUD e algumas outras funcionalidades.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="font-weight-light text-center"><b>Desenvolvimento</b></h3>
                            <hr class="bg-light">
                            <div class="lead text-center p-0">
                                <p>
                                    <span class="text-muted">Desenvolvido por:</span> <i>Bruno de Andrade Luciano</i> <br>
                                    <span class="text-muted">Docente:</span> <i>Almir Camolesi</i>
                                </p>
                                <p>
                                    2º Ano - Ciência da Computação <br>
                                    2019
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="scrolltop">
            <div class="scroll shadow-lg">
                <i class="fas fa-angle-up h4 m-0"></i>
            </div>
        </div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script>
            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $('.scrolltop:hidden').stop(true, true).fadeIn();
                    // $('.scrolltop').animate({left:'-80px'},"500");
                    // return false
                } else {
                    $('.scrolltop').stop(true, true).fadeOut();
                    // return false
                }
            });
            $(function(){$(".scroll").click(function(){
                $("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");
                return false
            })})
        </script>
    </body>
</html>
