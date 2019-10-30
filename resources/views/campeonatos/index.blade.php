@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <div class="row">
                <div class="col-md-12">
                        <h1 class="display-4 ml-4">Campeonato
                            <a class="btn btn-outline-light float-right" href="{{ route('seasons.index') }}" role="button"><i class="fas fa-trophy"></i>
                                Temporadas</a>
                        </h1>
                        <hr class="bg-danger">
                </div>
            </div>

            @if ($racesFinish > 0)
                @section('title') - Campeonato {{ $idSeason }} @endsection
                <div class="row align-items-end">
                    <div class="col-md-7">
                        @if ($racesFinish == $totalPistas)
                            <a href="{{ route('campeonatos.show', $idSeason) }}" class="btn btn-success mb-2 mr-2" role="button">
                                <i class="fas fa-flag-checkered"></i> Resultado do Campeonato
                            </a>
                        @else
                            <a href="{{ route('campeonatos.create', [$idSeason, $racesFinish+1]) }}" class="btn btn-success mb-2 mr-2" role="button">
                                <i class="fas fa-flag-checkered"></i> Próxima Corrida
                            </a>
                        @endif

                        <div class="btn-group" role="group" aria-label="Tabelas">
                            @if ($racesFinish < $totalPistas)
                                <a href="#" class="btn btn-outline-warning mb-2" role="button" data-toggle="modal" data-target="#TabelaCampeonato">
                                    <i class="fas fa-table"></i> Campeonato
                                </a>
                            @endif
                            <a href="#" class="btn btn-outline-warning mb-2" role="button"  data-toggle="modal" data-target="#TabelaCondutores">
                                <i class="fas fa-table"></i> Condutores
                            </a>
                            <a href="#" class="btn btn-outline-warning mb-2" role="button" data-toggle="modal" data-target="#TabelaConstrutores">
                                <i class="fas fa-table"></i> Construtores
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 text-center pl-0">
                        @php
                            $finishCamp = \App\Campeonato::where('season_id', '=', $idSeason)
                                                            ->where('terminado', '=', TRUE)->get()->count();
                            $percCampeonato = ($finishCamp * 100) / $totalPistas;
                            $percCampeonato = number_format($percCampeonato, 1, '.', '');
                        @endphp
                        <i class="font-weight-bold">Campeonato
                            @if ($percCampeonato==100)
                                Finalizado
                            @else
                                {{$percCampeonato}}% - ({{ $finishCamp }}/{{$totalPistas}})
                            @endif
                        </i>
                        <div class="progress mb-2 w-100" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="{{ $racesFinish }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percCampeonato }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-secondary table-hover text-center shadow">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="align-middle" scope="col">CORRIDA</th>
                                <th class="align-middle" scope="col"><i class="fas fa-medal"></i> VENCEDOR</th>
                                <th class="align-middle" scope="col"><i class="fas fa-stopwatch"></i> POLE-POSITION</th>
                                <th class="align-middle" scope="col"><i class="fas fa-road"></i> PISTA</th>
                                <th class="align-middle" scope="col">GRID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campeonatos as $campeonato)
                                <tr class="p-0 borderTable">
                                    <td class="font-weight-bold align-middle" scope="row">{{ $campeonato->pista_id }}</td>
                                    <td class="align-middle">
                                        @foreach (\App\Driver::where('id', '=', $campeonato->piloto_venc_id)->get() as $vencedor)
                                            <a href="{{ route('drivers.show', $campeonato->piloto_venc_id) }}" class="text-dark link-hover">
                                                <h5 class="my-0">
                                                    <img class="rounded shadow m-0" src="{{ $vencedor->pais->image }}" height="15px">
                                                    {{ $vencedor->nome }}
                                                    <span class="badge badge-dark shadow-sm bordaSimples p-2 my-0" style="font-size:12px">
                                                        <i>{{ $vencedor->numero_carro }}</i>
                                                    </span>
                                                </h5>
                                            </a>
                                            <hr class="my-2">
                                            <a href="{{ route('teams.show', $vencedor->equipe->id) }}" class="text-dark link-hover">
                                                {{ $vencedor->equipe->nome }}
                                                <div class="bgImg">
                                                    <img class="ml-1 mb-1" src="/image/f1Model.png" height="15px"
                                                    style="filter: drop-shadow(0 9999px 0 {{ $vencedor->equipe->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">

                                                </div>
                                            </a>
                                        @endforeach
                                    </td>
                                    <td class="align-middle">
                                        @foreach (\App\Driver::where('id', '=', $campeonato->piloto_pole_id)->get() as $poleposition)
                                            <a href="{{ route('drivers.show', $campeonato->piloto_pole_id) }}" class="text-dark link-hover">
                                                <h5>
                                                    <img class="rounded shadow m-0" src="{{ $poleposition->pais->image }}" height="15px">
                                                    {{ $poleposition->nome }}
                                                    <span class="badge badge-dark shadow-sm bordaSimples p-2" style="font-size:12px">
                                                        <i>{{ $poleposition->numero_carro }}</i>
                                                    </span>
                                                </h5>
                                            </a>
                                            <hr class="my-2">
                                            <a href="{{ route('teams.show', $poleposition->equipe->id) }}" class="text-dark link-hover">
                                                {{ $poleposition->equipe->nome }}
                                                <div class="bgImg">
                                                    <img class="ml-1 mb-1" src="/image/f1Model.png" height="15px"
                                                    style="filter: drop-shadow(0 9999px 0 {{ $poleposition->equipe->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">

                                                </div>
                                            </a>
                                        @endforeach
                                        {{-- <div class="spinner-grow spinner-grow-sm text-dark" role="status">
                                            <span class="sr-only">Temporada ainda não finalizada...</span>
                                        </div> --}}
                                    </td>
                                    <td class="align-middle py-1">
                                        @foreach (\App\Track::where('id', '=', $campeonato->pista_id)->get() as $track)
                                            <div class="card bg-dark border border-dark text-white shadow d-inline-block" style="width: 140px">
                                                <a href="{{ route('tracks.index') }}" class="stretched-link">
                                                    <img src="{{ $track->image_circuito }}" class="card-img-top">
                                                </a>
                                                <div class="card-img-overlay text-center d-flex flex-column justify-content-end p-0">
                                                    <h6 class="card-text bg-dark-transparente">{{ $track->nome }}
                                                        <img class="rounded shadow bordaImg mb-1" src="{{ $track->pais->image }}"
                                                            height="15px" data-toggle="tooltip" data-placement="right" title="{{ $track->pais->nome_pt }}">
                                                    </h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="align-middle">
                                        @foreach (\App\Track::where('id', '=', $campeonato->pista_id)->get() as $track)
                                            <a class="btn btn-info btn-block btn-sm text-white" href="{{ route('races.index', [$idSeason, $track->id]) }}" role="button">
                                                <i class="fas fa-eye"></i> Vizualizar
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                @section('title') - Iniciar Campeonato @endsection
                <a href="{{ route('campeonatos.create', [$idSeason, $racesFinish+1]) }}" class="btn btn-success mr-2" role="button">
                    <i class="fas fa-flag-checkered"></i> Inicar Campeonato
                </a>
                <br><br>
                <div class="alert alert-warning mt-0" role="alert">
                    <h2><i>Campeonato ainda não iniciado!</i></h2>
                    <hr>
                    <p>Clique em <b>Inicar Campeonato</b> para começar.</p>
                </div>
            @endif
            <br>
            <a class="btn btn-outline-light" href="{{ route('seasons.index') }}" role="button">Voltar</a>
        </div>
    </div>
