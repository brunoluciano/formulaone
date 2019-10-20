@extends('app')
@section('title') - {{ $team->nome }}@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
                <h3 class="display-4 ml-4"><span class="font-weight-bold font-italic bordaLetra" style="color:{{$team->cor}};">{{ $team->nome }}</span></h3>
                <hr class="bg-danger">
                <br>
                <h4>Diretor: <span class="font-weight-bold" style="font-size: 30px;">{{ $team->diretor }}</span></h4>
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
                                            <h4 class="card-text">{{ $team->titulos }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-secondary w-50 d-inline-block border border-warning">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-4">
                                        <img class="card-img p-4" src="{{ url('image/figuras/vitorias.png') }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h2 class="card-title">Vitórias</h2>
                                            <hr class="bg-warning">
                                            <h4 class="card-text">{{ $team->vitorias }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-center bg-dark border border-white shadow" style="background-color: #262626 !important; cursor: pointer">
                            <div class="card-body p-0">
                                <img src="{{ url($team->pais->image) }}" class="card-img" alt="{{ $team->pais->nome_pt }}">
                            </div>
                            <div class="card-footer">
                                <h5 class="font-weight-bold font-italic">{{ $team->pais->nome_pt }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($driver as $drivers)
                    @if ($drivers->equipe_id == $team->id) {{-- VERIFICA SE POSSUI PILOTOS NA EQUIPE SELECIONADA --}}
                        @php ($cont++) {{-- VARIÁVEL QUE CONTA QUANTOS PILOTOS ESTÃO NA EQUIPE --}}
                    @endif
                @endforeach
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        @if ($cont > 0)
                            <h2>Pilotos <i class="fas fa-hard-hat"></i></h2>
                            <div class="row">
                                @foreach ($driver as $driver)
                                    @if ($driver->equipe_id == $team->id)
                                        <div class="col-md-6">
                                            <div class="card-group">
                                                <div class="card bg-secondary border border-warning text-white shadow">
                                                    <div class="card-header bg-success p-2 pl-3">
                                                        <table>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <a class="text-decoration-none text-white stretched-link" href="{{ route('drivers.show', $driver->id) }}">
                                                                        <span class="card-title font-weight-bold font-italic m-0" style="font-size: 25px">
                                                                            {{ $driver->nome }}
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <span class="badge badge-info shadow bordaSimples p-2 ml-2 mt-1" style="background-color: {{ $driver->equipe->cor }};">
                                                                        {{ $driver->numero_carro }}
                                                                    </span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <img class="bordaImg rounded shadow ml-2 mt-1" src="{{ url($driver->pais->image) }}" height="25px">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table text-center text-white mb-0">
                                                            <thead class="">
                                                                <tr class="font-italic">
                                                                    <th scope="col"><i class="fas fa-trophy"></i> Títulos</th>
                                                                    <th scope="col"><i class="fas fa-medal"></i> Vitórias</th>
                                                                    <th scope="col"><i class="fas fa-award"></i> Pódios</th>
                                                                    <th scope="col"><i class="fas fa-stopwatch"></i> Poles</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-warning font-weight-bold">
                                                                    <td scope="row">{{ $driver->titulos }}</td>
                                                                    <td>{{ $driver->vitorias }}</td>
                                                                    <td>{{ $driver->podios }}</td>
                                                                    <td>{{ $driver->pole_positions }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <br>
                        @else
                            <div class="alert alert-secondary" role="alert">
                                <h5>Equipe ainda não possui pilotos cadastrados</h5>
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="bg-danger">
                <br>
                <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('teams.index') }}'">Voltar</button>
            </div>
        </div>
    </div>
@endsection
