@extends('app')
@section('title') - Países @endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="jumbotron bg-dark p-4 shadow-lg border border-danger text-white">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 ml-4">Países Cadastrados</h1>
                        <hr class="bg-danger">
                        <div class="table-responsive">
                            <table class="table table-striped table-secondary table-hover text-center shadow">
                                <thead class="bg-danger text-white">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Sigla</th>
                                        <th scope="col">Bandeira</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td class="align-middle" scope="row">{{ $country->id }}</td>
                                            <td class="align-middle">{{ $country->nome_pt }}</td>
                                            <td class="align-middle">{{ $country->sigla }}</td>
                                            <td class="align-middle">
                                                @php
                                                    if(file_exists(public_path('image/paises/'.$country->nome_pt.'.png'))){
                                                        echo "<img class='rounded shadow' src='".$country->image."' height='50px' alt='".$country->nome_pt.">'";
                                                    } // else echo "nao existe";
                                                @endphp
                                                {{-- @if(public_path('image/paises/{{ $country->nome_pt }}.png'))
                                                    existe
                                                    <img class="img-thumbnail shadow" src="image/paises/{{ $country->nome_pt }}.png" width="100px" alt="{{ $country->nome_pt }}">
                                                @else
                                                    img nao encontrada
                                                @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr class="bg-danger">
                <div class="row justify-content-center">
                    {{ $countries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
