@extends('layouts.inicio')
<style>
    .ph-center::-webkit-input-placeholder {
            text-align: center;
            /* Centrado vertical */
        }

        .ph-center:-moz-placeholder {
            /* Firefox 19+ */
            text-align: center;
        }
</style>
@section('content')
<div class="container" style="margin-top:10%;">
    <div class="form-row d-flex justify-content-center">
        <div class="">
            <div class="">
                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                                    class="img-fluid col-md-6" style="width: 50%">
                            </div>
                            <div style="margin-top: 10%;" class="container text-secondary">
                                <h4>Ingresar</h4>
                            </div>
                            <div
                                class="d-flex justify-content-center col-md-12 bg-danger rounded text-center text-white p-2">
                                <span class="col-md-12">Por favor ingresa para ver el contenido</span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Correo"
                                    class="ph-center form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Contraseña"
                                    class="ph-center form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex justify-content-center col-md-12">
                                <button type="submit" class="btn btn-danger col-md-12">
                                    {{ __('Acceder') }}
                                </button>

                                @if(Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
