@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg3.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>Log In</h1>
</div>

<div class="container">
    <div class="row d-flex justify-content-center" style="margin-left: 170px;">
        <div class="col-md-9">
            <form method="POST" action="{{ route('login') }}" style="margin: 80px auto;">
                @csrf
                <h2 style="text-align: center;">Login</h2>
                <label for="email" style="margin: 10px 0;">Email</label>
                <input value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password" style="margin: 10px 0;">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row mb-3" style="margin-top: 20px;">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <div class="text-right" style="margin: 15px 0;">
                    <button type="submit" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
