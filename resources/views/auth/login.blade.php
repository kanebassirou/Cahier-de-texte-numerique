@extends('layouts.app')

@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{route('welcome')}}" class="h1"><b>Gest</b>School</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Hello, veuillez vous connecter!</p>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-group mb-3 @error('email') mb-3 @enderror">
                    
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                @error('email')
                    <small class="text-danger text-sm mb-2" role="alert">
                        {{ $message }}
                    </small>
                @enderror

                <div class="input-group mb-2 @error('password') mb-2 @enderror">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Mot de Passe">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                @error('password')
                    <small class="text-danger" role="alert">
                       {{ $message }}
                    </small>
                @enderror

                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Rester actif
                            </label>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block"> Connecte toi ☺️ </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}"> Mot de passe Oublié? </a>
                @endif
            </p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection