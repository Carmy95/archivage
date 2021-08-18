@extends('layouts.apps')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">Veillez Entrer votre adresse Email</p>

    <form action="{{ route('password.email') }}" method="post">
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
    <div class="row">
        <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Recevoir un lien de reinitialisation</button>
        </div>
        <!-- /.col -->
    </div>
    </form>
</div>


@endsection
