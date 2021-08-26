@extends('layouts.apps')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Veillez Changer votre Mot de passe pour acceder à votre interface de travail</p>

        <form action="{{ route('first.update',$data) }}" method="post">
        {{ csrf_field() }}
        {{-- {{ method_field('PUT') }} --}}
        <div class="input-group mb-3">
            {{-- <input type="hidden" name="_method" value="PUT"> --}}
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
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Confirmer votre Mot de Passe">
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
        <div class="row" style="text-align: center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-block">Valider</button>
            </div>
            <div class="col-md-3"></div>
            <!-- /.col -->
        </div>
        </form>
    </div>
@endsection
