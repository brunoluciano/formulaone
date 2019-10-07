@extends('app')
@section('title') - Editar Equipe @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h2 class="alert-heading">Erro ao editar a equipe!</h2>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
                <h3 class="display-4 ml-4">Editar Equipe <span class="font-weight-bold font-italic">{{ $team->nome }}</span></h3>
                <hr class="bg-danger">
                <form id="myForm" action="{{ route('teams.update', $team->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEquipe">Equipe</label>
                            <input type="text" class="form-control" id="inputEquipe" name="nome" value="{{ $team->nome }}" placeholder="Informe o nome da equipe (Ex: Ferrari, Mercedes-Benz)" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDiretor">Diretor</label>
                            <input type="text" class="form-control" id="inputDiretor" name="diretor" value="{{ $team->diretor }}" placeholder="Informe o nome do chefe da equipe" autocomplete="off">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCor">Cor da Equipe</label>
                            <input type="color" class="form-control" id="inputCor" name="cor" value="{{ $team->cor }}" placeholder="Informe a cor principal da equipe" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPais">País</label>
                        <select id="inputPais" class="form-control" name="pais_id">
                            @foreach ($paises as $pais)
                                @if ($pais->id == $team->pais()->get()->first()->id)
                                    <option value="{{ $pais->id }}" selected>{{ $pais->nome_pt }}</option>
                                @else
                                    <option value="{{ $pais->id }}">{{ $pais->nome_pt }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <hr class="bg-danger">
                    <div class="btn-group" role="group">
                        <input class="btn btn-success" type="submit" id="btGrv" name="btGrv" value="Atualizar" data-toggle="modal" data-target="#exampleModalCenter">
                        <input class="btn btn-secondary" type="button" id="btLimpar" name="btLimpar" value="Limpar">
                    </div>
                    <br><br>
                </form>
                <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('teams.index') }}'">Voltar</button>
            </div>
        </div>
    </div>
@endsection
