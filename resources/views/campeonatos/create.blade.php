@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">Grande Prêmio - <i class="font-weight-bold">{{ $track->nome }}</i></h1>
            <hr class="bg-danger">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $track->image_circuito }}" class="img-fluid border border-warning" width="100%" alt="Responsive image">
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td>
                                <div class="card text-center" style="width: 15rem;background-color:#000!important;">
                                    <img class="card-img-top" src="{{ $track->pais()->get()->first()->image }}">
                                    <div class="card-footer p-0">
                                        <h3>{{ $track->pais()->get()->first()->nome_pt }}</h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card text-center" style="width: 15rem;background-color:#000!important;">
                                    <img class="card-img-top" src="{{ $track->pais()->get()->first()->image }}">
                                    <div class="card-footer p-0">
                                        <h3>{{ $track->pais()->get()->first()->nome_pt }}</h3>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a class="btn btn-success float-right" href="{{ route('campeonatos.index', $idSeason) }}" role="button">
                                    Corrida
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br><br>
            <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection
