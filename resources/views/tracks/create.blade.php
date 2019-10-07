@extends('app')
@section('title') - Adicionar Pista @endsection
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
            <h3 class="display-4 ml-4">Adicionar Nova Pista</h3>
            <hr class="bg-danger">
            <form action="{{ route('tracks.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputNome">Pista</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Informe o nome da pista" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCurvas">Curvas</label>
                        <input type="number" class="form-control" id="inputCurvas" name="curvas" min="1" max="99" placeholder="Informe a quantidade de curvas da pista">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputPais">Pais</label>
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
            <button class="btn btn-outline-light" onclick="javascript:location.href='{{ route('tracks.index') }}'">Voltar</button>
        </div>
    </div>
</div>
@endsection
