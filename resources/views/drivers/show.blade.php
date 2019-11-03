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
                                <span class="badge badge-info shadow bordaSimples p-2 ml-3" style="background-color: {{ $driver->equipe->cor }};">
                                    <i>{{ $driver->numero_carro }}</i>
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
                                <img src="{{ url($driver->pais->image) }}" class="card-img" alt="{{ $driver->pais->nome_pt }}">
                            </div>
                            <div class="card-footer">
                                <h5 class="font-weight-bold font-italic">{{ $driver->pais->nome_pt }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row align-items-end">
                    <h4>Equipe Atual:</h4>
                    <a class="btn btn-outline-secondary ml-2 btnBorda" href="{{ route('teams.show', $driver->equipe->id) }}" role="button" style="color: {{ $driver->equipe->cor }} !important; border-color: {{ $driver->equipe->cor }} !important;">
                        <table>
                            <tr>
                                <td class="align-middle"><span class="font-weight-bold" style="font-size: 25px">{{ $driver->equipe->nome }}</span></td>
                                <td class="align-middle"><img class="rounded shadow ml-2" src="{{ url($driver->equipe->pais->image) }}" height="20px"></td>
                            </tr>
                        </table>
                    </a>
                    <a href="{{ route('teams.show', $driver->equipe->id) }}">
                        <div class="bgImg ml-3">
                            <img class="mb-1" src="/image/f1Model.png" height="40px"
                                    style="filter: drop-shadow(0 9999px 0 {{ $driver->equipe->cor }})
                                                drop-shadow(2px 9999px 1px white)
                                                drop-shadow(-2px 9999px 1px white);">
                        </div>
                    </a>
                </div>
                <br>
                <hr class="bg-danger">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Histórico de Temporadas:</h2>
                        <table class="table table-striped text-center">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th scope="col">TEMPORADA</th>
                                    <th scope="col"><i class="fas fa-flag-checkered"></i> POSIÇÃO</th>
                                    <th scope="col" class="font-italic"><i class="fas fa-trophy"></i> Vitórias</th>
                                    <th scope="col" class="font-italic"><i class="fas fa-award"></i> Pódios</th>
                                    <th scope="col" class="font-italic"><i class="fas fa-stopwatch"></i> Pole-Positions</th>
                                    <th scope="col" class="font-italic"><i class="fas fa-table"></i> Pontos</th>
                                    <th scope="col" class="font-italic"><i class="fas fa-info-circle"></i></th>
                                </tr>
                            </thead>
                            <tbody class="table-secondary" id="accordionExample" style="cursor:pointer">
                                @foreach ($classDriver as $piloto)
                                    @php
                                        $finishCamp = \App\Campeonato::where('season_id', '=', $piloto->season_id)
                                                                    ->where('terminado', '=', TRUE)->get()->count();
                                        $pistas = $tracks->take($finishCamp);
                                    @endphp
                                    @php
                                        $idClass = 1;
                                        foreach ($posFinalCamp->where('season_id','=',$piloto->season_id) as $pos) {
                                            if ($pos->piloto_id != $piloto->piloto_id){
                                                $idClass++;
                                            } else {
                                                break;
                                            }
                                        }
                                    @endphp
                                    <tr class="collapsed" id="heading{{ $piloto->season_id }}" data-toggle="collapse"
                                        data-target="#collapse{{ $piloto->season_id }}" aria-expanded="false" aria-controls="collapse{{ $piloto->season_id }}"
                                        @if ($finishCamp == $totalPistas)
                                            @switch($idClass)
                                                @case(1)
                                                    style="background-color:#fafa75 !important"
                                                    onMouseOver="this.style.backgroundColor='#fcfc32'"
                                                    onMouseOut="this.style.backgroundColor='#fafa75'"
                                                    @break
                                                @case(2)
                                                    style="background-color:#f7f7f7 !important"
                                                    onMouseOver="this.style.backgroundColor='#e0e0e0'"
                                                    onMouseOut="this.style.backgroundColor='#f7f7f7'"
                                                    @break
                                                @case(3)
                                                    style="background-color:#fcbc8b !important"
                                                    onMouseOver="this.style.backgroundColor='#ffb073'"
                                                    onMouseOut="this.style.backgroundColor='#fcbc8b'"
                                                    @break
                                            @endswitch
                                        @endif>
                                        <td scope="row">
                                            <b>{{ $piloto->season_id }}</b>
                                            @if ($finishCamp < $totalPistas)
                                                <i>(em andamento)</i>
                                            @endif
                                        </td>
                                        <th>
                                            @if ($finishCamp < $totalPistas)
                                                <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                  </div>
                                            @else
                                                {{ $idClass }}º
                                            @endif
                                        </th>
                                        <td class="font-italic">{{ $piloto->vitorias }}</td>
                                        <td class="font-italic">{{ $piloto->podios }}</td>
                                        <td class="font-italic">{{ $piloto->pole_positions }}</td>
                                        <th class="font-italic">{{ $piloto->pontos }}</th>
                                        <td>
                                            <a class="btn btn-info btn-sm p-0 px-1" href="{{ route('campeonatos.index', $piloto->season_id) }}" role="button" data-toggle="tooltip" data-placement="top" title="Vizualizar Campeonato">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr id="collapse{{ $piloto->season_id }}" class="collapse bg-dark" aria-labelledby="heading{{ $piloto->season_id }}" data-parent="#accordionExample">
                                        <td scope="row" class="p-0 pb-3" colspan="7">
                                            <table class="table table-striped table-secondary table-hover text-center m-0">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th class="align-middle" scope="col" colspan="{{ $tracks->count() }}">POSIÇÃO DA CORRIDA</th>
                                                    </tr>
                                                    <tr>
                                                        @foreach ($pistas as $track)
                                                            <th class="align-middle p-0" scope="col">
                                                                <i class="m-0">{{ $track->id }}</i>
                                                                <br>
                                                                <img class="rounded shadow border border-white m-0" src="{{ $track->pais->image }}" height="15px"
                                                                    data-toggle="popover" title="{{ $track->pais->nome_pt }}" data-img="{{ $track->image_circuito }}"
                                                                    data-content="<table>
                                                                                    <tr>
                                                                                        <img class='m-0 border border-danger rounded' src='{{ $track->image_circuito }}' width='80px'/>
                                                                                        <i class='ml-1'>{{ $track->nome }}</i>
                                                                                    </tr>
                                                                                    </table>">
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach (\App\ScoreCamp::where('season_id','=',$piloto->season_id)
                                                                                ->where('piloto_id','=',$driver->id)->get() as $posicao)
                                                            <td class="py-1 align-middle mx-0 px-0 border border-secondary" onclick="location.href='{{ route('races.index', [$piloto->season_id, $posicao->track_id]) }}'"
                                                                @switch($posicao->posicao)
                                                                    @case(1)
                                                                        style="background-color:#fafa75;cursor:pointer;font-weight:bold;"
                                                                        onMouseOver="this.style.backgroundColor='#fcfc32'"
                                                                        onMouseOut="this.style.backgroundColor='#fafa75'"
                                                                        @break
                                                                    @case(2)
                                                                        style="background-color:#f7f7f7;cursor:pointer;font-weight:bold;"
                                                                        onMouseOver="this.style.backgroundColor='#e0e0e0'"
                                                                        onMouseOut="this.style.backgroundColor='#f7f7f7'"
                                                                        @break
                                                                    @case(3)
                                                                        style="background-color:#fcbc8b;cursor:pointer;font-weight:bold;"
                                                                        onMouseOver="this.style.backgroundColor='#ffb073'"
                                                                        onMouseOut="this.style.backgroundColor='#fcbc8b'"
                                                                        @break
                                                                    @case($posicao->posicao > 3 && $posicao->posicao <= 10)
                                                                        style="background-color:#64bd7b;cursor:pointer;color:#fff"
                                                                        onMouseOver="this.style.backgroundColor='#41ab5d'"
                                                                        onMouseOut="this.style.backgroundColor='#64bd7b'"
                                                                        @break
                                                                    @case($posicao->posicao > 10  && $posicao->posicao <= 15)
                                                                        style="background-color:#b587f5;cursor:pointer;color:#fff"
                                                                        onMouseOver="this.style.backgroundColor='#9d6be3'"
                                                                        onMouseOut="this.style.backgroundColor='#b587f5'"
                                                                        @break
                                                                    @default
                                                                        style="background-color:#b362b3;cursor:pointer;color:#fff"
                                                                        onMouseOver="this.style.backgroundColor='#8a3f8a'"
                                                                        onMouseOut="this.style.backgroundColor='#b362b3'"
                                                                        @break
                                                                @endswitch>
                                                                <i>{{ $posicao->posicao }}</i>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="bg-danger">
                <br>
                {{-- <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('drivers.index') }}'">Voltar</button> --}}
                <button class="btn btn-outline-light" onclick="javascript:history.back()">Voltar</button>

            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            html: true,
            trigger: 'hover',
            placement: 'bottom',
            template: '<div class="popover border border-white text-center"><div class="arrow"></div><h2 class="popover-header bg-dark text-white"></h2><div class="popover-body"></div><div class="popover-footer"></div></div>'
        });
    });
</script>

@endsection
