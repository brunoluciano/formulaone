@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">
                Grande Prêmio de {{ $pista->nome }}
                <img class="rounded shadow" src="{{ $pista->pais()->get()->first()->image }}" height="50px"  data-toggle="tooltip" data-placement="right" title="{{ $pista->pais()->get()->first()->nome_pt }}">
            </h1>
            <hr class="bg-danger">
            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center shadow">
                    <thead class="bg-danger text-light">
                        <tr>
                            <th scope="col"><i class="fas fa-flag-checkered"></i> POSIÇÃO</th>
                            <th colspan="2" scope="col"><i class="fas fa-hard-hat"></i> PILOTO</th>
                            <th scope="col">#</th>
                            <th scope="col"><i class="fas fa-users"></i> EQUIPE</th>
                            <th scope="col"><i class="fas fa-table"></i> PONTOS</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach ($races as $race)
                            <tr
                            @switch($race->pontos)
                                @case(25)
                                    style="background-color:#fafa75;cursor:pointer"
                                    onMouseOver="this.style.backgroundColor='#fcfc32'"
                                    onMouseOut="this.style.backgroundColor='#fafa75'"
                                    @break
                                @case(18)
                                    style="background-color:#f7f7f7;cursor:pointer"
                                    onMouseOver="this.style.backgroundColor='#e0e0e0'"
                                    onMouseOut="this.style.backgroundColor='#f7f7f7'"
                                    @break
                                @case(15)
                                    style="background-color:#fcbc8b;cursor:pointer"
                                    onMouseOver="this.style.backgroundColor='#ffb073'"
                                    onMouseOut="this.style.backgroundColor='#fcbc8b'"
                                    @break
                            @endswitch
                            @if ($race->pontos==25 || $race->pontos==18 || $race->pontos==15)
                                class="font-weight-bold"
                            @endif
                            >
                                @php($contGrid++)
                                <td class="font-weight-bold align-middle py-2" scope="row">{{ $contGrid }}º</td>
                                @foreach ($drivers as $driver)
                                    @if ($race->piloto_id == $driver->id)
                                        <td class="align-middle pl-5 py-0">
                                            <img class="rounded shadow m-0 float-right" src="{{ $driver->pais()->get()->first()->image }}" height="20px">
                                        </td>
                                        <td class="align-middle text-left py-0"> {{-- PILOTO --}}
                                            <i class="ml-1 mt-1 ">{{ $driver->nome }}</i>
                                        </td>
                                        <td class="align-middle px-0 py-0">
                                            <span class="badge badge-info shadow bordaSimples p-2" style="background-color: {{ $driver->equipe()->get()->first()->cor }};">
                                                <i>{{ $driver->numero_carro }}</i>
                                            </span>
                                        </td>
                                        <td class="align-middle pr-5 py-0"> {{-- EQUIPE --}}
                                            <div class="bgImg">
                                                <span class="align-right">{{ $driver->equipe()->get()->first()->nome }}</span>
                                                <img class="ml-n4 mt-2 float-right" src="/image/f1Model.png" height="15px"
                                                     style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe()->get()->first()->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">

                                            </div>
                                            {{-- <span class="badge badge-info" style="background-color:{{ $driver->equipe()->get()->first()->cor }} !important">
                                                <i class="fas fa-car-alt"></i>
                                            </span> --}}
                                        </td>
                                    @endif
                                @endforeach
                                <td class="align-middle font-weight-bold py-0">{{ $race->pontos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <a class="btn btn-outline-light" href="{{ route('campeonatos.index', $idSeason) }}" role="button">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
