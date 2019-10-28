@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4 font-weight-bold">
                Classificação Campeonato
                <div class="btn-group float-right" role="group" aria-label="Corridas">
                    @if ($racesFinish < $totalPistas)
                        <a class="btn btn-outline-success" href="{{ route('campeonatos.create', [$idSeason, $racesFinish+1]) }}" role="button"><i class="fas fa-flag-checkered"></i>
                            Próxima Corrida</a>
                    @endif
                    <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button"><i class="fas fa-trophy"></i>
                        Campeonato</a>
                </div>
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
                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-dark link-hover">
                                                <img class="rounded shadow mb-1 mr-1" src="{{ $driver->pais->image }}" height="15px">
                                                {{ $driver->nome }}
                                            </a>
                                        </td>
                                        <td class="py-1">
                                            <span class="badge badge-dark shadow-sm bordaSimples p-2" style="background-color:{{ $driver->equipe->cor }};font-size:12px;">
                                                <i>{{ $driver->numero_carro }}</i>
                                            </span>
                                        </td>
                                        <td class="py-1">
                                            <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-dark link-hover">
                                                {{ $driver->equipe->nome }}
                                            </a>
                                        </td>
                                    @endif
                                @endforeach
                                <td class="py-1">{{ $clsDriver->vitorias }}</td>
                                <td class="py-1">{{ $clsDriver->podios }}</td>
                                <td class="py-1">{{ $clsDriver->pole_positions }}</td>
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
                            <th scope="col">PILOTOS</th>
                            <th scope="col">VITÓRIAS</th>
                            <th scope="col">PONTOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $idClass=1;
                        @endphp
                        @foreach ($clsTeams as $equipe)
                            <tr>
                                <th scope="row" class="py-1 align-middle">{{ $idClass }}º</th>

                                @foreach ($teams as $team)
                                    @if ($equipe->equipe_id == $team->id)
                                        <td class="text-right py-1 align-middle">
                                            <a href="{{ route('teams.show', $team->id) }}" class="text-dark link-hover">
                                                {{ $team->nome }}
                                            </a>
                                        </td>
                                        <td class="py-1 align-middle">
                                            <div class="bgImg text-left">
                                                <a href="{{ route('teams.show', $team->id) }}" class="text-dark link-hover">
                                                    <img class="mb-1" src="/image/f1Model.png" height="15px"
                                                         style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white);">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="py-1 align-middle">
                                            @foreach (\App\Driver::where('equipe_id','=',$equipe->equipe_id)->orderby('nome')->get() as $piloto)
                                                <p class="my-0 ml-5 text-left">
                                                    <a href="{{ route('drivers.show', $piloto->id) }}" class="text-dark link-hover">
                                                        <img class="rounded shadow" src="{{ $piloto->pais->image }}" height="12px">
                                                        <i class="ml-2">{{ $piloto->nome }}</i>
                                                    </a>
                                                </p>
                                            @endforeach
                                        </td>
                                    @endif
                                @endforeach
                                <td class="py-1 align-middle">{{ $equipe->vitorias }}</td>
                                <th class="font-italic py-1 align-middle">{{ $equipe->pontos }}</th>
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
