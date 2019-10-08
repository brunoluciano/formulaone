@extends('app')
@section('title') - Equipes @endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (count($teams) > 0) <!-- MOSTRA TABELA DE EQUIPES CASO JÁ EXISTA ALGUMA REGISTRADA NO BANCO -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading mb-0">{{ $message }}</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
                    <h1 class="display-4 ml-4">Equipes</h1>
                    <hr class="bg-danger">
                    <button type="button" class="btn btn-info" onclick="javascript:location.href='{{ route('teams.create') }}'"><i class="fas fa-plus"></i> Novo</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-secondary table-hover border border-danger text-center mt-2 shadow">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"><i class="fas fa-car-alt"></i> Equipe</th>
                                    <th scope="col"><i class="fas fa-briefcase"></i> Diretor</th>
                                    <th scope="col"><i class="fas fa-award"></i> Pódios</th>
                                    <th scope="col"><i class="fas fa-trophy"></i> Títulos</th>
                                    <th scope="col"><i class="fas fa-globe-americas"></i> País</th>
                                    <th scope="col">Info / Editar / Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr {{--onclick="window.location='{{ route('teams.show', $team->id) }}';"--}} style="cursor:pointer">
                                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                                            <td class="align-middle font-weight-bold" scope="row">{{ $team->id }}</td>
                                            <td class="align-middle">
                                                {{-- <span class="badge badge-info" style="background-color:{{$team->cor}} !important">
                                                    <i class="fas fa-car-alt"></i>
                                                </span> --}}
                                                <div class="bgImg">
                                                    {{ $team->nome }}
                                                    <img class="ml-1 mb-1 float-right" src="/image/f1Model.png" height="15px"
                                                        style="filter: drop-shadow(0 9999px 0 {{ $team->cor }})
                                                                       drop-shadow(2px 9999px 1px white)
                                                                       drop-shadow(-2px 9999px 1px white);">
                                                </div>
                                            </td>
                                            <td class="align-middle">{{ $team->diretor }}</td>
                                            <td class="align-middle">{{ $team->podios }}</td>
                                            <td class="align-middle">{{ $team->titulos }}</td>
                                            <td class="align-middle">
                                                <i>{{ $team->pais()->get()->first()->nome_pt }}</i>
                                                <img class="rounded shadow" src="image/paises/{{ $team->pais()->get()->first()->nome_pt }}.png" height="20px">
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group border border-white rounded shadow" role="group" aria-label="Operações">
                                                    <a class="btn btn-info btn-sm" href="{{ route('teams.show', $team->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="Informações">
                                                        <i class="fas fa-search text-white"></i>
                                                    </a>

                                                    <a class="btn btn-secondary btn-sm" href="{{ route('teams.edit', $team->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fas fa-edit text-white"></i>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" href="{{ route('teams.destroy', $team->id) }}" onclick="return confirm('Deseja realmente excluir a equipe {{ $team->nome }}?')" data-toggle="tooltip" data-placement="top" title="Excluir">
                                                        <i class="fas fa-trash text-white"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h3 class="alert-heading"><strong>Não há equipes registradas!</strong></h3>
                <hr>
                <h6>Clique em <strong>Novo</strong> para adicionar uma.</h6>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <button type="button" name="" id="" class="btn btn-info btn-lg" onclick="javascript:location.href='{{ route('teams.create') }}'">Novo</button>
            @endif
        </div>
    </div>
@endsection
