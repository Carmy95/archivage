@extends('layouts.apps')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Veillez vous Connecter pour acceder à l'Application</p>

        <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entrer votre Adresse Email">
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter votre Mot de Passe">
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-7">
            <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                Se Souvenir de Moi
                </label>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
            </div>
            <!-- /.col -->
        </div>
        </form>

        <p class="mb-1">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Mot de Passe Oublier
            </a>
        @endif
        </p>
    </div>
@endsection
