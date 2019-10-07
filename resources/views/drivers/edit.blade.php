@extends('app')
@section('title') - Editar Piloto @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
            <h2 class="text-danger">Erro ao atualizar</h2>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
            <h3 class="display-4 ml-4">Editar Piloto</h3>
            <hr class="bg-danger">
            <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEquipe">Piloto</label>
                        <input type="text" class="form-control" id="inputPiloto" name="nome" value="{{ $driver->nome }}" placeholder="Informe o nome do piloto" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNumero">Número</label>
                        <input type="number" class="form-control" id="inputNumero" name="numero_carro" value="{{ $driver->numero_carro }}" min="1" max="99" placeholder="Informe o nº do carro do piloto">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEquipe">Equipe</label>
                        <select id="inputEquipe" class="form-control" name="equipe_id">
                            @foreach ($teams as $team)
                                @if ($team->id == $driver->equipe()->get()->first()->id)
                                    <option value="{{ $team->id }}" selected>{{ $team->nome }}</option>
                                @else
                                    <option value="{{ $team->id }}">{{ $team->nome }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPais">Nacionalidade</label>
                        <select id="inputPais" class="form-control" name="pais_id">
                            @foreach ($countries as $country)
                                @if ($country->id == $driver->pais()->get()->first()->id)
                                    <option value="{{ $country->id }}" selected>{{ $country->nome_pt }}</option>
                                @else
                                    <option value="{{ $country->id }}">{{ $country->nome_pt }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr class="bg-danger">
                <div class="btn-group" role="group">
                    <input class="btn btn-success" type="submit" id="btGrv" name="btGrv" value="Atualizar">
                    <input class="btn btn-secondary" type="reset" id="btLimpar" name="btLimpar" value="Limpar">
                </div>
                <br><br>
            </form>
            <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('drivers.index') }}'">Voltar</button>
        </div>
    </div>
</div>
@endsection
