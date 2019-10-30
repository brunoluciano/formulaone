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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ URL::asset('/image/logo_f1.png') }}" width="" height="40" class="d-inline-block align-top" alt="">
                <span class="align-middle font-weight-bold">Fórmula 1</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-info" id="navbarToggler">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-hard-hat"></i> Pilotos</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('/countries') }}">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('seasons.index') }}"><i class="fas fa-flag-checkered"></i> Corridas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drivers.index') }}"><i class="fas fa-hard-hat"></i> Pilotos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ route('teams.index') }}" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-car"></i> Equipes</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('teams.index') }}">Todas Equipes</a>
                                <div class="dropdown-divider"></div>
                                @foreach (App\Team::orderby('nome')->get() as $equipe)
                                    <a class="dropdown-item" href="{{ route('teams.show', $equipe->id) }}">{{ $equipe->nome }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tracks.index') }}"><i class="fas fa-road"></i> Pistas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('countries.index') }}"><i class="fas fa-globe-americas"></i> Países</a>
                        </li>
                    </ul>
                <button type="button" name="" id="" class="btn btn-outline-warning"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
            </div>
        </nav>

        <div class="container">
            <br><br>
            @yield('content')
        </div>

        {{-- RODAPÉ --}}
        {{-- <nav class="navbar fixed-bottom navbar-light bg-dark" style="background-color: #0f0f0f !important">
            <div class="container">
                <a class="navbar-brand text-white" href="#">Fixed bottom</a>
            </div>
        </nav> --}}
</body>
</html>
