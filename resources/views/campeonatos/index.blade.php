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
                            <a href="#" class="btn btn-outline-warning mb-2" role="button" data-toggle="modal" data-target="#TabelaCampeonato">
                                <i class="fas fa-table"></i> Campeonato
                            </a>
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
                                    {{-- @php ($contId++)@endphp --}}
                                    <td class="font-weight-bold align-middle" scope="row">{{-- $campeonato->id --}}{{ $campeonato->pista_id }}</td>
                                    <td class="align-middle">
                                        @foreach (\App\Driver::where('id', '=', $campeonato->piloto_venc_id)->get() as $vencedor)
                                            <h5>
                                                <img class="rounded shadow m-0" src="{{ $vencedor->pais()->get()->first()->image }}" height="15px">
                                                {{ $vencedor->nome }}
                                                <span class="badge badge-dark shadow-sm bordaSimples p-2" style="font-size:12px">
                                                    <i>{{ $vencedor->numero_carro }}</i>
                                                </span>
                                            </h5>
                                            <hr class="my-2">
                                            {{ $vencedor->equipe()->get()->first()->nome }}
                                            <div class="bgImg">
                                                <img class="ml-1 mb-1" src="/image/f1Model.png" height="15px"
                                                style="filter: drop-shadow(0 9999px 0 {{ $vencedor->equipe()->get()->first()->cor }})
                                                                drop-shadow(2px 9999px 1px white)
                                                                drop-shadow(-2px 9999px 1px white);">

                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="align-middle">
                                        @foreach (\App\Driver::where('id', '=', $campeonato->piloto_pole_id)->get() as $poleposition)
                                            <h5>
                                                <img class="rounded shadow m-0" src="{{ $poleposition->pais()->get()->first()->image }}" height="15px">
                                                {{ $poleposition->nome }}
                                                <span class="badge badge-dark shadow-sm bordaSimples p-2" style="font-size:12px">
                                                    <i>{{ $poleposition->numero_carro }}</i>
                                                </span>
                                            </h5>
                                            <hr class="my-2">
                                            {{ $poleposition->equipe()->get()->first()->nome }}
                                            <div class="bgImg">
                                                <img class="ml-1 mb-1" src="/image/f1Model.png" height="15px"
                                                style="filter: drop-shadow(0 9999px 0 {{ $poleposition->equipe()->get()->first()->cor }})
                                                                drop-shadow(2px 9999px 1px white)
                                                                drop-shadow(-2px 9999px 1px white);">

                                            </div>
                                        @endforeach
                                        {{-- <div class="spinner-grow spinner-grow-sm text-dark" role="status">
                                            <span class="sr-only">Temporada ainda não finalizada...</span>
                                        </div> --}}
                                    </td>
                                    <td class="align-middle py-1">
                                        @foreach (\App\Track::where('id', '=', $campeonato->pista_id)->get() as $track)
                                            <div class="card bg-dark border border-dark text-white shadow d-inline-block" style="width: 140px">
                                                <img src="{{ $track->image_circuito }}" class="card-img-top">
                                                <div class="card-img-overlay text-center d-flex flex-column justify-content-end p-0">
                                                    <h6 class="card-text bg-dark-transparente">{{ $track->nome }}
                                                        <img class="rounded shadow bordaImg mb-1" src="{{ $track->pais()->get()->first()->image }}"
                                                            height="15px" data-toggle="tooltip" data-placement="right" title="{{ $track->pais()->get()->first()->nome_pt }}">
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
    <div class="modal-dialog modal-lg" role="document">
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
                                <th scope="col" class="">POSIÇÃO</th>
                                <th scope="col">PILOTO</th>
                                <th scope="col">#</th>
                                <th scope="col">EQUIPE</th>
                                <th scope="col">PONTOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">#</td>
                                <td class="py-1">#</td>
                                <td class="py-1">#</td>
                                <td class="py-1">#</td>
                                <td class="py-1">#</td>
                            </tr>
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
                                            <td class="text-left font-weight-bold  py-1">
                                                <img class="rounded shadow mb-1 mr-1" src="{{ $piloto->pais()->get()->first()->image }}" height="15px">
                                                {{ $piloto->nome }}
                                            </td>
                                            <td class="py-1">
                                                <span class="badge badge-dark shadow-sm bordaSimples p-2" style="background-color:{{ $piloto->equipe()->get()->first()->cor }};font-size:12px;">
                                                    <i>{{ $piloto->numero_carro }}</i>
                                                </span>
                                            </td>
                                            <td class="py-1">{{ $piloto->equipe()->get()->first()->nome }}</td>
                                        @endif
                                    @endforeach
                                    <td class="py-1">#</td>
                                    <td class="py-1">#</td>
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
                                            <td class="text-right font-weight-bold align-middle">
                                                {{ $team->nome }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="bgImg text-left">
                                                    <img class="mb-1" src="/image/f1Model.png" height="15px"
                                                    style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">

                                                </div>
                                            </td>
                                            <td class="py-1 align-middle">
                                                @foreach (\App\Driver::where('equipe_id','=',$equipe->equipe_id)->orderby('nome')->get() as $piloto)
                                                    <p class="my-0 ml-5 text-left">
                                                        <img class="rounded shadow" src="{{ $piloto->pais()->get()->first()->image }}" height="12px">
                                                        <i class="ml-2">{{ $piloto->nome }}</i>
                                                    </p>
                                                @endforeach
                                            </td>
                                        @endif
                                    @endforeach
                                    {{-- <td></td> --}}
                                    <td class="align-middle">#</td>
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

@endsection
