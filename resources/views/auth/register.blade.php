@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg3.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>Register</h1>
</div>

<div class="container">
    <div class="row d-flex justify-content-center" style="margin-left: 170px;">
        <div class="col-md-9">
            <form method="POST" action="{{ route('register') }}" style="margin: 80px auto;">
                @csrf
                <h2 style="text-align: center;">Register</h2>
                <label for="name" style="margin: 10px 0;">Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="email" style="margin: 10px 0;">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
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
                <label for="password-confirm" style="margin: 10px 0;">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                
                <div class="text-right" style="margin: 15px 0;">
                    <button type="submit" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
