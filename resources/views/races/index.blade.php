@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">Corrida</h1>
            <hr class="bg-danger">
            <div class="table-responsive">
                <table class="table table-striped table-secondary table-hover text-center shadow">
                    <thead class="bg-danger text-light">
                        <tr>
                            <th scope="col">POSIÇÃO</th>
                            <th scope="col">PILOTO</th>
                            <th scope="col">EQUIPE</th>
                            <th scope="col">PONTOS</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach ($races as $race)
                            <tr>
                                @php($contGrid++)
                                <td class="font-weight-bold align-middle" scope="row">{{ $contGrid }}º</td>
                                @foreach ($drivers as $driver)
                                    @if ($race->piloto_id == $driver->id)
                                        <td class="align-middle"> {{-- PILOTO --}}
                                            <img class="rounded shadow m-0" src="{{ $driver->pais()->get()->first()->image }}" height="20px">
                                            <i class="ml-1 mt-1">{{ $driver->nome }}</i>
                                        </td>
                                        <td class="align-middle"> {{-- EQUIPE --}}
                                            <div class="bgImg">
                                                <span>{{ $driver->equipe()->get()->first()->nome }}</span>
                                                <img class="ml-1 mb-1" src="/image/f1Model.png" height="15px"
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
                                <td class="align-middle font-weight-bold">{{ $race->pontos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
