@extends('app')
@section('title') - Nova Temporada @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">Nova Temporada</h1>
            <hr class="bg-danger">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-info py-4 mb-0" role="alert">
                        <h2 class="alert-heading ml-4">Deseja adicionar uma nova temporada?</h2>
                        <hr>
                        <form action="{{ route('seasons.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                            <a class="btn btn-outline-dark" href="{{ route('seasons.index') }}" role="button">Voltar</a>
                        </form>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
