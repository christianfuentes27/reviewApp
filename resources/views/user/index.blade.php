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
            align-items: center; background-image: url({{ url('assets/img/bg3.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>Profile</h1>
</div>
@error('authorized')
    <div style="width: 350px; margin: 20px auto; padding: 15px 25px; text-align: center;" class="invalid-feedback bg-danger p-2" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror
@if(session('message'))
    <div class="alert alert-success myalert">{{ session('message') }}</div>
@endif
<div class="container">
    <div class="row d-flex justify-content-center" style="margin-left: 170px;">
        <div class="col-md-10">
            <div class="user-profile-thumbnail" style="background-image: url('assets/img/avatar.jpg');"></div>
            <h1 style="font-size: 20px;">Name</h1>
            <p style="font-size: 18px;">{{ $user->name }}</p>
            <h1 style="font-size: 20px;">Email</h1>
            <p style="font-size: 18px;">{{ $user->email }}</p>
            @if(count($user->reviews) > 0)
                <h1 style="font-size: 20px;">Reviews</h1>
            @else
                <p style="font-size: 18px; font-style: italic; font-weight: bold;">You have no reviews yet</p>
            @endif
        </div>
    </div>
</div>
<div class="review-user-container">
    @foreach($user->reviews as $review)
        <div class="review-user-profile">
            <p class="user-profile-title">{{ $review->title }}</p>
            <div class="review-user-thumbnail" style="background-image: url('data:image/jpeg;base64,{{ $review->thumbnail }}');"></div>
            <p>{{ $review->updated_at }}</p>
            <div class="text-right" style="margin: 15px 10px;">
                <a href="{{ url('review/' . $review->id) }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">View</a>
            </div>
        </div>
    @endforeach
</div>
<div class="text-center" style="margin: 30px auto;">
    <a href="{{ url('user/' . $user->id . '/edit') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Edit user</a>
    <a href="javascript: void(0);" 
               class="btn deleteReview"
               data-name="{{ $user->id }}"
               data-toggle="modal" 
               data-target="#staticBackdrop"
               data-url="{{ url('user/' . $user->id) }}" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin-left: 5px;">Delete user</a>
    <a href="{{ url('/') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin-left: 5px;">Back</a>
</div>
@endsection

@section('scripts')
<form action="" method="post" id="deleteForm">
  @csrf
  @method('delete')
</form>
<script src="{{ url('assets/js/delete.js') }}"></script>
@endsection