@extends('app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
            <h1 class="display-4 ml-4">Grande Prêmio - {{ $track->nome }} </h1>
            <hr class="bg-danger">

            <a class="btn btn-outline-light" href="{{ route('campeonatos.index') }}" role="button">Voltar</a>
        </div>
    </div>
</div>
@endsection