</div>

@if ($racesFinish > 0)
<!-- Modal CAMPEONATO -->
<div class="modal fade" id="TabelaCampeonato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-75 mw-100" role="document">
        <div class="modal-content bg-dark border-danger">
            <div class="modal-header text-white text-center">
                <h4 class="display-4 text-center m-0" id="exampleModalLabel" style="font-size:40px;">Tabela Geral - <i class="font-weight-bold">CAMPEONATO</i></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light p-0">
                <div class="table-responsive m-0">
                    <table class="table table-striped table-secondary table-hover text-center m-0">
                        <thead class="bg-info text-white">
                            <tr>
                                <th class="align-middle" scope="col" rowspan="2">POSIÇÃO</th>
                                <th class="align-middle" scope="col" rowspan="2">PILOTO</th>
                                <th class="align-middle" scope="col" colspan="{{ $finishCamp }}">POSIÇÃO DA CORRIDA</th>
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
                                        {{-- <img class="rounded shadow border border-white m-0" src="{{ $track->pais->image }}" data-img="{{ $track->image_circuito }}" data-track="{{ $track->nome }}"
                                             height="15px" data-toggle="popover" data-placement="bottom" data-title="{{$track->pais->nome_pt}}"> --}}

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
                                            <td class="text-center py-1">
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
                                    <td class="py-1 align-middle font-weight-bold"><i>{{ $piloto->pontos }}</i></td>
                                </tr>
                                @php
                                    $idClass++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light float-right my-n2" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal CONDUTORES -->
