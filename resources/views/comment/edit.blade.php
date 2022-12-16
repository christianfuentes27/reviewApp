@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg1.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>Edit Comment</h1>
</div>
<div class="container">
    <div class="row d-flex justify-content-center" style="margin-left: 170px;">
        <div class="col-md-9">
            <form action="{{ url('comment/' . $comment->id) }}" method="post" style="margin: 80px auto;">
                @csrf
                @method('put')
                <h2 style="text-align: center;">Edit Comment</h2>
                <label for="message" style="margin: 10px 0;">Message</label>
                <input value="{{ old('message', $comment->message) }}" minlength="2" maxlength="80" type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Message">
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="text-right" style="margin: 15px 0;">
                    <button type="submit" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Edit</button>
                    <a href="{{ url('review/' . $comment->idreview) }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin-left: 10px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection