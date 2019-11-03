@extends('layouts.app')

@section('content')
<div class="row justify-content-center m-0">
    <div class="col-md-9" style="transform: translateY(15%)">
        <div class="jumbotron bg-dark border border-danger py-1 shadow" style="filter: opacity(0.9) !important;">
            <h1 class="display-3 mt-1 mb-0 text-center text-white">
                Acessar Sistema
                <img src="{{ asset('image/logo_f1.png') }}" class="img" height="40px">
            </h1>
            <hr class="my-1 bg-danger">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-group">
                        <div class="card bg-dark border border-light text-white text-center my-4">
                            <div class="card-header bg-black p-1 text-white">
                                <h3 class="font-weight-light text-center">{{ __('Já registrado?') }}</h3>
                            </div>

                            <div class="card-body bg-black">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Senha') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Lembrar') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-3">
                                            <button type="submit" class="btn btn-success btn-block">
                                                {{ __('Entrar') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Esqueceu sua senha?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card bg-light border border-light text-dark text-center my-4" style="filter: opacity(0.9) !important;">
                            <div class="card-header bg-black p-1 text-white">
                                <h3 class="font-weight-light text-center">{{ __('Crie sua conta') }}</h3>
                            </div>

                            <div class="card-body py-2">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row my-2">
                                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nome') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                               </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row my-2">
                                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row my-2">
                                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Senha') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row my-2">
                                        <label for="password-confirm" class="col-md-3 col-form-label text-md-right p-0">{{ __('Confirmar senha') }}</label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-3">
                                            <button type="submit" class="btn btn-secondary btn-block">
                                                {{ __('Cadastrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