<div class="modal fade" id="TabelaCondutores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-dark border-danger">
            <div class="modal-header text-white text-center">
                <h4 class="display-4 text-center m-0" id="exampleModalLabel" style="font-size:40px;">Tabela de Classificação - <i class="font-weight-bold">CONDUTORES</i></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light p-0">
                <div class="table-responsive m-0">
                    <table class="table table-striped table-secondary table-hover text-center m-0">
                        <thead class="bg-info text-white">
                            <tr>
                                <th scope="col">POSIÇÃO</th>
                                <th scope="col">PILOTO</th>
                                <th scope="col">#</th>
                                <th scope="col">EQUIPE</th>
                                <th scope="col">VITÓRIAS</th>
                                <th scope="col">PÓDIOS</th>
                                {{-- <th scope="col">POLES</th> --}}
                                <th scope="col">PONTOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                ($idClass = 1)
                            @endphp
                            @foreach ($classDrivers as $driver)
                                <tr>
                                    <th class="py-1" scope="row">{{ $idClass }}º</th>

                                    @foreach ($pilotos as $piloto)
                                        @if ($piloto->id == $driver->piloto_id)
                                            <td class="text-left font-weight-bold py-1">
                                                <a href="{{ route('drivers.show', $piloto->id) }}" class="text-dark link-hover">
                                                    <img class="rounded shadow mb-1 mr-1" src="{{ $piloto->pais->image }}" height="15px">
                                                    {{ $piloto->nome }}
                                                </a>
                                            </td>
                                            <td class="py-1">
                                                <span class="badge badge-dark shadow-sm bordaSimples p-2" style="background-color:{{ $piloto->equipe->cor }};font-size:12px;">
                                                    <i>{{ $piloto->numero_carro }}</i>
                                                </span>
                                            </td>
                                            <td class="py-1">
                                                <a href="{{ route('teams.show', $piloto->equipe->id) }}" class="text-dark link-hover">
                                                    {{ $piloto->equipe->nome }}
                                                </a>
                                            </td>
                                        @endif
                                    @endforeach
                                    <td class="py-1">{{ $driver->vitorias }}</td>
                                    <td class="py-1">{{ $driver->podios }}</td>
                                    {{-- <td>123</td> --}}
                                    <th class="font-italic py-1">{{ $driver->pontos }}</th>
                                </tr>
                                @php
                                    $idClass++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light float-right my-n2" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal CONSTRUTORES -->
<div class="modal fade" id="TabelaConstrutores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-dark border-danger">
            <div class="modal-header text-white text-center">
                <h4 class="display-4 text-center m-0" id="exampleModalLabel" style="font-size:40px;">Tabela de Classificação - <i class="font-weight-bold">CONSTRUTORES</i></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light p-0">
                <div class="table-responsive m-0">
                    <table class="table table-striped table-secondary table-hover text-center m-0">
                        <thead class="bg-info text-white">
                            <tr>
                                <th scope="col">POSIÇÃO</th>
                                <th scope="col" colspan="2">EQUIPE</th>
                                <th scope="col">PILOTOS</th>
                                <th scope="col">VITÓRIAS</th>
                                {{-- <th scope="col">PÓDIOS</th> --}}
                                <th scope="col">PONTOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $idClass=1;
                            @endphp
                            @foreach ($classTeams as $equipe)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $idClass }}º</th>

                                    @foreach ($teams as $team)
                                        @if ($equipe->equipe_id == $team->id)
                                            <td class="text-right font-weight-bold align-middle" style="cursor:pointer">
                                                <a href="{{ route('teams.show', $team->id) }}" class="text-dark link-hover">
                                                    {{ $team->nome }}
                                                </a>
                                            </td>
                                            <td class="align-middle" style="cursor:pointer">
                                                <a href="{{ route('teams.show', $team->id) }}" class="text-dark link-hover">
                                                    <div class="bgImg text-left">
                                                        <img class="mb-1" src="/image/f1Model.png" height="15px"
                                                        style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white);">

                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-1 align-middle">
                                                @foreach (\App\Driver::where('equipe_id','=',$equipe->equipe_id)->orderby('nome')->get() as $piloto)
                                                    <p class="my-0 ml-5 text-left">
                                                        <a href="{{ route('drivers.show', $piloto->id) }}" class="text-dark link-hover">
                                                            <img class="rounded shadow" src="{{ $piloto->pais->image }}" height="12px">
                                                            <i class="ml-2">{{ $piloto->nome }}</i>
                                                        </a>
                                                    </p>
                                                @endforeach
                                            </td>
                                        @endif
                                    @endforeach
                                    {{-- <td></td> --}}
                                    <td class="align-middle">{{ $equipe->vitorias }}</td>
                                    <th class="font-italic align-middle">{{ $equipe->pontos }}</th>
                                </tr>
                                @php
                                    $idClass++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light float-right my-n2" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endif
{{-- <script>
    $(document).ready(function()
        $('body').popover({{
            container: 'body',
            selector: 'img[data-toggle="popover"]',
            trigger: 'hover',
            html: true,
            animation: true,
            offset: '0 0',
            content: function () {
                    return '<table><tr><img class="m-0 border border-danger rounded" src="'+$(this).data('img') + '" width="80px"/></tr><tr class="ml-1"><i>'+$(this).data('track')+'</i></tr></table>';
            }
        })
    });
</script> --}}

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
