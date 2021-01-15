@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-login mx-auto mt-5">

                <div class="card-header">
                    <img class="rounded mx-auto d-block mb-0" src="{{ asset('images/logo_badge_new_upright.png') }}" width="60vw" alt="Logo {{ config('app.name', 'Laravel') }}">

                    <hr width="40% mt-0 pt-0 pb-0">

                    <div class="mt-1">
                        <h5 class="text-center mb-1">Login</h5>
                        <h6 class="text-center text-muted mt-0">Portal Kombosa Rockets</h6>
                    </div>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Username -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="login" type="text" placeholder="Usuário ou E-mail" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                                @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha" name="password" required autocomplete="current-password" autofocus="autofocus">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar de mim') }}
                                </label>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary btn-block mb-2">
                            {{ __('Login') }}
                        </button>

                        <!-- Reset Password -->
                        @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="d-block small" href="{{ route('password.request') }}">Esqueci minha senha!</a>
                        </div>
                        @endif     
                                   
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection