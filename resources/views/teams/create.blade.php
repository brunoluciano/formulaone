@extends('app')
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

            <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
                <h3 class="display-4 ml-4">Adicionar Nova Equipe</h3>
                <hr class="bg-danger">
                <form action="{{ route('teams.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEquipe">Equipe</label>
                            <input type="text" class="form-control" id="inputEquipe" name="nome" placeholder="Informe o nome da equipe (Ex: Ferrari, Mercedes-Benz)" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDiretor">Diretor</label>
                            <input type="text" class="form-control" id="inputDiretor" name="diretor" placeholder="Informe o nome do chefe da equipe" autocomplete="off">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCor">Cor da Equipe</label>
                            <input type="color" class="form-control" id="inputCor" name="cor" placeholder="Informe a cor principal da equipe" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPais">País</label>
                        <select id="inputPais" class="form-control" name="pais_id">
                            <option selected>Escolher...</option>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nome_pt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="bg-danger">
                    <div class="btn-group" role="group">
                        <input class="btn btn-success" type="submit" id="btGrv" name="btGrv" value="Inserir">
                        <input class="btn btn-secondary" type="reset" id="btLimpar" name="btLimpar" value="Limpar">
                    </div>
                    <br><br>
                </form>
                <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('teams.index') }}'">Voltar</button>
            </div>
        </div>
    </div>
@endsection
