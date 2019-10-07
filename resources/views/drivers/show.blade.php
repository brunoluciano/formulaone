@extends('app')
@section('title') - {{ $driver->nome }} @endsection
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
                <table>
                    <tr>
                        <td class="align-middle">
                            <h1 class="display-4">
                                <span class="font-weight-bold font-italic">{{ $driver->nome }}</span>
                            </h1>
                        </td>
                        <td class="align-middle">
                            <h1 class="m-0">
                                <span class="badge badge-info shadow bordaSimples p-2 ml-3" style="background-color: {{ $driver->equipe()->get()->first()->cor }};">
                                    {{ $driver->numero_carro }}
                                </span>
                            </h1>
                        </td>
                    </tr>
                </table>


                </h1>
                <hr class="bg-danger">
                <br>
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="card bg-secondary w-50 d-inline-block border border-warning">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img class="card-img ml-3" src="{{ url('image/figuras/titulos.png') }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h2 class="card-title">Títulos</h2>
                                            <hr class="bg-warning">
                                            <h4 class="card-text">{{ $driver->titulos }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-secondary w-50 d-inline-block border border-warning">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-4 align-middle">
                                        <img class="card-img p-4" src="{{ url('image/figuras/vitorias.png') }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h2 class="card-title">Vitórias</h2>
                                            <hr class="bg-warning">
                                            <h4 class="card-text">{{ $driver->vitorias }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card bg-secondary w-50 d-inline-block border border-warning">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-4">
                                        <img class="card-img mt-5" src="{{ url('image/figuras/podios.png') }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h2 class="card-title">Pódios</h2>
                                            <hr class="bg-warning">
                                            <h4 class="card-text">{{ $driver->podios }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-secondary w-50 d-inline-block border border-warning">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-4">
                                        <img class="card-img p-3" src="{{ url('image/figuras/pole_positions.png') }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h2 class="card-title">Pole Positions</h2>
                                            <hr class="bg-warning">
                                            <h4 class="card-text">{{ $driver->pole_positions }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-center bg-dark border border-white shadow" style="background-color: #262626 !important; cursor: pointer">
                            <div class="card-body p-0">
                                <img src="{{ url($driver->pais()->get()->first()->image) }}" class="card-img" alt="{{ $driver->pais()->get()->first()->nome_pt }}">
                            </div>
                            <div class="card-footer">
                                <h5 class="font-weight-bold font-italic">{{ $driver->pais()->get()->first()->nome_pt }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row align-items-end">
                    <h4 class="">Equipe Atual:</h4>
                    <a class="btn btn-outline-secondary ml-2 btnBorda" href="{{ route('teams.show', $driver->equipe()->get()->first()->id) }}" role="button" style="color: {{ $driver->equipe()->get()->first()->cor }} !important; border-color: {{ $driver->equipe()->get()->first()->cor }} !important;">
                        <table>
                            <tr>
                                <td class="align-middle"><span class="font-weight-bold" style="font-size: 25px">{{ $driver->equipe()->get()->first()->nome }}</span></td>
                                <td class="align-middle"><img class="rounded shadow ml-2" src="{{ url($driver->equipe()->get()->first()->pais()->get()->first()->image) }}" height="20px"></td>
                            </tr>
                        </table>
                    </a>
                </div>
                <hr class="bg-danger">
                <br>
                <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('drivers.index') }}'">Voltar</button>
            </div>
        </div>
    </div>
@endsection
