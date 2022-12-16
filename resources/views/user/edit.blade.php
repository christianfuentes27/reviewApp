@extends('layouts.app')
    
@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg3.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>Profile</h1>
</div>

<div class="container">
    <form action="{{ url('user/' . $user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row d-flex justify-content-center" style="margin-left: 170px;">
            <div class="col-md-10">
                <h1 style="font-size: 20px;">Name</h1>
                <input value="{{ old('name', $user->name) }}" type="text" name="name" placeholder="Name"/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <h1 style="font-size: 20px;">Email</h1>
                <input value="{{ old('email', $user->email) }}" type="email" name="email" placeholder="Email"/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="text-center" style="margin: 15px;">
            <button type="submit" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Edit</button>
            <a href="{{ url('user') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin-left: 10px;">Back</a>
        </div>
    </form>
</div>
@endsection