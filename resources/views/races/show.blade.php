@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4 font-weight-bold">
                Classificação Campeonato
                <a class="btn btn-outline-light float-right" href="{{ route('campeonatos.index', $idSeason) }}" role="button"><i class="fas fa-trophy"></i>
                    Campeonato</a>
            </h1>
            <hr class="bg-danger">
            <h3 class="ml-4"><i class="font-weight-bold">CONDUTORES</i></h3>
            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center m-0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th scope="col" class="">POSIÇÃO</th>
                            <th scope="col">PILOTO</th>
                            <th scope="col">#</th>
                            <th scope="col">EQUIPE</th>
                            <th scope="col">VITÓRIAS</th>
                            <th scope="col">PÓDIOS</th>
                            <th scope="col">POLES</th>
                            <th scope="col">PONTOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            ($idClass = 1)
                        @endphp
                        @foreach ($clsDrivers as $clsDriver)
                            <tr>
                                <th class="py-1" scope="row">{{ $idClass }}º</th>

                                @foreach ($drivers as $driver)
                                    @if ($driver->id == $clsDriver->piloto_id)
                                        <td class="text-left py-1">
                                            <img class="rounded shadow mb-1 mr-1" src="{{ $driver->pais()->get()->first()->image }}" height="15px">
                                            {{ $driver->nome }}
                                        </td>
                                        <td class="py-1">
                                            <span class="badge badge-dark shadow-sm bordaSimples p-2" style="background-color:{{ $driver->equipe()->get()->first()->cor }};font-size:12px;">
                                                <i>{{ $driver->numero_carro }}</i>
                                            </span>
                                        </td>
                                        <td class="py-1">{{ $driver->equipe()->get()->first()->nome }}</td>
                                    @endif
                                @endforeach
                                <td class="py-1">#</td>
                                <td class="py-1">#</td>
                                <td class="py-1">#</td>
                                <th class="font-italic py-1">{{ $clsDriver->pontos }}</th>
                            </tr>
                            @php
                                $idClass++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>

            <h3 class="ml-4"><i class="font-weight-bold">CONSTRUTORES</i></h3>
            <div class="table-responsive m-0">
                <table class="table table-striped table-secondary table-hover text-center m-0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th scope="col">POSIÇÃO</th>
                            <th scope="col" colspan="2">EQUIPE</th>
                            <th scope="col">VITÓRIAS</th>
                            <th scope="col">PÓDIOS</th>
                            <th scope="col">PONTOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $idClass=1;
                        @endphp
                        @foreach ($clsTeams as $equipe)
                            <tr>
                                <th scope="row">{{ $idClass }}º</th>

                                @foreach ($teams as $team)
                                    @if ($equipe->equipe_id == $team->id)
                                        <td>
                                            {{ $team->nome }}
                                        </td>
                                        <td>
                                            <div class="bgImg">
                                                <img class="ml-1 mb-1 float-left" src="/image/f1Model.png" height="15px"
                                                style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                drop-shadow(2px 9999px 1px white)
                                                                drop-shadow(-2px 9999px 1px white);">

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>#</td>
                                <td>#</td>
                                <th class="font-italic">{{ $equipe->pontos }}</th>
                            </tr>
                            @php
                                $idClass++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection
