@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">
                Grande Prêmio - <i class="font-weight-bold">{{ $track->nome }}</i>
                <a class="btn btn-success float-right" href="{{ route('races.index', [$idSeason, $track->id]) }}" role="button">
                    <i class="fas fa-flag-checkered"></i> Corrida
                </a>
            </h1>
            <hr class="bg-danger">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $track->image_circuito }}" class="img-fluid border border-white" width="100%" alt="Responsive image">
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td>
                                <div class="card text-center border border-white" style="width: 15rem;background-color:#000!important;">
                                    <img class="card-img-top" src="{{ $track->pais()->get()->first()->image }}">
                                    <div class="card-footer p-0">
                                        <h3>{{ $track->pais()->get()->first()->nome_pt }}</h3>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="card text-center border border-white" style="width: 15rem;background-color:#000!important;">
                                    <div class="card-body bg-secondary">
                                        <h1 class="display-3"><i>{{ $track->curvas }}</i></h1>
                                    </div>
                                    <div class="card-footer p-0">
                                        <h3>Curvas</h3>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection
