@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg1.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>{{ $review->title }} reviews</h1>
</div>
@error('authorized')
    <div style="width: 200px; margin: 20px auto; padding: 15px 25px; text-align: center;" class="invalid-feedback bg-danger p-2" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
<div style="width: 90%; height: auto; margin: 50px auto; display: flex; flex-wrap: wrap; justify-content: center;">
    <div style="width: 100%; height: auto; border: 1px solid black; margin: 20px; display: flex; flex-wrap: wrap;">
        <div style="width: 40%; padding-bottom: 25%; background-image: url('data:image/jpeg;base64,{{ $review->thumbnail }}'); 
                    background-size: cover; background-position: center center; box-sizing: border-box;"></div>
        <div style="width: 60%; height: auto; box-sizing: border-box; padding: 20px;">
            <h2 style="text-align: center; font-weight: bold; font-style: normal;">{{ $review->title }}</h2>
            <p style="box-sizing: border-box; padding: 10px 40px;">{{ $review->review }}</p>
            <div style="display: flex; flex-wrap: wrap; justify-content: center; margin: 30px 0;">
                @foreach($review->images as $image)
                    <div style="width: 200px; height: 200px; background-image: url('{{ asset('storage/images/' . $image->name) }}'); 
                            background-size: cover; background-position: center center; margin: 10px"></div>
                @endforeach
            </div>
            <div style="display: flex; justify-content: space-between; box-sizing: border-box; padding: 30px 40px;">
                <div>{{ $review->updated_at }}</div>
                <div>By <span style="font-weight: bold;">{{ $review->user->name }}</span></div>
            </div>
        </div>
    </div>
</div>
<div class="text-center" style="margin: 30px 0;">
    @auth
        @if($review->iduser == $idUserLogged)
            <a href="{{ url('review/' . $review->id . '/edit') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin: 0 10px;">Edit</a>
        @endif
    @endauth
    <a href="{{ url('review/' . $type) }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin: 0 10px;">Back</a>
</div>
@endsection