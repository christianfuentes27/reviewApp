@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirm delete</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg1.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>{{ $review->title }} review</h1>
</div>
@error('authorized')
    <div style="width: 350px; margin: 20px auto; padding: 15px 25px; text-align: center;" class="invalid-feedback bg-danger p-2" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
@if(session('message'))
    <div class="alert alert-success myalert">{{ session('message') }}</div>
@endif
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
        @if($review->iduser == Auth::id())
            <a href="{{ url('review/' . $review->id . '/edit') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin: 0 10px;">Edit review</a>
            <a href="javascript: void(0);" 
               class="btn deleteReview"
               data-name="{{ $review->id }}"
               data-toggle="modal" 
               data-target="#staticBackdrop"
               data-url="{{ url('review/' . $review->id) }}" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin: 0 10px;">Delete review</a>
        @endif
    @endauth
    <a href="{{ url('review/' . $type) }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin: 0 10px;">Back</a>
</div>

<div class="container justify-content-center mt-5 border-left border-right">
    @auth
    <form action="{{ url('comment') }}" method="post">
        @csrf
        <div class="d-flex justify-content-center pt-3 pb-2"><input value="{{ old('message') }}" type="text" minlength="2" maxlength="80" name="message" placeholder="Add a comment" class="form-control addtxt" required></div>
        @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="hidden" name="reviewdata" value="{{ $review->id }}"/>
        <div class="text-right" style="margin: 15px 0;">
            <button type="submit" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Add comment</button>
        </div>
    </form>
    @endauth
    <div style="margin: 20px 0;">
        @foreach($review->comments as $comment)
        <div class="d-flex justify-content-center py-2" style="border-bottom: 1px solid gray; padding: 10px 0;">
            <div class="second py-2 px-2"> 
                <span class="text1" style="padding: 5px 0;">{{ $comment->message }}</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                    <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18" style="margin-right: 10px;"><span class="text2">User: {{ $comment->user->name }}
                    </span>&nbsp;&nbsp;&nbsp;<span>Last updated: {{ $comment->updated_at }}</span>
                    @auth
                        @if($comment->iduser == Auth::id())
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{ url('comment/' . $comment->id . '/edit') }}">Edit</a></span>
                            &nbsp;&nbsp;<span><a href="javascript: void(0);" 
                                       class="deleteReview"
                                       data-name="{{ $comment->id }}"
                                       data-toggle="modal" 
                                       data-target="#staticBackdrop"
                                       data-url="{{ url('comment/' . $comment->id) }}">Delete</a></span>
                        @endif
                    @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<form action="" method="post" id="deleteForm">
  @csrf
  @method('delete')
</form>
<script src="{{ url('assets/js/delete.js') }}"></script>
@endsection