@extends('app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card bg-dark border-danger shadow">
                <img src="/image/corridas/races.jpg" class="card-img" alt="Campeonato">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <a href="{{ route('seasons.index') }}" class="stretched-link text-decoration-none">
                        <h3 class="card-title display-3 font-weight-bold text-danger bordaLetra ml-3">Corridas</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-danger">
    <div class="row">
        <div class="col-md-12">
            <div class="card-deck">
                <div class="card bg-dark border-danger shadow">
                    <div class="card-header p-0">
                        <a href="{{ route('drivers.index') }}" class="btn btn-outline-warning btn-block stretched-link"><h3>Pilotos</h3></a>
                    </div>
                    <img src="/image/pilotos/drivers.jpg" class="card-img-top">
                </div>
                <div class="card bg-dark border-danger shadow">
                    <div class="card-header p-0">
                        <a href="{{ route('teams.index') }}" class="btn btn-outline-warning btn-block stretched-link"><h3>Equipes</h3></a>
                    </div>
                    <img src="/image/equipes/teams.png" class="card-img-top">
                </div>
                <div class="card bg-dark border-danger shadow">
                    <div class="card-header p-0">
                        <a href="{{ route('tracks.index') }}" class="btn btn-outline-warning btn-block stretched-link"><h3>Pistas</h3></a>
                    </div>
                    <img src="/image/pistas/pistas.png" class="card-img-top">
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
