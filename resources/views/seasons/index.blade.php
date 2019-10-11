@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        {{-- @foreach ($seasons as $season)
            <p>{{ $season->id }}</p>
        @endforeach --}}
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
            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center shadow">
                    <thead class="bg-danger text-light">
                        <tr class="align-middle">
                            <th scope="col">TEMPORADA</th>
                            <th scope="col"><i class="fas fa-trophy"></i> Campeão</th>
                            <th scope="col"><i class="fas fa-medal"></i> Vice-Campeão</th>
                            <th scope="col"><i class="fas fa-award"></i> Terceiro Lugar</th>
                            <th scope="col"><i class="fas fa-road"></i> CORRIDAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seasons as $season)
                            <tr>
                                <td class="font-weight-bold align-middle" scope="row">{{ $season->id }}</td>
                                <td class="align-middle">
                                    {{ $season->piloto_venc_id }}
                                    <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                        <span class="sr-only">Temporada ainda não finalizada...</span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    {{ $season->piloto_vice_id }}
                                    <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                        <span class="sr-only">Temporada ainda não finalizada...</span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    {{ $season->piloto_terc_id }}
                                    <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                        <span class="sr-only">Temporada ainda não finalizada...</span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a class="btn btn-info btn-block btn-sm text-white" href="{{ route('campeonatos.index', $season->id) }}" role="button">
                                        <i class="fas fa-flag-checkered"></i> Acompanhar
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
                                    <div class="progress rounded-0" style="height: 15px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="{{ $percConcluida }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percConcluida }}%">
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
        </div>
    </div>
</div>
@endsection
