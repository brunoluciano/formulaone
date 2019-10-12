@extends('app')
@section('title') - Pilotos @endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($teams) > 0)
                @if (count($drivers) > 0)
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading mb-0">{{ $message }}</h4>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
                        <h1 class="display-4 ml-4">Pilotos</h1>
                        <hr class="bg-danger">
                        @if (count($drivers) >= 20) {{-- DESABILITA O BOTÃO CASO JÁ TENHA 20 PILOTOS CADASTRADOS --}}
                            <button type="button" class="btn btn-info mb-2" data-toggle="tooltip" data-placement="top" title="Todos os pilotos cadastrados!" disabled>
                                <i class="fas fa-plus"></i> Novo
                            </button>
                        @else
                            <button type="button" class="btn btn-info mb-2" onclick="javascript:location.href='{{ route('drivers.create') }}'">
                                <i class="fas fa-plus"></i> Novo
                            </button>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-secondary table-hover border border-danger text-center shadow">
                                <thead class="bg-danger text-white">
                                    <tr>
                                        <th class="align-middle" scope="col">ID</th>
                                        <th class="align-middle" scope="col"><i class="fas fa-hard-hat"></i> Piloto</th>
                                        <th class="align-middle" scope="col"><i class="fas fa-car"></i> Número</th>
                                        <th class="align-middle" scope="col"><i class="fas fa-users"></i> Equipe</th>
                                        <th class="align-middle" scope="col"><i class="fas fa-trophy"></i> Títulos</th>
                                        <th class="align-middle" scope="col"><i class="fas fa-medal"></i> Vitórias</th>
                                        <th colspan="2" class="align-middle" scope="col"><i class="fas fa-globe-americas"></i> Nacionalidade</th>
                                        <th class="align-middle" scope="col">Info / Editar / Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $driver)
                                        <tr style="cursor:pointer">
                                            <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                                                <td class="align-middle font-weight-bold" scope="row">{{ $driver->id }}</td>
                                                <td class="align-middle">{{ $driver->nome }}</td>
                                                <td class="align-middle">
                                                    <span class="badge badge-info shadow bordaSimples p-2" style="background-color: {{ $driver->equipe()->get()->first()->cor }};">
                                                        <i>{{ $driver->numero_carro }}</i>
                                                    </span>
                                                </td>
                                                <td class="align-middle">{{ $driver->equipe()->get()->first()->nome }}</td>
                                                <td class="align-middle">{{ $driver->titulos }}</td>
                                                <td class="align-middle">{{ $driver->vitorias }}</td>
                                                <td class="align-middle text-right">
                                                    <i>{{ $driver->pais()->get()->first()->nome_pt }}</i>
                                                </td>
                                                <td class="align-middle text-left">
                                                    <img class="rounded shadow" src="{{ $driver->pais()->get()->first()->image }}" height="20px">
                                                </td>
                                                <td class="align-middle">
                                                    <div class="btn-group border border-white rounded shadow" role="group" aria-label="Operações">
                                                        <a class="btn btn-info btn-sm" href="{{ route('drivers.show', $driver->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="Informações">
                                                            <i class="fas fa-search text-white"></i>
                                                        </a>

                                                        <a class="btn btn-secondary btn-sm" href="{{ route('drivers.edit', $driver->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fas fa-edit text-white"></i>
                                                        </a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" href="{{ route('drivers.destroy', $driver->id) }}" onclick="return confirm('Deseja realmente remover o piloto {{ $driver->nome }}?')" data-toggle="tooltip" data-placement="top" title="Excluir">
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
                        <h3 class="alert-heading"><strong>Não há pilotos registrados!</strong></h3>
                        <hr>
                        <h6>Clique em <strong>Novo</strong> para adicionar um.</h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <button type="button" name="" id="" class="btn btn-info btn-lg" onclick="javascript:location.href='{{ route('drivers.create') }}'">Novo</button>
                @endif
            @else
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h3 class="alert-heading"><strong>É necessário ter pelo menos uma equipe registrada!</strong></h3>
                    <hr>
                    <h6>Clique em <strong>Equipe</strong> para adicionar uma.</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <button type="button" name="" id="" class="btn btn-info btn-lg" onclick="javascript:location.href='{{ route('teams.index') }}'">Equipe</button>
            @endif
        </div>
    </div>
@endsection
