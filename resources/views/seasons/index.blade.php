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
            <a class="btn btn-success mb-2" href="{{ route('seasons.create') }}" role="button"><i class="fas fa-plus"></i> Novo</a>
            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center shadow">
                    <thead class="bg-danger text-light">
                        <tr class="align-middle">
                            <th scope="col">TEMPORADA</th>
                            <th scope="col">Campeão</th>
                            <th scope="col">Equipe</th>
                            <th scope="col">Vice-Campeão</th>
                            <th scope="col">Terceiro Lugar</th>
                            <th scope="col">CORRIDAS</th>
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
                                    <div class="progress rounded-0" style="height: 15px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                            <i class="font-weight-bold text-white">75% concluída</i>
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
