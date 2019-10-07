@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">Campeonato</h1>
            <hr class="bg-danger">
                <a href="{{-- route('campeonatos.index',) --}}" class="btn btn-success mb-2" role="button">
                    <i class="fas fa-flag-checkered"></i> Próxima Corrida
                </a>
            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center shadow">
                    <thead class="bg-danger text-light">
                        <tr>
                            <th class="align-middle" scope="col">CORRIDA</th>
                            <th class="align-middle" scope="col">Vencedor</th>
                            <th class="align-middle" scope="col">Pole-Position</th>
                            <th class="align-middle" scope="col">Pista</th>
                            <th class="align-middle" scope="col">GRID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campeonatos as $campeonato)
                            <tr>
                                @php ($contId++)
                                <td class="font-weight-bold align-middle" scope="row">{{-- $campeonato->id --}}{{ $contId }}</td>
                                <td class="align-middle">
                                    @foreach (\App\Driver::where('id', '=', $campeonato->piloto_venc_id)->get() as $pilotoVenc)
                                        {{ $pilotoVenc->nome}}
                                    @endforeach
                                    {{-- <div class="spinner-grow spinner-grow-sm text-dark" role="status">
                                        <span class="sr-only">Temporada ainda não finalizada...</span>
                                    </div> --}}
                                </td>
                                <td class="align-middle">
                                    @foreach (\App\Driver::where('id', '=', $campeonato->piloto_pole_id)->get() as $pilotoPole)
                                        {{ $pilotoPole->nome}}
                                    @endforeach
                                    {{-- <div class="spinner-grow spinner-grow-sm text-dark" role="status">
                                        <span class="sr-only">Temporada ainda não finalizada...</span>
                                    </div> --}}
                                </td>
                                <td class="align-middle py-1">
                                    @foreach (\App\Track::where('id', '=', $campeonato->pista_id)->get() as $track)
                                        <div class="card bg-dark border border-dark text-white shadow d-inline-block" style="width: 145px">
                                            <img src="{{ $track->image_circuito }}" class="card-img-top">
                                            <div class="card-img-overlay text-center d-flex flex-column justify-content-end p-0">
                                                <h5 class="card-text bg-dark-transparente">{{ $track->nome }}
                                                    <img class="rounded shadow bordaImg mb-1" src="{{ $track->pais()->get()->first()->image }}"
                                                         height="15px" data-toggle="tooltip" data-placement="right" title="{{ $track->pais()->get()->first()->nome_pt }}">
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="align-middle">
                                    @foreach (\App\Track::where('id', '=', $campeonato->pista_id)->get() as $track)
                                        <a class="btn btn-info btn-block btn-sm text-white" href="{{ route('races.index', [$idSeason, $track->id]) }}" role="button">
                                            <i class="fas fa-flag-checkered"></i> Acompanhar
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <a class="btn btn-outline-light" href="{{ route('seasons.index') }}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection
