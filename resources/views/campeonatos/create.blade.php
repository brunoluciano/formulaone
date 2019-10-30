@extends('app')
@section('title') - GP de {{ $track->nome }} @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4 ml-4">
                        Grande Prêmio de <i class="font-weight-bold">{{ $track->nome }}</i>
                        <a class="btn btn-success float-right" href="{{ route('races.index', [$idSeason, $track->id]) }}" role="button">
                            <i class="fas fa-flag-checkered"></i> Corrida
                        </a>
                    </h1>
                    <hr class="bg-danger">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('tracks.index') }}">
                        <img src="{{ $track->image_circuito }}" class="img-fluid border border-white" width="100%" alt="Responsive image">
                    </a>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless text-white">
                        <tr>
                            <td scope="row">
                                <div class="card text-center border border-white" style="width: 15rem;background-color:#000!important;">
                                    <img class="card-img-top" src="{{ $track->pais->image }}">
                                    <div class="card-footer p-0">
                                        <h3>{{ $track->pais->nome_pt }}</h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card text-center border border-white" style="width: 15rem;background-color:#000!important;min-height:183px !important;">
                                    <div class="card-body bg-secondary">
                                        <h1 class="display-3"><i>{{ $track->distancia }}<span style="font-size:35px">km</span></i></h1>
                                    </div>
                                    <div class="card-footer p-0">
                                        <h3>Distância</h3>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <div class="card text-center border border-white" style="width: 15rem;background-color:#000!important;min-height:183px !important;">
                                    <div class="card-body bg-secondary">
                                        <h1 class="display-3"><i>{{ $track->curvas }}</i></h1>
                                    </div>
                                    <div class="card-footer p-0">
                                        <h3>Curvas</h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card text-center border border-white align-middle" style="width: 15rem;background-color:#000!important;min-height:183px !important;">
                                    <div class="card-body bg-secondary px-1">
                                        @if ($track->last_win_id != NULL)
                                            @foreach ($drivers as $driver)
                                                @if ($driver->id == $track->last_win_id)
                                                <h4 class="font-weight-light">
                                                    <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                        <img class="rounded shadow mb-1" src="{{ $driver->pais->image }}" height="12px">
                                                        <i>{{ $driver->nome }}</i>
                                                        <span class="badge badge-dark shadow-sm bordaSimples p-1" style="font-size:12px;">
                                                            <i>{{ $driver->numero_carro }}</i>
                                                        </span>
                                                    </a>
                                                </h4>
                                                <hr class="bg-dark my-1">
                                                <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                                    <p class="m-0">{{ $driver->equipe->nome }}</p>
                                                    <div class="bgImg">
                                                        <img src="/image/f1Model.png" height="15px"
                                                             style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                            drop-shadow(2px 9999px 1px white)
                                                                            drop-shadow(-2px 9999px 1px white);">
                                                    </div>
                                                </a>
                                                @endif
                                            @endforeach
                                        @else
                                            <h4 class="display-4 mt-3" style="font-size:50px">Nenhum</h4>
                                        @endif
                                    </div>
                                    <div class="card-footer p-0">
                                        <h3>Último Vencedor</h3>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="w-100"></div>
            </div>
            <br>
            <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection
