@extends('app')
@section('title') - Resultado Campeonato {{ $idSeason }} @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 ml-4 font-weight-bold">
                            Resultado Campeonato
                            <a class="btn btn-outline-light float-right" href="{{ route('campeonatos.index', $idSeason) }}" role="button">
                                <i class="fas fa-trophy"></i>
                                Campeonato</a>
                        </h1>
                        <hr class="bg-danger">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="jumbotron bg-black p-3 border border-warning shadow">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <table class="table table-borderless text-center text-white p-0 m-0">
                                        <tr>
                                            <td>
                                                <img class="h-75" src="{{ asset('image/figuras/2nd.png') }}" height="">
                                            </td>
                                            <td>
                                                <img class="h-75" src="{{ asset('image/figuras/1st.png') }}" alt="">
                                            </td>
                                            <td>
                                                <img class="h-75" src="{{ asset('image/figuras/3rd.png') }}" alt="">
                                            </td>
                                        </tr>
                                        <tr class="border-bottom border-danger">
                                            <th class="p-0">
                                                <h4>Vice-Campeão</h4>
                                            </th>
                                            <th class="p-0 border-left border-right border-danger">
                                                <h4>CAMPEÃO</h4>
                                            </th>
                                            <th class="p-0">
                                                <h4>Terceiro</h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="p-0 align-middle">
                                                @foreach ($pilotos as $driver)
                                                    @if ($driver->id == $vice->piloto_id)
                                                        <h5 class="font-weight-light">
                                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                                <img class="rounded shadow m-0" src="{{ $driver->pais->image }}" height="20px">
                                                                {{ $driver->nome }}
                                                            </a>
                                                            <hr class="bg-danger my-2">
                                                        </h5>
                                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                                            <p class="my-0">{{ $driver->equipe->nome }}</p>
                                                            <div class="bgImg">
                                                                <img class="" src="/image/f1Model.png" height="20px"
                                                                        style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                                    drop-shadow(2px 9999px 1px white)
                                                                                    drop-shadow(-2px 9999px 1px white);">

                                                            </div>
                                                        </a>
                                                        <p class="font-weight-bold font-italic mt-1 my-0">{{ $vice->pontos }} pontos</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="p-0 align-middle border-left border-right border-danger">
                                                @foreach ($pilotos as $driver)
                                                    @if ($driver->id == $campeao->piloto_id)
                                                        <h5 class="font-weight-light">
                                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                                <img class="rounded shadow m-0" src="{{ $driver->pais->image }}" height="20px">
                                                                {{ $driver->nome }}
                                                            </a>
                                                            <hr class="bg-danger my-2">
                                                        </h5>
                                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                                            <p class="my-0">{{ $driver->equipe->nome }}</p>
                                                            <div class="bgImg">
                                                                <img class="" src="/image/f1Model.png" height="20px"
                                                                        style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                                    drop-shadow(2px 9999px 1px white)
                                                                                    drop-shadow(-2px 9999px 1px white);">

                                                            </div>
                                                        </a>
                                                        <p class="font-weight-bold font-italic mt-1 my-0">{{ $campeao->pontos }} pontos</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="p-0 align-middle">
                                                @foreach ($pilotos as $driver)
                                                    @if ($driver->id == $terceiro->piloto_id)
                                                        <h5 class="font-weight-light">
                                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                                <img class="rounded shadow m-0" src="{{ $driver->pais->image }}" height="20px">
                                                                {{ $driver->nome }}
                                                            </a>
                                                            <hr class="bg-danger my-2">
                                                        </h5>
                                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                                            <p class="my-0">{{ $driver->equipe->nome }}</p>
                                                            <div class="bgImg">
                                                                <img class="" src="/image/f1Model.png" height="20px"
                                                                        style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                                    drop-shadow(2px 9999px 1px white)
                                                                                    drop-shadow(-2px 9999px 1px white);">

                                                            </div>
                                                        </a>
                                                        <p class="font-weight-bold font-italic mt-1 my-0">{{ $terceiro->pontos }} pontos</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr class="bg-white">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="card text-white border-danger">
                                        <div class="card-header bg-dark font-weight-light font-italic text-center py-2">
                                            <h4 class="my-0">Construtor</h4>
                                        </div>
                                        <div class="card-body text-dark text-center px-0">
                                            @foreach ($teams as $team)
                                                @if ($construtor->equipe_id == $team->id)
                                                    <h4 class="card-title font-weight-light">
                                                        <a href="{{ route('teams.show', $team->id) }}" class="text-dark link-hover stretched-link">
                                                            <img class="rounded mb-1 border border-secondary" src="{{ $team->pais->image }}" height="20px">
                                                            <b>{{ $team->nome }}</b>
                                                        </a>
                                                    </h4>
                                                    <div class="bgImg">
                                                        <img src="/image/f1Model.png" height="40px"
                                                                style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                            drop-shadow(2px 9999px 1px black)
                                                                            drop-shadow(-2px 9999px 1px black);">
                                                        <br>
                                                        <i class="m-0">Diretor: <b>{{ $team->diretor }}</b></i>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="card-footer text-dark text-center border-top border-dark">
                                            <p class="font-weight-bold font-italic my-0">{{ $construtor->pontos }} pontos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white text-center border-danger">
                                        <div class="card-header bg-dark font-weight-light font-italic text-center py-2">
                                            <h4 class="my-0">Maior Vencedor</h4>
                                        </div>
                                        <div class="card-body text-dark px-0">
                                            @foreach ($pilotos as $piloto)
                                                @if ($piloto->id == $maiorVencedor->piloto_id)
                                                    <h4 class="card-title font-weight-light">
                                                        <a href="{{ route('drivers.show', $piloto->id) }}" class="text-dark link-hover">
                                                            <img class="rounded mb-1 border border-secondary" src="{{ $piloto->pais->image }}" height="20px">
                                                            <b>{{ $piloto->nome }}</b>
                                                        </a>
                                                    </h4>
                                                    <div class="bgImg m-0">
                                                        <a href="{{ route('teams.show', $piloto->equipe->id) }}" class="text-dark link-hover">
                                                            <img class="m-0" src="/image/f1Model.png" height="40px"
                                                                    style="filter: drop-shadow(0 9999px 0 {{ $piloto->equipe->cor }})
                                                                                drop-shadow(2px 9999px 1px black)
                                                                                drop-shadow(-2px 9999px 1px black);">
                                                            <br>
                                                            <i class="m-0">{{ $piloto->equipe->nome }}</i>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="card-footer text-dark text-center border-top border-dark">
                                            <p class="font-weight-bold font-italic my-0">{{ $maiorVencedor->vitorias }} vitórias</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white text-center border-danger">
                                        <div class="card-header bg-dark font-weight-light font-italic text-center py-2">
                                            <h4 class="my-0">Maior nº Poles</h4>
                                        </div>
                                        <div class="card-body text-dark px-0">
                                            @foreach ($pilotos as $piloto)
                                                @if ($piloto->id == $maiorPoles->piloto_id)
                                                    <h4 class="card-title font-weight-light">
                                                        <a href="{{ route('drivers.show', $piloto->id) }}" class="text-dark link-hover">
                                                            <img class="rounded mb-1 border border-secondary" src="{{ $piloto->pais->image }}" height="20px">
                                                            <b>{{ $piloto->nome }}</b>
                                                        </a>
                                                    </h4>
                                                    <div class="bgImg m-0">
                                                        <a href="{{ route('teams.show', $piloto->equipe->id) }}" class="text-dark link-hover">
                                                            <img class="m-0" src="/image/f1Model.png" height="40px"
                                                                    style="filter: drop-shadow(0 9999px 0 {{ $piloto->equipe->cor }})
                                                                                drop-shadow(2px 9999px 1px black)
                                                                                drop-shadow(-2px 9999px 1px black);">
                                                            <br>
                                                            <i class="m-0">{{ $piloto->equipe->nome }}</i>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="card-footer text-dark text-center border-top border-dark">
                                            <p class="font-weight-bold font-italic my-0">{{ $maiorPoles->pole_positions }} Pole-Positions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-secondary table-hover text-center m-0">
                            <thead class="bg-info text-white">
                                <tr>
                                    @php
                                        $finishCamp = \App\Campeonato::where('season_id', '=', $idSeason)
                                                                     ->where('terminado', '=', TRUE)->get()->count();
                                    @endphp
                                    <th class="align-middle" scope="col" rowspan="2">POSIÇÃO</th>
                                    <th class="align-middle" scope="col" rowspan="2">PILOTO</th>
                                    <th class="align-middle" scope="col" colspan="{{ $finishCamp }}">POSIÇÃO DA CORRIDA</th>
                                    <th class="align-middle" scope="col" rowspan="2">VITÓRIAS</th>
                                    <th class="align-middle" scope="col" rowspan="2">POLES</th>
                                    <th class="align-middle" scope="col" rowspan="2">PONTOS</th>
                                </tr>
                                <tr>
                                    @php
                                        $tracks = $tracks->take($finishCamp);
                                    @endphp
                                    @foreach ($tracks as $track)
                                        <th class="align-middle p-0" scope="col">
                                            <i class="m-0">{{ $track->id }}</i>
                                            <br>
                                            <img class="rounded shadow border border-white m-0" src="{{ $track->pais->image }}" height="15px"
                                                 data-toggle="popover" title="{{ $track->pais->nome_pt }}" data-img="{{ $track->image_circuito }}"
                                                 data-content="<table>
                                                                 <tr>
                                                                     <img class='m-0 border border-danger rounded' src='{{ $track->image_circuito }}' width='80px'/>
                                                                     <i class='ml-1'>{{ $track->nome }}</i>
                                                                 </tr>
                                                               </table>">
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    ($idClass = 1)
                                @endphp
                                @foreach ($classDrivers as $piloto)
                                    <tr>
                                        <th class="py-1 align-middle" scope="row">{{ $idClass }}º</th>
                                        @foreach ($pilotos as $driver)
                                            @if ($driver->id == $piloto->piloto_id)
                                                <td class="text-center py-1 px-0 pr-1">
                                                    <p class="font-weight-bold my-0">
                                                        <a href="{{ route('drivers.show', $driver->id) }}" class="text-dark link-hover">
                                                            <img class="rounded shadow mb-1 mr-1" src="{{ $driver->pais->image }}" height="15px">
                                                            {{ $driver->nome }}
                                                        </a>
                                                    </p>
                                                    <hr class="my-0">
                                                    <div class="bgImg">
                                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-dark link-hover">
                                                            <i>{{ $driver->equipe->nome }}</i>
                                                            <img class="ml-1" src="/image/f1Model.png" height="10px"
                                                                 style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                                drop-shadow(2px 9999px 1px white)
                                                                                drop-shadow(-2px 9999px 1px white);">
                                                        </a>
                                                    </div>
                                                </td>
                                                @foreach (\App\ScoreCamp::where('season_id','=',$idSeason)
                                                                        ->where('piloto_id','=',$driver->id)->get() as $posicao)
                                                    <td class="py-1 align-middle mx-0 px-0 border border-secondary" onclick="location.href='{{ route('races.index', [$idSeason, $posicao->track_id]) }}'"
                                                        @switch($posicao->posicao)
                                                            @case(1)
                                                                style="background-color:#fafa75;cursor:pointer;font-weight:bold;"
                                                                onMouseOver="this.style.backgroundColor='#fcfc32'"
                                                                onMouseOut="this.style.backgroundColor='#fafa75'"
                                                                @break
                                                            @case(2)
                                                                style="background-color:#f7f7f7;cursor:pointer;font-weight:bold;"
                                                                onMouseOver="this.style.backgroundColor='#e0e0e0'"
                                                                onMouseOut="this.style.backgroundColor='#f7f7f7'"
                                                                @break
                                                            @case(3)
                                                                style="background-color:#fcbc8b;cursor:pointer;font-weight:bold;"
                                                                onMouseOver="this.style.backgroundColor='#ffb073'"
                                                                onMouseOut="this.style.backgroundColor='#fcbc8b'"
                                                                @break
                                                            @case($posicao->posicao > 3 && $posicao->posicao <= 10)
                                                                style="background-color:#64bd7b;cursor:pointer;color:#fff"
                                                                onMouseOver="this.style.backgroundColor='#41ab5d'"
                                                                onMouseOut="this.style.backgroundColor='#64bd7b'"
                                                                @break
                                                            @case($posicao->posicao > 10  && $posicao->posicao <= 15)
                                                                style="background-color:#b587f5;cursor:pointer;color:#fff"
                                                                onMouseOver="this.style.backgroundColor='#9d6be3'"
                                                                onMouseOut="this.style.backgroundColor='#b587f5'"
                                                                @break
                                                            @default
                                                                style="background-color:#b362b3;cursor:pointer;color:#fff"
                                                                onMouseOver="this.style.backgroundColor='#8a3f8a'"
                                                                onMouseOut="this.style.backgroundColor='#b362b3'"
                                                                @break
                                                        @endswitch>
                                                        <i>{{ $posicao->posicao }}</i>
                                                    </td>
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <td class="py-1 align-middle"><i>{{ $piloto->vitorias }}</i></td>
                                        <td class="py-1 align-middle"><i>{{ $piloto->pole_positions }}</i></td>
                                        <td class="py-1 align-middle font-weight-bold"><i>{{ $piloto->pontos }}</i></td>
                                    </tr>
                                    @php
                                        $idClass++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                html: true,
                trigger: 'hover',
                placement: 'bottom',
                template: '<div class="popover border border-white text-center"><div class="arrow"></div><h2 class="popover-header bg-dark text-white"></h2><div class="popover-body"></div><div class="popover-footer"></div></div>'
            });
        });
    </script>
@endsection
