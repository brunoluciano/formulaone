@extends('app')
@section('title') - Pistas @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron pt-5 pb-5 shadow-lg bg-dark text-white border border-danger">
            <h1 class="display-4 ml-4">Pistas</h1>
            <hr class="bg-danger">
            {{-- <a href="{{ route('tracks.create') }}" class="btn btn-info" role="button"><i class="fas fa-plus"></i> Novo</a>
            <br><br> --}}
            <div class="row">
                @foreach ($tracks as $track)
                    <div class="col-md-3">
                        <div class="card bg-danger border border-white text-white shadow" style="cursor:pointer">
                            <img src="{{ $track->image_circuito }}" class="card-img-top" data-toggle="tooltip" data-placement="right" title="{{ $track->nome }}">
                            <div class="card-footer text-center">
                                <h4 class="card-text mt-1">{{ $track->nome }} <img class="rounded shadow bordaImg" src="{{ $track->pais->image }}" height="30px" data-toggle="tooltip" data-placement="right" title="{{ $track->pais->nome_pt }}"></h4>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
