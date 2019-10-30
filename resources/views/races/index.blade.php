@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">
                Grande Prêmio de <i class="font-weight-bold">{{ $pista->nome }}</i>
                <a class="btn btn-outline-light float-right" href="{{ route('races.show', [$idSeason, $idTrack]) }}" role="button">
                    <i class="fas fa-table"></i>
                    Resultados</a>
                <img class="rounded shadow" src="{{ $pista->pais->image }}" height="40px"  data-toggle="tooltip" data-placement="right" title="{{ $pista->pais->nome_pt }}">
            </h1>
            <hr class="bg-danger">

            <div class="row justify-content-center">
                <div class="jumbotron bg-black p-3 border border-warning shadow">
                    <table class="text-center text-white">
                        <tr>
                            <td>
                                <img class="h-75" src="{{ asset('image/figuras/2nd.png') }}" height="">
                            </td>
                            <td>
                                <img class="h-75" src="{{ asset('image/figuras/1st.png') }}" alt="">
                            </td>
                            <td>
                                <img class="h-75" src="{{ asset('image/figuras/3rd.png') }}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="p-0 align-middle">
                                @foreach ($drivers as $driver)
                                    @if ($driver->id == $segundo->piloto_id)
                                        <h5 class="font-weight-light">
                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                <img class="rounded shadow m-0" src="{{ $driver->pais->image }}" height="20px">
                                                {{ $driver->nome }}
                                            </a>
                                            <hr class="bg-danger my-2">
                                        </h5>
                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                            <p class="my-0">{{ $driver->equipe->nome }}</p>
                                            <div class="bgImg">
                                                <img src="/image/f1Model.png" height="20px"
                                                     style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">
                                            </div>
                                        </a>
                                        <p class="font-weight-bold font-italic mt-1 my-0">{{ $segundo->pontos }} pontos</p>
                                    @endif
                                @endforeach
                            </td>
                            <td class="p-0 align-middle border-left border-right border-danger">
                                @foreach ($drivers as $driver)
                                    @if ($driver->id == $primeiro->piloto_id)
                                        <h5 class="font-weight-light">
                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                <img class="rounded shadow m-0" src="{{ $driver->pais->image }}" height="20px">
                                                <b>{{ $driver->nome }}</b>
                                            </a>
                                            <hr class="bg-danger my-2">
                                        </h5>
                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                            <p class="my-0">{{ $driver->equipe->nome }}</p>
                                            <div class="bgImg">
                                                <img src="/image/f1Model.png" height="20px"
                                                     style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">
                                            </div>
                                        </a>
                                        <p class="font-weight-bold font-italic mt-1 my-0">{{ $primeiro->pontos }} pontos</p>
                                    @endif
                                @endforeach
                            </td>
                            <td class="p-0 align-middle">
                                @foreach ($drivers as $driver)
                                    @if ($driver->id == $terceiro->piloto_id)
                                        <h5 class="font-weight-light">
                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-white link-hover2">
                                                <img class="rounded shadow m-0" src="{{ $driver->pais->image }}" height="20px">
                                                {{ $driver->nome }}
                                            </a>
                                            <hr class="bg-danger my-2">
                                        </h5>
                                        <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-white link-hover2">
                                            <p class="my-0">{{ $driver->equipe->nome }}</p>
                                            <div class="bgImg">
                                                <img src="/image/f1Model.png" height="20px"
                                                     style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                    drop-shadow(2px 9999px 1px white)
                                                                    drop-shadow(-2px 9999px 1px white);">

                                            </div>
                                        </a>
                                        <p class="font-weight-bold font-italic mt-1 my-0">{{ $terceiro->pontos }} pontos</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center shadow">
                    <thead class="bg-danger text-light">
                        <tr>
                            <th scope="col"><i class="fas fa-flag-checkered"></i> POSIÇÃO</th>
                            <th colspan="2" scope="col"><i class="fas fa-hard-hat"></i> PILOTO</th>
                            <th scope="col">#</th>
                            <th colspan="2" scope="col"><i class="fas fa-users"></i> EQUIPE</th>
                            <th scope="col"><i class="fas fa-table"></i> PONTOS</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach ($races as $race)
                            <tr
                            @switch($race->pontos)
                                @case($primeiro->pontos)
                                    style="background-color:#fafa75;cursor:pointer"
                                    onMouseOver="this.style.backgroundColor='#fcfc32'"
                                    onMouseOut="this.style.backgroundColor='#fafa75'"
                                    @break
                                @case($segundo->pontos)
                                    style="background-color:#f7f7f7;cursor:pointer"
                                    onMouseOver="this.style.backgroundColor='#e0e0e0'"
                                    onMouseOut="this.style.backgroundColor='#f7f7f7'"
                                    @break
                                @case($terceiro->pontos)
                                    style="background-color:#fcbc8b;cursor:pointer"
                                    onMouseOver="this.style.backgroundColor='#ffb073'"
                                    onMouseOut="this.style.backgroundColor='#fcbc8b'"
                                    @break
                            @endswitch
                            @if ($race->pontos==$primeiro->pontos || $race->pontos==$segundo->pontos || $race->pontos==$terceiro->pontos)
                                class="font-weight-bold"
                            @endif
                            >
                                @php($contGrid++)
                                <td class="font-weight-bold align-middle py-2" scope="row">{{ $contGrid }}º</td>
                                @foreach ($drivers as $driver)
                                    @if ($race->piloto_id == $driver->id)
                                        <td class="align-middle pl-5 py-0">
                                            <img class="rounded shadow m-0 float-right" src="{{ $driver->pais->image }}" height="20px">
                                        </td>
                                        <td class="align-middle text-left py-0"> {{-- PILOTO --}}
                                            <a href="{{ route('drivers.show', $driver->id) }}" class="text-dark link-hover">
                                                <i class="ml-1 mt-1 ">{{ $driver->nome }}</i>
                                            </a>
                                        </td>
                                        <td class="align-middle px-0 py-0">
                                            <span class="badge badge-info shadow bordaSimples p-2" style="background-color: {{ $driver->equipe->cor }};">
                                                <i>{{ $driver->numero_carro }}</i>
                                            </span>
                                        </td>
                                        <td class="align-middle py-0 text-right"> {{-- EQUIPE --}}
                                            <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-dark link-hover">
                                                {{ $driver->equipe->nome }}
                                            </a>
                                        </td>
                                        <td class="align-middle pr-5 py-0 text-left">
                                            <div class="bgImg">
                                                <a href="{{ route('teams.show', $driver->equipe->id) }}" class="text-dark link-hover">
                                                    <img class="mt-2" src="/image/f1Model.png" height="15px"
                                                         style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                                        drop-shadow(2px 9999px 1px white)
                                                                        drop-shadow(-2px 9999px 1px white);">
                                                </a>
                                            </div>
                                            {{-- <span class="badge badge-info" style="background-color:{{ $driver->equipe->cor }} !important">
                                                <i class="fas fa-car-alt"></i>
                                            </span> --}}
                                        </td>
                                    @endif
                                @endforeach
                                <td class="align-middle font-weight-bold font-italic py-0">{{ $race->pontos }}</td>
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
