@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">Temporadas</h1>
            <hr class="bg-danger">
            @if ($realizandoTemporada == TRUE)
                <span tabindex="0" data-toggle="tooltip" title="Não é possível adicionar uma nova temporada pois outra já está em progresso!">
                    <a class="btn btn-success mb-2 disabled" href="#" role="button" style="pointer-events: none;"><i class="fas fa-plus"></i> Novo</a>
                </span>
            @else
                <a class="btn btn-success mb-2" href="{{ route('seasons.create') }}" role="button"><i class="fas fa-plus"></i> Novo</a>
            @endif
            @if ($seasons->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-secondary table-hover text-center shadow">
                        <thead class="bg-danger text-light">
                            <tr class="align-middle">
                                <th scope="col">TEMPORADA</th>
                                <th scope="col"><i class="fas fa-trophy"></i> Campeão</th>
                                <th scope="col"><i class="fas fa-medal"></i> Vice-Campeão</th>
                                <th scope="col"><i class="fas fa-award"></i> Terceiro Lugar</th>
                                <th scope="col"><i class="fas fa-car"></i> Construtor</th>
                                <th scope="col"><i class="fas fa-road"></i> CORRIDAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seasons as $season)
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="row">{{ $season->id }}</td>
                                    <td class="align-middle">
                                        @if ($season->piloto_venc_id != NULL)
                                            @foreach ($drivers as $driver)
                                                @if ($season->piloto_venc_id == $driver->id)
                                                    <h5 class="font-weight-bold">
                                                        {{ $driver->nome }}
                                                        <span class="badge badge-dark shadow-sm bordaSimples p-1" style="font-size:12px">
                                                            <i>{{ $driver->numero_carro }}</i>
                                                        </span>
                                                    </h5>
                                                    <hr class="my-1">
                                                    <p class="mb-0 font-italic">{{ $driver->equipe->nome }}</p>
                                                    <div class="bgImg m-0">
                                                        <img class="ml-1 mb-1" src="/image/f1Model.png" height="10px"
                                                        style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white) !important;">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Temporada ainda não finalizada...</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if ($season->piloto_vice_id != NULL)
                                            @foreach ($drivers as $driver)
                                                @if ($season->piloto_vice_id == $driver->id)
                                                    <h5>{{ $driver->nome }}
                                                        <span class="badge badge-dark shadow-sm bordaSimples p-1" style="font-size:12px">
                                                            <i>{{ $driver->numero_carro }}</i>
                                                        </span>
                                                    </h5>
                                                    <hr class="my-1">
                                                    <p class="mb-0 font-italic">{{ $driver->equipe->nome }}</p>
                                                    <div class="bgImg m-0">
                                                        <img class="ml-1 mb-1" src="/image/f1Model.png" height="10px"
                                                        style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white);">

                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Temporada ainda não finalizada...</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if ($season->piloto_terc_id != NULL)
                                            @foreach ($drivers as $driver)
                                                @if ($season->piloto_terc_id == $driver->id)
                                                    <h5>{{ $driver->nome }}
                                                        <span class="badge badge-dark shadow-sm bordaSimples p-1" style="font-size:12px">
                                                            <i>{{ $driver->numero_carro }}</i>
                                                        </span>
                                                    </h5>
                                                    <hr class="my-1">
                                                    <p class="mb-0 font-italic">{{ $driver->equipe->nome }}</p>
                                                    <div class="bgImg m-0">
                                                        <img class="ml-1 mb-1" src="/image/f1Model.png" height="10px"
                                                        style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white);">

                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Temporada ainda não finalizada...</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if ($season->construtor_id != NULL)
                                            @foreach ($teams as $team)
                                                @if ($season->construtor_id == $team->id)
                                                    <h5>{{ $team->nome }}</h5>
                                                    <hr class="my-1">
                                                    <div class="bgImg">
                                                        <img class="ml-1 mb-1" src="/image/f1Model.png" height="15px"
                                                        style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white);">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                <span class="sr-only">Temporada ainda não finalizada...</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-info btn-block btn-sm text-white" href="{{ route('campeonatos.index', $season->id) }}" role="button">
                                            @if (App\Campeonato::where('season_id','=',$season->id)
                                                            ->where('terminado','=',TRUE)->get()->count() < $totalPistas)
                                                <i class="fas fa-flag-checkered"></i> Acompanhar
                                            @else
                                                <i class="fas fa-table"></i> Resultados
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="align-middle p-0">
                                        @foreach ($campeonatos as $campeonato)
                                            @php
                                                $finishCamp = \App\Campeonato::where('season_id', '=', $season->id)
                                                                            ->where('terminado', '=', TRUE)->get()->count();
                                                $percConcluida = ($finishCamp * 100) / $totalPistas;
                                                $percConcluida = number_format($percConcluida, 1, '.', '');
                                            @endphp
                                        @endforeach
                                        <div class="progress rounded-0" style="height: 12px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" aria-valuenow="{{ $percConcluida }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percConcluida }}%">
                                                    @if ($percConcluida == 100)
                                                        <i class="font-weight-bold bordaPerc text-yellow">Temporada Finalizada</i>
                                                    @else
                                                        <i class="font-weight-bold bordaPerc text-yellow">{{ $percConcluida }}%
                                                        <div class="spinner-border spinner-border-sm text-yellow align-middle bordaPerc" role="status" style="width:10px;height:10px">
                                                            <span class="sr-only">Temporada em progresso</span>
                                                        </div>
                                                    @endif
                                                </i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning mt-0" role="alert">
                    <h2><i>Nenhuma temporada iniciada!</i></h2>
                    <hr>
                    <p>Clique em <b>Novo</b> para iniciar.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
