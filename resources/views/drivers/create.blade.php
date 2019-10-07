@extends('app')
@section('title') - Novo Piloto @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
            <h2 class="text-danger">Erro ao inserir</h2>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (count($drivers) < 20)
            <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
                <h3 class="display-4 ml-4">Adicionar Novo Piloto</h3>
                <hr class="bg-danger">
                <form action="{{ route('drivers.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEquipe">Piloto</label>
                            <input type="text" class="form-control" id="inputPiloto" name="nome" placeholder="Informe o nome do piloto" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputNumero">Número</label>
                            <input type="number" class="form-control" id="inputNumero" name="numero_carro" min="1" max="99" placeholder="Informe o nº do carro do piloto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEquipe">Equipe</label>
                            <select id="inputEquipe" class="form-control" name="equipe_id">
                                <option selected>Escolher...</option>
                                {{-- O TESTE ABAIXO IMPRIME SOMENTE AS EQUIPES QUE POSSUEM UM PILOTO OU MENOS JÁ RELACIONADO --}}
                                @foreach ($teams as $team)
                                    @php ($cont=0)
                                    @foreach ($drivers as $driver)
                                        @if ($driver->equipe_id == $team->id)
                                            @php ($cont++)
                                        @endif
                                    @endforeach
                                    @if ($cont < 2)
                                        <option value="{{ $team->id }}">{{ $team->nome }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPais">Nacionalidade</label>
                            <select id="inputPais" class="form-control" name="pais_id">
                                <option selected>Escolher...</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->nome_pt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr class="bg-danger">
                    <div class="btn-group" role="group">
                        <input class="btn btn-success" type="submit" id="btGrv" name="btGrv" value="Inserir">
                        <input class="btn btn-secondary" type="reset" id="btLimpar" name="btLimpar" value="Limpar">
                    </div>
                    <br><br>
                </form>
                <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('drivers.index') }}'">Voltar</button>
            </div>
        @else
            <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                <h3 class="alert-heading"><strong>Todos os 20 pilotos já foram cadastrados!</strong></h3>
                <hr>
                <a class="btn btn-outline-secondary" href="{{ route('drivers.index') }}" role="button">Voltar</a>
            </div>
        @endif
    </div>
</div>
@endsection
