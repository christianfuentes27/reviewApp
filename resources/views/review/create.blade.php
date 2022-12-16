@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg1.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>Add Review</h1>
</div>
<div class="container">
    <div class="row d-flex justify-content-center" style="margin-left: 170px;">
        <div class="col-md-9">
            <form action="{{ url('review') }}" method="post" enctype="multipart/form-data" style="margin: 80px auto;">
                @csrf
                <h2 style="text-align: center;">Add Review</h2>
                <label for="title" style="margin: 10px 0;">Title</label>
                <input value="{{ old('title') }}" type="title" class="form-control @error('title') is-invalid @enderror" minlength="2" maxlength="80" id="title" name="title" placeholder="Title" required>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <label for="reviewtype" style="width:100%; margin: 10px 0;">Type</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="book" value="Book" {{(old('type') == 'Book') ? 'checked' : ''}} required>
                      <label class="form-check-label" for="book">Book</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="movie" value="Movie" {{(old('type') == 'Movie') ? 'checked' : ''}}>
                      <label class="form-check-label" for="movie">Movie</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="record" value="Record" {{(old('type') == 'Record') ? 'checked' : ''}}>
                      <label class="form-check-label" for="record">Record</label>
                    </div>
                </div>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <label for="review">Review</label>
                    <textarea class="form-control" minlength="2" maxlength="500" id="review" name="review" rows="3" placeholder="Review" style="resize:none;" required>{{ old('review') }}</textarea>
                </div>
                @error('review')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" accept="image/jpeg" class="form-control-file" id="thumbnail" name="thumbnail" required>
                </div>
                @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <label for="photos">Review photos</label>
                    <input type="file" multiple accept="image/jpeg" class="form-control-file" id="photos" name="photos[]" required>
                </div>
                @error('photos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="text-right" style="margin: 15px 0;">
                    <button type="submit" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Create</button>
                    <a href="{{ url('/') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px; margin-left: 10px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection